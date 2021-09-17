@extends('layouts.app_mygeo_ketsa')

@section('content')

<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #b3ecff;
        color: black;
    }

    .card-primary:not(.card-outline)>.card-header a {
        color: black;
    }

    .p-2 {
        width: 150px;
    }

    .p-8 {
        width: 285px;
        padding-bottom: 3px;
    }

    .accordf .card-title {
        width: 85%;
    }

    .card-header {
        padding: 0.5rem 1.5rem;
    }

    .card-title {
        margin-bottom: 0rem;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Kemas Kini Metadata</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Kemas Kini Metadata
                                </li>
                            </ol>
                        </nav>
                    </div>
<!--                    <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-dark float-right" data-toggle="modal" data-target="#modal-muat-naik-xml">
                            <?php //echo __('lang.btn_upload_xml'); ?>
                        </button>
                    </div>-->
                </div>
            </div>
        </div>
    </section>

    <!--===== MODALS =====-->
    <div class="modal fade" id="modal-muat-naik-xml">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('muat_naik_xml') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="file_xml">
                                                Muat Naik Fail XML
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control ml-3" id="file_xml" type="file" name="file_xml" />
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between1">
                        <button type="submit" class="btn btn-primary" id="btn_muat_naik_xml">Muat Naik</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
                <div class="col-12">
                    <div class="card">
                        <form method="post" class="form-horizontal" id="form_metadata" action="{{url('simpan_kemaskini_metadata')}}" enctype="multipart/form-data">
                            @csrf
                            @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
                            <input type="hidden" name="newStatus" value="0">
                            @endif
                            <input type="hidden" name="metadata_id" value="{{ $metadataSearched->id }}">
                            @if(auth::user()->hasRole(['Penerbit Metadata','Pengesah Metadata','Super Admin']))
                            @include('mygeo.metadata.modal_metadata.modal_catatan')
                            @endif
                            <div class="card-body">
                                <!-- <div class="form-group row"> -->
                                <div class="clearfix">
                                    <p id="lbl_kategori"><?php echo __('lang.metadata_category'); ?> : &nbsp;&nbsp;&nbsp;</p>
                                    <select name="kategori" id="kategori" class="form-control float-left" style="width:175px;">
                                        <option disabled><?php echo __('lang.dropdown_choose'); ?></option>
                                        <?php
                                        $catSelected = "";
                                        if (count($categories) > 0) {
                                            if (isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != "") {
                                                $catSelected = strtolower(trim($metadataxml->hierarchyLevel->MD_ScopeCode));
                                            }
                                            foreach ($categories as $cat) {
                                                if (strtolower(trim($cat->name)) == $catSelected) {
                                                    ?><option value="<?php echo $cat->name; ?>" selected><?php echo $cat->name; ?></option><?php
                                                } else {
                                                    ?><option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option><?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;
                                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                        <?php
                                        $langSelected = "";
                                        if (isset($metadataxml->language->CharacterString) && trim($metadataxml->language->CharacterString) != "") {
                                            $langSelected = strtolower(trim($metadataxml->language->CharacterString));
                                        }
                                        ?>
                                        <label class="btn btn-secondary active">
                                            <img src="{{ url('/img/flagMalaysia.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="bm" {{ ((isset($_GET['bhs']) && $_GET['bhs'] == 'bm') || ($langSelected == 'bm') ? 'checked':'') }}>BM
                                        </label>
                                        <label class="btn btn-secondary">
                                            <img src="{{ url('/img/flagUnitedKingdom.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="en" {{ ((isset($_GET['bhs']) && $_GET['bhs'] == 'en') || ($langSelected == 'en') ? 'checked':'') }}>ENG
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div id="accordion" class="accordf">
                                    <?php //=== collapse1 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.general_information')
                                    <?php //=== collapse2 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.identification_information')
                                    <?php //=== collapse3 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.topic_category')
                                    <?php //=== collapse4 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.nominal_resolution')
                                    <?php //=== collapse5 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.process_step_information')
                                    <?php //=== collapse6 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.spatial_representation_information')
                                    <?php //=== collapse7 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.content_information')
                                    <?php //=== collapse8 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.aquisition_information')
                                    <?php //=== collapse9 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.spatial_domain')
                                    <?php //=== collapse10 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.browsing_information')
                                    <?php //=== collapse11 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.distribution_information')
                                    <?php //=== collapse12 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.data_set_identification')
                                    <?php //=== collapse13 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.reference_system_information')
                                    <?php //=== collapse14 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.constraints')
                                    <?php //=== collapse15 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.data_quality')
                                    <?php //=== collapse16 =============================================================
                                    ?>
                                    @if(count($customMetadataInput) > 0)
                                        @include('mygeo.metadata.kemaskini_metadata.custom_input')
                                    @endif
                                </div>
                                <div id="div_action_buttons">
                                    @if(auth::user()->hasRole(['Penerbit Metadata','Super Admin']))
                                    <input type="button" data-name="draf" value="Simpan" class="btn btn-primary btnSubmit">
                                    <input type="button" data-name="save" value="Hantar" class="btn btn-success btnSubmit">
                                    @endif
                                    @if(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
                                    <input type="button" data-name="save" value="Simpan" class="btn btn-success btnSubmit btn_hantar" style="display:none;">
                                    <button type="button" class="btn btn-success btn_terbit" data-metadataid="{{ $metadataSearched->id }}">Terbit</button>
                                    @endif

                                    <input type="hidden" name="submitAction" id="submitAction" value="save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id='fimages'></div>

<script>
    var pengesahs = [];

    $(document).ready(function () {
        $(document).on('change','#c1_content_info',function(){
            var cat = $('#kategori').val();
            if(cat == "Dataset" && $(this).val() == "Application"){
                $('.divIdentificationInformationUrl').show();
                $('.inputIdentificationInformationUrl').prop('disabled',false);
                $('.divBrowsingInformationUrl').hide();
                $('.inputBrowsingInformationUrl').prop('disabled',true);
            }else{
                $('.divIdentificationInformationUrl').hide();
                $('.inputIdentificationInformationUrl').prop('disabled',true);
                $('.divBrowsingInformationUrl').show();
                $('.inputBrowsingInformationUrl').prop('disabled',false);
            }
        });
        <?php
        $var = "";
        if (isset($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString != "") {
            $var = trim($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString);
        }
        if ($catSelected == "dataset" && $var == "Application") {
            ?>
            $('.divIdentificationInformationUrl').show();
            $('.inputIdentificationInformationUrl').prop('disabled',false);
            $('.divBrowsingInformationUrl').show();
            $('.inputBrowsingInformationUrl').prop('disabled',true);
            <?php
        }else{
            ?>
            $('.divIdentificationInformationUrl').hide();
            $('.inputIdentificationInformationUrl').prop('disabled',true);
            $('.divBrowsingInformationUrl').show();
            $('.inputBrowsingInformationUrl').prop('disabled',false);
            <?php
        }

        $typeofProd = "";
        if (isset($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString != "") {
            $typeofProd = trim($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString);
        }
        if($typeofProd == "Application") {
            ?>
            $('.abstractApplication').show();
            $('.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "Document") {
            ?>
            $('.abstractDocument').show();
            $('.abstractApplication,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "GIS Activity/Project") {
            ?>
            $('.abstractGISActivityProject').show();
            $('.abstractApplication,.abstractDocument,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "Map") {
            ?>
            $('.abstractMap').show();
            $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "Raster Data") {
            ?>
            $('.abstractRasterData').show();
            $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "Services") {
            ?>
            $('.abstractServices').show();
            $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractSoftware,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "Software") {
            ?>
            $('.abstractSoftware').show();
            $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractVectorData').hide();
            <?php
        }elseif ($typeofProd == "Vector Data") {
            ?>
            $('.abstractVectorData').show();
            $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware').hide();
            <?php
        }
        ?>

        <?php
        if(auth::user()->hasRole(['Pengesah Metadata','Super Admin'])){
            ?>
            $(document).on('focusout','.catatan',function(){
                if($(this).val().trim() != ""){
                    $('.btn_hantar').show();
                    $('.btn_terbit').hide();
                    var btn = $(this).data('parentmodal');
                    $(document).find("[data-target='#"+btn+"'").removeClass('btn-secondary').addClass('btn-danger');
                }else{
                    var flag = 1;
                    $('.catatan').each(function(i, obj) {
                       if($(this).val().trim() != ""){
                           flag = flag * 0;
                       }
                    });
                    if(flag == 1){
                        $('.btn_hantar').hide();
                        $('.btn_terbit').show();
                    }
                    var btn = $(this).data('parentmodal');
                    $(document).find("[data-target='#"+btn+"'").removeClass('btn-danger').addClass('btn-secondary');
                }
            });
            $('.catatan').each(function(i, obj) {
               if($(this).val().trim() != ""){
                   var btn = $(this).data('parentmodal');
                   $(document).find("[data-target='#"+btn+"'").removeClass('btn-secondary').addClass('btn-danger');
               }
            });
            <?php
        }
        if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no"){
            ?>
            $('.catatan').each(function(i, obj) {
               if($(this).text().trim() != "- Tiada Catatan -"){
                   var btn = $(this).data('parentmodal');
                   $(document).find("[data-target='#"+btn+"'").removeClass('btn-secondary').addClass('btn-danger');
               }
            });
            <?php
        }
        ?>

        $(document).on("click", "#btnTestServiceUrl", function () {
            var mapurl = $('#c2_serviceUrl').val();
            $('#mapiframe').attr('src', '<?php echo url("/"); ?>/intecxmap/search/view-map-service.html?url='+mapurl);
//            $('#modal-showmap').modal('show');
        });
        $(document).on("click", ".btnTestUrl", function () {
            var weburl = $(this).parent().parent().find('.urlToTest').val();
            window.open(weburl, '_blank');
        });

        var oriMetadataName = $('#c2_metadataName').val();

        $(document).on('click','.btnSubmit',function(){
            var btnSubmit = $(this);
            window.onbeforeunload = null; //remove double alert
            $('#submitAction').val($(this).data('name'));
            var currentName = $('#c2_metadataName').val().trim();

            <?php
            if(auth::user()->hasRole(['Penerbit Metadata'])){
                ?>
                if(oriMetadataName.trim().toLowerCase() != currentName.trim().toLowerCase()){
                    $.ajax({
                        method: "POST",
                        url: "{{ url('validateMetadataName') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "metadataName": currentName
                        },
                    }).done(function(response) {
                        if (response == "found") {
                            alert('Nama metadata sudah wujud');
                        } else {
                            if(oriMetadataName.trim().toLowerCase() != currentName.trim().toLowerCase()){
                                if(confirm('Anda membuat perubahan pada tajuk metadata. Simpan metadata sebagai metadata baharu?')){
                                    $('#c2_saveAsNew').val('yes');
                                }else{
                                    $('#c2_saveAsNew').val('no');
                                }
                            }

                            if($(this).data('name') == 'save'){
                                if(confirm('Anda pasti untuk menghantar metadata?')){
                                    $('#form_metadata').submit();
                                }
                            }else if($(this).data('name') == 'draf'){
                                if(confirm('Anda pasti untuk menyimpan metadata?')){
                                    $('#form_metadata').submit();
                                }
                            }
                        }
                    });
                }else{
                    $('#c2_saveAsNew').val('no');

                    if($(this).data('name') == 'save'){
                        if(confirm('Anda pasti untuk menghantar metadata?')){
                            $('#form_metadata').submit();
                        }
                    }else if($(this).data('name') == 'draf'){
                        if(confirm('Anda pasti untuk menyimpan metadata?')){
                            $('#form_metadata').submit();
                        }
                    }
                }
                <?php
            }else if(auth::user()->hasRole(['Pengesah Metadata'])){
                ?>
                $('#c2_saveAsNew').val('no');
                if(confirm('Anda pasti untuk menyimpan catatan?')){
                    $('#form_metadata').submit();
                }
                <?php
            }
            ?>
        });

        window.onbeforeunload = function() {
            return 'Anda sedang meninggal. page ini. Sila simpan metadata terlebih dahulu.' ;
        }

        $('input:radio[name="flanguage"]').change(function () {
            window.onbeforeunload = null;

            if ($(this).val() == 'bm') {
                var url = '{{ url("/kemaskini_metadata/$metadataSearched->id") }}';
                url += '?bhs=bm'
                window.location.href = url;
            } else if ($(this).val() == 'en') {
                var url = '{{ url("/kemaskini_metadata/$metadataSearched->id") }}';
                url += '?bhs=en'
                window.location.href = url;
            }
        });

        $(document).on('change', '#kategori', function(){
            var url = '{{ url("/kemaskini_metadata/".$metadataSearched->id) }}';
            url += '?kategori='+$(this).val();
            
            window.location.href = url;
        });
        
        <?php
        if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
            ?>
            $('#kategori').val("{{ $_GET['kategori'] }}");
            var kategori = "{{ $_GET['kategori'] }}";
            if (kategori.toLowerCase() == "dataset") {
                $('.lblMetadataName').html('Title<span class="text-warning">*</span>');
                $('.aTopicCategory').html('<?php echo __('lang.accord_3'); ?><span class="text-warning">*</span>');
                $('.divPublisherRole').show();
                $('.divMetadataDate').show();
                $('.divMetadataDateType').show();
                $('.divMetadataStatus').show();
                $('.divResponsiblePartyRole').show();
                $('.optContentInfo_dataset').show();
                $('.optContentInfo_services').hide();
                $('.optContentInfo_gridded').hide();
                $('.optContentInfo_imagery').hide();
                $('.optStatus_dataset').show();
                $('.optStatus_services').hide();
                $('.divTypeOfServices').hide();
                $('.divOperationName').hide();
                $('.divServiceUrl').hide();
                $('.divTypeOfCouplingDataset').hide();
                $('.refSys_Services').hide();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('#c1_content_info').prop('disabled',false);
                $('#content_info_text').prop('disabled',true);
                $('#c1_content_info').show();
                $('.lblContentInfo').hide();
                $('.divMaintenanceInfo').hide();
                $('#c12_maintenanceUpdate').prop('disabled',true);
            }else if (kategori.toLowerCase() == "services") {
                $('.optContentInfo_dataset').hide();
                $('.optContentInfo_services').show();
                $('.optContentInfo_gridded').hide();
                $('.optContentInfo_imagery').hide();
                $('.optStatus_dataset').hide();
                $('.optStatus_services').show();
                $('.divTypeOfServices').show();
                $('.divOperationName').show();
                $('.divServiceUrl').show();
                $('.divTypeOfCouplingDataset').show();
                $('.refSys_Services').show();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').hide();
                $('.divUseLimitation').show();
                $('#c1_content_info').prop('disabled',true);
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Live Data and Maps');
                $('#content_info_text').val('Live Data and Maps');
                $('.lblContentInfo').show();
                $('#c1_content_info').hide();
                $('.divMaintenanceInfo').hide();
                $('#c12_maintenanceUpdate').prop('disabled',true);
            }else if (kategori.toLowerCase() == "gridded") {
                $('.optContentInfo_dataset').hide();
                $('.optContentInfo_services').hide();
                $('.optContentInfo_gridded').show();
                $('.optContentInfo_imagery').hide();
                $('.optStatus_dataset').hide();
                $('.optStatus_services').show()
                $('.divTypeOfServices').hide();
                $('.divOperationName').hide();
                $('.divServiceUrl').hide();
                $('.divTypeOfCouplingDataset').hide();
                $('.refSys_Services').hide();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('#c1_content_info').prop('disabled',true);
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Gridded');
                $('#content_info_text').val('Gridded');
                $('.lblContentInfo').show();
                $('#c1_content_info').hide();
                $('.divMaintenanceInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',false);
            }else if (kategori.toLowerCase() == "imagery") {
                $('.optContentInfo_dataset').hide();
                $('.optContentInfo_services').hide();
                $('.optContentInfo_gridded').hide();
                $('.optContentInfo_imagery').show();
                $('.optStatus_dataset').hide();
                $('.optStatus_services').show();
                $('.divTypeOfServices').hide();
                $('.divOperationName').hide();
                $('.divServiceUrl').hide();
                $('.divTypeOfCouplingDataset').hide();
                $('.refSys_Services').hide();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('#c1_content_info').prop('disabled',true);
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Imagery');
                $('#content_info_text').val('Imagery');
                $('.lblContentInfo').show();
                $('#c1_content_info').hide();
                $('.divMaintenanceInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',false);
            }

            <?php
            if ($catSelected == "dataset" || $catSelected == "services") {
                ?>
                        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
                <?php
            } elseif ($catSelected == "imagery" || $catSelected == "gridded") {
                ?>
                        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
                <?php
            }
        }else{
            ?>
            var kategori = "<?php echo strtolower($catSelected); ?>";
            if (kategori.toLowerCase() == "dataset") {
                $('.lblMetadataName').html('Title<span class="text-warning">*</span>');
                $('.aTopicCategory').html('<?php echo __('lang.accord_3'); ?><span class="text-warning">*</span>');
                $('.divPublisherRole').show();
                $('.divMetadataDate').show();
                $('.divMetadataDateType').show();
                $('.divMetadataStatus').show();
                $('.divResponsiblePartyRole').show();
                $('.optContentInfo_dataset').show();
                $('.optContentInfo_services').hide();
                $('.optContentInfo_gridded').hide();
                $('.optContentInfo_imagery').hide();
                $('.optStatus_dataset').show();
                $('.optStatus_services').hide();
                $('.divTypeOfServices').hide();
                $('.divOperationName').hide();
                $('.divServiceUrl').hide();
                $('.divTypeOfCouplingDataset').hide();
                $('.refSys_Services').hide();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('#c1_content_info').prop('disabled',false);
                $('#content_info_text').prop('disabled',true);
                $('#c1_content_info').show();
                $('.lblContentInfo').hide();
                $('.divMaintenanceInfo').hide();
                $('#c12_maintenanceUpdate').prop('disabled',true);
            }else if (kategori.toLowerCase() == "services") {
                $('.optContentInfo_dataset').hide();
                $('.optContentInfo_services').show();
                $('.optContentInfo_gridded').hide();
                $('.optContentInfo_imagery').hide();
                $('.optStatus_dataset').hide();
                $('.optStatus_services').show();
                $('.divTypeOfServices').show();
                $('.divOperationName').show();
                $('.divServiceUrl').show();
                $('.divTypeOfCouplingDataset').show();
                $('.refSys_Services').show();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').hide();
                $('.divUseLimitation').show();
                $('#c1_content_info').prop('disabled',true);
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Live Data and Maps');
                $('#content_info_text').val('Live Data and Maps');
                $('.lblContentInfo').show();
                $('#c1_content_info').hide();
                $('.divMaintenanceInfo').hide();
                $('#c12_maintenanceUpdate').prop('disabled',true);
            }else if (kategori.toLowerCase() == "gridded") {
                $('.optContentInfo_dataset').hide();
                $('.optContentInfo_services').hide();
                $('.optContentInfo_gridded').show();
                $('.optContentInfo_imagery').hide();
                $('.optStatus_dataset').hide();
                $('.optStatus_services').show()
                $('.divTypeOfServices').hide();
                $('.divOperationName').hide();
                $('.divServiceUrl').hide();
                $('.divTypeOfCouplingDataset').hide();
                $('.refSys_Services').hide();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('#c1_content_info').prop('disabled',true);
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Gridded');
                $('#content_info_text').val('Gridded');
                $('.lblContentInfo').show();
                $('#c1_content_info').hide();
                $('.divMaintenanceInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',false);
            }else if (kategori.toLowerCase() == "imagery") {
                $('.optContentInfo_dataset').hide();
                $('.optContentInfo_services').hide();
                $('.optContentInfo_gridded').hide();
                $('.optContentInfo_imagery').show();
                $('.optStatus_dataset').hide();
                $('.optStatus_services').show();
                $('.divTypeOfServices').hide();
                $('.divOperationName').hide();
                $('.divServiceUrl').hide();
                $('.divTypeOfCouplingDataset').hide();
                $('.refSys_Services').hide();
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('#c1_content_info').prop('disabled',true);
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Imagery');
                $('#content_info_text').val('Imagery');
                $('.lblContentInfo').show();
                $('#c1_content_info').hide();
                $('.divMaintenanceInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',false);
            }

            <?php
            if ($catSelected == "dataset" || $catSelected == "services") {
                ?>
                        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
                <?php
            } elseif ($catSelected == "imagery" || $catSelected == "gridded") {
                ?>
                        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
                <?php
            }
        }
        ?>

        $(document).on('change', '#c2_product_type', function() {
            var type = $(this).val();
            if (type == "Application") {
//                $('#c2_abstract').attr('placeholder','Nama Aplikasi – Tujuan – Tahun Pembangunan – Kemaskini – Data Terlibat – Sasaran Pengguna – Versi – Perisian Yang Digunakan Dalam Pembangunan');
                $('.abstractApplication').show();
                $('.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Document") {
//                $('#c2_abstract').attr('placeholder', 'Nama Dokumen – Tujuan – Tahun Terbitan – Edisi');
                $('.abstractDocument').show();
                $('.abstractApplication,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "GIS Activity/Project") {
//                $('#c2_abstract').attr('placeholder', 'Nama Aktiviti –Tujuan – Lokasi – Tahun');
                $('.abstractGISActivityProject').show();
                $('.abstractApplication,.abstractDocument,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Map") {
//                $('#c2_abstract').attr('placeholder','Nama Peta – Kawasan - Tujuan – Tahun Terbitan – Edisi – No. Siri – Skala – Unit');
                $('.abstractMap').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Raster Data") {
//                $('#c2_abstract').attr('placeholder','Nama Data - Lokasi - Rumusan Tentang Data - Tujuan Data - Kaedah Penyediaan Data – Format - Unit – Skala - Status Data - Tahun Perolehan - Jenis Satelit – Format – Resolusi - Kawasan Litupan');
                $('.abstractRasterData').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Services") {
//                $('#c2_abstract').attr('placeholder','Nama Servis – Lokasi – Tujuan – Data Yang Terlibat – Polisi –Peringkat Capaian- Format');
                $('.abstractServices').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Software") {
//                $('#c2_abstract').attr('placeholder','Nama Perisian – Versi- Tujuan – Tahun Penggunaan Perisian – Kaedah Perolehan – Format – Pengeluar – Keupayaan -Data Yang Terlibat –Keperluan Perkakasan');
                $('.abstractSoftware').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractVectorData').hide();
            } else if (type == "Vector Data") {
//                $('#c2_abstract').attr('placeholder','Nama Data - Lokasi - Rumusan Tentang Data - Tujuan Data - Kaedah Penyediaan Data – Format - Unit – Skala - Status Data');
                $('.abstractVectorData').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware').hide();
            }

            $('.abstractElement').val("");
            $('#c2_abstract').val("");
        });

        $(".abstractElement").keyup(function(){
            var type = $('#c2_product_type').val();
            var abstractText = "";
            var typeSelector = "";

            if (type == "Application") {
                typeSelector = ".abstractApplication";
            } else if (type == "Document") {
                typeSelector = ".abstractDocument";
            } else if (type == "GIS Activity/Project") {
                typeSelector = ".abstractGISActivityProject";
            } else if (type == "Map") {
                typeSelector = ".abstractMap";
            } else if (type == "Raster Data") {
                typeSelector = ".abstractRasterData";
            } else if (type == "Services") {
                typeSelector = ".abstractServices";
            } else if (type == "Software") {
                typeSelector = ".abstractSoftware";
            } else if (type == "Vector Data") {
                typeSelector = ".abstractVectorData";
            }

            var elements = $(typeSelector).find('.abstractElement');
            $(elements).each(function(index){
                if($(this).val() !== ""){
                    abstractText += $(this).val()+'  ';
                }
            });
            abstractText = abstractText.trim();

            $('#c2_abstract').val(abstractText);
        });
<?php
if (!is_null(old('kategori'))) {
    ?>
            $("#kategori").val("{{old('kategori')}}").trigger('change');
    <?php
}
?>

        updateLayer();

        $(document).on("click", ".btn_terbit", function() {
            if (confirm("Adakah anda pasti untuk mengesahkan metadata ini?")) {
                $('#submitAction').val('terbit');
                $('#form_metadata').submit();
                // ajax sahkan metadata
//                var metadata_id = $(this).data('metadataid');
//                $.ajax({
//                    method: "POST",
//                    url: "{{ url('metadata_sahkan') }}",
//                    data: {
//                        "_token": "{{ csrf_token() }}",
//                        "metadata_id": metadata_id,
//                        "process": "terbit"
//                    },
//                })
//                .done(function(response) {
//                    alert("Metadata berjaya disahkan.");
//                    window.location.replace('{{ url("mygeo_pengesahan_metadata") }}');
//                });
            }
        });
    });
</script>

<?php
$westBoundLongitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal : "");
$eastBoundLongitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal : "");
$southBoundLatitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal : "");
$northBoundLatitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal : "");
?>

<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-image/v0.0.4/leaflet-image.js'></script>

<script>
    var N = "<?php echo $northBoundLatitude; ?>";
    var W = "<?php echo $westBoundLongitude; ?>";
    var S = "<?php echo $southBoundLatitude; ?>";
    var E = "<?php echo $eastBoundLongitude; ?>";

    var setNbltValue = document.getElementById("nblt").value = N;
    var setWblgValue = document.getElementById("wblg").value = W;
    var serSbltValue = document.getElementById("sblt").value = S;
    var setEblgValue = document.getElementById("eblg").value = E;

    var map = L.map('map').setView([5.3105, 107.3854408], 5);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: - 1
    }).addTo(map);
    drawRectangleEditor();
    searchLocation();

    leafletImage(map, function(err, canvas) {
        // now you have canvas
        // example thing to do with that canvas:
        var img = document.createElement('img');
        var dimensions = map.getSize();
        img.width = dimensions.x;
        img.height = dimensions.y;
        img.src = canvas.toDataURL();
        document.getElementById('fimages').innerHTML = '';
        document.getElementById('fimages').appendChild(img);
    });
    leafletImage(map, callback);

    // To trigger onchange function
//    var el = document.getElementById('nblt');
//    el.dispatchEvent(new Event('change'));

    function updateLayer() {
        var nbltValue = document.getElementById("nblt").value;
        var wblgValue = document.getElementById("wblg").value;
        var sbltValue = document.getElementById("sblt").value;
        var eblgValue = document.getElementById("eblg").value;
        if (wblgValue != '' && eblgValue != '' && nbltValue != '' && sbltValue != '') {
            map.eachLayer((layer) => {
                layer.remove();
            });
            showRectangle(nbltValue, wblgValue, sbltValue, eblgValue)
        }
    }

    function searchLocation() {
        var markerIcon = L.icon({
            iconUrl: 'css/leaflet@1.7.1/images/marker-icon-2x.png',
            iconSize: [30, 53], // size of the icon [width, height] in px
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        });
        var searchControl = new L.esri.Controls.Geosearch().addTo(map);
        var results = new L.LayerGroup().addTo(map);
        searchControl.on('results', function (data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
                L.marker([data.results[i].latlng.lat, data.results[i].latlng.lng], {icon: markerIcon}).addTo(map);
            }
        });
    }

    function drawRectangleEditor() {
        // Initialise the FeatureGroup to store editable layers
        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);
        var drawPluginOptions = {
            position: 'topright',
            edit: {
                edit: false,
                featureGroup: editableLayers, //REQUIRED!!
                remove: false
            },
            draw: {
                rectangle: {
                allowIntersection: false, // Restricts shapes to simple polygons
                    drawError: {
                        color: '#e1e100', // Color the shape will turn when intersects
                        message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                    },
                    shapeOptions: {
                        color: '#97009c'
                    }
                },
                // disable toolbar item by setting it to false
                polygon: false,
                polyline: false,
                circle: false, // Turns off this drawing tool
                rectangle: true,
                marker: false,
            }
        };
    // Initialise the draw control and pass it the FeatureGroup of editable layers
        var drawControl = new L.Control.Draw(drawPluginOptions);
        map.addControl(drawControl);
        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);
        map.on('draw:created', function(e) {
            var type = e.layerType,
            layer = e.layer;
            var coordinatesData = layer.getLatLngs();
            var drawNblt = coordinatesData[0][1];
            var drawWblg = coordinatesData[0][1];
            var drawSblt = coordinatesData[0][3];
            var drawEblg = coordinatesData[0][3];
            var setNbltValue = document.getElementById("nblt").value = drawNblt.lat;
            var setWblgValue = document.getElementById("wblg").value = drawWblg.lng;
            var serSbltValue = document.getElementById("sblt").value = drawSblt.lat;
            var setEblgValue = document.getElementById("eblg").value = drawEblg.lng;
            var el = document.getElementById('nblt');
            el.dispatchEvent(new Event('change'));
            editableLayers.addLayer(layer);
        });
    }

    function showRectangle(nblt, wblg, sblt, eblg) {
        var rectangle;
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);
        var bounds = [
            [nblt, wblg],
            [sblt, eblg]
        ];
        rectangle = L.rectangle(bounds).addTo(map);
        var zoomToRectangle = L.rectangle(bounds).addTo(map).getCenter();
        map.fitBounds(bounds);
    }

    function cleaLayer() {
        map.eachLayer((layer) => {
            layer.remove();
        });
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);
    }

    function saveData() {
        var nbltValue = document.getElementById("nblt").value;
        var wblgValue = document.getElementById("wblg").value;
        var sbltValue = document.getElementById("sblt").value;
        var eblgValue = document.getElementById("eblg").value;
        var data = ["North Bound Latitude: " + nbltValue, "West Bound Longitude: " + wblgValue, "South Bound Latitude: " + sbltValue, "East Bound Longitude: " + eblgValue];

        alert(data);
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stop
