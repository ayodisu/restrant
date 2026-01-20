@extends('layouts.admin')

@section('page-title', 'Admin Management')

@section('content')

    <!-- Alert Messages -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Admins Table -->
    <div class="modern-table">
        <div class="table-header">
            <h5><i class="fas fa-users-cog me-2 text-primary"></i>All Administrators</h5>
            <a href="{{ route('admins.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>Add New Admin
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Admin</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>
                                <span class="fw-bold">#{{ $admin->id }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3" style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr($admin->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-medium">{{ $admin->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="fas fa-envelope text-muted me-2"></i>{{ $admin->email }}
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    <i class="fas fa-shield-alt me-1"></i>Administrator
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-user-slash fa-3x mb-3"></i>
                                    <p class="mb-0">No administrators found</p>
                                    <a href="{{ route('admins.create') }}" class="btn btn-primary mt-3">Add Your First
                                        Admin</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
