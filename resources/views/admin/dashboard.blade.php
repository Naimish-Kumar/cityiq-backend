@extends('layouts.admin')

@section('title', 'Zenith Intelligence Dashboard')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; margin-bottom: 40px">
    <!-- 🌍 Countries Indexed -->
    <div class="zenith-card" style="position: relative; overflow: hidden">
        <div class="stat-glow"></div>
        <p style="color: var(--text-secondary); font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px">Global Index</p>
        <h2 style="font-size: 36px; margin: 10px 0">{{ $stats['total_countries'] }}</h2>
        <div style="color: var(--primary); font-size: 11px; font-weight: bold">Countries Tracked 🌏</div>
    </div>

    <!-- 🛡️ Visa Rules -->
    <div class="zenith-card" style="position: relative; overflow: hidden">
        <div class="stat-glow" style="background: var(--accent)"></div>
        <p style="color: var(--text-secondary); font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px">Visa Monitor</p>
        <h2 style="font-size: 36px; margin: 10px 0">{{ $stats['visa_rules'] }}</h2>
        <div style="color: var(--accent); font-size: 11px; font-weight: bold">Passport Connections 🛂</div>
    </div>

    <!-- 🤖 AI Sessions -->
    <div class="zenith-card" style="position: relative; overflow: hidden">
        <div class="stat-glow" style="background: var(--success)"></div>
        <p style="color: var(--text-secondary); font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px">AI Tour Guide</p>
        <h2 style="font-size: 36px; margin: 10px 0">{{ $stats['ai_sessions'] }}</h2>
        <div style="color: var(--success); font-size: 11px; font-weight: bold">Active v2.0 Queries 🤖</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px">
    <!-- 📈 Activity Feed -->
    <div class="zenith-card">
        <h3 style="margin-bottom: 24px">Universal Activity Feed</h3>
        <div style="display: flex; flex-direction: column; gap: 20px">
            @foreach($recent_activity as $act)
            <div style="display: flex; gap: 15px; align-items: start; padding-bottom: 20px; border-bottom: 1px solid var(--border)">
                <div style="width: 32px; height: 32px; background: rgba(255,255,255,0.05); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px">
                    {{ $act['module'] == 'Tour Guide' ? '🤖' : '🛡️' }}
                </div>
                <div style="flex: 1">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 4px">
                        <span style="font-size: 14px; font-weight: bold">{{ $act['description'] }}</span>
                        <span style="font-size: 11px; color: var(--text-secondary)">{{ $act['time'] }}</span>
                    </div>
                    <div style="font-size: 12px; color: var(--text-secondary)">Node: {{ $act['location'] }} • {{ $act['module'] }} Intelligence</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- ⚡ Operational Summary -->
    <div>
        <div class="zenith-card" style="margin-bottom: 24px">
            <h4 style="margin-bottom: 16px">Platform Health</h4>
            @foreach($ops_summary as $summary)
            <div style="margin-bottom: 15px">
                <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 6px">
                    <span>{{ $summary['label'] }}</span>
                    <span style="font-weight: bold">{{ $summary['value'] }}</span>
                </div>
                <div style="height: 4px; background: rgba(255,255,255,0.05); border-radius: 2px">
                    <div style="height: 100%; background: var(--primary); width: 85%; border-radius: 2px"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="zenith-card" style="background: linear-gradient(135deg, var(--primary), #2563eb); border: none">
            <h4 style="color: white; margin-bottom: 8px">Zenith v2.1 Update</h4>
            <p style="color: rgba(255,255,255,0.8); font-size: 12px; margin-bottom: 16px">Deployment scheduled for April 15th. New Predictive Safety models included.</p>
            <button class="btn-zenith" style="background: white; color: var(--primary); font-size: 12px; padding: 8px 16px">View Roadmap</button>
        </div>
    </div>
</div>
@endsection
