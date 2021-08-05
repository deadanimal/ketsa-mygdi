@extends('layouts.app_mygeo_afiq')

@section('content')

<style>
    .ftest{
        display:inline;
        width:auto;
    }
</style>

@include('mygeo.kemaskini_elemen_metadata.modals.modal')

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
                            <h3 class="card-title" style="font-size: 2rem;">Kemas Kini Elemen Metadata</h3>
                            <!--<button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal1">Tambah</button>-->
                            <div class="float-right">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Tambah
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalKategori">Kategori +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTajuk">Tajuk +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSubTajuk">Sub-Tajuk +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalElemen">Elemen +</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_elemens" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Tajuk</th>
                                        <th>Sub-Tajuk</th>
                                        <th>Elemen</th>
                                        <th>Kategori</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($elemens) && count($elemens) > 0) {
                                        $bil = 1;
                                        foreach ($elemens as $elemen) {
                                            ?>
                                            <tr>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $bil }}</td>
                                                <td>
                                                    <button type="button" class="btnEdit">Edit</button>
                                                    <button type="button" class="btnDelete">Delete</button>
                                                </td>
                                            </tr>
                                            <?php
                                            $bil++;
                                        }
                                    }
                                    ?>
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
        $("#table_elemens").DataTable({
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
        
        $(document).on('click','.btnSimpan',function(){
            var theForm = $(this).parent().parent();
            var post_url = theForm.attr("action");
            var request_method = theForm.attr("method");
            var form_data = theForm.serialize();
            
            $.ajax({
                url : post_url, method: request_method, data : form_data
            }).done(function(response){
                console.log(response);
            });
        });
    });
</script>
@stop