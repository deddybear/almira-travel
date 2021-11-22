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
    <nav class="breadcrumb mb-4">
        <div class="container">
            <div class="pull-left">
                <h3 class="mt-2">Hubungi Kami</h3>
            </div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
                </ol>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 border-0">
                <div class="card p-4">
                    <h5 class="card-title">Hubungi Kami</h5>
                    <ul class="list-group list-group-flush border-0">
                        <li class="list-group-item pl-5 pt-1">
                            <i class="fas fa-home icons"></i>
                            <h5>Alamat</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, dolores provident ad error rerum repellendus accusamus consectetur, itaque, odit architecto recusandae neque vel totam? Quo quibusdam eos reiciendis aperiam vero!</p>
                        </li>
                        <li class="list-group-item pl-5 pt-1">
                            <i class="fas fa-phone-square icons"></i>
                            <h5>Telepon</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, dolores provident ad error rerum repellendus accusamus consectetur, itaque, odit architecto recusandae neque vel totam? Quo quibusdam eos reiciendis aperiam vero!</p>
                        </li>
                        <li class="list-group-item pl-5 pt-1">
                            <i class="fas fa-envelope icons"></i>
                            <h5>Email</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ad vero delectus neque maiores inventore veritatis iusto magni ipsam explicabo maxime sint ducimus facilis temporibus aliquam, quidem quas, consequuntur cum.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe 
                                    width="1000" 
                                    height="400" 
                                    id="gmap_canvas" 
                                    src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                </iframe>
                            </div>
                        </div>
                        <div class="payments">
                            <h1 class="text-center">Gambar Payments</h1>
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