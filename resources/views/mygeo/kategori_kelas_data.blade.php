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
        <div class=" container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-12 col-11">
                        <h6 class="h2 text-dark d-inline-block mb-0">Kategori Pengkelasan Data</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Kemas Kini Data
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Kategori Pengkelasan Data
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <!-- <div class="col-lg-6 col-5 text-right">

                    </div> -->
                </div>
            </div>
        </div>
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
                                    <h3 class="mb-0">Senarai Kategori Pengkelasan Data</h3>
                                </div>

                                <div class="col-4 text-right">

                                </div>
                            </div>
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
                                    <tr>
                                        <td>1</td>
                                        <td>Aeronautical</td>
                                        <td>Lapangan Terbang (Aerodrome-AB)</td>
                                        <td>Transitional Surface</td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Aeronautical</td>
                                        <td>Lapangan Terbang (Aerodrome-AB)</td>
                                        <td>Transitional Surface</td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Aeronautical</td>
                                        <td>Lapangan Terbang (Aerodrome-AB)</td>
                                        <td>Transitional Surface</td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="form-control">Lihat</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
</script>
@stop
