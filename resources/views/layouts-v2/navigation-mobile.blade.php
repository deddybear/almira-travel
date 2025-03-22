<nav id="navbar-mobile" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
    </div>
</nav>
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>List Menu</h3>
    </div>
    <ul class="list-unstyled components article">
        <li>
            <a class="navbar-brand" href="{{ route('home')}}">
                Homepage
            </a>
        </li>
        <li>
            <a class="navbar-brand" href="{{ route('paket_tour')}}">
                Paket Tour
            </a>
        </li>
        
        <li>
            <a class="navbar-brand" href="{{ route('tour_private')}}">
                Open Trip
            </a>
        </li>
        <li>
            <a class="navbar-brand" href="{{ route('travel-reguler')}}">
                Door to Door
            </a>
        </li>
        
        <li>
            <a class="navbar-brand" href="{{ route('sewa_mobil')}}">
                Sewa Mobil
            </a>
        </li>
        <li>
            <a class="navbar-brand" href="{{ route('galeri')}}">
                Gallery
            </a>
        </li>
        <li>
            <a class="navbar-brand" href="{{ route('kontak')}}">
                Contact
            </a>
        </li>
         <li>
             @if (request()->session()->has('username') && request()->session()->has('aktif') )
                <a class="article" href="{{ url('/panel-admin/dashboard') }}">Dashboard</a>
            @endif
         </li>
    </ul>
</nav>

