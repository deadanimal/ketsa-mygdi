@extends('layouts.app_mygeo_afiq')

@section('content')

<style>
    .ftest{
        display:inline;
        width:auto;
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
                            <h3 class="card-title" style="font-size: 2rem;">Permohonan Baru</h3>
                            <a href="javascript:history.back()">
                                <button type="button" class="btn btn-default float-right">Kembali</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4>Maklumat Pemohon</h4>
                            <div class="form-group row">
                                <label for="nama_penuh" class="col-sm-2">Nama Penuh</label>
                                <input type="text" class="form-control" name="nama_penuh" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="nric" class="col-lg-2">No Kad Pengenalan</label>
                                <input type="text" class="form-control" name="nric" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="institusi" class="col-lg-2">Institusi</label>
                                <input type="text" class="form-control" name="institusi" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-lg-2">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-lg-2">Emel</label>
                                <input type="text" class="form-control" name="email" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="tel_pej" class="col-lg-2">Telefon Pejabat</label>
                                <input type="text" class="form-control" name="tel_pej" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="nric" class="col-lg-2">No Kad Pengenalan</label>
                                <input type="text" class="form-control" name="nric" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="peranan" class="col-lg-2">Peranan</label>
                                <input type="text" class="form-control" name="peranan" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="kategori" class="col-lg-2">Kategori</label>
                                <input type="text" class="form-control" name="kategori" value="" disabled>
                            </div>
                            
                            <br><hr><br>
                            
                            <h4>Maklumat Permohonan</h4>
                            <div class="form-group row">
                                <label for="nama_permohonan" class="col-lg-2">Nama Permohonan</label>
                                <input type="text" class="form-control" name="nama_permohonan" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="date_permohonan" class="col-lg-2">Tarikh Permohonan</label>
                                <input type="text" class="form-control" name="date_permohonan" value="" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="tujuan_permohonan" class="col-lg-2">Tujuan Permohonan</label>
                                <input type="text" class="form-control" name="tujuan_permohonan" value="" disabled>
                            </div>
                            
                            <br><hr></br>
                            
                            <h4>Senarai Data dan Kawasan Data</h4>
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
                            
                            <br><hr></br>
                            
                            <h4>Dokumen Berkaitan</h4>
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
                            
                            <div class="form-group row">
                                <button type="button" class="form-control">Hantar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
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