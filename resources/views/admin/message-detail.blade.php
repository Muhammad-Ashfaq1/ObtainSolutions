@extends('admin.layout')

@section('title', 'Message Detail')

@section('content')
<div class="message-detail">
    <div class="container">
        <!-- Message Header -->
        <div class="message-header">
            <div class="header-content">
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="{{ route('admin.messages') }}">Messages</a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Message Detail</span>
                </div>
                <h1 class="page-title">Message from {{ $message->name }}</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.messages') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Back to Messages
                </a>
            </div>
        </div>

        <!-- Message Content -->
        <div class="message-content">
            <div class="message-card">
                <!-- Message Header -->
                <div class="message-card-header">
                    <div class="message-info">
                        <div class="sender-info">
                            <div class="sender-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="sender-details">
                                <h3 class="sender-name">{{ $message->name }}</h3>
                                <p class="sender-email">{{ $message->email }}</p>
                                @if($message->phone)
                                    <p class="sender-phone">{{ $message->phone }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="message-meta">
                            <span class="status-badge {{ $message->status_badge_class }}">
                                {{ ucfirst($message->status) }}
                            </span>
                            <div class="message-date">
                                <div>{{ $message->created_at->format('M d, Y') }}</div>
                                <small>{{ $message->created_at->format('h:i A') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Body -->
                <div class="message-card-body">
                    <div class="message-subject">
                        <h2>{{ $message->subject }}</h2>
                    </div>
                    <div class="message-text">
                        <p>{{ nl2br(e($message->message)) }}</p>
                    </div>
                </div>

                <!-- Message Actions -->
                <div class="message-card-footer">
                    <div class="action-buttons">
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary">
                            <i class="fas fa-reply"></i> Reply via Email
                        </a>
                        @if($message->status !== 'replied')
                            <button class="btn btn-success mark-replied" data-id="{{ $message->id }}">
                                <i class="fas fa-check"></i> Mark as Replied
                            </button>
                        @endif
                        <button class="btn btn-danger delete-message" data-id="{{ $message->id }}">
                            <i class="fas fa-trash"></i> Delete Message
                        </button>
                    </div>
                </div>
            </div>

            <!-- Message Timeline -->
            <div class="message-timeline">
                <h3>Message Timeline</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="timeline-content">
                            <h4>Message Received</h4>
                            <p>{{ $message->created_at->format('M d, Y \a\t h:i A') }}</p>
                        </div>
                    </div>

                    @if($message->read_at)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Message Read</h4>
                                <p>{{ $message->read_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                    @endif

                    @if($message->replied_at)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-reply"></i>
                            </div>
                            <div class="timeline-content">
                                <h4>Message Replied</h4>
                                <p>{{ $message->replied_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Mark as replied functionality
    $('.mark-replied').on('click', function() {
        var messageId = $(this).data('id');
        if (confirm('Are you sure you want to mark this message as replied?')) {
            $.ajax({
                url: '/admin/messages/' + messageId + '/reply',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                },
                success: function(data) {
                    if (data.success) {
                        toastr.success('Message marked as replied successfully.', 'Success!', {
                            timeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            positionClass: 'toast-top-right'
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function() {
                    toastr.error('Error marking message as replied.', 'Error!', {
                        timeOut: 5000,
                        progressBar: true,
                        closeButton: true,
                        positionClass: 'toast-top-right'
                    });
                }
            });
        }
    });

    // Delete message functionality
    $('.delete-message').on('click', function() {
        var messageId = $(this).data('id');
        if (confirm('Are you sure you want to delete this message? This action cannot be undone.')) {
            $.ajax({
                url: '/admin/messages/' + messageId,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                },
                success: function(data) {
                    if (data.success) {
                        toastr.success('Message has been deleted successfully.', 'Deleted!', {
                            timeOut: 2000,
                            progressBar: true,
                            closeButton: true,
                            positionClass: 'toast-top-right'
                        });
                        setTimeout(function() {
                            window.location.href = '{{ route("admin.messages") }}';
                        }, 1000);
                    }
                },
                error: function() {
                    toastr.error('Error deleting message.', 'Error!', {
                        timeOut: 5000,
                        progressBar: true,
                        closeButton: true,
                        positionClass: 'toast-top-right'
                    });
                }
            });
        }
    });
});
</script>
@endpush
@endsection 