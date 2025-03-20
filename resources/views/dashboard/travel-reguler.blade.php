@extends('layouts/dashboard')

@section('title', 'Panel Admin - Data Door to Door')
@section('title-header', 'Data Door to Door')

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/dataTables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/ckeditor/ckeditor.css') }}">
@endsection

@section('js')
<script src="{{ asset('/plugins/moment-with-locales.js') }}"></script>
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('/plugins/dataTables/datatables.js') }}"></script>
<script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/pages/dashboard/travel/script.js') }}"></script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right my-3" style="float: right">
                    <a id="add" href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_form">
                        <span class="fa fa-plus"></span> Tambahkan Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap" id="dataTable">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Harga</th>                                
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diupdate</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th class="search"></th>
                            <th class="search"></th>
                            <th class="search"></th>
                            <th class="search"></th>
                            <th><input type="text" class="date text-sm form-control" placeholder="Search Date"></th>
                            <th><input type="text" class="date text-sm form-control" placeholder="Search Date"></th>
                            <th></th>
                        </tfoot>
                    </table>
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
                <form class="form-horizontal" id="form">
                    <div class="form-body p-3">
                        <div class="card card-primary card-outline card-outline-tabs shadow-none">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="trip-tab" data-toggle="pill"
                                            href="#trip" role="tab"
                                            aria-controls="trip" aria-selected="true">Perjalanan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="trans-tab" data-toggle="pill"
                                            href="#trans" role="tab"
                                            aria-controls="trans"
                                            aria-selected="false">Transportasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="door-tab" data-toggle="pill"
                                            href="#door" role="tab"
                                            aria-controls="door"
                                            aria-selected="false">Door to door</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="photo-tab" data-toggle="pill"
                                            href="#photo" role="tab"
                                            aria-controls="photo"
                                            aria-selected="false">Foto</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade" id="trip" role="tabpanel" aria-labelledby="trip-tab">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Travel</label>
                                                    <input type="text" class="form-control name-travel" name="name" placeholder="Masukkan Nama Paket">
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Travel</label>
                                                    <input type="text" class="form-control price-travel" name="price" placeholder="Harga">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <input type="text" class="form-control" name="category" placeholder="Kategori">
                                                </div>
                                                <div class="form-group">
                                                    <label>Lokasi</label>
                                                    <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <label>Konten Trip pada Door to Door</label>
                                                <p class="text-sm">isi akan ditampilkan pada halaman web sesuai yang anda buat</p>
                                                <textarea class="form-control ckeditor" name="trip" id="trip" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>                                        
                                        <button class="btn btn-default btn-ok mt-3" type="button">Simpan</button>
                                    </div>
                                    <div class="tab-pane fade" id="trans" role="tabpanel" aria-labelledby="trans-tab">
                                        <label>Konten Transportasi pada Door to Door</label>
                                        <p class="text-sm">isi akan ditampilkan pada halaman web sesuai yang anda buat</p>
                                        <textarea class="form-control ckeditor" name="trans" id="transport" cols="30" rows="10"></textarea>
                                        <button class="btn btn-default btn-ok mt-3" type="button">Simpan</button>
                                    </div>
                                    <div class="tab-pane fade" id="door" role="tabpanel" aria-labelledby="door-tab">
                                        <label>Konten Door to Door pada Door to Door</label>
                                        <p class="text-sm">isi akan ditampilkan pada halaman web sesuai yang anda buat</p>
                                        <textarea class="form-control ckeditor" name="door" id="door" cols="30" rows="10"></textarea>
                                        <button class="btn btn-default btn-ok mt-3" type="button">Simpan</button>
                                    </div>
                                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                                        <a href="javascript:;" id="adding_photo" class="btn btn-success col-2 mb-3">Tambah Foto <i class="ml-1 fa-solid fa-photo-film"></i></a>
                                        <div id="field_photo"></div>
                                        <button id="btn-confrim" type="submit" class="btn btn-primary"></button>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
