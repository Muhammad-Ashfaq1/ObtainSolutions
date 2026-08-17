@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_heading', 'Dashboard')
@section('page_subheading', 'Welcome back, '.auth()->user()->name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pos-glass.css') }}?v={{ filemtime(public_path('assets/css/pos-glass.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin-dashboard.css') }}?v={{ filemtime(public_path('assets/css/admin-dashboard.css')) }}" />
@endpush

@section('content')
<div class="row g-4 pos-ad">
    <div class="col-12">
        <div class="pos-glass-card pos-tone-primary">
            <div class="pos-glass-intro">
                <div class="pos-glass-intro-copy">
                    <h4 class="pos-glass-intro-title">Contact queries at a glance</h4>
                    <p class="pos-glass-intro-subtitle">
                        Review inbound project inquiries from the website contact form, mark replies, and keep follow-ups moving.
                    </p>
                </div>
                <div class="pos-glass-intro-actions d-flex flex-wrap gap-2 align-items-center">
                    <a href="{{ route('admin.messages') }}" class="btn btn-sm btn-primary">View queries</a>
                    <span class="pos-glass-pill pos-tone-warning">
                        <i class="icon-base ti ti-mail" aria-hidden="true"></i>
                        {{ $stats['unread'] }} unread
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="pos-glass-card pos-tone-primary h-100">
            <div class="pos-stat-body">
                <div class="pos-stat-head">
                    <span class="pos-stat-icon"><i class="icon-base ti ti-inbox" aria-hidden="true"></i></span>
                    <h6 class="pos-stat-label">Total queries</h6>
                </div>
                <p class="pos-stat-value">{{ $stats['total'] }}</p>
                <p class="pos-stat-desc mb-0">All contact form submissions</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="pos-glass-card pos-tone-warning h-100">
            <div class="pos-stat-body">
                <div class="pos-stat-head">
                    <span class="pos-stat-icon"><i class="icon-base ti ti-mail" aria-hidden="true"></i></span>
                    <h6 class="pos-stat-label">Unread</h6>
                </div>
                <p class="pos-stat-value">{{ $stats['unread'] }}</p>
                <p class="pos-stat-desc mb-0">Needs a first look</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="pos-glass-card pos-tone-info h-100">
            <div class="pos-stat-body">
                <div class="pos-stat-head">
                    <span class="pos-stat-icon"><i class="icon-base ti ti-eye" aria-hidden="true"></i></span>
                    <h6 class="pos-stat-label">Read</h6>
                </div>
                <p class="pos-stat-value">{{ $stats['read'] }}</p>
                <p class="pos-stat-desc mb-0">Opened, not yet replied</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="pos-glass-card pos-tone-success h-100">
            <div class="pos-stat-body">
                <div class="pos-stat-head">
                    <span class="pos-stat-icon"><i class="icon-base ti ti-circle-check" aria-hidden="true"></i></span>
                    <h6 class="pos-stat-label">Replied</h6>
                </div>
                <p class="pos-stat-value">{{ $stats['replied'] }}</p>
                <p class="pos-stat-desc mb-0">Closed follow-ups</p>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="pos-glass-card pos-tone-primary pos-ad-panel">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Recent queries</h5>
                    <p class="text-muted mb-0">Latest messages from the public contact form</p>
                </div>
                <a href="{{ route('admin.messages') }}" class="btn btn-sm btn-label-secondary">View all</a>
            </div>
            <div class="card-body">
                @if ($recentMessages->isEmpty())
                    <p class="text-muted mb-0">No queries yet. Submissions from the website will appear here.</p>
                @else
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Received</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentMessages as $message)
                                    <tr>
                                        <td>
                                            <div class="fw-medium">{{ $message->name }}</div>
                                            <small class="text-muted">{{ $message->email }}</small>
                                        </td>
                                        <td>{{ Str::limit($message->subject, 42) }}</td>
                                        <td>
                                            <span class="badge os-status-{{ $message->status }}">{{ ucfirst($message->status) }}</span>
                                        </td>
                                        <td>{{ $message->created_at->diffForHumans() }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.message.show', $message) }}" class="btn btn-sm btn-primary">Open</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
