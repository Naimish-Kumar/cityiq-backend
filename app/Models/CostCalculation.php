<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCalculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'monthly_salary',
        'currency',
        'lifestyle_tier',
        'occupants',
        'work_location',
        'inputs',
        'output',
        'estimated_total',
        'estimated_savings',
        'savings_percentage',
    ];

    protected $casts = [
        'monthly_salary' => 'decimal:2',
        'estimated_total' => 'decimal:2',
        'estimated_savings' => 'decimal:2',
        'savings_percentage' => 'decimal:2',
        'inputs' => 'array',
        'output' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
