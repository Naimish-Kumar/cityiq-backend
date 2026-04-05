<?php

namespace App\Http\Controllers;

use App\Models\SavedArea;
use App\Models\Area;
use Illuminate\Http\Request;

class SavedAreaController extends Controller
{
    /**
     * Get all saved areas for the authenticated user.
     */
    public function index(Request $request)
    {
        $savedAreas = $request->user()->savedAreas()->with('area')->get();
        return response()->json($savedAreas->pluck('area'));
    }

    /**
     * Save an area for the authenticated user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
        ]);

        $savedArea = SavedArea::firstOrCreate([
            'user_id' => $request->user()->id,
            'area_id' => $request->area_id,
        ]);

        return response()->json($savedArea, 201);
    }

    /**
     * Remove a saved area.
     */
    public function destroy(Request $request, $areaId)
    {
        $request->user()->savedAreas()->where('area_id', $areaId)->delete();
        return response()->json(['message' => 'Area removed from saved list']);
    }
}
