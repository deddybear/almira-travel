@extends('layouts.guest')

@section('title', 'Almira Travel - Home Page')

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
    <div class="carousel">
        <div class="owl-carousel owl-theme">
            @for ($i = 0; $i < 5; $i++)
                <div class="item text-center">
                    <img src="https://via.placeholder.com/500?text=Picture" height="500">
                </div>
            @endfor          
        </div>
    </div>

    <div class="col-12 col-lg-5 mx-auto">
        <div class="motto my-4">
            <div class="col-12">
                <h4 class="text-center title-motto m-0">CV. Almira Travel</h4>
                <h4 class="text-center title-desc text-white">Sewa Mobil & Tur Professional</h4>
                <p class="text-center text-motto text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, sunt non consequuntur, error minima eos 
                    debitis assumenda omnis rerum in quam soluta accusantium temporibus recusandae deleniti porro necessitatibus expedita est?</p>
            </div>
        </div>
    </div>

    <div class="list-packages my-4">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i <= 7; $i++)
                <div class="col-12 col-md-6 col-lg-3 my-2">
                    <div class="card card-outline-gray">
                        <img src="/images/mobil-1.png" alt="">
                        <div class="card-body text-center" style="background-color: #D6E5FA">                
                                <h5 class="card-title type-car">Mobil Mewah</h5>
                                <p class="card-text name-car">Alpard</p>            
                                <div class="text-center p-0 position-relative" style="height: 0">
                                    <a href="#" class="btn btn-dark btn-no-radius">Mulai Rp 1jt/Hari</a>
                                </div>                                
                        </div>
                        <div class="card-body my-3">
                            <div class="row text-center">
                                <div class="col-6">
                                    <a href="#" class="text-dark text-decoration-none">
                                        <i class="fas fa-users"></i>
                                        <span>7 Kursi</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="text-dark text-decoration-none">
                                        <i class="fas fa-cogs"></i>
                                        <span>3500 CC</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 mb-2">
                            <div class="row text-center mx-auto">
                                <div class="col-6 p-0">
                                    <a href="#" class="btn btn-dark btn-keunggulan" style="width: 100%">
                                        <span>Keunggulan</span>
                                    </a>
                                </div>
                                <div class="col-6 p-0">
                                    <a href="#" class="btn btn-warning btn-sewa" style="width: 100%">
                                       <span>Sewa</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <a href="http://" class="btn btn-warning col-12 btn-large my-3">Lihat Selengkapnya</a>
        </div>
    </div>

    <div class="service-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="card">                        
                        <div class="card-body">
                          <h2 class="title-service">Some quick example text to #hastag</h2>
                          <img src="https://via.placeholder.com/500?text=Picture" height="500" width="100%" alt="promo">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <h3 class="text-center text-white">Kelebihan Layanan Kami</h3>
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                  <h3 class="card-title title-service">
                                    <div class="row px-3">
                                        <i class="far fa-address-card" aria-hidden="true"></i>
                                        <p class="ml-3 card-title-service">lorem ipsum</p>
                                      </div>                               
                                  </h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                  <h3 class="card-title title-service">
                                      <div class="row px-3">
                                        <i class="far fa-address-card" aria-hidden="true"></i>
                                        <p class="ml-3 card-title-service">lorem ipsum</p>
                                      </div>
                                     
                                  </h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="far fa-address-card" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">lorem ipsum</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="far fa-address-card" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">lorem ipsum</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="far fa-address-card" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">lorem ipsum</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card">                        
                                <div class="card-body">
                                    <h3 class="card-title title-service">
                                        <div class="row px-3">
                                          <i class="far fa-address-card" aria-hidden="true"></i>
                                          <p class="ml-3 card-title-service">lorem ipsum</p>
                                        </div>
                                       
                                    </h3>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jasa-section">
        <div class="col-12 background-svg position-relative text-center desc-jasa">
            <div class="container">
                <div class="p">
                    <p><b>Almira Travel</b></p>
                <h2 class="title-jasa">Siap <span class="text-primary">Melayani</span> Perjalanan Anda</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam adipisci sequi rem labore :</p>
                </div>
            </div>
        </div>
        <div class="container list-jasa">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 px-1">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="card-img-top" src="https://via.placeholder.com/100?text=Picture" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa">Airport Transfer</h5>
                            <p class="card-text text-secondary text-card-jasa">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 px-1">
                    <div class="card text-center card-outline-btn-gray" >
                        <img class="card-img-top" src="https://via.placeholder.com/100?text=Picture" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa">Acara Khusus</h5>
                            <p class="card-text text-secondary text-card-jasa">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 px-1">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="card-img-top" src="https://via.placeholder.com/100?text=Picture" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa">Perjalanan Dinas</h5>
                            <p class="card-text text-secondary text-card-jasa">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 px-1">
                    <div class="card text-center card-outline-btn-gray">
                        <img class="card-img-top" src="https://via.placeholder.com/100?text=Picture" height="180">
                        <div class="card-body">
                            <h5 class="card-title title-card-jasa">Wisata keluarga</h5>
                            <p class="card-text text-secondary text-card-jasa">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="booking-section">
        <div class="container p-0">
            <div class="row">
                <div class="col-12 col-lg-6 p-0">
                    <img src="https://via.placeholder.com/585?text=CaraBooking" alt="">
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <div class="card card-how-to p-2">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="far fa-comment-dots"></i>                                        
                                    </span>
                                    <div class="number"> 1. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title">Lorem ipsum</h5>
                                    <p class="text-secondary text-how-desc text-sm">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum dolores totam consequuntur, neque nihil dolorem </p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="far fa-comment-dots"></i>                                        
                                    </span>
                                    <div class="number"> 2. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title ">Lorem ipsum</h5>
                                    <p class="text-secondary text-how-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum dolores totam consequuntur, neque nihil dolorem </p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="far fa-comment-dots"></i>                                        
                                    </span>
                                    <div class="number"> 3. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title ">Lorem ipsum</h5>
                                    <p class="text-secondary text-how-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum dolores totam consequuntur, neque nihil dolorem </p>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="icon-how-to">
                                    <span class="icon mx-auto my-auto">
                                        <i aria-hidden="true" class="far fa-comment-dots"></i>                                        
                                    </span>
                                    <div class="number"> 3. </div>                                    
                                </div>                               
                                <div class="col text-how-to">
                                    <h5 class="text-how-title">Lorem ipsum</h5>
                                    <p class="text-secondary text-how-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum dolores totam consequuntur, neque nihil dolorem </p>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection