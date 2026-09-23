<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'patient_id',
        'subtotal',
        'shipping_amount',
        'discount_amount',
        'total_amount',
        'status',
        'payment_status',
        'payment_method',
        'transaction_id',
        'shipping_name',
        'shipping_phone',
        'shipping_address_line1',
        'shipping_address_line2',
        'shipping_city',
        'shipping_state',
        'shipping_postcode',
        'tracking_number',
        'tracking_carrier',
        'customer_notes',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping_amount' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'total_amount' => 'decimal:2',
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
