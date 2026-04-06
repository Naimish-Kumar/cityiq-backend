@extends('layouts.admin')

@section('title', 'Neural Intelligence Pulse — AI & Simulation Logs')

@section('content')
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px">
    <!-- 👁️ AI Query Logs -->
    <div class="zenith-card" style="padding: 0; overflow: hidden">
        <div style="padding: 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center">
            <h3 style="font-size: 18px">Neural Signal Stream</h3>
            <div style="font-size: 10px; font-weight: 900; color: var(--primary); text-transform: uppercase; border: 1px solid rgba(56, 189, 248, 0.2); padding: 4px 8px; border-radius: 4px">Active v3 Cortex</div>
        </div>
        <div style="padding: 0">
            @foreach($aiQueries as $query)
            <div style="padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; gap: 20px; align-items: center; transition: background 0.3s" onmouseover="this.style.background='rgba(56, 189, 248, 0.02)'" onmouseout="this.style.background='transparent'">
                <div style="width: 44px; height: 44px; background: rgba(56, 189, 248, 0.05); border: 1px solid rgba(56, 189, 248, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 14px; color: var(--primary)">
                    <i class="fa-solid {{ $query->type == 'tour_guide' ? 'fa-map-location-dot' : 'fa-brain' }}"></i>
                </div>
                <div style="flex: 1">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 6px">
                        <span style="font-size: 14px; font-weight: 800; color: white">{{ $query->user->name or 'Entity: ' . substr($query->id, 0, 8) }}</span>
                        <span style="font-size: 11px; color: var(--text-secondary)">{{ $query->created_at->diffForHumans() }}</span>
                    </div>
                    <div style="font-size: 12px; color: var(--text-secondary); line-height: 1.5; font-family: 'Monaco', 'Courier New', monospace; background: rgba(0,0,0,0.1); padding: 8px; border-radius: 6px; border: 1px solid var(--border)">
                        "{{ str($query->query)->limit(120) }}"
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- 📊 Simulation Pulse -->
    <div style="display: flex; flex-direction: column; gap: 24px">
        <div class="zenith-card shimmer">
            <h4 style="font-size: 14px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px">Simulation Pulse</h4>
            <div style="display: flex; flex-direction: column; gap: 16px">
                 <div style="display: flex; justify-content: space-between; align-items: center">
                    <span style="font-size: 12px; color: var(--text-secondary)">Travel Cost Runs</span>
                    <span style="font-family: 'Outfit'; font-weight: 800; color: var(--success)">{{ $costCalculations->count() }} active</span>
                 </div>
                 <div style="display: flex; justify-content: space-between; align-items: center">
                    <span style="font-size: 12px; color: var(--text-secondary)">Commute Simulations</span>
                    <span style="font-family: 'Outfit'; font-weight: 800; color: var(--primary)">{{ $commuteSimulations->count() }} active</span>
                 </div>
                 <div style="display: flex; justify-content: space-between; align-items: center">
                    <span style="font-size: 12px; color: var(--text-secondary)">Neural Alert Feed</span>
                    <span style="font-family: 'Outfit'; font-weight: 800; color: var(--error)">{{ $alerts->count() }} reports</span>
                 </div>
            </div>
        </div>

        <div class="zenith-card">
            <h4 style="font-size: 14px; margin-bottom: 20px">Historical Precision</h4>
            @foreach($scoreHistories as $hist)
            <div style="display: flex; justify-content: space-between; font-size: 11px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border)">
                <span style="color: var(--text-secondary)">{{ $hist->area->name or 'Global' }} Indexing</span>
                <span style="font-weight: 800; color: var(--primary)">{{ $hist->liveability_score }}% Confidence</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
