@extends('layouts/dashboard')

@section('title', 'Panel Admin')
@section('title-header', 'Data Travel Reguler')

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
                                <th>Harga</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diupdate</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Travel A</td>
                                <td>Rp.200.000</td>
                                <td>2021-05-20</td>
                                <td>2021-05-20</td>
                                <td>
                                    <a href="/desc" class="btn btn-sm btn-info">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <th></th>
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
                                        <a class="nav-link active" id="trip-tab" data-toggle="pill"
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
                                    <div class="tab-pane fade show active" id="trip"
                                        role="tabpanel" aria-labelledby="trip-tab">
                                        <textarea class="form-control ckeditor" name="trip" id="trip" cols="30" rows="10"></textarea>
                                        <button class="btn btn-default btn-ok mt-3" type="button">Simpan</button>
                                    </div>
                                    <div class="tab-pane fade" id="trans" role="tabpanel"
                                        aria-labelledby="trans-tab">
                                        <textarea class="form-control ckeditor" name="trans" id="trans" cols="30" rows="10"></textarea>
                                        <button class="btn btn-default btn-ok mt-3" type="button">Simpan</button>
                                    </div>
                                    <div class="tab-pane fade" id="door" role="tabpanel"
                                        aria-labelledby="door-tab">
                                        <textarea class="form-control ckeditor" name="door" id="door" cols="30" rows="10"></textarea>
                                        <button class="btn btn-default btn-ok mt-3" type="button">Simpan</button>
                                    </div>
                                    <div class="tab-pane fade" id="photo" role="tabpanel"
                                        aria-labelledby="photo-tab">
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
