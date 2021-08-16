@extends('layouts.app_mygeo_afiq')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <style>
        .ftest {
            display: inline;
            width: auto;
        }

        .hide {
            display: none;
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
                            <h6 class="h2 text-dark d-inline-block mb-0">
                                @if (Auth::user()->hasRole(['Pemohon Data']))
                                    Mohon Data
                                @elseif (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                    Permohonan Baru
                                @endif

                            </h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"></i></a>
                                    </li>
                                    @if (Auth::user()->hasRole(['Pemohon Data']))
                                        <li aria-current="page" class="breadcrumb-item active">
                                            Mohon Data
                                        </li>
                                    @endif
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Permohonan Baru
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
                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                            <a href="{{ url('mohon_data') }}">
                                            @elseif (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                                <a href="{{ url('permohonan_baru') }}">
                                        @endif
                                        <button type="button" class="btn btn-sm btn-default float-right">Kembali</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10 pl-lg-5">
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="nama_penuh">
                                                    Nama Penuh
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" name="nama_penuh"
                                                    type="text" value="{{ $pemohon->users->name }}" disabled />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="nric">
                                                    No Kad Pengenalan
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" name="nric" type="text"
                                                    value="{{ $pemohon->users->nric }}" disabled />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="agensi_organisasi">
                                                    Institusi
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" name="institusi"
                                                    type="text" value="{{ $pemohon->users->agensi_organisasi }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="email">
                                                    Emel
                                                </label>
                                            </div>
                                            <div class="col-8">
                                                <input class="form-control form-control-sm ml-3" id="email" type="text"
                                                    value="{{ $pemohon->users->email }}" disabled />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="tel_pejabat">
                                                    Telefon Pejabat
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-sm ml-3" name="tel_pejabat"
                                                    type="text" value="{{ $pemohon->users->phone_pejabat }}" disabled />
                                            </div>
                                            <div class="col-2">
                                                <label class="form-control-label mr-4" for="tel_bimbit">
                                                    Telefon Bimbit
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-sm ml-3" name="tel_bimbit"
                                                    type="text" value="{{ $pemohon->users->phone_bimbit }}" disabled />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4" for="peranan">
                                                    Peranan
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <?php
                                            if (!empty($pemohon->users->getRoleNames())) {
                                                $count = 1;
                                                foreach ($pemohon->users->getRoleNames() as $role) {
                                                    ?><input class="form-control form-control-sm ml-3"
                                                    name="peranan" type="text" value="<?php echo $role; ?> "
                                                    disabled /><?php
                                                                                                                                                                                    if ($count != count($pemohon->users->getRoleNames())) {                                                                    ?>,<?php                                                                                                   }
                                                                                                                                                                                                                                                                                                                $count++;
                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                        ?>

                                            </div>
                                            <div class="col-2">
                                                <label class="form-control-label mr-4" for="phone_bimbit">
                                                    Kategori
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-sm ml-3" name="kategori" type="text"
                                                    value="{{ $pemohon->users->kategori }}" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-7">
                                        <h4 class="heading text-muted">Maklumat Permohonan</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        <!-- <button class="btn btn-sm btn-default" type=><span class="text-white">Tambah</span></button> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 pl-lg-5">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Nama Permohonan</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $pemohon->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="date" class="form-control-label">Tarikh Permohonan</label>
                                            <input type="text" class="form-control" name="date"
                                                value="{{ Carbon\Carbon::parse($pemohon->date)->format('d M Y') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tujuan" class="form-control-label">Tujuan Permohonan</label>
                                            <input type="text" class="form-control" name="tujuan"
                                                value="{{ $pemohon->tujuan }}">
                                        </div>
                                        <!-- <input type="hidden" name="user_id" value={{ $user->id }}> -->

                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-7">
                                        <h4 class="heading text-muted">Senarai Data dan Kawasan Data</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                            <a class="btn btn-sm btn-default" data-toggle="modal"
                                                data-target="#modal-senarai-kawasan-data"><span
                                                    class="text-white">Tambah</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>LAPISAN DATA</th>
                                            <th>SUB-KATEGORI</th>
                                            <th>KATEGORI</th>
                                            <th>KAWASAN DATA</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skdatas as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->lapisan_data }}</td>
                                                <td>{{ $data->subkategori }}</td>
                                                <td>{{ $data->kategori }}</td>
                                                <td>{{ $data->kawasan_data }}</td>
                                                <td>
                                                    <button type="button" class="form-control">Lihat</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-7">
                                        <h4 class="heading text-muted">Dokumen Berkaitan</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                            <a class="btn btn-sm btn-default" data-toggle="modal"
                                                data-target="#modal-pilih-upload"><span class="text-white">Tambah</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <table id="table_metadatas2" class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>BIL</th>
                                            <th>TAJUK DOKUMEN</th>
                                            <th>NAMA FAIL</th>
                                            <th>TINDAKAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dokumens as $dokumen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dokumen->tajuk_dokumen }}</td>
                                                <td>{{ $dokumen->nama_fail }}</td>
                                                <td>
                                                    <button type="button" class="form-control">Lihat</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <hr class="my-4">
                                <div class="row mb-3">
                                    <div class="col-7 form-inline">
                                        <h4 class="heading text-dark mr-2">AKUAN PELAJAR</h4>
                                        <button class="btn btn-sm btn-default">Papar</button>
                                    </div>
                                </div>

                                @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                    <form action="/kemaskini_permohonan" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4">
                                                <h4 class="heading text-dark mr-2">Status Permohonan</h4>
                                                <select class="form-control form-control-sm mb-4" name="status"
                                                    onchange="showDiv(this)">
                                                    <option disabled value="0"
                                                        {{ $pemohon->status == '0' ? 'selected' : '' }}>Pilih</option>
                                                    <option value="1" {{ $pemohon->status == '1' ? 'selected' : '' }}>
                                                        DITERIMA</option>
                                                    <option value="2" {{ $pemohon->status == '2' ? 'selected' : '' }}>
                                                        DITOLAK</option>
                                                </select>
                                                <div id="hidden_div_catatan" @if ($pemohon->status == 0 || $pemohon->status == 1) class="hide" @endif>
                                                    <h4 class="heading text-dark mr-2">Catatan Permohonan</h4>
                                                    <input type="text" class="form-control form-control-sm mb-4"
                                                        name="catatan" value="{{ $pemohon->catatan }}">
                                                </div>
                                                <div id="hidden_div_pentadbir" @if ($pemohon->status == 0 || $pemohon->status == 2) class="hide" @endif>
                                                    <h4 class="heading text-dark mr-2">Pentadbir Ditugaskan</h4>
                                                    <select class="form-control form-control-sm" name="assign_admin">
                                                        <option selected disabled>Pilih</option>
                                                        @foreach ($pentadbirdata as $pd)
                                                            <option value="{{ $pd->name }}" @if ($pd->name == $pemohon->assign_admin) selected @endif>{{ $pd->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right">
                                            <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                @elseif (Auth::user()->hasRole(['Pemohon Data']))
                                    <form action="/hantar_permohonan" method="POST">
                                        @csrf
                                        <div class="form-group text-right">
                                            <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                                            <button type="submit" class="btn btn-success">Hantar</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Senarai Kawasan Data -->
        <div class="modal fade" id="modal-senarai-kawasan-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Senarai Data dan Kawasan Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/simpan_senarai_kawasan" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select name="kategori" class="form-control" autofocus>
                                                <option selected disabled>Pilih</option>
                                                <option class="kategori" value="Aeronautical" data-id="Aeronautical">
                                                    Aeronautical</option>
                                                <option value="Built Environment">Built Environment</option>
                                                <option value="Demarcation">Demarcation</option>
                                                <option value="Geology">Geology</option>
                                                <option value="Hydrography">Hydrography</option>
                                                <option value="Hypsography">Hypsography</option>
                                                <option value="Soil">Soil</option>
                                                <option value="Transportation">Transportation</option>
                                                <option value="Utility">Utility</option>
                                                <option value="Vegetation">Vegetation</option>
                                                <option value="Special Use">Special Use</option>
                                                <option value="General">General</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="subKategoriTitle" for="subkategori">Sub-Kategori</label>
                                            <select name="subkategori" class="form-control" autofocus>
                                                <option selected disabled>Pilih</option>
                                                <div class="div_sub Aeronautical" style="display:none;">
                                                    <option value="Air Space - AA">Air Space - AA</option>
                                                    <option value="Aerodrome - AB">Aerodrome - AB</option>
                                                </div>
                                                <div>
                                                    <option value="Residential - BA">Residential - BA</option>
                                                    <option value="Commercial - BB">Commercial - BB</option>
                                                    <option value="Industrial - BC">Industrial - BC</option>
                                                    <option value="- BD">- BD</option>
                                                </div>
                                                <option value="rasterData">Raster Data</option>
                                                <option value="services">Services</option>
                                                <option value="software">Software</option>
                                                <option value="vectorData">Vector Data</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="lapisan_data">Lapisan Data</label>
                                            <select name="lapisan_data" class="form-control" autofocus>
                                                <option selected disabled hidden>Pilih</option>
                                                <option value="Application">Application</option>
                                                <option value="Document">Document</option>
                                                <option value="GIS Activity/Project">GIS Activity/Project</option>
                                                <option value="Map">Map</option>
                                                <option value="Raster Data">Raster Data</option>
                                                <option value="Services">Services</option>
                                                <option value="Software">Software</option>
                                                <option value="Vector Data">Vector Data</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="kawasan_data">Kawasan Data</label>
                                            <input name="kawasan_data" class="form-control"
                                                placeholder="Masukkan Kawasan Data" />
                                        </div>
                                        <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                                        <input type="hidden" name="id" value="{{ $pemohon->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between1">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal Tambah Dokumen -->
        <div class="modal fade" id="modal-dokumen-berkaitan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Dokumen Berkaitan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('muatnaikFail') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tajuk_dokumen" class="form-control-label">Tajuk Dokumen</label>
                                <input type="text" class="form-control" name="tajuk_dokumen" value="">
                            </div>
                            <input type="file" name="file" class="form-control">
                            <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                            <input type="hidden" name="id" value="{{ $pemohon->id }}">

                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Simpan
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Pilih Muat Naik -->
        <div class="modal fade" id="modal-pilih-upload">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Muat Naik</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <a data-toggle="modal" data-target="#modal-dokumen-berkaitan" data-dismiss="modal">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Muat Naik Gambar</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a data-toggle="modal" data-target="#modal-dokumen-berkaitan" data-dismiss="modal">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Muat Naik Dokumen</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
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
            $("#table_metadatas2").DataTable({
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
    <script>
        $(document).ready(function() {
            $(".div_sub").hide();
            $(".subKategoriTitle").hide();

            $(document).on("click", ".kategori", function() {
                var divname = $(this).data('id');
                $(".div_sub").hide();
                $("." + divname).show();
                $(".subKategoriTitle").show();
            });

            $(document).on("click", ".subkategori, function () {
                //            var divname = $(this).data('id');
                //            $(".div_sub").hide();
                //            $("." + divname).show();
                //            $(".subKategoriTitle").show();
            });
        });
    </script>

    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 2) {
                document.getElementById('hidden_div_catatan').style.display = "block";
                document.getElementById('hidden_div_pentadbir').style.display = "none";
            } else
            if (select.value == 1) {
                document.getElementById('hidden_div_catatan').style.display = "none";
                document.getElementById('hidden_div_pentadbir').style.display = "block";
            }
        }
    </script>
@stop
