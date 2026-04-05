<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PagesController extends Controller
{
    public function landing()
    {
        if (!Schema::hasTable('areas') || !Schema::hasTable('reviews') || !Schema::hasTable('users')) {
            return view('landing', [
                'featuredAreas' => collect(),
                'testimonials' => collect(),
                'stats' => [
                    'data_points' => 0,
                    'city_profiles' => 0,
                    'happy_movers' => 0,
                    'verified_reviews' => 0,
                ],
            ]);
        }

        $featuredAreas = Area::query()
            ->orderByDesc('is_trending')
            ->orderByDesc('liveability_score')
            ->take(3)
            ->get();

        $testimonials = Review::query()
            ->with(['user', 'area'])
            ->latest()
            ->take(3)
            ->get();

        $stats = [
            'data_points' => Area::count() * 180,
            'city_profiles' => Area::distinct('city')->count('city'),
            'happy_movers' => User::count(),
            'verified_reviews' => Review::where('is_verified_local', true)->count(),
        ];

        return view('landing', compact('featuredAreas', 'testimonials', 'stats'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
