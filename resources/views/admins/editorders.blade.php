@extends('layouts.admin')

@section('page-title', 'Update Order Status')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-edit me-2 text-primary"></i>Update Order
                        #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</h5>
                </div>
                <div class="card-body">
                    <!-- Order Summary -->
                    <div class="bg-light rounded p-3 mb-4">
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">Customer</small>
                                <div class="fw-medium">{{ $order->name }}</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Total Amount</small>
                                <div class="fw-bold text-success">${{ number_format($order->price, 2) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Status -->
                    <div class="mb-4">
                        <label class="form-label fw-medium">Current Status</label>
                        <div>
                            @if ($order->status == 'pending')
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            @elseif($order->status == 'Delivered')
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check me-1"></i>Delivered
                                </span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                            @endif
                        </div>
                    </div>

                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="status" class="form-label fw-medium">New Status <span
                                    class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select form-select-lg" required>
                                <option value="">Select New Status</option>
                                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>
                                    🔄 Processing
                                </option>
                                <option value="Delivering" {{ $order->status == 'Delivering' ? 'selected' : '' }}>
                                    🚚 Delivering
                                </option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                    ✅ Delivered
                                </option>
                                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
                                    ❌ Cancelled
                                </option>
                            </select>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update Status
                            </button>
                            <a href="{{ route('orders.all') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
