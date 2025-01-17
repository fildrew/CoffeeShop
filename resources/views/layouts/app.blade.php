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

    <!-- MY FILES -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href=""{{ url('/') }}> Caffé <small>Valsamoggia</small></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="{{ route('products.menu') }}" class="nav-link">Menu</a></li>
                        <li class="nav-item"><a href="{{ route('services') }}" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>

                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        @if(isset(Auth::user()->id))
                            <li class="nav-item cart"><a href="{{ route('cart') }}" class="nav-link"><span class="icon icon-shopping_cart"></span></a>
                        @endif
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item"><a href="login.html" class="nav-link">login</a></li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item"><a href="register.html" class="nav-link">register</a></li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('users.orders') }}">
                                            My Orders
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.bookings') }}">
                                            My Bookings
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">About Us</h2>
                <p>Storico bar del centro storico di Valsamoggia, rinomato per la specialità invernale: la cioccolata in tazza con panna. Un locale intimo, con una saletta interna a due piani, tipica dei locali di una volta, che invoglia a fermarsi. Dotato di una saletta superiore con aria condizionata e di tavolini sotto al portico su via
                    Saragozza . Colazioni, pranzi ed aperitivi e tanto altro!</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Recent Blog</h2>
                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                    <div class="text">
                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                    </div>
                    </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                    <div class="text">
                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                <h2 class="ftco-heading-2">Services</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Cooked</a></li>
                    <li><a href="#" class="py-2 d-block">Deliver</a></li>
                    <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                    <li><a href="#" class="py-2 d-block">Mixed</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                    <ul>
                        <li><span class="icon icon-map-marker"></span><span class="text">Via Saragozza 37, 40053,Valsamoggia(BO)</span></li>
                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+39 327 289 2114</span></a></li>
                        <li><a href="#"><span class="icon icon-envelope"></span><span class="text">cafèvalsamoggia@gmail.com</span></a></li>
                    </ul>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-white">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Cafè Valsamoggia</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
