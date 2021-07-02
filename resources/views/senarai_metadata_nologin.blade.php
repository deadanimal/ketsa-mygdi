@extends('layouts.app_afiq')

@section('content')

<style>
    .metadataActionLinks {
        margin-right: 30px;
        text-decoration: underline;
        text-decoration-line: underline;
    }

    .navbar-search .form-control:focus {
        width: 380px;
    }
</style>


<section class="content pt-8 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card pt-3 " style="background-color: rgba(255, 255, 255, 0.9);">
                    <div class="card-body text-center">
                        <h1>Carian Metadata</h1>
                        <hr class="mb-3">
                        <form method="post" class="navbar-search navbar-search-light form-inline my-4 justify-content-center" action="{{url('carian_metadata_nologin')}}" id="form_carian">
                            @csrf
                            @include('modal_carian_tambahan')
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
                        <a class="btn btn-sm btn-success text-white text-center btn_cari_submit" style="cursor:pointer;">
                            <span><i class="mr-2 fas fa-search"></i></span>
                            Cari
                        </a>
                        <a class="btn btn-sm btn-primary text-white text-center" data-toggle="modal" data-target="#modal-carian-tambahan" style="cursor:pointer;">
                            Carian Tambahan &gt;&gt;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="width:100%;">
    <section class="content">
        <div class="container">
            <div class="row divSenaraiMetadata" style="display:none;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 2rem;">Senarai Metadata</h3>
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
    </section>
</div>

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
