@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Home Page')

@section('banner-img', '/storage/images/' . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/home/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/animate.min.css') }}">
@endsection

@section('js')
    {{-- <script src="{{ asset('/plugins/mansory.pkgd.js')}}"></script> --}}
    <script src="{{ asset('/pages/guest/home/script.js') }}"></script>
@endsection

@section('content')
    <div class="welcome-desc px-2 mb-5 d-flex justify-content-center">
        <p class="text-center">Welcome to Almira Travel,
            <span class="font-200 opacity-50">
                your trusted patner in exploring Indonesia’s breathaking landscapes and rich cultural
                heritage. Whetever you’re seeking relaxtion on pristine beaches or thrilling adventures in the mountains, we
                offer a wide variety of tour packages to suit your prefences.
            </span>
        </p>
    </div>
    <div class="service-desc px-2 mt-3 text-center">
        <p class="font-800 m-0">
            What Services we provide to our customers.
        </p>
        <p class="opacity-50">Find trips that fit a flexible lifestyle.</p>
    </div>
    <div class="service-img container py-3 mt-5">
        <div class="row gap-5">
            <div class="col-md-6 rounded-4 service-1">
                <span class="badge text-bg-dark">Accommondation</span>
            </div>
            <div class="col-md-5">
                <div class="row mb-2">
                    <div class="col-md-6 rounded-4 service-2">
                        <span class="badge text-bg-dark">Tour Travel</span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 rounded-4 service-3">
                        <span class="badge text-bg-dark">Car Rental</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="car-section mt-5 container p-0">
        <div class="title-car mb-5">
            <div class="title-car-section">
                <h1>Ready exclusive vehicle</h1>
            </div>
            <p>Our service rent car ready to you !</p>
            <div class="float-end border rounded-pill button-see-all px-1">
                <span class="m-2 fw-bold">
                    <a class="text-black text-decoration-none" href="{{ route('sewa_mobil') }}">
                        See All
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </span>
            </div>
        </div>

        <div class="list-car mt-5 p-5 rounded-3">
            <div class="row">
                @if (count($mobil) > 0)
                    @foreach ($mobil as $item)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-car">
                            <a href="/sewa-mobil/desc/{{ $item->slug }}" class="text-decoration-none">
                                <div class="card p-1">
                                    <span class="badge text-bg-dark">{{ $item->tipe_mobil }}</span>
                                    @if (count($item->photos) > 0)
                                        <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                            class="card-img-top img-card-list-cust rounded" alt="card-1">
                                    @else
                                        <img class="card-img-top rounded" src="https://placehold.co/286x157?text=Soon...">
                                    @endif
                                    <div class="card-body body-tour">
                                        <div class="mb-2">
                                            {{ str_limit(strip_tags($item->name), 20) }}
                                        </div>
                                        <div class="rounded-2">
                                            Seat : {{ $item->kursi }}
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                        <div class="row mt-2 gap-4">
                                            <div class="col-6 price pe-0 my-auto bg-blue-sea">
                                                Rp. <b style="font-weight: 600">{{ number_format($item->price, 0 ,',', '.') }}</b>/Day
                                            </div>
                                            <div class="col-4 justify-content-end btn-grad-custome my-auto">Book Now</div>
                                        </div>
                                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i <= 7; $i++)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-car">
                            <div class="card">
                                <span class="badge text-bg-dark">...</span>
                                <img class="card-img-top" src="https://placehold.co/286x157?text=Soon...">
                                <div class="card-body body-tour">
                                    <h1 class="text-center mt-3">Soon</h1>
                                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>

    <div class="car-section mt-5 container p-0">
        <div class="title-car mb-5">
            <div class="title-car-section">
                <h1>Discover your destination</h1>
            </div>
            <p>Our Service tour package, make your journey unforgettable !</p>
            <div class="float-end border rounded-pill button-see-all px-1">
                <span class="m-2 fw-bold">
                    <a class="text-black text-decoration-none" href="{{ route('paket_tour') }}">
                        See All
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <div class="list-tour mt-5 p-5 container rounded-3">
        <div class="row">
            @if (count($tour) > 0)
                @foreach ($tour as $item)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-tour">
                        <a href="/paket-tour/desc/{{ $item->slug }}" class="text-decoration-none">
                            <div class="card p-1">
                                <span class="badge text-bg-dark"> {{ $item->category }} </span>
                                @if (count($item->photos) > 0)
                                    <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                        class="img-card-list-cust rounded" alt="card-1">
                                @else
                                    <img class="rounded" src="https://placehold.co/286x161?text=Soon...">
                                @endif
                                <div class="card-body body-tour">
                                    <div class="mb-2">
                                        {{ str_limit(strip_tags($item->name), 20) }}
                                    </div>
                                    <div class="rounded-2">
                                        Location : {{ $item->Location }}<sup><i class="fa-solid fa-location-dot"></i></sup>
                                    </div>
                                    <div class="row mt-2 gap-4">
                                        <div class="col-6 price pe-0 my-auto bg-blue-sea">
                                            Rp. <b style="font-weight: 600">{{ number_format($item->price, 0 ,',', '.') }}</b>/Day
                                        </div>
                                        <div class="col-4 btn-grad-custome my-auto" style="margin: 3px !important">Book Now</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                @for ($l = 0; $l < 8; $l++)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-car">
                        <div class="card">
                            <span class="badge text-bg-dark">...</span>
                            <img class="card-img-top" src="https://placehold.co/286x157?text=Soon...">
                            <div class="card-body body-tour">
                                <h1 class="text-center mt-3">Soon</h1>
                                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>

    {{-- ! In Development --}}
    @if (env('APP_ENV') == 'local')
        <div class="car-section mt-5 container p-0">
            <div class="title-car mb-5">
                <div class="title-car-section">
                    <h1>Ready tour private</h1>
                </div>
                <p>Our Service private tour, make your journey unforgettable !</p>
                <div class="float-end border rounded-pill button-see-all px-1">
                    <span class="m-2 fw-bold">
                        <a class="text-black text-decoration-none" href="{{ route('paket_tour') }}">
                            See All
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <div class="list-tour mt-5 p-5 container rounded-3">
            <div class="row ">
                @if (count($tourPrivate) > 0)
                    @foreach ($tourPrivate as $item)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-tour">
                        <a href="/tour-private/desc/{{ $item->slug }}" class="text-decoration-none">
                            <div class="card p-1">
                                <span class="badge text-bg-dark"> {{ $item->category }} </span>
                                @if (count($item->photos) > 0)
                                    <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                        class="img-card-list-cust rounded" alt="card-1">
                                @else
                                    <img class="rounded" src="https://placehold.co/286x161?text=Soon...">
                                @endif
                                <div class="card-body body-tour">
                                    <div class="mb-2">
                                        {{ str_limit(strip_tags($item->name), 20) }}
                                    </div>
                                    <div class="rounded-2">
                                        Location : {{ $item->Location }}<sup><i class="fa-solid fa-location-dot"></i></sup>
                                    </div>
                                    <div class="row mt-2 gap-4">
                                        <div class="col-6 price pe-0 my-auto bg-blue-sea">
                                            Rp. <b style="font-weight: 600">{{ number_format($item->price, 0 ,',', '.') }}</b>/Day
                                        </div>
                                        <div class="col-4 btn-grad-custome my-auto" style="margin: 3px !important">Book Now</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else
                    @for ($l = 0; $l < 8; $l++)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-car">
                            <div class="card">
                                <span class="badge text-bg-dark">...</span>
                                <img class="card-img-top" src="https://placehold.co/286x157?text=Soon...">
                                <div class="card-body body-tour">
                                    <h1 class="text-center mt-3">Soon</h1>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>

        <div class="car-section mt-5 container p-0">
            <div class="title-car mb-5">
                <div class="title-car-section">
                    <h1>Ready package travel</h1>
                </div>
                <p>Our Travel Service, make your journey unforgettable !</p>
                <div class="float-end border rounded-pill button-see-all px-1">
                    <span class="m-2 fw-bold">
                        <a class="text-black text-decoration-none" href="{{ route('paket_tour') }}">
                            See All
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <div class="list-tour mt-5 p-5 container rounded-3">
            <div class="row">
                @if (count($travelReguler) > 0)
                    @foreach ($travelReguler as $item)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-tour">
                            <a href="/travel-reguler/desc/{{ $item->slug }}" class="text-decoration-none">
                                <div class="card p-1">
                                    <span class="badge text-bg-dark">{{ $item->category }}</span>
                                    @if (count($item->photos) > 0)
                                        <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                            class="img-card-list-cust rounded" alt="card-1">
                                    @else
                                        <img class="rounded" src="https://placehold.co/286x161?text=Soon...">
                                    @endif
                                    <div class="card-body body-tour">
                                        <div class="mb-2">
                                            {{ str_limit(strip_tags($item->name), 20) }}
                                        </div>
                                        <div class="rounded-2">
                                            Location : {{ $item->lokasi }}<sup><i class="fa-solid fa-location-dot"></i></sup>
                                        </div>
                                        <div class="row mt-2 gap-4">
                                            <div class="col-6 price pe-0 my-auto bg-blue-sea">
                                                Rp. <b style="font-weight: 600">{{ number_format($item->price, 0 ,',', '.') }}</b>/Day
                                            </div>
                                            <div class="col-4 btn-grad-custome my-auto" style="margin: 3px !important">Book Now</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    @for ($l = 0; $l < 8; $l++)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4 card-car">
                            <div class="card">
                                <span class="badge text-bg-dark">...</span>
                                <img class="card-img-top" src="https://placehold.co/286x157?text=Soon...">
                                <div class="card-body body-tour">
                                    <h1 class="text-center mt-3">Soon</h1>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    @endif
    {{-- ! In Development --}}

    <div class="service-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="card">                        
                        <div class="card-body">
                          <h2 class="text-center">
                            <b>Kelebihan</b> dan <b>Keunggulan</b>
                            <br>
                            Almira Travel
                          </h2>
                          <img src="{{ asset('/images/1.jpg') }}" height="500" width="100%" alt="promo">
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
                                        <p class="ml-3 card-title-service"> <i class="fa-solid fa-clock"></i> Efektif & Efesien</p>
                                    </div>                               
                                  </h3>
                                  <p class="card-text p-2">Almira Travel memberikan <i>Service</i> <b>Efektif & Efesien</b> untuk setiap pelanggan.</p>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body sha">
                                  <h3 class="card-title title-service">
                                      <div class="row px-3">
                                        <p class="ml-3 card-title-service"><i class="fa-solid fa-shield" aria-hidden="true"></i> Aman & Nyaman</p>
                                      </div>                                     
                                  </h3>
                                  <p class="card-text p-2">Almira Travel berkomitmen memberikan <i>Service</i> <b>Aman & Nyaman</b> untuk anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <p class="ml-3 card-title-service"><i class="fa-solid fa-bullseye"></i> Tepat Waktu</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text p-2">Kami memberikan <i>Service</i> <b>Tepat Waktu</b> agar pelanggan mendapatkan pengalaman terbaik.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <p class="ml-3 card-title-service"><i class="fa-solid fa-hand-holding-dollar"></i> Best Price</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text p-2">Kelebihan Almira Travel memberikan harga yang <b>Terjangkau dan Bersaing</b>.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <p class="ml-3 card-title-service"><i class="fa-solid fa-car-side"></i> Transportasi</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text p-2">Pilihan <b>Trasportasi</b> dari Almira Travel yang sangat beragam, bervariatif dan paling lengkap.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <p class="ml-3 card-title-service"><i class="fa-solid fa-user-tie"></i> Profesional</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text p-2">Almira Travel menjunjung tinggi terhadap <b>Profesional</b> agar mendapatkan pelayanan Tanggap & Memuaskan.</p>
                                  
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
                <h2 class="title-jasa">Ready <b class="text-primary">To Serve Your</b> Trip</h2>
                </div>
            </div>
        </div>
        <div class="container list-jasa my-4">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="" src="{{ asset('/images/pickup.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Drop / Pickup</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Antar / Jemput</b></p>
                            <p class="card-text text-secondary text-card-jasa">Mengantar atau menjemput sesuai tujuan yang anda mau.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray" >
                        <img class="" src="{{ asset('/images/special_event.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Special Event</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Acara Khusus</b></p>
                            <p class="card-text text-secondary text-card-jasa">Menyediakan service transport untuk acara kedinasan, instansi dan <i>corporate</i>.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="" src="{{ asset('/images/dinas.jpg') }}" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa mb-0">Government Trip</h5>
                            <p class="card-text text-secondary text-card-jasa"><b>Perjalanan Dinas</b></p>
                            <p class="card-text text-secondary text-card-jasa">Menyediakan service transport untuk dinas luar kota.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="" src="{{ asset('/images/gathering.jpg') }}" height="180">
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

    <div class="booking-section mb-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-12 col-lg-6 p-0">
                    <img class="img-booking" src="{{ asset('/images/2.jpg') }}" alt="cara-booking">
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
