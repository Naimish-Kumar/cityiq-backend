@extends('layouts.main')

@section('title', 'About | CityIQ')

@section('content')
    <section class="page-hero animate">
        <p class="eyebrow">About CityIQ</p>
        <h1>Urban intelligence built for confident moves.</h1>
        <p>CityIQ helps people understand how a place actually feels to live in, using both structured data and real community insight.</p>
    </section>

    <section class="section">
        <div class="content-grid">
            <article class="glass-card animate">
                <h2>Mission</h2>
                <p>Make relocation decisions faster, clearer, and far less risky by turning fragmented location data into practical guidance.</p>
            </article>
            <article class="glass-card animate delay-1">
                <h2>How it works</h2>
                <p>We combine area scores, cost signals, review sentiment, and operator tooling so both movers and platform admins can act on the same source of truth.</p>
            </article>
        </div>
    </section>
@endsection
