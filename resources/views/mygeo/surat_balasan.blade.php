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
            <div class=" container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Surat Balasan</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Proses Data
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Surat Balasan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-header bg-default">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="text-white mb-0">Surat Balasan</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="/simpan_surat_balasan" method="POST">
                                    @csrf
                                    <input type="text" class="form-control form-control-sm" name="no_rujukan" placeholder="Tajuk" value="">
                                    <input type="date" class="form-control form-control-sm" disabled >
                                    <textarea class="form-control form-control-sm" cols="30" placeholder="Nama dan Alamat" rows="10"></textarea>
                                    <input type="text" class="form-control form-control-sm" name="tajuk_surat" placeholder="Tajuk Surat Balasan Permohonan">
                                    <input type="text" class="form-control form-control-sm" name="no_rujukan_mohon" placeholder="No rujukan Permohonan">
                                    <input type="date" class="form-control form-control-sm" name="date_mohon" placeholder="Tarikh Permohonan">

                                    <input type="hidden" name="permohonan_id" value="{{$pemohon->id}}">
                                    <input type="hidden" name="id" value="{{$pemohon->id}}">

                                    @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop
