<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreConsultForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'patient_id',
        'snapform_submission_id',
        'form_data',
        'regular_gp_name',
        'regular_gp_clinic',
        'current_medications',
        'known_allergies',
        'medical_history',
        'consent_to_tga_sas',
        'consent_to_gp_notification',
        'synced_to_medirecords',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'form_data' => 'array',
            'consent_to_tga_sas' => 'boolean',
            'consent_to_gp_notification' => 'boolean',
            'synced_to_medirecords' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
