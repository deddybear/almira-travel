@extends('layouts/dashboard')

@section('title', 'Panel Admin')
@section('title-header', 'Kontak')

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/dataTables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css') }}">
<style>
    .margin-button {
        margin-top: 2rem !important;
        margin-bottom: 2rem !important;
    }
</style>
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

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p>Pembaruan Alamat Almira Travel <b>(Bila Perlu)</b>.</p>
                
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
                                <label for="bulan">Kontak Alamat</label>
                                <div class="input-group date">
                                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa-solid fa-address-book"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-4">
                                <button type="submit" class="margin-button btn btn-success"><i class="fas fa-edit"></i> Update Alamat</button>
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
                <p>Pembaruan Point GPS Almira Travel <b>(Bila Perlu)</b>.</p>
                
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
                                <label for="bulan">Point GPS</label>
                                <div class="input-group date">
                                    <input class="form-control" name="gps" type="text"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></div>
                                    </div>
                                    
                                </div>
                                <a id="how" href="#" data-toggle="modal" data-target="#modal_form">Bagaimana cara mendapatkan point GPS ?</a>
                            </div>
                            <div class="form-group col-12 col-lg-4">
                                <button type="submit" class="margin-button btn btn-success"><i class="fas fa-edit"></i> Update Point GPS</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_form" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline card-outline-tabs shadow-none">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="detail-tab" data-toggle="pill"
                                    href="#detail" role="tab"
                                    aria-controls="detail" aria-selected="true">Step 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="plan-tab" data-toggle="pill"
                                    href="#plan" role="tab"
                                    aria-controls="plan"
                                    aria-selected="false">Step 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="offer-tab" data-toggle="pill"
                                    href="#offer" role="tab"
                                    aria-controls="offer"
                                    aria-selected="false">Step 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="prepare-tab" data-toggle="pill"
                                    href="#prepare" role="tab"
                                    aria-controls="prepare"
                                    aria-selected="false">Step 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="photo-tab" data-toggle="pill"
                                    href="#photo" role="tab"
                                    aria-controls="photo"
                                    aria-selected="false">Step 5</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form class="tab-content" id="form">
                            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                <img class="shadow" src="{{ asset('/images/how/1.png') }}" width="900">
                                <p></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere vitae doloremque dicta necessitatibus voluptatem beatae debitis adipisci aliquid, exercitationem ut! Est ex itaque unde temporibus mollitia, quis quibusdam recusandae enim.</p>
                            </div>
                            <div class="tab-pane fade" id="plan" role="tabpanel" aria-labelledby="plan-tab">
                                <img class="shadow" src="{{ asset('/images/how/2.png') }}" width="400">
                                <p></p>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima, fugit nemo? Recusandae facere porro odio magni quidem, quisquam id iste commodi et qui aut dicta labore doloribus, tenetur corrupti amet.</p>
                            </div>
                            <div class="tab-pane fade" id="offer" role="tabpanel" aria-labelledby="offer-tab">
                                <img class="shadow" src="{{ asset('/images/how/3.png') }}" width="1000">
                                <p></p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quasi voluptatum, repellendus veritatis adipisci alias accusamus facere exercitationem? Iure sint incidunt nostrum optio quae, ullam nam dolores molestias quos debitis.
                            </div>
                            <div class="tab-pane fade" id="prepare" role="tabpanel" aria-labelledby="prepare-tab">
                                <img class="shadow" src="{{ asset('/images/how/4.png') }}" width="700">
                                <p></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, praesentium! Ea eligendi temporibus cumque harum nisi eaque. Eligendi, non. Omnis, nostrum labore velit ipsam commodi porro nam delectus exercitationem non.</p>
                            </div>
                            <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                                <img class="shadow" src="{{ asset('/images/how/5.png') }}" width="1000">
                                <p></p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo enim quod voluptatem iste ad vitae ex culpa, eius mollitia assumenda ea reiciendis ullam. Fuga ducimus assumenda commodi odio praesentium asperiores!</p>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection