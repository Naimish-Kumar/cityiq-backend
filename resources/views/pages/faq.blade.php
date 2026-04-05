@extends('layouts.main')

@section('content')
    <div class="page-header animate">
        <h1 style="font-size: 64px;">FAQ</h1>
        <p style="font-size: 18px; color: var(--grey);">Common questions about CityIQ.</p>
    </div>

    <div class="section animate">
        <div class="glass-card">
            <h3 style="color: var(--accent);">How is the IQ score calculated?</h3>
            <p style="margin-top: 10px; color: var(--grey);">Our proprietary algorithm analyzes safety, cost of living, commute times, and lifestyle amenities using real-time data from 50+ sources.</p>
        </div>

        <div class="glass-card">
            <h3 style="color: var(--accent);">Is the data updated regularly?</h3>
            <p style="margin-top: 10px; color: var(--grey);">Yes, most data points (like rent and fuel costs) are updated weekly, while safety reports are integrated daily.</p>
        </div>

        <div class="glass-card">
            <h3 style="color: var(--accent);">Can I suggest a new area?</h3>
            <p style="margin-top: 10px; color: var(--grey);">Absolutely! Use the 'Suggest Area' feature in the mobile app, and our team will verify and add it within 48 hours.</p>
        </div>
    </div>
@endsection
