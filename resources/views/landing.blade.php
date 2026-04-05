@extends('layouts.main')

@section('content')
    <section class="hero animate">
        <h1>Know a City Before <br>You Live In It.</h1>
        <p>Analyze safety, cost, lifestyle, and more with our AI-driven urban intelligence platform. Make informed decisions about your next move.</p>
        <div class="row align-center gap-4">
             <a href="#" class="btn-primary" style="font-size: 18px; padding: 15px 40px;">Download App</a>
             <a href="{{ route('about') }}" style="margin-left: 20px; font-weight: 500; border-bottom: 1px solid var(--accent);">Learn More</a>
        </div>
    </section>

    <div class="section animate" id="features">
        <h2 style="font-size: 48px; text-align: center; margin-bottom: 60px;">Explore Smart Features</h2>
        <div class="stats-grid">
            <div class="stat-card glass-card">
                <i class="icon" style="font-size: 32px; color: var(--accent);">📊</i>
                <h2 style="margin-top: 15px; font-size: 24px; margin-bottom: 10px;">Cost Calculator</h2>
                <p style="color: var(--grey);">Predict your monthly expenses including rent, food, and transport based on local data.</p>
            </div>
            <div class="stat-card glass-card">
                <i class="icon" style="font-size: 32px; color: #4ade80;">🚗</i>
                <h2 style="margin-top: 15px; font-size: 24px; margin-bottom: 10px;">Commute Simulator</h2>
                <p style="color: var(--grey);">Simulate daily commutes between home and work areas to find the most efficient path.</p>
            </div>
            <div class="stat-card glass-card">
                <i class="icon" style="font-size: 32px; color: #f43f5e;">🛡️</i>
                <h2 style="margin-top: 15px; font-size: 24px; margin-bottom: 10px;">Safety Scores</h2>
                <p style="color: var(--grey);">In-depth safety analysis of neighborhoods using historical and crowd-sourced reports.</p>
            </div>
            <div class="stat-card glass-card">
                <i class="icon" style="font-size: 32px; color: #3b82f6;">🤖</i>
                <h2 style="margin-top: 15px; font-size: 24px; margin-bottom: 10px;">AI Assistant</h2>
                <p style="color: var(--grey);">Get personalized recommendations for places to live based on your lifestyle preferences.</p>
            </div>
        </div>
    </div>
@endsection
