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
    <div class="site-shell">
        <nav class="site-nav">
            <a href="{{ route('landing') }}" class="logo">
                <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ logo">
                <span>CityIQ</span>
            </a>

            <div class="nav-links">
                <a href="{{ route('landing') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('landing') }}#features">Features</a>
                <a href="{{ route('faq') }}" class="{{ Request::is('faq') ? 'active' : '' }}">FAQ</a>
                <a href="{{ route('admin.login') }}" class="nav-btn">Admin Portal</a>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="footer-grid">
                <div>
                    <div class="logo footer-logo">
                        <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ logo">
                        <span>CityIQ</span>
                    </div>
                    <p>Smart urban intelligence for better living. Explore neighborhoods, compare costs, and move with confidence.</p>
                </div>
                <div>
                    <h4>Platform</h4>
                    <ul>
                        <li><a href="{{ route('landing') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('landing') }}#features">Features</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} CityIQ Analytics</span>
                <span>Built for faster, better relocation decisions.</span>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.body.classList.add('js');
            const items = document.querySelectorAll('.animate');

            if (!('IntersectionObserver' in window)) {
                items.forEach((item) => item.classList.add('is-visible'));
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            items.forEach((item) => observer.observe(item));
        });
    </script>
</body>
</html>
