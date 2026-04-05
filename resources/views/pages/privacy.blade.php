@extends('layouts.main')

@section('title', 'Privacy | CityIQ')

@section('content')
    <section class="page-hero animate">
        <p class="eyebrow">Privacy</p>
        <h1>Your data stays under clear rules.</h1>
        <p>Updated {{ date('F Y') }}.</p>
    </section>

    <section class="section">
        <article class="glass-card animate prose-card">
            <h2>What we collect</h2>
            <p>Basic account data, usage activity, location preferences, and feedback used to improve recommendations and platform performance.</p>
            <h2>How we use it</h2>
            <p>To personalize results, improve scoring quality, and support website and dashboard operations. We do not sell user data.</p>
        </article>
    </section>
@endsection
