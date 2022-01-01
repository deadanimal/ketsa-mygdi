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
                            <h6 class="h2 text-dark d-inline-block mb-0">Tatacara Permohonan</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Pengurusan Portal
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Tatacara Permohonan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-3 col-2 text-right">
                            <a data-toggle="modal" data-target="#modal-tajuk">
                                <button type="button" class="btn btn-sm btn-default float-right"><i
                                        class="fas fa-plus mr-2"></i>Tatacara</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="mb-0">Tajuk Tatacara Permohonan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <select class="form-control" style="overflow: hidden;" size="10">
                                    @foreach ($tatacara_mohon as $tatacara)
                                        <option class="choose-tatacara-{{ $tatacara->id }}" value="{{ $tatacara->id }}"
                                            data-show=".info-tatacara-{{ $tatacara->id }}">{{ $loop->iteration }})
                                            {{ $tatacara->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h3 class="mb-0">Kandungan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <label class="form-control-label mt-4">Kandungan</label>
                                <div id="content_dokumen_input"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Konfigurasi Tatacara Permohonan</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body info-tatacara">
                                <form method="POST" class="form-horizontal" action="{{ url('simpan_tatacara') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_faq" value="">
                                    <input type="hidden" name="content_dokumen" id="content_dokumen">
                                    <label class="form-control-label">Tajuk Rujukan</label>
                                    <input type="text" name="doc_name" id="doc_name" class="form-control" value=""
                                        disabled>

                                    <label class="form-control-label mt-4">Muat Naik Dokumen</label>
                                    <input type="file" name="file" class="form-control" value="" disabled>

                                </form>
                            </div>
                            @foreach ($tatacara_mohon as $tatacara)
                                <div class="card-body hide info-tatacara-{{ $tatacara->id }}">
                                    <form method="POST" class="form-horizontal" action="{{ url('simpan_tatacara') }}"
                                        id="form_tatacara_{{ $tatacara->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_tatacara"
                                            value="{{ !is_null($tatacara) ? $tatacara->id : '' }}">
                                        <input type="hidden" name="content_dokumen"
                                            id="content_tatacara_{{ $tatacara->id }}">
                                        <label class="form-control-label">Tajuk</label>
                                        <input type="text" name="doc_name" id="doc_name" class="form-control"
                                            value="{{ !is_null($tatacara) ? $tatacara->title : '' }}">

                                        <label class="form-control-label mt-4">Gambar Ikon</label>
                                        <input type="file" name="file" id="icon-img-{{ $tatacara->id }}"
                                            class="form-control mb-2" accept="image/jpeg, image/png"
                                            value="{{ !is_null($tatacara) ? $tatacara->icon_path : '' }}">
                                        <img src="{{ !is_null($tatacara) ? $tatacara->icon_path : '' }}" alt="icon img"
                                            height="120" class="preview-image-{{ $tatacara->id }}"><br>

                                        <label class=" form-control-label mt-4">Kandungan</label>
                                        <div id="content_tatacara_input_{{ $tatacara->id }}"></div>


                                        <button id="btn_submit_{{ $tatacara->id }}" type="button"
                                            class="btn btn-success mt-4 float-right">Simpan</button>
                                    </form>
                                    <form method="POST" action="{{ url('/mygeo_buang_tatacara') }}">
                                        @csrf
                                        <button type="submit" class='btn btn-warning mx-2 mt-4 float-right'>Hapus</button>

                                        <input type="hidden" name="tatacara_id" value="{{ $tatacara->id }}">
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
                        <h4 class="text-white">Tambah Tatacara Permohonan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/simpan_tajuk_tatacara">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Tajuk</label>
                                    <input type="text" class="form-control" name="tajuk_tatacara"
                                        placeholder="Tajuk Tatacara Permohonan">
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
    @foreach ($tatacara_mohon as $tatacara)
        <script>
            $(document).ready(function() {
                var quill_tatacara_{{ $tatacara->id }} = new Quill(
                    '#content_tatacara_input_{{ $tatacara->id }}', {
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
                        placeholder: 'Compose an epic...',
                        theme: 'snow',
                    });
                quill_tatacara_{{ $tatacara->id }}.root.innerHTML = '{!! !is_null($tatacara) ? $tatacara->content : '' !!}';

                $(document).on("click", "#btn_submit_{{ $tatacara->id }}", function() {
                    $("#content_tatacara_{{ $tatacara->id }}").val($(
                        "#content_tatacara_input_{{ $tatacara->id }} > .ql-editor").html());
                    $("#form_tatacara_{{ $tatacara->id }}").submit();
                });
            });
        </script>
    @endforeach
    <script>
        var quill_tatacara = new Quill('#content_dokumen_input', {
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
        quill_tatacara.root.innerHTML = '';
    </script>

    @foreach ($tatacara_mohon as $tatacara)
        <script>
            $(document).on("click", ".choose-tatacara-{{ $tatacara->id }}", function() {
                @foreach ($tatacara_mohon as $tatacaras)
                    @if ($tatacaras->id == $tatacara->id)
                        $('.info-tatacara-{{ $tatacara->id }}').show();
                    @else
                        $('.info-tatacara-{{ $tatacaras->id }}').hide();
                    @endif
                    $('.info-tatacara').hide();
                @endforeach
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $('#icon-img-{{ $tatacara->id }}').change(function() {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('.preview-image-{{ $tatacara->id }}').attr('src', e.target.result);

                        console.log('gambar', e.target.result)
                    }
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endforeach






@stop
