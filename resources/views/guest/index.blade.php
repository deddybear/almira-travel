@extends('layouts.guest')

@section('title', 'Almira Travel - Home Page')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/index/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.theme.default.css') }}">
    <style>
        .icon-selengkapnya {
            height: 1em !important;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('/pages/index/script.js') }}"></script>
@endsection

@section('content')
    <div class="carousel">
        <div class="owl-carousel owl-theme">
            @if (count($caraousel) > 0)
                @foreach ($caraousel as $item)
                <div class="item text-center px-5 py-3">
                    <img src={{ asset('/storage/images/'. $item->path) }} height="500">
                </div>
                @endforeach
            @else
                @for ($i = 0; $i < 5; $i++)
                <div class="item text-center">
                    <img src="https://via.placeholder.com/500?text=Segera....." height="500">
                </div>
                @endfor
            @endif
        </div>
    </div>

    <div class="col-12 col-lg-5 mx-auto">
        <div class="motto my-4">
            <div class="col-12">
                <h4 class="text-center title-motto m-0">CV. Almira Travel</h4>
                <h4 class="text-center title-desc">Sewa Mobil & Tur Professional</h4>
                <p class="text-center text-motto">
                    Kami adalah penyedia jasa dibidang layanan travel & transport yang telah berdiri sejak 2010,
                    dan sudah melayani ribuan <i>Client</i> pribadi, instansi perusahaan dan pemerintahan,
                    Almira Travel berkomitmen untuk terus memberikan pelayanan terbaik agar membuahkan hasil tingkat kepuasan dan kepercayaan pelanggan makin meningkat dari waktu ke waktu.
                </p>
            </div>
        </div>
    </div>

    <div class="list-packages my-4">
        <div class="container">
            <div class="row">
                @if (count($mobil) > 0)
                    @foreach ($mobil as $item)
                        <div class="col-12 col-md-6 col-lg-3 my-2">
                            <div class="card card-outline-gray">
                                @if (count($item->photos) > 0)
                                    <img class="card-img-top" src="{{ asset('/storage/images/' . $item->photos[0]->path) }}">
                                @else
                                    <img class="card-img-top" src="https://via.placeholder.com/500?text=Segera....">
                                @endif
                                <div class="card-body text-center" style="background-color: #D6E5FA">                
                                        <h5 class="card-title type-car">{{ $item->tipe_mobil }}</h5>
                                        <p class="card-text name-car">{{ $item->name }}</p>            
                                        <div class="text-center p-0 position-relative" style="height: 0">
                                            <a href="#" class="btn btn-dark btn-no-radius">Mulai Rp {{ number_format($item->price, 0 ,',', '.') }}/Hari</a>
                                        </div>                                
                                </div>
                                <div class="card-body my-3">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <a href="#" class="text-dark text-decoration-none">
                                                <i class="fas fa-users icon-selengkapnya"></i>
                                                <span>{{ $item->kursi }} Kursi</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="text-dark text-decoration-none">
                                                <i class="fas fa-cogs icon-selengkapnya"></i>
                                                <span>{{ $item->cc }} CC</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0 mb-2">
                                    <div class="row text-center mx-auto">
                                        <div class="col-6 p-0">
                                            <a href="#" class="btn btn-dark btn-keunggulan" style="width: 100%">
                                                <span>Keunggulan</span>
                                            </a>
                                        </div>
                                        <div class="col-6 p-0">
                                            <a href="#" class="btn btn-warning btn-sewa" style="width: 100%">
                                               <span>Sewa</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i <= 7; $i++)
                    <div class="col-12 col-md-6 col-lg-3 my-2">
                        <div class="card card-outline-gray">
                            <img class="card-img-top" src="https://via.placeholder.com/500?text=Segera">
                            <div class="card-body text-center" style="background-color: #D6E5FA">                
                                    <h5 class="card-title type-car">Segera</h5>
                                    <p class="card-text name-car">Segera Hadir</p>            
                                    <div class="text-center p-0 position-relative" style="height: 0">
                                        <a href="#" class="btn btn-dark btn-no-radius">Mulai Rp -/Hari</a>
                                    </div>                                
                            </div>
                            <div class="card-body my-3">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <i class="fas fa-users"></i>
                                            <span>- Kursi</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <i class="fas fa-cogs"></i>
                                            <span>- CC</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 mb-2">
                                <div class="row text-center mx-auto">
                                    <div class="col-6 p-0">
                                        <a href="#" class="btn btn-dark btn-keunggulan" style="width: 100%">
                                            <span>Keunggulan</span>
                                        </a>
                                    </div>
                                    <div class="col-6 p-0">
                                        <a href="#" class="btn btn-warning btn-sewa" style="width: 100%">
                                           <span>Sewa</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
            <a href="/sewa-mobil" class="btn btn-warning col-12 btn-large my-3">Lihat Selengkapnya</a>
        </div>
    </div>

    <div class="service-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="card">                        
                        <div class="card-body">
                          <h2 class="title-service">
                            <b>Kelebihan</b> dan <b>Keunggulan</b> Almira Travel
                          </h2>
                          <img src="https://via.placeholder.com/500?text=Picture" height="500" width="100%" alt="promo">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <h3 class="text-center">Kelebihan Layanan Kami</h3>
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                  <h3 class="card-title title-service">
                                    <div class="row px-3">
                                        <i class="fas fa-running" aria-hidden="true"></i>
                                        <p class="ml-3 card-title-service">Efektif & Efesien</p>
                                      </div>                               
                                  </h3>
                                  <p class="card-text">Almira Travel memberikan <i>Service</i> <b>Efektif & Efesien</b> untuk setiap pelanggan.</p>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                  <h3 class="card-title title-service">
                                      <div class="row px-3">
                                        <i class="fas fa-user-shield" aria-hidden="true"></i>
                                        <p class="ml-3 card-title-service">Aman & Nyaman</p>
                                      </div>
                                     
                                  </h3>
                                  <p class="card-text">Almira Travel berkomitmen memberikan <i>Service</i> <b>Aman & Nyaman</b> untuk anda.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="fas fa-clock" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">Tepat Waktu</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Kami memberikan <i>Service</i> <b>Tepat Waktu</b> agar pelanggan mendapatkan pengalaman terbaik.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">Best Price</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Kelebihan Almira Travel memberikan harga yang <b>Terjangkau dan Bersaing</b>.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="fas fa-car-side"  aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">Transportasi</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Pilihan <b>Trasportasi</b> dari Almira Travel yang sangat beragam, bervariatif dan paling lengkap.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="fas fa-user-tie" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">Profesional</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Almira Travel menjunjung tinggi terhadap <b>Profesional</b> agar mendapatkan pelayanan Tanggap & Memuaskan.</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jasa-section">
        <div class="col-12 background-svg position-relative text-center desc-jasa">
            <div class="container">
                <div class="p">
                    <p><b>Almira Travel</b></p>
                <h2 class="title-jasa">Ready <span class="text-primary">To Serve Your</span> Trip</h2>
                </div>
            </div>
        </div>
        <div class="container list-jasa my-4">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="card-img-top" src="{{ asset('/images/pickup.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Drop / Pickup</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Antar / Jemput</b></p>
                            <p class="card-text text-secondary text-card-jasa">Mengantar atau menjemput sesuai tujuan yang anda mau.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray" >
                        <img class="card-img-top" src="{{ asset('/images/special_event.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Special Event</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Acara Khusus</b></p>
                            <p class="card-text text-secondary text-card-jasa">Menyediakan service transport untuk acara kedinasan, instansi dan <i>corporate</i>.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="card-img-top" src="{{ asset('/images/dinas.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Government Trip</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Perjalanan Dinas</b></p>
                            <p class="card-text text-secondary text-card-jasa">Menyediakan service transport untuk dinas luar kota.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="card-img-top" src="{{ asset('/images/gathering.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Gathering</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Wisata Keluarga</b></p>
                            <p class="card-text text-secondary text-card-jasa">Service transport untuk <i>Family Ghatering</i> <i>Coporate Ghatering</i> <i>Dinas Ghatering</i>.</p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="booking-section">
        <div class="container p-0">
            <div class="row">
                <div class="col-12 col-lg-6 p-0">
                    <img class="img-booking" src="https://via.placeholder.com/585?text=CaraBooking" alt="">
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <div class="card card-how-to p-2">
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="far fa-check-circle"></i>
                                    </span>
                                    <div class="number"> 1. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title">Pilih Layanan Kami sesuai kebutuhan</h5>
                                    <p class="text-secondary text-how-desc text-sm">
                                        Memilih Layanan yang kami sediakan seperti Paket Tour atau Sewa Mobil dari website 
                                    </p>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="fas fa-bus"></i>                            
                                    </span>
                                    <div class="number"> 2. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title">Memilih Paket Tour / Mobil</h5>
                                    <p class="text-secondary text-how-desc">
                                        Memilih Paket Tour atau Mobil yang ingin anda pesan, sesuai deskripsi yang tertera di website, 
                                        dengan memilih item jika anda sudah yakin anda dapat menekan tombol <b>Pesan Sekarang</b>  
                                    </p>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="fas fa-map-marked-alt"></i>                                   
                                    </span>
                                    <div class="number"> 3. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title ">Penjemputan / Pengantaran</h5>
                                    <p class="text-secondary text-how-desc">
                                        Tim kami akan menjemput anda di tempat atau mengantarkan unit pesanan untuk sewa lepas kunci
                                    </p>
                                </div>
                            </div>  
                            <div class="row p-3">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="fas fa-smile-wink"></i>                                  
                                    </span>
                                    <div class="number"> 4. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title">Menikmati Layanan Kami</h5>
                                    <p class="text-secondary text-how-desc">
                                        Tim profesional kami akan memberikan pelayanan yang terbaik untuk anda, agar mendapatkan kenyamanan dan keamanan yang terbaik dari kami
                                    </p>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection