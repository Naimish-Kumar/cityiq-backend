<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\CostCalculation;
use Illuminate\Http\Request;

class CostCalculatorController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->user()->costCalculations()->with('area')->latest()->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'area_id' => 'required|exists:areas,id',
            'monthly_salary' => 'required|numeric|min:0',
            'currency' => 'nullable|string|size:3',
            'lifestyle_tier' => 'required|string|in:basic,moderate,comfortable,luxury',
            'occupants' => 'required|string|in:solo,couple,family',
            'work_location' => 'nullable|string|max:255',
        ]);

        $area = Area::findOrFail($payload['area_id']);
        $result = $this->calculate($area, $payload);

        $calculation = CostCalculation::create([
            'user_id' => $request->user()->id,
            'area_id' => $area->id,
            'monthly_salary' => $payload['monthly_salary'],
            'currency' => $payload['currency'] ?? ($area->country === 'AE' ? 'AED' : 'INR'),
            'lifestyle_tier' => $payload['lifestyle_tier'],
            'occupants' => $payload['occupants'],
            'work_location' => $payload['work_location'] ?? null,
            'inputs' => $payload,
            'output' => $result['breakdown'],
            'estimated_total' => $result['estimated_total'],
            'estimated_savings' => $result['estimated_savings'],
            'savings_percentage' => $result['savings_percentage'],
        ]);

        return response()->json($calculation->load('area'), 201);
    }

    public function preview(Request $request)
    {
        $payload = $request->validate([
            'area_id' => 'required|exists:areas,id',
            'monthly_salary' => 'required|numeric|min:0',
            'lifestyle_tier' => 'required|string|in:basic,moderate,comfortable,luxury',
            'occupants' => 'required|string|in:solo,couple,family',
        ]);

        $area = Area::findOrFail($payload['area_id']);

        return response()->json($this->calculate($area, $payload));
    }

    private function calculate(Area $area, array $payload): array
    {
        $costData = $area->cost_data ?? [];
        $tierMultiplier = [
            'basic' => 0.85,
            'moderate' => 1.0,
            'comfortable' => 1.2,
            'luxury' => 1.55,
        ];
        $occupantMultiplier = [
            'solo' => 1.0,
            'couple' => 1.65,
            'family' => 2.35,
        ];

        $tier = $tierMultiplier[$payload['lifestyle_tier']];
        $occupants = $occupantMultiplier[$payload['occupants']];

        $rentBase = match ($payload['occupants']) {
            'solo' => data_get($costData, 'avg_rent_1_bhk', 0),
            'couple' => data_get($costData, 'avg_rent_2_bhk', data_get($costData, 'avg_rent_1_bhk', 0)),
            'family' => data_get($costData, 'avg_rent_3_bhk', data_get($costData, 'avg_rent_2_bhk', 0)),
        };

        $foodBase = match ($payload['lifestyle_tier']) {
            'basic' => data_get($costData, 'avg_food_basic', 0),
            'moderate' => data_get($costData, 'avg_food_moderate', 0),
            default => data_get($costData, 'avg_food_luxury', data_get($costData, 'avg_food_moderate', 0)),
        };

        $rent = round($rentBase * max(1, $tier * 0.95), 2);
        $food = round($foodBase * $occupants, 2);
        $transport = round(data_get($costData, 'avg_transport', 0) * max(1, $occupants * 0.8), 2);
        $utilities = round(data_get($costData, 'avg_utilities', 0) * max(1, $occupants * 0.9), 2);
        $entertainment = round(($foodBase * 0.35) * $tier, 2);
        $total = round($rent + $food + $transport + $utilities + $entertainment, 2);
        $savings = round(($payload['monthly_salary'] ?? 0) - $total, 2);
        $savingsPercentage = $payload['monthly_salary'] > 0 ? round(($savings / $payload['monthly_salary']) * 100, 2) : 0;

        return [
            'estimated_total' => $total,
            'estimated_savings' => $savings,
            'savings_percentage' => $savingsPercentage,
            'breakdown' => [
                'rent' => ['value' => $rent, 'range' => [$rent * 0.9, $rent * 1.1]],
                'food' => ['value' => $food],
                'transport' => ['value' => $transport],
                'utilities' => ['value' => $utilities],
                'entertainment' => ['value' => $entertainment],
            ],
        ];
    }
}
