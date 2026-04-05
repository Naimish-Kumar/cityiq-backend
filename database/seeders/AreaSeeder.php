<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'name' => 'Koramangala',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'country' => 'IN',
                'liveability_score' => 88.5,
                'overall_score' => 87.0,
                'safety_score' => 85.0,
                'cost_score' => 60.0,
                'commute_score' => 75.0,
                'lifestyle_score' => 95.0,
                'review_count' => 1240,
                'is_trending' => true,
                'description' => 'The startup hub of India, Koramangala is known for its vibrant nightlife, numerous restaurants, and proximity to tech parks.',
                'tags' => ['Startup Hub', 'Nightlife', 'Foodie Paradise'],
                'cost_data' => [
                    'avg_rent_1_bhk' => 25000,
                    'avg_rent_2_bhk' => 45000,
                    'avg_rent_3_bhk' => 65000,
                    'avg_food_basic' => 8000,
                    'avg_food_moderate' => 15000,
                    'avg_food_luxury' => 30000,
                    'avg_transport' => 3000,
                    'avg_utilities' => 4000,
                ],
                'amenities' => [
                    ['name' => 'Social', 'type' => 'Nightlife', 'distance' => 0.5, 'rating' => 4.5],
                    ['name' => 'St. Johns Hospital', 'type' => 'Health', 'distance' => 1.2, 'rating' => 4.2],
                    ['name' => 'Forum Mall', 'type' => 'Shopping', 'distance' => 0.8, 'rating' => 4.4],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1596422846543-75c6fc18a593',
                    'https://images.unsplash.com/photo-1570129477492-45c003edd2be'
                ],
                'latitude' => 12.9352,
                'longitude' => 77.6245,
                'last_update' => '2026-04-05',
            ],
            [
                'name' => 'Indiranagar',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'country' => 'IN',
                'liveability_score' => 92.0,
                'overall_score' => 91.0,
                'safety_score' => 88.0,
                'cost_score' => 50.0,
                'commute_score' => 70.0,
                'lifestyle_score' => 98.0,
                'review_count' => 850,
                'is_trending' => false,
                'description' => 'A premier residential and commercial hub, Indiranagar offers luxury living with high-end boutiques and the best breweries.',
                'tags' => ['Elite', 'High-end', 'Brewery Hub'],
                'cost_data' => [
                    'avg_rent_1_bhk' => 35000,
                    'avg_rent_2_bhk' => 60000,
                    'avg_rent_3_bhk' => 90000,
                    'avg_food_basic' => 10000,
                    'avg_food_moderate' => 20000,
                    'avg_food_luxury' => 45000,
                    'avg_transport' => 4000,
                    'avg_utilities' => 5000,
                ],
                'amenities' => [
                    ['name' => 'Toit', 'type' => 'Nightlife', 'distance' => 0.3, 'rating' => 4.8],
                    ['name' => 'Chinmaya Mission', 'type' => 'Health', 'distance' => 1.5, 'rating' => 4.3],
                    ['name' => '100ft Road Shopping', 'type' => 'Shopping', 'distance' => 0.1, 'rating' => 4.7],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1620332372374-f108c53d2e03'
                ],
                'latitude' => 12.9719,
                'longitude' => 77.6412,
                'last_update' => '2026-04-05',
            ],
            [
                'name' => 'HSR Layout',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'country' => 'IN',
                'liveability_score' => 84.0,
                'overall_score' => 85.0,
                'safety_score' => 91.0,
                'cost_score' => 75.0,
                'commute_score' => 82.0,
                'lifestyle_score' => 80.0,
                'review_count' => 950,
                'is_trending' => true,
                'description' => 'A planned residential suburb, HSR Layout is popular among startup employees for its wide roads and residential atmosphere.',
                'tags' => ['Planned', 'Quiet', 'Startup Residential'],
                'cost_data' => [
                    'avg_rent_1_bhk' => 20000,
                    'avg_rent_2_bhk' => 35000,
                    'avg_rent_3_bhk' => 50000,
                    'avg_food_basic' => 6000,
                    'avg_food_moderate' => 12000,
                    'avg_food_luxury' => 25000,
                    'avg_transport' => 2500,
                    'avg_utilities' => 3500,
                ],
                'amenities' => [
                    ['name' => 'Narayana Hospital', 'type' => 'Health', 'distance' => 2.0, 'rating' => 4.1],
                    ['name' => 'HSR Club', 'type' => 'Social', 'distance' => 1.0, 'rating' => 4.0],
                    ['name' => 'Agara Lake', 'type' => 'Park', 'distance' => 1.5, 'rating' => 4.6],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb'
                ],
                'latitude' => 12.9121,
                'longitude' => 77.6446,
                'last_update' => '2026-04-05',
            ],
            [
                'name' => 'Dubai Marina',
                'city' => 'Dubai',
                'state' => 'Dubai',
                'country' => 'AE',
                'liveability_score' => 94.0,
                'overall_score' => 95.0,
                'safety_score' => 98.0,
                'cost_score' => 30.0,
                'commute_score' => 85.0,
                'lifestyle_score' => 97.0,
                'review_count' => 3500,
                'is_trending' => true,
                'description' => 'Stunning skyline views and waterfront living, Dubai Marina is one of the most sought-after locations for expats.',
                'tags' => ['Waterfront', 'Skyscrapers', 'Expat Life'],
                'cost_data' => [
                    'avg_rent_1_bhk' => 120000, // Monthly AED approx
                    'avg_rent_2_bhk' => 180000,
                    'avg_rent_3_bhk' => 250000,
                    'avg_food_basic' => 2000,
                    'avg_food_moderate' => 5000,
                    'avg_food_luxury' => 15000,
                    'avg_transport' => 1000,
                    'avg_utilities' => 1500,
                ],
                'amenities' => [
                    ['name' => 'Marina Mall', 'type' => 'Shopping', 'distance' => 0.2, 'rating' => 4.6],
                    ['name' => 'Mediclinic', 'type' => 'Health', 'distance' => 1.0, 'rating' => 4.5],
                    ['name' => 'Pier 7', 'type' => 'Nightlife', 'distance' => 0.5, 'rating' => 4.9],
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1518684079-3c830dffe094'
                ],
                'latitude' => 25.0819,
                'longitude' => 55.1367,
                'last_update' => '2026-04-05',
            ]
        ];

        foreach ($areas as $areaData) {
            Area::create($areaData);
        }
    }
}
