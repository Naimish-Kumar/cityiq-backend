@extends('layouts.main')

@section('content')
<!-- 🏔️ Hero Section -->
<section class="hero-section">
    <div class="hero-glow"></div>
    <div class="hero-tag animate-fade-up">Global Signal v2.0</div>
    <h1 class="hero-title animate-fade-up" style="animation-delay: 0.2s">
        Master Your<br>
        <span class="gradient-text">World Environment</span>
    </h1>
    <p style="max-width: 650px; color: var(--text-secondary); margin-bottom: 40px; font-size: 18px; font-weight: 500" class="animate-fade-up" style="animation-delay: 0.3s">
        The most sophisticated neural simulation platform for global citizens. Access safety, logistics, and intelligence for 190+ nations with sub-second precision.
    </p>
    <div class="hero-actions animate-fade-up" style="animation-delay: 0.4s; display: flex; gap: 15px">
        <a href="#features" class="btn-zenith btn-primary">Establish Connection</a>
        <a href="#stats" class="btn-zenith" style="background: rgba(255,255,255,0.05); border: 1px solid var(--border); color: white">View Global Index</a>
    </div>
</section>

<!-- 📊 Stats Section -->
<section id="stats" style="padding: 0 10% 120px">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px">
        <div class="zenith-card stat-widget">
            <div class="stat-label">Nations Indexed</div>
            <div class="stat-value gradient-text">190+</div>
            <div style="font-size: 11px; color: var(--success); font-weight: 800">99.9% Data Integrity</div>
        </div>
        <div class="zenith-card stat-widget">
            <div class="stat-label">Visa Protocols</div>
            <div class="stat-value" style="color: var(--accent)">32,481</div>
            <div style="font-size: 11px; color: var(--text-secondary); font-weight: 800">Real-time IATA Logic</div>
        </div>
        <div class="zenith-card stat-widget">
            <div class="stat-label">AI Latency</div>
            <div class="stat-value" style="color: var(--primary)">0.38s</div>
            <div style="font-size: 11px; color: var(--primary); font-weight: 800">DeepSeek v3 Neural Core</div>
        </div>
    </div>
</section>

<!-- ⚡ Features section -->
<section id="features" style="padding: 120px 10%; background: rgba(5, 10, 18, 0.4)">
    <div style="text-align: center; margin-bottom: 80px">
        <h2 style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 16px">The <span class="gradient-text">Zenith</span> Architecture</h2>
        <p style="color: var(--text-secondary); font-size: 16px">Engineered for the modern global nomad.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 32px">
        <div class="zenith-card">
            <div style="font-size: 32px; margin-bottom: 20px">🛰️</div>
            <h3 style="margin-bottom: 12px; font-size: 18px">Safety Intelligence</h3>
            <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.7">Proprietary scoring system weighing geopolitical stability, local crime metrics, and environmental hazards.</p>
        </div>

        <div class="zenith-card" style="border-color: rgba(251, 191, 36, 0.2)">
            <div style="font-size: 32px; margin-bottom: 20px">🚅</div>
            <h3 style="margin-bottom: 12px; font-size: 18px">Transport Reality</h3>
            <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.7">Simulated wait times and cost-gap analysis for metros, ride-shares, and local transit across global provinces.</p>
        </div>

        <div class="zenith-card" style="border-color: rgba(56, 189, 248, 0.2)">
            <div style="font-size: 32px; margin-bottom: 20px">🤖</div>
            <h3 style="margin-bottom: 12px; font-size: 18px">AI Tour Guide</h3>
            <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.7">Context-aware conversational planning that adapts to your itinerary, budget, and cultural preferences.</p>
        </div>
    </div>
</section>

<!-- 📱 App Promo -->
<section style="padding: 140px 10%">
    <div class="zenith-card shimmer" style="display: flex; flex-wrap: wrap; align-items: center; gap: 80px; padding: 60px; border-color: rgba(56, 189, 248, 0.15)">
        <div style="flex: 1; min-width: 320px">
            <div class="hero-tag">System Extension</div>
            <h2 style="font-size: 44px; margin: 24px 0; line-height: 1.1">Native Intelligence Everywhere</h2>
            <p style="color: var(--text-secondary); margin-bottom: 40px; font-size: 16px; line-height: 1.8">Our mobile framework brings pre-emptive safety alerts and live data-sync directly to your device. Stay informed even when the signal is weak.</p>
            <div style="display: flex; gap: 20px">
                 <div style="padding: 12px 24px; background: white; border-radius: 12px; color: #020617; font-weight: 800; font-size: 13px">GET ON IOS</div>
                 <div style="padding: 12px 24px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 12px; color: white; font-weight: 800; font-size: 13px">ANDROID APK</div>
            </div>
        </div>
        <div style="flex: 1; min-width: 320px; aspect-ratio: 16/10; background: linear-gradient(135deg, rgba(56, 189, 248, 0.1), transparent); border-radius: 32px; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center">
             <div style="text-align: center">
                <div style="font-size: 48px; margin-bottom: 12px">⚡</div>
                <div style="font-family: 'Outfit'; font-weight: 800; color: white">MOBILE ENGINE ACTIVE</div>
             </div>
        </div>
    </div>
</section>
@endsection
