<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | CityIQ Admin</title>
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
            
            <nav class="side-nav" style="background: none; position: static; border: none; padding: 0;">
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
                 <a href="{{ route('landing') }}" style="color: var(--grey);">Log Out</a>
            </div>
        </aside>

        <main class="main-content">
            <header style="margin-bottom: 40px;">
                <h1>System Settings</h1>
                <p style="color: var(--grey);">Configure global application parameters.</p>
            </header>

            <div class="glass-card">
                <div style="display: flex; flex-direction: column; gap: 30px;">
                    <div>
                        <h3 style="margin-bottom: 10px;">Maintenance Mode</h3>
                        <p style="font-size: 14px; color: var(--grey); margin-bottom: 15px;">Enable this to show a maintenance page to all users except admins.</p>
                        <button style="padding: 8px 20px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white; border-radius: 8px;">Disabled</button>
                    </div>

                    <div>
                        <h3 style="margin-bottom: 10px;">Backup Database</h3>
                        <p style="font-size: 14px; color: var(--grey); margin-bottom: 15px;">Last backup: 2 hours ago (12.4 MB)</p>
                        <button class="btn-primary">Generate Backup Now</button>
                    </div>

                    <div>
                        <h3 style="margin-bottom: 10px;">API Rate Limiting</h3>
                        <p style="font-size: 14px; color: var(--grey); margin-bottom: 15px;">Current threshold: 60 requests / minute per user.</p>
                        <input type="number" value="60" style="padding: 10px; background: rgba(0,0,0,0.2); border: 1px solid var(--border); color: white; border-radius: 8px; width: 100px;">
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
