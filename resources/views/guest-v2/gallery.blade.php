@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Gallery')

@section('banner-img', "/images/Gallery.jpg")

@section('title-banner', 'Discovery Your Next Journey With Almira Travel')

@section('msg-banner', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/gallery/styles.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/plugins/masonry.pkgd.min.js')}}"></script>
    <script src="{{ asset('/pages/guest/gallery/script.js') }}"></script>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row section-gallery" data-masonry='{"percentPosition": true }'>
            @if (count($data) > 0)
                @foreach ($data as $item)
                        @foreach ($item->photos as $photo)
                        <div class="col-xs-12 col-sm-6 col-md-3 mt-3 item-gallery">
                            <div class="card">
                                <img src="{{ asset('/storage/images/' . $photo->path) }}" class="card-img-top rounded-2" alt="card-1">
                            </div>
                        </div>
                        @endforeach
                @endforeach
            @else
                @for ($i = 0; $i < 11; $i++)
                    <div class="col-xs-12 col-sm-6 col-md-3 mt-3 item-gallery">
                        <div class="card">
                            <img src="{{ asset("/images/tour-". rand(1,4) .".jpg") }}" class="card-img-top rounded-2" alt="card-1">
                        </div>
                    </div>
                @endfor
            @endif

        </div>
    </div>
@endsection