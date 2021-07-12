@extends('layouts.app_mygeo_afiq')

@section('content')
<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">
<style>

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Senarai Metadata</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Senarai Metadata
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
                        <form method="post" class="form-horizontal" action="{{url('carian_metadata')}}" id="form_carian">
                            @csrf
                            <!--===== MODALS START =====-->
                            <div class="modal fade" id="modal-carian-tambahan">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Carian Tambahan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jenis Maklumat Kandungan (Content Type)</label>
                                                            <select name="content_type" id="content_type" class="form-control" autofocus>
                                                                <option selected disabled>Pilih</option>
                                                                <option value="application">Application</option>
                                                                <option value="document">Document</option>
                                                                <option value="gisActivityProject">GIS Activity/Project</option>
                                                                <option value="theMap">Map</option>
                                                                <option value="rasterData">Raster Data</option>
                                                                <option value="services">Services</option>
                                                                <option value="software">Software</option>
                                                                <option value="vectorData">Vector Data</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Kategori Data (Topic Category)</label>
                                                            <select name="topic_category[]" id="topic_category" class="form-control" multiple>
                                                                <option value="biota">Biota</label>
                                                                <option value="boundaries">Boundaries</label>
                                                                <option value="climatology meteorology atmosphere">Climatology Meteorology Atmosphere</label>
                                                                <option value="disaster">Disaster</label>
                                                                <option value="economy">Economy</label>
                                                                <option value="elevation">Elevation</label>
                                                                <option value="environment">Environment</label>
                                                                <option value="farming">Farming</label>
                                                                <option value="geoscientific information">Geoscientific Information</label>
                                                                <option value="health">Health</label>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tarikh Mula</label>
                                                            <div class="input-group date" id="tarikh_mula_div" data-target-input="nearest">
                                                                <input type="text" name="tarikh_mula" id="tarikh_mula" class="form-control datetimepicker-input" data-target="#tarikh_mula_div">
                                                                <div class="input-group-append" data-target="#tarikh_mula_div" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tarikh Tamat</label>
                                                            <div class="input-group date" id="tarikh_tamat_div" data-target-input="nearest">
                                                                <input type="text" name="tarikh_tamat" id="tarikh_tamat" class="form-control datetimepicker-input" data-target="#tarikh_tamat_div">
                                                                <div class="input-group-append" data-target="#tarikh_tamat_div" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between1">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--===== MODALS END =====-->

                            <div class="card-body">
                                <div class="form-group row ">
                                    <div class="col-12">
                                        <h3 class="mb-3">Carian Metadata:</h3>
                                        <div class="input-group mb-2">
                                            <input type="text" name="carian" id="carian" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-success float-right">
                                                    <i class="fas fa-search mr-2"></i>Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <!--<a href="#" id="carian_tambahan" data-toggle="modal" data-target="#modal-carian-tambahan">Carian Tambahan >></a>-->
                                </p>
                                <div class="row">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Senarai Metadata</h3>
                                </div>

                                <div class="col-4 text-right">
                                    <!-- <a href="{{ url('kemaskini_profil') }}" class="btn btn-primary btn-sm text-white btn-icon btn-3">
                                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                                        <span class="btn-inner--text">Kemaskini Profil</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_metadatas" class="table table-bordered table-striped">
                                <colgroup>
                                    <col span="1" style="width: 10%;">
                                    <col span="1" style="width: 45%;">
                                    <col span="1" style="width: 25%;">
                                    <col span="1" style="width: 20%;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama Metadata</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bil = 1;
                                    if (count($metadatas) > 0) {
                                        foreach ($metadatas as $key => $val) {
                                            if (isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString)) {
                                                //                              echo "<pre>";var_dump($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString);echo "</pre>";
                                            }
                                            ?>
                                            <tr>
                                                <td>{{ $bil }}</td>
                                                <td>
                                                    <?php
                                                            if (isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != "") {
                                                                echo $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                                            }
                                                            ?>
                                                </td>
                                                <td style="width: fit-content;">
                                                    <?php
                                                            if ($val[2] == 'draft') {
                                                                ?>Draf<?php
                                                                                } else {
                                                                                    if ($val[1]->disahkan == 'yes') {
                                                                                        ?>Diterbitkan<?php
                                                                                                                    } elseif ($val[1]->disahkan == 'no') {
                                                                                                                        ?>Perlu Pembetulan<?php
                                                                                                                        } elseif ($val[1]->disahkan == '0' || $val[1]->disahkan == '') {
                                                                                                                            ?>Perlu Pengesahan<?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="form-inline">
                                                        <?php /*
                                <a href="javascript:void(0)" class="text-green">
                                    <i class="fas fa-eye mr-3"></i>
                                </a>
                                */ ?>
                                                        <?php
                                                                //lihat(view only)================================
                                                                if ($val[2] == 'draft') {
                                                                    ?>
                                                            <form method="post" action="{{ url('/lihat_metadata') }}">
                                                                @csrf
                                                                <input type="hidden" name="metadata_type" value="draf">
                                                                <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                                                <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                                            </form>
                                                        <?php
                                                                } else {
                                                                    ?>
                                                            <form method="post" action="{{ url('/lihat_metadata') }}">
                                                                @csrf
                                                                <input type="hidden" name="metadata_type" value="not_draf">
                                                                <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                                            </form>
                                                        <?php
                                                                }
                                                                //kemaskini=======================================
                                                                if ($val[2] == 'draft') {
                                                                    ?>
                                                            <form method="post" action="{{ url('/kemaskini_draf_metadata') }}">
                                                                @csrf

                                                                <input type="hidden" name="metadata_type" value="draf">
                                                                <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                                                <button type="submit" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                                            </form>
                                                        <?php
                                                                } else {
                                                                    ?>
                                                            <form method="post" action="{{ url('/kemaskini_metadata') }}">
                                                                @csrf
                                                                <input type="hidden" name="metadata_type" value="not_draf">
                                                                <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                <button type="submit" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                                            </form>
                                                        <?php
                                                                }
                                                                //delete==========================================
                                                                if ($val[2] == 'draft') {
                                                                    ?>
                                                            <form method="post" action="{{ url('/delete_draf_metadata') }}">
                                                                @csrf
                                                                <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                                                <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        <?php
                                                                } else {
                                                                    ?>
                                                            <form method="post" action="{{ url('/delete_metadata') }}">
                                                                @csrf
                                                                <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        <?php
                                                                }
                                                                ?>
                                                    </div>
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
    $(document).ready(function() {
        $("#table_metadatas").DataTable({
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

        $('#tarikh_mula_div,#tarikh_tamat_div').datetimepicker({
            format: 'DD-MM-YYYY H:mm:ss',
            // format: 'L'
        });

        $(document).on('click', '.btnDelete', function() {
            var conf = confirm('Adakah anda pasti untuk buang metadata ini?');
            if (conf) {
                $(this).parent().submit();
            }
        });
    });
</script>
@stop
