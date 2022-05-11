@extends('layouts.app_mygeo_ketsa')

@section('content')
    <style>
        #form-container {
            width: 500px;
        }

        .row.form-group {
            padding-left: 15px;
            padding-right: 15px;
        }

        .change-link {
            background-color: #000;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            bottom: 0;
            color: #fff;
            opacity: 0.8;
            padding: 4px;
            position: absolute;
            text-align: center;
            width: 150px;
        }

        .change-link:hover {
            color: #fff;
            text-decoration: none;
        }

        .hide {
            display: none;
        }

        #editor-container {
            height: 130px;
        }

    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-9 col-8">
                            <h6 class="h2 text-dark d-inline-block mb-0">Dokumen Permohonan</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Pengurusan Portal
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Dokumen Kaitan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-3 col-2 text-right">

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
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="mb-0">Kandungan Dokumen Utama</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body row">
                                <form action="{{ url('simpan_dokumen_desc') }}" id="form_dokumen_desc" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <input type="hidden" name="content_dokumen" id="content_dokumen_desc">
                                        <div id="content_dokumen_input"></div>

                                        <button id="btn_submit_dokumen_desc" class="btn btn-success float-right mt-4"
                                            type="button">
                                            <span class="text-white">Simpan</span>
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="mb-0">Tajuk Dokumen Utama</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <select class="form-control" style="overflow: hidden;" size="9">
                                    @foreach ($dokumen_utama as $dokumen)
                                        <option class="choose-dokumen-{{ $dokumen->id }}" value="{{ $dokumen->id }}"
                                            data-show=".info-dokumen-{{ $dokumen->id }}">
                                            {{ $dokumen->doc_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <a data-toggle="modal" data-target="#modal-tajuk">
                                    <button type="button" class="btn btn-sm btn-default mt-3 float-right"><i
                                            class="fas fa-plus mr-2"></i>Dokumen</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Konfigurasi Muat Turun Borang / Contoh</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body info-dokumen">
                                <form method="POST" class="form-horizontal" action="{{ url('simpan_dokumen') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_dokumen" value="">
                                    <label class="form-control-label">Tajuk</label>
                                    <input type="text" name="title_doc" id="title_doc" class="form-control" value=""
                                        disabled>

                                    <label class="form-control-label mt-4">Jenis Dokumen</label>
                                    <select name="type_dokumen" class="form-control" disabled>
                                        <option selected disabled>Pilih</option>
                                    </select>

                                    <label class="form-control-label mt-4">Lampiran Dokumen</label>
                                    <input type="file" name="file" class="form-control" value="" disabled>

                                </form>
                            </div>
                            @foreach ($dokumen_utama as $dokumen)
                                <div class="card-body hide info-dokumen-{{ $dokumen->id }}">
                                    <form method="POST" class="form-horizontal" action="{{ url('simpan_dokumen') }}"
                                        id="form_dokumen_{{ $dokumen->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_dokumen"
                                            value="{{ !is_null($dokumen) ? $dokumen->id : '' }}">

                                        <label class="form-control-label">Tajuk</label>
                                        <input type="text" name="title_dokumen" id="title_dokumen" class="form-control"
                                            value="{{ !is_null($dokumen) ? $dokumen->doc_name : '' }}">

                                        <label class="form-control-label mt-4">Jenis Dokumen</label>
                                        <select name="type_dokumen" class="form-control">
                                            <option selected disabled>Pilih</option>
                                            <option value="Borang"
                                                {{ $dokumen->doc_type == 'Borang' ? 'selected' : '' }}>
                                                Borang</option>
                                            <option value="Contoh"
                                                {{ $dokumen->doc_type == 'Contoh' ? 'selected' : '' }}>
                                                Contoh</option>
                                        </select>

                                        <label class="form-control-label mt-4">Lampiran Dokumen</label>
                                        <input type="file" name="file" id="icon-img-{{ $dokumen->id }}"
                                            class="form-control mb-2" accept="application/pdf"
                                            value="{{ !is_null($dokumen) ? $dokumen->doc_path : '' }}">

                                        <button type="submit" class="btn btn-success mt-4 float-right">Simpan</button>
                                    </form>
                                    <form method="POST" action="{{ url('/mygeo_buang_dokumen') }}">
                                        @csrf
                                        <button type="submit" class='btn btn-warning mx-2 mt-4 float-right'>Hapus</button>
                                        <input type="hidden" name="dokumen_id" value="{{ $dokumen->id }}">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Tajuk -->
        <div class="modal fade" id="modal-tajuk">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Tajuk Dokumen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/simpan_tajuk_dokumen">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Tajuk</label>
                                    <input type="text" class="form-control" name="tajuk_dokumen"
                                        placeholder="Tajuk dokumen Permohonan">
                                </div>

                                <button class="btn btn-success float-right mt-4" type="submit">
                                    <span class="text-white">Tambah</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var quill_dokumen = new Quill('#content_dokumen_input', {
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
                    }, {
                        'background': []
                    }], // dropdown with defaults from theme
                    [{
                        'font': []
                    }],
                    [{
                        'align': []
                    }],

                    ['clean'],
                ],
            },
            placeholder: 'Kandungan...',
            theme: 'snow',
        });
        quill_dokumen.root.innerHTML = '{!! !is_null($dokumen_desc) ? $dokumen_desc->content : '' !!}';

        $(document).on("click", "#btn_submit_dokumen_desc", function() {
            $("#content_dokumen_desc").val($(
                "#content_dokumen_input > .ql-editor").html());
            $("#form_dokumen_desc").submit();
        });
    </script>

    @foreach ($dokumen_utama as $dokumen)
        <script>
            $(document).on("click", ".choose-dokumen-{{ $dokumen->id }}", function() {
                @foreach ($dokumen_utama as $dokumens)
                    @if ($dokumens->id == $dokumen->id)
                        $('.info-dokumen-{{ $dokumen->id }}').show();
                    @else
                        $('.info-dokumen-{{ $dokumens->id }}').hide();
                    @endif
                    $('.info-dokumen').hide();
                @endforeach
            });
        </script>
    @endforeach

@stop
