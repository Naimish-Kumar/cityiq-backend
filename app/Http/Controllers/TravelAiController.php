<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\AiQuery;
use Illuminate\Http\Request;

class TravelAiController extends Controller
{
    /**
     * AI Tour Guide - Conversational query for travel intelligence.
     */
    public function query(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
            'country_code' => 'nullable|string|exists:countries,code',
            'context' => 'nullable|json', // Budget, traveler type, etc.
        ]);

        $query = $request->query('query');
        $countryCode = $request->input('country_code');
        $country = $countryCode ? Country::where('code', strtoupper($countryCode))->first() : null;

        $response = $this->generateAiResponse($query, $country);

        // Save to AI history (Module 2 requirement)
        $aiQuery = AiQuery::create([
            'user_id' => $request->user()->id,
            'query' => $query,
            'response' => $response,
            'type' => 'tour_guide',
        ]);

        return response()->json($aiQuery, 201);
    }

    /**
     * Logic for generating travel-specific AI responses.
     * In production, this would call Claude Sonnet API.
     */
    private function generateAiResponse($query, ?Country $country = null)
    {
        $q = strtolower($query);
        $countryName = $country ? $country->name : 'your destination';

        if (str_contains($q, 'itinerary') || str_contains($q, 'plan')) {
            return $this->mockItineraryResponse($country);
        }

        if (str_contains($q, 'budget') || str_contains($q, 'how much')) {
            return $this->mockBudgetResponse($country);
        }

        if (str_contains($q, 'visa')) {
            return $this->mockVisaResponse($country);
        }

        if (str_contains($q, 'safe') || str_contains($q, 'safety')) {
            return "Safety Intelligence for " . $countryName . ": " . 
                   ($country ? data_get($country->insights, 'safety', 'Safety is moderate.') : 'General safety advice: Check local advisories.') . 
                   "\n\nHistorical Scam database indicates high activity near major monuments. Recommendation: Watch for 'pre-paid taxi' and 'closed temple' scams.";
        }

        return "I am your CityIQ v2.0 AI Tour Guide. I can help with itineraries, budgets, visa guidance, and safety intelligence for " . $countryName . ". What's your specific question?";
    }

    private function mockItineraryResponse(?Country $country)
    {
        $name = $country ? $country->name : 'Thailand';
        return "Day 1: Arrival and orientation. Explore the capital's main square.\n" .
               "Day 2: Cultural immersion. Visit the main cathedral/temple and local market.\n" .
               "Day 3: Hidden gems. A local-recommended neighborhood and street food tour.\n" .
               "\nThis itinerary for " . $name . " considers your budget and preferences. Should I add more details?";
    }

    private function mockBudgetResponse(?Country $country)
    {
        if (!$country) return "Typical daily budget: $30 (Backpacker) to $150 (Comfortable).";
        
        $b = $country->budgets;
        return "Daily Budget for " . $country->name . ":\n" .
               "- Backpacker: " . ($b['backpacker']['min'] ?? '0') . "-" . ($b['backpacker']['max'] ?? '0') . " " . $country->currency_code . " (" . ($b['backpacker']['description'] ?? '') . ")\n" .
               "- Mid-Range: " . ($b['mid_range']['min'] ?? '0') . "-" . ($b['mid_range']['max'] ?? '0') . " " . $country->currency_code . " (" . ($b['mid_range']['description'] ?? '') . ")\n" .
               "- Comfortable: " . ($b['comfortable']['min'] ?? '0') . "-" . ($b['comfortable']['max'] ?? '0') . " " . $country->currency_code . " (" . ($b['comfortable']['description'] ?? '') . ")";
    }

    private function mockVisaResponse(?Country $country)
    {
        if (!$country) return "Visa requirements vary by passport. Generally, check if your passport allows Visa-on-arrival.";
        
        return "Visa Intelligence for " . $country->name . ": " . 
               ($country ? data_get($country->insights, 'visa', 'Consult embassy website.') : 'Data unavailable.');
    }
}
