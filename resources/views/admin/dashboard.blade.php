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
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="logo animate" style="margin-bottom: 50px;">
                <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="Logo">
                <span>Admin IQ</span>
            </div>
            
            <nav class="side-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <span>📊</span> Dashboard
                </a>
                <a href="{{ route('admin.credentials') }}" class="{{ Route::is('admin.credentials') ? 'active' : '' }}">
                    <span>🔑</span> Credentials
                </a>
                <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'active' : '' }}">
                    <span>👥</span> Users
                </a>
                <a href="{{ route('admin.settings') }}" class="{{ Route::is('admin.settings') ? 'active' : '' }}">
                    <span>⚙️</span> Settings
                </a>
            </nav>

            <div style="margin-top: auto; padding: 20px; border-top: 1px solid var(--border);">
                 <a href="{{ route('admin.logout') }}" style="color: var(--grey); display: flex; align-items: center; gap: 10px;">
                    <span>🚪</span> Log Out
                 </a>
            </div>
        </aside>

        <main class="main-scroll">
            <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;" class="animate">
                <h1>Analytics Overview</h1>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="text-align: right;">
                        <div style="font-weight: 600;">System Administrator</div>
                        <div style="font-size: 12px; color: var(--grey);">admin@cityiq.site</div>
                    </div>
                    <div style="width: 42px; height: 42px; border-radius: 12px; background: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 700;">A</div>
                </div>
            </header>

            <div class="feature-grid animate delay-1" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                <div class="stats-card">
                    <h3>Total Registered Users</h3>
                    <div class="val">{{ $stats['total_users'] }}</div>
                    <div style="color: var(--primary); font-size: 12px; margin-top: 5px;">+12.4% this week</div>
                </div>
                <div class="stats-card">
                    <h3>Active City Areas</h3>
                    <div class="val">{{ $stats['active_areas'] }}</div>
                    <div style="color: var(--primary); font-size: 12px; margin-top: 5px;">Data coverage ready</div>
                </div>
                <div class="stats-card">
                    <h3>Average Living Cost</h3>
                    <div class="val">{{ $stats['avg_cost'] }}</div>
                    <div style="color: var(--grey); font-size: 12px; margin-top: 5px;">Calculated dynamically</div>
                </div>
                <div class="stats-card">
                    <h3>Total API Activity</h3>
                    <div class="val">{{ $stats['api_calls'] }}</div>
                    <div style="color: var(--secondary); font-size: 12px; margin-top: 5px;">AI Queries & Feed</div>
                </div>
            </div>

            <div class="glass-card animate delay-2" style="margin-top: 40px; padding: 30px;">
                <h2>Recent Activity Feed</h2>
                <div style="margin-top: 25px;">
                    <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--border);">
                        <div>
                            <div style="font-weight: 600;">Naimish Varma</div>
                            <div style="font-size: 12px; color: var(--grey);">Requested Area Detail: Bangalore</div>
                        </div>
                        <div style="text-align: right;">
                            <div class="text-primary" style="font-weight: 600;">Success</div>
                            <div style="font-size: 12px; color: var(--grey);">2 mins ago</div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid var(--border);">
                        <div>
                            <div style="font-weight: 600;">Sarah Chen</div>
                            <div style="font-size: 12px; color: var(--grey);">Used Cost Calculator: Dubai</div>
                        </div>
                        <div style="text-align: right;">
                            <div class="text-primary" style="font-weight: 600;">Success</div>
                            <div style="font-size: 12px; color: var(--grey);">15 mins ago</div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 0;">
                        <div>
                            <div style="font-weight: 600;">Rahul Sharma</div>
                            <div style="font-size: 12px; color: var(--grey);">User Signup via Google Auth</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="color: var(--accent); font-weight: 600;">New User</div>
                            <div style="font-size: 12px; color: var(--grey);">1 hour ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
