@extends('layouts.app_mygeo_afiq')

@section('content')

<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
    .ftest {
        display: inline;
        width: auto;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-8 col-6">
                        <h6 class="h2 text-dark d-inline-block mb-0">Pengurusan Pengguna</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengurusan Pengguna
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Senarai Pengguna Berdaftar
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-2 text-right">

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modalPenggunaBaru">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengguna Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('tambahPenggunaBaru') }}" method="POST" id="formTambahPenggunaBaru">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label class="form-control-label">Nama Penuh</label><span class="text-warning">*</span>
                                            <input class="form-control form-control-sm" type="text" name="namaPenuh">
                                            @error('namaPenuh')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label class="form-control-label">Peranan</label><span class="text-warning">*</span>
                                            <select name="peranan" class="form-control form-control-sm">
                                                <option value="" selected disabled>Pilih</option>
                                                <?php
                                                if (!empty($peranans)) {
                                                    foreach ($peranans as $p) {
                                                        if(strtolower($p->name) != 'pentadbir aplikasi' && strtolower($p->name) != 'super admin'){
                                                            ?>
                                                            <option value="{{ $p->name }}">
                                                                {{ $p->name }}
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            @error('peranan')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label class="form-control-label">Agensi / Organisasi</label><span class="text-warning">*</span>
                                            <select name="peranan" class="form-control form-control-sm">
                                                <option value="" selected disabled>Pilih</option>
                                                <?php
                                                if (!empty($peranans)) {
                                                    foreach ($peranans as $p) {
                                                        if(strtolower($p->name) != 'pentadbir aplikasi' && strtolower($p->name) != 'super admin'){
                                                            ?>
                                                            <option value="{{ $p->name }}">
                                                                {{ $p->name }}
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            @error('peranan')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label class="form-control-label">Emel</label><span class="text-warning">*</span>
                                            <input class="form-control form-control-sm" type="email" name="email">
                                            @error('email')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between1">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalChangeStatus">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <button class="btnStatusInactive btnChangeStatusAjax form-control" value="0" data-userid="">Aktif</button>
                            <button class="btnStatusActive btnChangeStatusAjax form-control" value="1" data-userid="">Tidak Aktif</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h3 class="mb-0">Senarai Pengguna Berdaftar</h3>
                                </div>

                                <div class="col-7 text-right">
                                    @if(auth::user()->hasRole(['Pentadbir Aplikasi']))
                                    <a href="{{ url('pemindahan_akaun') }}">
                                        <button type="button" class="btn btn-sm btn-default mr-2">Pemindahan Akaun</button>
                                    </a>
                                    <a href="#" onclick="return false;">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalPenggunaBaru"><span><i class="fas fa-plus mr-2"></i></i></span>Pengguna Baru</button>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="table_newUsers" class="table table-bordered table-striped" style="overflow: auto;">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Nama</th>
                                            <th>Agensi</th>
                                            <th>Peranan</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $bil = 1;
                                        foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->agensi_organisasi }}</td>
                                                <td>
                                                    <?php
                                                        if (count($user->getRoleNames()) > 0) {
                                                            foreach ($user->getRoleNames() as $role) {
                                                                echo $role . "<br>";
                                                            }
                                                        }
                                                        ?>
                                                </td>
                                                <td id='tdUserStatus{{ $user->id }}'>{{ ($user->status == "0" ? "Tidak Aktif":"Aktif") }}</td>
                                                <td class="pr-0">
                                                    <div class="form-inline">
                                                        <button type="button" data-toggle="modal" data-target="#modal-butiran" data-userid="{{ $user->id }}" class="butiran btn btn-sm btn-info mr-2"><i class="fas fa-eye"></i></button>
                                                        <!--<button type="button" data-toggle="modal" data-target="#modalChangeStatus" data-userid="{{ $user->id }}" data-statusid="{{ $user->status }}" class="btnChangeStatus btn btn-sm btn-success mr-2"><i class="fas fa-edit"></i></button>-->
                                                        <button type="button" data-userid="{{ $user->id }}" class="btnDelete btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></button>
                                                        <input type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="danger" data-width="175" data-height="34" class='btnStatusUser' data-userid="{{ $user->id }}" {{ ($user->status == "1" ? "checked":"") }}>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $bil++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-butiran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Maklumat Pengguna</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body modal_user_detail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between1">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btnStatusUser').change(function() {
        var userid = $(this).data('userid');
        var newStatus = '';
        var newStatusText = '';
        if($(this).prop('checked')){
            newStatus = '1';
            newStatusText = 'Aktif';
        }else{
            newStatus = '0';
            newStatusText = 'Tidak Aktif';
        }
        
        $.ajax({
            method: "POST",
            url: "change_user_status",
            data: {"_token": "{{ csrf_token() }}", "user_id": userid, "status_id": newStatus},
        }).done(function (response) {
            alert("Status pengguna berjaya diubah.");
            $('#tdUserStatus'+userid).html(newStatusText);
        });
    });
     
    $(function () {
        $("#table_newUsers").DataTable({
            "ordering": false,
            "responsive": false,
            "autoWidth": true,
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
            },
        });

        <?php
        if (Session::has('message')) {
            ?>alert("{{ Session::get('message') }}");
    <?php
    }
    ?>

    $(document).on("click", ".butiran", function() {
        // ajax get user details
        var user_id = $(this).data('userid');
        $.ajax({
            method: "POST",
            url: "get_user_details",
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": user_id
            },
        }).done(function(response) {
            $('.modal_user_detail').html(response);
        });
    });

    $(document).on("click", ".btnChangeStatus", function() {
        var userid = $(this).data('userid');
        var statusid = $(this).data('statusid');

        if (statusid == "0") {
            $('.btnStatusActive').data('userid', userid);
            $('.btnStatusActive').show();
            $('.btnStatusInactive').hide();
        } else if (statusid == "1") {
            $('.btnStatusInactive').data('userid', userid);
            $('.btnStatusInactive').show();
            $('.btnStatusActive').hide();
        }
    });

    $(document).on("click", ".btnChangeStatusAjax", function() {
        var userid = $(this).data('userid');
        var statusid = $(this).val();

        $.ajax({
            method: "POST",
            url: "change_user_status",
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": userid,
                "status_id": statusid
            },
        }).done(function(response) {
            alert("Status pengguna berjaya diubah.");
            window.location.reload();
        });
    });

    $(document).on("click", ".btnDelete", function() {
        var user_id = $(this).data('userid');
        var r = confirm("Adakah anda pasti untuk padam pengguna ini?");
        if (r == true) {
            $.ajax({
                method: "POST",
                url: "delete_user",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": user_id
                },
            }).done(function(response) {
                alert("Pengguna berjaya dipadam.");
                location.reload();
            });
        }
    });

    <?php
    if ($errors->any()) {
        ?>$('#modalPenggunaBaru').modal('show');
    <?php
    }
    ?>
    });
</script>

@stop
