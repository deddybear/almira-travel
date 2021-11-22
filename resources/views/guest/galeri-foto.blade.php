@extends('layouts.guest')

@section('title', 'Almira Travel - Galeri Foto')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/animate.min.css') }}">
@endsection

@section('content')
<nav class="breadcrumb mb-4">
    <div class="container">
        <div class="pull-left">
            <h3 class="mt-2">Galeri Foto</h3>
        </div>
        <div class="pull-right">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri Foto</li>
            </ol>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        @for ($i = 0; $i <= 15; $i++)
        <div class="col-12 col-md-3 col-lg-3 mb-3">
            <div class="card">
                <img src="/images/mobil-1.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

@endsection