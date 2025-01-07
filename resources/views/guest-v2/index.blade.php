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
            <div class="col-md-4" style="height:500px;background-color:black">

            </div>
            <div class="col-md-5">
                <div class="row mb-2">
                    <div class="col-md-2">
                        <p>A</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                        <p>B</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
