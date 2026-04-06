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
    public function query(Request $request, \App\Services\AiService $ai)
    {
        $request->validate([
            'query' => 'required|string',
            'country_code' => 'nullable|string|exists:countries,code',
            'context' => 'nullable|json',
        ]);

        $queryText = $request->input('query');
        $countryCode = $request->input('country_code');
        $country = $countryCode ? Country::where('code', strtoupper($countryCode))->first() : null;

        $prompt = "You are CityIQ v2.0 AI Tour Guide. Provide travel intelligence based on the following context.\n";
        if ($country) {
            $prompt .= "Country Context: {$country->name} ({$country->code}).\n";
            $prompt .= "Insights: " . json_encode($country->insights) . "\n";
            $prompt .= "Budgets: " . json_encode($country->budgets) . "\n";
        }
        $prompt .= "User Query: {$queryText}\n";
        $prompt .= "Constraint: Provide specific advice on itineraries, safety, or costs if asked. Keep response elegant and under 150 words.";

        $response = $ai->ask($prompt);

        $aiQuery = AiQuery::create([
            'user_id' => $request->user()->id,
            'query' => $queryText,
            'response' => $response,
            'type' => 'tour_guide',
        ]);

        return response()->json($aiQuery, 201);
    }
}
