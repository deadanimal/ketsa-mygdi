@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <style>
    </style>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-11 col-12">
                            <h6 class="h2 text-dark d-inline-block mb-0">Laporan Perincian Data Asas</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Laporan Perincian Data Asas
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
                            <div class="card-header bg-default">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="text-white mb-0">Laporan Perincian Data Asas</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container pb-5 pl-lg-5">
                                    <h2 class="text-center text-uppercase py-4">{{ $permohonan->name }}</h2>
                                    <div class="row">
                                        <div class="col-3">
                                            <b>Nama Pemohon</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ $permohonan->users->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <b>Agensi</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ $permohonan->users->agensiOrganisasi->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <b>E-mel</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ $permohonan->users->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <b>Nombor Telefon</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ $permohonan->users->phone_bimbit }}</p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <b>Data Yang Dipohon</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <ol class="mt-1">
                                                @foreach ($senarai_kawasan as $sk)
                                                    <li>{{ $sk->lapisan_data }}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <b>Tarikh Permohonan Data</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ Carbon\Carbon::parse($permohonan->created_at)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <b>Tarikh Penjanaan Laporan</b><label class="float-right">:</label>
                                        </div>
                                        <div class="col-6">
                                            <p>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>

                                    <form action="{{ url('api/laporan_perincian_data') }}" method="POST" target="_blank">
                                        @csrf
                                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                        <button type=submit class="btn btn-sm btn-primary mt-2">Cetak PDF</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>

    </script>
@stop
