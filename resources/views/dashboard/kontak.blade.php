@extends('layouts/dashboard')

@section('title', 'Panel Admin')
@section('title-header', 'Kontak')

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/dataTables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css') }}">
@endsection

@section('js')
<script src="{{ asset('/plugins/dataTables/datatables.js') }}"></script>
<script src="{{ asset('/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endsection

@section('content')
<div class="row justify-content-center">
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p>Pembaruan Kontak Whatsapp Almira Travel <b>(Bila Perlu)</b>.</p>
                
                @if (count($errors) > 0)
                    <div class="my-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div> 
                @endif
                
                <div class="mt-5">
                    <form action="#" method="POST" target="_blank">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="bulan">Kontak Whatsapp</label>
                                <div class="input-group date">
                                    <input name="wa" type="number" class="form-control"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fab fa-whatsapp"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-4">
                                <button type="submit" class="margin-button btn btn-success"><i class="fas fa-edit"></i> Update Nomer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p>Pembaruan Kontak Email Almira Travel <b>(Bila Perlu)</b>.</p>
                
                @if (count($errors) > 0)
                    <div class="my-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div> 
                @endif
                
                <div class="mt-5">
                    <form action="#" method="POST" target="_blank">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="bulan">Kontak Email</label>
                                <div class="input-group date">
                                    <input name="email" type="email " class="form-control"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-4">
                                <button type="submit" class="margin-button btn btn-success"><i class="fas fa-edit"></i> Update Email</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection