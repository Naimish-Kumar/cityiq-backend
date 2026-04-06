@extends('layouts.admin')

@section('title', 'Reviews | CityIQ Admin')

@section('content')
    <section class="admin-page">
        <header class="admin-header">
            <div>
                <p class="eyebrow">Moderation</p>
                <h1>Reality Feed Control</h1>
                <p class="page-copy">Approve, flag, verify, or remove community posts tied to area intelligence.</p>
            </div>
        </header>

        @if(session('success'))
            <div class="status-banner">{{ session('success') }}</div>
        @endif

        <section class="panel-card">
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Signals</th>
                            <th>Moderate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                            <tr>
                                <td>
                                    <strong>{{ $review->title ?: 'Untitled insight' }}</strong>
                                    <span>{{ optional($review->area)->name }} | {{ optional($review->user)->name }}</span>
                                    <span>{{ $review->content }}</span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $review->moderation_status === 'approved' ? 'positive' : ($review->moderation_status === 'pending' ? 'warning' : 'neutral') }}">{{ $review->moderation_status }}</span>
                                    <span>{{ $review->category }}</span>
                                </td>
                                <td>
                                    <strong>{{ $review->likes }} up / {{ $review->downvotes }} down</strong>
                                    <span>{{ $review->is_verified_local ? 'Verified local' : 'Unverified' }} | {{ $review->is_flagged ? 'Flagged' : 'Clean' }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" class="inline-form">
                                        @csrf
                                        <select name="moderation_status">
                                            @foreach(['approved', 'pending', 'rejected'] as $status)
                                                <option value="{{ $status }}" @selected($review->moderation_status === $status)>{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                        <label class="checkbox-row compact"><input type="checkbox" name="is_verified_local" value="1" @checked($review->is_verified_local)><span>Verified</span></label>
                                        <label class="checkbox-row compact"><input type="checkbox" name="is_flagged" value="1" @checked($review->is_flagged)><span>Flagged</span></label>
                                        <button type="submit" class="inline-link">Save</button>
                                    </form>
                                    <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-link danger-link">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="empty-table">No reviews found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrap">
                {{ $reviews->links() }}
            </div>
        </section>
    </section>
@endsection
