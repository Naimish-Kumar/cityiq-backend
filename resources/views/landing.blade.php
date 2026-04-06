@extends('layouts.main')

@section('content')
<!-- 🌏 Hero Section -->
<section class="hero-section" style="background-image: linear-gradient(rgba(5, 10, 18, 0.7), rgba(5, 10, 18, 0.7)), url('{{ asset('storage/zenith_hero_bg_1775492808879.png') }}'); background-size: cover; background-position: center;">
    <div class="hero-tag animate-fade-up">Global Intel v2.0</div>
    <h1 class="hero-title animate-fade-up" style="animation-delay: 0.2s">
        Decipher Life<br>
        <span class="gradient-text">Across the Planet</span>
    </h1>
    <p style="max-width: 600px; color: var(--text-secondary); margin-bottom: 40px; font-size: 18px" class="animate-fade-up" style="animation-delay: 0.3s">
        The world's most intelligent platform for simulating lived experiences. Understand safety, costs, and culture before you arrive.
    </p>
    <div class="hero-actions animate-fade-up" style="animation-delay: 0.4s; display: flex; gap: 15px">
        <a href="#features" class="btn-zenith btn-primary">Discover Intelligence</a>
        <a href="#stats" class="btn-zenith" style="background: rgba(255,255,255,0.05); border: 1px solid var(--border)">View Network</a>
    </div>
</section>

<!-- 📊 Stats Section -->
<section id="stats" style="padding: 100px 10%; background: var(--bg-surface)">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px">
        <div class="zenith-card" style="text-align: center">
            <h2 class="gradient-text" style="font-size: 40px">190+</h2>
            <p style="color: var(--text-secondary)">Countries Indexed</p>
        </div>
        <div class="zenith-card" style="text-align: center">
            <h2 class="gradient-text" style="font-size: 40px">30K+</h2>
            <p style="color: var(--text-secondary)">Visa Pathways</p>
        </div>
        <div class="zenith-card" style="text-align: center">
            <h2 class="gradient-text" style="font-size: 40px">0.4s</h2>
            <p style="color: var(--text-secondary)">AI Query Speed</p>
        </div>
    </div>
</section>

<!-- ⚡ Features section -->
<section id="features" style="padding: 120px 10%">
    <div style="text-align: center; margin-bottom: 80px">
        <h2 style="font-size: 48px; margin-bottom: 16px">The 9 Pillars of <span class="gradient-text">Zenith</span></h2>
        <p style="color: var(--text-secondary)">Comprehensive data architecture for global citizens.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px">
        <div class="zenith-card">
            <div style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px">
                🛰️
            </div>
            <h3 style="margin-bottom: 12px">Safety Intelligence</h3>
            <p style="color: var(--text-secondary); font-size: 14px">Real-time composite scores tracking crime, stability, and natural disaster risk with 98.9% historical accuracy.</p>
        </div>

        <div class="zenith-card">
            <div style="width: 48px; height: 48px; background: rgba(16, 185, 129, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px">
                💎
            </div>
            <h3 style="margin-bottom: 12px">Real Cost Simulator</h3>
            <p style="color: var(--text-secondary); font-size: 14px">Dynamic daily budgeting for Backpackers, Mid-range travelers, and Digital Nomads across every global province.</p>
        </div>

        <div class="zenith-card">
            <div style="width: 48px; height: 48px; background: rgba(245, 158, 11, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px">
                🛂
            </div>
            <h3 style="margin-bottom: 12px">Visa Navigator</h3>
            <p style="color: var(--text-secondary); font-size: 14px">Instant eligibility checks for over 30,000 passport-destination combinations with rejection risk analysis.</p>
        </div>
    </div>
</section>

<!-- 📱 App Promo -->
<section style="padding: 100px 10%; background: linear-gradient(to bottom, var(--bg-deep), var(--bg-surface))">
    <div class="zenith-card" style="display: flex; flex-wrap: wrap; align-items: center; gap: 50px; background: radial-gradient(circle at top right, rgba(59, 130, 246, 0.1), transparent)">
        <div style="flex: 1; min-width: 300px">
            <div class="hero-tag">Mobile Experience</div>
            <h2 style="font-size: 40px; margin: 20px 0">Zenith in Your Pocket</h2>
            <p style="color: var(--text-secondary); margin-bottom: 30px">Download the CityIQ mobile application to access live AI Tour Guide features and real-time safety alerts while you travel.</p>
            <div style="display: flex; gap: 15px">
                 <div style="padding: 10px 20px; background: black; border-radius: 10px; border: 1px solid #333; color: white">App Store</div>
                 <div style="padding: 10px 20px; background: black; border-radius: 10px; border: 1px solid #333; color: white">Play Store</div>
            </div>
        </div>
        <div style="flex: 1; min-width: 300px; height: 480px; position: relative">
             <img src="{{ asset('storage/zenith_app_mockup_1775492982692.png') }}" style="width: 100%; height: 100%; object-fit: contain; filter: drop-shadow(0 20px 50px rgba(0,0,0,0.5))">
        </div>
    </div>
</section>
@endsection
