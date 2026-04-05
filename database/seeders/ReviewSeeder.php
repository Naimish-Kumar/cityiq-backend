<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Area;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testUser = User::where('email', 'test@example.com')->first();
        $areas = Area::all();

        if (!$testUser || $areas->isEmpty()) return;

        // Create some more users for variety in reviews
        $users = User::factory(5)->create();
        $allUsers = $users->push($testUser);

        $contents = [
            'Koramangala' => [
                'Great place for foodies! The traffic can be a bit much during peak hours though.',
                'The startup energy here is infectious. Every cafe is a potential meeting room.',
                'A bit noisy on weekends, but the bar scene is top-notch in Bangalore.'
            ],
            'Indiranagar' => [
                'Indiranagar is the soul of old Bangalore blended with new breweries.',
                '100ft road is getting crowded but the inner lanes are still quiet and green.',
                'Best breakfast spots in town are definitely here.'
            ],
            'HSR Layout' => [
                'Much more planned and cleaner than most parts of Silicon Valley (India).',
                'Great for families and young professionals working nearby.',
                'The parks are well-maintained. Very safe for late-night walks.'
            ],
            'Dubai Marina' => [
                'The walk around the marina is therapeutic. Luxury at its finest.',
                'Expensive but the convenience and views are unbeatable.',
                'Perfect place for expats. Everything is within reach.'
            ]
        ];

        foreach ($areas as $area) {
            if (isset($contents[$area->name])) {
                foreach ($contents[$area->name] as $index => $text) {
                    Review::create([
                        'user_id' => $allUsers->random()->id,
                        'area_id' => $area->id,
                        'content' => $text,
                        'rating' => rand(4, 5),
                        'tags' => ['vibes', 'community'],
                        'likes' => rand(5, 50),
                        'is_verified_local' => ($index % 2 == 0),
                    ]);
                }
            }
        }
    }
}
