<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_number',
        'patient_id',
        'doctor_id',
        'service_id',
        'eligibility_assessment_id',
        'appointment_date',
        'start_time',
        'end_time',
        'status',
        'consult_type',
        'video_meeting_url',
        'patient_notes',
        'clinical_summary',
        'pre_consult_completed',
        'payment_status',
        'amount_paid',
        'medirecords_appointment_id',
        'medirecords_sync_status',
        'last_synced_at',
    ];

    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
            'pre_consult_completed' => 'boolean',
            'amount_paid' => 'decimal:2',
            'last_synced_at' => 'datetime',
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function eligibilityAssessment(): BelongsTo
    {
        return $this->belongsTo(EligibilityAssessment::class);
    }

    public function preConsultForm(): HasOne
    {
        return $this->hasOne(PreConsultForm::class);
    }

    public function getVideoMeetingUrlAttribute(?string $value): string
    {
        if (empty($value)) {
            return route('telehealth.room', ['room_code' => 'zymika-'.strtolower($this->appointment_number ?? 'room')]);
        }

        if (str_contains($value, 'telehealth.zymikahealth.com.au/room/')) {
            $parts = explode('/', $value);
            $roomCode = end($parts);

            return route('telehealth.room', ['room_code' => $roomCode]);
        }

        return $value;
    }
}
