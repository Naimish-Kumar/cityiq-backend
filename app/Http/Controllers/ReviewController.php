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
        $reviews = Review::with(['user', 'area'])->latest()->take(20)->get();
        return response()->json($reviews);
    }

    /**
     * Get reviews for a specific area.
     */
    public function areaReviews($areaId)
    {
        $reviews = Review::where('area_id', $areaId)->with('user')->latest()->get();
        return response()->json($reviews);
    }

    /**
     * Store a new review.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'content' => 'required|string|min:5',
            'rating' => 'nullable|integer|min:1|max:5',
            'tags' => 'nullable|array',
        ]);

        $review = Review::create([
            'user_id' => $request->user()->id,
            'area_id' => $request->area_id,
            'content' => $request->content,
            'rating' => $request->rating ?? 5,
            'tags' => $request->tags,
        ]);

        // Increment review count on the area
        $area = Area::find($request->area_id);
        $area->increment('review_count');

        return response()->json($review->load(['user', 'area']), 201);
    }

    /**
     * Like a review.
     */
    public function like($id)
    {
        $review = Review::findOrFail($id);
        $review->increment('likes');
        return response()->json(['likes' => $review->likes]);
    }
}
