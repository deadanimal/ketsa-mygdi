@extends('layouts.app_mygeo_ketsa')

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
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Tetapan Portal</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Tetapan Portal
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">

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
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Konfigurasi Tetapan Portal</h3>
                                    </div>
                                    <div class="col-4 text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="simpan_portal_tetapan" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama Lokasi</label>
                                                <textarea name="nama_lokasi" class="form-control" rows="8">{{$portal->name}}</textarea>
                                                <label class="form-control-label">Alamat</label>
                                                <textarea name="alamat" class="form-control" rows="8">{{$portal->address}}</textarea>
                                                <label class="form-control-label">Emel Pentadbir</label>
                                                <input type="text" class="form-control" name="emel_pentadbir" value="{{$portal->email_admin}}">
                                                <label class="form-control-label">Telefon dan Faks</label>
                                                <input type="text" class="form-control" name="contact" value="{{$portal->contact}}">
                                                <label class="form-control-label">Masa Operasi</label>
                                                <input type="text" class="form-control" name="masa_operasi" value="{{$portal->operation_time}}">

                                                <input type="hidden" name="id_portal" value="{{$portal->id}}">

                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $("#table_metadatas").DataTable({
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

        $(document).on("click", ".btnDelete", function() {
            var mb_id = $(this).data('maklumbalasid');
            var r = confirm("Adakah anda pasti untuk buang maklum balas ini?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_maklum_balas",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": mb_id
                    },
                }).done(function(response) {
                    alert("Maklum balas telah dibuang.");
                    location.reload();
                });
            }
        });
    </script>
@stop
