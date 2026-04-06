<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaScoreHistory;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Fetch all areas with optional search/filtering.
     */
    public function index(Request $request)
    {
        $query = Area::query()->withCount([
            'reviews as approved_reviews_count' => fn ($reviewQuery) => $reviewQuery->where('moderation_status', 'approved'),
        ]);

        if ($request->has('city')) {
            $query->where('city', $request->city);
        }

        if ($request->filled('country')) {
            $query->where('country', strtoupper($request->country));
        }

        if ($request->boolean('trending_only')) {
            $query->where('is_trending', true);
        }

        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('city', 'like', $searchTerm);
            });
        }

        if ($request->has('sort_by')) {
            $sortColumn = $request->sort_by;
            $sortOrder = $request->get('order', 'desc'); 
            // e.g. sort_by=liveability_score
            $query->orderBy($sortColumn, $sortOrder);
        } else {
            // Default top rated
            $query->orderBy('liveability_score', 'desc');
        }

        // Return paginated or all depending on standard API convention
        $areas = $query->paginate((int) $request->get('per_page', 12));

        return response()->json($areas);
    }

    /**
     * Get details of a single area by ID.
     */
    public function show($id)
    {
        $area = Area::with([
            'scoreHistories' => fn ($query) => $query->latest('captured_at')->take(7),
            'reviews' => fn ($query) => $query->where('moderation_status', 'approved')->latest()->take(5)->with('user'),
        ])->find($id);

        if (!$area) {
            return response()->json(['message' => 'Area not found'], 404);
        }

        return response()->json([
            'area' => $area,
            'score_breakdown' => [
                'liveability' => (float) $area->liveability_score,
                'safety' => (float) $area->safety_score,
                'cost' => (float) $area->cost_score,
                'commute' => (float) $area->commute_score,
                'lifestyle' => (float) $area->lifestyle_score,
            ],
        ]);
    }

    /**
     * Optional: Fetch only trending areas.
     */
    public function trending()
    {
        $areas = Area::where('is_trending', true)
                     ->orderBy('liveability_score', 'desc')
                     ->take(10)
                     ->get();

        return response()->json($areas);
    }

    public function scoreHistory($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return response()->json(['message' => 'Area not found'], 404);
        }

        $history = AreaScoreHistory::where('area_id', $id)
            ->latest('captured_at')
            ->take(30)
            ->get()
            ->reverse()
            ->values();

        return response()->json($history);
    }
}
