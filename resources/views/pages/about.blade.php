@extends('layouts.main')

@section('title', 'About Zenith Intelligence — CityIQ')

@section('content')
<section style="padding: 180px 10% 120px">
    <div style="max-width: 800px; margin: 0 auto">
        <div class="hero-tag">Core Mission</div>
        <h1 style="font-size: 52px; margin: 20px 0">Intelligence Beyond<br><span class="gradient-text">Information</span></h1>
        
        <div class="zenith-card" style="margin-top: 60px">
            <p style="color: var(--text-secondary); font-size: 18px; line-height: 1.8; margin-bottom: 30px">
                CityIQ was founded on a simple premise: raw data without context is noise. To truly understand a destination, one must simulate the lived experience.
            </p>
            <p style="color: var(--text-secondary); font-size: 16px; line-height: 1.8">
                With version 2.0, we've expanded our reach from domestic relocation to global travel intelligence. Our neural engines now process over 180 dimensions of country-level data to bring you sub-second insights into safety, cost, and culture.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; margin-top: 40px">
             <div class="zenith-card" style="text-align: center; padding: 24px">
                <div style="font-size: 24px; margin-bottom: 10px">🛡️</div>
                <h4 style="margin-bottom: 8px">99.9% Safety</h4>
                <p style="font-size: 12px; color: var(--text-secondary)">Data Accuracy</p>
             </div>
             <div class="zenith-card" style="text-align: center; padding: 24px">
                <div style="font-size: 24px; margin-bottom: 10px">🌍</div>
                <h4 style="margin-bottom: 8px">190+ Nations</h4>
                <p style="font-size: 12px; color: var(--text-secondary)">Fully Indexed</p>
             </div>
        </div>
    </div>
</section>
@endsection
