<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - ObtainSolutions</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @stack('styles')
</head>
<body>
    <!-- Admin Navigation -->
    <nav style="background-color: #FBFBFB;" class="navbar" id="navbar">
        <div class="nav-container">
            <div class="nav-content">
                <div  style="display: flex; align-items: center; gap: 1rem;" class="nav-logo">
                    <img style="width: 7%; height: 7%;" src="{{ asset('assets/img/logo.png') }}" alt="ObtainSolutions Logo" class="logo-image">
                    <h1 class="logo-text">ObtainSolutions</h1>
                </div>

                <!-- Desktop Navigation -->
                <div class="nav-links desktop-nav">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Messages
                    </a>
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-home"></i> View Website
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0; display: inline;" id="logout-form">
                        @csrf
                        <button type="submit" class="nav-link logout-btn" id="logout-btn" style="background: none; border: none; cursor: pointer; font-family: inherit; font-size: inherit; color: inherit; padding: inherit;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>

                <!-- Mobile menu button -->
                <button class="mobile-menu-btn" id="mobile-menu-btn">
                    <i class="fas fa-bars" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-nav" id="mobile-nav">
            <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.messages') }}" class="mobile-nav-link">
                <i class="fas fa-envelope"></i> Messages
            </a>
            <a href="{{ route('home') }}" class="mobile-nav-link">
                <i class="fas fa-home"></i> View Website
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0; display: block;" id="mobile-logout-form">
                @csrf
                <button type="submit" class="mobile-nav-link" id="mobile-logout-btn" style="background: none; border: none; cursor: pointer; font-family: inherit; font-size: inherit; color: inherit; padding: inherit; width: 100%; text-align: left;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="admin-main">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    
    <!-- Admin Layout Scripts -->
    <script>
        $(document).ready(function() {
            // Handle logout button clicks
            $('.logout-btn, #mobile-logout-btn').on('click', function(e) {
                e.preventDefault();
                console.log('Logout button clicked');
                
                var $form = $(this).closest('form');
                if ($form.length) {
                    console.log('Submitting logout form');
                    $form.submit();
                }
            });
            
            // Handle mark as replied functionality
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
            
            // Handle delete message functionality
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
        });
    </script>
    
    @stack('scripts')
</body>
</html> 