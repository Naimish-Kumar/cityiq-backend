@extends('layouts.main')

@section('content')
    <section class="hero">
        <div class="hero-backdrop"></div>
        <div class="hero-copy animate">
            <p class="hero-tag">Live neighborhood intelligence for modern movers</p>
            <h1>Move with data, not guesswork.</h1>
            <p class="hero-text">CityIQ turns scattered city signals into one clear picture. Compare safety, cost, lifestyle, and local sentiment before you commit to a move.</p>

            <div class="hero-actions">
                <a href="#features" class="nav-btn">Explore Features</a>
                <a href="{{ route('admin.login') }}" class="secondary-btn">Open Dashboard</a>
            </div>

            <div class="hero-stats">
                <div class="metric-pill">
                    <strong>{{ number_format($stats['data_points']) }}+</strong>
                    <span>Data points modeled</span>
                </div>
                <div class="metric-pill">
                    <strong>{{ number_format($stats['city_profiles']) }}</strong>
                    <span>City profiles tracked</span>
                </div>
                <div class="metric-pill">
                    <strong>{{ number_format($stats['verified_reviews']) }}</strong>
                    <span>Verified local reviews</span>
                </div>
            </div>
        </div>

        <div class="hero-panel animate delay-1">
            <div class="hero-card hero-scorecard">
                <div class="score-topline">
                    <div>
                        <span>Featured district</span>
                        <strong>{{ optional($featuredAreas->first())->name ?? 'No area yet' }}</strong>
                    </div>
                    <div class="score-badge">Live</div>
                </div>

                @if($featuredAreas->first())
                    <div class="big-score">{{ number_format((float) $featuredAreas->first()->liveability_score, 1) }}</div>
                    <div class="score-bars">
                        <div>
                            <label>Safety</label>
                            <progress max="100" value="{{ (float) $featuredAreas->first()->safety_score }}"></progress>
                        </div>
                        <div>
                            <label>Cost Efficiency</label>
                            <progress max="100" value="{{ (float) $featuredAreas->first()->cost_score }}"></progress>
                        </div>
                        <div>
                            <label>Lifestyle</label>
                            <progress max="100" value="{{ (float) $featuredAreas->first()->lifestyle_score }}"></progress>
                        </div>
                    </div>
                @else
                    <p class="empty-state">Area data will appear here once records are available.</p>
                @endif
            </div>

            <div class="hero-card hero-feed">
                <p class="eyebrow">Why teams use CityIQ</p>
                <div class="feed-item">
                    <strong>Richer relocation decisions</strong>
                    <span>Compare neighborhoods with a single glance.</span>
                </div>
                <div class="feed-item">
                    <strong>Local signal, not just maps</strong>
                    <span>Blend hard metrics with human reviews.</span>
                </div>
                <div class="feed-item">
                    <strong>Operator-ready dashboard</strong>
                    <span>Track users, areas, credentials, and activity.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section animate" id="features">
        <div class="section-title">
            <p class="eyebrow">Feature stack</p>
            <h2>Everything needed to evaluate a move</h2>
            <p>Designed for renters, families, operators, and anyone comparing neighborhoods seriously.</p>
        </div>

        <div class="feature-grid">
            <article class="glass-card feature-card">
                <span class="feature-kicker">01</span>
                <h3>Liveability scoring</h3>
                <p>Surface the areas that balance safety, commute, affordability, and overall quality of life.</p>
            </article>
            <article class="glass-card feature-card">
                <span class="feature-kicker">02</span>
                <h3>Cost visibility</h3>
                <p>Estimate realistic monthly living costs using structured rent and household expense data.</p>
            </article>
            <article class="glass-card feature-card">
                <span class="feature-kicker">03</span>
                <h3>Community sentiment</h3>
                <p>Read verified local reviews and pair them with city-level metrics before making a decision.</p>
            </article>
        </div>
    </section>

    <section class="section animate">
        <div class="section-title">
            <p class="eyebrow">Featured areas</p>
            <h2>Best performing neighborhoods right now</h2>
            <p>Drawn directly from the current `areas` dataset.</p>
        </div>

        <div class="area-grid">
            @forelse($featuredAreas as $area)
                <article class="glass-card area-card">
                    <div class="area-card-top">
                        <div>
                            <h3>{{ $area->name }}</h3>
                            <p>{{ $area->city }}, {{ $area->state }}</p>
                        </div>
                        @if($area->is_trending)
                            <span class="status-badge positive">Trending</span>
                        @endif
                    </div>
                    <div class="area-score">{{ number_format((float) $area->liveability_score, 1) }}</div>
                    <p>{{ $area->description }}</p>
                    <div class="tag-row">
                        @foreach(($area->tags ?? []) as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                </article>
            @empty
                <p class="empty-state">No featured areas available yet.</p>
            @endforelse
        </div>
    </section>

    <section class="section animate">
        <div class="section-title">
            <p class="eyebrow">Testimonials</p>
            <h2>What locals are saying</h2>
            <p>Fresh from the current review dataset.</p>
        </div>

        <div class="feature-grid">
            @forelse($testimonials as $review)
                <article class="glass-card quote-card">
                    <div class="quote-head">
                        <div>
                            <strong>{{ optional($review->user)->name ?? 'Anonymous' }}</strong>
                            <span>{{ optional($review->area)->name ?? 'Area' }}</span>
                        </div>
                        <span class="status-badge {{ $review->is_verified_local ? 'positive' : 'neutral' }}">
                            {{ $review->is_verified_local ? 'Verified local' : 'Community voice' }}
                        </span>
                    </div>
                    <p>"{{ $review->content }}"</p>
                </article>
            @empty
                <p class="empty-state">No testimonials available yet.</p>
            @endforelse
        </div>
    </section>

    <section class="section animate">
        <div class="cta-banner">
            <div>
                <p class="eyebrow">Ready to operate smarter?</p>
                <h2>Give your website and dashboard a sharper CityIQ presence.</h2>
            </div>
            <a href="{{ route('admin.login') }}" class="nav-btn">Launch Admin</a>
        </div>
    </section>
@endsection
