@extends('layouts/dashboard')

@section('title', 'Kotak Pesan')
@section('title-header', 'Data Kotak Pesan')

@section('css')
<link rel="stylesheet" href="{{ asset('/plugins/dataTables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.css') }}">
<style>
    .form-control-border {
        border-top: 0;
        border-left: 0;
        border-right: 0;
        border-radius: 0;
        box-shadow: inherit;
    }
</style>
@endsection

@section('js')
<script src="{{ asset('/plugins/moment-with-locales.js') }}"></script>  
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('/plugins/dataTables/datatables.js') }}"></script>
<script src="{{ asset('/pages/dashboard/messaging/script.js') }}"></script>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap" id="dataTable">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Whatsapp</th>
                                <th>Tanggal Dibuat</th>
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
                            <th><input type="text" class="date text-sm form-control" placeholder="Search Date"></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_form" tabindex="1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group p-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control form-control-border" id="name" disabled>
                </div>
                <div class="form-group p-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control form-control-border" id="email" disabled>
                </div>
                <div class="form-group p-3">
                    <label for="wa">Nomer Whatsapp</label>
                    <input type="text" class="form-control form-control-border" id="wa" disabled>
                </div>
                <div class="form-group p-3">
                    <label for="msg">Pesan</label>
                    <textarea class="form-control" id="msg" cols="30" rows="10" disabled></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection