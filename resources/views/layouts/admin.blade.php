<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenith Command — CityIQ Admin</title>
    <link rel="stylesheet" href="{{ asset('css/zenith.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .sidebar {
            width: 260px;
            background: var(--bg-surface);
            height: 100vh;
            position: fixed;
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            margin-left: 260px;
            padding: 40px;
            min-height: 100vh;
            background: var(--bg-deep);
        }
        .side-link {
            padding: 12px 18px;
            border-radius: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }
        .side-link:hover, .side-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary);
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand" style="margin-bottom: 40px; font-size: 24px">
            <span style="color: var(--primary)">Zenith</span> Intel
        </div>
        
        <a href="{{ route('admin.dashboard') }}" class="side-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span>📊</span> Dashboard
        </a>
        <a href="#" class="side-link">
            <span>🌍</span> Countries
        </a>
        <a href="#" class="side-link">
            <span>🛡️</span> Safety Monitor
        </a>
        <a href="#" class="side-link">
            <span>🤖</span> AI Logs
        </a>
        
        <div style="margin-top: auto">
            <a href="{{ route('admin.logout') }}" class="side-link" style="color: var(--error)">
                <span>🚪</span> Sign Out
            </a>
        </div>
    </div>

    <div class="main-content">
        <header class="admin-header">
            <div>
                <h1 style="font-size: 24px">@yield('title', 'Control Center')</h1>
                <p style="color: var(--text-secondary); font-size: 13px">Global Systems Overview</p>
            </div>
            <div style="display: flex; align-items: center; gap: 15px">
                <div class="hero-tag" style="margin-bottom: 0; color: var(--success); border-color: rgba(16, 185, 129, 0.2); background: rgba(16, 185, 129, 0.05)">Live</div>
                <div style="width: 40px; height: 40px; background: var(--primary); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold">
                    AD
                </div>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>
