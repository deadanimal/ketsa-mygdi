@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <style>
        .ftest {
            display: inline;
            width: auto;
        }

        .ql-align-justify {
            text-align: justify
        }

        .ql-container,
        .ql-editor {
            height: 800px;
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
                                <form action="{{ url('simpan_surat_balasan') }}" method="POST" id="form_surat_balasan">
                                    @csrf
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4">
                                            <div class="form-inline">
                                                Rujukan :
                                                <input type="text" class="form-control form-control-sm ml-2 w-100"
                                                    name="no_rujukan" value="{{ $surat->no_rujukan }}">
                                                <input type="hidden" name="date_mohon" value="{{ $permohonan->date }}">
                                            </div>
                                            <div class="form-inline">
                                                Tarikh : {{ Carbon\Carbon::now()->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div align="justify" class="mx-5">
                                        <textarea class="form-control form-control-sm mt-3" cols="30"
                                            placeholder="Nama dan Alamat"
                                            rows="6">{{ $permohonan->users->name }},&#13;&#10;{{ $permohonan->users->alamat }}
                                                                                                                                                    </textarea>
                                        <br>
                                        {{-- <input type="text" class="form-control form-control-sm heading" name="tajuk_surat"
                                            placeholder="Tajuk Surat Balasan Permohonan"
                                            value="{{ $surat->tajuk_surat }}"> --}}
                                        <label class="form-control-label" for="">Kandungan Surat Balasan</label>
                                        <input type="hidden" name="id_penyataan_privasi"
                                            value="{{ !is_null($surat->content) ? $surat->content : '' }}">
                                        <input type="hidden" name="content_surat_balasan" id="content_surat_balasan">
                                        <div id="content_surat_balasan_input" style="width:100%;"></div>

                                    </div>
                                    <br>
                                    {{-- <div class="mx-7">{!! $surat->content !!}</div> --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                            <input type="hidden" name="id" value="{{ $permohonan->id }}">

                                            @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin', 'Pentadbir Aplikasi']))
                                                <button id="btn_submit" type="button"
                                                    class="btn btn-primary float-right">Simpan</button>
                                            @endif


                                </form>
                                <form action="{{ url('api/dokumen/surat_balasan') }}" method="POST" target="_blank">
                                    @csrf
                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                    <button type=submit class="btn btn-default float-right mx-2">Cetak PDF</button>
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
            $(document).on("click", "#btn_submit", function() {
                $("#content_surat_balasan").val($("#content_surat_balasan_input > .ql-editor")
                    .html());
                $("#form_surat_balasan").submit();
            });

            var quill_surat_balasan = new Quill('#content_surat_balasan_input', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                        ['blockquote', 'code-block'],
                        [{
                            'header': 1
                        }, {
                            'header': 2
                        }], // custom button values
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }], // superscript/subscript
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }], // outdent/indent
                        [{
                            'direction': 'rtl'
                        }], // text direction

                        [{
                            'size': ['small', false, 'large', 'huge']
                        }], // custom dropdown
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        [{
                                'color': []
                            },
                            {
                                'background': []
                            }
                        ], // dropdown with defaults from theme
                        [{
                            'font': []
                        }],
                        [{
                            'align': []
                        }],

                        ['clean'],
                    ],
                },
                placeholder: 'Kandungan ...',
                theme: 'snow',
            });
            quill_surat_balasan.root.innerHTML = `{!! !is_null($surat->content) ? $surat->content : $surat_template !!}`;
        });
    </script>


@stop
