<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard - Star JD')</title>
    <meta name="description" content="@yield('description', 'Star JD Admin Dashboard')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <!-- Styles -->
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])

    @stack('styles')
</head>

<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Star JD">
                    <h1>Star JD</h1>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <!-- Dashboard - Role-based routing -->
                <div class="nav-item">
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    @endif
                </div>
                
                <!-- Profile Menu -->
                <div class="nav-item">
                    <a href="{{ route('profile.show', Auth::user()) }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </div>
                
                @if(Auth::user()->hasRole('influencer'))
                <!-- My Services -->
                <div class="nav-item">
                    <a href="{{ route('influencer.services.index') }}" class="nav-link {{ request()->routeIs('influencer.services.*') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i>
                        <span>My Services</span>
                    </a>
                </div>
                
                <!-- Add Service -->
                <div class="nav-item">
                    <a href="{{ route('influencer.services.create') }}" class="nav-link {{ request()->routeIs('influencer.services.create') ? 'active' : '' }}">
                        <i class="fas fa-plus"></i>
                        <span>Add Service</span>
                    </a>
                </div>
                
                <!-- My Packages -->
                <div class="nav-item">
                    <a href="{{ route('influencer.packages.index') }}" class="nav-link {{ request()->routeIs('influencer.packages.*') ? 'active' : '' }}">
                        <i class="fas fa-box"></i>
                        <span>My Packages</span>
                    </a>
                </div>
                
                <!-- Add Package -->
                <div class="nav-item">
                    <a href="{{ route('influencer.packages.create') }}" class="nav-link {{ request()->routeIs('influencer.packages.create') ? 'active' : '' }}">
                        <i class="fas fa-plus"></i>
                        <span>Add Package</span>
                    </a>
                </div>
                
                <!-- My Collaborations -->
                <div class="nav-item">
                    <a href="{{ route('influencer.collaborations.index') }}" class="nav-link {{ request()->routeIs('influencer.collaborations.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i>
                        <span>My Collaborations</span>
                    </a>
                </div>
                
                <!-- Add Collaboration -->
                <div class="nav-item">
                    <a href="{{ route('influencer.collaborations.create') }}" class="nav-link {{ request()->routeIs('influencer.collaborations.create') ? 'active' : '' }}">
                        <i class="fas fa-plus"></i>
                        <span>Add Collaboration</span>
                    </a>
                </div>
                @endif
                
                @if(Auth::user()->hasRole('admin'))
                <!-- Profile Management Submenu -->
                <div class="nav-item nav-submenu">
                    <div class="nav-submenu-header">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Management</span>
                        <i class="fas fa-chevron-down nav-submenu-toggle"></i>
                    </div>
                    <div class="nav-submenu-items">
                        <a href="{{ route('admin.users.index') }}" class="nav-submenu-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <span>All Users</span>
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="nav-submenu-link {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                            <i class="fas fa-user-plus"></i>
                            <span>Add User</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="nav-submenu-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-edit"></i>
                            <span>Edit My Profile</span>
                        </a>
                    </div>
                </div>
                @endif
                
                @if(Auth::user()->hasRole('admin'))
                <div class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                        <i class="fas fa-user-tag"></i>
                        <span>Roles</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.role-options') }}" class="nav-link {{ request()->routeIs('admin.role-options') ? 'active' : '' }}">
                        <i class="fas fa-eye-slash"></i>
                        <span>Role Options</span>
                    </a>
                </div>
                @endif
                
                @if(Auth::user()->hasRole('company'))
                <!-- Company-specific options -->
                <div class="nav-item nav-submenu">
                    <div class="nav-submenu-header">
                        <i class="fas fa-building"></i>
                        <span>Company Management</span>
                        <i class="fas fa-chevron-down nav-submenu-toggle"></i>
                    </div>
                    <div class="nav-submenu-items">
                        <a href="{{ route('profile.edit') }}" class="nav-submenu-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                            <i class="fas fa-building"></i>
                            <span>Company Profile</span>
                        </a>
                        <a href="{{ route('company.settings') }}" class="nav-submenu-link {{ request()->routeIs('company.settings*') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>
                            <span>Company Settings</span>
                        </a>
                    </div>
                </div>
                @endif
                
                @if(Auth::user()->hasRole('admin'))
                <div class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </div>
                @endif
                
                @if(!Auth::user()->hasAnyRole(['admin', 'influencer', 'company']))
                <!-- Regular User Options -->
                <div class="nav-item nav-submenu">
                    <div class="nav-submenu-header">
                        <i class="fas fa-user-circle"></i>
                        <span>Account</span>
                        <i class="fas fa-chevron-down nav-submenu-toggle"></i>
                    </div>
                    <div class="nav-submenu-items">
                        <a href="{{ route('profile.edit') }}" class="nav-submenu-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                            <i class="fas fa-user-edit"></i>
                            <span>Edit Profile</span>
                        </a>
                    </div>
                </div>
                @endif
                
                <!-- Notifications Menu -->
                <div class="nav-item">
                    <a href="{{ route('notifications.index') }}" class="nav-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                        <span class="notification-sidebar-count" id="sidebarNotificationCount" style="display: none;">0</span>
                    </a>
                </div>
                
                <!-- Logout Button -->
                <div class="nav-item logout-item">
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="nav-link logout-btn text-black">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-external-link-alt"></i>
                        <span>View Site</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="sidebar-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
                </div>
                
                <div class="topbar-right">
                    <!-- Notification Bell -->
                    @include('components.notification-bell')
                    <div class="user-menu">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ Auth::user()->name }}</div>
                            <div class="user-role">
                                @if(Auth::user()->hasRole('admin'))
                                    Administrator
                                @elseif(Auth::user()->hasRole('influencer'))
                                    Influencer
                                @elseif(Auth::user()->hasRole('company'))
                                    Company
                                @else
                                    User
                                @endif
                            </div>
                        </div>
                        <div class="user-dropdown">
                            <button class="dropdown-toggle" id="userDropdownToggle">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" id="userDropdownMenu">
                                <a href="{{ route('profile.show', Auth::user()) }}" class="dropdown-item">
                                    <i class="fas fa-user"></i>
                                    <span>My Profile</span>
                                </a>
                                <a href="{{ route('notifications.index') }}" class="dropdown-item">
                                    <i class="fas fa-bell"></i>
                                    <span>Notifications</span>
                                </a>
                                <a href="{{ route('home') }}" class="dropdown-item">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span>View Site</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout-btn">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success fade-in" style="background: rgba(16, 185, 129, 0.1); color: var(--success-color); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid rgba(16, 185, 129, 0.2);">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger fade-in" style="background: rgba(239, 68, 68, 0.1); color: var(--danger-color); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid rgba(239, 68, 68, 0.2);">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')

    <!-- CKEditor Initialization -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor for all textareas in dashboard
            const textareas = document.querySelectorAll('textarea');
            
            textareas.forEach(function(textarea) {
                // Skip if already initialized or if it's a simple textarea (like search)
                if (textarea.hasAttribute('data-ckeditor-initialized') || 
                    textarea.hasAttribute('data-simple') ||
                    textarea.name === 'search' ||
                    textarea.id === 'search') {
                    return;
                }

                // Mark as initialized to prevent double initialization
                textarea.setAttribute('data-ckeditor-initialized', 'true');

                ClassicEditor
                    .create(textarea, {
                        toolbar: {
                            items: [
                                'heading', '|',
                                'bold', 'italic', 'underline', 'strikethrough', '|',
                                'link', 'bulletedList', 'numberedList', '|',
                                'outdent', 'indent', '|',
                                'blockQuote', 'insertTable', '|',
                                'undo', 'redo'
                            ]
                        },
                        language: 'en',
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        }
                    })
                    .then(editor => {
                        console.log('CKEditor initialized for:', textarea.name || textarea.id);
                        
                        // Update the original textarea when editor content changes
                        editor.model.document.on('change:data', () => {
                            textarea.value = editor.getData();
                        });
                    })
                    .catch(error => {
                        console.error('Error initializing CKEditor:', error);
                    });
            });
        });

        // Sidebar notification count update
        function updateSidebarNotificationCount() {
            fetch('{{ route("notifications.unread-count") }}')
            .then(response => response.json())
            .then(data => {
                const sidebarCount = document.getElementById('sidebarNotificationCount');
                if (data.count > 0) {
                    sidebarCount.textContent = data.count;
                    sidebarCount.style.display = 'flex';
                } else {
                    sidebarCount.style.display = 'none';
                }
            })
            .catch(error => console.error('Error updating sidebar notification count:', error));
        }

        // Update sidebar notification count on page load
        updateSidebarNotificationCount();

        // Refresh sidebar notification count every 30 seconds
        setInterval(updateSidebarNotificationCount, 30000);
    </script>
</body>
</html>
