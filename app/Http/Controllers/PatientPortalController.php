<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Order;
use App\Models\PreConsultForm;
use App\Models\Prescription;
use App\Services\MediRecordsService;
use App\Services\SnapformsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientPortalController extends Controller
{
    public function __construct(
        protected MediRecordsService $mediRecordsService,
        protected SnapformsService $snapformsService
    ) {}

    public function dashboard()
    {
        $user = Auth::user();
        $upcomingAppointment = Appointment::with(['doctor.user', 'service'])
            ->where('patient_id', $user->id)
            ->where('appointment_date', '>=', now()->toDateString())
            ->whereIn('status', ['confirmed', 'pending'])
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->first();

        $activePrescriptions = Prescription::with('product')
            ->where('patient_id', $user->id)
            ->where('status', 'active')
            ->where('expiry_date', '>=', now()->toDateString())
            ->get();

        $recentOrders = Order::with('items.product')
            ->where('patient_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

        $preConsultPending = $upcomingAppointment && ! $upcomingAppointment->pre_consult_completed;

        return view('portal.patient.dashboard', compact('user', 'upcomingAppointment', 'activePrescriptions', 'recentOrders', 'preConsultPending'));
    }

    public function appointments()
    {
        $user = Auth::user();
        $appointments = Appointment::with(['doctor.user', 'service'])
            ->where('patient_id', $user->id)
            ->orderByDesc('appointment_date')
            ->orderByDesc('start_time')
            ->paginate(10);

        return view('portal.patient.appointments', compact('appointments'));
    }

    public function prescriptions()
    {
        $user = Auth::user();
        $prescriptions = Prescription::with(['doctor.user', 'product'])
            ->where('patient_id', $user->id)
            ->orderByDesc('issued_date')
            ->get();

        return view('portal.patient.prescriptions', compact('prescriptions'));
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Order::with('items.product')
            ->where('patient_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('portal.patient.orders', compact('orders'));
    }

    public function snapforms(Request $request)
    {
        $user = Auth::user();
        $appointmentId = $request->get('appointment_id');
        $appointment = null;

        if ($appointmentId) {
            $appointment = Appointment::where('patient_id', $user->id)->find($appointmentId);
        } else {
            $appointment = Appointment::where('patient_id', $user->id)
                ->where('appointment_date', '>=', now()->toDateString())
                ->first();
        }

        $existingForm = PreConsultForm::where('patient_id', $user->id)->latest()->first();

        return view('portal.patient.snapform', compact('user', 'appointment', 'existingForm'));
    }

    public function submitSnapform(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'appointment_id' => 'nullable|exists:appointments,id',
            'regular_gp_name' => 'required|string|max:255',
            'regular_gp_clinic' => 'required|string|max:255',
            'current_medications' => 'required|string|max:2000',
            'known_allergies' => 'required|string|max:1000',
            'medical_history' => 'required|string|max:3000',
            'pain_score' => 'required|integer|min:0|max:10',
            'sleep_quality' => 'required|string',
            'consent_tga' => 'required|accepted',
            'consent_gp' => 'required|accepted',
        ]);

        $payload = [
            'submission_id' => 'SNAP-'.strtoupper(uniqid()),
            'email' => $user->email,
            'appointment_id' => $validated['appointment_id'] ?? null,
            'fields' => [
                'regular_gp_name' => $validated['regular_gp_name'],
                'regular_gp_clinic' => $validated['regular_gp_clinic'],
                'current_medications' => $validated['current_medications'],
                'known_allergies' => $validated['known_allergies'],
                'medical_history' => $validated['medical_history'],
                'pain_score' => $validated['pain_score'],
                'sleep_quality' => $validated['sleep_quality'],
            ],
        ];

        $res = $this->snapformsService->handleSubmission($payload);

        return redirect()->route('patient.dashboard')->with('success', 'Pre-consult assessment form successfully submitted and synchronized with Dr. Batthala via MediRecords.');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('portal.patient.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'medicare_number' => 'nullable|string|max:50',
            'medicare_ref' => 'nullable|string|max:5',
            'medicare_expiry' => 'nullable|string|max:10',
            'ihi_number' => 'nullable|string|max:50',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:10',
            'postcode' => 'required|string|max:10',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'medicare_number' => $validated['medicare_number'] ?? null,
            'medicare_ref' => $validated['medicare_ref'] ?? null,
            'medicare_expiry' => $validated['medicare_expiry'] ?? null,
            'ihi_number' => $validated['ihi_number'] ?? null,
            'address_line1' => $validated['address_line1'],
            'address_line2' => $validated['address_line2'] ?? null,
            'city' => $validated['city'],
            'state' => $validated['state'],
            'postcode' => $validated['postcode'],
        ];

        if (! empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        // Sync updated details to MediRecords
        $this->mediRecordsService->syncPatient($user);

        return back()->with('success', 'Profile and Medicare details updated and synchronized with MediRecords.');
    }
}
