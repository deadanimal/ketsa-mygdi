@extends('layouts.app_mygeo_ketsa')

@section('content')

    <style>


    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header ">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-12">
                            <h6 class="h2 text-dark d-inline-block mb-0">Kemas Kini Data</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Kemas Kini Data
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Kategori Pengkelasan Perkongsian Data
                                    </li>
                                </ol>
                            </nav>
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
                                    <div class="col-10">
                                        <h3 class="mb-0">Kategori Pengkelasan Perkongsian Data</h3>
                                    </div>
                                    <div class="col-2 text-right">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>KATEGORI</th>
                                            <th>SUB-KATEGORI</th>
                                            <th>STATUS</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $sdata)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sdata->category }}</td>
                                                <td>{{ $sdata->subcategory }}</td>
                                                <td>
                                                    @if ($sdata->status == '1')
                                                        <span class="badge badge-pill badge-success">Aktif</span>
                                                    @elseif($sdata->status == '0')
                                                        <span class="badge badge-pill badge-danger">Tak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-toggle="modal"
                                                        data-target="#modal-kemaskinidata-{{ $sdata->id }}">
                                                        <button type="button" class="btn btn-sm btn-success"><i
                                                                class="fas fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" data-senaraidataid="{{ $sdata->id }}"
                                                        class="btnDelete btn btn-sm btn-danger mx-2"><i
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

        <!-- Modal Kemaskini Data-->
        @foreach ($kategori as $sdata)
            <div class="modal fade" id="modal-kemaskinidata-{{ $sdata->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="text-white">Kategori Pengkelasan Perkongsian Data ID#{{ $loop->iteration }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="/kemaskini_kelas_kongsi">
                            @csrf
                            <div class="modal-body row">
                                <div class="col-12">
                                    <input type="hidden" name="id_kelas_kongsi" value="{{ $sdata->id }}">
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori</label>
                                        <input type="text" class="form-control form-control-sm" name="kategori"
                                            value="{{ $sdata->category }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Sub-Kategori</label>
                                        <input type="text" class="form-control form-control-sm" name="subkategori"
                                            value="{{ $sdata->subcategory }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <select class="form-control form-control-sm" name="status">
                                            <option disabled selected>Pilih</option>
                                            <option value="1" {{ $sdata->status == '1' ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ $sdata->status == '0' ? 'selected' : '' }}>Tak Aktif</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-success float-right" type="submit">
                                        <span class="text-white">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function() {
            $("#table_metadatas").DataTable({
                "ordering": false,
                "responsive": true,
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
                }
            });
        });
    </script>
@stop
