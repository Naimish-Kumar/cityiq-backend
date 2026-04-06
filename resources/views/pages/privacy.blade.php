@extends('layouts.main')

@section('title', 'System Privacy Protocol — CityIQ')

@section('content')
<section style="padding: 180px 10% 120px">
    <div class="zenith-card" style="max-width: 900px; margin: 0 auto">
        <h1 style="font-size: clamp(2rem, 5vw, 3rem); margin-bottom: 24px">Protocol: Privacy & Data</h1>
        <p style="color: var(--text-secondary); margin-bottom: 30px">Established: April 2026. Current Version: 2.0.1</p>
        
        <div style="font-size: 15px; color: var(--text-secondary); line-height: 1.8">
            <h3 style="color: white; margin: 40px 0 20px">1. Universal Data Capture</h3>
            <p>Our global system prioritizes the security of your itinerary and personal identity. We only collect location-specific signals required for accurate safety alerts and cost simulations. We do not sell user data.</p>

            <h3 style="color: white; margin: 40px 0 20px">2. Intelligence Encryption</h3>
            <p>All data exchanged between the user and our neural cores is protected with 256-bit AES encryption at rest and TLS 1.3 in transit.</p>
            
            <h3 style="color: white; margin: 40px 0 20px">3. User Sovereignty</h3>
            <p>You maintain full control over your intelligence profile and can request total data anonymization at any node.</p>
        </div>
    </div>
</section>
@endsection
