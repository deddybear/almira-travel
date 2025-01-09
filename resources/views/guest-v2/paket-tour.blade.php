@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Paket Tour')

@section('banner-img', '/images/Phra-Nang_1536886961.jpg')

@section('title-banner', 'Discovery Your Next Journey With Almira Travel')

@section('msg-banner',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis bibendum diam, ac commodo
    arcu. Nullam rutrum fermentum lorem bibendum placerat.')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/paket-tour/styles.css') }}">
@endsection

@section('js')
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
        <form action="#" class="row">
            <div class="col">
                <label for="searchLocation" class="form-label">Location</label>
                <input type="email" class="form-control" id="searchLocation" placeholder="&#xf002; Search Location" style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <label for="searchCategory" class="form-label">Category</label>
                <input type="email" class="form-control" id="searchCategory" placeholder="&#xf682 Search Category" style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <div class="float-center">
                    <div class="my-4-custom"></div>
                    <button type="button" class="btn btn-dark" id="searchButton">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="list-tour mt-5 p-5 container rounded-3">
        <div class="row">
            @for ($l = 0; $l < 8; $l++)
                <div class="col-xs-12 col-sm-6 col-md-3 mt-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset("/images/tour-". rand(1,4) .".jpg") }}" class="card-img-top h-25" alt="card-1">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
