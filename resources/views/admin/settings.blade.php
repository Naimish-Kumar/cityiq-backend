@extends('layouts.admin')

@section('title', 'Neural Framework Configuration — Settings')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px">
    @foreach($settings as $setting)
    <div class="zenith-card shimmer" style="padding: 24px; border-color: rgba(56, 189, 248, 0.15)">
        <div style="font-size: 10px; color: var(--primary); font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px">{{ $setting['label'] }}</div>
        <div style="font-size: 24px; font-weight: 800; color: white; margin-bottom: 8px">{{ $setting['value'] }}</div>
        <p style="color: var(--text-secondary); font-size: 12px; line-height: 1.6">{{ $setting['hint'] }}</p>
    </div>
    @endforeach

    <div class="zenith-card" style="background: rgba(239, 68, 68, 0.05); border-color: rgba(239, 68, 68, 0.2); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center">
        <div style="font-size: 32px; margin-bottom: 16px">🔥</div>
        <h4 style="color: var(--error); margin-bottom: 12px">Hard System Reset</h4>
        <p style="color: var(--text-secondary); font-size: 12px; margin-bottom: 20px">Emergency flush of all neural caches and simulation buffers.</p>
        <button class="btn-zenith" style="background: var(--error); color: white; font-size: 11px">Purge All Nodes</button>
    </div>
</div>
@endsection
