@extends('layouts.admin')

@section('page-title', 'Food Management')

@section('content')

    <!-- Alert Messages -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('delete'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fas fa-trash me-2"></i>{{ Session::get('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Foods Table -->
    <div class="modern-table">
        <div class="table-header">
            <h5><i class="fas fa-hamburger me-2 text-primary"></i>All Food Items</h5>
            <a href="{{ route('create.foods') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Food
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($foods as $food)
                        <tr>
                            <td>
                                <span class="fw-bold">#{{ $food->id }}</span>
                            </td>
                            <td>
                                <img src="{{ asset('assets/img/' . $food->image) }}" alt="{{ $food->name }}"
                                    class="food-img">
                            </td>
                            <td>
                                <span class="fw-medium">{{ $food->name }}</span>
                            </td>
                            <td>
                                <span class="fw-bold text-success">${{ number_format($food->price, 2) }}</span>
                            </td>
                            <td>
                                @if ($food->category == 'Breakfast')
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-coffee me-1"></i>{{ $food->category }}
                                    </span>
                                @elseif($food->category == 'Lunch')
                                    <span class="badge bg-info">
                                        <i class="fas fa-sun me-1"></i>{{ $food->category }}
                                    </span>
                                @elseif($food->category == 'Dinner')
                                    <span class="badge bg-primary">
                                        <i class="fas fa-moon me-1"></i>{{ $food->category }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">{{ $food->category }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('delete.foods', $food->id) }}" class="btn-action btn-delete"
                                    title="Delete Food"
                                    onclick="return confirm('Are you sure you want to delete this food item?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-hamburger fa-3x mb-3"></i>
                                    <p class="mb-0">No food items found</p>
                                    <a href="{{ route('create.foods') }}" class="btn btn-primary mt-3">Add Your First Food
                                        Item</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
