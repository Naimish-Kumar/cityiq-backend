@extends('layouts.admin')

@section('title', 'Visa Protocol Navigator')

@section('content')
<div class="zenith-card" style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center">
    <div>
        <h3 style="font-size: 18px">Passport Rule-sets</h3>
        <p style="color: var(--text-secondary); font-size: 12px">Managing over 30,000 passport-destination combinations.</p>
    </div>
    <div style="display: flex; gap: 12px">
        <input type="text" placeholder="Search rules..." style="background: rgba(255,255,255,0.03); border: 1px solid var(--border); padding: 8px 16px; border-radius: 10px; color: white; outline: none; font-size: 13px">
        <button class="btn-zenith btn-primary">+ Define Rule</button>
    </div>
</div>

<div class="zenith-card" style="padding: 0; overflow: hidden">
    <table style="width: 100%; border-collapse: collapse; font-size: 13px">
        <thead>
            <tr style="background: rgba(255,255,255,0.02); text-align: left">
                <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">DESTINATION</th>
                <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">PASSPORT ORIGIN</th>
                <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">PROTOCOL TYPE</th>
                <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">DURATION</th>
                <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">HEALTH RISK</th>
                <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visaRequirements as $req)
            <tr style="border-bottom: 1px solid var(--border); transition: background 0.3s" onmouseover="this.style.background='rgba(56, 189, 248, 0.02)'" onmouseout="this.style.background='transparent'">
                <td style="padding: 16px 24px; font-weight: 700; color: white">{{ $req->country->name or 'Global' }}</td>
                <td style="padding: 16px 24px; color: var(--text-secondary)">{{ $req->passport_country_code }}</td>
                <td style="padding: 16px 24px">
                    <span style="font-size: 10px; padding: 4px 8px; border-radius: 4px; background: rgba(56, 189, 248, 0.1); color: var(--primary); font-weight: 800">{{ strtoupper($req->visa_type) }}</span>
                </td>
                <td style="padding: 16px 24px; color: var(--text-secondary)">{{ $req->duration ?? '30 Days' }}</td>
                <td style="padding: 16px 24px">
                    <div style="width: 100%; height: 4px; background: rgba(255,255,255,0.05); border-radius: 2px">
                        <div style="height: 100%; background: var(--success); width: 10%; border-radius: 2px"></div>
                    </div>
                </td>
                <td style="padding: 16px 24px">
                    <button class="btn-zenith" style="padding: 6px 12px; font-size: 10px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white">Edit Protocol</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
