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
                                <h3 class="card-title" style="font-size: 2rem;">Kategori Pengkelasan Data</h3>
                                <!--                            <a href="{{ url('mohon_data_asas_baru') }}">
                                        <button type="button" class="btn btn-default float-right">Tambah</button>
                                    </a>-->
                            </div>
                            <div class="card-body">
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>KATEGORI</th>
                                            <th>SUB_KATEGORI</th>
                                            <th>LAPISAN DATA</th>
                                            <th>KELAS</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($senarai_data as $sdata)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sdata->kategori }}</td>
                                                <td>{{ $sdata->subkategori }}</td>
                                                <td>{{ $sdata->lapisan_data }}</td>
                                                <td>{{ $sdata->kelas }}</td>
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
        @foreach ($senarai_data as $sdata)
            <div class="modal fade" id="modal-kemaskinidata-{{ $sdata->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary mb-0">
                            <h4 class="text-white">Data ID#{{ $loop->iteration }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="/kemaskini_senarai_data">
                            @csrf
                            <div class="modal-body row">
                                <div class="col-12">
                                    <input type="hidden" name="id_senarai_data" value="{{ $sdata->id }}">
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori</label>
                                        <input type="text" class="form-control form-control-sm" name="kategori"
                                            value="{{ $sdata->kategori }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Sub-Kategori</label>
                                        <input type="text" class="form-control form-control-sm" name="subkategori"
                                            value="{{ $sdata->subkategori }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Lapisan Data</label>
                                        <input type="text" class="form-control form-control-sm" name="lapisan_data"
                                            value="{{ $sdata->lapisan_data }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori Pemohon</label>
                                        <input type="text" class="form-control form-control-sm" name="kategori_pemohon"
                                            value="{{ $sdata->kategori_pemohon }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Kelas</label>
                                        <input type="text" class="form-control form-control-sm" name="kelas"
                                            value="{{ $sdata->kelas }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <select class="form-control form-control-sm" name="status">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tak Aktif">Tak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Harga Data</label>
                                        <input type="text" class="form-control form-control-sm" name="harga_data"
                                            value="{{ $sdata->harga_data }}">
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
