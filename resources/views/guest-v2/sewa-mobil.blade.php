@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Sewa Mobil')

@section('banner-img', "/images/Car-Rentals-1.png")

@section('title-banner', 'Discovery Your Next Journey With Almira Travel')

@section('msg-banner', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/sewa-mobil/styles.css') }}">
@endsection

@section('js')
@endsection

@section('content')
<div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
    <form action="#" class="row">
        <div class="col">
            <label for="searchName" class="form-label">Name</label>
            <input type="email" class="form-control" id="searchName" placeholder="&#xf031; Search Name" style="font-family:Arial, FontAwesome">
        </div>
        <div class="col">
            <label for="searchCategory" class="form-label">Category</label>
            <input type="email" class="form-control" id="searchCategory" placeholder="&#xf682; Search Category" style="font-family:Arial, FontAwesome">
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

<div class="list-car mt-5 p-5 container rounded-3">
    <div class="row">
        @for ($i = 0; $i < 8; $i++)
        <div class="col-xs-12 col-sm-6 col-md-3 mt-2">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset("/images/vehicle-". rand(1,4) .".png") }}" class="card-img-top h-25" alt="card-1">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
        @endfor
    </div>
</div>
@endsection