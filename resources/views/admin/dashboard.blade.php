@extends('layouts.admin')

@section('title', 'Dashboard | Admin CityIQ')

@section('content')
    <section class="admin-page">
        <header class="admin-header animate">
            <div>
                <p class="eyebrow">Control center</p>
                <h1>Analytics Overview</h1>
                <p class="page-copy">Live operations snapshot for CityIQ traffic, community activity, and market coverage.</p>
            </div>
            <div class="admin-profile">
                <div>
                    <strong>{{ $adminProfile['name'] }}</strong>
                    <span>{{ $adminProfile['email'] }}</span>
                </div>
                <div class="avatar-pill">{{ $adminProfile['initial'] }}</div>
            </div>
        </header>

        <div class="stats-grid animate delay-1">
            <div class="stats-card">
                <h3>Total Registered Users</h3>
                <div class="val">{{ number_format($stats['total_users']) }}</div>
                <p>Accounts active across website and mobile flows.</p>
            </div>
            <div class="stats-card">
                <h3>Tracked Areas</h3>
                <div class="val">{{ number_format($stats['active_areas']) }}</div>
                <p>Neighborhoods with scoring, tags, and cost data.</p>
            </div>
            <div class="stats-card">
                <h3>Average 2 BHK Rent</h3>
                <div class="val">{{ $stats['avg_cost'] }}</div>
                <p>Calculated from live area seed data.</p>
            </div>
            <div class="stats-card">
                <h3>Total Platform Activity</h3>
                <div class="val">{{ number_format($stats['api_calls']) }}</div>
                <p>{{ number_format($stats['verified_reviews']) }} verified local reviews included.</p>
            </div>
        </div>

        <div class="admin-grid animate delay-2">
            <section class="panel-card">
                <div class="panel-head">
                    <div>
                        <p class="eyebrow">Live feed</p>
                        <h2>Recent Activity</h2>
                    </div>
                </div>

                <div class="activity-list">
                    @forelse($activityFeed as $item)
                        <article class="activity-item">
                            <div>
                                <strong>{{ $item['title'] }}</strong>
                                <p>{{ $item['description'] }}</p>
                            </div>
                            <div class="activity-meta">
                                <span class="status-badge {{ $item['tone'] }}">{{ $item['status'] }}</span>
                                <span>{{ $item['time'] }}</span>
                            </div>
                        </article>
                    @empty
                        <p class="empty-state">No recent activity found yet.</p>
                    @endforelse
                </div>
            </section>

            <section class="panel-card">
                <div class="panel-head">
                    <div>
                        <p class="eyebrow">Rankings</p>
                        <h2>Top Liveability Areas</h2>
                    </div>
                </div>

                <div class="ranking-list">
                    @forelse($topAreas as $index => $area)
                        <article class="ranking-item">
                            <div class="ranking-index">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</div>
                            <div>
                                <strong>{{ $area->name }}</strong>
                                <p>{{ $area->city }}, {{ $area->state }}</p>
                            </div>
                            <div class="ranking-score">{{ number_format((float) $area->liveability_score, 1) }}</div>
                        </article>
                    @empty
                        <p class="empty-state">No area data available yet.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </section>
@endsection
