@extends('admin.layout')

@section('title', 'Query from '.$message->name)
@section('page_heading', 'Query detail')
@section('page_subheading', $message->subject)

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pos-glass.css') }}?v={{ filemtime(public_path('assets/css/pos-glass.css')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin-queries.css') }}?v={{ filemtime(public_path('assets/css/admin-queries.css')) }}" />
@endpush

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="pos-glass-card pos-tone-primary p-4">
            <div class="d-flex justify-content-between align-items-start gap-3 mb-4">
                <div>
                    <h4 class="mb-1">{{ $message->subject }}</h4>
                    <span class="badge os-status-{{ $message->status }}">{{ ucfirst($message->status) }}</span>
                </div>
                <a href="{{ route('admin.messages') }}" class="btn btn-sm btn-label-secondary">Back to queries</a>
            </div>
            <div class="os-query-body">{{ $message->message }}</div>
            <div class="d-flex flex-wrap gap-2 mt-4">
                <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: '.$message->subject) }}" class="btn btn-primary">
                    <i class="ti ti-mail me-1"></i> Reply via email
                </a>
                @if ($message->status !== 'replied')
                    <form method="POST" action="{{ route('admin.message.reply', $message) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check me-1"></i> Mark as replied
                        </button>
                    </form>
                @endif
                <form method="POST" action="{{ route('admin.message.delete', $message) }}" data-pos-confirm="This query will be permanently removed." data-pos-confirm-title="Delete query" data-pos-confirm-text="Delete" data-pos-confirm-tone="danger">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="ti ti-trash me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="pos-glass-card pos-tone-info p-4 mb-4">
            <h6 class="mb-3">Sender</h6>
            <p class="mb-1 fw-semibold">{{ $message->name }}</p>
            <p class="mb-1"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
            @if ($message->phone)
                <p class="mb-0"><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></p>
            @endif
        </div>
        <div class="pos-glass-card pos-tone-secondary p-4">
            <h6 class="mb-3">Timeline</h6>
            <ul class="os-timeline">
                <li>
                    <strong>Received</strong>
                    <div class="text-muted">{{ $message->created_at->format('M d, Y \a\t h:i A') }}</div>
                </li>
                @if ($message->read_at)
                    <li>
                        <strong>Read</strong>
                        <div class="text-muted">{{ $message->read_at->format('M d, Y \a\t h:i A') }}</div>
                    </li>
                @endif
                @if ($message->replied_at)
                    <li>
                        <strong>Replied</strong>
                        <div class="text-muted">{{ $message->replied_at->format('M d, Y \a\t h:i A') }}</div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
