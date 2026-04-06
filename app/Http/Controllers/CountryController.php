<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\VisaRequirement;
use App\Models\HealthGuide;
use App\Models\CulturalGuide;
use App\Models\ScamAlert;
use App\Models\TransportInfo;
use App\Models\VisitTiming;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of countries with scores for map/explorer view.
     */
    public function index()
    {
        return Country::select([
            'id', 'name', 'code', 'region', 
            'safety_score', 'cost_score', 'health_score', 'visa_score',
            'infrastructure_score', 'cultural_welcome_score', 
            'digital_connectivity_score', 'environmental_score'
        ])->get();
    }

    /**
     * Display the specified country with full intelligence profile.
     */
    public function show($code)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        
        // Include related intelligence modules
        $country->load([
            'healthGuides', 
            'culturalGuides', 
            'scamAlerts' => function($query) {
                $query->where('is_verified', true)->orderBy('report_count', 'desc');
            },
            'transportInfo',
            'visitTiming'
        ]);

        return $country;
    }

    /**
     * Get visa requirements for a specific passport-destination combination.
     */
    public function visa($code, $passport)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        
        $visa = VisaRequirement::where('country_id', $country->id)
            ->where('passport_country_code', strtoupper($passport))
            ->first();

        if (!$visa) {
            return response()->json([
                'message' => 'Visa guidance not yet available for this combination.',
                'status' => 'Data Unavailable'
            ], 404);
        }

        return $visa;
    }

    /**
     * Get cultural guidance for a country.
     */
    public function culture($code)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        return CulturalGuide::where('country_id', $country->id)->first();
    }

    /**
     * Get health guidance for a country.
     */
    public function health($code)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        return HealthGuide::where('country_id', $country->id)->first();
    }

    /**
     * Get real-time and historical scam alerts for a country.
     */
    public function scams($code)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        return ScamAlert::where('country_id', $country->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get transport reality and logistics for a country.
     */
    public function transport($code)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        return TransportInfo::where('country_id', $country->id)->get();
    }

    /**
     * Get visit timing intelligence.
     */
    public function visitTiming($code)
    {
        $country = Country::where('code', strtoupper($code))->firstOrFail();
        return VisitTiming::where('country_id', $country->id)
            ->orderBy('month', 'asc')
            ->get();
    }
}
