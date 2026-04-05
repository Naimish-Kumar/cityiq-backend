@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-tag animate">✨ Now covering 120+ global cities</div>
        <h1 class="animate delay-1">Know Every Corner.<br><span class="text-primary">Before You Move In.</span></h1>
        <p class="animate delay-2">CityIQ is the world's most advanced urban intelligence platform. Analyze safety metrics, life-cost simulations, and neighborhood vibes with AI precision.</p>
        
        <div class="hero-actions animate delay-3">
             <a href="#" class="nav-btn" style="padding: 16px 40px; font-size: 18px;">Get the App</a>
             <a href="#features" class="glass-card" style="padding: 16px 40px; border-radius: 14px; margin-bottom: 0;">Explore Data</a>
        </div>

        <div class="mockup-container animate delay-3">
            <div class="app-mockup">
                <div class="mockup-header">
                    <div style="width: 60px; height: 4px; background: #334155; border-radius: 2px;"></div>
                </div>
                <div class="mockup-content">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <div>
                            <div style="font-size: 10px; color: var(--grey);">Current Location</div>
                            <div style="font-weight: 700; font-size: 16px;">Dubai Marina</div>
                        </div>
                        <div style="font-size: 20px;">🇦🇪</div>
                    </div>
                    <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid var(--primary); padding: 15px; border-radius: 15px; margin-bottom: 20px;">
                        <div style="font-size: 10px; color: var(--primary); text-transform: uppercase;">Liveability Score</div>
                        <div style="font-size: 24px; font-weight: 800; color: #fff;">94.2</div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div style="background: #1e293b; padding: 12px; border-radius: 12px;">
                            <div style="font-size: 8px; color: var(--grey);">Safety</div>
                            <div style="font-size: 14px; font-weight: 600;">9.8/10</div>
                        </div>
                        <div style="background: #1e293b; padding: 12px; border-radius: 12px;">
                            <div style="font-size: 8px; color: var(--grey);">Cost</div>
                            <div style="font-size: 14px; font-weight: 600;">Premium</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Stats -->
    <div style="background: var(--surface); padding: 60px 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);">
        <div class="section" style="padding: 0; display: flex; justify-content: space-around; flex-wrap: wrap; gap: 40px; text-align: center;">
            <div class="animate">
                <div style="font-size: 40px; font-weight: 800; color: var(--primary);">2.4M+</div>
                <div style="color: var(--grey); text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">Data Points</div>
            </div>
            <div class="animate delay-1">
                <div style="font-size: 40px; font-weight: 800; color: var(--primary);">140+</div>
                <div style="color: var(--grey); text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">City Profiles</div>
            </div>
            <div class="animate delay-2">
                <div style="font-size: 40px; font-weight: 800; color: var(--primary);">85k</div>
                <div style="color: var(--grey); text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">Happy Movers</div>
            </div>
        </div>
    </div>

    <!-- Core Features -->
    <div class="section" id="features">
        <div class="section-title animate">
            <h2>Why CityIQ?</h2>
            <p>Moving is a gamble. We give you the house odds.</p>
        </div>
        <div class="feature-grid">
            <div class="glass-card animate">
                <div class="icon-box" style="color: var(--primary);">📊</div>
                <h3>Cost Calculator</h3>
                <p>Simulate your monthly burn. From groceries in Tokyo to rent in Bangalore, see the real numbers before you sign the lease.</p>
            </div>
            <div class="glass-card animate delay-1">
                <div class="icon-box" style="color: var(--secondary);">🚗</div>
                <h3>Commute Engine</h3>
                <p>Plug in your office location and see the stress. We calculate peak traffic, public transport heatmaps, and hidden commute costs.</p>
            </div>
            <div class="glass-card animate delay-2">
                <div class="icon-box" style="color: var(--accent);">🛡️</div>
                <h3>StreetWise Safety</h3>
                <p>Neighborhood specific safety scores. Don't just know if the city is safe—know if your specific street is safe after midnight.</p>
            </div>
        </div>
    </div>

    <!-- Community Insights Showcase -->
    <div style="background: #010409; padding: 120px 0;">
        <div class="section">
            <div class="section-title animate">
                <h2>Real Voices, Real Data</h2>
                <p>Direct insights from verified locals who live there today.</p>
            </div>
            <div class="feature-grid">
                <div class="glass-card animate" style="padding: 24px; font-size: 14px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary);"></div>
                        <div style="font-weight: 600;">Esteban Lebsack</div>
                        <div class="text-primary" style="margin-left: auto;">Verified</div>
                    </div>
                    <p style="color: #cbd5e1;">"Best breakfast spots in town are definitely here. Indiranagar has the best breweries but traffic is a nightmare during weekends."</p>
                    <div style="margin-top: 15px; color: var(--grey);">#Bangalore #Vibes</div>
                </div>
                <!-- ... More insights ... -->
                <div class="glass-card animate delay-1" style="padding: 24px; font-size: 14px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--secondary);"></div>
                        <div style="font-weight: 600;">Sarah Chen</div>
                        <div class="text-primary" style="margin-left: auto;">Verified</div>
                    </div>
                    <p style="color: #cbd5e1;">"Dubai Marina is amazing for walks! The views at night are unmatched, but prepare for higher utilities in the summer."</p>
                    <div style="margin-top: 15px; color: var(--grey);">#Dubai #Luxury</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="section" id="pricing">
        <div class="section-title animate">
            <h2>Start Your Journey</h2>
            <p>Choose the plan that fits your relocation needs.</p>
        </div>
        <div class="pricing-grid">
            <div class="price-card animate">
                <h3>Explorer</h3>
                <div class="price">Free</div>
                <ul style="text-align: left; color: var(--grey); margin-bottom: 30px;">
                    <li>✓ Basic City Stats</li>
                    <li>✓ Top 10 Areas List</li>
                    <li>✓ Standard Safety Data</li>
                    <li>✗ AI Assistant</li>
                </ul>
                <a href="#" class="nav-btn" style="background: var(--surface); display: block;">Get Started</a>
            </div>
            <div class="price-card featured animate delay-1">
                <h3 class="text-primary">Premium</h3>
                <div class="price">₹199<span style="font-size: 14px; color: var(--grey);">/mo</span></div>
                <ul style="text-align: left; color: #fff; margin-bottom: 30px;">
                    <li>✓ Infinite AI Queries</li>
                    <li>✓ Custom Cost Simulator</li>
                    <li>✓ Commute Maps Pro</li>
                    <li>✓ Street-Level Safety</li>
                </ul>
                <a href="#" class="nav-btn" style="display: block;">Go Premium</a>
            </div>
            <div class="price-card animate delay-2">
                <h3>Team</h3>
                <div class="price">₹999<span style="font-size: 14px; color: var(--grey);">/mo</span></div>
                <ul style="text-align: left; color: var(--grey); margin-bottom: 30px;">
                    <li>✓ For Corporate Relocation</li>
                    <li>✓ Bulk User Management</li>
                    <li>✓ API Access Entry</li>
                    <li>✓ Priority Support</li>
                </ul>
                <a href="#" class="nav-btn" style="background: var(--surface); display: block;">Contact Sales</a>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <section class="section animate" style="text-align: center; margin-bottom: 100px;">
        <div class="glass-card" style="padding: 80px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1)); border: 1px solid var(--primary);">
            <h2 style="font-size: 40px; margin-bottom: 20px;">Ready to make your move?</h2>
            <p style="margin-bottom: 40px;">Join 85,000+ users making smarter decisions with CityIQ.</p>
            <div style="display: flex; gap: 20px; justify-content: center;">
                 <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Play Store" style="height: 50px;">
                 <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store" style="height: 50px;">
            </div>
        </div>
    </section>
@endsection
