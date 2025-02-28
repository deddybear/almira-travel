@extends('layouts/dashboard')

@section('title', 'Panel Admin - Gallery Foto')
@section('title-header', 'Gallery Foto')

@section('css')
    <link rel="stylesheet" href="{{ asset('/plugins/dataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/plugins/dataTables/datatables.js') }}"></script>
    <script src="{{ asset('/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ asset('/pages/dashboard/gallery/script.js') }}"></script>
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
                                <th>Deskripsi</th>
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
                <form id="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Nama Agenda</label>
                            <input type="text" class="form-control name-tour" name="name" placeholder="Masukkan Nama Paket" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Agenda</label>
                            <textarea class="form-control" name="desc" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 mt-4">
                        <a href="javascript:;" id="adding_photo" class="btn btn-success col-12 mb-3">Tambah Foto <i class="ml-1 fa-solid fa-photo-film"></i></a>
                        <div class="col-12">
                            <div id="field_photo"></div>
                        </div>
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