<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\CommuteSimulation;
use Illuminate\Http\Request;

class CommuteSimulationController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()->commuteSimulations()->with('area')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'area_id' => 'required|exists:areas,id',
            'work_location' => 'required|string|max:255',
            'preferred_mode' => 'nullable|string|max:50',
        ]);

        $area = Area::findOrFail($payload['area_id']);
        $simulationData = $this->simulate($area, $payload['work_location'], $payload['preferred_mode'] ?? null);

        $simulation = CommuteSimulation::create([
            'user_id' => $request->user()->id,
            'area_id' => $area->id,
            'work_location' => $payload['work_location'],
            'peak_minutes' => $simulationData['peak_minutes'],
            'off_peak_minutes' => $simulationData['off_peak_minutes'],
            'stress_level' => $simulationData['stress_level'],
            'recommended_mode' => $simulationData['recommended_mode'],
            'monthly_cost' => $simulationData['monthly_cost'],
            'alternative_routes' => $simulationData['alternative_routes'],
            'meta' => $simulationData['meta'],
        ]);

        return response()->json($simulation->load('area'), 201);
    }

    private function simulate(Area $area, string $workLocation, ?string $preferredMode): array
    {
        $peak = max(18, (int) round(115 - (float) $area->commute_score));
        $offPeak = max(12, $peak - 12);
        $stress = $peak >= 55 ? 'nightmare' : ($peak >= 40 ? 'high' : ($peak >= 28 ? 'medium' : 'low'));
        $mode = $preferredMode ?: ($area->country === 'AE' ? 'metro + walk' : 'metro');
        $monthlyCost = round((float) data_get($area->cost_data, 'avg_transport', 0) * ($peak > 45 ? 1.18 : 1.0), 2);

        return [
            'peak_minutes' => $peak,
            'off_peak_minutes' => $offPeak,
            'stress_level' => $stress,
            'recommended_mode' => $mode,
            'monthly_cost' => $monthlyCost,
            'alternative_routes' => [
                ['name' => 'Primary route', 'eta' => $peak, 'mode' => $mode],
                ['name' => 'Lower stress option', 'eta' => $peak + 9, 'mode' => 'mixed'],
            ],
            'meta' => [
                'peak_window' => '7-10 AM / 5-9 PM',
                'work_location' => $workLocation,
                'signal_quality' => 'modeled from area commute score',
            ],
        ];
    }
}
