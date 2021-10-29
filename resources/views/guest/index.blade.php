@extends('layouts.guest')

@section('title', 'Hehee Test')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/index/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.theme.default.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('/pages/index/script.js') }}"></script>
@endsection

@section('content')
    <div class="carousel my-4">
        <div class="owl-carousel owl-theme">
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar</h4></div>
            <div class="item text-center"><h4>ini gambar0</h4></div>
            <div class="item text-center"><h4>ini gambar1</h4></div>
            <div class="item text-center"><h4>ini gambar2</h4></div>
        </div>
    </div>

    <div class="motto my-4">
        <div class="col-12">
            <h4 class="text-center">Isi Motto Perusahaan</h4>
        </div>
    </div>

    <div class="list-packages my-4">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i <= 7; $i++)
                <div class="col-12 col-md-6 col-lg-3 my-2">
                    <div class="card">
                        <img src="/images/mobil-1.png" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Title Product</h5>
                            <p class="card-text">Deskripsi....</p>
                            <a href="#" class="card-link btn btn-primary">Lihat</a>
                            <a href="#" class="card-link btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <a href="http://" class="btn btn-info col-12 btn-large my-3">Lihat Selengkapnya</a>
        </div>
    </div>

@endsection