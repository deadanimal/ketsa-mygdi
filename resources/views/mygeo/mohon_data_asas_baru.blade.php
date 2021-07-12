@extends('layouts.app_mygeo_afiq')

@section('content')

<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">
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
                                    <a href="javascript:history.back()">
                                        <button type="button" class="btn btn-sm btn-default float-right">Kembali</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="heading text-muted">Maklumat Pemohon</h4>
                            <div class="row">
                                <div class="col-10 pl-lg-5">
                                    <div class="form-group">
                                        <label for="nama_penuh" class="form-control-label">Nama Penuh</label>
                                        <input type="text" class="form-control form-control-sm" name="nama_penuh" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nric" class="form-control-label">No Kad Pengenalan</label>
                                        <input type="text" class="form-control form-control-sm" name="nric" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="institusi" class="form-control-label">Institusi</label>
                                        <input type="text" class="form-control form-control-sm" name="institusi" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input type="text" class="form-control form-control-sm" name="alamat" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Emel</label>
                                        <input type="text" class="form-control form-control-sm" name="email" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tel_pej" class="form-control-label">Telefon Pejabat</label>
                                        <input type="text" class="form-control form-control-sm" name="tel_pej" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nric" class="form-control-label">No Kad Pengenalan</label>
                                        <input type="text" class="form-control form-control-sm" name="nric" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="peranan" class="form-control-label">Peranan</label>
                                        <input type="text" class="form-control form-control-sm" name="peranan" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori" class="form-control-label">Kategori</label>
                                        <input type="text" class="form-control form-control-sm" name="kategori" value="" disabled>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="heading text-muted">Maklumat Permohonan</h4>
                            <div class="row">
                                <div class="col-10 pl-lg-5">
                                    <div class="form-group">
                                        <label for="nama_permohonan" class="form-control-label">Nama Permohonan</label>
                                        <input type="text" class="form-control form-control-sm" name="nama_permohonan" value="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_permohonan" class="form-control-label">Tarikh Permohonan</label>
                                        <input type="date" class="form-control form-control-sm" name="date_permohonan" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan_permohonan" class="form-control-label">Tujuan Permohonan</label>
                                        <input type="text" class="form-control form-control-sm" name="tujuan_permohonan" value="" disabled>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="heading text-muted">Senarai Data dan Kawasan Data</h4>
                            <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>BIL</th>
                                        <th>LAPISAN DATA</th>
                                        <th>SUB_KATEGORI</th>
                                        <th>KATEGORI</th>
                                        <th>KAWASAN DATA</th>
                                        <th>TINDAKAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr class="my-4">

                            <h4 class="heading text-muted">Dokumen Berkaitan</h4>
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
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-success">Hantar</button>
                            </div>
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
@stop
