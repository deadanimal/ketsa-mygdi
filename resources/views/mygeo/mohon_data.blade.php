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
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Mohon Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Mohon Data
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
                                        <h3 class="mb-0">Permohonan Baru</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a data-toggle="modal" data-target="#modal-permohonan-baru">
                                            <button type="button" class="btn btn-sm btn-default float-right"><i
                                                    class="fas fa-plus mr-2"></i>Permohonan Baru</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>NAMA PERMOHONAN</th>
                                            <th>STATUS</th>
                                            <th>TARIKH</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemohons as $pemohon)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pemohon->name }}</td>
                                                <td>
                                                    @if (!$pemohon->dihantar == 1)
                                                        <span class="badge badge-pill badge-primary">Draf</span>
                                                    @else
                                                        <span class="badge badge-pill badge-info">Baru</span>
                                                    @endif
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($pemohon->date)->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="{{ url('lihat_permohonan/'.$pemohon->id) }}"
                                                        class="btn btn-sm btn-success text-center"><i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-permohonanid="{{ $pemohon->id }}"
                                                        class="btnDelete btn btn-sm btn-danger mr-2"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Tambah Permohonan -->
        <div class="modal fade" id="modal-permohonan-baru">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Permohonan Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('simpan_permohonan_baru') }}">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Nama Permohonan</label>
                                    <input type="text" class="form-control form-control-sm" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="date" class="form-control-label">Tarikh Permohonan</label>
                                    <input type="date" class="form-control form-control-sm" name="date"
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tujuan" class="form-control-label">Tujuan Permohonan</label>
                                    <textarea name="tujuan" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                                </div>
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <button class="btn btn-primary" type="submit">
                                    <span class="text-white">Tambah</span>
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
            var user_id = $(this).data('permohonanid');
            var permohonan_id = $(this).data('permohonanid');
            var r = confirm("Anda pasti untuk memadam permohonan?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: "delete_permohonan",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": user_id,
                        "permohonan_id": permohonan_id
                    },
                }).done(function(response) {
                    alert("Permohonan berjaya dipadam.");
                    location.reload();
                });
            }
        });
    </script>
@stop
