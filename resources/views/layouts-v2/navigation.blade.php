        {{-- navbar --}}
        {{-- <nav class="navbar navbar-expand-lg navbar-light py-2 navbar-custom-style desk_navbar {{ request()->is('sewa-mobil') || request()->is('travel-reguler') ? 'bg-secondary bg-opacity-50' : '' }}"> --}}
        <nav class="navbar navbar-expand-lg navbar-light py-2 navbar-custom-style desk_navbar bg-secondary bg-opacity-50">
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
                        <a class="nav-link text-dark {{ request()->is('/') ? 'posisi' : '' }}" href="{{ route('home')}}">Home</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="{{ route('paket_tour') }}">Paket Tour</a>
                    </li>
                    {{-- <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="{{ route('tour_private') }}">Tour Private</a>
                    </li> --}}
                    {{-- <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="{{ route('travel-reguler') }}">Travel Reguler</a>
                    </li> --}}
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="{{ route('sewa_mobil') }}">Sewa Mobil</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="{{ route('galeri') }}">Gallery</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-dark" href="{{ route('kontak') }}">Contact</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item mx-1">
                            <a class="nav-link text-dark" href="/admin/dashboard">Dashboard</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
