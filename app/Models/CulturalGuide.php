<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalGuide extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dress_norms' => 'array',
        'religious_customs' => 'array',
        'food_laws' => 'array',
        'legal_bans' => 'array',
        'tipping_etiquette' => 'array',
        'gestures_to_avoid' => 'array',
        'bargaining_rules' => 'array',
        'business_tips' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
