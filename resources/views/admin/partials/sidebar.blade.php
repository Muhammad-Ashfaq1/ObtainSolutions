@php
    $unreadQueries = $unreadQueries ?? \App\Models\ContactMessage::unread()->count();
@endphp

<a href="{{ route('admin.dashboard') }}" class="os-admin-brand">
    <img src="{{ asset('assets/img/logo.png') }}" alt="ObtainSolutions logo">
    <span>
        <span class="os-admin-brand-name d-block">ObtainSolutions</span>
        <span class="os-admin-brand-sub">Admin panel</span>
    </span>
</a>

<nav class="os-admin-nav">
    <div class="os-admin-nav-label">Overview</div>
    <a href="{{ route('admin.dashboard') }}" class="os-admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="ti ti-smart-home" aria-hidden="true"></i>
        Dashboard
    </a>
    <a href="{{ route('admin.messages') }}" class="os-admin-nav-link {{ request()->routeIs('admin.messages*') || request()->routeIs('admin.message.*') ? 'active' : '' }}">
        <i class="ti ti-mail" aria-hidden="true"></i>
        <span class="flex-grow-1">Queries</span>
        @if ($unreadQueries > 0)
            <span class="badge rounded-pill bg-danger">{{ $unreadQueries }}</span>
        @endif
    </a>
</nav>
