<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\CommuteSimulation;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommuteSimulationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        foreach (Area::take(4)->get() as $area) {
            $peak = max(18, (int) round(110 - (float) $area->commute_score));
            $offPeak = max(12, $peak - rand(8, 16));
            $stress = $peak >= 55 ? 'nightmare' : ($peak >= 40 ? 'high' : ($peak >= 28 ? 'medium' : 'low'));

            CommuteSimulation::updateOrCreate([
                'user_id' => $user->id,
                'area_id' => $area->id,
                'work_location' => $area->city . ' Tech Park',
            ], [
                'user_id' => $user->id,
                'area_id' => $area->id,
                'work_location' => $area->city . ' Tech Park',
                'peak_minutes' => $peak,
                'off_peak_minutes' => $offPeak,
                'stress_level' => $stress,
                'recommended_mode' => $area->country === 'AE' ? 'metro + walk' : 'metro',
                'monthly_cost' => data_get($area->cost_data, 'avg_transport', 0),
                'alternative_routes' => [
                    ['label' => 'Fastest route', 'eta' => $peak, 'mode' => 'primary'],
                    ['label' => 'Balanced route', 'eta' => $peak + 8, 'mode' => 'mixed'],
                ],
                'meta' => [
                    'peak_window' => '7-10 AM / 5-9 PM',
                    'signal_source' => 'seeded historical traffic',
                ],
            ]);
        }
    }
}
