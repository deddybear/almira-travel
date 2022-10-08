@extends('layouts.guest')

@section('title', 'Almira Travel - Gallery Foto')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/gallery/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.theme.default.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/pages/gallery/script.js') }}"></script>
@endsection

@section('content')
    <div class="py-4">
        <div class="my-5 text-center">
            <div class="subtitle text-decoration-none mb-3">Almira Travel</div>
            <h3 class="primary">Gallery Foto</h3>
        </div>
    </div>

    <div class="row p-4">
        @if (count($data) > 0)
            @foreach ($data as $item)
            <div class="col-12 col-md-3 mb-3">
                <div class="card">
                    @if (count($item->photos) > 0)
                        <div class="card-top">
                            <div class="carousel">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($item->photos as $photo)
                                        <div class="item">
                                            <img class="card-img-top" src="{{ asset('/storage/images/' . $photo->path) }}" width="360" height="240">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="card-top">
                                <img class="card-img-top" src="https://via.placeholder.com/500?text=Segera...." width="360" height="240">
                            </div>
                        @endif
                    <div class="card-body">
                      <h5 class="card-title text-center">{{ $item->name }}</h5>
                      <p class="card-text text-secondary text-center">
                        {{  str_limit(strip_tags($item->desc), 100)  }}
                      </p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            @for ($i = 0; $i < 8; $i++)
                <div class="col-12 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-top">
                            <img class="card-img-top" src="https://via.placeholder.com/500?text=Segera...." width="360" height="240">
                            <div class="item-price">
                                <span class="item-price-badge">
                                    <bdi>
                                        <span>
                                            Coming Soon
                                        </span>
                                    </bdi>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Coming Soon...</h5>
                          <p class="card-text text-secondary">Coming Soon....</p>
                        </div>
                    </div>
                </div>
            @endfor
        @endif
    </div>
@endsection