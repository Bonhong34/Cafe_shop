<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cafe') | Café</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('styles')
    <!-- <link href="{{ asset('css/shop.css') }}" rel="stylesheet"> -->
</head>

<body>

    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center py-2 small">
            <span>Good Coffee, Good Mood</span>
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-clock"></i> Mon–Sun: 7:00 AM – 9:00 PM</span>
                <span class="social-icons">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-pinterest"></i></a>
                </span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg cafe-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                CAFÉ<span class="brand-sub">coffee &amp; more</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}" href="{{ route('menu') }}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <a class="btn btn-cafe" href="{{ route('reservation') }}">Order Online</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="cafe-footer pt-5 pb-4">
        <div class="container">
            <div class="row align-items-center gy-4 pb-4 border-bottom border-secondary-subtle">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-1">Stay in the Loop</h6>
                    <p class="small text-muted mb-0">Subscribe to get updates on new menu items, special offers, and events.</p>
                </div>
                <div class="col-md-4">
                    <form class="d-flex" onsubmit="return false;">
                        <input type="email" class="form-control me-2" placeholder="Your email address">
                        <button class="btn btn-cafe text-nowrap">Subscribe</button>
                    </form>
                </div>
                <div class="col-md-2 text-md-end">
                    <h6 class="fw-bold mb-2">Follow Us</h6>
                    <span class="social-icons dark">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-pinterest"></i></a>
                    </span>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3 small text-muted">
                <span>&copy; {{ date('Y') }} Café. All Rights Reserved.</span>
                <span><a href="#" class="footer-link">Privacy Policy</a> &nbsp; <a href="#" class="footer-link">Terms &amp; Conditions</a></span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>