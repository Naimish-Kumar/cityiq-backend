@extends('layouts.admin')

@section('title', 'Areas | CityIQ Admin')

@section('content')
    <section class="admin-page">
        <header class="admin-header">
            <div>
                <p class="eyebrow">Master data</p>
                <h1>Area Operations</h1>
                <p class="page-copy">Create, update, and monitor neighborhood intelligence records from the admin panel.</p>
            </div>
        </header>

        @if(session('success'))
            <div class="status-banner">{{ session('success') }}</div>
        @endif

        <div class="admin-grid">
            <section class="panel-card">
                <div class="panel-head">
                    <div>
                        <p class="eyebrow">Create or refresh</p>
                        <h2>Area Form</h2>
                    </div>
                </div>

                <form action="{{ route('admin.areas.save') }}" method="POST" class="admin-form-grid">
                    @csrf
                    <input type="hidden" name="area_id" value="">
                    <label class="input-group"><span>Name</span><input type="text" name="name" required></label>
                    <label class="input-group"><span>City</span><input type="text" name="city" required></label>
                    <label class="input-group"><span>State</span><input type="text" name="state" required></label>
                    <label class="input-group"><span>Country</span><input type="text" name="country" value="IN" required></label>
                    <label class="input-group"><span>Liveability</span><input type="number" step="0.01" name="liveability_score" required></label>
                    <label class="input-group"><span>Safety</span><input type="number" step="0.01" name="safety_score" required></label>
                    <label class="input-group"><span>Cost</span><input type="number" step="0.01" name="cost_score" required></label>
                    <label class="input-group"><span>Commute</span><input type="number" step="0.01" name="commute_score" required></label>
                    <label class="input-group"><span>Lifestyle</span><input type="number" step="0.01" name="lifestyle_score" required></label>
                    <label class="input-group"><span>1 BHK Rent</span><input type="number" step="0.01" name="avg_rent_1_bhk"></label>
                    <label class="input-group"><span>2 BHK Rent</span><input type="number" step="0.01" name="avg_rent_2_bhk"></label>
                    <label class="input-group"><span>3 BHK Rent</span><input type="number" step="0.01" name="avg_rent_3_bhk"></label>
                    <label class="input-group"><span>Food Basic</span><input type="number" step="0.01" name="avg_food_basic"></label>
                    <label class="input-group"><span>Food Moderate</span><input type="number" step="0.01" name="avg_food_moderate"></label>
                    <label class="input-group"><span>Food Luxury</span><input type="number" step="0.01" name="avg_food_luxury"></label>
                    <label class="input-group"><span>Transport</span><input type="number" step="0.01" name="avg_transport"></label>
                    <label class="input-group"><span>Utilities</span><input type="number" step="0.01" name="avg_utilities"></label>
                    <label class="input-group admin-form-full"><span>Tags (comma separated)</span><input type="text" name="tags"></label>
                    <label class="input-group admin-form-full"><span>Description</span><textarea name="description" rows="4"></textarea></label>
                    <label class="checkbox-row admin-form-full">
                        <input type="checkbox" name="is_trending" value="1">
                        <span>Mark as trending</span>
                    </label>
                    <div class="admin-form-full">
                        <button type="submit" class="nav-btn">Save Area</button>
                    </div>
                </form>
            </section>

            <section class="panel-card">
                <div class="panel-head">
                    <div>
                        <p class="eyebrow">Coverage</p>
                        <h2>Area Registry</h2>
                    </div>
                </div>

                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Area</th>
                                <th>Scores</th>
                                <th>Signals</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($areas as $area)
                                <tr>
                                    <td>
                                        <strong>{{ $area->name }}</strong>
                                        <span>{{ $area->city }}, {{ $area->country }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ number_format((float) $area->liveability_score, 1) }}</strong>
                                        <span>S {{ number_format((float) $area->safety_score, 0) }} | C {{ number_format((float) $area->cost_score, 0) }} | M {{ number_format((float) $area->commute_score, 0) }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $area->reviews_count }} reviews</strong>
                                        <span>{{ $area->score_histories_count }} history points | {{ $area->cost_calculations_count }} cost runs</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.areas.delete', $area->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="inline-link danger-link">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="empty-table">No areas found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
@endsection
