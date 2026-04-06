<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\CostCalculation;
use App\Models\User;
use Illuminate\Database\Seeder;

class CostCalculationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        foreach (Area::take(4)->get() as $area) {
            $salary = $area->country === 'AE' ? 28000 : 120000;
            $rent = data_get($area->cost_data, 'avg_rent_1_bhk', 0);
            $food = data_get($area->cost_data, 'avg_food_moderate', 0);
            $transport = data_get($area->cost_data, 'avg_transport', 0);
            $utilities = data_get($area->cost_data, 'avg_utilities', 0);
            $entertainment = round($food * 0.35, 2);
            $total = $rent + $food + $transport + $utilities + $entertainment;
            $savings = $salary - $total;

            CostCalculation::updateOrCreate([
                'user_id' => $user->id,
                'area_id' => $area->id,
                'lifestyle_tier' => 'moderate',
                'occupants' => 'solo',
            ], [
                'user_id' => $user->id,
                'area_id' => $area->id,
                'monthly_salary' => $salary,
                'currency' => $area->country === 'AE' ? 'AED' : 'INR',
                'lifestyle_tier' => 'moderate',
                'occupants' => 'solo',
                'work_location' => $area->city . ' CBD',
                'inputs' => [
                    'salary' => $salary,
                    'lifestyle_tier' => 'moderate',
                    'occupants' => 'solo',
                ],
                'output' => [
                    'rent' => $rent,
                    'food' => $food,
                    'transport' => $transport,
                    'utilities' => $utilities,
                    'entertainment' => $entertainment,
                ],
                'estimated_total' => $total,
                'estimated_savings' => $savings,
                'savings_percentage' => $salary > 0 ? round(($savings / $salary) * 100, 2) : 0,
            ]);
        }
    }
}
