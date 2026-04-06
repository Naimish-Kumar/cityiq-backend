<?php

namespace App\Http\Controllers;

use App\Models\AiQuery;
use App\Models\Area;
use Illuminate\Http\Request;

class AiQueryController extends Controller
{
    /**
     * Fetch all AI queries for the user.
     */
    public function index(Request $request)
    {
        $queries = $request->user()->aiQueries()->latest()->get();
        return response()->json($queries);
    }

    /**
     * Send a query to the AI Assistant and save the result.
     */
    public function store(Request $request, \App\Services\AiService $ai)
    {
        $request->validate([
            'query' => 'required|string',
            'type' => 'nullable|string',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $queryText = $request->input('query');
        $area = $request->area_id ? Area::find($request->area_id) : null;
        
        $prompt = "You are CityIQ Zenith AI. Provide a sharp, grounded recommendation based on the following input.\n";
        if ($area) {
            $prompt .= "Area Context: {$area->name}, {$area->city}. Liveability: {$area->liveability_score}, Safety: {$area->safety_score}, Cost: {$area->cost_score}, Commute: {$area->commute_score}, Lifestyle: {$area->lifestyle_score}.\n";
            $prompt .= "Cost Data: " . json_encode($area->cost_data) . "\n";
            $prompt .= "Amenities: " . implode(', ', $area->amenities ?? []) . "\n";
        }
        $prompt .= "User Query: {$queryText}\n";
        $prompt .= "Constraint: Keep the response under 100 words, be data-driven, and sound premium.";

        $response = $ai->ask($prompt);

        $aiQuery = AiQuery::create([
            'user_id' => $request->user()->id,
            'query' => $queryText,
            'response' => $response,
            'type' => $request->type ?? 'general',
        ]);

        return response()->json($aiQuery, 201);
    }
}
