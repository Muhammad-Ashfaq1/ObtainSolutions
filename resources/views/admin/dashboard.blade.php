@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="admin-dashboard">
    <div class="container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <p class="dashboard-subtitle">Welcome back, {{ Auth::user()->name }}!</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid admin-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $stats['total'] }}</h3>
                    <p class="stat-label">Total Messages</p>
                </div>
            </div>

            <div class="stat-card unread">
                <div class="stat-icon">
                    <i class="fas fa-envelope-open"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $stats['unread'] }}</h3>
                    <p class="stat-label">Unread Messages</p>
                </div>
            </div>

            <div class="stat-card read">
                <div class="stat-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $stats['read'] }}</h3>
                    <p class="stat-label">Read Messages</p>
                </div>
            </div>

            <div class="stat-card replied">
                <div class="stat-icon">
                    <i class="fas fa-reply"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">{{ $stats['replied'] }}</h3>
                    <p class="stat-label">Replied Messages</p>
                </div>
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Recent Messages</h2>
                <a href="{{ route('admin.messages') }}" class="btn btn-outline">
                    View All Messages <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            @if($recentMessages->count() > 0)
                <div class="messages-table">
                    <div class="table-header">
                        <div class="table-cell">Name</div>
                        <div class="table-cell">Email</div>
                        <div class="table-cell">Subject</div>
                        <div class="table-cell">Status</div>
                        <div class="table-cell">Date</div>
                        <div class="table-cell">Actions</div>
                    </div>

                    @foreach($recentMessages as $message)
                        <div class="table-row">
                            <div class="table-cell">
                                <div class="message-info">
                                    <strong>{{ $message->name }}</strong>
                                    @if($message->phone)
                                        <small>{{ $message->phone }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="table-cell">{{ $message->email }}</div>
                            <div class="table-cell">
                                <div class="subject-text">{{ Str::limit($message->subject, 30) }}</div>
                            </div>
                            <div class="table-cell">
                                <span class="status-badge {{ $message->status_badge_class }}">
                                    {{ ucfirst($message->status) }}
                                </span>
                            </div>
                            <div class="table-cell">
                                <div class="date-info">
                                    <div>{{ $message->created_at->format('M d, Y') }}</div>
                                    <small>{{ $message->created_at->format('h:i A') }}</small>
                                </div>
                            </div>
                            <div class="table-cell">
                                <div class="action-buttons">
                                    <a href="{{ route('admin.message.show', $message) }}" class="btn btn-sm btn-primary" title="View Message">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($message->status !== 'replied')
                                        <button class="btn btn-sm btn-success mark-replied" data-id="{{ $message->id }}" title="Mark as Replied">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                    @endif
                                    <button class="btn btn-sm btn-danger delete-message" data-id="{{ $message->id }}" title="Delete Message">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h3>No Messages Yet</h3>
                    <p>You haven't received any contact messages yet.</p>
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Quick Actions</h2>
            </div>
            <div class="quick-actions">
                <a href="{{ route('admin.messages') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>View All Messages</h3>
                    <p>Manage all contact form submissions</p>
                </a>
                <a href="{{ route('home') }}" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>View Website</h3>
                    <p>Go back to the main website</p>
                </a>
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
                            location.reload();
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