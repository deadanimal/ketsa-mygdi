@extends('layouts.app_mygeo_afiq')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
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
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"></i></a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Mohon Data
                                    </li>
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
                                        <a href="{{ url('mohon_data') }}">
                                            <button type="button"
                                                class="btn btn-sm btn-default float-right">Kembali</button>
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
                                                    type="text" value="{{ $user->name }}" disabled />
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
                                                    value="{{ $user->nric }}" disabled />
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
                                                    type="text" value="{{ $user->agensiOrganisasi->name }}" disabled />
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
                                                    value="{{ $user->email }}" disabled />
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
                                                    type="text" value="{{ $user->phone_pejabat }}" disabled />
                                            </div>
                                            <div class="col-2">
                                                <label class="form-control-label mr-4" for="tel_bimbit">
                                                    Telefon Bimbit
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-control form-control-sm ml-3" name="tel_bimbit"
                                                    type="text" value="{{ $user->phone_bimbit }}" disabled />
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
                                            if (!empty($user->getRoleNames())) {
                                                $count = 1;
                                                foreach ($user->getRoleNames() as $role) {
                                                    ?><input class="form-control form-control-sm ml-3"
                                                    name="peranan" type="text" value="<?php echo $role; ?> "
                                                    disabled /><?php
                                                                                                                                                                                    if ($count != count($user->getRoleNames())) {                                                                    ?>,<?php                                                                                                   }
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
                                                    value="{{ $user->kategori }}" disabled />
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

                                        <a class="btn btn-sm btn-default" data-toggle="modal"
                                            data-target="#modal-senarai-kawasan-data"><span
                                                class="text-white">Tambah</span></a>
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
                                        <a class="btn btn-sm btn-default" data-toggle="modal"
                                            data-target="#modal-dokumen-berkaitan"><span
                                                class="text-white">Tambah</span></a>
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

                                <?php if(Auth::user()->hasRole(['Pentadbir Data','Super Admin'])){ ?>
                                <form action="/kemaskini_permohonan" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <h4 class="heading text-dark mr-2">Status Permohonan</h4>
                                            <select class="form-control form-control-sm mb-4">
                                                <option selected disabled>Pilih</option>
                                                <option value="0">DITERIMA</option>
                                                <option value="1">DITOLAK</option>
                                            </select>

                                            <h4 class="heading text-dark mr-2">Catatan Permohonan</h4>
                                            <input type="text" class="form-control form-control-sm mb-4" name="catatan">

                                            <h4 class="heading text-dark mr-2">Pentadbir Ditugaskan</h4>
                                            <select class="form-control form-control-sm" name="" id=""></select>
                                        </div>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-success">Simpan</button>
                                    </div>
                                    <?php } ?>
                                </form>
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
                                                <option value="application">Application</option>
                                                <option value="document">Document</option>
                                                <option value="gisActivityProject">GIS Activity/Project</option>
                                                <option value="theMap">Map</option>
                                                <option value="rasterData">Raster Data</option>
                                                <option value="services">Services</option>
                                                <option value="software">Software</option>
                                                <option value="vectorData">Vector Data</option>
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
        <!--Modal Tambah Permohonan-->
        <div class="modal fade" id="modal-dokumen-berkaitan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Senarai Data dan Kawasan Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('muatnaikFail') }}" method="post" enctype="multipart/form-data">
                            <h3 class="text-center mb-5">Muat Naik Fail Laravel</h3>
                            @csrf

                            <div class="form-group">
                                <label for="tajuk_dokumen" class="form-control-label">Tajuk Dokumen</label>
                                <input type="text" class="form-control" name="tajuk_dokumen" value="">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                <label class="custom-file-label" for="chooseFile">Pilih Fail</label>
                            </div>
                            <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                            <input type="hidden" name="id" value="{{ $pemohon->id }}">

                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Muat Naik
                            </button>
                        </form>
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
@stop
