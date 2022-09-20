@extends('layouts.guest')

@section('rechapta')
    {!! htmlScriptTagJsApi() !!}
@endsection

@section('title', 'Almira Travel - Hubungi Kami')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('pages/contact/styles.css') }}">

@endsection

@section('js')
    
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
                            <p>+{{ $data->wa }}</p>
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
                            <form action="">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label >Nama Anda</label>
                                        <input type="email" class="form-control" name="name" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label >Email Anda</label>
                                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label >Nomer WA / Bisa dihubungi</label>
                                        <input type="email" class="form-control" name="number" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="exampleFormControlTextarea1">Pesan Anda</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-success col-12" type="submit"><b>KIRIM PESAN</b></button>
                            </form>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection