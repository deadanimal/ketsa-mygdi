@extends('layouts.app_mygeo_afiq')

@section('content')

<style>
    .ftest{
        display:inline;
        width:auto;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
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
                            <h3 class="card-title" style="font-size: 2rem;">Proses Data</h3>
<!--                            <a href="{{url('mohon_data_asas_baru')}}">
                                <button type="button" class="btn btn-default float-right">Tambah</button>
                            </a>-->
                        </div>
                        <div class="card-body">
                            <table id="table_metadatas" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>BIL</th>
                                        <th>NAMA PERMOHONAN</th>
                                        <th>NAMA PEMOHON</th>
                                        <th>KATEGORI</th>
                                        <th>PENTADBIR DITUGASKAN</th>
                                        <th>TINDAKAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemohons as $pemohon)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pemohon->name}}</td>
                                        <td>{{$pemohon->users->name}}</td>
                                        <td>{{$pemohon->users->kategori}}</td>
                                        <td></td>
                                        <td>
                                            <a href="/lihat_permohonan/{{$pemohon->id}}" class="btn btn-sm btn-info text-center"><i class="fas fa-eye"></i></a>
                                            <button type="button" data-permohonanid="{{ $pemohon->id }}" class="btnDelete btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></button>
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
</div>

<script>
    $(document).ready(function () {
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
</script>
@stop
