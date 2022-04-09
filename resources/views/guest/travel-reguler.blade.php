@extends('layouts.guest')

@section('title', 'Almira Travel - Travel Reguler / Carter')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/paket-tour/styles.css') }}">
@endsection


@section('js')
@endsection

@section('content')
<div class="my-4 text-center">
    <div class="subtitle text-decoration-none mb-3 text-white">Travel Reguler atau Carter</div>
    <h3 class="primary text-white">Favorit</h3>
</div>
<div class="row p-4">
    @for ($i = 0; $i < 15; $i++)
        <div class="col-12 col-md-3 mb-3">
            <div class="card">
                <div class="card-top">
                    <img class="card-img-top" src="https://via.placeholder.com/500?text=Picture" width="360" height="240">
                    <div class="item-price">
                        <span class="item-price-badge">
                            <bdi>
                                <span>
                                    Rp300.000
                                </span>
                            </bdi>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">lorem ipsum dolor si amet</h5>
                  <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <div class="go-to">
                    <a class="btn btn-primary col-6 mt-3 mx-auto" href="/desc">Selengkapnya <i class="fas fa-sign-in-alt"></i> </a>
                  </div>
                </div>
            </div>
        </div>
    @endfor
</div>
@endsection