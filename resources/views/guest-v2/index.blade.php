@extends('layouts.guest-v2')

@section('title', 'Almira Travel - Home Page')

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
                    <a class="text-black text-decoration-none" href="#">
                        See All
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </span>
            </div>
        </div>

        <div class="list-car mt-5 p-5 rounded-3">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-1.png') }}" class="card-img-top h-25" alt="card-1">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-2.png') }}" class="card-img-top h-25" alt="card-2">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-3.png') }}" class="card-img-top h-25" alt="card-3">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-4.png') }}" class="card-img-top h-25" alt="card-4">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
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
                    <a class="text-black text-decoration-none" href="#">
                        See All
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </span>
            </div>
        </div>

        <div class="list-car mt-5 p-5 rounded-3">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-1.png') }}" class="card-img-top h-25" alt="card-1">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-2.png') }}" class="card-img-top h-25" alt="card-2">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-3.png') }}" class="card-img-top h-25" alt="card-3">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/images/vehicle-4.png') }}" class="card-img-top h-25" alt="card-4">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
