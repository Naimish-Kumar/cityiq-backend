<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthGuide extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'disease_risks' => 'array',
        'vaccinations_required' => 'array',
        'vaccinations_recommended' => 'array',
        'healthcare_facilities' => 'array',
        'emergency_contacts' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
