@extends('layouts.app_mygeo_afiq')

@section('content')

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
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Maklum Balas</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Maklum Balas Pelanggan
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
                        @csrf
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Senarai Maklum Balas Pelanggan</h3>
                                </div>
                                <div class="col-4 text-right">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>BIL</th>
                                        <th>EMEL</th>
                                        <th>KATEGORI</th>
                                        <th>STATUS</th>
                                        <th>TARIKH</th>
                                        <th>TINDAKAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($maklum_balas as $mb)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$mb->email}}</td>
                                        <td>{{$mb->category}}</td>
                                        <td><span class="badge badge-pill badge-info">{{($mb->status == '0' ? 'Baru':'')}}</span></td>
                                        <td>{{ date('dd/m/Y',strtotinme($mb->created_at)) }}</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-balas-mb-{{$mb->id}}">
                                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-reply mr-2"></i>Balas</button>
                                            </a>
                                            <button type="button" data-maklumbalasid="{{ $mb->id }}" class="btnDelete btn btn-sm btn-danger mx-2"><i class="fas fa-trash mr-2"></i>Padam</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Maklumbalas-->
    @foreach ($maklum_balas as $mb)
    <div class="modal fade" id="modal-balas-mb-{{$mb->id}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary mb-0">
                    <h4 class="text-white">Maklum Balas kepada Pelanggan ID#{{$loop->iteration}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/reply_maklum_balas">
                    @csrf
                    <div class="modal-body row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Kategori</label>
                                <input type="text" class="form-control form-control-sm" name="category" value="{{ $mb->category }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Emel</label>
                                <input placeholder="Masukan E-mel anda" type="email" name="email" class="form-control form-control-sm" value="{{ $mb->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"> Pertanyaan </label>
                                <textarea name="pertanyaan" placeholder="Nyatakan maklum balas anda" type="text" rows="5" class="form-control form-control-sm" disabled>{{ $mb->pertanyaan }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"> Balas </label>
                                <textarea name="balas" placeholder="Masukkan respon..." type="text" rows="5" class="form-control form-control-sm"></textarea>
                            </div>

                            <button class="btn btn-success float-right" type="submit">
                                <span class="text-white">Balas</span>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
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

    $(document).on("click", ".btnDelete", function() {
        var mb_id = $(this).data('maklumbalasid');
        var r = confirm("Adakah anda pasti untuk buang maklum balas ini?");
        if (r == true) {
            $.ajax({
                method: "POST",
                url: "delete_maklum_balas",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": mb_id
                },
            }).done(function(response) {
                alert("Maklum balas telah dibuang.");
                location.reload();
            });
        }
    });
</script>
@stop
