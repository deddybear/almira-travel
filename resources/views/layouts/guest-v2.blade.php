<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('rechapta')

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Francois+One&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/floating-button-wa.css') }}">
    <link rel="stylesheet" href="{{ asset('/pages/guest/styles.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-5.3.3/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/plugins/floating-button-ig.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/all.css') }}">
    @yield('css')

</head>

<body>
    <section class="position-relative" id="header"
        style="background-image: url('{{ asset('/images/landscape-nature-grass-field.jpg') }}')">

        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light py-2 navbar-custom-style">
            {{-- logo --}}
            <a class="navbar-brand mx-5" href="/">
                <img src="/images/logo.png" width="140" height="50" alt="logo" srcset="/images/logo.png">
            </a>

            {{-- tombol menu mobile --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- MENU MOBILE SIDE BAR -->


            {{-- menu --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-nav-custom-style">
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark {{ request()->is('/') ? 'posisi' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="/paket-tour">Paket Tour</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="/sewa-mobil">Sewa Mobil</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="/gallery-photos">Gallery</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="/contact">Contact</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item mx-1">
                            <a class="nav-link text-dark" href="/admin/dashboard">Dashboard</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        {{-- banner message --}}
        <div class="position-banner-msg p-2">
            <span class="msg-banner-1">
                Discovery Your Next Journey
                With Almira Travel
            </span>
            <p>
                <span class="msg-banner-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis
                    bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.
                </span>
        </div>

        {{-- card desc --}}
        <div class="position-relative" style="height: 400px;">
            <div class="position-absolute position-card-service translate-middle w-100">
                <div class="container stats-box">
                    <div class="row">
                        <!-- Statistik -->
                        <div class="col-6 col-md-3 text-center">
                            <div>
                                <div class="stat-number">5<span class="greenTea">+</span></div>
                                <div class="stat-label">Tahun Pelayanan</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <div>
                                <div class="stat-number">60<span class="greenTea">+</span></div>
                                <div class="stat-label">Armada Mobil</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <div>
                                <div class="stat-number">12<span class="greenTea">+</span></div>
                                <div class="stat-label">Driver Profesional</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <div>
                                <div class="stat-number">100<span class="greenTea">+</span></div>
                                <div class="stat-label">Customer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        @yield('content')
    </section>
</body>
<script src="{{ asset('/plugins/jquery-3.5.1.js') }}"></script>
{{-- <script src="{{ asset('/plugins/bootstrap/bootstrap.bundle.js') }}"></script> --}}
{{-- <script src="{{ asset('/plugins/bootstrap-5.3.3/bootstrap.bundle.js') }}"></script> --}}
{{-- <script src="{{ asset('/plugins/popper.min.js') }}"></script> --}}
<script src="{{ asset('/plugins/popper2.min.js') }}"></script>
{{-- <script src="{{ asset('/plugins/bootstrap/bootstrap.js') }}"></script> --}}
<script src="{{ asset('/plugins/bootstrap-5.3.3/bootstrap.js') }}"></script>
{{-- <script src="{{ asset('/plugins/owl-carousel/owl.carousel.js') }}"></script> --}}
<script src="{{ asset('/fontawesome/all.js') }}"></script>
@yield('js')


</html>
