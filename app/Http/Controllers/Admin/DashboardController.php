<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Area;
use App\Models\AiQuery;
use App\Models\Review;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (!$this->hasDashboardTables()) {
            return view('admin.dashboard', [
                'stats' => [
                    'total_users' => 0,
                    'active_areas' => 0,
                    'avg_cost' => '₹0',
                    'api_calls' => 0,
                    'verified_reviews' => 0,
                ],
                'activityFeed' => collect(),
                'topAreas' => collect(),
                'adminProfile' => [
                    'name' => 'System Administrator',
                    'email' => Session::get('admin_email', 'admin@cityiq.site'),
                    'initial' => strtoupper(substr(Session::get('admin_email', 'A'), 0, 1)),
                ],
            ]);
        }

        $averageRent = Area::query()
            ->get()
            ->avg(fn ($area) => data_get($area->cost_data, 'avg_rent_2_bhk', 0));

        $recentReviews = Review::query()
            ->with(['user', 'area'])
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($review) {
                return [
                    'title' => optional($review->user)->name ?: 'Anonymous user',
                    'description' => 'Reviewed ' . (optional($review->area)->name ?: 'an area'),
                    'status' => $review->is_verified_local ? 'Verified local' : 'Community review',
                    'time' => $review->created_at?->diffForHumans() ?? 'Recently',
                    'timestamp' => $review->created_at?->timestamp ?? 0,
                    'tone' => $review->is_verified_local ? 'positive' : 'neutral',
                ];
            });

        $recentQueries = AiQuery::query()
            ->with('user')
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($query) {
                return [
                    'title' => optional($query->user)->name ?: 'Anonymous user',
                    'description' => 'Asked AI: ' . str($query->query)->limit(55),
                    'status' => ucfirst(str_replace('_', ' ', $query->type)),
                    'time' => $query->created_at?->diffForHumans() ?? 'Recently',
                    'timestamp' => $query->created_at?->timestamp ?? 0,
                    'tone' => 'info',
                ];
            });

        $activityFeed = $recentReviews
            ->concat($recentQueries)
            ->sortByDesc('timestamp')
            ->take(6)
            ->values();

        $topAreas = Area::query()
            ->orderByDesc('liveability_score')
            ->take(5)
            ->get();

        $stats = [
            'total_users' => User::count(),
            'active_areas' => Area::count(),
            'avg_cost' => '₹' . number_format($averageRent ?: 0),
            'api_calls' => AiQuery::count() + Review::count(),
            'verified_reviews' => Review::where('is_verified_local', true)->count(),
        ];

        $adminProfile = [
            'name' => 'System Administrator',
            'email' => Session::get('admin_email', 'admin@cityiq.site'),
            'initial' => strtoupper(substr(Session::get('admin_email', 'A'), 0, 1)),
        ];

        return view('admin.dashboard', compact('stats', 'activityFeed', 'topAreas', 'adminProfile'));
    }

    public function credentials()
    {
        $credentials = [
            [
                'label' => 'App Key',
                'value' => $this->maskValue(config('app.key')),
                'description' => 'Core Laravel encryption key used for application security.',
                'status' => config('app.key') ? 'Configured' : 'Missing',
            ],
            [
                'label' => 'Google Client ID',
                'value' => $this->maskValue(env('GOOGLE_CLIENT_ID')),
                'description' => 'Used by social sign-in and external Google integrations.',
                'status' => env('GOOGLE_CLIENT_ID') ? 'Configured' : 'Missing',
            ],
            [
                'label' => 'Database Connection',
                'value' => strtoupper((string) config('database.default')),
                'description' => 'Primary storage driver currently used by the platform.',
                'status' => 'Active',
            ],
        ];

        return view('admin.credentials', compact('credentials'));
    }

    public function users()
    {
        if (!Schema::hasTable('users')) {
            return view('admin.users', ['users' => collect()]);
        }

        $users = User::query()
            ->withCount(['reviews', 'aiQueries'])
            ->latest()
            ->take(12)
            ->get()
            ->map(function ($user) {
                $activityCount = $user->reviews_count + $user->ai_queries_count;

                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'location' => $user->location ?: 'Location not set',
                    'role' => $user->email === 'admin@cityiq.site' ? 'Admin' : ($activityCount > 3 ? 'Power User' : 'User'),
                    'status' => $activityCount > 0 ? 'Active' : 'Quiet',
                    'last_seen' => $user->updated_at?->diffForHumans() ?? 'Unknown',
                    'activity' => $activityCount,
                ];
            });

        return view('admin.users', compact('users'));
    }

    public function settings()
    {
        $databasePath = database_path('database.sqlite');

        $settings = [
            [
                'label' => 'Environment',
                'value' => strtoupper((string) config('app.env')),
                'hint' => 'Current application environment.',
            ],
            [
                'label' => 'Debug Mode',
                'value' => config('app.debug') ? 'Enabled' : 'Disabled',
                'hint' => 'Controls verbose application error output.',
            ],
            [
                'label' => 'Session Driver',
                'value' => strtoupper((string) config('session.driver')),
                'hint' => 'Where authenticated session state is stored.',
            ],
            [
                'label' => 'Queue Driver',
                'value' => strtoupper((string) config('queue.default')),
                'hint' => 'Background jobs transport layer.',
            ],
            [
                'label' => 'Database Size',
                'value' => File::exists($databasePath) ? number_format(File::size($databasePath) / 1024, 1) . ' KB' : 'Not found',
                'hint' => 'SQLite storage footprint on this environment.',
            ],
        ];

        return view('admin.settings', compact('settings'));
    }

    private function maskValue(?string $value): string
    {
        if (!$value) {
            return 'Not configured';
        }

        if (strlen($value) <= 8) {
            return str_repeat('*', strlen($value));
        }

        return substr($value, 0, 4) . str_repeat('*', max(strlen($value) - 8, 4)) . substr($value, -4);
    }

    private function hasDashboardTables(): bool
    {
        return Schema::hasTable('users')
            && Schema::hasTable('areas')
            && Schema::hasTable('reviews')
            && Schema::hasTable('ai_queries');
    }
}
