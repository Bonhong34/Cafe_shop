@extends('layouts.app')

@section('title', 'Reserve a Table')

@section('content')

<section class="hero text-center" style="padding: 90px 0 60px;">
    <div class="container">
        <h1 style="font-size:2.4rem;">Reserve a Table</h1>
        <p class="lead">Book ahead so we can have your favorite spot ready.</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 640px;">

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('reservation.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email (optional)</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="reservation_date" class="form-control" value="{{ old('reservation_date') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Time</label>
                    <input type="time" name="reservation_time" class="form-control" value="{{ old('reservation_time') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Guests</label>
                    <input type="number" name="guests" min="1" max="20" class="form-control" value="{{ old('guests', 2) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Notes (optional)</label>
                <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="btn btn-cafe">Book Table</button>
        </form>
    </div>
</section>

@endsection