<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    /**
     * Compare two or more areas side-by-side.
     */
    public function compare(Request $request)
    {
        $request->validate([
            'ids' => 'required|array|min:2',
            'ids.*' => 'exists:areas,id',
        ]);

        $areas = Area::whereIn('id', $request->ids)->get();
        $winner = [
            'liveability' => optional($areas->sortByDesc('liveability_score')->first())->name,
            'safety' => optional($areas->sortByDesc('safety_score')->first())->name,
            'cost' => optional($areas->sortByDesc('cost_score')->first())->name,
            'commute' => optional($areas->sortByDesc('commute_score')->first())->name,
            'lifestyle' => optional($areas->sortByDesc('lifestyle_score')->first())->name,
        ];

        return response()->json([
            'areas' => $areas,
            'winner_matrix' => $winner,
        ]);
    }
}
