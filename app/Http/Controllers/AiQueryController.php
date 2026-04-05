<?php

namespace App\Http\Controllers;

use App\Models\AiQuery;
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
    public function store(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
            'type' => 'nullable|string',
        ]);

        // Placeholder for real AI logic integration later
        $response = $this->mockAiResponse($request->query);

        $aiQuery = AiQuery::create([
            'user_id' => $request->user()->id,
            'query' => $request->query,
            'response' => $response,
            'type' => $request->type ?? 'general',
        ]);

        return response()->json($aiQuery, 201);
    }

    private function mockAiResponse($query)
    {
        $q = strtolower($query);
        if (str_contains($q, 'rent') || str_contains($q, 'cost')) {
            return "Based on recent datasets, areas like Koramangala and HSR Layout have an average rent range of 20k to 35k for 1BHK. Costs are slightly lower towards the outskirts.";
        }
        if (str_contains($q, 'safe') || str_contains($q, 'safety')) {
            return "Safety scores for South Bangalore remain high at above 85/100, while North Bangalore is catching up with increased police patrolling and gated communities.";
        }
        return "I've analyzed your question about city metrics. CityIQ data shows high liveability indicators for the requested parameters. How else can I assist your search today?";
    }
}
