<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credentials | CityIQ Admin</title>
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
                <h1>Credential Management</h1>
                <p style="color: var(--grey);">Manage API keys, Firebase secrets, and database credentials.</p>
            </header>

            <div class="glass-card">
                <h2>API Credentials</h2>
                <div style="margin-top: 20px;">
                    <div style="margin-bottom: 25px; border-bottom: 1px solid var(--border); padding-bottom: 20px;">
                        <h3 style="margin-bottom: 10px;">Google Maps Key</h3>
                        <div style="padding: 15px; background: rgba(0,0,0,0.2); border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <code style="color: var(--accent);">AIzaSyBw..._...qXyZ1</code>
                            <div style="display: flex; gap: 10px;">
                                <button style="padding: 6px 12px; background: var(--border); color: white; border-radius: 6px;">Copy</button>
                                <button style="padding: 6px 12px; background: #e11d48; color: white; border-radius: 6px;">Regenerate</button>
                            </div>
                        </div>
                         <p style="font-size: 12px; color: var(--grey); margin-top: 8px;">Used for Geolocation and Mapping features in mobile app.</p>
                    </div>

                    <div style="margin-bottom: 25px; border-bottom: 1px solid var(--border); padding-bottom: 20px;">
                        <h3 style="margin-bottom: 10px;">Appwrite API Key</h3>
                        <div style="padding: 15px; background: rgba(0,0,0,0.2); border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <code style="color: var(--accent);">sh-67...bc-123...45</code>
                            <div style="display: flex; gap: 10px;">
                                <button style="padding: 6px 12px; background: var(--border); color: white; border-radius: 6px;">Copy</button>
                                <button style="padding: 6px 12px; background: #e11d48; color: white; border-radius: 6px;">Regenerate</button>
                            </div>
                        </div>
                        <p style="font-size: 12px; color: var(--grey); margin-top: 8px;">Provides access to file storage and real-time database.</p>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <h3 style="margin-bottom: 10px;">OpenAI GPT-4o Token</h3>
                        <div style="padding: 15px; background: rgba(0,0,0,0.2); border-radius: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <code style="color: var(--accent);">sk-vF...tY_...0M</code>
                            <div style="display: flex; gap: 10px;">
                                <button style="padding: 6px 12px; background: var(--border); color: white; border-radius: 6px;">Copy</button>
                                <button style="padding: 6px 12px; background: #e11d48; color: white; border-radius: 6px;">Update</button>
                            </div>
                        </div>
                        <p style="font-size: 12px; color: var(--grey); margin-top: 8px;">Used for 'Ask AI' features and insights generation.</p>
                    </div>
                </div>
            </div>

            <div class="stat-card" style="margin-top: 40px; border-color: #f43f5e; background: rgba(244, 63, 94, 0.05);">
                <h3 style="color: #f43f5e;">Security Warning</h3>
                <p style="margin-top: 10px; font-size: 14px;">Credentials shown here grant full administrative access to linked services. Never share these keys on public repositories or insecure channels.</p>
            </div>
        </main>
    </div>
</body>
</html>
