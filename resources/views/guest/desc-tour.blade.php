@extends('layouts.guest')
@section('title',  $data->name . " Almira - Travel" )

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/desc/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.theme.default.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('/pages/desc/script.js') }}"></script>
@endsection

@section('content')
<div class="row p-4">
    <div class="col-12 col-md-9">
        <ul class="nav nav-tabs nav-justified"  id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="trip-tab" data-toggle="tab" href="#trip" role="tab" aria-controls="trip" aria-selected="false">Trip Plan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="offer-tab" data-toggle="tab" href="#offer" role="tab" aria-controls="offer" aria-selected="false">Best Offer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="itinerary-tab" data-toggle="tab" href="#itinerary" role="tab" aria-controls="itinerary" aria-selected="false">Prepare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="foto-tab" data-toggle="tab" href="#foto" role="tab" aria-controls="foto" aria-selected="false">Foto</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <div class="card card-outline-gray p-3">
                    {!! $data->detail !!}
                </div>
            </div>
            <div class="tab-pane fade" id="trip" role="tabpanel" aria-labelledby="trip-tab">
                <div class="card card-outline-gray p-3">
                    {!! $data->trip_plan !!}
                </div>
            </div>
            <div class="tab-pane fade" id="offer" role="tabpanel" aria-labelledby="offer-tab">
                <div class="card card-outline-gray p-3">
                    {!! $data->best_offer !!}
                </div>
            </div>
            <div class="tab-pane fade" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                <div class="card card-outline-gray p-3">
                    {!! $data->prepare !!}
                </div>
            </div>
            <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                <div class="card card-outline-gray p-3">
                    <div class="carousel">
                        <div class="owl-carousel owl-theme">
                            @if (count($data->photos) > 0)
                                @foreach ($data->photos as $item)
                                    <div class="item text-center">
                                        <img class="show-img" src={{ asset('/storage/images/'. $item->path) }}>
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="item text-center">
                                        <img class="show-img" src="https://via.placeholder.com/500?text=Segera....." height="500">
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                <div class="card card-outline-gray p-3">
                  Placeholder content for the tab panel. This one relates to the home tab. Takes you miles high, so high, 'cause she’s got that one international smile. There's a stranger in my bed, there's a pounding in my head. Oh, no. In another life I would make you stay. ‘Cause I, I’m capable of anything. Suiting up for my crowning battle. Used to steal your parents' liquor and climb to the roof. Tone, tan fit and ready, turn it up cause its gettin' heavy. Her love is like a drug. I guess that I forgot I had a choice.
                </div>
            </div> --}}
        </div>
    </div>
    <div class="col-12 col-md-3 mt-5">
        <div class="card text-white bg-secondary mb-3">
              <div class="card-header text-center">
                <h3>Rp. {{ number_format($data->price, 0 ,',', '.') }},-</h3>
              </div>
              <div class="card-body">
                <p class="card-text text-center">Pesan Sekarang ! </p>
              </div>
        </div>
    </div>
</div>
@endsection