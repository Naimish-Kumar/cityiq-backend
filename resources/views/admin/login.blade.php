<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CityIQ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/cityiq_logo.png') }}" type="image/x-icon">
</head>
<body style="display: flex; align-items: center; justify-content: center; min-height: 100vh; background: #010409;">
    <div class="glass-card animate" style="width: 100%; max-width: 400px; padding: 40px; text-align: center;">
        <div class="logo" style="justify-content: center; margin-bottom: 30px;">
            <img src="{{ asset('assets/logo/cityiq_logo.png') }}" alt="Logo">
            <span>Admin IQ</span>
        </div>
        
        <h2 style="margin-bottom: 10px;">Welcome Back</h2>
        <p style="color: var(--grey); margin-bottom: 30px; font-size: 14px;">Authorized Personnel Only</p>
        
        @if(session('error'))
            <div style="background: rgba(244, 63, 94, 0.1); color: #f43f5e; padding: 12px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; border: 1px solid rgba(244, 63, 94, 0.2);">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="display: block; font-size: 12px; font-weight: 600; color: var(--grey); text-transform: uppercase; margin-bottom: 8px;">Email Address</label>
                <input type="email" name="email" required style="width: 100%; background: var(--darker); border: 1px solid var(--border); padding: 14px; border-radius: 12px; color: white; outline: none; font-family: inherit;">
            </div>
            
            <div style="text-align: left; margin-bottom: 30px;">
                <label style="display: block; font-size: 12px; font-weight: 600; color: var(--grey); text-transform: uppercase; margin-bottom: 8px;">Password</label>
                <input type="password" name="password" required style="width: 100%; background: var(--darker); border: 1px solid var(--border); padding: 14px; border-radius: 12px; color: white; outline: none; font-family: inherit;">
            </div>
            
            <button type="submit" class="nav-btn" style="width: 100%; padding: 16px; font-size: 16px; cursor: pointer; border: none;">Sign In</button>
        </form>
        
        <div style="margin-top: 30px; font-size: 13px; color: var(--grey);">
            <a href="{{ route('landing') }}">← Back to Website</a>
        </div>
    </div>
</body>
</html>
