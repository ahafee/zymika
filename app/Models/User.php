<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'date_of_birth',
        'gender',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postcode',
        'medicare_number',
        'medicare_ref',
        'medicare_expiry',
        'ihi_number',
        'avatar',
        'medirecords_patient_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isDoctor(): bool
    {
        return $this->role === 'doctor';
    }

    public function isPatient(): bool
    {
        return $this->role === 'patient';
    }

    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class, 'patient_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'patient_id');
    }

    public function eligibilityAssessments(): HasMany
    {
        return $this->hasMany(EligibilityAssessment::class, 'user_id');
    }

    public function preConsultForms(): HasMany
    {
        return $this->hasMany(PreConsultForm::class, 'patient_id');
    }
}
