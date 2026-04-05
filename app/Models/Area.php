<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'state',
        'liveability_score',
        'overall_score',
        'safety_score',
        'cost_score',
        'commute_score',
        'lifestyle_score',
        'review_count',
        'is_trending',
        'country',
        'description',
        'cost_data',
        'amenities',
        'images',
        'tags',
        'latitude',
        'longitude',
        'last_update',
    ];

    protected $casts = [
        'is_trending' => 'boolean',
        'liveability_score' => 'decimal:2',
        'overall_score' => 'decimal:2',
        'safety_score' => 'decimal:2',
        'cost_score' => 'decimal:2',
        'commute_score' => 'decimal:2',
        'lifestyle_score' => 'decimal:2',
        'review_count' => 'integer',
        'cost_data' => 'array',
        'amenities' => 'array',
        'images' => 'array',
        'tags' => 'array',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
