@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Home Page')

@section('banner-img', '/storage/images/' . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/home/styles.css') }}">
@endsection

@section('js')
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
            <p>Deals for you !</p>
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
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-car">
                            <a href="/mobil/desc/{{ $item->slug }}" class="text-decoration-none">
                                <div class="card">
                                    <span class="badge text-bg-dark">{{ $item->tipe_mobil }}</span>
                                    @if (count($item->photos) > 0)
                                        <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                            class="card-img-top img-card-list-cust" alt="card-1">
                                    @else
                                        <img class="card-img-top" src="https://placehold.co/286x157?text=Soon...">
                                    @endif
                                    <div class="card-body body-tour">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col title-car">
                                                    {{ str_limit(strip_tags($item->name), 10) }}
                                                </div>
                                                <div class="col">
                                                    <div class="float-end desc-car rounded-4 px-2">
                                                        <i class="fa-solid fa-users"></i>
                                                        {{ $item->kursi }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i <= 7; $i++)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-car">
                            <div class="card">
                                <span class="badge text-bg-dark">...</span>
                                <img class="card-img-top" src="https://placehold.co/286x157?text=Soon...">
                                <div class="card-body body-tour">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col title-car">
                                                Segera
                                            </div>
                                            <div class="col">
                                                <div class="float-end desc-car rounded-4 px-2">
                                                    <i class="fa-solid fa-users"></i>
                                                    X
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            <p>Unforgettable adventure !</p>
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
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-tour">
                        <a href="/tour/desc/{{ $item->slug }}" class="text-decoration-none">
                            <div class="card">
                                <span class="badge text-bg-dark"> {{ $item->category }} </span>
                                @if (count($item->photos) > 0)
                                    <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                        class="card-img-top img-card-list-cust" alt="card-1">
                                @else
                                    <img class="card-img-top" src="https://placehold.co/286x161?text=Soon...">
                                @endif
                                <div class="card-body body-tour">
                                    <p class="mb-1 title-tour">{{ str_limit(strip_tags($item->name), 20) }}</p>
                                    <p class="mb-0 desc-tour">
                                        <i class="fa-solid fa-location-dot"></i>
                                        {{ $item->lokasi }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                @for ($l = 0; $l < 8; $l++)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-tour">
                        <div class="card">
                            <span class="badge text-bg-dark">...</span>
                            <img class="card-img-top" src="https://placehold.co/286x161?text=Soon......">
                            <div class="card-body body-tour">
                                <p class="mb-1 title-tour">...</p>
                                <p class="mb-0 desc-tour">
                                    <i class="fa-solid fa-location-dot"></i>
                                    ...
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>

    <div class="col-12 our-patner p-5 my-5">
        <div class="title-our-patner mt-2 mb-3 d-flex justify-content-center">
            <h1>
                Our Patner
            </h1>
        </div>
        <div class="container">
            <div class="row">
                @for ($j = 1; $j <= 3; $j++)
                    <div class="col-12 col-md-4">
                        <div class="justify-content-center">
                            <img class="mx-auto" src="{{ asset("/images/our-patner-$j.png") }}">
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
@endsection
