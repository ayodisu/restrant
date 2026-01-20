@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white"
                style="background: linear-gradient(135deg, #FEA116 0%, #e8920f 100%) !important;">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="mb-1">Welcome back, {{ Auth::guard('admin')->user()->name }}! 👋</h4>
                            <p class="mb-0 opacity-75">Here's what's happening with your restaurant today.</p>
                        </div>
                        <div class="col-auto d-none d-md-block">
                            <i class="fas fa-chart-line fa-3x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-primary-soft">
                    <i class="fas fa-hamburger"></i>
                </div>
                <h3>{{ $foodCount }}</h3>
                <p>Total Food Items</p>
                <a href="{{ route('all.foods') }}" class="text-decoration-none small">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-success-soft">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>{{ $checkoutCount }}</h3>
                <p>Total Orders</p>
                <a href="{{ route('orders.all') }}" class="text-decoration-none small">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-info-soft">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>{{ $bookingsCount }}</h3>
                <p>Table Bookings</p>
                <a href="{{ route('bookings.all') }}" class="text-decoration-none small">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon bg-danger-soft">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h3>{{ $adminCount }}</h3>
                <p>Admin Users</p>
                <a href="{{ route('admins.all') }}" class="text-decoration-none small">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-bolt me-2 text-warning"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('create.foods') }}" class="btn btn-outline-primary">
                            <i class="fas fa-plus me-2"></i>Add New Food Item
                        </a>
                        <a href="{{ route('orders.all') }}" class="btn btn-outline-success">
                            <i class="fas fa-eye me-2"></i>View Pending Orders
                        </a>
                        <a href="{{ route('bookings.all') }}" class="btn btn-outline-info">
                            <i class="fas fa-calendar me-2"></i>Manage Bookings
                        </a>
                        <a href="{{ route('admins.create') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-user-plus me-2"></i>Add New Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-clock me-2 text-info"></i>Business Hours</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-sun me-2 text-warning"></i>Monday - Saturday</span>
                            <span class="badge bg-success">9:00 AM - 9:00 PM</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-moon me-2 text-primary"></i>Sunday</span>
                            <span class="badge bg-success">10:00 AM - 8:00 PM</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-calendar-day me-2 text-muted"></i>Today</span>
                            <span class="badge bg-primary">{{ now()->format('l, M d') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-clock me-2 text-muted"></i>Current Time</span>
                            <span class="badge bg-secondary">{{ now()->format('h:i A') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
