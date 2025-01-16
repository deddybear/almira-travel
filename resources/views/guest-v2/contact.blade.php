@extends('layouts-v2.guest')

@section('title', 'Almira Travel - Contact')

@section('banner-img', "/storage/images/" . $carousel->path)

@section('title-banner', $carousel->judul_banner)

@section('msg-banner', $carousel->desc_banner)

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('pages/contact/styles.css') }}">
@endsection

@section('js')
<script src="{{ asset('pages/contact/script.js') }}"></script>
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection

@section('content')
<div class="my-5 p-5">
    <div class="row">
        <div class="col-12 col-md-3 border-0">
            <div class="card p-4">
                <h5 class="card-title">Hubungi Kami</h5>
                <ul class="list-group list-group-flush border-0">
                    <li class="list-group-item pl-5 pt-1">
                        <i class="fas fa-home icons"></i>
                        <h5>Alamat</h5>
                        <p>{{ $data->address }}</p>
                    </li>
                    <li class="list-group-item pl-5 pt-1">
                        <i class="fas fa-phone-square icons"></i>
                        <h5>Telepon</h5>
                        @php
                            $number = str_replace('62', ' ', $contact->wa);
                        @endphp

                           
                        <p> +62 {{ trim(chunk_split($number, 4, ' ')) }}</p>
                    </li>
                    <li class="list-group-item pl-5 pt-1">
                        <i class="fas fa-envelope icons"></i>
                        <h5>Email</h5>
                        <p>{{ $data->email }}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 my-3" height="400">
                        <iframe 
                            class="col-12 my-3"
                            height="400" 
                            id="gmap_canvas" 
                            src="{{ $data->gps }}" 
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>    
                    </div>   
               
                    <div class="pesan">
                        <h4>Ada yang ingin ditanyakan ? Kirim pesan kepada kami !</h4>
                        <br>
                        <h5>Data yang anda inputkan kepada kami akan kami jaga kerahasiaanya </h5>
                        <form id="form">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label >Nama Anda</label>
                                    <input type="text" class="form-control" name="name">
                                    
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label >Email Anda</label>
                                    <input type="email" class="form-control" name="email">
                                    <small class="form-text text-muted">Contoh : almiraTravel@gmail.com</small>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label >Nomer WA / Bisa dihubungi</label>
                                    <input type="text" class="form-control" name="wa" pattern="^[0-9]*$">
                                    <small class="form-text text-muted">Contoh : 087812345678, Awali dengan 0</small>
                                </div>
                                <div class="form-group col-12">
                                    <label for="exampleFormControlTextarea1">Pesan Anda</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="msg"></textarea>
                                </div>
                                <div class="form-group col-12 mt-3">
                                    <div class="captcha">
                                        {!! NoCaptcha::display() !!}
                                        {!! NoCaptcha::renderJs() !!}
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success col-12 mt-3" type="submit"><b>KIRIM PESAN</b></button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection