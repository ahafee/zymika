<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorAvailability;
use App\Models\EligibilityAssessment;
use App\Models\Service;
use App\Models\User;
use App\Services\MediRecordsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function __construct(protected MediRecordsService $mediRecordsService) {}

    public function index(Request $request)
    {
        $services = Service::where('is_active', true)->get();
        $doctors = Doctor::with('user')->where('is_active', true)->get();
        $leadDoctor = Doctor::with('user')->where('is_active', true)->first();

        $selectedServiceId = $request->get('service_id', $services->first()?->id);
        $selectedDoctorId = $request->get('doctor_id', $leadDoctor?->id);
        $assessmentId = $request->get('assessment_id', session('assessment_id'));

        $assessment = null;
        if ($assessmentId) {
            $assessment = EligibilityAssessment::find($assessmentId);
        }

        return view('pages.booking', compact('services', 'doctors', 'selectedServiceId', 'selectedDoctorId', 'assessment'));
    }

    public function getSlots(Request $request)
    {
        $date = $request->get('date');
        $doctorId = $request->get('doctor_id');

        if (! $date) {
            return response()->json(['slots' => []]);
        }

        $carbonDate = Carbon::parse($date);
        $dayOfWeek = $carbonDate->dayOfWeek; // 0=Sun, 1=Mon ... 6=Sat

        $doctor = Doctor::find($doctorId) ?: Doctor::first();
        if (! $doctor) {
            return response()->json(['slots' => []]);
        }

        $availability = DoctorAvailability::where('doctor_id', $doctor->id)
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->first();

        if (! $availability) {
            return response()->json(['slots' => [], 'message' => 'Practitioner not available on this day.']);
        }

        $slotDuration = $availability->slot_duration_minutes ?: 20;
        $start = Carbon::parse($date.' '.$availability->start_time);
        $end = Carbon::parse($date.' '.$availability->end_time);

        // Fetch existing bookings
        $bookedTimes = Appointment::where('doctor_id', $doctor->id)
            ->whereDate('appointment_date', $date)
            ->whereIn('status', ['confirmed', 'completed', 'pending'])
            ->pluck('start_time')
            ->map(fn ($t) => substr($t, 0, 5))
            ->toArray();

        $slots = [];
        $current = $start->copy();

        while ($current->copy()->addMinutes($slotDuration) <= $end) {
            $slotTimeFormatted = $current->format('H:i');
            $slots[] = [
                'time' => $slotTimeFormatted,
                'display' => $current->format('h:i A'),
                'is_available' => ! in_array($slotTimeFormatted, $bookedTimes),
            ];
            $current->addMinutes($slotDuration);
        }

        return response()->json([
            'date' => $date,
            'day_name' => $carbonDate->format('l, d M Y'),
            'slots' => $slots,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|string',
            'consult_type' => 'required|in:telehealth_video,telehealth_phone',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'medicare_number' => 'nullable|string|max:50',
            'medicare_ref' => 'nullable|string|max:5',
            'medicare_expiry' => 'nullable|string|max:10',
            'address_line1' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:10',
            'postcode' => 'required|string|max:10',
            'patient_notes' => 'nullable|string|max:2000',
            'assessment_id' => 'nullable|exists:eligibility_assessments,id',
            'card_number' => 'required|string',
            'card_expiry' => 'required|string',
            'card_cvc' => 'required|string',
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $doctor = Doctor::findOrFail($validated['doctor_id']);

        // Check/Create Patient User
        $user = Auth::user();
        if (! $user) {
            $user = User::where('email', $validated['email'])->first();
            if (! $user) {
                $user = User::create([
                    'name' => $validated['first_name'].' '.$validated['last_name'],
                    'email' => $validated['email'],
                    'password' => Hash::make(Str::random(12)),
                    'role' => 'patient',
                    'phone' => $validated['phone'],
                    'date_of_birth' => $validated['date_of_birth'],
                    'gender' => $validated['gender'],
                    'address_line1' => $validated['address_line1'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'postcode' => $validated['postcode'],
                    'medicare_number' => $validated['medicare_number'],
                    'medicare_ref' => $validated['medicare_ref'],
                    'medicare_expiry' => $validated['medicare_expiry'],
                ]);
            }
            Auth::login($user);
        } else {
            $user->update([
                'phone' => $validated['phone'] ?? $user->phone,
                'date_of_birth' => $validated['date_of_birth'] ?? $user->date_of_birth,
                'gender' => $validated['gender'] ?? $user->gender,
                'medicare_number' => $validated['medicare_number'] ?? $user->medicare_number,
                'medicare_ref' => $validated['medicare_ref'] ?? $user->medicare_ref,
                'medicare_expiry' => $validated['medicare_expiry'] ?? $user->medicare_expiry,
                'address_line1' => $validated['address_line1'] ?? $user->address_line1,
                'city' => $validated['city'] ?? $user->city,
                'state' => $validated['state'] ?? $user->state,
                'postcode' => $validated['postcode'] ?? $user->postcode,
            ]);
        }

        $startTime = Carbon::parse($validated['start_time']);
        $endTime = $startTime->copy()->addMinutes($service->duration_minutes);
        $appointmentNumber = 'APT-'.date('Y').'-'.strtoupper(Str::random(6));

        $roomCode = Str::slug($doctor->user->name).'-'.Str::random(5);
        $videoUrl = route('telehealth.room', ['room_code' => $roomCode]);

        $appointment = Appointment::create([
            'appointment_number' => $appointmentNumber,
            'patient_id' => $user->id,
            'doctor_id' => $doctor->id,
            'service_id' => $service->id,
            'eligibility_assessment_id' => $validated['assessment_id'] ?? null,
            'appointment_date' => $validated['appointment_date'],
            'start_time' => $startTime->format('H:i:s'),
            'end_time' => $endTime->format('H:i:s'),
            'status' => 'confirmed',
            'consult_type' => $validated['consult_type'],
            'video_meeting_url' => $videoUrl,
            'patient_notes' => $validated['patient_notes'],
            'pre_consult_completed' => false,
            'payment_status' => 'paid',
            'amount_paid' => $service->price,
        ]);

        // External API: MediRecords Cloud API sync commented out
        /*
        try {
            $this->mediRecordsService->syncAppointment($appointment);
        } catch (\Throwable $e) {
            Log::warning('MediRecords sync non-blocking error: '.$e->getMessage());
        }
        */

        return redirect()->route('booking.confirmation', ['appointment_number' => $appointment->appointment_number])
            ->with('success', 'Your Telehealth consultation with Dr. Suneetha Batthala has been confirmed!');
    }

    public function confirmation($appointmentNumber)
    {
        $appointment = Appointment::with(['patient', 'doctor.user', 'service'])
            ->where('appointment_number', $appointmentNumber)
            ->firstOrFail();

        return view('pages.booking-confirmation', compact('appointment'));
    }
}
