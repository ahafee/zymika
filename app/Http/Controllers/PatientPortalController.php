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
            // Section 1: Your Details
            'full_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'sex_at_birth' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'residential_address' => 'nullable|string|max:500',
            'medicare_number' => 'nullable|string|max:50',
            'emergency_contact' => 'nullable|string|max:255',
            'height_cm' => 'nullable|numeric',
            'weight_kg' => 'nullable|numeric',
            'occupation' => 'nullable|string|max:255',

            // Section 2: Your Health Concern
            'health_concern' => 'nullable|string|max:3000',
            'concern_duration' => 'nullable|string|max:100',
            'diagnosed_by' => 'nullable|string|max:100',
            'seeing_specialist' => 'nullable|string|max:10',
            'specialist_details' => 'nullable|string|max:255',
            'life_impact' => 'nullable|array',
            'involves_pain' => 'nullable|string|max:10',
            'pain_score_average' => 'nullable|integer|min:0|max:10',
            'pain_score_enjoyment' => 'nullable|integer|min:0|max:10',
            'pain_score_activity' => 'nullable|integer|min:0|max:10',
            'treatments_tried' => 'nullable|string|max:3000',
            'upcoming_procedures' => 'nullable|string|max:10',
            'upcoming_procedures_details' => 'nullable|string|max:1000',
            'supporting_records_notes' => 'nullable|string|max:1000',

            // Section 3: Medical History
            'medical_conditions' => 'nullable|array',
            'other_conditions_surgeries' => 'nullable|string|max:2000',
            'fall_last_12m' => 'nullable|string|max:10',
            'bp_last_checked' => 'nullable|string|max:100',
            'bp_reading' => 'nullable|string|max:100',
            'pregnancy_status' => 'nullable|string|max:50',
            'current_medications' => 'required|string|max:3000',
            'known_allergies' => 'required|string|max:2000',
            'allergy_details' => 'nullable|string|max:2000',

            // Section 4: Mental Health
            'mental_health_diagnoses' => 'nullable|array',
            'mental_health_hospitalised' => 'nullable|string|max:10',
            'seeing_mental_health_pro' => 'nullable|string|max:10',
            'anxiety_nervous_freq' => 'nullable|string|max:100',
            'anxiety_worry_freq' => 'nullable|string|max:100',
            'depression_interest_freq' => 'nullable|string|max:100',
            'depression_hopeless_freq' => 'nullable|string|max:100',
            'self_harm_thoughts' => 'nullable|string|max:10',
            'sleep_quality' => 'required|string|max:50',

            // Section 5: Family History
            'family_history' => 'nullable|array',

            // Section 6: Lifestyle
            'exercise_hours' => 'nullable|string|max:50',
            'smoking_vaping' => 'nullable|array',
            'alcohol_freq' => 'nullable|string|max:100',
            'alcohol_drinks_day' => 'nullable|string|max:100',
            'alcohol_binge_freq' => 'nullable|string|max:100',
            'substance_use_12m' => 'nullable|array',
            'substance_use_details' => 'nullable|string|max:1000',
            'substance_dependence_history' => 'nullable|string|max:10',

            // Section 7: Work and Safety
            'driver_licence_types' => 'nullable|array',
            'safety_sensitive_role' => 'nullable|string|max:10',
            'drug_testing_subject' => 'nullable|string|max:50',
            'live_alone' => 'nullable|string|max:10',
            'children_under_18' => 'nullable|string|max:10',

            // Section 8: Your Care Team and Consent
            'has_regular_gp' => 'nullable|string|max:10',
            'regular_gp_name' => 'required|string|max:255',
            'regular_gp_clinic' => 'required|string|max:255',
            'regular_gp_email' => 'nullable|string|max:255',
            'keep_gp_informed' => 'nullable|string|max:10',
            'my_health_record_consent' => 'nullable|string|max:10',
            'extra_doctor_notes' => 'nullable|string|max:2000',
            'declaration_confirmed' => 'required|accepted',
            'declaration_name' => 'required|string|max:255',
            'declaration_signature' => 'nullable|string|max:255',
            'declaration_date' => 'required|string|max:50',

            // Informed Consent Checklist Items
            'consent_treatment_1' => 'required|accepted',
            'consent_treatment_2' => 'required|accepted',
            'consent_treatment_3' => 'required|accepted',
            'consent_treatment_4' => 'required|accepted',
            'consent_treatment_5' => 'required|accepted',
            'consent_risks_1' => 'required|accepted',
            'consent_risks_2' => 'required|accepted',
            'consent_risks_3' => 'required|accepted',
            'consent_risks_4' => 'required|accepted',
            'consent_risks_5' => 'required|accepted',
            'consent_safety_1' => 'required|accepted',
            'consent_safety_2' => 'required|accepted',
            'consent_safety_3' => 'required|accepted',
            'consent_safety_4' => 'required|accepted',
            'consent_safety_5' => 'required|accepted',
            'consent_resp_1' => 'required|accepted',
            'consent_resp_2' => 'required|accepted',
            'consent_resp_3' => 'required|accepted',
            'consent_resp_4' => 'required|accepted',
            'consent_resp_5' => 'required|accepted',
            'consent_resp_6' => 'required|accepted',
            'consent_resp_7' => 'required|accepted',
            'consent_privacy_1' => 'required|accepted',
            'consent_privacy_2' => 'required|accepted',
            'consent_opt_research' => 'nullable|string',
            'consent_opt_gp' => 'nullable|string',
            'consent_withdraw' => 'required|accepted',
            'consent_patient_name' => 'required|string|max:255',
            'consent_patient_sig' => 'nullable|string|max:255',
            'consent_patient_date' => 'required|string|max:50',
            'consent_interpreter_used' => 'nullable|string|max:50',
            'consent_interpreter_details' => 'nullable|string|max:255',
        ]);

        $painScore = (int) ($validated['pain_score_average'] ?? 5);

        $payload = [
            'submission_id' => 'SNAP-'.strtoupper(uniqid()),
            'email' => $user->email,
            'appointment_id' => $validated['appointment_id'] ?? null,
            'submitted_at' => now()->toDateTimeString(),
            'fields' => array_merge($validated, [
                'pain_score' => $painScore,
                'medical_history' => $validated['health_concern'] ?? ($validated['medical_history'] ?? 'Clinical review requested'),
            ]),
        ];

        // Update user profile demographics if available
        $user->update([
            'phone' => $validated['mobile'] ?? $user->phone,
            'address_line1' => $validated['residential_address'] ?? $user->address_line1,
            'medicare_number' => $validated['medicare_number'] ?? $user->medicare_number,
        ]);

        $this->snapformsService->handleSubmission($payload);

        return redirect()->route('patient.dashboard')->with('success', 'Pre-consultation health questionnaire & informed consent submitted successfully to Dr. Suneetha Batthala.');
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
