@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="text-muted small">Categories</div>
            <div class="fs-3 fw-bold">{{ $stats['categories'] }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="text-muted small">Menu Items</div>
            <div class="fs-3 fw-bold">{{ $stats['items'] }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="text-muted small">Reservations</div>
            <div class="fs-3 fw-bold">{{ $stats['reservations'] }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="text-muted small">Messages</div>
            <div class="fs-3 fw-bold">{{ $stats['messages'] }}</div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card stat-card p-3">
            <h6 class="fw-bold mb-3">Recent Reservations</h6>
            @forelse ($recentReservations as $r)
            <div class="d-flex justify-content-between border-bottom py-2 small">
                <span>{{ $r->name }} ({{ $r->guests }} guests)</span>
                <span class="text-muted">{{ \Illuminate\Support\Carbon::parse($r->reservation_date)->format('M j') }} at {{ \Illuminate\Support\Carbon::parse($r->reservation_time)->format('g:i A') }}</span>
            </div>
            @empty
            <p class="text-muted small mb-0">No reservations yet.</p>
            @endforelse
            <a href="{{ route('admin.reservations.index') }}" class="small mt-3 d-inline-block">View all &rarr;</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card stat-card p-3">
            <h6 class="fw-bold mb-3">Recent Messages</h6>
            @forelse ($recentMessages as $m)
            <div class="border-bottom py-2 small">
                <div class="d-flex justify-content-between">
                    <strong>{{ $m->name }}</strong>
                    <span class="text-muted">{{ $m->created_at->diffForHumans() }}</span>
                </div>
                <div class="text-muted text-truncate">{{ $m->message }}</div>
            </div>
            @empty
            <p class="text-muted small mb-0">No messages yet.</p>
            @endforelse
            <a href="{{ route('admin.messages.index') }}" class="small mt-3 d-inline-block">View all &rarr;</a>
        </div>
    </div>
</div>
@endsection