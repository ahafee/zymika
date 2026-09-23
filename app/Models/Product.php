<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'category',
        'brand',
        'short_description',
        'description',
        'thc_potency',
        'cbd_potency',
        'form_factor',
        'terpene_profile',
        'tga_schedule',
        'price',
        'stock_quantity',
        'is_prescription_required',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock_quantity' => 'integer',
            'is_prescription_required' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
