@extends('layouts.admin')

@section('title', 'Registered Node Entities — Users')

@section('content')
<div x-data="{ 
    editOpen: false, 
    currentUser: {},
    openEdit(user) {
        this.currentUser = user;
        this.editOpen = true;
    }
}">
    <div class="zenith-card" style="padding: 0; overflow: hidden">
        <div style="padding: 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center">
            <h3 style="font-size: 18px">Entity Directory</h3>
            <span class="hero-tag" style="background: rgba(56, 189, 248, 0.1); border-color: rgba(56, 189, 248, 0.2)">
                {{ $users->total() }} Active Nodes
            </span>
        </div>
        
        <div style="overflow-x: auto">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px">
                <thead>
                    <tr style="background: rgba(255,255,255,0.02); text-align: left">
                        <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">ENTITY NAME</th>
                        <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">SIGNAL ORIGIN</th>
                        <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">SECURITY RANK</th>
                        <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">ACTIVITY</th>
                        <th style="padding: 16px 24px; color: var(--text-secondary); border-bottom: 1px solid var(--border)">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @php
                        $activity = $user->reviews_count + $user->ai_queries_count;
                        $role = $user->email === 'admin@cityiq.site' ? 'System Admin' : ($activity > 5 ? 'Power User' : 'Node User');
                    @endphp
                    <tr style="border-bottom: 1px solid var(--border); transition: background 0.3s" onmouseover="this.style.background='rgba(56, 189, 248, 0.02)'" onmouseout="this.style.background='transparent'">
                        <td style="padding: 16px 24px">
                            <div style="font-weight: 700; color: white">{{ $user->name }}</div>
                            <div style="font-size: 12px; color: var(--text-secondary)">{{ $user->email }}</div>
                        </td>
                        <td style="padding: 16px 24px; color: var(--text-secondary)">{{ $user->location ?: 'Orbiting' }}</td>
                        <td style="padding: 16px 24px">
                            <span style="font-size: 11px; padding: 4px 8px; border-radius: 4px; background: rgba(56, 189, 248, 0.1); color: var(--primary); font-weight: 800; text-transform: uppercase">{{ $role }}</span>
                        </td>
                        <td style="padding: 16px 24px">
                            <div style="display: flex; align-items: center; gap: 8px; color: {{ $activity > 0 ? 'var(--success)' : 'var(--text-secondary)' }}">
                                <div style="width: 6px; height: 6px; background: currentColor; border-radius: 50%; box-shadow: {{ $activity > 0 ? '0 0 8px var(--success)' : 'none' }}"></div>
                                {{ $activity }} Signals
                            </div>
                        </td>
                        <td style="padding: 16px 24px; display: flex; gap: 12px">
                            <button @click="openEdit({ id: '{{ $user->id }}', name: '{{ $user->name }}', email: '{{ $user->email }}', location: '{{ $user->location }}' })" class="btn-zenith" style="padding: 6px 14px; font-size: 10px; background: rgba(56, 189, 248, 0.05); border: 1px solid rgba(56, 189, 248, 0.2); color: var(--primary)">Configure Node</button>
                            
                            @if($user->email !== 'admin@cityiq.site')
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Initiate node purge protocol?')">
                                @csrf
                                <button type="submit" class="btn-zenith" style="padding: 6px 14px; font-size: 10px; background: rgba(244, 63, 94, 0.05); border: 1px solid rgba(244, 63, 94, 0.2); color: var(--error)">Purge</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($users->hasPages())
        <div style="padding: 24px; border-top: 1px solid var(--border)">
            {{ $users->links() }}
        </div>
        @endif
    </div>

    <!-- 🧬 Edit Node Modal -->
    <template x-if="editOpen">
        <div style="position: fixed; inset: 0; background: rgba(2, 6, 23, 0.85); backdrop-filter: blur(8px); display: flex; align-items: center; justify-content: center; z-index: 2000; padding: 20px" @click.self="editOpen = false">
            <div class="zenith-card" style="width: 100%; max-width: 500px; padding: 32px">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px">
                    <h3 style="font-size: 20px">Reconstruct Node Profile</h3>
                    <button @click="editOpen = false" style="background: none; border: none; color: var(--text-secondary); cursor: pointer; font-size: 18px">×</button>
                </div>

                <form :action="'{{ url('admin/users') }}/' + currentUser.id" method="POST">
                    @csrf
                    <div style="margin-bottom: 24px">
                        <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Entity Name</label>
                        <input type="text" name="name" x-model="currentUser.name" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
                    </div>

                    <div style="margin-bottom: 24px">
                        <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Signal Identifier (Email)</label>
                        <input type="email" name="email" x-model="currentUser.email" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
                    </div>

                    <div style="margin-bottom: 32px">
                        <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Origin Coordinate (Location)</label>
                        <input type="text" name="location" x-model="currentUser.location" placeholder="e.g. Dubai, UAE" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
                    </div>

                    <div style="display: flex; gap: 16px">
                        <button type="button" @click="editOpen = false" class="btn-zenith" style="flex: 1; justify-content: center; background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white">Abort</button>
                        <button type="submit" class="btn-zenith btn-primary" style="flex: 2; justify-content: center">Confirm Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
@endsection
