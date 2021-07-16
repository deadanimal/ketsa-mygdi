@extends('layouts.app_afiq')

@section('content')

<style>
    .metadataActionLinks {
        margin-right: 30px;
        text-decoration: underline;
        text-decoration-line: underline;
    }

    .navbar-search .form-control {
        width: 500px;
    }

    .navbar-search .form-control:focus {
        width: 550px;
    }

    .card {
        background-color: white;
    }

    .cardw {
        height: 200px;
    }
</style>

<section class="content pb-4">
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-title pt-0">
            <h2 class="">Carian Metadata</h2>
        </div>
        <div class="col-12 form-inline my-4 justify-content-center">
            <form method="post" class="navbar-search navbar-search-light" action="{{url('carian_metadata_nologin')}}" id="form_carian">
                @csrf
                <div class="form-inline mb-0">
                    <div class="input-group input-group-alternative input-group-merge" style="background-image: linear-gradient(to right, #ebba16, #ed8a19);">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input placeholder="Carian..." type="text" name="carian" id="carian" class="form-control" autocomplete="off">
                    </div>
                </div>
                <button type="button" data-action="search-close" data-target="#navbar-search-main" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <a class="btn btn-primary text-white text-center btn_cari_submit ml-3" style="cursor:pointer;">
                <span><i class="mr-2 fas fa-search"></i></span>
                Cari
            </a>
        </div>
        <div class="row">
            <div class="col-4 pl-lg-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <h3 class="text-muted heading mb-0">Carian Tambahan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('carian_metadata_nologin')}}" id="form_carian2">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Maklumat Kandungan (Content Type)</label>
                                            <select name="content_type" id="content_type" class="form-control form-control-sm" autofocus>
                                                <option selected disabled>Pilih</option>
                                                <option value="Application">Application</option>
                                                <option value="Document">Document</option>
                                                <option value="GIS Activity/Project">GIS Activity/Project</option>
                                                <option value="Map">Map</option>
                                                <option value="Raster Data">Raster Data</option>
                                                <option value="Services">Services</option>
                                                <option value="Software">Software</option>
                                                <option value="Vector Data">Vector Data</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Data (Topic Category)</label>
                                            <select name="topic_category[]" id="topic_category" class="form-control form-control-sm" multiple>
                                                <option value="Biota">Biota</label>
                                                <option value="Boundaries">Boundaries</label>
                                                <option value="Climatology Meteorology Atmosphere">Climatology Meteorology Atmosphere</label>
                                                <option value="Disaster">Disaster</label>
                                                <option value="Economy">Economy</label>
                                                <option value="Elevation">Elevation</label>
                                                <option value="Environment">Environment</label>
                                                <option value="Farming">Farming</label>
                                                <option value="Geoscientific Information">Geoscientific Information</label>
                                                <option value="Health">Health</label>
                                                <option value="Imagery Base Maps-Earth Cover">Imagery Base Maps-Earth Cover</label>
                                                <option value="Intelligence Military">Intelligence Military</label>
                                                <option value="Inland Waters">Inland Waters</label>
                                                <option value="Location">Location</label>
                                                <option value="Oceans">Oceans</label>
                                                <option value="Planning Cadastre">Planning Cadastre</label>
                                                <option value="Society">Society</label>
                                                <option value="Structure">Structure</label>
                                                <option value="Transportation">Transportation</label>
                                                <option value="Utilities and Communication">Utilities and Communication</label>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tarikh Mula</label>
                                            <input type="date" name="tarikh_mula" id="tarikh_mula" class="form-control form-control-sm" data-target="#tarikh_mula_div">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tarikh Tamat</label>
                                            <input type="date" name="tarikh_tamat" id="tarikh_tamat" class="form-control form-control-sm" data-target="#tarikh_tamat_div">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-8">
                <div class="row divSenaraiMetadata" style="display:none;">
                    <div class="col-12 pr-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="heading text-muted text-center mb-0">Senarai Metadata</h3>
                                <!-- <button type="button" class="btn btn-default float-right">Kemas Kini</button> -->
                            </div>
                            <div class="card-body">
                                <div id="accordion">
                                    <?php
                                    $numCol = 3;
                                    $rowCount = 0;
                                    $rows = 5;
                                    $bil = 1;
                                    if (count($metadatas) > 0) {
                                        foreach ($metadatas as $key => $val) {
                                            if ($rowCount % $numCol == 0) { ?>
                                                <div class="row">
                                                <?php }
                                                        $rowCount++ ?>

                                                <?php //=== collapse1 =============================================================
                                                        ?>
                                                <div class="col-4">
                                                    <div class="card card-primary" id="divParentCollapse{{ $bil }}">
                                                        <div class="card-header cardw">
                                                            <a data-toggle="collapse" href="#divCollapse{{ $bil }}">
                                                                <?php 
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                                                                  echo $val->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                                                                }else{
                                                                    ?>--no title set--<?php
                                                                }
                                                                ?>
                                                            </a>
                                                        </div>
                                                        <div id="divCollapse{{ $bil }}" class="panel-collapse collapse in" data-parent="#divParentCollapse{{ $bil }}">
                                                            <div class="card-body">
                                                                <?php
                                                                $abstract = "";
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->abstract) && $val->identificationInfo->SV_ServiceIdentification->abstract != ""){
                                                                    $abstract = trim($val->identificationInfo->SV_ServiceIdentification->abstract);
                                                                }
                                                                ?>
                                                                <p style="white-space: normal;width:100%;height:50px;overflow: hidden;"><?php echo (strlen($abstract) > 225 ? substr($abstract, 0, 225) . "..." : $abstract); ?></p>
                                                                <form method="post" action="{{ url('/lihat_metadata_nologin') }}" id="formViewMetadata{{ $key }}">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <form method="post" action="{{ url('/lihat_xml_nologin') }}" id="formViewXml{{ $key }}">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <a href="#" class="metadataActionLinks aViewMetadata" onClick="return false;" data-metid="{{$key}}">Metadata Details</a><br>
                                                                <a href="#" class="metadataActionLinks aViewXml" onClick="return false;" data-metid="{{$key}}">Metadata (XML)</a><br>
                                                                <?php
                                                                $url = (isset($val->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString) ? $val->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString : "");
                                                                ?>
                                                                <a href="#" class="metadataActionLinks aViewMap" onClick="return false;" data-metid="{{$key}}" data-toggle="modal" data-target="#modal-showmap" data-mapurl="{{ $url }}" data-backdrop="false">Show map</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($rowCount % $numCol == 0) { ?>
                                                </div>
                                            <?php } ?>

                                    <?php
                                            $bil++;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--===== MODALS show map =====-->
    <div class="modal fade" id="modal-showmap">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php

                                ?>
                                <iframe id="mapiframe" src="" height="425px" width="100%" title="ArcGIS REST Services">
    </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>  
    @include('modal_carian_tambahan')
    <div id="preloader"></div>
</section>


<script>
    $(document).ready(function() {
        <?php
        if (count($metadatas) > 0) {
            ?>$(".divSenaraiMetadata").show();
        <?php
        } else {
            ?>$(".divSenaraiMetadata").hide();
    <?php
    }
    ?>

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

    $('#tarikh_mula_div,#tarikh_tamat_div').datetimepicker({
        format: 'DD-MM-YYYY H:mm:ss',
        // format: 'L'
    });

    $(document).on("click", ".aViewMetadata", function() {
        var metid = $(this).data('metid');
        $("#formViewMetadata" + metid).submit();
    });
    $(document).on("click", ".aViewXml", function() {
        var metid = $(this).data('metid');
        $("#formViewXml" + metid).submit();
    });
    $(document).on("click", ".aViewMap", function () {
        var mapurl = $(this).data('mapurl');
        $('#mapiframe').attr('src', 'http://localhost:8888/ketsa-mygdi/public/intecxmap/search/view-map-service.html?url='+mapurl);
        $('#modal-showmap').modal('show');
    });

    $(document).on("click", ".btn_cari_submit", function() {
        $("#form_carian").submit();
    });
    });
</script>
@stop
