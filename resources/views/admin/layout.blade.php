<!doctype html>
<html
    lang="en"
    class="pos-theme-lake"
    data-bs-theme="light"
    data-pos-theme="lake"
    data-pos-theme-mode="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="noindex, nofollow" />
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.24.0/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pos-themes.css') }}?v={{ filemtime(public_path('assets/css/pos-themes.css')) }}" />
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pos-responsive.css') }}?v={{ filemtime(public_path('assets/css/pos-responsive.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin-shell.css') }}?v={{ filemtime(public_path('assets/css/admin-shell.css')) }}" />
    <style>
        body { font-family: "Public Sans", system-ui, sans-serif; }
        .icon-base { line-height: 1; }
    </style>
</head>
<body class="os-admin-app">
    @php
        $unreadQueries = \App\Models\ContactMessage::unread()->count();
    @endphp

    <div class="d-lg-flex min-vh-100">
        <aside class="os-admin-sidebar d-none d-lg-flex flex-column">
            @include('admin.partials.sidebar')
        </aside>

        <div class="os-admin-main flex-grow-1 d-flex flex-column">
            <header class="os-admin-topbar">
                <div class="d-flex align-items-center justify-content-between px-3 px-lg-4 py-3">
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-icon btn-label-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#osAdminSidebar" aria-label="Open menu">
                            <i class="ti ti-menu-2 fs-4"></i>
                        </button>
                        <div>
                            <div class="fw-semibold">@yield('page_heading', 'Dashboard')</div>
                            <small class="text-muted">@yield('page_subheading', 'Contact queries and site activity')</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-label-secondary" target="_blank">
                            <i class="ti ti-world me-1"></i> Website
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="ti ti-logout me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="os-admin-content flex-grow-1">
                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
                        <i class="ti ti-circle-check"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="osAdminSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            @include('admin.partials.sidebar')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/pos-confirm.js') }}?v={{ filemtime(public_path('assets/js/pos-confirm.js')) }}"></script>
    @stack('page-script')
</body>
</html>
