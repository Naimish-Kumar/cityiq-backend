<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin CityIQ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/cityiq_logo.png') }}" type="image/x-icon">
</head>
<body>
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="Logo">
                <span>Admin IQ</span>
            </div>
            
            <nav class="side-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <span>📊</span> Dashboard
                </a>
                <a href="{{ route('admin.credentials') }}" class="{{ Route::currentRouteName() == 'admin.credentials' ? 'active' : '' }}">
                    <span>🔑</span> Credentials
                </a>
                <a href="{{ route('admin.users') }}" class="{{ Route::currentRouteName() == 'admin.users' ? 'active' : '' }}">
                    <span>👥</span> Users
                </a>
                <a href="{{ route('admin.settings') }}" class="{{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}">
                    <span>⚙️</span> Settings
                </a>
            </nav>

            <div style="margin-top: auto; padding: 20px; border-top: 1px solid var(--border);">
                 <a href="{{ route('admin.logout') }}" style="color: var(--grey); display: flex; align-items: center; gap: 10px;">
                    <span>🚪</span> Log Out
                 </a>
            </div>
        </aside>

        <main class="main-content">
            <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
                <h1>Analytics Overview</h1>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="text-align: right;">
                        <div style="font-weight: 600;">System Administrator</div>
                        <div style="font-size: 12px; color: var(--grey);">admin@cityiq.site</div>
                    </div>
                </div>
            </header>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Registered Users</h3>
                    <div class="value">{{ $stats['total_users'] }}</div>
                    <div style="color: #4ade80; font-size: 12px;">+12% from last month</div>
                </div>
                <div class="stat-card">
                    <h3>Active City Areas</h3>
                    <div class="value">{{ $stats['active_areas'] }}</div>
                    <div style="color: #4ade80; font-size: 12px;">5 new areas added</div>
                </div>
                <div class="stat-card">
                    <h3>Average Living Cost</h3>
                    <div class="value">{{ $stats['avg_cost'] }}</div>
                    <div style="color: var(--grey); font-size: 12px;">updated daily</div>
                </div>
                <div class="stat-card">
                    <h3>Total API Requests</h3>
                    <div class="value">{{ $stats['api_calls'] }}</div>
                    <div style="color: #3b82f6; font-size: 12px;">normal traffic</div>
                </div>
            </div>

            <div class="glass-card" style="margin-top: 40px;">
                <h2>Recent Activity</h2>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 1px solid var(--border);">
                            <th style="padding: 15px 0;">User</th>
                            <th style="padding: 15px 0;">Action</th>
                            <th style="padding: 15px 0;">Status</th>
                            <th style="padding: 15px 0;">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 15px 0;">Naimish Varma</td>
                            <td style="padding: 15px 0;">Requested Area Detail: Bangalore</td>
                            <td style="padding: 15px 0;"><span style="color: #4ade80;">Success</span></td>
                            <td style="padding: 15px 0; color: var(--grey);">2 mins ago</td>
                        </tr>
                         <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 15px 0;">Deepak Kumar</td>
                            <td style="padding: 15px 0;">Used Cost Calculator: Mumbai</td>
                            <td style="padding: 15px 0;"><span style="color: #4ade80;">Success</span></td>
                            <td style="padding: 15px 0; color: var(--grey);">15 mins ago</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px 0;">Rahul Sharma</td>
                            <td style="padding: 15px 0;">User Signup via Google Auth</td>
                            <td style="padding: 15px 0;"><span style="color: #4ade80;">New</span></td>
                            <td style="padding: 15px 0; color: var(--grey);">1 hour ago</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
