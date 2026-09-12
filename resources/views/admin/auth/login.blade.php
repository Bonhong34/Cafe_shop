<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #2c2118;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-card {
            max-width: 380px;
            margin: auto;
            border: none;
            border-radius: 1rem;
        }

        .btn-cafe {
            background: #6f4e37;
            color: #fff;
        }

        .btn-cafe:hover {
            background: #5a3e2b;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="card login-card p-4 shadow">
        <div class="text-center mb-3">
            <h3 class="fw-bold">CAFÉ</h3>
            <p class="text-muted small mb-0">Admin Dashboard Login</p>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger py-2 small">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.attempt') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-cafe w-100">Log In</button>
        </form>
        <p class="text-center small text-muted mt-3 mb-0">
            <a href="{{ route('home') }}" class="text-muted">&larr; Back to site</a>
        </p>
    </div>
</body>

</html>