<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenith Command — Operational Control</title>
    <link rel="stylesheet" href="{{ asset('css/zenith.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
    <div class="mesh-bg"></div>
    <div class="grid-overlay"></div>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="brand" style="margin-bottom: 48px; font-size: 24px">
                <span class="gradient-text">Zenith</span> Command
            </div>
            
            <nav>
        <a href="{{ route('admin.dashboard') }}" class="side-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line"></i> Systems Overview
        </a>
        <a href="{{ route('admin.countries') }}" class="side-link {{ request()->routeIs('admin.countries') ? 'active' : '' }}">
            <i class="fa-solid fa-earth-americas"></i> Global Index
        </a>
        <a href="{{ route('admin.visa-requirements') }}" class="side-link {{ request()->routeIs('admin.visa-requirements') ? 'active' : '' }}">
            <i class="fa-solid fa-passport"></i> Visa Navigator
        </a>
        <a href="{{ route('admin.intelligence') }}" class="side-link {{ request()->routeIs('admin.intelligence') ? 'active' : '' }}">
            <i class="fa-solid fa-brain"></i> Neural Logs
        </a>
        <a href="{{ route('admin.settings') }}" class="side-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
            <i class="fa-solid fa-gears"></i> Core Services
        </a>
            </nav>
            
            <div style="margin-top: auto; padding-top: 40px">
                <div class="zenith-card" style="padding: 16px; margin-bottom: 20px; border-color: rgba(16, 185, 129, 0.2)">
                    <div style="font-size: 10px; color: var(--success); font-weight: 800; margin-bottom: 4px; text-transform: uppercase">System Status</div>
                    <div style="font-size: 12px; color: white; display: flex; align-items: center; gap: 8px">
                        <div style="width: 6px; height: 6px; background: var(--success); border-radius: 50%; box-shadow: 0 0 10px var(--success)"></div>
                        All Nodes Optimal
                    </div>
                </div>
                <a href="{{ route('admin.logout') }}" class="side-link" style="color: var(--error)">
                    <span>🚪</span> Deactivate Session
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 48px">
                <div>
                    <h1 style="font-size: 28px; margin-bottom: 4px">@yield('title', 'Primary Control')</h1>
                    <p style="color: var(--text-secondary); font-size: 13px">ID: {{ strtoupper(substr((string) Session::getId(), 0, 12)) }} • Location: Global Hub</p>
                </div>
                <div style="display: flex; align-items: center; gap: 20px">
                    <div class="zenith-card" style="padding: 8px 16px; border-radius: 12px; display: flex; align-items: center; gap: 10px">
                         <div style="width: 32px; height: 32px; background: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #020617">
                            {{ substr((string) Session::get('admin_email', 'A'), 0, 1) }}
                         </div>
                         <div style="font-size: 12px; font-weight: 700">Administrator</div>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div class="zenith-card" style="margin-bottom: 32px; padding: 16px 24px; border-color: rgba(16, 185, 129, 0.4); background: rgba(16, 185, 129, 0.1); color: #10b981; font-weight: 600; display: flex; align-items: center; gap: 12px">
                    <div style="width: 8px; height: 8px; background: currentColor; border-radius: 50%; box-shadow: 0 0 10px currentColor"></div>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="zenith-card" style="margin-bottom: 32px; padding: 16px 24px; border-color: rgba(239, 68, 68, 0.4); background: rgba(239, 68, 68, 0.1); color: #ef4444; font-weight: 600; display: flex; align-items: center; gap: 12px">
                    <div style="width: 8px; height: 8px; background: currentColor; border-radius: 50%; box-shadow: 0 0 10px currentColor"></div>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
