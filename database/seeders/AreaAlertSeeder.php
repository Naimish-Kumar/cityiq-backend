<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\AreaAlert;
use App\Models\User;
use Illuminate\Database\Seeder;

class AreaAlertSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        foreach (Area::where('is_trending', true)->get() as $area) {
            AreaAlert::updateOrCreate([
                'user_id' => $user->id,
                'area_id' => $area->id,
                'type' => 'score_change',
            ], [
                'user_id' => $user->id,
                'area_id' => $area->id,
                'type' => 'score_change',
                'title' => $area->name . ' moved this week',
                'message' => 'Liveability score changed enough to review commute, cost, and community signals again.',
                'previous_score' => max(0, (float) $area->liveability_score - 2.5),
                'current_score' => (float) $area->liveability_score,
                'is_read' => false,
                'meta' => ['change_direction' => 'up'],
            ]);
        }
    }
}
