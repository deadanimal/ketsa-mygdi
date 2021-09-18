@extends('layouts.app_mygeo_ketsa')

@section('content')

<style>
    .ftest{
        display:inline;
        width:auto;
    }
</style>

@include('mygeo.kemaskini_elemen_metadata.modals.modal')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 2rem;">Kemas Kini Elemen Metadata</h3>
                            <!--<button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal1">Tambah</button>-->
                            <div class="float-right">
<!--                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Tambah
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalKategori">Kategori +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTajuk">Tajuk +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSubTajuk">Sub-Tajuk +</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalElemen">Elemen +</a>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_elemens" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama Elemen</th>
                                        <th>Tajuk</th>
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
                                                <td>{{ $elemen->label }}</td>
                                                <td>{{ $elemen->getTajuk->name }}</td>
                                                <td>{{ $elemen->getKategori->name }}</td>
                                                <td>
                                                    <label class="custom-toggle">
                                                        <input type="checkbox" class='btnStatusElemen'
                                                            data-elemenid="{{ $elemen->id }}"
                                                            {{ $elemen->status == '1' ? 'checked' : '' }}>
                                                        <span class="custom-toggle-slider custom-toggle-success rounded-circle"
                                                            data-label-off="Tak Aktif" data-label-on="Aktif"
                                                            data-width="175"></span>
                                                    </label>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 2rem;">Elemen Tambahan</h3>
                            <div class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCustomInput">Tambah</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_elemens" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <!--<th>Input Type</th>-->
                                        <th>Mandatory</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($customMetadataInput) && count($customMetadataInput) > 0) {
                                        $bil = 1;
                                        foreach ($customMetadataInput as $cmi) {
                                            ?>
                                            <tr>
                                                <td>{{ $bil }}</td>
                                                <td>{{ $cmi->name }}</td>
                                                <!--<td>{{ $cmi->input_type }}</td>-->
                                                <td>{{ $cmi->mandatory }}</td>
                                                <td>{{ $cmi->getKategori->name }}</td>
                                                <td>{{ $cmi->status }}</td>
                                                <td>
                                                    <button type="button" class="form-control btnEdit" data-toggle="modal" data-target="#modalKemaskiniCustomInput" data-custominputid="{{ $cmi->id }}">Edit</button>
                                                    <button type="button" class="form-control btnDeleteCustomInput" data-rowid="{{ $cmi->id }}">Delete</button>
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
    $('.btnStatusElemen').change(function() {
        var userid = $(this).data('elemenid');
        var newStatus = '';
        var newStatusText = '';
        if($(this).prop('checked')){
            newStatus = '1';
            newStatusText = 'Aktif';
        }else{
            newStatus = '0';
            newStatusText = 'Tidak Aktif';
        }

        $.ajax({
            method: "POST",
            url: "change_elemen_status",
            data: {"_token": "{{ csrf_token() }}", "elemen_id": userid, "status_id": newStatus},
        }).done(function (response) {
            alert("Status elemen berjaya diubah.");
        });
    });

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

        $(document).on('click', '.btnSimpan', function () {
            if($(this).parent().parent().attr('id') == "formTambahCustomInput" || $(this).parent().parent().attr('id') == "formKemaskiniCustomInput"){
                var form = '#' + $(this).parent().parent().attr('id');
                var name = $(form + ' .name').val();
                var kategori = $(form + ' .thekategori').val();
                var mandatory = $(form + ' .mandatory').val();
//                console.log(name,kategori,mandatory);
                if(name == "" || kategori == "" || mandatory == ""){
                    alert("Sila lengkapkan borang");
                }else{
                    $(this).parent().parent().submit();
                }
            }else{
                $(this).parent().parent().submit();
            }
        });

        $(document).on('click', '.btnDelete', function () {
            $.ajax({
                method: "POST",
                url: "{{ url('deleteElemenMetadata') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowid": $(this).data('rowid'),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                alert(data.msg);
                if(data.error == '0'){
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '.btnDeleteCustomInput', function () {
            $.ajax({
                method: "POST",
                url: "{{ url('deleteCustomMetadataInput') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowid": $(this).data('rowid'),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                alert(data.msg);
                if(data.error == '0'){
                    window.location.reload();
                }
            });
        });
        
        $(document).on("click", ".btnEdit", function() {
            // ajax get custom input details
            var custominputid = $(this).data('custominputid');
            $.ajax({
                method: "POST",
                url: "get_custom_input_details",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "custom_input_id": custominputid
                },
            }).done(function(response) {
                $('.ajaxHtml').html(response);
            });
        });
    });

    $('#formTambahSubTajuk .kategori').change(function() {
        $.ajax({
            method: "POST",
            url: "{{ url('getTajukByCategory') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "kategori": $(this).val(),
            },
        }).done(function(response) {
            var data = jQuery.parseJSON(response);
            $('#formTambahSubTajuk .tajuk').html('');
            $('#formTambahSubTajuk .tajuk').append('<option value="">Pilih...</option>');
            $.each(data, function(index,value) {
                $('#formTambahSubTajuk .tajuk').append('<option value="'+value.name+'">'+value.name+'</option>');
            });
        });
    });

    $('#formTambahElemen .kategori').change(function() {
        $.ajax({
            method: "POST",
            url: "{{ url('getTajukByCategory') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "kategori": $(this).val(),
            },
        }).done(function(response) {
            var data = jQuery.parseJSON(response);
            $('#formTambahElemen .tajuk').html('');
            $('#formTambahElemen .tajuk').append('<option value="">Pilih...</option>');
            $.each(data, function(index,value) {
                $('#formTambahElemen .tajuk').append('<option value="'+value.id+'" data-rowid="'+value.name+'">'+value.name+'</option>');
            });
        });
    });

    $('#formTambahElemen .tajuk').change(function() {
        var selectedTajuk = $(this).find(':selected').data('rowid')
        $.ajax({
            method: "POST",
            url: "{{ url('getSubTajuk') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "tajuk": selectedTajuk,
            },
        }).done(function(response) {
            var data = jQuery.parseJSON(response);
            $('#formTambahElemen .sub_tajuk').html('');
            $('#formTambahElemen .sub_tajuk').append('<option value="">Pilih...</option>');
            $.each(data.sub_tajuks, function(index,value) {
                $('#formTambahElemen .sub_tajuk').append('<option value="'+value.id+'">'+value.sub_tajuk+'</option>');
            });
        });
    });
</script>
@stop
