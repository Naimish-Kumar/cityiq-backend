@extends('layouts.admin')

@section('title', 'Security Protocols — Credentials')

@section('content')
<div style="max-width: 1000px">
    <div style="display: flex; flex-direction: column; gap: 24px">
        @foreach($credentials as $cred)
        <div class="zenith-card shimmer" style="padding: 32px; border-color: rgba(56, 189, 248, 0.15)">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 24px">
                <div>
                    <div style="font-size: 10px; color: var(--primary); font-weight: 900; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 8px">{{ $cred['label'] or 'CORE KEY' }}</div>
                    <div style="font-size: 24px; font-family: 'Outfit'; font-weight: 800; color: white; display: flex; align-items: center; gap: 12px">
                        {{ $cred['value'] }}
                        <span class="hero-tag" style="background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.2); color: var(--success); font-size: 9px; vertical-align: middle">Verified</span>
                    </div>
                </div>
                <div style="text-align: right">
                    <button class="btn-zenith" style="padding: 10px 20px; font-size: 11px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white">Rotate Protocol Key</button>
                </div>
            </div>
            
            <div style="display: flex; gap: 40px; border-top: 1px solid var(--border); padding-top: 24px">
                <div style="flex: 1">
                    <div style="font-size: 11px; color: var(--text-secondary); line-height: 1.6">{{ $cred['description'] or 'Master cryptographic string controlling data-node integrity across the global network.' }}</div>
                </div>
                <div style="width: 200px">
                    <div style="font-size: 10px; color: var(--text-secondary); margin-bottom: 8px; text-transform: uppercase">Service Status</div>
                    <div style="font-size: 13px; font-weight: 800; color: var(--success); display: flex; align-items: center; gap: 8px">
                        <div style="width: 6px; height: 6px; background: var(--success); border-radius: 50%"></div>
                        {{ $cred['status'] or 'Operational' }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
