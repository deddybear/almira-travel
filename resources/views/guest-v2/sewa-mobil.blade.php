@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Sewa Mobil')

@section('banner-img', "/storage/images/" . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

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
                <input type="email" class="form-control" id="searchName" placeholder="&#xf031; Search Name"
                    style="font-family:Arial, FontAwesome">
            </div>
            <div class="col">
                <label for="searchCategory" class="form-label">Category</label>
                <input type="email" class="form-control" id="searchCategory" placeholder="&#xf682; Search Category"
                    style="font-family:Arial, FontAwesome">
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
            @if (count($mobil) > 0)
                @foreach ($mobil as $item)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-car">
                        <a href="/v2/mobil/desc/{{ $item->slug }}" class="text-decoration-none">
                            <div class="card">
                                <span class="badge text-bg-dark">{{ $item->tipe_mobil }}</span>
                                @if (count($item->photos) > 0)
                                    <img src="{{ asset('/storage/images/' . $item->photos[0]->path) }}"
                                        class="card-img-top h-25" alt="card-1">
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
@endsection
