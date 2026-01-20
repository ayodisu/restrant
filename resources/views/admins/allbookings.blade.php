@extends('layouts.admin')

@section('page-title', 'Bookings Management')

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

    <!-- Bookings Table -->
    <div class="modern-table">
        <div class="table-header">
            <h5><i class="fas fa-calendar-check me-2 text-primary"></i>All Bookings</h5>
            <span class="badge bg-primary">{{ count($bookings) }} reservations</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Guests</th>
                        <th class="hide-mobile">Special Request</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>
                                <span class="fw-bold">#{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                        {{ strtoupper(substr($booking->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-medium">{{ $booking->name }}</div>
                                        <small class="text-muted">{{ $booking->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <i class="fas fa-calendar text-muted me-1"></i>
                                    <span class="fw-medium">{{ $booking->date }}</span>
                                </div>
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>Booked
                                    {{ \Carbon\Carbon::parse($booking->created_at)->diffForHumans() }}
                                </small>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    <i class="fas fa-users me-1"></i>{{ $booking->num_people }}
                                    {{ $booking->num_people == 1 ? 'person' : 'people' }}
                                </span>
                            </td>
                            <td class="hide-mobile">
                                <small class="text-muted">{{ Str::limit($booking->spe_request, 30) }}</small>
                            </td>
                            <td>
                                @if ($booking->status == 'pending')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock me-1"></i>Pending
                                    </span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="status-badge status-completed">
                                        <i class="fas fa-check me-1"></i>Confirmed
                                    </span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="status-badge status-cancelled">
                                        <i class="fas fa-times me-1"></i>Cancelled
                                    </span>
                                @else
                                    <span class="status-badge bg-secondary text-white">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn-action btn-edit"
                                    title="Change Status">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('bookings.delete', $booking->id) }}" class="btn-action btn-delete"
                                    title="Delete Booking"
                                    onclick="return confirm('Are you sure you want to delete this booking?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-calendar-times fa-3x mb-3"></i>
                                    <p class="mb-0">No bookings found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
