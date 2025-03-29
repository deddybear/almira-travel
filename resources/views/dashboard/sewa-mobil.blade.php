@extends('layouts/dashboard')

@section('title', 'Panel Admin - Data Sewa Mobil')
@section('title-header', 'Data Sewa Mobil')

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
<script src="{{ asset('/pages/dashboard/car/script.js') }}"></script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right my-3" style="float: right">
                    <a id="add" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                        data-target="#modal_form">
                        <span class="fa fa-plus"></span> Tambahkan Data 
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap" id="dataTable">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>Harga Angka</th>
                                <th>Harga Huruf</th>
                                <th>Harga Pakai</th>
                                <th>Tipe Mobil</th>
                                <th>Kursi</th>
                                <th>CC Mobil</th>
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
                            <th></th>
                            <th></th>
                            <th></th>
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
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Nama Mobil</label>
                            <input type="text" class="form-control name-tour" name="name" placeholder="Masukkan Nama Sewa Mobil" required>
                        </div>
                        <div class="form-group">
                            <label>Pakai Harga</label>
                            <div class="row px-2">
                                <div class="col custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio-1" name="using_price" value="1" required>
                                    <label for="customRadio-1" class="custom-control-label">Angka</label>
                                </div>
                                <div class="col custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio-0" name="using_price" value="0" required>
                                    <label for="customRadio-0" class="custom-control-label">Huruf</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga Sewa Mobil (Angka)</label>
                            <input id="price_nominal" type="text" class="form-control price price-1" name="price" placeholder="Harga Angka" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Sewa Mobil (Huruf)</label>
                            <input id="price_char" type="text" class="form-control price price-0" name="price_string" placeholder="Harga Huruf" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe Mobil</label>
                            <input type="text" class="form-control" name="tipe_mobil" placeholder="Tipe Harga" required>
                        </div>
                        <div class="form-group">
                            <label>Banyak Kursi</label>
                            <input type="text" class="form-control" name="kursi" placeholder="Banyak Kursi" required>
                        </div>
                        <div class="form-group">
                            <label>Besar CC</label>
                            <input type="text" min="1" class="form-control" name="cc" placeholder="CC Mobil" required>
                        </div>
                        <a href="javascript:;" id="adding_photo" class="btn btn-success col-12 mb-3">Tambah Foto <i class="ml-1 fa-solid fa-photo-film"></i></a>
                        <div class="col-12">
                            <div id="field_photo"></div>
                        </div>
                    </div>
                    <div class="col-8">
                        <textarea id="detail" name="content" cols="30" rows="30"></textarea>
                    </div>  
                </div>                     
            </div>
            <div class="modal-footer">
                <button id="btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal"></button>
                <button id="btn-confrim" type="submit" class="btn btn-primary"></button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection