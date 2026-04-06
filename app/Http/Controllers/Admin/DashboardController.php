<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Area;
use App\Models\AiQuery;
use App\Models\AreaAlert;
use App\Models\AreaScoreHistory;
use App\Models\CommuteSimulation;
use App\Models\CostCalculation;
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
                    'cost_runs' => 0,
                    'commute_runs' => 0,
                ],
                'activityFeed' => collect(),
                'topAreas' => collect(),
                'opsSummary' => collect(),
                'recentAlerts' => collect(),
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
            ->take(8)
            ->get()
            ->map(function ($query) {
                $isTour = $query->type === 'tour_guide';
                return [
                    'title' => optional($query->user)->name ?: 'Anonymous user',
                    'description' => ($isTour ? '🌍 Tour Guide: ' : '🤖 AI Task: ') . str($query->query)->limit(55),
                    'status' => ucfirst(str_replace('_', ' ', $query->type)),
                    'time' => $query->created_at?->diffForHumans() ?? 'Recently',
                    'timestamp' => $query->created_at?->timestamp ?? 0,
                    'tone' => $isTour ? 'positive' : 'info',
                ];
            });

        $activityFeed = $recentReviews
            ->concat($recentQueries)
            ->sortByDesc('timestamp')
            ->take(8)
            ->values();

        $topAreas = Area::query()
            ->orderByDesc('liveability_score')
            ->take(5)
            ->get();

        $stats = [
            'total_users' => User::count(),
            'active_areas' => Area::count(),
            'total_countries' => \App\Models\Country::count(),
            'visa_rules' => \App\Models\VisaRequirement::count(),
            'ai_sessions' => AiQuery::count(),
            'avg_cost' => '₹' . number_format($averageRent ?: 0),
            'api_calls' => AiQuery::count() + Review::count(),
            'verified_reviews' => Review::where('is_verified_local', true)->count(),
            'cost_runs' => CostCalculation::count(),
            'commute_runs' => CommuteSimulation::count(),
        ];

        $opsSummary = collect([
            ['label' => 'AI queries', 'value' => AiQuery::count(), 'hint' => 'assistant sessions stored'],
            ['label' => 'Travel Intelligence', 'value' => \App\Models\Country::count(), 'hint' => 'nations indexed in v2.0'],
            ['label' => 'Visa Monitor', 'value' => \App\Models\VisaRequirement::count(), 'hint' => 'passport rules established'],
            ['label' => 'Cost calculations', 'value' => CostCalculation::count(), 'hint' => 'budget plans generated'],
            ['label' => 'Score snapshots', 'value' => AreaScoreHistory::count(), 'hint' => 'historical trend points'],
        ]);

        $recentAlerts = AreaAlert::query()->with('area')->latest()->take(5)->get();

        $adminProfile = [
            'name' => 'System Administrator',
            'email' => Session::get('admin_email', 'admin@cityiq.site'),
            'initial' => strtoupper(substr(Session::get('admin_email', 'A'), 0, 1)),
        ];

        return view('admin.dashboard', compact('stats', 'activityFeed', 'topAreas', 'opsSummary', 'recentAlerts', 'adminProfile'));
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
        return view('admin.settings');
    }

    public function updateSettings(\Illuminate\Http\Request $request)
    {
        $type = $request->input('type');

        if ($type === 'smtp') {
            $this->updateEnv([
                'MAIL_HOST' => $request->input('mail_host'),
                'MAIL_PORT' => $request->input('mail_port'),
                'MAIL_USERNAME' => $request->input('mail_username'),
                'MAIL_PASSWORD' => $request->input('mail_password'),
                'MAIL_ENCRYPTION' => $request->input('mail_encryption'),
                'MAIL_FROM_ADDRESS' => $request->input('mail_username'),
            ]);
        } elseif ($type === 'gemini') {
            $this->updateEnv([
                'GEMINI_API_KEY' => $request->input('gemini_api_key'),
            ]);
        } elseif ($type === 'firebase') {
            $this->updateEnv([
                'FIREBASE_PROJECT_ID' => $request->input('firebase_project_id'),
                'FIREBASE_API_KEY' => $request->input('firebase_api_key'),
            ]);

            if ($request->hasFile('firebase_json')) {
                $request->file('firebase_json')->move(storage_path('app/firebase'), 'service-account.json');
            }
        }

        return back()->with('success', 'Neural nodes synchronized successfully.');
    }

    private function updateEnv(array $data)
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $content = File::get($path);

            foreach ($data as $key => $value) {
                if ($value === null) continue;
                
                $pattern = "/^{$key}=\"?([^\"]*)\"?/m";
                $replacement = "{$key}=\"{$value}\"";

                if (preg_match($pattern, $content)) {
                    $content = preg_replace($pattern, $replacement, $content);
                } else {
                    $content .= "\n{$key}=\"{$value}\"";
                }
            }

            File::put($path, $content);
        }
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
            && Schema::hasTable('ai_queries')
            && Schema::hasTable('cost_calculations')
            && Schema::hasTable('commute_simulations')
            && Schema::hasTable('area_alerts')
            && Schema::hasTable('area_score_histories');
    }
}
