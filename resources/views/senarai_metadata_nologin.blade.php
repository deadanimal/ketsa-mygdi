@extends('layouts.app_afiq')

@section('content')

<style>
    .metadataActionLinks {
        margin-right: 30px;
        text-decoration: underline;
        text-decoration-line: underline;
    }

    .navbar-search .form-control {
        width: 400px;
    }

    .navbar-search .form-control:focus {
        width: 470px;
    }

    .card {
        background-color: white;
    }
</style>

<section class="content bgland pb-4">
    <div class="container-fluid" data-aos="fade-up">

        <div class="section-title">
            <h2>Carian Metadata</h2>
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Maklumat Kandungan (Content Type)</label>
                                        <select name="content_type" id="content_type" class="form-control form-control-sm" autofocus>
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
                                        <select name="topic_category[]" id="topic_category" class="form-control form-control-sm" multiple>
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
                                            <option value="imagery base maps-earth cover">Imagery Base Maps-Earth Cover</label>
                                            <option value="intelligence military">Intelligence Military</label>
                                            <option value="inland waters">Inland Waters</label>
                                            <option value="location">Location</label>
                                            <option value="oceans">Oceans</label>
                                            <option value="planning Cadastre">Planning Cadastre</label>
                                            <option value="society">Society</label>
                                            <option value="structure">Structure</label>
                                            <option value="transportation">Transportation</label>
                                            <option value="utilities and communication">Utilities and Communication</label>
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
                        <button type="button" class="btn btn-primary">Selesai</button>
                    </div>
                    </div>

                </div>
            </div>

            <div class="col-8">
                <div class="row mb-4">
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
                        <a class="btn btn-success text-white text-center btn_cari_submit ml-3" style="cursor:pointer;">
                            <span><i class="mr-2 fas fa-search"></i></span>
                            Cari
                        </a>
                    </div>
                </div>

                <div class="row divSenaraiMetadata" style="display:none; ">
                    <div class="col-12 pr-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="heading text-muted text-center mb-0">Senarai Metadata</h3>
                                <!-- <button type="button" class="btn btn-default float-right">Kemas Kini</button> -->
                            </div>
                            <div class="card-body">
                                <?php ?>
                                <table id="table_metadatas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Metadata</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div id="accordion">
                                            <?php
                                            $bil = 1;
                                            if (count($metadatas) > 0) {
                                                foreach ($metadatas as $key => $val) {
                                                    ?>
                                                    <tr>
                                                        <td style="padding: unset;">
                                                            <?php //=== collapse1 =============================================================
                                                                    ?>
                                                            <div class="card0 card-primary0" id="divParentCollapse{{ $bil }}">
                                                                <div class="card-header0 ftest0">
                                                                    <a data-toggle="collapse" href="#divCollapse{{ $bil }}">
                                                                        <?php
                                                                                if (isset($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != "") {
                                                                                    echo strtoupper($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString);
                                                                                } else {
                                                                                    ?>--no title set--<?php
                                                                                                                }
                                                                                                                ?>
                                                                    </a>
                                                                </div>
                                                                <div id="divCollapse{{ $bil }}" class="panel-collapse collapse in" data-parent="#divParentCollapse{{ $bil }}">
                                                                    <div class="card-body">
                                                                        <?php
                                                                                $abstract = (isset($val->identificationInfo->MD_DataIdentification->abstract->CharacterString) ? $val->identificationInfo->MD_DataIdentification->abstract->CharacterString : "");
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
                                                                        <a href="#" class="metadataActionLinks aViewMetadata" onClick="return false;" data-metid="{{$key}}">Metadata Details</a>
                                                                        <a href="#" class="metadataActionLinks aViewXml" onClick="return false;" data-metid="{{$key}}">Metadata (XML)</a><?php /* SAMBUNG SINI - continue doing fn to show xml in new tab */ ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $bil++;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

    $(document).on("click", ".btn_cari_submit", function() {
        $("#form_carian").submit();
    });
    });
</script>
@stop
