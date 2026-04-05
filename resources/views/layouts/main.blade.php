<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CityIQ - Know your city')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/cityiq_logo.png') }}" type="image/x-icon">
    <meta name="description" content="CityIQ helps you analyze and compare cities before you move. Safety, cost, lifestyle and more.">
</head>
<body>
    <nav>
        <a href="/" class="logo animate">
            <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ">
            <span>CityIQ</span>
        </a>
        <ul class="nav-links animate">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('landing') }}#features">Features</a></li>
            <li><a href="{{ route('admin.dashboard') }}" class="btn-primary">Admin Login</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-col animate">
            <div class="logo">
                <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ">
                <span>CityIQ</span>
            </div>
            <p style="margin-top: 20px; color: var(--grey);">Smart urban intelligence for better living. Know your city before you move.</p>
        </div>
        <div class="footer-col animate">
            <h4>Application</h4>
            <ul>
                <li><a href="{{ route('landing') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('landing') }}#features">Features</a></li>
                <li><a href="#">Contact Support</a></li>
            </ul>
        </div>
        <div class="footer-col animate">
            <h4>Legal</h4>
            <ul>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                <li><a href="#">Cookie Policy</a></li>
                <li><a href="#">Security</a></li>
            </ul>
        </div>
        <div class="copyright animate">
            &copy; {{ date('Y') }} CityIQ Analytics. All rights reserved. Built for the future of urban living.
        </div>
    </footer>
</body>
</html>
