@extends('layouts.admin')

@section('title', 'Registered Node Entities — Users')

@section('content')
<div class="zenith-card" style="padding: 0; overflow: hidden">
    <div style="padding: 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center">
        <h3 style="font-size: 18px">Entity Directory</h3>
        <span class="hero-tag" style="background: rgba(56, 189, 248, 0.1); border-color: rgba(56, 189, 248, 0.2)">Active Connections</span>
    </div>
    
    <div style="overflow-x: auto">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px">
            <thead>
                <tr style="background: rgba(255,255,255,0.02); text-align: left">
                    <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">ENTITY NAME</th>
                    <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">SIGNAL ORIGIN</th>
                    <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">SECURITY RANK</th>
                    <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">HEALTH STATUS</th>
                    <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr style="border-bottom: 1px solid var(--border); transition: background 0.3s" onmouseover="this.style.background='rgba(56, 189, 248, 0.02)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 16px 24px">
                        <div style="font-weight: 700; color: white">{{ $user['name'] }}</div>
                        <div style="font-size: 12px; color: var(--text-secondary)">{{ $user['email'] }}</div>
                    </td>
                    <td style="padding: 16px 24px; color: var(--text-secondary)">{{ $user['location'] }}</td>
                    <td style="padding: 16px 24px">
                        <span style="font-size: 11px; padding: 4px 8px; border-radius: 4px; background: rgba(56, 189, 248, 0.1); color: var(--primary); font-weight: 800">{{ $user['role'] }}</span>
                    </td>
                    <td style="padding: 16px 24px">
                        <div style="display: flex; align-items: center; gap: 8px; color: {{ $user['status'] == 'Active' ? 'var(--success)' : 'var(--text-secondary)' }}">
                            <div style="width: 6px; height: 6px; background: currentColor; border-radius: 50%"></div>
                            {{ $user['status'] }}
                        </div>
                    </td>
                    <td style="padding: 16px 24px">
                        <button class="btn-zenith" style="padding: 6px 12px; font-size: 10px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white">Audit Signal</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
