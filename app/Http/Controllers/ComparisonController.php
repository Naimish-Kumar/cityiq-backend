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

        // Optional: Perform specific logic to figure out a "winner" in certain categories
        // or just return the raw data for the frontend to render the comparison table.
        
        return response()->json($areas);
    }
}
