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
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Panduan Pengguna</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Pengurusan Portal
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Panduan Pengguna
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a data-toggle="modal" data-target="#modal-kategori">
                                <button type="button" class="btn btn-sm btn-default float-right"><i
                                        class="fas fa-plus mr-2"></i>Kategori</button>
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
                                        <h3 class="mb-0">Kategori Panduan Pengguna</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <select class="form-control" style="overflow: hidden;" size="10">
                                    @foreach ($panduan_pengguna as $panduan)
                                        <option class="choose-panduan-{{ $panduan->id }}" value="{{ $panduan->id }}"
                                            data-show=".info-panduan-{{ $panduan->id }}">{{ $panduan->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Konfigurasi Panduan Pengguna</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body info-panduan">
                                <form method="POST" class="form-horizontal"
                                    action="{{ url('simpan_panduan_pengguna') }}">
                                    @csrf
                                    <input type="hidden" name="id_faq" value="">
                                    <input type="hidden" name="content_panduan" id="content_panduan">
                                    <label class="form-control-label">Kategori</label>
                                    <input type="text" name="title_panduan" id="title_panduan" class="form-control"
                                        value="">

                                    <label class="form-control-label mt-4">Pautan Video</label>
                                    <input type="text" name="video_link" class="form-control" value="">

                                    <label class="form-control-label mt-4">Kandungan</label>
                                    <div id="content_panduan_input"></div>

                                </form>
                            </div>
                            @foreach ($panduan_pengguna as $panduan)
                                <div class="card-body hide info-panduan-{{ $panduan->id }}">
                                    <form method="POST" class="form-horizontal"
                                        action="{{ url('simpan_panduan_pengguna') }}" id="form_faq_{{ $panduan->id }}">
                                        @csrf
                                        <input type="hidden" name="id_panduan_pengguna"
                                            value="{{ !is_null($panduan) ? $panduan->id : '' }}">
                                        <input type="hidden" name="content_panduan"
                                            id="content_panduan_{{ $panduan->id }}">
                                        <label class="form-control-label">Kategori</label>
                                        <input type="text" name="title_panduan" id="title_panduan" class="form-control"
                                            value="{{ !is_null($panduan) ? $panduan->title : '' }}">

                                        <label class="form-control-label mt-4">Pautan Video</label>
                                        <input type="text" name="video_link" class="form-control"
                                            value="{{ !is_null($panduan) ? $panduan->video_link : '' }}">

                                        <label class="form-control-label mt-4">Kandungan</label>
                                        <div id="content_panduan_input_{{ $panduan->id }}"></div>


                                        <button id="btn_submit_{{ $panduan->id }}" type="button"
                                            class="btn btn-success mt-4 float-right">Simpan</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Kategori -->
        <div class="modal fade" id="modal-kategori">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary mb-0">
                        <h4 class="text-white">Tambah Kategori Panduan Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/simpan_kategori_panduan">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <input type="text" class="form-control" name="kategori_panduan"
                                        placeholder="Tajuk Panduan Pengguna">
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
    @foreach ($panduan_pengguna as $panduan)
        <script>
            $(document).ready(function() {
                var quill_faq_{{ $panduan->id }} = new Quill('#content_panduan_input_{{ $panduan->id }}', {
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
                quill_faq_{{ $panduan->id }}.root.innerHTML = '{!! !is_null($panduan) ? $panduan->content : '' !!}';

                $(document).on("click", "#btn_submit_{{ $panduan->id }}", function() {
                    $("#content_panduan_{{ $panduan->id }}").val($(
                        "#content_panduan_input_{{ $panduan->id }} > .ql-editor").html());
                    $("#form_faq_{{ $panduan->id }}").submit();
                });
            });
        </script>
    @endforeach
    <script>
        var quill_faq = new Quill('#content_panduan_input', {
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
        quill_faq.root.innerHTML = '';
    </script>

    @foreach ($panduan_pengguna as $panduan)
        <script>
            $(document).on("click", ".choose-panduan-{{ $panduan->id }}", function() {
                @foreach ($panduan_pengguna as $panduans)
                    @if ($panduans->id == $panduan->id)
                        $('.info-panduan-{{ $panduan->id }}').show();
                    @else
                        $('.info-panduan-{{ $panduans->id }}').hide();
                    @endif
                    $('.info-panduan').hide();
                @endforeach
            });
        </script>
    @endforeach



@stop
