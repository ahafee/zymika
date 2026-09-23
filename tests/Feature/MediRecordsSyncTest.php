<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\User;
use App\Services\MediRecordsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MediRecordsSyncTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_medirecords_service_tests_connection_successfully(): void
    {
        $service = app(MediRecordsService::class);
        $testResult = $service->testConnection();

        $this->assertEquals('connected', $testResult['status']);
        $this->assertTrue($testResult['authenticated']);
    }

    public function test_medirecords_webhook_syncs_appointment_update(): void
    {
        $appointment = Appointment::first();

        $response = $this->postJson('/api/webhooks/medirecords', [
            'event_type' => 'appointment.updated',
            'data' => [
                'appointment_id' => $appointment->medirecords_appointment_id,
                'status' => 'completed',
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        $appointment->refresh();
        $this->assertEquals('completed', $appointment->status);
    }

    public function test_snapforms_webhook_syncs_patient_intake(): void
    {
        $patient = User::where('role', 'patient')->first();

        $response = $this->postJson('/api/webhooks/snapforms', [
            'submission_id' => 'SNAP_TEST_9910',
            'email' => $patient->email,
            'fields' => [
                'regular_gp_name' => 'Dr. Wilson',
                'regular_gp_clinic' => 'Sydney Medical',
                'current_medications' => 'None',
                'known_allergies' => 'None',
                'medical_history' => 'Migraines',
                'pain_score' => 5,
                'sleep_quality' => 'Fair',
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('pre_consult_forms', [
            'patient_id' => $patient->id,
            'regular_gp_name' => 'Dr. Wilson',
        ]);
    }
}
