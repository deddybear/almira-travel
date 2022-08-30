@extends('layouts/dashboard')

@section('title', 'Panel Admin')
@section('title-header', 'Data Paket Tour')

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
<script src="{{ asset('/pages/dashboard/tour/script.js') }}"></script>
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
                            <th></th>
                            <th><input type="text" class="date text-sm form-control" placeholder="Search Date"></th>
                            <th><input type="text" class="date text-sm form-control" placeholder="Search Date"></th>
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
                <div class="card card-primary card-outline card-outline-tabs shadow-none">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="detail-tab" data-toggle="pill"
                                    href="#detail" role="tab"
                                    aria-controls="detail" aria-selected="true">Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="plan-tab" data-toggle="pill"
                                    href="#plan" role="tab"
                                    aria-controls="plan"
                                    aria-selected="false">Rencana Perjalanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="offer-tab" data-toggle="pill"
                                    href="#offer" role="tab"
                                    aria-controls="offer"
                                    aria-selected="false">Best Offer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="prepare-tab" data-toggle="pill"
                                    href="#prepare" role="tab"
                                    aria-controls="prepare"
                                    aria-selected="false">Persiapan</a>
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
                        <form class="tab-content" id="form" enctype="multipart/form-data">
                            <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Nama Paket Tour</label>
                                            <input type="text" class="form-control name-tour" name="name" placeholder="Masukkan Nama Paket">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Paket Tour</label>
                                            <input type="number" min="1" class="form-control price-tour" name="price" placeholder="Harga">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Isi Detail Paket Tour</label>
                                        <textarea class="form-control ckeditor" name="detail" id="detail" cols="30" rows="10"></textarea>
                                    </div>                                   
                                </div>
                                <button class="btn btn-ok mt-3 next btn-primary" type="button">Next</button>                                
                            </div>
                            <div class="tab-pane fade" id="plan" role="tabpanel" aria-labelledby="plan-tab">
                                <textarea class="form-control ckeditor" name="plan" id="plan" cols="30" rows="10"></textarea>
                                <button class="btn btn-ok mt-3 next btn-danger" type="button">Next</button>
                            </div>
                            <div class="tab-pane fade" id="offer" role="tabpanel" aria-labelledby="offer-tab">
                                <textarea class="form-control ckeditor" name="offer" id="offer" cols="30" rows="10"></textarea>
                                <button class="btn btn-ok mt-3 next btn-warning" type="button">Next</button>
                            </div>
                            <div class="tab-pane fade" id="prepare" role="tabpanel" aria-labelledby="prepare-tab">
                                <textarea class="form-control ckeditor" name="prepare" id="prepare" cols="30" rows="10"></textarea>
                                <button class="btn btn-ok mt-3 next btn-dark" type="button">Next</button>
                            </div>
                            <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                                <a href="javascript:;" id="adding_photo" class="btn btn-success col-2 mb-3">Tambah Foto <i class="ml-1 fa-solid fa-photo-film"></i></a>
                                <div id="field_photo"></div>
                                <button id="btn-confrim" type="submit" class="btn btn-primary">Tambahkan Post Tour</button>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal"></button>                 
            </div>
        </div>
    </div>
</div>
@endsection