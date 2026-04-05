@extends('layouts.admin')

@section('title', 'Credentials | CityIQ Admin')

@section('content')
    <section class="admin-page">
        <header class="admin-header">
            <div>
                <p class="eyebrow">Security</p>
                <h1>Credential Management</h1>
                <p class="page-copy">Masked configuration values and integration readiness from the current environment.</p>
            </div>
        </header>

        <div class="settings-grid">
            @foreach($credentials as $credential)
                <section class="panel-card">
                    <div class="panel-head">
                        <div>
                            <p class="eyebrow">{{ $credential['label'] }}</p>
                            <h2>{{ $credential['status'] }}</h2>
                        </div>
                        <span class="status-badge {{ $credential['status'] === 'Missing' ? 'warning' : 'positive' }}">{{ $credential['status'] }}</span>
                    </div>
                    <code class="credential-value">{{ $credential['value'] }}</code>
                    <p class="panel-copy">{{ $credential['description'] }}</p>
                </section>
            @endforeach
        </div>
    </section>
@endsection
