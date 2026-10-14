<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SyncLog;
use App\Models\User;
use App\Services\MediRecordsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPortalController extends Controller
{
    public function __construct(protected MediRecordsService $mediRecordsService) {}

    public function dashboard()
    {
        $stats = [
            'total_patients' => User::where('role', 'patient')->count(),
            'total_appointments' => Appointment::count(),
            'total_orders' => Order::count(),
            'total_revenue' => (float) (Order::where('payment_status', 'paid')->sum('total_amount') + Appointment::where('payment_status', 'paid')->sum('amount_paid')),
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
            'processing_orders' => Order::where('status', 'processing')->count(),
            'unsynced_appointments' => Appointment::where('medirecords_sync_status', '!=', 'synced')->count(),
        ];

        $recentAppointments = Appointment::with(['patient', 'doctor.user', 'service'])
            ->latest()
            ->take(5)
            ->get();

        $recentOrders = Order::with(['patient', 'items'])
            ->latest()
            ->take(5)
            ->get();

        $recentLogs = SyncLog::latest()->take(5)->get();

        return view('portal.admin.dashboard', compact('stats', 'recentAppointments', 'recentOrders', 'recentLogs'));
    }

    public function appointments(Request $request)
    {
        $status = $request->get('status');
        $query = Appointment::with(['patient', 'doctor.user', 'service'])->latest();

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $appointments = $query->paginate(15)->withQueryString();

        return view('portal.admin.appointments', compact('appointments', 'status'));
    }

    public function updateAppointmentStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled,no_show',
        ]);

        $appointment->update([
            'status' => $request->status,
        ]);

        $this->mediRecordsService->syncAppointment($appointment);

        return back()->with('success', "Appointment #{$appointment->appointment_number} status updated to {$request->status} and synced.");
    }

    public function orders(Request $request)
    {
        $status = $request->get('status');
        $query = Order::with(['patient', 'items.product'])->latest();

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $orders = $query->paginate(15)->withQueryString();

        return view('portal.admin.orders', compact('orders', 'status'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending_approval,processing,dispatched,delivered,cancelled',
            'tracking_number' => 'nullable|string|max:100',
        ]);

        $order->update([
            'status' => $request->status,
            'tracking_number' => $request->tracking_number ?? $order->tracking_number,
        ]);

        return back()->with('success', "Order #{$order->order_number} status updated to {$request->status}.");
    }

    public function products()
    {
        $products = Product::latest()->paginate(15);

        return view('portal.admin.products', compact('products'));
    }

    public function saveProduct(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable|exists:products,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100',
            'category' => 'required|string',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'thc_potency' => 'nullable|string|max:100',
            'cbd_potency' => 'nullable|string|max:100',
            'form_factor' => 'required|string|max:100',
            'terpene_profile' => 'nullable|string|max:255',
            'tga_schedule' => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'is_prescription_required' => 'required|boolean',
            'is_active' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        if (! empty($validated['id'])) {
            $product = Product::findOrFail($validated['id']);
            $product->update($validated);
            $msg = 'Product updated successfully.';
        } else {
            Product::create($validated);
            $msg = 'Product created successfully.';
        }

        return back()->with('success', $msg);
    }

    public function medirecords()
    {
        $connectionStatus = $this->mediRecordsService->testConnection();
        $recentLogs = SyncLog::latest()->take(20)->get();
        $unsyncedAppointments = Appointment::where('medirecords_sync_status', '!=', 'synced')->count();
        $unsyncedPatients = User::where('role', 'patient')->whereNull('medirecords_patient_id')->count();

        $settings = [
            'sandbox' => Setting::get('medirecords_sandbox', true),
            'client_id' => Setting::get('medirecords_client_id', 'zymika_mr_live_client_8385365'),
            'client_secret' => Setting::get('medirecords_client_secret', 'zymika_mr_secret_992147'),
            'api_url' => Setting::get('medirecords_api_url', 'https://sandbox-api.medirecords.com/v1'),
            'auth_url' => Setting::get('medirecords_auth_url', 'https://sandbox-auth.medirecords.com/oauth/token'),
        ];

        return view('portal.admin.medirecords', compact('connectionStatus', 'recentLogs', 'unsyncedAppointments', 'unsyncedPatients', 'settings'));
    }

    public function testMediRecords()
    {
        $result = $this->mediRecordsService->testConnection();

        return back()->with('test_result', $result);
    }

    public function runReconciliation()
    {
        $result = $this->mediRecordsService->reconcileDaily();

        return back()->with('reconciliation_result', $result);
    }

    public function saveMediRecordsSettings(Request $request)
    {
        $validated = $request->validate([
            'medirecords_sandbox' => 'required|boolean',
            'medirecords_client_id' => 'required|string',
            'medirecords_client_secret' => 'required|string',
            'medirecords_api_url' => 'required|url',
            'medirecords_auth_url' => 'required|url',
        ]);

        Setting::set('medirecords_sandbox', $validated['medirecords_sandbox'], 'medirecords', 'boolean');
        Setting::set('medirecords_client_id', $validated['medirecords_client_id'], 'medirecords');
        Setting::set('medirecords_client_secret', $validated['medirecords_client_secret'], 'medirecords');
        Setting::set('medirecords_api_url', $validated['medirecords_api_url'], 'medirecords');
        Setting::set('medirecords_auth_url', $validated['medirecords_auth_url'], 'medirecords');

        return back()->with('success', 'MediRecords API & OAuth settings updated successfully.');
    }

    public function syncLogs(Request $request)
    {
        $entityType = $request->get('entity_type');
        $query = SyncLog::latest();

        if ($entityType && $entityType !== 'all') {
            $query->where('entity_type', $entityType);
        }

        $logs = $query->paginate(20)->withQueryString();

        return view('portal.admin.sync-logs', compact('logs', 'entityType'));
    }
}
