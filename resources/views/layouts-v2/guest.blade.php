<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('rechapta')

    <title>@yield('title')</title>

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
    <link rel="icon" href="{{ asset('/images/icon/favicon-196x196.png')}}" type="image/png" sizes="196x196" />
    <link rel="icon" href="{{ asset('/images/icon/favicon-96x96.png')}}" type="image/png" sizes="96x96" />
    <link rel="icon" href="{{ asset('/images/icon/favicon-32x32.png')}}" type="image/png" sizes="32x32" />
    <link rel="icon" href="{{ asset('/images/icon/favicon-16x16.png')}}" type="image/png" sizes="16x16" />
    <link rel="icon" href="{{ asset('/images/icon/favicon-128.png')}}" type="image/png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    
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
    <link rel="stylesheet" href="{{ asset('/plugins/nav-mobile.css')}}">
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.css') }}">
    @yield('css')

</head>

<body>
    {{-- navbar desktop --}}

    <section class="position-relative" id="header" style="background-image: url('@yield('banner-img')')">

        @include('layouts-v2.navigation')
        {{-- navbar mobile --}}
        @include('layouts-v2.navigation-mobile')


        {{-- banner message --}}
        <div class="position-banner-msg p-2">
            <span class="msg-banner-1">
                @yield('title-banner')
            </span>
            <p>
                <span class="msg-banner-2">
                    @yield('msg-banner')
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

    <section class="spacing-content">
        @yield('content')
    </section>

    <footer class="footer background-footer">
        <div class="col-12">
            <h1 class="m-0">&nbsp;</h1>
            <h1 class="m-0">&nbsp;</h1>
            <h1 class="m-0">&nbsp;</h1>
            <h1 class="m-0">&nbsp;</h1>
            <h1 class="m-0">&nbsp;</h1>
        </div>
    </footer>
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
<script src="{{ asset('/plugins/navigation.js') }}"></script>
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
@yield('js')


</html>
