<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Area;
use App\Models\AiQuery;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'active_areas' => Area::count(),
            'avg_cost' => '₹' . number_format(Area::avg('overall_score') * 1000, 0), // Mocked calculation
            'api_calls' => AiQuery::count() + Review::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function credentials()
    {
        return view('admin.credentials');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
