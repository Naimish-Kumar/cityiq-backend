<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => 1254,
            'active_areas' => 86,
            'avg_cost' => '₹45,000',
            'api_calls' => '12.4k'
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
