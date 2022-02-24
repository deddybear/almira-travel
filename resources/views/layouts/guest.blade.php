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

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

        
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/floating-button-wa.css') }}">    
    <link rel="stylesheet" href="{{ asset('/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/adminlte/adminlte.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/all.css') }}">
    @yield('css')

</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand mr-5" href="/">
                <img src="/images/logo.png" width="140" height="60" alt="logo" srcset="/images/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2 ">
                        <a class="nav-link {{ request()->is('/') ? 'posisi' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/paket-tour">Paket Tour</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/travel-reguler">Travel Reguler / Carter</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/sewa-mobil">Sewa Mobil</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/">Booking Tiket</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/contact">Kontak</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                    </li>
                    {{-- <li class="nav-item mx-2"></li>
                     <li class="nav-item mx-2">
                        <a class="nav-link {{ (request()->is('tentang-kami')) ? 'posisi' : '' }}"
                    href="/tentang-kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li> --}}

                    {{-- <li class="nav-item dropdown mx-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          Galeri
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/foto">Foto</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Video</a>
                        </div>
                     </li> --}}
                    {{-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                      <a class="nav-link disabled">Disabled</a>
                    </li> --}}
                </ul>
                {{-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form> --}}
            </div>
        </div>
    </nav>


    <section id="section">
        @yield('content')
        <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float-wa" target="_blank">
          <i class="fab fa-whatsapp"></i>
        </a>
    </section>

    <footer class="p-5 mt-5" style="background: #050A15">
        <div class="container text-white-50">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <img src="/images/logo.png" width="150" height="70" alt="logo" srcset="/images/logo.png">
                    <ul class="row list-unstyled">
                        <li class="col-12 col-md-6 text-white-50"><a href="">Beranda</a></li>
                        <li class="col-12 col-md-6 text-white-50"><a href="">Beranda</a></li>
                        <li class="col-12 col-md-6 text-white-50"><a href="">Beranda</a></li>
                        <li class="col-12 col-md-6 text-white-50"><a href="">Beranda</a></li>
                        <li class="col-12 col-md-6 text-white-50"><a href="">Beranda</a></li>
                        <li class="col-12 col-md-6 text-white-50"><a href="">Beranda</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mx-auto">
                    <h4><u>About We</u></h4>
                    <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum aliquid facilis.
                    </p>
                </div>
                <div class="col-md-4 mx-auto">
                    <h4><u>Social Media</u></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum aliquid facilis.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('/plugins/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('/plugins/popper.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('/plugins/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('/plugins/fontawesome/all.js') }}"></script>
{{-- <script src="{{ asset('/plugins/adminlte/adminlte.js') }}"></script> --}}
@yield('js')

</html>
