@extends('layouts.admin')

@section('title', 'Settings | CityIQ Admin')

@section('content')
    <section class="admin-page">
        <header class="admin-header">
            <div>
                <p class="eyebrow">Platform</p>
                <h1>System Settings</h1>
                <p class="page-copy">Runtime configuration snapshot pulled from the current Laravel environment.</p>
            </div>
        </header>

        <div class="settings-grid">
            @foreach($settings as $setting)
                <section class="panel-card">
                    <p class="eyebrow">{{ $setting['label'] }}</p>
                    <h2>{{ $setting['value'] }}</h2>
                    <p class="panel-copy">{{ $setting['hint'] }}</p>
                </section>
            @endforeach
        </div>
    </section>
@endsection
