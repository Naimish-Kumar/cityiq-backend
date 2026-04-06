<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CityIQ — Global Intelligence')</title>
    <link rel="stylesheet" href="{{ asset('css/zenith.css') }}">
    <script src="https://kit.fontawesome.com/your-fa-key.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('styles')
</head>
<body>
    <div class="mesh-bg"></div>
    <div class="grid-overlay"></div>

    <nav class="glass-nav">
        <div class="brand">
            <span style="color: var(--primary)">City</span>IQ <span class="hero-tag" style="margin-left: 10px; vertical-align: middle">v2.0</span>
        </div>
        <div class="nav-links">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Explorer</a>
            <a href="/about" class="nav-link">Intelligence</a>
            <a href="/faq" class="nav-link">Network</a>
        </div>
        <div class="nav-actions">
            <a href="{{ route('admin.login') }}" class="btn-zenith btn-primary">
                Portal Access
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer style="padding: 100px 5%; border-top: 1px solid var(--border); background: var(--bg-surface)">
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 50px">
            <div>
                <h3 style="margin-bottom: 20px">CityIQ Zenith</h3>
                <p style="color: var(--text-secondary); font-size: 14px">Simulating lived experiences through data-driven global intelligence.</p>
            </div>
            <div>
                <h4 style="margin-bottom: 15px">Modules</h4>
                <ul style="list-style: none; color: var(--text-secondary); font-size: 14px">
                    <li style="margin-bottom: 8px">Safety Monitor</li>
                    <li style="margin-bottom: 8px">Cost Simulator</li>
                    <li style="margin-bottom: 8px">Visa Intelligence</li>
                </ul>
            </div>
            <div>
                <h4 style="margin-bottom: 15px">Legal</h4>
                <a href="/privacy" style="display: block; color: var(--text-secondary); text-decoration: none; margin-bottom: 8px">Privacy</a>
                <a href="/terms" style="display: block; color: var(--text-secondary); text-decoration: none">Terms</a>
            </div>
        </div>
        <div style="text-align: center; margin-top: 80px; color: var(--border); font-size: 12px">
            © 2026 CityIQ Global. All systems operational.
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
