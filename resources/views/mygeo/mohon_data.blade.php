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
                                    <div class="col-6">
                                        <h3 class="mb-0">Permohonan Baru</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="row">
                                            <div class="col-8 text-left">
                                                @if ($lengkapkan_penilaian)
                                                    <small class="text-danger">*Sila lengkapkan penilaian data untuk
                                                        membuat
                                                        permohonan baru.</small>
                                                @endif
                                            </div>
                                            <div class="col-4">
                                                <a data-toggle="modal" class="px-0"
                                                    data-target="#modal-permohonan-baru {{ $lengkapkan_penilaian ? '#' : '' }}">
                                                    <button type="button"
                                                        class="btn btn-sm btn-default float-right {{ $lengkapkan_penilaian ? 'disabled' : '' }}"><i
                                                            class="fas fa-plus mr-3"></i>Permohonan Baru</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_permohonan" class="tb table-bordered table-striped" style="width:100%;">
                                    <colgroup>
                                        <col width="50px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK PERMOHONAN</th>
                                            <th>STATUS</th>
                                            <th>TARIKH</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan_list as $permohonan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permohonan->name }}</td>
                                                <td>
                                                    @if (!$permohonan->dihantar == 1)
                                                        <span class="badge badge-pill badge-primary">Draf</span>
                                                    @else
                                                        <span class="badge badge-pill badge-info">Baru</span>
                                                    @endif
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($permohonan->date)->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="{{ url('lihat_permohonan/' . $permohonan->id) }}"
                                                        class="btn btn-sm btn-success text-center {{ $lengkapkan_penilaian ? 'disabled' : '' }}"><i
                                                            class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-permohonanid="{{ $permohonan->id }}"
                                                        class="btnDelete btn btn-sm btn-danger"><i
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
                                    <label for="name" class="form-control-label">Tajuk Permohonan</label>
                                    <input type="text" class="form-control form-control-sm" id="tajukPermohonan" name="name"
                                        value="">
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
            $("#tajukPermohonan").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            $("#table_permohonan").DataTable({
                "dom": "<'row'<'col-sm-6'i><'col-sm-0 text-center'><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-4'<'col-sm-5'l><'col-sm-7'p>>",
                "scrollX": true,
                "ordering": false,
                // "responsive": true,
                "autoWidth": false,
                "oLanguage": {
                    "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
                    "sInfoEmpty": "Paparan 0 rekod (0 hingga 0)",
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
