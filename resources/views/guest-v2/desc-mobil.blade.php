@extends('layouts-v2.guest')

@section('title',  $data->name . " Almira - Travel" )

@section('banner-img', "/storage/images/" . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

@section('rechapta')
    {!! htmlScriptTagJsApi() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/pages/guest/sewa-mobil/styles.css') }}">
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
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-pane" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="foto-tab" data-bs-toggle="tab" data-bs-target="#foto-pane" href="#foto" role="tab" aria-controls="foto" aria-selected="false">Foto</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail-pane" role="tabpanel" aria-labelledby="detail-tab">
                        <div class="card card-outline-gray p-3">
                            {!! $data->detail !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="foto-pane" role="tabpanel" aria-labelledby="foto-tab">
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
                    @if (count($data->reviews) > 0)
                    <div class="card-body rounded-3 px-5 row border-bottom">
                        {{-- Untuk Mencari Rating dari keseluruhan Review --}}
                        @php
                            $rating = 0;
                            $sumStar = 0;
                            $reviewers = count($data->reviews);
                        
                            foreach ($data->reviews as $key => $value) {
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
                    <div class="tour-reviewer p-5 row border-bottom">
                        @foreach ($data->reviews as $item)
                        <div class="card ml-3 col-6 col-md-2 mb-5">
                            <img src="{{ asset('/images/user.png') }}" class="card-img-top rounded-3" height="122" width="122">
                            <div class="card-body">
                                <span class="card-text name-reviewer text-center align-middle align-items-center">{{ $item->name }}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-9 my-3">
                            <div class="overflow-hidden my-3">
                                <div class="total-star float-left">
                                    @for ($i = 0; $i < $item->star; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                                @if (Auth::check())
                                    <span class="float-right ml-1"><a href="javascript:;" class="btn btn-sm btn-danger delete" data="{{ $item->id }}"><i class="fa-solid fa-trash-can"></i></a></span>
                                @endif                                
                                <span class="float-right mr-1">{{ date_format( $item->created_at, "F d, Y") }}</span>
                            </div>
                            <p>{{ $item->msg }}</p>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <h3 class="text-center tour-text p-3 border-bottom">
                        Belum Ada Review
                    </h3>
                    @endif
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
                                <textarea class="form-control mb-3" name="msg" cols="30" rows="10" placeholder="Silahkan Masuk Review Anda "></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control mb-3" type="text" name="name" placeholder="Nama Anda">
                            </div>
                            <div class="form-group">
                                <input class="form-control mb-3" type="email" name="email" placeholder="Email Anda">
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
                <div class="card text-white bg-secondary btn-grad-custome mb-3">
                    <a class="text-white no-decoration text-decoration-none" href="https://api.whatsapp.com/send?phone={{ $contact->wa }}&text=Hallo,%20saya%20ingin%20memesan%20mobil%20{{ $data->name }}.">
                        <div class="card-body text-center mx-auto text-black">
                              <h3 class="m-0">Pesan Sekarang !</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
@endsection

