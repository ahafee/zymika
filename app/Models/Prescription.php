<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_number',
        'patient_id',
        'doctor_id',
        'product_id',
        'medication_name',
        'dosage_instructions',
        'repeats_total',
        'repeats_left',
        'tga_sas_category',
        'status',
        'issued_date',
        'expiry_date',
        'medirecords_script_id',
        'clinical_notes',
    ];

    protected function casts(): array
    {
        return [
            'issued_date' => 'date',
            'expiry_date' => 'date',
            'repeats_total' => 'integer',
            'repeats_left' => 'integer',
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

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function canBeDispensed(): bool
    {
        return $this->status === 'active' && $this->repeats_left > 0 && $this->expiry_date >= now()->toDateString();
    }
}
