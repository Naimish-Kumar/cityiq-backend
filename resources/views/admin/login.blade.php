<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CityIQ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/cityiq_logo.png') }}" type="image/x-icon">
</head>
<body class="login-body">
    <section class="login-card glass-card animate">
        <div class="logo login-logo">
            <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="CityIQ logo">
            <span>Admin IQ</span>
        </div>

        <p class="eyebrow">Restricted access</p>
        <h1>Welcome back</h1>
        <p class="page-copy">Sign in to manage live metrics, users, and platform configuration.</p>

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="form-stack">
            @csrf
            <label class="input-group">
                <span>Email Address</span>
                <input type="email" name="email" required placeholder="admin@cityiq.site">
            </label>

            <label class="input-group">
                <span>Password</span>
                <input type="password" name="password" required placeholder="Enter secure password">
            </label>

            <button type="submit" class="nav-btn">Sign In</button>
        </form>

        <a href="{{ route('landing') }}" class="back-link">Back to website</a>
    </section>
</body>
</html>
