<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenith Portal Access</title>
    <link rel="stylesheet" href="{{ asset('css/zenith.css') }}">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: radial-gradient(circle at center, var(--bg-surface) 0%, var(--bg-deep) 100%);
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 40px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-secondary);
            margin-bottom: 8px;
            font-weight: 800;
        }
        .input-group input {
            width: 100%;
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--border);
            padding: 14px 20px;
            border-radius: 12px;
            color: white;
            outline: none;
            transition: all 0.3s;
        }
        .input-group input:focus {
            border-color: var(--primary);
            background: rgba(255,255,255,0.05);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>
<body>
    <div class="zenith-card login-card animate-fade-up">
        <div class="brand" style="text-align: center; margin-bottom: 30px; font-size: 28px">
            <span style="color: var(--primary)">Zenith</span> Portal
        </div>
        
        @if($errors->any())
            <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid var(--error); color: var(--error); padding: 12px; border-radius: 10px; font-size: 13px; margin-bottom: 20px">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Admin Identifier</label>
                <input type="email" name="email" placeholder="admin@cityiq.site" required>
            </div>
            <div class="input-group">
                <label>Security Key</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn-zenith btn-primary" style="width: 100%; justify-content: center; margin-top: 10px">
                Establish Connection
            </button>
        </form>

        <div style="text-align: center; margin-top: 30px">
            <a href="/" style="color: var(--text-secondary); text-decoration: none; font-size: 12px">← Return to Public Network</a>
        </div>
    </div>
</body>
</html>
