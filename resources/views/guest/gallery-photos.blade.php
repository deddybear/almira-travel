@extends('layouts.guest')

@section('title', 'Almira Travel - Travel Reguler / Carter')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/paket-tour/styles.css') }}">
@endsection


@section('js')
@endsection

@section('content')
    <div class="my-4 py-4 text-center">
        <div class="subtitle text-decoration-none mb-3 ">Almira Travel</div>
        <h3 class="primary ">Gallery Foto</h3>
    </div>

    <div class="row p-4">
        @if (count($data) > 0)
            @foreach ($data as $item)
            <div class="col-12 col-md-3 mb-3">
                <div class="card">
                    <div class="card-top">
                        @if (count($item->photos) > 0)
                            <img class="card-img-top" src="{{ asset('/storage/images/' . $item->photos[0]->path) }}" width="360" height="240">
                        @else
                            <img class="card-img-top" src="https://via.placeholder.com/500?text=Segera...." width="360" height="240">
                        @endif
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->name }}</h5>
                      <p class="card-text text-secondary">
                        {{  str_limit(strip_tags($item->desc), 100)  }}
                      </p>
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