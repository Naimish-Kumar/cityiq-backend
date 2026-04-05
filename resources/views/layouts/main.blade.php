<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CityIQ - Urban Intelligence & Move Analysis')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/cityiq_logo.png') }}" type="image/x-icon">
    <meta name="description" content="CityIQ helps you analyze and compare cities before you move. Safety, cost, lifestyle and more.">
</head>
<body>
    <nav>
        <a href="/" class="logo">
            <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ">
            <span>CityIQ</span>
        </a>
        <div class="nav-links">
            <a href="{{ route('landing') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('landing') }}#features">Features</a>
            <a href="{{ route('landing') }}#pricing">Pricing</a>
            <a href="{{ route('admin.login') }}" class="nav-btn">Admin Portal</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="section" style="padding-top: 0; padding-bottom: 0;">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="logo" style="margin-bottom: 20px;">
                        <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ">
                        <span>CityIQ</span>
                    </div>
                    <p style="color: var(--grey); max-width: 300px;">Smart urban intelligence for better living. Know your city before you move using our advanced AI analytics.</p>
                </div>
                <div class="footer-col">
                    <h4>Platform</h4>
                    <ul>
                        <li><a href="{{ route('landing') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('landing') }}#features">Features</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
            </div>
            
            <div style="text-align: center; padding: 40px 0; border-top: 1px solid var(--border); color: var(--grey); font-size: 14px;">
                &copy; {{ date('Y') }} CityIQ Analytics. Built with precision for local dwellers.
            </div>
        </div>
    </footer>
</body>
</html>
