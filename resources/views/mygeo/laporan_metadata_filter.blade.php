@extends('layouts.app_mygeo_afiq2')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header ">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Carian Laporan Metadata</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Carian Laporan Metadata
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
                                        <h3 class="mb-0">Carian Laporan Metadata</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="pl-lg-4 pb-lg-4">
                                    <form action="/laporan_metadata" method="get">
                                        @method('GET')
                                        @csrf
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Jenis Laporan Metadata
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <select name="jenis_laporan" class="form-control form-control-sm ml-3"
                                                    id="cari" required>
                                                    <option hidden selected value="">Sila Pilih</option>
                                                    <option value="bil_metadata_diterbitkan">Bilangan Metadata Diterbitkan
                                                    </option>
                                                    <option value="bil_metadata_belum_diterbitkan">Bilangan Metadata Belum
                                                        Diterbitkan</option>
                                                </select>
                                            </div>
                                        </div>
                                        @unlessrole('Pengesah Metadata')
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label class="form-control-label mr-4">
                                                        Agensi
                                                    </label>
                                                </div>
                                                <label class="float-right">:</label>
                                                <div class="col-8">
                                                    <select name="agensi" class="form-control form-control-sm ml-3">
                                                        <option hidden selected value="">Sila Pilih</option>
                                                        @foreach ($agensi as $agen)
                                                            <option value="{{ $agen->name }}">{{ $agen->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endunless
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Tahun
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm ml-3" name="tahun" 
                                                    id="year" placeholder=" Sila Pilih" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Bulan
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control form-control-sm ml-3" name="bulan" 
                                                    id="month" placeholder=" Sila Pilih"autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Kategori Metadata
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <select name="kategori" class="form-control form-control-sm ml-3">
                                                    <option hidden selected value="">Sila Pilih</option>
                                                    <option value="Dataset">Dataset</option>
                                                    <option value="Services">Services</option>
                                                    <option value="Imagery">Imagery</option>
                                                    <option value="Gridded">Gridded</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Status
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <select name="status" class="form-control form-control-sm ml-3">
                                                    <option hidden selected value="">Sila Pilih</option>
                                                    <option value="Draf">Draf</option>
                                                    <option value="Perlu Pengesahan">Perlu Pengesahan</option>
                                                    <option value="Perlu Pembetulan">Perlu Pembetulan</option>
                                                    <option value="Diterbitkan">Diterbitkan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Sela Masa
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input class="form-control form-control-sm ml-3" type="date"
                                                            name="tarikh_mula" value="{{ $tarikh }}"
                                                            autocomplete="off" />
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control form-control-sm ml-3" type="date"
                                                            name="tarikh_akhir" value="{{ $tarikh }}"
                                                            autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Pengesah
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <select name="pengesah" class="form-control form-control-sm ml-3">
                                                    <option hidden selected value="">Sila Pilih</option>
                                                    @foreach ($senarai_pengesah as $key => $val)
                                                        <option value="{{ $val }}">{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-3">
                                                <label class="form-control-label mr-4">
                                                    Penerbit
                                                </label>
                                            </div>
                                            <label class="float-right">:</label>
                                            <div class="col-8">
                                                <select name="penerbit" class="form-control form-control-sm ml-3">
                                                    <option hidden selected value="">Sila Pilih</option>
                                                    <option value="bil_metadata_diterbitkan">Bilangan Metadata Diterbitkan
                                                    </option>
                                                    <option value="bil_metadata_belum_diterbitkan">Bilangan Metadata Belum
                                                        Diterbitkan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end align-items-end mt-3">

                                            <button class="btn btn-primary btn-sm mr-3" type="submit"><i
                                                    class="fas fa-search"></i> CARI</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#year").datepicker({
                format: "yyyy",
                startView: "years",
                minViewMode: "years",
                minViewMode: "years",
                updateViewDate: true,
                changeYear: true,
                autoclose: true,
            });

            $("#month").datepicker({
                format: "mm",
                startView: "months",
                minViewMode: "months",
                minViewMode: "months",
                updateViewDate: true,
                changeYear: true,
                autoclose: true,
            })
        });
    </script>
@stop
