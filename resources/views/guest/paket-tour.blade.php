@extends('layouts.guest')

@section('title', 'Almira Travel - Paket Tour')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/paket-tour/styles.css') }}">
@endsection


@section('js')
@endsection

@section('content')
    <div class="text-center my-4">
        <div class="subtitle text-decoration-none mb-3 text-white">Paket Tour</div>
        <h3 class="primary text-white">Favorit</h3>
    </div>
    <div class="row p-4">
        @if (count($data) > 0)
            @foreach ($data as $item)
                <div class="col-12 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-top">
                            <img class="card-img-top" src="https://via.placeholder.com/500?text=Picture" width="360" height="240">
                            <div class="item-price">
                                <span class="item-price-badge">
                                    <bdi>
                                        <span>
                                            Rp{{ $item->price }}
                                        </span>
                                    </bdi>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->name }}</h5>
                          <p class="card-text text-secondary">
                            {{  str_limit(strip_tags($item->detail), 250)  }}
                            ....
                          </p>
                          <div class="go-to">
                            <a class="btn btn-primary col-5 mt-3 mx-auto" href="/tour/desc/{{ $item->slug }}">Selengkapnya <i class="fas fa-sign-in-alt"></i> </a>
                          </div>
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