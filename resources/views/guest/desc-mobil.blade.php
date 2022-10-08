@extends('layouts.guest')
@section('title',  $data->name . " Almira - Travel" )

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/desc/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/star-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/owl-carousel/owl.theme.default.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/plugins/sweetalert2/sweetalert2.js') }}"></script>
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
                    <a class="nav-link" id="foto-tab" data-toggle="tab" href="#foto" role="tab" aria-controls="foto" aria-selected="false">Foto</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                        <div class="card card-outline-gray p-3">
                            {!! $data->detail !!}
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
                </div>
                <div class="card my-5">
                    <h3 class="text-center tour-text p-3 border-bottom">
                        Tour Review
                    </h3>
                    <div class="card-body rounded-3 px-5 row border-bottom">
                        <div class="total-star mr-3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="align-middle mt-1">3.00 Based on 1 review</span>
                    </div>
                    <div class="tour-reviewer p-5 row border-bottom">
                        <div class="card ml-3 col-6 col-md-2">
                            <img src="{{ asset('/images/user.png') }}" class="card-img-top rounded-3" height="122" width="122">
                            <div class="card-body">
                                <span class="name-reviewer text-center align-middle align-items-center ml-2">Brandon</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-9 my-3">
                            <div class="overflow-hidden my-3">
                                <div class="total-star float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="float-right">Test</span>
                            </div>
                            <p>lorem ipsum dolor si amet</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="tour-text p-3">
                            Leave Review
                        </p>
                        <form id="form">
                            <input type="hidden" name="id" value={{ $data->review_id }}>
                            <div class="row ml-3 mb-3">
                                <div class="mr-3">Rating</div>
                                <div class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <textarea class="form-control" name="msg" cols="30" rows="10" placeholder="Silahkan Masuk Review Anda "></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Nama Anda">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email Anda">
                            </div>
                            <div class="form-group col-12 p-0">
                                <div class="captcha">
                                    {!! NoCaptcha::display() !!}
                                    {!! NoCaptcha::renderJs() !!}
                                </div>
                            </div>
                            <button class="btn btn-warning" type="submit"><b>Kirim</b></button>
                        </form>
                    </div>
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

