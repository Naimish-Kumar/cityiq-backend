@extends('layouts.admin')

@section('title', 'Users | CityIQ Admin')

@section('content')
    <section class="admin-page">
        <header class="admin-header">
            <div>
                <p class="eyebrow">Community</p>
                <h1>User Management</h1>
                <p class="page-copy">Activity-based roster generated from the current database.</p>
            </div>
        </header>

        <section class="panel-card">
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Location</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Activity</th>
                            <th>Last Seen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <strong>{{ $user['name'] }}</strong>
                                    <span>{{ $user['email'] }}</span>
                                </td>
                                <td>{{ $user['location'] }}</td>
                                <td><span class="status-badge info">{{ $user['role'] }}</span></td>
                                <td><span class="status-badge {{ $user['status'] === 'Active' ? 'positive' : 'neutral' }}">{{ $user['status'] }}</span></td>
                                <td>{{ $user['activity'] }} touchpoints</td>
                                <td>{{ $user['last_seen'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-table">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
