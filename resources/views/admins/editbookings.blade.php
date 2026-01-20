@extends('layouts.admin')

@section('page-title', 'Update Booking Status')

@section('content')

    <!-- Alert Messages -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-calendar-check me-2 text-primary"></i>Update Booking
                        #{{ str_pad($bookings->id, 4, '0', STR_PAD_LEFT) }}</h5>
                </div>
                <div class="card-body">
                    <!-- Booking Summary -->
                    <div class="bg-light rounded p-3 mb-4">
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">Customer</small>
                                <div class="fw-medium">{{ $bookings->name }}</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Booking Date</small>
                                <div class="fw-bold">{{ $bookings->date }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">Email</small>
                                <div>{{ $bookings->email }}</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Guests</small>
                                <div><i class="fas fa-users me-1"></i>{{ $bookings->num_people }} people</div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Status -->
                    <div class="mb-4">
                        <label class="form-label fw-medium">Current Status</label>
                        <div>
                            @if ($bookings->status == 'pending')
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            @elseif($bookings->status == 'Booked' || $bookings->status == 'confirmed')
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check me-1"></i>{{ ucfirst($bookings->status) }}
                                </span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($bookings->status) }}</span>
                            @endif
                        </div>
                    </div>

                    <form method="POST" action="{{ route('bookings.update', $bookings->id) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="status" class="form-label fw-medium">New Status <span
                                    class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select form-select-lg" required>
                                <option value="">Select New Status</option>
                                <option value="Processing" {{ $bookings->status == 'Processing' ? 'selected' : '' }}>
                                    🔄 Processing
                                </option>
                                <option value="Booked" {{ $bookings->status == 'Booked' ? 'selected' : '' }}>
                                    ✅ Confirmed / Booked
                                </option>
                                <option value="Cancelled" {{ $bookings->status == 'Cancelled' ? 'selected' : '' }}>
                                    ❌ Cancelled
                                </option>
                            </select>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update Status
                            </button>
                            <a href="{{ route('bookings.all') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
