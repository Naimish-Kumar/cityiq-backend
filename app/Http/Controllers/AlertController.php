<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index(Request $request)
    {
        $areaAlerts = $request->user()->alerts()->with('area')->latest()->get();
        $countryAlerts = $request->user()->countryAlerts()->with('countryAlert.country')->latest()->get();
        
        return response()->json([
            'area_alerts' => $areaAlerts,
            'country_alerts' => $countryAlerts
        ]);
    }

    public function markRead(Request $request, int $id)
    {
        // Check if it's an area alert or country alert based on type maybe?
        // Or separate endpoints. I'll make it handle both.
        $alert = $request->user()->alerts()->find($id);
        if ($alert) {
             $alert->update(['is_read' => true]);
             return response()->json($alert->fresh('area'));
        }

        $cAlert = $request->user()->countryAlerts()->findOrFail($id);
        $cAlert->update(['is_read' => true]);
        return response()->json($cAlert->fresh('countryAlert.country'));
    }
}
