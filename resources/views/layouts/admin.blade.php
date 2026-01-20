<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard - Restoran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #FEA116;
            --primary-dark: #e8920f;
            --sidebar-bg: #1a1d21;
            --sidebar-hover: #2d3238;
            --text-muted: #6c757d;
            --card-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --card-shadow-hover: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--sidebar-bg);
            padding: 20px 0;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            padding: 0 20px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-brand i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-right: 10px;
        }

        .sidebar-brand span {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 15px;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--sidebar-hover);
            color: var(--primary-color);
        }

        .sidebar-menu a i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .sidebar-menu .menu-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.4);
            padding: 15px 15px 10px;
            letter-spacing: 1px;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Top Header */
        .top-header {
            background: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--card-shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
        }

        /* Content Area */
        .content-area {
            padding: 30px;
        }

        /* Stat Cards */
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .stat-card:hover {
            box-shadow: var(--card-shadow-hover);
            transform: translateY(-2px);
        }

        .stat-card .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-card .stat-icon.bg-primary-soft {
            background: rgba(254, 161, 22, 0.15);
            color: var(--primary-color);
        }

        .stat-card .stat-icon.bg-success-soft {
            background: rgba(40, 167, 69, 0.15);
            color: #28a745;
        }

        .stat-card .stat-icon.bg-info-soft {
            background: rgba(23, 162, 184, 0.15);
            color: #17a2b8;
        }

        .stat-card .stat-icon.bg-danger-soft {
            background: rgba(220, 53, 69, 0.15);
            color: #dc3545;
        }

        .stat-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.9rem;
        }

        /* Modern Table */
        .modern-table {
            background: #fff;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .modern-table .table-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .modern-table .table-header h5 {
            margin: 0;
            font-weight: 600;
            font-size: 1rem;
        }

        .modern-table table {
            margin: 0;
            font-size: 0.85rem;
        }

        .modern-table thead th {
            background: #f8f9fa;
            border: none;
            padding: 10px 12px;
            font-weight: 600;
            color: #333;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .modern-table tbody td {
            padding: 10px 12px;
            vertical-align: middle;
            border-color: #f0f0f0;
            font-size: 0.85rem;
        }

        .modern-table tbody tr:hover {
            background: #fafbfc;
        }

        /* Responsive table for mobile */
        @media (max-width: 768px) {
            .modern-table .table-header {
                padding: 12px 15px;
            }

            .modern-table thead th,
            .modern-table tbody td {
                padding: 8px 10px;
                font-size: 0.75rem;
            }

            .modern-table table {
                font-size: 0.75rem;
            }

            .user-avatar {
                width: 28px !important;
                height: 28px !important;
                font-size: 0.7rem !important;
            }

            .status-badge {
                padding: 4px 8px;
                font-size: 0.7rem;
            }

            .btn-action {
                width: 28px;
                height: 28px;
                font-size: 0.75rem;
            }

            .food-img {
                width: 35px;
                height: 35px;
            }

            /* Hide less important columns on mobile */
            .hide-mobile {
                display: none !important;
            }
        }

        @media (max-width: 576px) {
            .content-area {
                padding: 15px;
            }

            .modern-table thead th,
            .modern-table tbody td {
                padding: 6px 8px;
                font-size: 0.7rem;
            }
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background: rgba(255, 193, 7, 0.15);
            color: #d4a106;
        }

        .status-completed {
            background: rgba(40, 167, 69, 0.15);
            color: #28a745;
        }

        .status-cancelled {
            background: rgba(220, 53, 69, 0.15);
            color: #dc3545;
        }

        /* Action Buttons */
        .btn-action {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-action.btn-edit {
            background: rgba(23, 162, 184, 0.15);
            color: #17a2b8;
        }

        .btn-action.btn-delete {
            background: rgba(220, 53, 69, 0.15);
            color: #dc3545;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }

        /* Primary Button */
        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Form Controls */
        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(254, 161, 22, 0.25);
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 10px;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .toggle-sidebar {
                display: block !important;
            }
        }

        .toggle-sidebar {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Food Image */
        .food-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Card styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #eee;
            padding: 20px 25px;
        }

        .card-body {
            padding: 25px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-utensils"></i>
            <span>Restoran</span>
        </div>

        @auth('admin')
            <ul class="sidebar-menu">
                <li class="menu-header">Main</li>
                <li>
                    <a href="{{ route('admins.dashboard') }}"
                        class="{{ request()->routeIs('admins.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>

                <li class="menu-header">Management</li>
                <li>
                    <a href="{{ route('orders.all') }}" class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="{{ route('all.foods') }}"
                        class="{{ request()->routeIs('*.foods') || request()->routeIs('create.foods') ? 'active' : '' }}">
                        <i class="fas fa-hamburger"></i>
                        Foods
                    </a>
                </li>
                <li>
                    <a href="{{ route('bookings.all') }}" class="{{ request()->routeIs('bookings.*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check"></i>
                        Bookings
                    </a>
                </li>

                <li class="menu-header">Settings</li>
                <li>
                    <a href="{{ route('admins.all') }}"
                        class="{{ request()->routeIs('admins.all') || request()->routeIs('admins.create') ? 'active' : '' }}">
                        <i class="fas fa-users-cog"></i>
                        Manage Admins
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        View Website
                    </a>
                </li>
            </ul>
        @endauth
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div class="d-flex align-items-center gap-3">
                <button class="toggle-sidebar" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            </div>

            @auth('admin')
                <div class="dropdown">
                    <a class="user-dropdown dropdown-toggle text-decoration-none" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}
                        </div>
                        <span
                            class="d-none d-md-inline text-dark fw-medium">{{ Auth::guard('admin')->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('admins.dashboard') }}"><i
                                    class="fas fa-home me-2"></i>Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('view.login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </a>
            @endauth
        </header>

        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');

            if (window.innerWidth < 992) {
                if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>

</html>
