@extends('layouts.main')

@section('title', 'Global Network FAQ — CityIQ')

@section('content')
<section style="padding: 180px 10% 120px">
    <div style="max-width: 900px; margin: 0 auto">
        <h1 style="font-size: 44px; margin-bottom: 24px">Universal Solutions</h1>
        <p style="color: var(--text-secondary); margin-bottom: 60px">Answering the most critical queries about our global intelligence engine.</p>
        
        <div style="display: flex; flex-direction: column; gap: 24px">
            <div class="zenith-card">
                <h3 style="font-size: 18px; margin-bottom: 12px; font-weight: 800; color: var(--primary)">How accurate is the Safety Intelligence?</h3>
                <p style="color: var(--text-secondary); line-height: 1.7">Our safety scoring algorithm uses a composite of 14 geopolitical stability metrics, regional crime statistics, and real-world natural disaster risk levels updated every 15 minutes.</p>
            </div>

            <div class="zenith-card">
                <h3 style="font-size: 18px; margin-bottom: 12px; font-weight: 800; color: var(--accent)">Where does the Cost Simulation data originate?</h3>
                <p style="color: var(--text-secondary); line-height: 1.7">We integrate IATA, local government data, and private market reports to provide a 3-tier lifestyle breakdown (Backpacker, Mid-range, Luxury) for 190+ countries.</p>
            </div>

            <div class="zenith-card">
                <h3 style="font-size: 18px; margin-bottom: 12px; font-weight: 800">Is the AI Tour Guide connected to live systems?</h3>
                <p style="color: var(--text-secondary); line-height: 1.7">Yes. Our neural guide is directly synchronized with our proprietary city database and current global travel alerts for informed decision-making.</p>
            </div>
        </div>
    </div>
</section>
@endsection
