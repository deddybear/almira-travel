@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Private Tour')

@section('banner-img', '/storage/images/' . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/private-tour/styles.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/pages/guest/private-tour/script.js') }}"></script>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
        <form id="formSearch" class="row">
            <div class="col">
                <label for="searchName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="searchName" placeholder="&#xf031; Name Location"
                    style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <label for="searchLocation" class="form-label">Location</label>
                <input type="text" name="lokasi" class="form-control" id="searchLocation"
                    placeholder="&#xf002; Search Location" style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <label for="searchCategory" class="form-label">Category</label>
                <input type="text" name="category" class="form-control" id="searchCategory"
                    placeholder="&#xf682 Search Category" style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <div class="float-center">
                    <div class="my-4-custom"></div>
                    <button type="submit" class="btn btn-dark" id="searchButton">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="list-tour mt-5 p-5 container rounded-3">
        <div id="button-pagination">
            <div class="float-end">
                <div class="row">
                    <button class="col-5 button-prev border rounded-pill mx-1 back" style=" background-color: #798777;" onclick="fetchData('back')">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button class="col-5 button-next border rounded-pill mx-1 next" style=" background-color: #798777;" onclick="fetchData('next')">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row my-5" id="list-data">
            {{-- @if (count($tour) > 0)
                @foreach ($tour as $item)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-tour">
                        <a href="/tour/desc/{{ $item->slug }}" class="text-decoration-none">
                            <div class="card">
                                <span class="badge text-bg-dark"> {{ $item->category }} </span>
                                @if (count($item->photos) > 0)
                                    <img src="{{ asset("/storage/images/". $item->photos[0]->path) }}" class="card-img-top img-card-list-cust" alt="card-1">
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
                <h1 class="text-center">Coming Soon...</h1>
            @endif --}}
        </div>
    </div>
@endsection
