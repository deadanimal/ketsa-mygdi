@extends('layouts.app_mygeo_afiq')

@section('content')

<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">

<style>
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Muat Turun Data</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Muat Turun Data
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
                                    <h3 class="mb-0">Senarai Muat Turun Data</h3>
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
                                        <th>NAMA PERMOHONAN</th>
                                        <th>STATUS</th>
                                        <th>TARIKH</th>
                                        <th>TINDAKAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Permohonan Data Selangor</td>
                                        <td><a class="badge badge-pill badge-danger">Dalam
                                                Proses</a></td>
                                        <td>8 September 2021</td>
                                        <td>
                                            <a class="text-muted" disabled><span class="fas fa-download mr-2"></span>
                                                Muat Turun</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Permohonan Data Putrajaya</td>
                                        <td><a class="badge badge-pill badge-success">Data
                                                Tersedia</a></td>
                                        <td>23 Januari 2021</td>
                                        <td>
                                            <a class="text-green" disabled><span class="fas fa-download mr-2"></span>
                                                Muat Turun</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Permohonan Data Asas Kawasan Perindustrian Penang</td>
                                        <td><a class="badge badge-pill badge-success">Data
                                                Tersedia</a></td>
                                        <td>17 Mei 2021</td>
                                        <td>
                                            <a class="text-green"><span class="fas fa-download mr-2"></span>Muat
                                                Turun</a>
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

@stop
