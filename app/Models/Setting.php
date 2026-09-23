<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        if (! $setting) {
            return $default;
        }

        return match ($setting->type) {
            'boolean' => filter_var($setting->value, FILTER_VALIDATE_BOOLEAN),
            'json' => json_decode($setting->value, true) ?? $default,
            default => $setting->value,
        };
    }

    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'string'): static
    {
        $stringValue = is_array($value) ? json_encode($value) : (string) $value;

        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $stringValue, 'group' => $group, 'type' => $type]
        );
    }
}
