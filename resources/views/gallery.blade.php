@extends('layouts.app')

@section('title', 'Gallery')

@section('content')

<section class="hero text-center" style="padding: 90px 0 60px;">
    <div class="container">
        <h1 style="font-size:2.4rem;">Our Gallery</h1>
        <p class="lead">A peek inside our cafe — the space, the coffee, and the people who make it home.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Coffee brewing">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Cafe interior">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Cozy seating area">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Latte art">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Fresh croissant">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Fresh pastries">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Pastry on plate">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1607958996333-41aef7caefaa?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Chocolate chip muffin">
            </div>
            <div class="col-md-6 col-lg-4">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm w-100" style="height:280px;object-fit:cover;" alt="Coffee cup close up">
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('reservation') }}" class="btn btn-cafe">Reserve a Table</a>
        </div>
    </div>
</section>

@endsection