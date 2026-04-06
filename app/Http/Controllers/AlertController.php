<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()->alerts()->with('area')->latest()->get()
        );
    }

    public function markRead(Request $request, int $id)
    {
        $alert = $request->user()->alerts()->findOrFail($id);
        $alert->update(['is_read' => true]);

        return response()->json($alert->fresh('area'));
    }
}
