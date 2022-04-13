@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <style>
        .ftest {
            display: inline;
            width: auto;
        }

        .form-control,
        .form-control:disabled {
            /* border-width: 0;
                                                                background-color: white */
        }

        ol.roman {
            counter-reset: roman;
        }

        ol.alpha {
            counter-reset: alpha;
            padding-left: 0;
        }

        ol.roman li,
        ol.alpha li {
            list-style: none;
            /* position: relative; */
        }

        ol.roman>li:before {
            counter-increment: roman;
            content: "("counter(roman, lower-roman)") "
        }

        ol.alpha>li:before {
            counter-increment: alpha;
            content: "("counter(alpha, lower-alpha)") "
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
                                        <h3 class="text-white mb-0">Maklumat Borang Akuan Pelajar</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ url('simpan_akuan_pelajar') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="text-center">AKUAN PELAJAR</h3>

                                    <div class="form-group mx-6">
                                        <label for="tajuk_kajian" class="mb-0">Tajuk
                                            Tesis/Projek/Kajian</label>
                                        <input type="text" class="form-control form-control-sm" name="title"
                                            placeholder="Tajuk" value="{{ $akuan->title }}">
                                        <br>
                                        <label class="mb-0">Nama Pemohon</label>
                                        <input type="text" class="form-control form-control-sm mb-2" name="nama[]"
                                            value="{{ $akuan->nama1 ?? $permohonan->users->name }}">
                                        <label class="mb-0">No Kad Pengenalan</label>
                                        <input type="text" class="form-control form-control-sm mb-2" name="nric"
                                            placeholder="No Kad Pengenalan"
                                            value="{{ $akuan->nric ?? $permohonan->users->nric }}">
                                        <label class="mb-0">Nama Institusi dan Alamat</label>
                                        <textarea name="agensi_organisasi" rows="4" class="form-control form-control-sm" name="agensi_organisasi">{{ $akuan->agensi_organisasi ?? $permohonan->users->agensiOrganisasi->name . ',' . $permohonan->users->alamat }}  
                                        </textarea>
                                        <br>
                                        <h3 class="heading">Senarai Dokumen Geospatial Terperingkat</h3>
                                        <label>(i) Peta Topografi</label>
                                        <div class="form-inline mb-2">(a)<input type="text"
                                                class="form-control form-control-sm mx-2" name="peta_topo_a" disabled
                                                value="{{ $akuan->peta_topo_a }}"></div>
                                        <div class="form-inline mb-2">(b)<input type="text"
                                                class="form-control form-control-sm mx-2" name="peta_topo_b" disabled
                                                value="{{ $akuan->peta_topo_b }}"></div>
                                        <div class="form-inline mb-2">(c)<input type="text"
                                                class="form-control form-control-sm mx-2" name="peta_topo_c" disabled
                                                value="{{ $akuan->peta_topo_c }}"></div>
                                        <br>
                                        <label>(ii) Foto Udara</label>
                                        <div class="form-inline mb-2">(a)<input type="text"
                                                class="form-control form-control-sm mx-2" name="foto_udara_a" disabled
                                                value="{{ $akuan->foto_udara_a }}"></div>
                                        <div class="form-inline mb-2">(b)<input type="text"
                                                class="form-control form-control-sm mx-2" name="foto_udara_b" disabled
                                                value="{{ $akuan->foto_udara_b }}"></div>
                                        <div class="form-inline mb-2">(c)<input type="text"
                                                class="form-control form-control-sm mx-2" name="foto_udara_c" disabled
                                                value="{{ $akuan->foto_udara_c }}"></div>

                                        <br>
                                        <label>(iii) Lain-lain</label>
                                        <ol class="alpha">
                                            @foreach ($skdatas as $sk)
                                                <li><i>{{ $sk->lapisan_data }},
                                                        {{ $sk->kawasan_data }}</i></li>
                                            @endforeach
                                        </ol>
                                        <br><br>
                                        <div class="">
                                            <label class="mb-0">Tandatangan Pelajar:</label><br>
                                            <img src="{{ $akuan->digital_sign }}" alt="Gambar Tandatangan" height="120"
                                                class="preview-image-before-upload">
                                            @if (Auth::user()->hasRole(['Pemohon Data']))
                                                <input type="file" class="form-control form-control-sm py-0" name="file"
                                                    id="signature" placeholder="Digital Sign"
                                                    accept="image/jpeg, image/png">
                                            @endif
                                            <input type="hidden" name="date_sign"
                                                value="{{ $akuan->tarikh ?? Carbon\Carbon::now() }}">
                                            <br>
                                            <label class="mb-0"> Tarikh:</label>
                                            <input type="text" class="form-control form-control-sm mb-2"
                                                placeholder="Auto Pilih Tarikh Semasa" disabled
                                                value="{{ Carbon\Carbon::parse($akuan->date_mohon)->format('d M Y') }}">
                                            <label class="mb-0">Nama:</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $akuan->nama2 ?? $permohonan->users->name }}" name="nama[]">
                                            Alamat:
                                            <textarea class="form-control form-control-sm" cols="30" rows="6"
                                                name="alamat">{{ $akuan->alamat ?? $permohonan->users->alamat }}</textarea>
                                        </div>

                                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                        <input type="hidden" name="id" value="{{ $permohonan->id }}">

                                    </div>
                            </div>
                            <div class="row p-4">
                                <div class="col">
                                    @if (Auth::user()->hasRole(['Pemohon Data']))
                                        <button type="submit" class="btn float-right btn-success">Simpan</button>
                                    @endif
                                    </form>
                                    <form action="{{ url('api/dokumen/akuan_pelajar') }}" method="POST" target="_blank">
                                        @csrf
                                        <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                        <button type=submit class="btn btn-primary float-right mx-2"
                                            @if (!$akuan->digital_sign) disabled @endif>Papar PDF</button>
                                    </form>
                                </div>
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
                    "sInfoEmpty": "Paparan 0 rekod (0 hingga 0)",
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#signature').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('.preview-image-before-upload').attr('src', e.target.result);

                    console.log('gambar', e.target.result)
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@stop
