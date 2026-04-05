@extends('layouts.main')

@section('title', 'FAQ | CityIQ')

@section('content')
    <section class="page-hero animate">
        <p class="eyebrow">FAQ</p>
        <h1>Answers to common CityIQ questions.</h1>
        <p>Short, practical explanations for how the platform works and what the data means.</p>
    </section>

    <section class="section faq-stack">
        <article class="glass-card animate">
            <h3>How is the score calculated?</h3>
            <p>CityIQ blends safety, cost, commute, and lifestyle signals into a unified liveability score for each area.</p>
        </article>
        <article class="glass-card animate delay-1">
            <h3>Is the data dynamic?</h3>
            <p>Yes. The dashboard and landing content now pull from the current application database instead of hardcoded placeholders.</p>
        </article>
        <article class="glass-card animate delay-2">
            <h3>Who is this for?</h3>
            <p>People relocating, real estate operators, internal analysts, and teams comparing neighborhood quality quickly.</p>
        </article>
    </section>
@endsection
