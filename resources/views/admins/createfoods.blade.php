@extends('layouts.admin')

@section('page-title', 'Add New Food')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-hamburger me-2 text-primary"></i>Create New Food Item</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('store.foods') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-medium">Food Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control form-control-lg"
                                        placeholder="e.g. Grilled Salmon" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="price" class="form-label fw-medium">Price ($) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="price" id="price"
                                        class="form-control form-control-lg" placeholder="e.g. 24.99"
                                        value="{{ old('price') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category" class="form-label fw-medium">Category <span
                                    class="text-danger">*</span></label>
                            <select name="category" id="category" class="form-select form-select-lg" required>
                                <option value="">Choose Category</option>
                                <option value="Breakfast" {{ old('category') == 'Breakfast' ? 'selected' : '' }}>
                                    ☕ Breakfast
                                </option>
                                <option value="Lunch" {{ old('category') == 'Lunch' ? 'selected' : '' }}>
                                    🌤️ Lunch
                                </option>
                                <option value="Dinner" {{ old('category') == 'Dinner' ? 'selected' : '' }}>
                                    🌙 Dinner
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-medium">Description <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" rows="4"
                                placeholder="Describe the food item, ingredients, etc." required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-medium">Food Image <span
                                    class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control form-control-lg"
                                accept="image/jpeg,image/png,image/jpg,image/gif" required>
                            <small class="text-muted">Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB</small>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-plus me-2"></i>Create Food Item
                            </button>
                            <a href="{{ route('all.foods') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
