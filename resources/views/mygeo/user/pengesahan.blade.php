@extends('layouts.app_mygeo_afiq')

@section('content')

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
                                    Pengesahan Pengguna
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h3 class="mb-0">Pengesahan Penerbit dan Pengesah Metadata</h3>
                                </div>
                                <div class="col-7 text-right">
                                    <button type="button" class="btn btn-sm btn-primary float-right"><span class="mx-2">Lulus</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_newUsers" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>Agensi</th>
                                        <th>Peranan</th>
					<th>Butiran</th>
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
                                            <td>{{ (isset($user->agensiOrganisasi->name) ? $user->agensiOrganisasi->name:"") }}</td>
                                            <td>
                                                <?php
                                                    if (count($user->getRoleNames()) > 0) {
                                                        foreach ($user->getRoleNames() as $role) {
                                                            echo $role . "<br>";
                                                        }
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#modal-butiran" class="butiran form-control" data-userid="{{ $user->id }}">Butiran</button>
                                            </td>
                                            <td>
                                                <div class="form-inline">
                                                    <button type="button" class="btn btn-success btn_lulus mr-2" data-userid="{{ $user->id }}"><i class="fas fa-check"></i></button>
                                                    <button type="button" class="btn btn-danger btn_tolak" data-userid="{{ $user->id }}"><i class="fas fa-times"></i></button>
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
    $(function() {
        $("#table_newUsers").DataTable({
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

        $(document).on("click", ".butiran", function() {
            // ajax get user details
            $user_id = $(this).data('userid');
            $.ajax({
                    method: "POST",
                    url: "get_user_details",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": $user_id
                    },
                })
                .done(function(response) {
                    $('.modal_user_detail').html(response);
                });
        });

        $(document).on("click", ".btn_lulus", function() {
            if (confirm("Adakah anda pasti untuk meluluskan pendaftaran?")) {
                // ajax sahkan user
                $user_id = $(this).data('userid');
                $.ajax({
                        method: "POST",
                        url: "user_sahkan",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "user_id": $user_id
                        },
                    })
                    .done(function(response) {
                        alert("Pengguna berjaya didaftarkan.");
                        location.reload();
                    });
            }
        });

        $(document).on("click", ".btn_tolak", function() {
            if (confirm("Adakah anda pasti untuk menolak pendaftaran?")) {
                // ajax sahkan user
                $user_id = $(this).data('userid');
                $.ajax({
                        method: "POST",
                        url: "user_pengesahan_ditolak",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "user_id": $user_id
                        },
                    })
                    .done(function(response) {
                        alert("Pendaftaran ditolak.");
                        location.reload();
                    });
            }
        });
    });
</script>

@stop
