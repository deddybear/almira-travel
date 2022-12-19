@extends('layouts.guest')

@section('title', 'Almira Travel - Travel Reguler / Carter')

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/paket-tour/styles.css') }}">
@endsection


@section('js')
@endsection

@section('content')
<div class="py-4">
    <div class="my-4 text-center ">
        <div class="subtitle text-decoration-none mb-3">Almira Travel</div>
        <h3 class="primary">Paket Sewa Mobil</h3>
    </div>
</div>

<div class="row p-4">
    {{-- @dd($data) --}}
    @if (count($data) > 0)
        @foreach ($data as $item)
            <div class="col-12 col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-top">
                        @if (count($item->photos) > 0)
                            <img class="card-img-top" src="{{ asset('/storage/images/' . $item->photos[0]->path) }}" width="360" height="240">
                        @else
                            <img class="card-img-top" src="https://via.placeholder.com/500?text=Segera...." width="360" height="240">
                        @endif
                        <div class="item-price">
                            <span class="item-price-badge">
                                <bdi>
                                    <span>
                                        Rp {{ number_format($item->price, 0 ,',', '.') }}
                                    </span>
                                </bdi>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->name }}</h5>
                      <p class="card-text text-secondary">
                        {{  str_limit(strip_tags($item->detail), 100)  }}
                      </p>
                      <br>
                      @if (count($item->reviews) > 0)
                          <div class="card-body rounded-3 row">
                              {{-- Untuk Mencari Rating dari keseluruhan Review --}}
                              @php
                                  $rating = 0;
                                  $sumStar = 0;
                                  $reviewers = count($item->reviews);

                                  foreach ($item->reviews as $key => $value) {
                                      $sumStar += $value->star;
                                  }
                              
                                  $rating = $sumStar / $reviewers;
                              @endphp
                              <div class="total-star mr-3">
                                  @for ($i = 0; $i < $rating; $i++)
                                      <i class="fa fa-star"></i>
                                  @endfor
                              </div>
                              <span class="align-middle mt-1">{{ floor($rating)}} Based on {{ $reviewers }} review</span>
                          </div>
                      @else 
                        <h4 class="tour-text text-muted">
                          Belum Ada Review
                        </h4>
                      @endif
                      <div class="go-to">
                        <a class="btn btn-primary col-lg-7 col-md-6 col-12 mt-3 mx-auto" href="/mobil/desc/{{ $item->slug }}">Selengkapnya <i class="fas fa-sign-in-alt icon-selengkapnya"></i> </a>
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