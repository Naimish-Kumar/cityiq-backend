<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | CityIQ Admin</title>
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
            <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
                <h1>User Management</h1>
                <button class="btn-primary">+ Add New User</button>
            </header>

            <div class="glass-card">
                 <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 1px solid var(--border);">
                            <th style="padding: 15px 0;">User</th>
                            <th style="padding: 15px 0;">Role</th>
                            <th style="padding: 15px 0;">Status</th>
                            <th style="padding: 15px 0;">Last Seen</th>
                            <th style="padding: 15px 0;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 20px 0;">
                                <div style="font-weight: 600;">Naimish Varma</div>
                                <div style="font-size: 12px; color: var(--grey);">naimish@cityiq.site</div>
                            </td>
                            <td style="padding: 20px 0;"><span style="padding: 4px 10px; background: rgba(59, 130, 246, 0.1); border-radius: 4px; color: #3b82f6; font-size: 12px;">Admin</span></td>
                            <td style="padding: 20px 0;"><span style="color: #4ade80;">Active</span></td>
                            <td style="padding: 20px 0; color: var(--grey);">Just now</td>
                            <td style="padding: 20px 0; color: var(--accent);">Edit</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 20px 0;">
                                <div style="font-weight: 600;">Deepak Kumar</div>
                                <div style="font-size: 12px; color: var(--grey);">deepak@cityiq.site</div>
                            </td>
                            <td style="padding: 20px 0;"><span style="padding: 4px 10px; background: rgba(59, 130, 246, 0.1); border-radius: 4px; color: #3b82f6; font-size: 12px;">Moderator</span></td>
                            <td style="padding: 20px 0;"><span style="color: #4ade80;">Active</span></td>
                            <td style="padding: 20px 0; color: var(--grey);">15 mins ago</td>
                            <td style="padding: 20px 0; color: var(--accent);">Edit</td>
                        </tr>
                        <tr>
                            <td style="padding: 20px 0;">
                                <div style="font-weight: 600;">Rahul Sharma</div>
                                <div style="font-size: 12px; color: var(--grey);">rahul@gmail.com</div>
                            </td>
                            <td style="padding: 20px 0;"><span style="padding: 4px 10px; background: rgba(255, 255, 255, 0.05); border-radius: 4px; color: var(--grey); font-size: 12px;">User</span></td>
                            <td style="padding: 20px 0;"><span style="color: #4ade80;">Active</span></td>
                            <td style="padding: 20px 0; color: var(--grey);">1 hour ago</td>
                            <td style="padding: 20px 0; color: var(--accent);">Edit</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
