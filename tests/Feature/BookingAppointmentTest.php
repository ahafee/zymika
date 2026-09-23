<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingAppointmentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_booking_slots_endpoint_returns_available_slots(): void
    {
        $response = $this->getJson('/booking/slots?date='.date('Y-m-d', strtotime('next Monday')));
        $response->assertStatus(200);
        $response->assertJsonStructure(['date', 'day_name', 'slots']);
    }

    public function test_booking_flow_creates_appointment_and_syncs(): void
    {
        $service = Service::first();
        $doctor = Doctor::first();

        $response = $this->post('/booking', [
            'service_id' => $service->id,
            'doctor_id' => $doctor->id,
            'appointment_date' => date('Y-m-d', strtotime('+3 days')),
            'start_time' => '11:00',
            'consult_type' => 'telehealth_video',
            'first_name' => 'Emma',
            'last_name' => 'Watson',
            'email' => 'emma.watson@example.com',
            'phone' => '0422999888',
            'date_of_birth' => '1990-06-15',
            'gender' => 'Female',
            'medicare_number' => '3920 19284',
            'medicare_ref' => '1',
            'medicare_expiry' => '10/2029',
            'address_line1' => '100 George Street',
            'city' => 'Sydney',
            'state' => 'NSW',
            'postcode' => '2000',
            'patient_notes' => 'Chronic insomnia and migraines for 2 years',
            'card_number' => '4242424242424242',
            'card_expiry' => '12/28',
            'card_cvc' => '123',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'email' => 'emma.watson@example.com',
            'role' => 'patient',
        ]);

        $this->assertDatabaseHas('appointments', [
            'consult_type' => 'telehealth_video',
            'payment_status' => 'paid',
            'medirecords_sync_status' => 'synced',
        ]);
    }
}
