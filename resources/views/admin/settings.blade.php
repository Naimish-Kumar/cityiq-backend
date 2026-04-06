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

            <div style="margin-bottom: 32px">
                <label style="display: block; font-size: 10px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 10px">Service Account Manifest (.json)</label>
                <div style="padding: 24px; border: 2px dashed var(--border); border-radius: 12px; text-align: center; cursor: pointer" onmouseover="this.style.borderColor='var(--primary)'" onmouseout="this.style.borderColor='var(--border)'">
                    <i class="fa-solid fa-cloud-arrow-up" style="font-size: 24px; color: var(--primary); margin-bottom: 12px"></i>
                    <p style="font-size: 11px; color: var(--text-secondary)">Drag and drop neural manifest or click to sync</p>
                    <input type="file" name="firebase_json" style="opacity: 0; position: absolute; left: 0; top: 0; width: 100%; height: 100%; cursor: pointer">
                </div>
                @if(file_exists(storage_path('app/firebase/service-account.json')))
                <div style="margin-top: 12px; font-size: 10px; color: var(--success); display: flex; align-items: center; gap: 6px">
                    <i class="fa-solid fa-check-double"></i> Manifest Verified & Active
                </div>
                @endif
            </div>

            <button type="submit" class="btn-zenith" style="width: 100%; padding: 16px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; background: #F59E0B; border: none; color: white">Initialize Cloud Engine</button>
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
