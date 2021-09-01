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
            <form method="post" class="navbar-search navbar-search-light" action="{{url('senarai_metadata_nologin')}}" id="form_carian">
                @csrf
                <div class="form-inline mb-0">
                    <div class="input-group input-group-alternative input-group-merge" style="background-image: linear-gradient(to right, #ebba16, #ed8a19);">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input placeholder="Carian..." type="text" name="carian" id="carian" class="form-control" autocomplete="off" value="{{ $carian }}">
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
                                                <option selected disabled>Select Content</option>
                                                <option value="Application">Application</option>
                                                <option value="Clearing House">Clearing House</option>
                                                <option value="Downloadable Data">Downloadable Data</option>
                                                <option value="Geographic Activities">Geographic Activities</option>
                                                <option value="Geographic Services">Geographic Services</option>
                                                <option value="Map File">Map File</option>
                                                <option value="Offline Data">Offline Data</option>
                                                <option value="Static Map Images">Static Map Images</option>
                                                <option value="Other Documents">Other Documents</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Data (Topic Category)</label>
                                            <select name="topic_category[]" id="topic_category" class="form-control form-control-sm" multiple>
                                                <option value="Administrative and Political Boundaries">Administrative and Political Boundaries</option>
                                                <option value="Agriculture and Farming">Agriculture and Farming</option>
                                                <option value="Atmosphere and Climatic">Atmosphere and Climatic</option>
                                                <option value="Biology and Ecology">Biology and Ecology</option>
                                                <option value="Business and Economic">Business and Economic</option>
                                                <option value="Cadastral">Cadastral</option>
                                                <option value="Cultural, Society and Demography">Cultural, Society and Demography</option>
                                                <option value="Elevation and Derived Products">Elevation and Derived Products</option>
                                                <option value="Environment and Conservation">Environment and Conservation</option>
                                                <option value="Facilities and Structures">Facilities and Structures</option>
                                                <option value="Geological and Geophysical">Geological and Geophysical</option>
                                                <option value="Human Health and Disease">Human Health and Disease</option>
                                                <option value="Imagery and Base Maps">Imagery and Base Maps</option>
                                                <option value="Inland Water Resources">Inland Water Resources</option>
                                                <option value="Locations and Geodetic Networks">Locations and Geodetic Networks</option>
                                                <option value="Military">Military</option>
                                                <option value="Oceans and Estuaries">Oceans and Estuaries</option>
                                                <option value="Transportation Networks">Transportation Networks</option>
                                                <option value="Utilities and Communication">Utilities and Communication</option>
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
                                                            <a class="a_title" data-toggle="collapse" href="#divCollapse{{ $bil }}">
                                                                <?php 
                                                                if (isset($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != "") {
                                                                  echo $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                                                }else{
                                                                    ?>--no title set--<?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $abstract = "";
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->abstract) && $val->identificationInfo->SV_ServiceIdentification->abstract != ""){
                                                                    $abstract = trim($val->identificationInfo->SV_ServiceIdentification->abstract);
                                                                }
                                                                ?>
                                                                <p style="white-space: normal;width:100%;height:50px;overflow: hidden;"><?php echo (strlen($abstract) > 225 ? substr($abstract, 0, 225) . "..." : $abstract); ?></p>
                                                            </a>
                                                            <?php /* @include('abstract') */ ?>
                                                        </div>
                                                        <div id="divCollapse{{ $bil }}" class="panel-collapse collapse in" data-parent="#divParentCollapse{{ $bil }}">
                                                            <div class="card-body">
                                                                <input class="p_abstract" type="hidden" value="{{ $abstract }}">
                                                                <form method="post" action="{{ url('/lihat_metadata_nologin') }}" id="formViewMetadata{{ $key }}" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <form method="post" action="{{ url('/lihat_xml_nologin') }}" id="formViewXml{{ $key }}" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <a href="#" class="btn btn-sm btn-primary metadataActionLinks aViewMetadata col-12 mb-2" onClick="return false;" data-metid="{{$key}}">Metadata Details</a><br>
                                                                <a href="#" class="btn btn-sm btn-warning metadataActionLinks aViewXml col-12 mb-2" onClick="return false;" data-metid="{{$key}}">Metadata (XML)</a><br>
                                                                <?php
                                                                $url = (isset($val->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString) ? $val->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString : "");
                                                                if(trim($url) != ""){
                                                                    ?>
                                                                    <a href="#" class="btn btn-sm btn-success metadataActionLinks aViewMap col-12 mb-2" onClick="return false;" data-metid="{{$key}}" data-toggle="modal" data-target="#modal-showmap" data-mapurl="{{ $url }}" data-backdrop="false">Show map</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $website = (isset($val->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) ? $val->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL : "");
                                                                if(trim($website) != ""){
                                                                    ?>
                                                                    <a href="{{ $website }}" class="btn btn-sm btn-default metadataActionLinks col-12 mb-2" target="_blank">Website</a>
                                                                    <?php
                                                                }
                                                                ?>
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
                                {{ ((isset($metadatasdb) && !empty($metadatasdb)) ? $metadatasdb->withQueryString()->links():"") }}
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
                        <div class="row">
                            <div class="col-md-12">
                                <p id="modal_title" style="white-space: normal;width:100%;margin-top:20px;"></p>
                                <p id="modal_abstract" style="white-space: normal;width:100%;margin-top:20px;"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-sm btn-primary metadataActionLinks a_metadata_details col-3 mb-2" onClick="return false;" data-metid="">Metadata Details</a><br>
                                <a href="#" class="btn btn-sm btn-success metadataActionLinks a_metadata_xml col-3 mb-2" onClick="return false;" data-metid="">Metadata (XML)</a>
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

    $(document).on("click", ".aViewMetadata, .a_metadata_details", function() {
        var metid = $(this).data('metid');
        $("#formViewMetadata" + metid).submit();
    });
    $(document).on("click", ".aViewXml, .a_metadata_xml", function() {
        var metid = $(this).data('metid');
        $("#formViewXml" + metid).submit();
    });
    $(document).on("click", ".aViewMap", function () {
        var mapurl = $(this).data('mapurl');
        var abstract = $(this).parent().find('.p_abstract').val();
        var title = $(this).parent().parent().parent().find('.a_title').html();
        
        $('#mapiframe').attr('src', '<?php echo url("/"); ?>/intecxmap/search/view-map-service.html?url='+mapurl);
        $('#modal_abstract').html(abstract);
        $('#modal_title').html(title);
        $('.a_metadata_details').data('metid',$(this).data('metid'));
        $('.a_metadata_xml').data('metid',$(this).data('metid'));
        $('#modal-showmap').modal('show');
    });

    $(document).on("click", ".btn_cari_submit", function() {
        $("#form_carian").submit();
    });
    });
</script>
@stop
