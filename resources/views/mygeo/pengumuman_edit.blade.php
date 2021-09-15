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
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Pengumuman</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengurusan Portal
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengumuman
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Senarai Pengumuman</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form-horizontal" action="{{url('simpan_pengumuman')}}" id="form_kemaskini_pengumuman">
                                @csrf
                                <input type="hidden" name="id_pengumuman" value="{{ (!is_null($pengumuman) ? $pengumuman->id:'') }}">
                                <input type="hidden" name="content_pengumuman" id="content_pengumuman">
                                <label class="form-control-label">Tajuk Pengumuman</label>
                                <input type="text" name="title_pengumuman" id="title_pengumuman" class="form-control mb-3" value="{{ (!is_null($pengumuman) ? $pengumuman->title:'') }}">

                                <label class="form-control-label">Tarikh Pengumuman</label>
                                <input type="date" name="date_pengumuman" id="date_pengumuman" class="form-control mb-3" value="<?php echo $pengumuman->date->format('Y-m-d'); ?>">

                                <label class="form-control-label">Kandungan</label>
                                <div id="content_pengumuman_input"></div>

                                <button type="submit" id="btn_submit" class="btn btn-success float-right mt-4">Submit</button>
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
        var quill_pengumuman = new Quill('#content_pengumuman_input', {
            modules: {
                toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }]
                ],
            },
            placeholder: 'Masukkan pengumuman',
            theme: 'snow',
        });
        quill_pengumuman.root.innerHTML = '{!! (!is_null($pengumuman) ? $pengumuman->content:"") !!}';

        $(document).on("click", "#btn_submit", function() {
            $("#content_pengumuman").val($("#content_pengumuman_input > .ql-editor").html());
            $("#form_kemaskini_pengumuman").submit();
        });

        $("#table_pengumuman").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

@stop
