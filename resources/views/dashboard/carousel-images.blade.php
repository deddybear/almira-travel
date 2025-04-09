@extends('layouts/dashboard')

@section('title', 'Panel Admin - Data Gambar Caraousel')
@section('title-header', 'Data Gambar Caraousel')

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/dataTables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.css') }}">

@endsection

@section('js')
<script src="{{ asset('/plugins/moment-with-locales.js') }}"></script>  
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('/plugins/dataTables/datatables.js') }}"></script>
<script src="{{ asset('/pages/dashboard/caraousel/script.js') }}"></script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right my-3" style="float: right">
                    <a id="add" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                        data-target="#modal_form">
                        <span class="fa fa-plus"></span> Tambahkan Foto 
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap" id="dataTable">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Preview</th>
                                <th>Jenis</th>
                                <th>Judul Banner</th>
                                <th>Deskripsi Banner</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>1</td>
                                <td><img src="{{ asset('/images/mobil-1.png') }}" width="500" height="350"></td>
                                <td>2021-05-20</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr> --}}
                        </tbody>
                        <tfoot>
                            <th></th>
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
                    <div class="col-sm-12">
                        <div class="form-group row uploadFields">
                            <label for="photo_1" class="col-12">File input</label>                
                                <div class="input-group col-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="photo_1" name="photo" onchange="changeNameFile(1)">
                                        <label class="custom-file-label" id="labelFile_1" for="photo_1">Choose file</label>
                                    </div>
                                 </div>
                        </div>
                        <div class="form-group col-10 p-0">
                            <label for="exampleFormControlSelect1">Jenis Banner</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                              <option value="home" selected>Home</option>
                              <option value="tour">Tour</option>
                              <option value="sewa">Sewa Mobil</option>
                              <option value="gallery">Gallery</option>
                              <option value="contact">Contact</option>
                              <option value="private">Tour Private</option>
                              <option value="travel">Travel Reguler</option>
                            </select>
                        </div>
                        <div class="form-group col-10 p-0">
                            <label>Judul Banner</label>
                            <input type="text" class="form-control" name="judul_banner" placeholder="Masukkan Judul Banner">
                        </div>
                        <div class="form-group col-10 p-0">
                            <label>Deskripsi Banner</label>
                            <textarea type="text" class="form-control" name="desc_banner" placeholder="Masukkan Deskripsi Banner"></textarea>
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