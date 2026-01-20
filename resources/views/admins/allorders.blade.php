@extends('layouts.admin')

@section('page-title', 'Orders Management')

@section('content')

    <!-- Alert Messages -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fas fa-trash me-2"></i>{{ Session::get('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Orders Table -->
    <div class="modern-table">
        <div class="table-header">
            <h5><i class="fas fa-shopping-cart me-2 text-primary"></i>All Orders</h5>
            <span class="badge bg-primary">{{ count($orders) }} orders</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th class="hide-mobile">Contact</th>
                        <th class="hide-mobile">Location</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>
                                <span class="fw-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                        {{ strtoupper(substr($order->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-medium">{{ $order->name }}</div>
                                        <small class="text-muted">{{ $order->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="hide-mobile">
                                <div>
                                    <i class="fas fa-phone text-muted me-1"></i>
                                    <small>{{ $order->phone_number }}</small>
                                </div>
                            </td>
                            <td class="hide-mobile">
                                <div>
                                    <small class="text-muted">{{ Str::limit($order->address, 20) }}</small>
                                    <div><strong>{{ $order->town }}</strong></div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold text-success">${{ number_format($order->price, 2) }}</span>
                            </td>
                            <td>
                                @if ($order->status == 'pending')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock me-1"></i>Pending
                                    </span>
                                @elseif($order->status == 'completed' || $order->status == 'delivered')
                                    <span class="status-badge status-completed">
                                        <i class="fas fa-check me-1"></i>{{ ucfirst($order->status) }}
                                    </span>
                                @elseif($order->status == 'cancelled')
                                    <span class="status-badge status-cancelled">
                                        <i class="fas fa-times me-1"></i>Cancelled
                                    </span>
                                @else
                                    <span class="status-badge bg-secondary text-white">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn-action btn-edit"
                                    title="Change Status">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('orders.delete', $order->id) }}" class="btn-action btn-delete"
                                    title="Delete Order"
                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3"></i>
                                    <p class="mb-0">No orders found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
