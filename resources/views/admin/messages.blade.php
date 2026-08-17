@extends('admin.layout')

@section('title', 'Queries')
@section('page_heading', 'Queries')
@section('page_subheading', 'Contact form submissions')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pos-glass.css') }}?v={{ filemtime(public_path('assets/css/pos-glass.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin-queries.css') }}?v={{ filemtime(public_path('assets/css/admin-queries.css')) }}" />
@endpush

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="pos-glass-card pos-tone-primary">
            <div class="pos-glass-intro">
                <div class="pos-glass-intro-copy">
                    <h4 class="pos-glass-intro-title">Inbound project inquiries</h4>
                    <p class="pos-glass-intro-subtitle">Search and filter messages submitted from the public Contact section.</p>
                </div>
            </div>
            <div class="p-3 pt-0">
                <form method="GET" action="{{ route('admin.messages') }}" class="row g-2 align-items-end">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach (['unread', 'read', 'replied', 'archived'] as $status)
                                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="search" class="form-label">Search</label>
                        <input type="search" id="search" name="search" class="form-control" value="{{ request('search') }}" placeholder="Name, email, phone, or subject">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('admin.messages') }}" class="btn btn-label-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="pos-glass-card pos-tone-secondary">
            @if ($messages->isEmpty())
                <div class="p-4 text-center text-muted">No queries match these filters.</div>
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
                            @foreach ($messages as $message)
                                <tr class="{{ $message->status === 'unread' ? 'os-query-row-unread' : '' }}">
                                    <td>
                                        <div>{{ $message->name }}</div>
                                        <small class="text-muted">{{ $message->email }}</small>
                                        @if ($message->phone)
                                            <div><small class="text-muted">{{ $message->phone }}</small></div>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($message->subject, 50) }}</td>
                                    <td><span class="badge os-status-{{ $message->status }}">{{ ucfirst($message->status) }}</span></td>
                                    <td>
                                        <div>{{ $message->created_at->format('M d, Y') }}</div>
                                        <small class="text-muted">{{ $message->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.message.show', $message) }}" class="btn btn-sm btn-primary">Open</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($messages->hasPages())
                    <div class="p-3">{{ $messages->links() }}</div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
