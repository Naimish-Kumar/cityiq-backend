<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\VisaRequirement;
use App\Models\HealthGuide;
use App\Models\CulturalGuide;
use App\Models\VisitTiming;
use App\Models\TransportInfo;
use App\Models\ScamAlert;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. INDIA
        $india = Country::updateOrCreate(['code' => 'IN'], [
            'name' => 'India',
            'region' => 'South Asia',
            'safety_score' => 62,
            'cost_score' => 91,
            'health_score' => 58,
            'visa_score' => 85,
            'infrastructure_score' => 74,
            'cultural_welcome_score' => 72,
            'digital_connectivity_score' => 78,
            'environmental_score' => 45,
            'insights' => [
                'safety' => 'Varies enormously by state. Delhi: 55, Goa: 72, Kerala: 80',
                'cost' => 'Among world\'s cheapest. $25–40/day mid-range is comfortable',
                'health' => 'Water not safe to drink. Vaccinations: Hep A, Typhoid, Malaria pills for rural',
                'visa' => 'e-Visa available for most. $25. Approved in 48–72 hours',
                'infrastructure' => 'Major cities excellent. Rural: limited ATMs, language barrier',
                'cultural_welcome' => 'Extremely hospitable. Women travelers need to dress conservatively',
                'digital' => 'Jio SIM: ₹299 for 28 days unlimited data. Works everywhere except hills',
                'environmental' => 'Air quality critical Oct–Feb in Delhi, Punjab. Avoid if respiratory issues',
            ],
            'budgets' => [
                'backpacker' => ['min' => 1500, 'max' => 2500, 'currency' => 'INR', 'description' => 'Hostel dorm ₹400-600, Street food thali ₹60-120, Local bus/metro'],
                'mid_range' => ['min' => 3500, 'max' => 6000, 'currency' => 'INR', 'description' => 'Budget AC room ₹800-1,500, Restaurant meal ₹200-500, Uber/Ola'],
                'comfortable' => ['min' => 8000, 'max' => 15000, 'currency' => 'INR', 'description' => 'Good hotel ₹3,000-6,000, Fine dining ₹600-1,500, Private car hire'],
            ],
            'currency_code' => 'INR',
            'currency_symbol' => '₹',
            'exchange_rate_to_inr' => 1.0,
            'description' => 'Diverse and culturally rich, India offers everything from the Himalayas to tropical beaches.',
        ]);

        // 2. UAE (DUBAI)
        $uae = Country::updateOrCreate(['code' => 'AE'], [
            'name' => 'United Arab Emirates',
            'region' => 'Middle East',
            'safety_score' => 92,
            'cost_score' => 48,
            'health_score' => 88,
            'visa_score' => 72,
            'infrastructure_score' => 95,
            'cultural_welcome_score' => 78,
            'digital_connectivity_score' => 88,
            'environmental_score' => 70,
            'insights' => [
                'safety' => 'One of world\'s safest cities. Very low petty crime. Women safe solo',
                'cost' => 'Dining: AED 60–200. Hotels: AED 300–800/night. Alcohol in venues only',
                'health' => 'World-class hospitals. No vaccinations required. Tap water safe',
                'visa' => 'Visa on arrival for most. Some nationalities need pre-approval',
                'infrastructure' => 'Best-in-class. Metro, taxis, apps all work flawlessly',
                'cultural_welcome' => 'Respectful dress required in malls/mosques. No PDA in public',
                'digital' => 'Fast 5G everywhere. VoIP (WhatsApp calls) blocked — use local SIM',
                'environmental' => 'Air conditioning everywhere. Sandstorms Apr–Jun. Summer heat extreme',
            ],
            'budgets' => [
                'backpacker' => ['min' => 150, 'max' => 250, 'currency' => 'AED', 'description' => 'Hostel dorm AED 60–80, Shawarma/biryani AED 15–30, Metro AED 5–10'],
                'mid_range' => ['min' => 400, 'max' => 700, 'currency' => 'AED', 'description' => '3-star hotel AED 200–350, Restaurant meal AED 60–120, Uber AED 20–50'],
                'comfortable' => ['min' => 1000, 'max' => 2000, 'currency' => 'AED', 'description' => '4-5 star hotel AED 500–1,500, Fine dining AED 150–400, Private transfers'],
            ],
            'currency_code' => 'AED',
            'currency_symbol' => 'د.إ',
            'exchange_rate_to_inr' => 22.50,
            'description' => 'A futuristic hub in the desert, known for luxury shopping, ultramodern architecture, and a lively nightlife scene.',
        ]);

        // 3. THAILAND
        $thailand = Country::updateOrCreate(['code' => 'TH'], [
            'name' => 'Thailand',
            'region' => 'Southeast Asia',
            'safety_score' => 68,
            'cost_score' => 88,
            'health_score' => 70,
            'visa_score' => 90,
            'infrastructure_score' => 88,
            'cultural_welcome_score' => 82,
            'digital_connectivity_score' => 82,
            'environmental_score' => 60,
            'insights' => [
                'safety' => 'Generally safe for tourists. Traffic fatality rate is high — be careful on roads',
                'cost' => 'Best value-to-experience ratio in Southeast Asia. $35–60/day comfortable',
                'health' => 'Hep A, Typhoid recommended. Dengue risk. Private hospitals are excellent',
                'visa' => '60-day tourist visa on arrival for most nationalities. Extendable.',
                'infrastructure' => 'Bangkok BTS/MRT world-class. Islands: boats, mini-vans, ferries all reliable',
                'cultural_welcome' => '\'Land of Smiles\' is genuine. Never disrespect the King or Buddhas',
                'digital' => 'AIS/DTAC tourist SIMs: 30 days unlimited ฿450. Fast everywhere except islands',
                'environmental' => 'Bangkok air quality poor Nov–Feb. Islands have plastic pollution issues',
            ],
            'budgets' => [
                'backpacker' => ['min' => 700, 'max' => 1200, 'currency' => 'THB', 'description' => 'Hostel ฿200–400, Street pad thai ฿50–80, Songthaew taxi ฿10–30'],
                'mid_range' => ['min' => 1800, 'max' => 3500, 'currency' => 'THB', 'description' => 'Guesthouse ฿600–1,200, Restaurant ฿150–350, Grab taxi ฿80–200'],
                'comfortable' => ['min' => 4000, 'max' => 8000, 'currency' => 'THB', 'description' => 'Boutique hotel ฿1,500–3,000, Rooftop bar dinner ฿500–1,000, Private tours'],
            ],
            'currency_code' => 'THB',
            'currency_symbol' => '฿',
            'exchange_rate_to_inr' => 2.30,
            'description' => 'Tropical beaches, opulent royal palaces, ancient ruins, and ornate temples displaying figures of Buddha.',
        ]);

        // 4. JAPAN
        $japan = Country::updateOrCreate(['code' => 'JP'], [
            'name' => 'Japan',
            'region' => 'East Asia',
            'safety_score' => 96,
            'cost_score' => 52,
            'health_score' => 94,
            'visa_score' => 55,
            'infrastructure_score' => 98,
            'cultural_welcome_score' => 75,
            'digital_connectivity_score' => 85,
            'environmental_score' => 88,
            'insights' => [
                'safety' => 'One of world\'s safest. Lost wallets returned. Zero street harassment',
                'cost' => 'More affordable than reputation suggests. Food is cheap. Hotels are not.',
                'health' => 'Best healthcare system in Asia. Tap water safe. No vaccinations needed',
                'visa' => 'Visa required. 4–6 week processing. Bank statements, employer letter needed',
                'infrastructure' => 'Train system is miraculous. JR Pass essential for travel between cities',
                'cultural_welcome' => 'Polite but not effusive. Follow rules: no eating while walking, quiet on trains',
                'digital' => 'Pocket WiFi rental at airport ¥300–500/day. SIM also available. 5G in cities',
                'environmental' => 'Exceptionally clean. Cherry blossom season: overtourism is now a real issue',
            ],
            'budgets' => [
                'backpacker' => ['min' => 7000, 'max' => 12000, 'currency' => 'JPY', 'description' => 'Capsule hotel ¥3,500–5,000, Convenience store meals ¥500–800, IC card transit'],
                'mid_range' => ['min' => 15000, 'max' => 25000, 'currency' => 'JPY', 'description' => 'Business hotel ¥8,000–14,000, Ramen restaurant ¥1,000–3,000, JR Pass amortised'],
                'comfortable' => ['min' => 30000, 'max' => 60000, 'currency' => 'JPY', 'description' => 'Boutique hotel ¥20,000–40,000, Kaiseki dinner ¥8,000–20,000, Private experiences'],
            ],
            'currency_code' => 'JPY',
            'currency_symbol' => '¥',
            'exchange_rate_to_inr' => 0.55,
            'description' => 'Island country in East Asia, blending traditional culture with modern influence and cutting-edge technology.',
        ]);
        
        // 5. SINGAPORE
        $singapore = Country::updateOrCreate(['code' => 'SG'], [
            'name' => 'Singapore',
            'region' => 'Southeast Asia',
            'safety_score' => 98,
            'cost_score' => 42,
            'health_score' => 92,
            'visa_score' => 88,
            'infrastructure_score' => 97,
            'cultural_welcome_score' => 85,
            'digital_connectivity_score' => 95,
            'environmental_score' => 85,
            'insights' => [
                'safety' => 'Safest in Asia. No petty crime. Extremely strict laws.',
                'cost' => 'Expensive. Alcohol/tours are high. Hawker centres help save.',
                'health' => 'Top tier healthcare. Cleanest water in the world.',
                'visa' => 'e-Visa Approved in 1-2 days. Simple online process.',
                'infrastructure' => 'MRT is the world standard. Walking is very easy.',
                'cultural_welcome' => 'Efficient and multi-cultural. Follow strict cleanliness rules.',
                'digital' => 'Free 5G in almost all public areas.',
                'environmental' => 'Garden city. Tropical rain daily. High humidity.',
            ],
            'currency_code' => 'SGD',
            'currency_symbol' => 'S$',
            'exchange_rate_to_inr' => 61.50,
            'description' => 'A global financial center with a tropical climate and multicultural population.',
            'budgets' => [
                'backpacker' => ['min' => 60, 'max' => 100, 'currency' => 'SGD', 'description' => 'Hostel S$30, Hawker meals S$15, MRT S$5'],
                'mid_range' => ['min' => 150, 'max' => 300, 'currency' => 'SGD', 'description' => '3-star S$150, Cafe/Restaurants S$60, Grab S$30'],
                'comfortable' => ['min' => 450, 'max' => 800, 'currency' => 'SGD', 'description' => 'Luxury S$400, Fine dine S$150, Tours S$100'],
            ],
        ]);

        // 6. VIETNAM
        $vietnam = Country::updateOrCreate(['code' => 'VN'], [
            'name' => 'Vietnam',
            'region' => 'Southeast Asia',
            'safety_score' => 75,
            'cost_score' => 94,
            'health_score' => 65,
            'visa_score' => 82,
            'infrastructure_score' => 68,
            'cultural_welcome_score' => 88,
            'digital_connectivity_score' => 75,
            'environmental_score' => 62,
            'insights' => [
                'safety' => 'Generally safe. Motorbike traffic is chaotic. Watch for petty snatching in HCMC.',
                'cost' => 'Extremely affordable. $30/day is comfortable. Coffee is a way of life.',
                'health' => 'Hep A/B needed. Water not safe. Good hospitals in major cities.',
                'visa' => 'e-Visa available for $25. Approved in 3-5 days.',
                'infrastructure' => 'Buses/Trains are decent. Motorbike rentals popular.',
                'cultural_welcome' => 'Very friendly. Respect elders. Modest dress in temples.',
                'digital' => 'Viettel 4G is cheap and works even in remote hills.',
                'environmental' => 'Stunning nature. Air pollution issues in Hanoi during winter.',
            ],
            'currency_code' => 'VND',
            'currency_symbol' => '₫',
            'exchange_rate_to_inr' => 0.0034,
            'description' => 'Timeless charm with incredible street food, vibrant cities, and lush landscapes.',
            'budgets' => [
                'backpacker' => ['min' => 500000, 'max' => 800000, 'currency' => 'VND', 'description' => 'Hostel ₫200k, Pho/Banh Mi ₫100k, Bus ₫50k'],
                'mid_range' => ['min' => 1500000, 'max' => 3000000, 'currency' => 'VND', 'description' => 'Boutique ₫1.2m, Restaurants ₫600k, Grab ₫200k'],
                'comfortable' => ['min' => 4500000, 'max' => 10000000, 'currency' => 'VND', 'description' => 'Resort ₫3.5m, Fine dine ₫1.5m, Private tours'],
            ],
        ]);

        // 7. AUSTRALIA
        $australia = Country::updateOrCreate(['code' => 'AU'], [
            'name' => 'Australia',
            'region' => 'Oceania',
            'safety_score' => 85,
            'cost_score' => 35,
            'health_score' => 95,
            'visa_score' => 45,
            'infrastructure_score' => 92,
            'cultural_welcome_score' => 82,
            'digital_connectivity_score' => 88,
            'environmental_score' => 90,
            'insights' => [
                'safety' => 'High safety. Wildlife risks in outback. Road safety is paramount.',
                'cost' => 'High living costs. Eating out is expensive. Minimum wage is high.',
                'health' => 'Top-tier Medicare. Sun protection is mandatory (High UV).',
                'visa' => 'Complex for some. High rejection for students/certain passports.',
                'infrastructure' => 'Excellent city transit. Huge distances between cities — fly.',
                'cultural_welcome' => 'Informal, friendly, multicultural. Respect Aboriginal culture.',
                'digital' => 'Fast 5G in cities. Dead zones in the outback.',
                'environmental' => 'Pristine beaches/parks. Great Barrier Reef issues.',
            ],
            'currency_code' => 'AUD',
            'currency_symbol' => 'A$',
            'exchange_rate_to_inr' => 54.20,
            'description' => 'Vast continent with unique wildlife, coastal cities, and rugged outback terrain.',
            'budgets' => [
                'backpacker' => ['min' => 80, 'max' => 130, 'currency' => 'AUD', 'description' => 'Hostel A$45, Cook own meals, Public transit'],
                'mid_range' => ['min' => 200, 'max' => 400, 'currency' => 'AUD', 'description' => 'Hotel A$180, Restaurants A$100, Car hire A$60'],
                'comfortable' => ['min' => 500, 'max' => 1000, 'currency' => 'AUD', 'description' => 'Premium A$400, Fine dine A$200, Tours A$150'],
            ],
        ]);

        // Add sample visa requirements for Indian passport
        VisaRequirement::updateOrCreate(
            ['country_id' => $japan->id, 'passport_country_code' => 'IN'],
            [
                'visa_type' => 'Required',
                'duration' => '15 Days',
                'processing_time' => '4-6 Weeks',
                'fee_amount' => 500,
                'fee_currency' => 'INR',
                'document_checklist' => ['Passport', 'Photo', 'Bank Statements', 'Employer Letter'],
                'rejection_reasons' => ['Insufficient funds', 'Incomplete documents'],
                'tips' => ['Apply via authorized agencies', 'Book flights early']
            ]
        );
        
        // Add sample cultural guide for Japan
        CulturalGuide::updateOrCreate(
            ['country_id' => $japan->id],
            [
                'dress_norms' => ['Modest', 'No shoes in houses'],
                'religious_customs' => ['Shinto/Buddhist shrines'],
                'food_laws' => ['No tipping', 'Slurping ok'],
                'legal_bans' => ['No public smoking outside zones'],
                'tipping_etiquette' => ['No tipping, can be offensive'],
                'gestures_to_avoid' => ['Pointing', 'No eating while walking'],
                'bargaining_rules' => ['No bargaining in stores'],
                'business_tips' => ['Business cards with 2 hands']
            ]
        );
    }
}
