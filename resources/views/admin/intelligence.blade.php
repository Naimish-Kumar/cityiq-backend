@extends('layouts.admin')

@section('title', 'Intelligence | CityIQ Admin')

@section('content')
    <section class="admin-page">
        <header class="admin-header">
            <div>
                <p class="eyebrow">Operational intelligence</p>
                <h1>AI, Simulations, and Alerts</h1>
                <p class="page-copy">Monitor how the PRD-backed product systems are being used across queries, budgets, commutes, and saved-area changes.</p>
            </div>
        </header>

        <div class="settings-grid">
            <section class="panel-card">
                <p class="eyebrow">AI Assistant</p>
                <h2>{{ $aiQueries->count() }} recent queries</h2>
                @foreach($aiQueries as $query)
                    <div class="mini-row">
                        <strong>{{ optional($query->user)->name ?? 'Anonymous' }}</strong>
                        <span>{{ $query->query }}</span>
                    </div>
                @endforeach
            </section>

            <section class="panel-card">
                <p class="eyebrow">Cost Calculator</p>
                <h2>{{ $costCalculations->count() }} recent runs</h2>
                @foreach($costCalculations as $item)
                    <div class="mini-row">
                        <strong>{{ optional($item->area)->name }} | {{ $item->currency }} {{ number_format((float) $item->estimated_total, 0) }}</strong>
                        <span>{{ $item->lifestyle_tier }} | savings {{ number_format((float) $item->savings_percentage, 1) }}%</span>
                    </div>
                @endforeach
            </section>

            <section class="panel-card">
                <p class="eyebrow">Commute Simulator</p>
                <h2>{{ $commuteSimulations->count() }} recent runs</h2>
                @foreach($commuteSimulations as $item)
                    <div class="mini-row">
                        <strong>{{ optional($item->area)->name }} to {{ $item->work_location }}</strong>
                        <span>{{ $item->peak_minutes }} min peak | {{ ucfirst($item->stress_level) }}</span>
                    </div>
                @endforeach
            </section>

            <section class="panel-card">
                <p class="eyebrow">Area Alerts</p>
                <h2>{{ $alerts->count() }} recent alerts</h2>
                @foreach($alerts as $alert)
                    <div class="mini-row">
                        <strong>{{ $alert->title }}</strong>
                        <span>{{ optional($alert->area)->name }} | {{ $alert->message }}</span>
                    </div>
                @endforeach
            </section>
        </div>

        <section class="panel-card">
            <div class="panel-head">
                <div>
                    <p class="eyebrow">Score history</p>
                    <h2>Latest score snapshots</h2>
                </div>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Area</th>
                            <th>Liveability</th>
                            <th>Breakdown</th>
                            <th>Captured</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($scoreHistories as $history)
                            <tr>
                                <td><strong>{{ optional($history->area)->name }}</strong><span>{{ optional($history->area)->city }}</span></td>
                                <td>{{ number_format((float) $history->liveability_score, 1) }}</td>
                                <td>S {{ number_format((float) $history->safety_score, 0) }} | C {{ number_format((float) $history->cost_score, 0) }} | M {{ number_format((float) $history->commute_score, 0) }} | L {{ number_format((float) $history->lifestyle_score, 0) }}</td>
                                <td>{{ optional($history->captured_at)->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="empty-table">No intelligence records yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
