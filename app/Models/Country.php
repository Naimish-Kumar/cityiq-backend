<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'insights' => 'array',
        'budgets' => 'array',
        'images' => 'array',
    ];

    /**
     * Get the areas within this country.
     */
    public function areas()
    {
        return $this->hasMany(Area::class, 'country', 'code');
    }

    /**
     * Get the visa requirements for this country.
     */
    public function visaRequirements()
    {
        return $this->hasMany(VisaRequirement::class);
    }

    /**
     * Get the health guides for this country.
     */
    public function healthGuides()
    {
        return $this->hasMany(HealthGuide::class);
    }

    /**
     * Get the cultural guides for this country.
     */
    public function culturalGuides()
    {
        return $this->hasMany(CulturalGuide::class);
    }

    /**
     * Get the scam alerts for this country.
     */
    public function scamAlerts()
    {
        return $this->hasMany(ScamAlert::class);
    }

    /**
     * Get the transport reality data for this country.
     */
    public function transportInfo()
    {
        return $this->hasMany(TransportInfo::class);
    }

    /**
     * Get the best time to visit data for this country.
     */
    public function visitTiming()
    {
        return $this->hasMany(VisitTiming::class);
    }
}
