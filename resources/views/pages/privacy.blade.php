@extends('layouts.main')

@section('content')
    <div class="page-header animate">
        <h1 style="font-size: 64px;">Privacy Policy</h1>
        <p style="font-size: 18px; color: var(--grey);">Updated: {{ date('F Y') }}</p>
    </div>

    <div class="section glass-card animate">
        <h2>Your Data, Your Control</h2>
        <p style="margin-top: 20px;">We believe in transparency when it comes to your personal data. Here's a quick summary of what we collect and how we use it to enhance your urban living experience.</p>
        
        <h3 style="margin-top: 30px;">Information We Collect</h3>
        <ul style="list-style: square; padding-left: 20px; color: var(--grey); margin-top: 10px;">
            <li>Basic account information when you register</li>
            <li>Usage statistics of the application features</li>
            <li>Location preferences for area comparison</li>
            <li>Feedback and query data shared with AI assistant</li>
        </ul>

        <h3 style="margin-top: 30px;">How We Use It</h3>
        <p style="margin-top: 10px;">To tailor your results, improve accuracy of our 'City IQ' scores, and provide personalized insights. We DO NOT sell your personal data to third parties.</p>
    </div>
@endsection
