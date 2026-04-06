<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommuteSimulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'work_location',
        'peak_minutes',
        'off_peak_minutes',
        'stress_level',
        'recommended_mode',
        'monthly_cost',
        'alternative_routes',
        'meta',
    ];

    protected $casts = [
        'peak_minutes' => 'integer',
        'off_peak_minutes' => 'integer',
        'monthly_cost' => 'decimal:2',
        'alternative_routes' => 'array',
        'meta' => 'array',
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
