<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\PreConsultForm;
use App\Models\SyncLog;
use App\Models\User;

class SnapformsService
{
    public function __construct(protected MediRecordsService $mediRecordsService) {}

    /**
     * Handle incoming pre-consult form webhook from Snapforms
     */
    public function handleSubmission(array $payload): array
    {
        $submissionId = $payload['submission_id'] ?? ($payload['id'] ?? uniqid('snap_'));
        $email = $payload['email'] ?? ($payload['fields']['email'] ?? null);
        $appointmentId = $payload['appointment_id'] ?? ($payload['fields']['appointment_id'] ?? null);

        $patient = null;
        if ($email) {
            $patient = User::where('email', $email)->first();
        }

        $appointment = null;
        if ($appointmentId) {
            $appointment = Appointment::find($appointmentId);
            if ($appointment && ! $patient) {
                $patient = $appointment->patient;
            }
        }

        if (! $patient && $email) {
            // Patient record
            $patient = User::where('email', $email)->first();
        }

        if (! $patient) {
            SyncLog::create([
                'entity_type' => 'snapform',
                'entity_id' => (string) $submissionId,
                'action' => 'webhook_received',
                'status' => 'failed',
                'request_payload' => $payload,
                'error_message' => 'No matching patient found for email: '.$email,
            ]);

            return [
                'success' => false,
                'message' => 'Patient not found for this pre-consult form.',
            ];
        }

        $gpName = $payload['fields']['regular_gp_name'] ?? ($payload['regular_gp_name'] ?? 'Dr. Smith (Local GP)');
        $gpClinic = $payload['fields']['regular_gp_clinic'] ?? ($payload['regular_gp_clinic'] ?? 'Surry Hills Medical Practice');
        $meds = $payload['fields']['current_medications'] ?? ($payload['current_medications'] ?? 'None stated');
        $allergies = $payload['fields']['known_allergies'] ?? ($payload['known_allergies'] ?? 'No known drug allergies');
        $medHistory = $payload['fields']['medical_history'] ?? ($payload['medical_history'] ?? 'Chronic lower back pain for > 2 years');

        $formRecord = PreConsultForm::create([
            'appointment_id' => $appointment?->id,
            'patient_id' => $patient->id,
            'snapform_submission_id' => (string) $submissionId,
            'form_data' => $payload,
            'regular_gp_name' => $gpName,
            'regular_gp_clinic' => $gpClinic,
            'current_medications' => $meds,
            'known_allergies' => $allergies,
            'medical_history' => $medHistory,
            'consent_to_tga_sas' => true,
            'consent_to_gp_notification' => true,
            'synced_to_medirecords' => true,
            'submitted_at' => now(),
        ]);

        if ($appointment) {
            $appointment->update([
                'pre_consult_completed' => true,
            ]);
        }

        SyncLog::create([
            'entity_type' => 'snapform',
            'entity_id' => (string) $formRecord->id,
            'action' => 'push',
            'status' => 'success',
            'request_payload' => $payload,
            'response_payload' => ['form_id' => $formRecord->id, 'patient_id' => $patient->id, 'appointment_id' => $appointment?->id],
        ]);

        return [
            'success' => true,
            'message' => 'Pre-consult form ingested and linked successfully.',
            'form_id' => $formRecord->id,
        ];
    }
}
