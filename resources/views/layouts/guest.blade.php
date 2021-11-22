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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        #section {
            margin-top: 4.5rem !important;
        }
        .pull-left {
            float: left !important;
        }
        .pull-right {
            float: right !important;
        }
        .breadcrumb {
            background-color: #CEE5D0 !important;
            border-radius: 0 !important;
        }
        .logo-brand {
            
        }
        body {
            background: #f4f6f9 !important;
        }
    </style>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/adminlte/adminlte.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/all.css') }}">
    @yield('css')

</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img class="logo-brand" src="/images/logo.png" width="120" height="50" alt="logo" srcset="/images/logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item mx-3">
                       <a class="nav-link" href="/">Beranda</a>
                     </li>
                     <li class="nav-item mx-3">
                       <a class="nav-link" href="/about">Tentang Kami</a>
                     </li>
                     <li class="nav-item dropdown mx-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          Galeri
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/foto">Foto</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Video</a>
                        </div>
                     </li>
                     <li class="nav-item mx-3">
                         <a class="nav-link" href="/contact">Hubungi Kami</a>
                     </li>
                     <li class="nav-item mx-3">
                         <a class="nav-link" href="#">Dashboard</a>
                     </li>

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
    </header>

    <section id="section">
        @yield('content')
    </section>

    <footer class="p-5 mt-5" style="background: #FFBF86">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <h4><u>Menu 1</u></h4>
                    <ul class="row list-unstyled">
                        <li class="col-6"><a href="">Beranda</a></li>
                        <li class="col-6"><a href="">Beranda</a></li>
                        <li class="col-6"><a href="">Beranda</a></li>
                        <li class="col-6"><a href="">Beranda</a></li>
                        <li class="col-6"><a href="">Beranda</a></li>
                        <li class="col-6"><a href="">Beranda</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mx-auto">
                    <h4><u>About We</u></h4>
                    <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum aliquid facilis.</p>
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