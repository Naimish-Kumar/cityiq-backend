@extends('layouts.admin')

@section('title', 'Global Country Index')

@section('content')
<div class="zenith-card" style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center">
    <div>
        <h3 style="font-size: 18px">Active Nations</h3>
        <p style="color: var(--text-secondary); font-size: 12px">Managing global intelligence profiles for v2.0</p>
    </div>
    <button class="btn-zenith btn-primary">+ Index New Country</button>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px">
    @foreach($countries as $country)
    <div class="zenith-card" style="padding: 24px; border-color: rgba(56, 189, 248, 0.15)">
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 20px">
            <div style="display: flex; gap: 12px; align-items: center">
                <div style="font-size: 20px; color: var(--primary)"><i class="fa-solid fa-earth-asia"></i></div>
                <div>
                    <h4 style="font-weight: 800">{{ $country->name }}</h4>
                    <div style="font-size: 10px; color: var(--text-secondary); letter-spacing: 1px">{{ strtoupper($country->code) }}</div>
                </div>
            </div>
            <div class="hero-tag" style="background: {{ $country->safety_score >= 70 ? 'rgba(16, 185, 129, 0.1)' : 'rgba(239, 68, 68, 0.1)' }}; color: {{ $country->safety_score >= 70 ? 'var(--success)' : 'var(--error)' }}">
                {{ $country->safety_score }} Safety
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px">
            <div>
                <div style="font-size: 10px; color: var(--text-secondary)">COST SCORE</div>
                <div style="font-weight: 700">{{ $country->cost_score }}/100</div>
            </div>
            <div>
                <div style="font-size: 10px; color: var(--text-secondary)">HEALTH SCORE</div>
                <div style="font-weight: 700">{{ $country->health_score }}/100</div>
            </div>
        </div>

        <div style="display: flex; gap: 10px">
            <button class="btn-zenith" style="flex: 1; font-size: 11px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white">Edit Intel</button>
            <button class="btn-zenith" style="padding: 10px; background: rgba(239, 68, 68, 0.1); color: var(--error); border: none">🗑️</button>
        </div>
    </div>
    @endforeach
</div>
@endsection
