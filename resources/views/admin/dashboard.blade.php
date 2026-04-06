@extends('layouts.admin')

@section('title', 'Global Systems Overview')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 48px">
    <!-- 🌍 Countries Indexed -->
    <div class="zenith-card stat-widget">
        <div class="stat-label">Global Index</div>
        <div class="stat-value gradient-text">{{ $stats['total_countries'] }}</div>
        <div style="color: var(--text-secondary); font-size: 11px; font-weight: 800; display: flex; align-items: center; gap: 6px">
            <span style="color: var(--success)">↑ 2.4%</span> vs last cycle
        </div>
    </div>

    <!-- 🛡️ Visa Monitor -->
    <div class="zenith-card stat-widget" style="border-color: rgba(251, 191, 36, 0.2)">
        <div class="stat-label">Visa Monitor</div>
        <div class="stat-value" style="color: var(--accent)">{{ number_format($stats['visa_rules']) }}</div>
        <div style="color: var(--text-secondary); font-size: 11px; font-weight: 800">Active Passport Protocols</div>
    </div>

    <!-- 🤖 Neural Sessions -->
    <div class="zenith-card stat-widget" style="border-color: rgba(56, 189, 248, 0.2)">
        <div class="stat-label">Neural Sessions</div>
        <div class="stat-value" style="color: var(--primary)">{{ number_format($stats['ai_sessions']) }}</div>
        <div style="color: var(--text-secondary); font-size: 11px; font-weight: 800">AI Tour Guide Conversions</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px">
    <!-- 👁️ Raw Activity Feed -->
    <div class="zenith-card" style="padding: 0; overflow: hidden">
        <div style="padding: 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center">
            <h3 style="font-size: 18px">Neural Pulse</h3>
            <div style="font-size: 10px; font-weight: 900; color: var(--primary); text-transform: uppercase; border: 1px solid rgba(56, 189, 248, 0.2); padding: 4px 8px; border-radius: 4px">Real-time Feed</div>
        </div>
        <div style="padding: 0">
            @foreach($activityFeed as $act)
            <div style="padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; gap: 20px; align-items: center; transition: background 0.3s" onmouseover="this.style.background='rgba(56, 189, 248, 0.02)'" onmouseout="this.style.background='transparent'">
                <div style="width: 40px; height: 40px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 14px; color: var(--primary)">
                    <i class="fa-solid {{ $act['tone'] == 'positive' ? 'fa-globe' : 'fa-robot' }}"></i>
                </div>
                <div style="flex: 1">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 4px">
                        <span style="font-size: 14px; font-weight: 700; color: white">{{ $act['title'] }}</span>
                        <span style="font-size: 11px; color: var(--text-secondary)">{{ $act['time'] }}</span>
                    </div>
                    <div style="font-size: 12px; color: var(--text-secondary)">{{ $act['description'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- 📊 Platform Readiness -->
    <div>
        <div class="zenith-card" style="margin-bottom: 32px">
            <h4 style="font-size: 16px; margin-bottom: 24px">Node Performance</h4>
            @foreach($opsSummary as $sum)
            <div style="margin-bottom: 24px">
                <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 10px">
                    <span style="color: var(--text-secondary); font-weight: 500">{{ $sum['label'] }}</span>
                    <span style="font-weight: 800">{{ $sum['value'] }}</span>
                </div>
                <div style="height: 6px; background: rgba(255,255,255,0.05); border-radius: 3px; overflow: hidden">
                    <div class="shimmer" style="height: 100%; background: linear-gradient(90deg, var(--primary), var(--primary-alt)); width: 85%"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="zenith-card shimmer" style="background: linear-gradient(135deg, rgba(56, 189, 248, 0.1), transparent); border-color: rgba(56, 189, 248, 0.2)">
            <h4 style="font-size: 16px; margin-bottom: 12px">Sync Active</h4>
            <p style="color: var(--text-secondary); font-size: 12px; line-height: 1.6; margin-bottom: 24px">Global data synchronization in progress. Delta latency current: 14ms.</p>
            <button class="btn-zenith btn-primary" style="width: 100%; justify-content: center; font-size: 11px">Initiate Re-Index</button>
        </div>
    </div>
</div>
@endsection
