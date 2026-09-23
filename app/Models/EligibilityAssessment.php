<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EligibilityAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'age_bracket',
        'primary_conditions',
        'condition_duration',
        'previous_treatments',
        'tried_standard_medications',
        'is_pregnant_or_breastfeeding',
        'has_psychosis_history',
        'has_cardiovascular_issues',
        'is_eligible',
        'clinical_rationale',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'primary_conditions' => 'array',
            'previous_treatments' => 'array',
            'tried_standard_medications' => 'boolean',
            'is_pregnant_or_breastfeeding' => 'boolean',
            'has_psychosis_history' => 'boolean',
            'has_cardiovascular_issues' => 'boolean',
            'is_eligible' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(Appointment::class);
    }
}
