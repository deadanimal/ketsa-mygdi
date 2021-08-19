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
                            <h6 class="h2 text-dark d-inline-block mb-0">Akuan Pelajar</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Mohon Data
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Akuan Pelajar
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
                                        <h3 class="text-white mb-0">Borang Akuan Pelajar</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="/simpan_akuan_pelajar" method="POST">
                                    @csrf
                                    <h4 class="heading text-center">Akuan Pelajar</h4>
                                    <p>Tajuk Kajian/Projek/Thesis</p>
                                    Tajuk
                                    <input type="text" class="form-control form-control-sm" name="title" placeholder="Tajuk" value="{{$akuan->title}}">
                                    <input type="text" class="form-control form-control-sm" name="nama" disabled value="{{$pemohon->users->name}}">
                                    <input type="text" class="form-control form-control-sm" name="nric" disabled placeholder="No Kad Pengenalan" value="{{$pemohon->users->nric}}">
                                    <input type="text" class="form-control form-control-sm" name="agensi_organisasi" disabled placeholder="Agensi/Organisasi" value="{{$pemohon->users->agensi_organisasi}}">
                                    <input type="text" class="form-control form-control-sm" name="peta_topo_a" placeholder="Peta Topologi A" value="{{$akuan->peta_topo_a}}">
                                    <input type="text" class="form-control form-control-sm" name="peta_topo_b" placeholder="Peta Topologi B" value="{{$akuan->peta_topo_b}}">
                                    <input type="text" class="form-control form-control-sm" name="peta_topo_c" placeholder="Peta Topologi C" value="{{$akuan->peta_topo_c}}">

                                    <input type="text" class="form-control form-control-sm" name="foto_udara_a" placeholder="Foto Udara A">
                                    <input type="text" class="form-control form-control-sm" name="foto_udara_b" placeholder="Foto Udara B">
                                    <input type="text" class="form-control form-control-sm" name="foto_udara_c" placeholder="Foto Udara C">

                                    <input type="text" class="form-control form-control-sm" name="lain_a" placeholder="Lain-lain A">
                                    <input type="text" class="form-control form-control-sm" name="lain_b" placeholder="Lain-lain B">
                                    <input type="text" class="form-control form-control-sm" name="lain_c" placeholder="Lain-lain C">

                                    <input type="text" class="form-control form-control-sm" name="digital_sign" placeholder="Digital Sign">

                                    <input type="hidden" name="permohonan_id" value="{{$pemohon->id}}">
                                    <input type="hidden" name="id" value="{{$pemohon->id}}">

                                    @if (Auth::user()->hasRole(['Pemohon Data']))
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
