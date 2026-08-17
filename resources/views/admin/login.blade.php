<!doctype html>
<html lang="en" class="pos-theme-lake" data-bs-theme="light" data-pos-theme="lake">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin login — {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.24.0/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pos-themes.css') }}?v={{ filemtime(public_path('assets/css/pos-themes.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pos-glass.css') }}?v={{ filemtime(public_path('assets/css/pos-glass.css')) }}" />
    <style>
        body { font-family: "Public Sans", system-ui, sans-serif; background: #f5f5f9; min-height: 100vh; }
    </style>
</head>
<body class="d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="ObtainSolutions" width="48" height="48" style="border-radius: 0.8rem;">
                    <h1 class="h5 fw-bold mt-3 mb-1">{{ config('app.name') }}</h1>
                    <p class="text-muted mb-0">Sign in to the admin panel</p>
                </div>

                <div class="pos-glass-card pos-tone-primary p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('admin.authenticate') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>

                <p class="text-center mt-4 mb-0">
                    <a href="{{ route('home') }}" class="text-decoration-none"><i class="ti ti-arrow-left"></i> Back to website</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
