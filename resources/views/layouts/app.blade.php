<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('services') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('food.menu') }}" class="nav-item nav-link">Menu</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                                @endif
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                                @endif
                            @else
                                <a href="{{ route('food.display.cart') }}" class="nav-item nav-link"><i
                                        class="fa-sharp fa-solid fa-cart-shopping"></i>Cart</a>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('users.bookings') }}">
                                            Bookings
                                        </a>

                                        <a class="dropdown-item" href="{{ route('users.orders') }}">
                                            Orders
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Brand & About -->
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-primary mb-4"><i class="fa fa-utensils me-3"></i>Restoran</h3>
                    <p class="mb-4">Experience the finest dining with our carefully crafted dishes made from the
                        freshest ingredients by our master chefs.</p>
                    <div class="d-flex gap-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://x.com/_ayodisu"
                            target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://github.com/ayodisu"
                            target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="https://www.linkedin.com/in/abdulwahabdisu/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-4 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Explore</h4>
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-link" href="{{ route('home') }}">Home</a>
                            <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                            <a class="btn btn-link" href="{{ route('services') }}">Services</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-link" href="{{ route('food.menu') }}">Menu</a>
                            <a class="btn btn-link" href="{{ route('contact') }}">Contact</a>
                            @guest
                                <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                            @else
                                <a class="btn btn-link" href="{{ route('users.review.create') }}">Review</a>
                            @endguest
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Get In Touch</h4>
                    <p class="mb-3">
                        <i class="fa fa-phone-alt text-primary me-3"></i>
                        <a href="tel:+2347038558332" class="text-light">+2347038558332</a>
                    </p>
                    <p class="mb-3">
                        <i class="fa fa-envelope text-primary me-3"></i>
                        <a href="mailto:disuabdulwahab@gmsil.com" class="text-light">disuabdulwahab@gmsil.com</a>
                    </p>
                    <p class="mb-3">
                        <i class="fa fa-clock text-primary me-3"></i>
                        Mon-Sat: 9AM - 9PM | Sun: 10AM - 8PM
                    </p>
                    <a href="{{ route('home') }}#reservation" class="btn btn-primary px-4 py-2 mt-2">
                        <i class="fa fa-calendar-alt me-2"></i>Book a Table
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="container">
            <div class="copyright py-4">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <p class="mb-0">&copy; 2026 Coffeefy. Developed by Abdulwahab. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
