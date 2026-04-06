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
    public function store(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
            'type' => 'nullable|string',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $response = $this->mockAiResponse($request->query, $request->area_id ? Area::find($request->area_id) : null);

        $aiQuery = AiQuery::create([
            'user_id' => $request->user()->id,
            'query' => $request->query,
            'response' => $response,
            'type' => $request->type ?? 'general',
        ]);

        return response()->json($aiQuery, 201);
    }

    private function mockAiResponse($query, ?Area $area = null)
    {
        $q = strtolower($query);
        $prefix = $area
            ? "{$area->name}, {$area->city} currently scores {$area->liveability_score}/100 with safety {$area->safety_score}, cost {$area->cost_score}, commute {$area->commute_score}, and lifestyle {$area->lifestyle_score}. "
            : '';

        if (str_contains($q, 'rent') || str_contains($q, 'cost')) {
            $rent = $area ? data_get($area->cost_data, 'avg_rent_1_bhk', 'n/a') : '20k to 35k';
            return $prefix . "Cost view: expected 1 BHK rent is {$rent}. Recommendation is grounded in stored area cost data, user review sentiment, and the current liveability breakdown.";
        }
        if (str_contains($q, 'safe') || str_contains($q, 'safety')) {
            return $prefix . "Safety recommendation is based on the current safety score plus community feed signals. Verified local posts should be prioritized when making the final decision.";
        }
        if (str_contains($q, 'commute') || str_contains($q, 'traffic')) {
            return $prefix . "Commute difficulty is inferred from the area commute score and recent modeled traffic stress. Peak hours should be checked against a saved commute simulation for the most reliable answer.";
        }
        return $prefix . "This answer is grounded in CityIQ area scores, cost inputs, commute modeling, and moderated community posts. Ask for cost, safety, commute, or comparison details for a sharper recommendation.";
    }
}
