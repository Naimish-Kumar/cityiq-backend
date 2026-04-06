@extends('layouts.admin')

@section('title', 'Neural Framework Configuration — Settings')

@section('content')
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px">
    <!-- 📧 SMTP Service Config -->
    <div class="zenith-card" style="padding: 32px">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px">
            <div style="width: 48px; height: 48px; background: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 20px">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
            <div>
                <h3 style="font-size: 18px; margin-bottom: 4px">SMTP Protocol Hub</h3>
                <p style="color: var(--text-secondary); font-size: 12px">Managing automated communication nodes.</p>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="smtp">
            
            <div style="margin-bottom: 24px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">SMTP Host Address</label>
                <input type="text" name="mail_host" class="zenith-input" value="{{ config('mail.mailers.smtp.host') }}" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px">
                <div>
                    <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Service Port</label>
                    <input type="text" name="mail_port" class="zenith-input" value="{{ config('mail.mailers.smtp.port') }}" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
                </div>
                <div>
                    <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Encryption Protocol</label>
                    <select name="mail_encryption" style="width: 100%; padding: 14px; background: rgba(0,0,0,0.3); border: 1px solid var(--border); border-radius: 8px; color: white">
                        <option value="tls" {{ config('mail.mailers.smtp.encryption') == 'tls' ? 'selected' : '' }}>TLS (Recommended)</option>
                        <option value="ssl" {{ config('mail.mailers.smtp.encryption') == 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="none" {{ config('mail.mailers.smtp.encryption') == 'none' ? 'selected' : '' }}>None (Unsecured)</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 24px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Credential (Username)</label>
                <input type="text" name="mail_username" class="zenith-input" value="{{ config('mail.mailers.smtp.username') }}" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
            </div>

            <div style="margin-bottom: 32px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Credential (Secret)</label>
                <input type="password" name="mail_password" class="zenith-input" value="••••••••••••" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
            </div>

            <button type="submit" class="btn-zenith btn-primary" style="width: 100%; padding: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px">Synchronize SMTP Node</button>
        </form>
    </div>

    <!-- 🔥 Firebase Cloud Core -->
    <div class="zenith-card" style="padding: 32px">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px">
            <div style="width: 48px; height: 48px; background: rgba(245, 158, 11, 0.1); border: 1px solid rgba(245, 158, 11, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #F59E0B; font-size: 20px">
                <i class="fa-solid fa-fire-flame-curved"></i>
            </div>
            <div>
                <h3 style="font-size: 18px; margin-bottom: 4px">Firebase Cloud Engine</h3>
                <p style="color: var(--text-secondary); font-size: 12px">Real-time signal & push distribution layer.</p>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="firebase">
            
            <div style="margin-bottom: 24px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Neural Project ID</label>
                <input type="text" name="firebase_project_id" class="zenith-input" value="{{ env('FIREBASE_PROJECT_ID') }}" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
            </div>

            <div style="margin-bottom: 24px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Client API Key</label>
                <input type="text" name="firebase_api_key" class="zenith-input" value="{{ env('FIREBASE_API_KEY') }}" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
            </div>

            <button type="submit" class="btn-zenith" style="width: 100%; padding: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; background: #F59E0B; border: none; color: white">Initialize Cloud Engine</button>
        </form>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr; margin-top: 32px">
    <!-- 🤖 Gemini Neural Intelligence -->
    <div class="zenith-card" style="padding: 32px">
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px">
            <div style="width: 48px; height: 48px; background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #8B5CF6; font-size: 20px">
                <i class="fa-solid fa-brain"></i>
            </div>
            <div>
                <h3 style="font-size: 18px; margin-bottom: 4px">Gemini Neural Hub</h3>
                <p style="color: var(--text-secondary); font-size: 12px">Advanced generative intelligence power source.</p>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="gemini">
            
            <div style="margin-bottom: 32px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Neural Interface Key (GEMINI_API_KEY)</label>
                <input type="password" name="gemini_api_key" class="zenith-input" value="{{ env('GEMINI_API_KEY') ? '••••••••••••••••' : '' }}" placeholder="Enter your Google Gemini API Key" style="width: 100%; padding: 14px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: white">
            </div>

            <button type="submit" class="btn-zenith" style="width: 100%; padding: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; background: #8B5CF6; border: none; color: white">Activate Neural Hub</button>
        </form>
    </div>
</div>

<div class="zenith-card" style="margin-top: 32px; background: rgba(239, 68, 68, 0.03); border-color: rgba(239, 68, 68, 0.1); display: flex; justify-content: space-between; align-items: center">
    <div style="display: flex; align-items: center; gap: 20px">
        <div style="font-size: 24px">⚠️</div>
        <div>
            <h4 style="color: var(--error)">Neural System Purge</h4>
            <p style="color: var(--text-secondary); font-size: 11px">Emergency protocol to flush all encrypted tokens and caches.</p>
        </div>
    </div>
    <button class="btn-zenith" style="background: var(--error); color: white; padding: 12px 32px; font-size: 11px">Execute Purge</button>
</div>
@endsection
