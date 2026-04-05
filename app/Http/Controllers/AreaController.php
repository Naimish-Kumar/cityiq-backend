<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Fetch all areas with optional search/filtering.
     */
    public function index(Request $request)
    {
        $query = Area::query();

        if ($request->has('city')) {
            $query->where('city', $request->city);
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
        $areas = $query->get();

        return response()->json($areas);
    }

    /**
     * Get details of a single area by ID.
     */
    public function show($id)
    {
        $area = Area::find($id);

        if (!$area) {
            return response()->json(['message' => 'Area not found'], 404);
        }

        return response()->json($area);
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
}
