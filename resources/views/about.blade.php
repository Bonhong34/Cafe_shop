@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<section class="hero text-center" style="padding: 90px 0 60px;">
    <div class="container">
        <h1 style="font-size: 60px;">Our Story</h1>
        <p class="lead">From a small roastery to your favorite neighborhood cafe.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-4 shadow" alt="Cafe interior">
            </div>
            <div class="col-md-6">
                <p class="script-tag mb-2">Who We Are</p>
                <h2 class="section-title mb-3">Brewing happiness since day one</h2>
                <p class="text-muted">
                    Café Aroma started as a tiny corner shop with a single espresso
                    machine and a big dream: to serve genuinely great coffee in a
                    warm, welcoming space. Today, we source ethically grown beans,
                    bake our pastries fresh every morning, and treat every guest
                    like a regular.
                </p>
                <p class="text-muted">
                    Whether you're grabbing a quick espresso on your way to work or
                    settling in for a long afternoon with a book, we want this to
                    feel like your home away from home.
                </p>
                <a href="{{ route('menu') }}" class="btn btn-cafe mt-2">Explore Our Menu</a>
            </div>
        </div>
    </div>
</section>

@endsection