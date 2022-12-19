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
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/floating-button-wa.css') }}">    
    <link rel="stylesheet" href="{{ asset('/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/floating-button-ig.css') }}">  
    <link rel="stylesheet" href="{{ asset('/fontawesome/all.css') }}">
    @yield('css')

</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-blue-gradient">
        <div class="container">
            <a class="navbar-brand mr-5" href="/">
                <img src="/images/logo.png" width="140" height="60" alt="logo" srcset="/images/logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-warning">
                    <li class="nav-item mx-2 ">
                        <a class="nav-link {{ request()->is('/') ? 'posisi' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/paket-tour">Paket Tour</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/sewa-mobil">Sewa Mobil</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/gallery-photos">Gallery Photo</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/contact">Kontak</a>
                    </li>
                    <li class="nav-item mx-2"></li>
                    @if (Auth::check())
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <section id="section">
        @yield('content')
        <a href="https://api.whatsapp.com/send?phone={{ $contact->wa }}&text=Hallo,%20saya%20tertarik%20untuk%20memesan%20jasa%20dari%20Almira-Travel." class="float-wa" target="_blank">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.instagram.com/almiratranstourtravel.id/" class="float-ig" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
        <div class="p-5"></div>
    </section>
    
    <footer class="py-5 bg-orange-gradient-rev col-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <img class="mb-3" src="/images/logo.png" width="150" height="70" alt="logo" srcset="/images/logo.png">
                    <ul class="row list-unstyled">
                        <li class="col-12 col-md-6 mb-2"><a class="text-dark text-decoration-none underlineIfHover" href=""><b>Beranda</b></a></li>
                        <li class="col-12 col-md-6 mb-2"><a class="text-dark text-decoration-none underlineIfHover" href=""><b>Paket Tour</b></a></li>
                        <li class="col-12 col-md-6 mb-2"><a class="text-dark text-decoration-none underlineIfHover" href=""><b>Sewa Mobil</b></a></li>
                        <li class="col-12 col-md-6 mb-2"><a class="text-dark text-decoration-none underlineIfHover" href=""><b>Gallery Foto</b></a></li>
                        <li class="col-12 col-md-6 mb-2"><a class="text-dark text-decoration-none underlineIfHover" href=""><b>Kontak</b></a></li>
                    </ul>
                </div>
                <div class="col-md-4 mx-auto">
                    <h4>ABOUT US</h4>
                    <p class="text-sm text-justify">
                        Penyedia jasa bergerak dibidang travel dan transport, 
                        telah berdiri sejak 2010 dan sudah melayani ribuan Client. 
                        Almira Travel berkomitmen untuk terus memberikan pelayanan terbaik
                    </p>
                </div>
                <div class="col-md-4 mx-auto">
                    <h4>CONTACT US</h4>       
                        <a class="text-dark mx-2 col-12 row" href="https://api.whatsapp.com/send?phone={{ $contact->wa }}&text=Hallo,%20saya%20tertarik%20untuk%20memesan%20jasa%20dari%20Almira-Travel.">
                            <i class="fab fa-whatsapp icons-lg"></i>
                            <div class="ml-2 mt-1"> 
                                @php
                                    $number = str_replace('62', ' ', $contact->wa);
                                @endphp

                                +62 {{ trim(chunk_split($number, 4, ' ')) }}
                            </div>
                        </a>
   
                        <a class="text-dark mx-2 col-12 row" href="https://www.instagram.com/almiratranstourtravel.id/">
                            <i class="fab fa-instagram icons-lg"></i>
                            <div class="ml-2 mt-1">
                                almiratranstourtravel.id
                            </div>
                        </a>
   
                        <a class="text-dark mx-2 col-12 row" href="mailto:{{ $contact->email }}">
                            <i class="far fa-envelope icons-lg"></i>
                            <div class="ml-2 mt-1">{{ $contact->email }}</div>
                        </a>
   
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('/plugins/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('/plugins/popper.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('/plugins/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('/fontawesome/all.js') }}"></script>
@yield('js')

</html>
