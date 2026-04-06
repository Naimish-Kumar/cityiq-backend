<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaScoreHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'liveability_score',
        'safety_score',
        'cost_score',
        'commute_score',
        'lifestyle_score',
        'source',
        'breakdown',
        'captured_at',
    ];

    protected $casts = [
        'liveability_score' => 'decimal:2',
        'safety_score' => 'decimal:2',
        'cost_score' => 'decimal:2',
        'commute_score' => 'decimal:2',
        'lifestyle_score' => 'decimal:2',
        'breakdown' => 'array',
        'captured_at' => 'datetime',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
