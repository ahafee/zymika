<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'ahpra_number',
        'provider_number',
        'prescriber_number',
        'specialty',
        'bio',
        'consultation_fee',
        'medirecords_practitioner_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'consultation_fee' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(DoctorAvailability::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->title.' '.($this->user ? $this->user->name : '');
    }
}
