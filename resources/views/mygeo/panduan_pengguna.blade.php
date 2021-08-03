@extends('layouts.app_mygeo_afiq')

@section('content')
<style>
    #form-container {
        width: 500px;
    }

    .row.form-group {
        padding-left: 15px;
        padding-right: 15px;
    }

    .btn {
        margin-left: 15px;
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
                                <div class="col-8">
                                    <h3 class="mb-0">Konfigurasi Panduan Pengguna</h3>
                                </div>
                                <div class="col-4 text-right">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form-horizontal" action="{{url('simpan_panduan_pengguna')}}" id="form_portal_settings">
                                @csrf
                                <input type="hidden" name="id_panduan_pengguna" value="{{ (!is_null($panduan_pengguna) ? $panduan_pengguna->id:'')}}">
                                <input type="hidden" name="content_panduan_pengguna" id="content_panduan_pengguna">
                                <label class="form-control-label">Tajuk</label>

                                <input type="text" name="title_panduan_pengguna" id="title_panduan_pengguna" class="form-control" value="{{ (!is_null($panduan_pengguna) ? $panduan_pengguna->title:'') }}">

                                <label class="form-control-label mt-4">Kandungan</label>
                                <div id="content_panduan_pengguna_input"></div>

                                <button id="btn_submit" type="button" class="btn btn-success mt-4 float-right">Simpan</button>
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
        $(document).on("click", "#btn_submit", function() {
            $("#content_panduan_pengguna").val($("#content_panduan_pengguna_input > .ql-editor").html());
            $("#form_portal_settings").submit();
        });

        var quill_panduan_pengguna = new Quill('#content_panduan_pengguna_input', {
            modules: {
                toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }]
                ],
            },
            placeholder: 'Compose an epic...',
            theme: 'snow',
        });
        quill_panduan_pengguna.root.innerHTML = '{!! (!is_null($panduan_pengguna) ? $panduan_pengguna->content:"") !!}';

    });
</script>

@stop
