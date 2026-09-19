<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Café Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f5f2ee;
        }

        .admin-sidebar {
            min-height: 100vh;
            background: #2c2118;
            color: #eee;
        }

        .admin-sidebar a {
            color: #d8cfc4;
            text-decoration: none;
            display: block;
            padding: .6rem 1rem;
            border-radius: .4rem;
        }

        .admin-sidebar a:hover,
        .admin-sidebar a.active {
            background: #6f4e37;
            color: #fff;
        }

        .admin-brand {
            font-family: Georgia, serif;
            letter-spacing: 1px;
        }

        .stat-card {
            border: none;
            border-radius: .8rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="admin-sidebar p-3" style="width: 240px;">
            <div class="admin-brand fs-4 fw-bold mb-4 px-1">CAFÉ <small class="fs-6 fw-normal">admin</small></div>
            <nav class="nav flex-column gap-1">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><i class="bi bi-tags me-2"></i>Categories</a>
                <a href="{{ route('admin.menu.index') }}" class="{{ request()->routeIs('admin.menu.*') ? 'active' : '' }}"><i class="bi bi-cup-hot me-2"></i>Menu Items</a>
                <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"><i class="bi bi-receipt me-2"></i>Orders</a>
                <a href="{{ route('admin.reservations.index') }}" class="{{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}"><i class="bi bi-calendar-check me-2"></i>Reservations</a>
                <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"><i class="bi bi-envelope me-2"></i>Messages</a>
                <hr class="text-secondary">
                <a href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right me-2"></i>View Site</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav p-0 w-100 text-start"><i class="bi bi-box-arrow-left me-2"></i>Logout</button>
                </form>
            </nav>
        </div>

        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">@yield('title', 'Dashboard')</h3>
            </div>

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

            @yield('content')
        </div>
    </div>
</body>

</html>