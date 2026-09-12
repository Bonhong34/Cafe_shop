@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- HERO --}}
<section class="hero-collage">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-3 col-md-6">
                <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=500&q=80" class="hero-img mb-3" alt="Latte art coffee">
                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=500&q=80" class="hero-img" alt="Fresh croissant">
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                <p class="script-tag mb-2">Welcome to Our Cafe</p>
                <h1>Good Coffee,<br>Great Moments</h1>
                <p class="text-muted my-4">Savor handcrafted coffee, fresh pastries, and cozy vibes.<br>Your perfect daily escape.</p>
                <a href="{{ route('menu') }}" class="btn btn-cafe btn-lg">View Our Menu</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <img src="https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=500&q=80" class="hero-img mb-3" alt="Pastry on plate">
                <img src="https://images.unsplash.com/photo-1607958996333-41aef7caefaa?auto=format&fit=crop&w=500&q=80" class="hero-img" alt="Chocolate chip muffin">
            </div>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="py-5">
    <div class="container text-center">
        <div class="leaf-divider mb-2">🍃</div>
        <h2 class="section-title mb-2">Why Choose Us?</h2>
        <p class="section-subtitle mb-5">We're passionate about quality, comfort, and creating memorable moments for every guest.</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-feature">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=600&q=80" alt="Quality coffee">
                    <div class="card-body">
                        <h5>Premium Beans</h5>
                        <p class="text-muted small mb-0">Ethically sourced, freshly roasted coffee beans in every cup.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-feature">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=600&q=80" alt="Cozy seating">
                    <div class="card-body">
                        <h5>Cozy Atmosphere</h5>
                        <p class="text-muted small mb-0">A warm, inviting space to relax, work, or catch up with friends.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-feature">
                    <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?auto=format&fit=crop&w=600&q=80" alt="Fresh pastries">
                    <div class="card-body">
                        <h5>Baked Fresh Daily</h5>
                        <p class="text-muted small mb-0">Our pastries and breads are made in-house every morning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURED MENU --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <p class="script-tag mb-2">Fan Favorites</p>
            <h2 class="section-title">Featured Menu Items</h2>
        </div>

        <div class="row g-4">
            @forelse ($featuredItems as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card card-menu-item">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title mb-1">{{ $item->name }}</h5>
                            <span class="price-tag">${{ number_format($item->price, 2) }}</span>
                        </div>
                        <p class="text-muted small text-uppercase mb-1">{{ $item->category->name ?? '' }}</p>
                        <p class="card-text text-muted small flex-grow-1">{{ $item->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">
                No featured items yet. Run <code>php artisan db:seed</code> to load sample menu data.
            </p>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('menu') }}" class="btn btn-cafe">View Full Menu</a>
        </div>
    </div>
</section>

{{-- CALL TO ACTION --}}
<section class="py-5 text-center cta-section">
    <div class="container">
        <h2 class="mb-3">Ready for your next cup?</h2>
        <p class="mb-4">Reserve a table and let us take care of the rest.</p>
        <a href="{{ route('reservation') }}" class="btn btn-light btn-lg">Reserve a Table</a>
    </div>
</section>

@endsection