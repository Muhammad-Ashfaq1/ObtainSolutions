@extends('admin.layout')

@section('title', 'Messages')

@section('content')
<div class="admin-messages">
    <div class="container">
        <!-- Messages Header -->
        <div class="messages-header">
            <div class="header-content">
                <h1 class="page-title">Messages</h1>
                <p class="page-subtitle">Manage all contact form submissions</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-group">
                <label for="status-filter" class="filter-label">Filter by Status:</label>
                <select id="status-filter" class="filter-select">
                    <option value="">All Messages</option>
                    <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Unread</option>
                    <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read</option>
                    <option value="replied" {{ request('status') === 'replied' ? 'selected' : '' }}>Replied</option>
                    <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="search" class="filter-label">Search:</label>
                <input type="text" id="search" class="filter-input" placeholder="Search by name, email, or subject..." value="{{ request('search') }}">
            </div>
        </div>

        <!-- Messages Table -->
        @if($messages->count() > 0)
            <div class="messages-table">
                <div class="table-header">
                    <div class="table-cell">Name</div>
                    <div class="table-cell">Email</div>
                    <div class="table-cell">Subject</div>
                    <div class="table-cell">Status</div>
                    <div class="table-cell">Date</div>
                    <div class="table-cell">Actions</div>
                </div>

                @foreach($messages as $message)
                    <div class="table-row {{ $message->status === 'unread' ? 'unread-row' : '' }}">
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
                            <div class="subject-text">{{ Str::limit($message->subject, 40) }}</div>
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

            <!-- Pagination -->
            @if($messages->hasPages())
                <div class="pagination-container">
                    {{ $messages->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3>No Messages Found</h3>
                <p>No messages match your current filters.</p>
                <a href="{{ route('admin.messages') }}" class="btn btn-primary">Clear Filters</a>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Status filter functionality
    $('#status-filter').on('change', function() {
        var url = new URL(window.location);
        if ($(this).val()) {
            url.searchParams.set('status', $(this).val());
        } else {
            url.searchParams.delete('status');
        }
        window.location.href = url.toString();
    });

    // Search functionality with debounce
    var searchTimeout;
    $('#search').on('input', function() {
        clearTimeout(searchTimeout);
        var $this = $(this);
        searchTimeout = setTimeout(function() {
            var url = new URL(window.location);
            if ($this.val()) {
                url.searchParams.set('search', $this.val());
            } else {
                url.searchParams.delete('search');
            }
            window.location.href = url.toString();
        }, 500);
    });

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