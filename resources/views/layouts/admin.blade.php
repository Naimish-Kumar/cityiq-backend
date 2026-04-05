<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin | CityIQ')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/cityiq_logo.png') }}" type="image/x-icon">
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a href="{{ route('admin.dashboard') }}" class="logo admin-logo">
                <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ logo">
                <span>Admin IQ</span>
            </a>

            <nav class="side-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">Overview</a>
                <a href="{{ route('admin.credentials') }}" class="{{ Route::is('admin.credentials') ? 'active' : '' }}">Credentials</a>
                <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'active' : '' }}">Users</a>
                <a href="{{ route('admin.settings') }}" class="{{ Route::is('admin.settings') ? 'active' : '' }}">Settings</a>
            </nav>

            <div class="admin-sidebar-footer">
                <a href="{{ route('landing') }}" class="sidebar-link">View website</a>
                <a href="{{ route('admin.logout') }}" class="sidebar-link">Log out</a>
            </div>
        </aside>

        <main class="admin-main">
            @yield('content')
        </main>
    </div>
</body>
</html>
