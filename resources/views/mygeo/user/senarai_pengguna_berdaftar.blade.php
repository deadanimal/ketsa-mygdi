@extends('layouts.app_mygeo_afiq')

@section('content')

<style>
    .ftest{
        display:inline;
        width:auto;
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
                                    <table>
                                        <tr>
                                            <td>Nama Penuh<span class="text-warning">*</span></td>
                                            <td>: <input type="text" name="namaPenuh"></td>
                                        </tr>
                                        <tr>
                                            @error('namaPenuh')
                                        <div class="text-warning">{{ $message }}</div>
                                        @enderror
                                        </tr>
                                        <tr>
                                            <td>
                                                Peranan<span class="text-warning">*</span>
                                            </td>
                                            <td>
                                                : 
                                                <select name="peranan">
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
                                            </td>
                                        </tr>
                                        <tr>
                                            @error('peranan')
                                        <div class="text-warning">{{ $message }}</div>
                                        @enderror
                                        </tr>
                                        <tr>
                                            <td>Email<span class="text-warning">*</span></td>
                                            <td>: <input type="email" name="email"></td>
                                        </tr>
                                        <tr>
                                            @error('email')
                                        <div class="text-warning">{{ $message }}</div>
                                        @enderror
                                        </tr>
                                    </table>
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
                            <h3 class="card-title" style="font-size: 2rem;">Senarai pengguna berdaftar</h3>
                            @if(auth::user()->hasRole(['Pentadbir Aplikasi']))
                            <a href="{{ url('pemindahan_akaun') }}">
                                <button type="button" class="btn btn-default float-right">Pemindahan Akaun</button>
                            </a>
                            <a href="#" onclick="return false;">
                                <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modalPenggunaBaru">Pengguna Baru</button>
                            </a>
                            @endif
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
                                            <th>Butiran</th>
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
                                                <td>{{ ($user->status == "0" ? "Tidak Aktif":"Aktif") }}</td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#modal-butiran" data-userid="{{ $user->id }}" class="butiran btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></button>
                                                    <br><br>
                                                    <button type="button" data-toggle="modal" data-target="#modalChangeStatus" data-userid="{{ $user->id }}" data-statusid="{{ $user->status }}" class="btnChangeStatus btn btn-sm btn-primary mr-2"><i class="fas fa-pencil-alt"></i></button>
                                                    <br><br>
                                                    <button type="button" data-userid="{{ $user->id }}" class="btnDelete btn btn-sm btn-primary mr-2"><i class="fas fa-times"></i></button>
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
            }
        });
        
        <?php
        if(Session::has('message')){
            ?>alert("{{ Session::get('message') }}");<?php
        }
        ?>

        $(document).on("click", ".butiran", function () {
            // ajax get user details
            var user_id = $(this).data('userid');
            $.ajax({
                method: "POST",
                url: "get_user_details",
                data: {"_token": "{{ csrf_token() }}", "user_id": user_id},
            }).done(function (response) {
                $('.modal_user_detail').html(response);
            });
        });

        $(document).on("click", ".btnChangeStatus", function () {
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

        $(document).on("click", ".btnChangeStatusAjax", function () {
            var userid = $(this).data('userid');
            var statusid = $(this).val();

            $.ajax({
                method: "POST",
                url: "change_user_status",
                data: {"_token": "{{ csrf_token() }}", "user_id": userid, "status_id": statusid},
            }).done(function (response) {
                alert("Status pengguna berjaya diubah.");
                window.location.reload();
            });
        });

        $(document).on("click", ".btnDelete", function () {
            var user_id = $(this).data('userid');
            var r = confirm("Adakah anda pasti untuk padam pengguna ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_user",
                    data: {"_token": "{{ csrf_token() }}", "user_id": user_id},
                }).done(function (response) {
                    alert("Pengguna berjaya dipadam.");
                    location.reload();
                });
            }
        });

        <?php
        if ($errors->any()) {
            ?>$('#modalPenggunaBaru').modal('show');<?php
        }
        ?>
    });
</script>

@stop