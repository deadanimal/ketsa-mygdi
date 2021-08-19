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
                            <p>
                                        (Sila nyatakan tajuk tesis/projek/kajian
                                        <input type="text" class="form-control form-control-sm" name="title"
                                            placeholder="Tajuk" value="{{ $akuan->title }}">
                                        1. Saya (nyatakan nama)<input type="text" class="form-control form-control-sm"
                                            name="nama" disabled value="{{ $pemohon->users->name }}">
                                        K.P. No <input type="text" class="form-control form-control-sm" name="nric" disabled
                                            placeholder="No Kad Pengenalan" value="{{ $pemohon->users->nric }}"> yang
                                        bertandatangan di bawah ini, sebagai
                                        seorang pelajar di (nyatakan nama Universiti/Institusi dan alamat penuh)
                                        <input type="text" class="form-control form-control-sm" name="agensi_organisasi"
                                            disabled placeholder="Agensi/Organisasi"
                                            value="{{ $pemohon->users->agensi_organisasi }}">
                                        dengan ini memberi jaminan bahawa saya akan menggunakan (nyatakan
                                        sama ada peta topografi / foto udara dan sebagainya)
                                        .......................................
                                        ………………….....................................................................................................
                                        seperti butir-butir di bawah ini dengan mematuhi sepenuhnya syarat-syarat
                                        yang disebutkan di bawah.<br>
                                        2. Senarai Dokumen Geospatial Terperingkat<br>
                                        (i) Peta Topografi:
                                        (a) <input type="text" class="form-control form-control-sm" name="peta_topo_a"
                                            placeholder="Peta Topologi A" value="{{ $akuan->peta_topo_a }}">
                                        (b) <input type="text" class="form-control form-control-sm" name="peta_topo_b"
                                            placeholder="Peta Topologi B" value="{{ $akuan->peta_topo_b }}">
                                        (c) <input type="text" class="form-control form-control-sm" name="peta_topo_c"
                                            placeholder="Peta Topologi C" value="{{ $akuan->peta_topo_c }}"><br>
                                        (ii) Foto Udara:
                                        (a) <input type="text" class="form-control form-control-sm" name="foto_udara_a"
                                            placeholder="Foto Udara A" value="{{ $akuan->foto_udara_a }}">
                                        (b) <input type="text" class="form-control form-control-sm" name="foto_udara_b"
                                            placeholder="Foto Udara B" value="{{ $akuan->foto_udara_b }}">
                                        (c) <input type="text" class="form-control form-control-sm" name="foto_udara_c"
                                            placeholder="Foto Udara C" value="{{ $akuan->foto_udara_c }}"><br>

                                        (iii) Lain-lain:
                                        (a) <input type="text" class="form-control form-control-sm" name="lain_a"
                                            placeholder="Lain-lain A">
                                        (b) <input type="text" class="form-control form-control-sm" name="lain_b"
                                            placeholder="Lain-lain B">
                                        (c) <input type="text" class="form-control form-control-sm" name="lain_c"
                                            placeholder="Lain-lain C">
                                        3. Syarat-syarat
                                        (i) Di samping syarat-syarat yang dinyatakan di dalam Borang
                                        PPNM – 1 (Pind. 1/2008) PERMOHONAN MEMBELI DOKUMEN GEOSPATIAL
                                        TERPERINGKAT, maklumat-maklumat berkenaan akan digunakan
                                        mengikut prinsip PERLU MENGETAHUI.
                                        (ii) Penggunaan bahan-bahan dengan Hak Cipta Kerajaan akan dibataskan
                                        kepada keperluan sendiri sahaja. Penggunaan bahan-bahan berkenaan
                                        untuk tujuan lain tidak dibenarkan.
                                        (iii) Kandungan bahan-bahan ini tidak akan dihebahkan atau disampaikan
                                        secara langsung atau tidak langsung kepada pihak akhbar atau orang lain
                                        yang tidak diberi kuasa untuk menerimanya.
                                        (iv) Bahan-bahan ini akan dibawa balik ke Malaysia dalam masa 6 bulan.
                                        Pengarah Pemetaan Negara, Malaysia hendaklah diberitahu mengenai
                                        tarikh bahan-bahan dibawa keluar dan dikembalikan ke Malaysia.<br><br>
                                        Tandatangan
                                        Pelajar:<input type="text" class="form-control form-control-sm" name="digital_sign"
                                            placeholder="Digital Sign">
                                        Tarikh:<input type="date" class="form-control form-control-sm">
                                        Nama:<input type="text" class="form-control form-control-sm" value="{{ $pemohon->users->name }}">
                                        Alamat:<input type="text" class="form-control form-control-sm" value="{{ $pemohon->users->alamat }}">
                                        <input type="hidden" name="permohonan_id" value="{{ $pemohon->id }}">
                                        <input type="hidden" name="id" value="{{ $pemohon->id }}">

                                        @if (Auth::user()->hasRole(['Pemohon Data']))
                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                        @endif
                            </p>
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
