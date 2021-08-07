@extends('layouts.app_mygeo_afiq')

@section('content')

    <style>
        .ftest {
            display: inline;
            width: auto;
        }

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title" style="font-size: 2rem;">Senarai Agensi / Organisasi</h3>
                                <button type="button" class="btn btn-sm btn-default float-right dropdown-toggle" data-toggle="dropdown"><i class="fas fa-plus mr-2"></i>Tambah</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_tambah_agensi_organisasi">Agensi / Organisasi +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_tambah_bahagian">Bahagian +</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_agensi_organisasi" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>SEKTOR</th>
                                            <th>AGENSI / ORGANISASI</th>
                                            <th>BAHAGIAN</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 1;
                                        foreach ($aos as $ao){
                                            ?>
                                            <tr>
                                                <td>{{ $counter }}</td>
                                                <td>{{ ($ao->sektor == '1' ? 'Kerajaan':'Swasta') }}</td>
                                                <td>{{ $ao->name }}</td>
                                                <td>{{ ($ao->bahagian != "" ? $ao->bahagian:"-") }}</td>
                                                <td>
                                                    @if($ao->bahagian != "")
                                                    <button type="button" class="btn btn-sm btn-success btnKemaskiniBahagian" data-rowid="{{ $ao->id }}" data-toggle="modal" data-target="#modal_kemaskini_bahagian">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-sm btn-success btnKemaskiniAgensiOrganisasi" data-rowid="{{ $ao->id }}" data-toggle="modal" data-target="#modal_kemaskini_agensi_organisasi">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    @endif
                                                    @if($ao->bahagian != "")
                                                    <button type="button" data-rowid="{{ $ao->id }}" data-type="bahagian" class="btnDelete btn btn-sm btn-danger mx-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" data-rowid="{{ $ao->id }}" data-type="agensi_organisasi" class="btnDelete btn btn-sm btn-danger mx-2">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <?php
                                            $counter++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade" id="modal_tambah_agensi_organisasi">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Agensi / Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_agensi_organisasi') }}" id="formTambahAgensiOrganisasi">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama Agensi / Organisasi</label>
                                    <input type="text" name="namaAgensiOrganisasi" class="form-control form-control-sm namaAgensiOrganisasi">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanAgensiOrganisasi">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_tambah_bahagian">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Bahagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_agensi_organisasi') }}" id="formTambahBahagian">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Agensi / Organisasi</label>
                                    <select name="agensi_organisasi" class="form-control form-control-sm agensi_organisasi">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="namaBahagian" class="form-control form-control-sm namaBahagian">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanBahagian">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modal_kemaskini_agensi_organisasi">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemas Kini Agensi / Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_kemaskini_agensi_organisasi') }}" id="formKemaskiniAgensiOrganisasi">
                        @csrf
                        <input type="hidden" name="rowid" class="rowid">
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama Agensi / Organisasi</label>
                                    <input type="text" name="namaAgensiOrganisasi" class="form-control form-control-sm namaAgensiOrganisasi">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanKemaskiniAgensiOrganisasi">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_kemaskini_bahagian">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Kemas Kini Bahagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_kemaskini_agensi_organisasi') }}" id="formKemaskiniBahagian">
                        @csrf
                        <input type="hidden" name="rowid" class="rowid">
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Sektor</label>
                                    <select name="sektor" class="form-control form-control-sm sektor">
                                        <option value="">Pilih...</option>
                                        <option value="1">Kerajaan</option>
                                        <option value="2">Swasta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Agensi / Organisasi</label>
                                    <select name="agensi_organisasi" class="form-control form-control-sm agensi_organisasi">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="namaBahagian" class="form-control form-control-sm namaBahagian">
                                </div>
                                <button type="button" class="btn btn-success float-right btnSimpanKemaskiniBahagian">
                                    <span class="text-white">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#table_agensi_organisasi").DataTable({
                "ordering": false,
                "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
                    "sEmptyTable": "Tiada rekod ditemui",
                    "sZeroRecords": "Tiada rekod ditemui",
                    "sLengthMenu": "Papar _MENU_ rekod",
                    "sLoadingRecords": "Sila tunggu...",
                    "sSearch": "Carian:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sLast": "Terakhir",
                        "sNext": ">",
                        "sPrevious": "<",
                    }
                }
            });
        });

        $(document).on("click", ".btnSimpanAgensiOrganisasi", function() {
            var sektor = $('#formTambahAgensiOrganisasi .sektor').val().trim();
            var namaAgensiOrganisasi = $('#formTambahAgensiOrganisasi .namaAgensiOrganisasi').val().trim();
            var msg = "";
            
            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(namaAgensiOrganisasi == ""){
                msg = msg + "Sila isi nama Agensi / Organisasi.\r\n";
            }
            
            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sektor": sektor,
                        "namaAgensiOrganisasi": namaAgensiOrganisasi,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });
        $(document).on("click", ".btnSimpanKemaskiniAgensiOrganisasi", function() {
            var rowid = $('#formKemaskiniAgensiOrganisasi .rowid').val().trim();
            var sektor = $('#formKemaskiniAgensiOrganisasi .sektor').val().trim();
            var namaAgensiOrganisasi = $('#formKemaskiniAgensiOrganisasi .namaAgensiOrganisasi').val().trim();
            var msg = "";
            
            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(namaAgensiOrganisasi == ""){
                msg = msg + "Sila isi nama Agensi / Organisasi.\r\n";
            }
            
            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_kemaskini_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "rowid": rowid,
                        "sektor": sektor,
                        "namaAgensiOrganisasi": namaAgensiOrganisasi,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });
        $(document).on("click", ".btnSimpanKemaskiniBahagian", function() {
            var rowid = $('#formKemaskiniBahagian .rowid').val().trim();
            var sektor = $('#formKemaskiniBahagian .sektor').val().trim();
            var agensi_organisasi = $('#formKemaskiniBahagian .agensi_organisasi').val().trim();
            var namaBahagian = $('#formKemaskiniBahagian .namaBahagian').val().trim();
            var msg = "";
            
            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(agensi_organisasi == ""){
                msg = msg + "Sila pilih Agensi / Organisasi.\r\n";
            }
            if(namaBahagian == ""){
                msg = msg + "Sila isi nama Bahagian.\r\n";
            }
            
            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_kemaskini_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "rowid": rowid,
                        "sektor": sektor,
                        "namaAgensiOrganisasi": agensi_organisasi,
                        "bahagian": namaBahagian,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });
        
        $(document).on("click", ".btnSimpanBahagian", function() {
            var sektor = $('#formTambahBahagian .sektor').val().trim();
            var agensi_organisasi = $('#formTambahBahagian .agensi_organisasi').val().trim();
            var namaBahagian = $('#formTambahBahagian .namaBahagian').val().trim();
            var msg = "";
            
            if(sektor == ""){
                msg = msg + "Sila pilih sektor.\r\n"
            }
            if(agensi_organisasi == ""){
                msg = msg + "Sila pilih Agensi / Organisasi.\r\n";
            }
            if(namaBahagian == ""){
                msg = msg + "Sila isi nama Bahagian.\r\n";
            }
            
            if(msg == ""){
                $.ajax({
                    method: "POST",
                    url: "{{ url('simpan_agensi_organisasi') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sektor": sektor,
                        "namaAgensiOrganisasi": agensi_organisasi,
                        "namaBahagian": namaBahagian,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }else{
                alert(msg);
            }
        });
        
        $(document).on("click", ".btnDelete", function() {
            var rowid = $(this).data('rowid');
            var type = $(this).data('type');
            var confirmMsg = "";
            
            if(type == 'bahagian'){
                confirmMsg = "Adakah anda pasti untuk buang Bahagian ini?";
            }else{
                confirmMsg = "Adakah anda pasti untuk buang Agensi/Organisasi ini?";
            }
            
        var r = confirm(confirmMsg);
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_agensi_organisasi",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": rowid,
                        "type": type,
                    },
                }).done(function(response) {
                    var data = jQuery.parseJSON(response);
                    alert(data.msg);
                    location.reload();
                });
            }
        });
        
        $('#formTambahBahagian .sektor').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi_by_sektor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "sektor": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                $('#formTambahBahagian .agensi_organisasi').html('');
                $('#formTambahBahagian .agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos, function(index,value) {
                    $('#formTambahBahagian .agensi_organisasi').append('<option value="'+value.name+'">'+value.name+'</option>');
                });
            });
        });
        $('#formKemaskiniBahagian .sektor').change(function() {
            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi_by_sektor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "sektor": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                $('#formKemaskiniBahagian .agensi_organisasi').html('');
                $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos, function(index,value) {
                    $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="'+value.name+'">'+value.name+'</option>');
                });
            });
        });
        
        $(document).on('click','.btnKemaskiniAgensiOrganisasi',function(){
            var rowid = $(this).data('rowid');

            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowid": rowid,
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                
                //rowid
                $("#formKemaskiniAgensiOrganisasi .rowid").val(data.ao.id).change();
                //sektor
                $("#formKemaskiniAgensiOrganisasi .sektor").val(data.ao.sektor).change();
                //nama
                $('#formKemaskiniAgensiOrganisasi .namaAgensiOrganisasi').val(data.ao.name);
            });
        });
        $(document).on('click','.btnKemaskiniBahagian',function(){
            var rowid = $(this).data('rowid');

            $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowid": rowid,
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                
                //rowid
                $("#formKemaskiniBahagian .rowid").val(data.ao.id).change();
                //sektor
                $("#formKemaskiniBahagian .sektor").val(data.ao.sektor).change();
                //agensi_organisasi
                $('#formKemaskiniBahagian .agensi_organisasi').html('');
                $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos,function(index,value){
                    $('#formKemaskiniBahagian .agensi_organisasi').append('<option value="'+value.name+'">'+value.name+'</option>');
                });
                $('#formKemaskiniBahagian .agensi_organisasi').val(data.ao.name);
                //nama
                $('#formKemaskiniBahagian .namaBahagian').val(data.ao.bahagian);
            });
        });
    </script>
@stop
