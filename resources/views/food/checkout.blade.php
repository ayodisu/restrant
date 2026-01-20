@extends('layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('food.display.cart') }}">Cart</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Service Start -->
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Billing Details</h5>
                <h1 class="text-white mb-4">Checkout</h1>
                <form method="POST" action="{{ route('food.checkout.store') }}" class="col-md-12">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Your Email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="town" class="form-control" id="town" placeholder="Town"
                                    required>
                                <label for="town">Town</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="country" class="form-control" id="country"
                                    placeholder="Country" required>
                                <label for="country">Country</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="zipcode" id="zipcode"
                                    placeholder="Zipcode">
                                <label for="zipcode">Zipcode (Optional)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    placeholder="Phone number" required>
                                <label for="phone_number">Phone number</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="address" placeholder="Address" id="address" style="height: 100px" required></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="hidden" class="form-control" name="price"
                                    value="{{ Session::get('price') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Order and Pay Now -
                                ${{ Session::get('price') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Service End -->
@endsection
