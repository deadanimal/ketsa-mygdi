@extends('layouts.app_mygeo_ketsa')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <style>

    </style>

    <div class="content-wrapper">
        <section class="header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center p-3 py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-dark d-inline-block mb-0">Semakan Metadata</h6>

                            <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class=" breadcrumb-item">
                                        <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        Semakan Metadata
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Senarai Semakan Metadata</h3>
                                    </div>

                                <div class="col-4 text-right">
                                    <button type="button" class="btn btn-sm btn-primary float-right btn_lulus_multi">
                                        <i class="fas fa-check mr-2"></i>
                                        Terbit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="table_metadatas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="selectAll" id="selectAll"></th>
                                            <th>Bil</th>
                                            <th>Nama Metadata</th>
                                            <th>Penerbit</th>
                                            <th>Kategori</th>
                                            <th>Tarikh</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $bil = 1;
                                        if (count($metadatas) > 0) {
                                            foreach ($metadatas as $key => $val) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $met_name = '';
                                                        if (isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != '') {
                                                            $met_name = $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                                        }elseif (isset($val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != '') {
                                                            $met_name = $val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                                                        }
                                                        ?>
                                                        <input type="checkbox" class="checkbox_metadatas" name="checkbox_metadatas" data-metadataid="{{ $key }}" data-title="{{ $met_name }}" value="{{ $key }}"></td>
                                                    <td>{{ $bil }}</td>
                                                    <td>
                                                        <?php echo $met_name; ?>
                                                    </td>
                                                    <td>
                                                        {{ (isset($val[2]->name) ? $val[2]->name:"") }}
                                                    </td>
                                                    <td>
                                                        <?php
                                                           if(isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != ""){
                                                              echo $val[0]->hierarchyLevel->MD_ScopeCode;
                                                          }
                                                          ?>
                                                     </td>
                                                     <td>
                                                        {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
                                                    </td>
                                                    <td>
                                                        <?php //sahkan(kemaskini)======================================= ?>
                                                        <a href="{{ url('/kemaskini_metadata/'.$key) }}">
                                                            <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:3px;">Semak</button>
                                                        </a>
    <!--                                                    <button type="button" class="btn btn-danger btn_tolak btn-sm" data-metadataid="{{ $key }}">Tolak</button>
                                                        <button type="button" class="btn btn-success btn_sahkan btn-sm" data-metadataid="{{ $key }}">Sahkan</button>-->
                                                    </td>
                                                </tr>
                                        <?php
                                                $bil++;
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <!-- <tfoot>
                                        <tr>
                                          <th>Bil</th>
                                          <th>Nama Metadata</th>
                                          <th>Actions</th>
                                        </tr>
                                      </tfoot> -->
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script>
    $(document).ready(function() {
        var checked_metadatas = [];
        var table = $("#table_metadatas").DataTable({
            "orderCellsTop": true,
            "ordering": false,
            "responsive": false,
            "autoWidth": true,
            "pageLength" : 5, //temp
//            "drawCallback": function(settings) {
//                $(".checkbox_metadatas").on("click", function() {
//                    if ($(this).is(":checked")) {
//                        checked_metadatas.push($(this).val())
//                    } else {
//                        for (var i = 0; i < checked_metadatas.length; i++) {
//                            if (checked_metadatas[i] === $(this).val()) {
//                                checked_metadatas.splice(i, 1);
//                                break;
//                            }
//                        }
//                    }
//                });
//            },
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

        $(document).on('change','#selectAll',function(){
            if($(this).is(":checked")){
                table.$('.checkbox_metadatas').each( function (i) {
                    $(this).prop('checked',true);
                });
            }else{
                table.$('.checkbox_metadatas').each( function (i) {
                    $(this).prop('checked',false);
                });
            }
        });

    // Setup - add a text input to each footer cell
    $('#table_metadatas thead tr').clone(true).appendTo('#table_metadatas thead');
    var toExclude = 0;
    $('#table_metadatas thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('');
        if(title != "" && title != "Bil" && title != "Tindakan"){
            $(this).html('<input type="text" placeholder="Search '+title+'" class="form-control"/>');
            $('input',this).on('keyup change', function(){
                if(table.column(i).search() !== this.value){
                    table.column(i).search(this.value).draw();
                }
            });
        }
    });
/*
            // Setup - add a text input to each footer cell
            $('#table_metadatas thead tr').clone(true).appendTo('#table_metadatas thead');
            $('#table_metadatas thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title +
                    '" class="form-control"/>');
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table.column(i).search(this.value).draw();
                    }
                });
            });*/

        $(document).on("click", ".btn_lulus_multi", function() {
            var checkbox_metadatas = [];

            table.$('.checkbox_metadatas').each( function (i) {
                if($(this).is(":checked")){
                    checkbox_metadatas.push($(this).data('metadataid'));
                }
            });

            if (checkbox_metadatas.length === 0) {
                alert("Sila pilih sekurang-kurangnya satu metadata.");
            } else {
                if (confirm("Adakah anda pasti untuk mengesahkan pilihan metadata ini?")) {
                    //ajax sahkan metadata
                    $.ajax({
                        method: "POST",
                        url: "metadata_sahkan",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "metadata_id": checkbox_metadatas
                        },
                    }).done(function(response) {
                        alert("Metadata berjaya disahkan.");
                        location.reload();
                    });
                }
            }
        });
		});
    </script>
@stop
