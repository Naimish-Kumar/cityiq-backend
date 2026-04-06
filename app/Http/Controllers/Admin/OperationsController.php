<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AiQuery;
use App\Models\Area;
use App\Models\AreaAlert;
use App\Models\AreaScoreHistory;
use App\Models\CommuteSimulation;
use App\Models\CostCalculation;
use App\Models\Review;
use App\Models\Country;
use App\Models\VisaRequirement;
use App\Models\HealthGuide;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function areas()
    {
        $areas = Area::query()
            ->withCount(['reviews', 'scoreHistories', 'costCalculations', 'commuteSimulations'])
            ->orderByDesc('liveability_score')
            ->get();

        return view('admin.areas', compact('areas'));
    }

    public function saveArea(Request $request)
    {
        $payload = $request->validate([
            'area_id' => 'nullable|exists:areas,id',
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:3',
            'liveability_score' => 'required|numeric|min:0|max:100',
            'safety_score' => 'required|numeric|min:0|max:100',
            'cost_score' => 'required|numeric|min:0|max:100',
            'commute_score' => 'required|numeric|min:0|max:100',
            'lifestyle_score' => 'required|numeric|min:0|max:100',
            'review_count' => 'nullable|integer|min:0',
            'is_trending' => 'nullable|boolean',
            'description' => 'nullable|string',
            'avg_rent_1_bhk' => 'nullable|numeric|min:0',
            'avg_rent_2_bhk' => 'nullable|numeric|min:0',
            'avg_rent_3_bhk' => 'nullable|numeric|min:0',
            'avg_food_basic' => 'nullable|numeric|min:0',
            'avg_food_moderate' => 'nullable|numeric|min:0',
            'avg_food_luxury' => 'nullable|numeric|min:0',
            'avg_transport' => 'nullable|numeric|min:0',
            'avg_utilities' => 'nullable|numeric|min:0',
            'tags' => 'nullable|string',
        ]);

        $overallScore = collect([
            $payload['liveability_score'],
            $payload['safety_score'],
            $payload['cost_score'],
            $payload['commute_score'],
            $payload['lifestyle_score'],
        ])->avg();

        $area = Area::updateOrCreate(
            ['id' => $payload['area_id'] ?? null],
            [
                'name' => $payload['name'],
                'city' => $payload['city'],
                'state' => $payload['state'],
                'country' => strtoupper($payload['country']),
                'liveability_score' => $payload['liveability_score'],
                'overall_score' => $overallScore,
                'safety_score' => $payload['safety_score'],
                'cost_score' => $payload['cost_score'],
                'commute_score' => $payload['commute_score'],
                'lifestyle_score' => $payload['lifestyle_score'],
                'review_count' => $payload['review_count'] ?? 0,
                'is_trending' => (bool) ($payload['is_trending'] ?? false),
                'description' => $payload['description'] ?? null,
                'cost_data' => [
                    'avg_rent_1_bhk' => $payload['avg_rent_1_bhk'] ?? 0,
                    'avg_rent_2_bhk' => $payload['avg_rent_2_bhk'] ?? 0,
                    'avg_rent_3_bhk' => $payload['avg_rent_3_bhk'] ?? 0,
                    'avg_food_basic' => $payload['avg_food_basic'] ?? 0,
                    'avg_food_moderate' => $payload['avg_food_moderate'] ?? 0,
                    'avg_food_luxury' => $payload['avg_food_luxury'] ?? 0,
                    'avg_transport' => $payload['avg_transport'] ?? 0,
                    'avg_utilities' => $payload['avg_utilities'] ?? 0,
                ],
                'tags' => collect(explode(',', (string) ($payload['tags'] ?? '')))
                    ->map(fn ($tag) => trim($tag))
                    ->filter()
                    ->values()
                    ->all(),
                'last_update' => now()->toDateString(),
            ]
        );

        AreaScoreHistory::create([
            'area_id' => $area->id,
            'liveability_score' => $area->liveability_score,
            'safety_score' => $area->safety_score,
            'cost_score' => $area->cost_score,
            'commute_score' => $area->commute_score,
            'lifestyle_score' => $area->lifestyle_score,
            'source' => 'admin_panel',
            'breakdown' => ['updated_by' => 'admin'],
            'captured_at' => now(),
        ]);

        return redirect()->route('admin.areas')->with('success', 'Area saved successfully.');
    }

    public function deleteArea(int $id)
    {
        Area::findOrFail($id)->delete();

        return redirect()->route('admin.areas')->with('success', 'Area deleted successfully.');
    }

    public function reviews(Request $request)
    {
        $reviews = Review::query()
            ->with(['user', 'area'])
            ->when($request->filled('status'), fn ($query) => $query->where('moderation_status', $request->status))
            ->latest()
            ->paginate(20);

        return view('admin.reviews', compact('reviews'));
    }

    public function updateReview(Request $request, int $id)
    {
        $payload = $request->validate([
            'moderation_status' => 'required|string|in:approved,pending,rejected',
            'is_verified_local' => 'nullable|boolean',
            'is_flagged' => 'nullable|boolean',
            'expires_at' => 'nullable|date',
        ]);

        $review = Review::findOrFail($id);
        $review->update([
            'moderation_status' => $payload['moderation_status'],
            'is_verified_local' => (bool) ($payload['is_verified_local'] ?? false),
            'is_flagged' => (bool) ($payload['is_flagged'] ?? false),
            'expires_at' => $payload['expires_at'] ?? $review->expires_at,
        ]);

        return redirect()->route('admin.reviews')->with('success', 'Review updated successfully.');
    }

    public function deleteReview(int $id)
    {
        Review::findOrFail($id)->delete();

        return redirect()->route('admin.reviews')->with('success', 'Review deleted successfully.');
    }

    public function intelligence()
    {
        $aiQueries = AiQuery::query()->with('user')->latest()->take(10)->get();
        $costCalculations = CostCalculation::query()->with(['user', 'area'])->latest()->take(10)->get();
        $commuteSimulations = CommuteSimulation::query()->with(['user', 'area'])->latest()->take(10)->get();
        $alerts = AreaAlert::query()->with(['user', 'area'])->latest()->take(10)->get();
        $scoreHistories = AreaScoreHistory::query()->with('area')->latest('captured_at')->take(12)->get();

        return view('admin.intelligence', compact(
            'aiQueries',
            'costCalculations',
            'commuteSimulations',
            'alerts',
            'scoreHistories'
        ));
    }

    public function countries()
    {
        $countries = Country::query()->get();
        return view('admin.countries', compact('countries'));
    }

    public function visaRequirements()
    {
        $visaRequirements = VisaRequirement::query()->with('country')->get();
        return view('admin.visa_requirements', compact('visaRequirements'));
    }
}
