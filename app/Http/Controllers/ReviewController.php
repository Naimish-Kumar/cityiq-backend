<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Area;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Get recent reviews for a global feed.
     */
    public function feed(Request $request)
    {
        $reviews = Review::with(['user', 'area'])
            ->where('moderation_status', 'approved')
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->when($request->filled('category'), fn ($query) => $query->where('category', $request->category))
            ->when($request->filled('area_id'), fn ($query) => $query->where('area_id', $request->area_id))
            ->orderByDesc('is_verified_local')
            ->orderByDesc('likes')
            ->latest()
            ->take(20)
            ->get();

        return response()->json($reviews);
    }

    /**
     * Get reviews for a specific area.
     */
    public function areaReviews($areaId)
    {
        $reviews = Review::where('area_id', $areaId)
            ->where('moderation_status', 'approved')
            ->with('user')
            ->orderByDesc('likes')
            ->latest()
            ->get();
        return response()->json($reviews);
    }

    /**
     * Store a new review.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|min:5',
            'category' => 'required|string|in:Safety,Noise,Infrastructure,Food,Flooding,Power Cuts,Social,general',
            'rating' => 'nullable|integer|min:1|max:5',
            'tags' => 'nullable|array',
        ]);

        $review = Review::create([
            'user_id' => $request->user()->id,
            'area_id' => $request->area_id,
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'rating' => $request->rating ?? 5,
            'tags' => $request->tags,
            'moderation_status' => 'approved',
            'expires_at' => now()->addDays(90),
            'meta' => [
                'source' => 'user_generated',
                'posted_from' => 'api',
            ],
        ]);

        // Increment review count on the area
        $area = Area::find($request->area_id);
        $area->increment('review_count');

        return response()->json($review->load(['user', 'area']), 201);
    }

    /**
     * Like a review.
     */
    public function vote(Request $request, $id)
    {
        $request->validate([
            'direction' => 'required|string|in:up,down',
        ]);

        $review = Review::findOrFail($id);
        $column = $request->direction === 'up' ? 'likes' : 'downvotes';
        $review->increment($column);

        return response()->json([
            'likes' => $review->likes,
            'downvotes' => $review->downvotes,
            'score' => $review->likes - $review->downvotes,
        ]);
    }
}
