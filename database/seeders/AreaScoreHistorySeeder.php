<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\AreaScoreHistory;
use Illuminate\Database\Seeder;

class AreaScoreHistorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (Area::all() as $area) {
            for ($daysAgo = 6; $daysAgo >= 0; $daysAgo--) {
                $swing = 3 - $daysAgo;

                AreaScoreHistory::updateOrCreate([
                    'area_id' => $area->id,
                    'captured_at' => now()->subDays($daysAgo),
                ], [
                    'area_id' => $area->id,
                    'liveability_score' => max(0, min(100, (float) $area->liveability_score + $swing)),
                    'safety_score' => max(0, min(100, (float) $area->safety_score + ($swing / 2))),
                    'cost_score' => max(0, min(100, (float) $area->cost_score - ($swing / 3))),
                    'commute_score' => max(0, min(100, (float) $area->commute_score + ($swing / 4))),
                    'lifestyle_score' => max(0, min(100, (float) $area->lifestyle_score + ($swing / 5))),
                    'source' => 'seeded_daily_refresh',
                    'breakdown' => [
                        'cost_refresh' => '24h',
                        'safety_window' => '30d',
                        'community_signal' => rand(65, 95),
                    ],
                    'captured_at' => now()->subDays($daysAgo),
                ]);
            }
        }
    }
}
