@extends('layouts.guest')

@section('title', 'Almira Travel - Tentang Kita')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/animate.min.css') }}">
@endsection

@section('js')
    
@endsection

@section('content')
    <nav class="breadcrumb mb-4">
        <div class="container">
            <div class="pull-left">
                <h3 class="mt-2">Tentang Kami</h3>
            </div>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">TENTANG KAMI</li>
                </ol>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="about-us mb-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mb-3 animate__animated animate__fadeInLeft" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="..." alt="Ini Gambar">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">bla bla bla</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>
        </div>
        <div class="testimoni mb-3">
            <div class="row">
                <div class="col-12 col-md-6"></div>
                <div class="col-12 col-md-6">
                    <div class="card mb-3 text-right animate__animated animate__fadeInLeft" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">bla bla bla</small></p>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <img src="..." alt="Ini Gambar">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us mb-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mb-3 animate__animated animate__fadeInLeft" style="max-width: 540px;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="..." alt="Ini Gambar">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">bla bla bla</small></p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6"></div>
            </div>
        </div>
    </div>
    
@endsection