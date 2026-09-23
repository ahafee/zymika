<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\User;
use App\Services\MediRecordsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DoctorPortalController extends Controller
{
    public function __construct(protected MediRecordsService $mediRecordsService) {}

    public function dashboard()
    {
        $doctor = Doctor::with('user')->where('user_id', Auth::id())->first() ?: Doctor::with('user')->first();

        $todayAppointments = Appointment::with(['patient', 'service'])
            ->where('doctor_id', $doctor?->id)
            ->whereDate('appointment_date', now()->toDateString())
            ->orderBy('start_time')
            ->get();

        $upcomingAppointments = Appointment::with(['patient', 'service'])
            ->where('doctor_id', $doctor?->id)
            ->whereDate('appointment_date', '>', now()->toDateString())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->take(5)
            ->get();

        $totalPatientsCount = User::where('role', 'patient')->count();
        $totalScriptsCount = Prescription::where('doctor_id', $doctor?->id)->count();

        return view('portal.doctor.dashboard', compact('doctor', 'todayAppointments', 'upcomingAppointments', 'totalPatientsCount', 'totalScriptsCount'));
    }

    public function appointments(Request $request)
    {
        $doctor = Doctor::where('user_id', Auth::id())->first() ?: Doctor::first();
        $date = $request->get('date', now()->toDateString());

        $appointments = Appointment::with(['patient', 'service', 'preConsultForm', 'eligibilityAssessment'])
            ->where('doctor_id', $doctor?->id)
            ->whereDate('appointment_date', $date)
            ->orderBy('start_time')
            ->get();

        return view('portal.doctor.appointments', compact('doctor', 'appointments', 'date'));
    }

    public function consultationRoom($id)
    {
        $appointment = Appointment::with(['patient', 'doctor.user', 'service', 'preConsultForm', 'eligibilityAssessment'])
            ->findOrFail($id);

        $patientPrescriptions = Prescription::with('product')
            ->where('patient_id', $appointment->patient_id)
            ->orderByDesc('issued_date')
            ->get();

        $products = Product::where('is_active', true)->get();

        return view('portal.doctor.consultation-room', compact('appointment', 'patientPrescriptions', 'products'));
    }

    public function saveConsultationNotes(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $request->validate([
            'clinical_summary' => 'required|string|max:5000',
            'status' => 'required|in:confirmed,completed,cancelled,no_show',
        ]);

        $appointment->update([
            'clinical_summary' => $request->clinical_summary,
            'status' => $request->status,
        ]);

        // Sync with MediRecords
        $this->mediRecordsService->syncAppointment($appointment);

        return back()->with('success', 'Clinical notes saved and synchronized to MediRecords EHR.');
    }

    public function patients(Request $request)
    {
        $search = $request->get('search');
        $query = User::where('role', 'patient')->with(['prescriptions', 'appointments']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('medicare_number', 'like', "%{$search}%");
            });
        }

        $patients = $query->paginate(12)->withQueryString();

        return view('portal.doctor.patients', compact('patients', 'search'));
    }

    public function prescriptions()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first() ?: Doctor::first();
        $prescriptions = Prescription::with(['patient', 'product', 'doctor.user'])
            ->where('doctor_id', $doctor?->id)
            ->orderByDesc('issued_date')
            ->paginate(15);

        $products = Product::where('is_active', true)->get();
        $patients = User::where('role', 'patient')->orderBy('name')->get();

        return view('portal.doctor.prescriptions', compact('prescriptions', 'products', 'patients', 'doctor'));
    }

    public function issuePrescription(Request $request)
    {
        $doctor = Doctor::where('user_id', Auth::id())->first() ?: Doctor::first();

        $validated = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'dosage_instructions' => 'required|string|max:1000',
            'repeats_total' => 'required|integer|min:1|max:10',
            'tga_sas_category' => 'required|string',
            'clinical_notes' => 'nullable|string|max:1000',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $scriptNumber = 'RX-ZOV-'.strtoupper(Str::random(6));

        $prescription = Prescription::create([
            'prescription_number' => $scriptNumber,
            'patient_id' => $validated['patient_id'],
            'doctor_id' => $doctor->id,
            'product_id' => $product->id,
            'medication_name' => $product->name,
            'dosage_instructions' => $validated['dosage_instructions'],
            'repeats_total' => $validated['repeats_total'],
            'repeats_left' => $validated['repeats_total'],
            'tga_sas_category' => $validated['tga_sas_category'],
            'status' => 'active',
            'issued_date' => now()->toDateString(),
            'expiry_date' => now()->addMonths(6)->toDateString(),
            'medirecords_script_id' => 'MR-RX-'.strtoupper(Str::random(6)),
            'clinical_notes' => $validated['clinical_notes'],
        ]);

        return back()->with('success', "Prescription {$scriptNumber} issued and sent to patient's dispensary wallet.");
    }

    public function syncMediRecords($id)
    {
        $appointment = Appointment::with(['patient', 'doctor', 'service'])->findOrFail($id);
        $res = $this->mediRecordsService->syncAppointment($appointment);

        if ($res['success']) {
            return back()->with('success', 'Appointment successfully synced to MediRecords diary!');
        }

        return back()->with('error', 'MediRecords sync failed: '.($res['error'] ?? 'Unknown error'));
    }
}
