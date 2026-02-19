<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'customer_name',
        'fuel_type',
        'liters',
        'total_price',
    ];

    /**
     * Fuel type options for dropdown.
     */
    public const FUEL_TYPES = [
        'Pertalite',
        'Pertamax',
        'Pertamax Turbo',
        'Solar',
        'Dexlite',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'liters' => 'decimal:2',
            'total_price' => 'decimal:2',
        ];
    }

    /**
     * Format total_price as IDR (Rupiah).
     */
    public function getFormattedTotalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }
}
