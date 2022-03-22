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

    .btn {
        margin-left: 10px;
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
                        @csrf
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Senarai Pengumuman</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a data-toggle="modal" data-target="#modal-tambah-pengumuman">
                                        <button type="button" class="btn btn-sm btn-default float-right"><i class="fas fa-plus mr-2"></i>Pengumuman</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form-horizontal" action="{{url('simpan_portal_settings')}}" id="form_portal_settings">
                                @csrf
                                <input type="hidden" name="content_panduan_pengguna" id="content_panduan_pengguna">
                                <input type="hidden" name="content_hubungi_kami" id="content_hubungi_kami">
                                <input type="hidden" name="content_penafian" id="content_penafian">
                                <input type="hidden" name="content_penyataan_privasi" id="content_penyataan_privasi">
                                <input type="hidden" name="content_faq" id="content_faq">
                                <table id="table_pengumuman" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengumuman as $umum)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $umum->title }}</td>
                                            <td>{{ Carbon\Carbon::parse($umum->date)->format('d M Y') }}</td>
                                            <td>
                                                <div class="form-inline">
                                                    <form></form>
                                                    <form id="form_umum_show_{{ $umum->id }}" method="POST" action="{{ url('/mygeo_tunjuk_pengumuman') }}">
                                                        @csrf
                                                        <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                                                        <button type="submit" class='btn btn-sm btn-primary'><i class="fas fa-eye"></i></button>
                                                    </form>
                                                    <form id="form_umum_edit_{{ $umum->id }}" method="POST" action="{{ url('/mygeo_kemaskini_pengumuman') }}">
                                                        @csrf
                                                        <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                                                        <button type="submit" class='btn btn-sm btn-success'><i class="fas fa-edit"></i></button>
                                                    </form>
                                                    <form id="form_umum_delete_{{ $umum->id }}" method="POST" action="{{ url('/mygeo_buang_pengumuman') }}">
                                                        @csrf
                                                        <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                                                        <button type="submit" class='btn btn-sm btn-warning'><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Tambah Permohonan -->
    <div class="modal fade" id="modal-tambah-pengumuman">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-0">
                    <h4 class="text-white">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('tambah_pengumuman') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Tajuk</label>
                                <select name="category_pengumuman" class="form-control form-control-sm">
                                    <option value="">Pilih kategori</option>
                                    <option value="Metadata Baharu">Metadata Baharu</option>
                                    <option value="Makluman">Makluman</option>
                                    <option value="Peringatan">Peringatan</option>
                                    <option value="Pengemaskinian">Pengemaskinian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Tajuk</label>
                                <input type="text" class="form-control form-control-sm" name="title_pengumuman" value="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Tarikh</label>
                                <input type="date" class="form-control form-control-sm" name="date_pengumuman" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Kandungan</label>
                                <input type="text" class="form-control form-control-sm" name="content_pengumuman" value="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Gambar</label>
                                <input id="imageUpload" type="file" name="gambar" placeholder="Photo" class="form-control form-control-sm p-0">
                                <image id="profileImage" alt="Image placeholder" src="./assetsweb/img/banner2.jpeg" style="border-radius: .95rem;width:100%;padding-top:10px;">
                            </div>

                            <button class="btn btn-primary" type="submit">
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
    $(document).ready(function() {
        $("#table_pengumuman").DataTable({
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
