@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Sewa Mobil')

@section('banner-img', "/storage/images/" . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/sewa-mobil/styles.css') }}">
@endsection

@section('js')
<script src="{{ asset('/pages/guest/sewa-mobil/script.js') }}"></script>
@endsection

@section('content')
    <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
        <form action="#" id="formSearch" class="row">
            <div class="col">
                <label for="searchName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="searchName" placeholder="&#xf031; Search Name"
                    style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <label for="searchCategory" class="form-label">Category</label>
                <input type="text" name="tipe_mobil" class="form-control" id="searchCategory" placeholder="&#xf682; Search Category"
                    style="font-family:Arial, FontAwesome">
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

    <div class="list-car mt-5 p-5 container rounded-3">
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
            
            {{-- @if (count($mobil) > 0)
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
                            </div>
                        </div>
                    </div>
                @endfor
            @endif --}}
        </div>
    </div>
@endsection
