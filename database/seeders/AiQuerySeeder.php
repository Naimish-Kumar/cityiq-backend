<?php

namespace Database\Seeders;

use App\Models\AiQuery;
use App\Models\User;
use Illuminate\Database\Seeder;

class AiQuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testUser = User::where('email', 'test@example.com')->first();
        if (!$testUser) return;

        $queries = [
            [
                'query' => 'What is the best area for startups in Bangalore?',
                'response' => 'Koramangala is widely considered the best area for startups due to its vibrant ecosystem, numerous co-working spaces, and high density of tech talent.',
                'type' => 'area_insight',
            ],
            [
                'query' => 'Is Dubai Marina safe for families?',
                'response' => 'Yes, Dubai Marina is very safe with 24/7 security in most buildings and well-lit public walkways. It has several family-friendly amenities like parks and nurseries.',
                'type' => 'safety',
            ],
            [
                'query' => 'Compare cost of living between Indiranagar and HSR Layout.',
                'response' => 'Indiranagar is generally 20-30% more expensive than HSR Layout, especially in terms of rent and dining out. HSR Layout offers better value for money while still being a planned locality.',
                'type' => 'cost_comparison',
            ]
        ];

        foreach ($queries as $data) {
            AiQuery::updateOrCreate(
                ['user_id' => $testUser->id, 'query' => $data['query']],
                [
                    'response' => $data['response'],
                    'type' => $data['type'],
                ]
            );
        }
    }
}
