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
                            <h6 class="h2 text-dark d-inline-block mb-0">Soalan Lazim</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Pengurusan Portal
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Soalan Lazim
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
                    <div class="col-4">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Kategori Soalan Lazim</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <select class="form-control" style="overflow: hidden;" size="10">
                                    @foreach ($faqs as $faq)
                                        <option class="choose-faqs-{{ $faq->id }}" value="{{ $faq->id }}"
                                            data-show=".info-faq-{{ $faq->id }}">{{ $faq->category }}
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
                                        <h3 class="mb-0">Konfigurasi Soalan Lazim</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body info-faq">
                                <form method="POST" class="form-horizontal" action="{{ url('update_faq') }}"></form>
                                @csrf
                                <input type="hidden" name="id_faq" value="">
                                <input type="hidden" name="content_faq" id="content_faq">
                                <input type="hidden" name="title_faq" id="title_faq" value="Soalan Lazim (FAQ)">
                                <label class="form-control-label">Kategori</label>
                                <input type="text" name="category_faq" id="category_faq" class="form-control" value="">

                                <label class="form-control-label mt-4">Kandungan</label>
                                <div id="content_faq_input"></div>

                                </form>
                            </div>
                            @foreach ($faqs as $faq)
                                <div class="card-body hide info-faq-{{ $faq->id }}">
                                    <form method="POST" class="form-horizontal" action="{{ url('update_faq') }}"
                                        id="form_faq_{{ $faq->id }}">
                                        @csrf
                                        <input type="hidden" name="id_faq" value="{{ !is_null($faq) ? $faq->id : '' }}">
                                        <input type="hidden" name="content_faq" id="content_faq_{{ $faq->id }}">
                                        <input type="hidden" name="title_faq" id="title_faq" value="Soalan Lazim (FAQ)">
                                        <label class="form-control-label">Kategori</label>
                                        <input type="text" name="category_faq" id="category_faq" class="form-control"
                                            value="{{ !is_null($faq) ? $faq->category : '' }}">

                                        <label class="form-control-label mt-4">Kandungan</label>
                                        <div id="content_faq_input_{{ $faq->id }}"></div>

                                        <button id="btn_submit_{{ $faq->id }}" type="button"
                                            class="btn btn-success mt-4 float-right">Simpan</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @foreach ($faqs as $faq)
        <script>
            $(document).ready(function() {
                var quill_faq_{{ $faq->id }} = new Quill('#content_faq_input_{{ $faq->id }}', {
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
                quill_faq_{{ $faq->id }}.root.innerHTML = '{!! !is_null($faq) ? $faq->content : '' !!}';

                $(document).on("click", "#btn_submit_{{ $faq->id }}", function() {
                    $("#content_faq_{{ $faq->id }}").val($(
                        "#content_faq_input_{{ $faq->id }} > .ql-editor").html());
                    $("#form_faq_{{ $faq->id }}").submit();
                });
            });
        </script>
    @endforeach
    <script>
        var quill_faq = new Quill('#content_faq_input', {
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

    <script>
        $(document).on("click", ".choose-faqs-1", function() {
            $('.info-faq-1').show();
            $('.info-faq-2').hide();
            $('.info-faq').hide();
        });

        $(document).on("click", ".choose-faqs-2", function() {
            $('.info-faq-2').show();
            $('.info-faq-1').hide();
            $('.info-faq').hide();
        });
    </script>


@stop
