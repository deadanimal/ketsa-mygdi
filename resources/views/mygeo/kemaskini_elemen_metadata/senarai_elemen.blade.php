@extends('layouts.app_mygeo_ketsa_kemaskini_elemen_metadata')

@section('content')

<style>
    .ftest{
        display:inline;
        width:auto;
    }
</style>
<style>
    div.sortIt,tr.sortIt { 
        clear:both;
        width: 100%; 
        float: left; 
        margin: 4px; 
        padding: 8px; 
        background-color: #e6e6e6;
    }
    .close {
        cursor: pointer;
        /*position: absolute;*/
        top: 50%;
        right: 0%;
        padding: 12px 16px;
        /*transform: translate(0%, -50%);*/
    }

    .close:hover {background: #bbb;}
</style>


@include('mygeo.kemaskini_elemen_metadata.modals.modal')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<?php
$langSelected = "bm";
if (isset($_GET['bhs']) && $_GET['bhs'] != "") {
    $langSelected = $_GET['bhs'];
}
$bhs = $langSelected;
?>

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
                            <h3 class="card-title" style="font-size: 2rem;">Kemas Kini Elemen Metadata 2</h3>
                            <div class="float-right">
                                <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCustomInput">Tambah</button>-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-inline">
                                        <label class="form-control-label mr-3" for="versiontop">Version:</label>
                                        <input type="text" name="versiontop" id="versiontop" class="form-control" value="{{ $template->version }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-inline">
                                        &nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-inline">
                                        <label class="form-control-label mr-3" for="version"><?php echo __('lang.metadata_category'); ?>:</label>
                                        <select name="kategori" id="kategori" class="form-control" style="width:175px;">
                                            <option selected disabled><?php echo __('lang.dropdown_choose'); ?></option>
                                            <?php
                                            if (count($categories) > 0) {
                                                foreach ($categories as $cat) {
                                                    ?><option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option><?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <img src="{{ url('/img/flagMalaysia.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="bm"
                                                   {{ $langSelected == 'bm' ? 'checked' : '' }}>BM
                                        </label>
                                        <label class="btn btn-secondary">
                                            <img src="{{ url('/img/flagUnitedKingdom.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="en"
                                                   {{ $langSelected == 'en' ? 'checked' : '' }}>ENG
                                        </label>
                                    </div>
                                </div>
                            <br>
                            <?php
                            if(isset($_GET['kategori']) && $_GET['kategori'] != ""){
                                ?>
                                <div id="accordion" class="accordf">
                                    <?php //=== collapse1 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.general_information')
                                    <?php //=== collapse2 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.identification_information')
                                    <?php //=== collapse3 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.topic_category')
                                    <?php //=== collapse4 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.nominal_resolution')
                                    <?php //=== collapse5 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.process_step_information')
                                    <?php //=== collapse6 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.spatial_representation_information')
                                    <?php //=== collapse7 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.content_information')
                                    <?php //=== collapse8 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.aquisition_information')
                                    <?php //=== collapse9 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.spatial_domain')
                                    <?php //=== collapse10 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.browsing_information')
                                    <?php //=== collapse11 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.distribution_information')
                                    <?php //=== collapse12 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.data_set_identification')
                                    <?php //=== collapse13 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.reference_system_information')
                                    <?php //=== collapse14 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.constraints')
                                    <?php //=== collapse15 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_elemen.data_quality')
                                </div>
                                <div class="col-3">
                                    <form id="formMetadataTemplate" name="formMetadataTemplate" method="POST" action="{{ url('simpan_metadata_template') }}">
                                        @csrf
                                        <input type="hidden" name="version" id="version"><br>
                                        <input type="hidden" name="templateKategori" id="templateKategori">
                                        <input type="hidden" name="activeInputs" id="activeInputs">
                                        <button type="button" class="btn btn-primary" id="saveTemplate">Save Template</button>
                                    </form>
                                </div>
                                <?php
                            }
                            ?>
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
        $('input:radio[name="flanguage"]').change(function() {
            window.onbeforeunload = null;
            if ($(this).val() == 'bm') {
                var url = '{{ url("/mygeo_kemaskini_elemen_metadata") }}';
                <?php
                if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
                    ?>
                    url += '?kategori={{$_GET['kategori']}}&bhs=bm';
                    <?php
                }
                ?>
                window.location.href = url;
            } else if ($(this).val() == 'en') {
                var url = '{{ url("/mygeo_kemaskini_elemen_metadata") }}';
                <?php
                if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
                    ?>
                    url += '?kategori={{$_GET['kategori']}}&bhs=en';
                    <?php
                }
                ?>
                window.location.href = url;
            }
        });
        
        var templateInactive = <?php echo json_encode($template->template); ?>; //this includes all elements regardless of status active or inactive. i wasn't thinking straight lulz
        //================================
        $('.sortableContainer1').sortable();
        /*
        $('#saveTemplate').button().click(function() {
            //get order of all inputs except Data Quality tabs
            var itemOrder = $('.sortableContainer1 .sortable').sortable();
            var jsontxt = "";
            jQuery.each(itemOrder, function(index, item) {
                jsontxt = jsontxt + item.name + "@";
            });
            
            //get order of all inputs of Data Quality tabs
            var itemOrder2 = $('.dqtabstable .sortable').sortable();
            jQuery.each(itemOrder2, function(index, item) {
                jsontxt = jsontxt + item.name + "@";
            });
            
            $('#activeInputs').val(jsontxt);
            $('#version').val($('#versiontop').val());
            $('#formMetadataTemplate').submit();
        });
        */
        $('#saveTemplate').button().click(function() {
            //get order of all inputs except Data Quality tabs
            var itemOrder = $('.sortableContainer1 .sortable').sortable();
            var jsontxt = [];
            jQuery.each(itemOrder, function(index, item) {
                var accordionId = $(item).closest('.panel-collapse').attr('id');
                var accordion = accordionId.replace('collapse','');
                if($(item).hasClass("newInput")){
                    var newInputName = $(item).parent().parent().find('.customInput_label').val();
                    jsontxt.push({"name":newInputName,"status":$(item).attr('data-status'),"accordion":"accordion"+accordion});
                }else{
                    jsontxt.push({"name":item.name,"status":$(item).attr('data-status'),"accordion":"accordion"+accordion});
                }
            });
            console.log(jsontxt);
            //get order of all inputs of Data Quality tabs
            var itemOrder2 = $('.dqtabstable .sortable').sortable();
            jQuery.each(itemOrder2, function(index, item) {
                var accordionId = $(item).closest('.panel-collapse').attr('id');
                var accordion = accordionId.replace('collapse','');
                if($(item).hasClass("newInput")){
                    var newInputName = $(item).parent().parent().find('.customInput_label').val();
                    jsontxt.push({"name":newInputName,"status":$(item).data('status'),"accordion":"accordion"+accordion});
                }else{
                    jsontxt.push({"name":item.name,"status":$(item).data('status'),"accordion":"accordion"+accordion});
                }
            });
            
            $('#activeInputs').val(JSON.stringify(jsontxt));
            $('#version').val($('#versiontop').val());
            $('#formMetadataTemplate').submit();
        });
        
        $(document).on("click",".btnClose",function(){
            if($(this).parent().find('.sortable').attr('data-status') !== "customInput"){
                $(this).parent().find('.sortable').attr('data-status', 'inactive');
            }else{
                $(this).parent().find('.sortable').attr('data-status', 'deleteCustomInput');
            }
            $(this).parent().hide();
        });
        $(document).on("click",".btnTambah",function(){
            var category = $('#templateKategori').val().toLowerCase();
            var accordion = $(this).data('accordion');
            var availableOptions = {};
            
            $('.btnTambahElemenBaru').attr('data-accordion',accordion);
            
            var hiddenButNotSaved = $("#collapse"+accordion+" .sortable[data-status='inactive']").sortable();
            
            jQuery.each(hiddenButNotSaved, function(index, item) {
                if($(item).data('status') == "inactive"){
                    var inputdetail = templateInactive[category]['accordion'+accordion][item.name];
                    availableOptions[item.name] = inputdetail.label_bm;
                }
            });

//            console.log(availableOptions);
//            console.log($.isEmptyObject(availableOptions));
//            console.log(templateInactive[category]['accordion'+accordion]);
            if(!$.isEmptyObject(availableOptions)){
                $('.availableOptionsContainer').empty();
                var html = '<select name="tambahElemen" data-accordion="'+accordion+'" class="form-control tambahElemen">';
                jQuery.each(availableOptions, function(index, item) {
                    html += '<option value="'+index+'">'+item+'</option>';
                });
                html += '</select>';
                $('.availableOptionsContainer').append(html);
            }
        });
        $(document).on("click",".btnConfirmTambah",function(){
            var tambahElemen = $('.tambahElemen').val();
            var category = $('#templateKategori').val().toLowerCase();
            var accordion = $('.tambahElemen').data('accordion');
            var availableOptions = {};
            
            $('[name="'+tambahElemen+'"]').closest('.sortIt').show();
            $('[name="'+tambahElemen+'"]').attr('data-status', 'active');
        });
        $(document).on("click",".btnTambahElemenBaru",function(){
            var accordion = $(this).data('accordion');
            $('#collapse'+accordion+' .sortableContainer1').append('<div class="row mb-2 sortIt"><div class="col-3 pl-5"><label class="form-control-label mr-4" for="uname"><input type="text" name="newInputName" class="customInput_label"></label><label class="float-right">:</label></div><div class="col-8"><input class="form-control form-control-sm ml-3 sortable newInput" type="text" name="torename" data-status="customInput" style="display:none;"/></div><span class="close btnClose">&times;</span></div>');
        });
        //================================

        /*
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
        */
    });

    /*
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
*/
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
/*
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
    */
</script>
<script>
    $(document).ready(function() {
        $('.sortable').hide();
        $('.divIdentificationInformationUrl').hide();
        $('.inputIdentificationInformationUrl').prop('disabled',true);
        $('#kategori').show();
        $('#lbl_kategori').show();
        $('#div_action_buttons').hide();
        $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
        $('.divIdentificationInformationUrl').hide();
        $('.inputIdentificationInformationUrl').prop('disabled',true);
        $('.divBrowsingInformationUrl').show();
        $('.inputBrowsingInformationUrl').prop('disabled',false);

        $(document).on('click', '.btnSubmit', function() {
            var btnSubmit = $(this);
            window.onbeforeunload = null; //remove double alert
            $('#submitAction').val($(this).data('name'));
            var metadataName = $("#c2_metadataName").val();
            $.ajax({
                method: "POST",
                url: "validateMetadataName",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "metadataName": metadataName
                },
            }).done(function(response) {
                if (response == "found") {
                    alert('Nama metadata sudah wujud');
                } else {
                    if (btnSubmit.data('name') == 'save') {
                        if (confirm('Anda pasti untuk menghantar metadata?')) {
                            $('#form_metadata').submit();
                        }
                    } else if (btnSubmit.data('name') == 'draf') {
                        if ($('#c2_metadataName').val() == "") {
                            alert('Sila isi nama metadata');
                        } else {
                            if (confirm('Anda pasti untuk menyimpan metadata?')) {
                                $('#form_metadata').submit();
                            }
                        }
                    }
                }
            });
        });
        
        $(document).on('change', '#c2_product_type', function() {
            var type = $(this).val();
            if (type == "Application") {
                $('.abstractApplication').show();
                $('.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Document") {
                $('.abstractDocument').show();
                $('.abstractApplication,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "GIS Activity/Project") {
                $('.abstractGISActivityProject').show();
                $('.abstractApplication,.abstractDocument,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Map") {
                $('.abstractMap').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractRasterData,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Raster Data") {
                $('.abstractRasterData').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractServices,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Services") {
                $('.abstractServices').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractSoftware,.abstractVectorData').hide();
            } else if (type == "Software") {
                $('.abstractSoftware').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractVectorData').hide();
            } else if (type == "Vector Data") {
                $('.abstractVectorData').show();
                $('.abstractApplication,.abstractDocument,.abstractGISActivityProject,.abstractMap,.abstractRasterData,.abstractServices,.abstractSoftware').hide();
            }

            $('.abstractElement').val("");
            $('#c2_abstract').val("");
        });

        <?php
        if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
            ?>
            $('#kategori').val("{{ $_GET['kategori'] }}");
            $('#templateKategori').val("{{ $_GET['kategori'] }}");
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly', true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('.divMaintenanceInfo').hide();
                $('#content_info_text').prop('disabled',true);
                $('.lblContentInfo').hide();
                $('#c12_maintenanceUpdate').prop('disabled',true);
                $('#div_contohJenisMetadata').show();
            } else if (kategori.toLowerCase() == "services") {
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly', true);
                $('.divDataQualityTabs').hide();
                $('.divUseLimitation').show();
                $('.divMaintenanceInfo').hide();
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Live Data and Maps');
                $('#content_info_text').val('Live Data and Maps');
                $('.lblContentInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',true);
                $('#div_contohJenisMetadata').hide();
            } else if (kategori.toLowerCase() == "gridded") {
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly', true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('.divMaintenanceInfo').show();
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Gridded');
                $('#content_info_text').val('Gridded');
                $('.lblContentInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',false);
                $('#div_contohJenisMetadata').show();
            } else if (kategori.toLowerCase() == "imagery") {
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly', true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('.divMaintenanceInfo').show();
                $('#content_info_text').prop('disabled',false);
                $('.lblContentInfo').html('Imagery');
                $('#content_info_text').val('Imagery');
                $('.lblContentInfo').show();
                $('#c12_maintenanceUpdate').prop('disabled',false);
                $('#div_contohJenisMetadata').show();
            }

            if (kategori.toLowerCase() == "dataset" || kategori.toLowerCase() == "services") {
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
                $('#accordion').show();
                $('#div_action_buttons').show();
            } else if (kategori.toLowerCase() == "imagery" || kategori.toLowerCase() == "gridded") {
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
                $('#accordion').show();
                $('#div_action_buttons').show();
            }
            <?php
        }
        ?>

        $(document).on('change', '#kategori', function(){
            var url = '{{ url("/mygeo_kemaskini_elemen_metadata") }}';
            <?php
            if (isset($_GET['bhs']) && $_GET['bhs'] != "") {
                ?>
                url += '?bhs={{ $_GET["bhs"] }}';
                url += '&kategori='+$(this).val();
                <?php
            }else{
                ?>
                url += '?kategori='+$(this).val();
                <?php
            }
            ?>
            
            window.location.href = url;
        });
//        $('.btnTambah').hide(); //ketsa changed their mind and didnt want this after all
//        $('.btnClose').hide(); //ketsa changed their mind and didnt want this after all
    });
</script>

<script>
    // Set map extent:  Malaysia
    // Map center setView(latitude, longitude, zoomlevel)
    // Below set view was using hardcoded values
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
            iconUrl: "{{ asset('intecxmap/css/leaflet@1.7.1/images/marker-icon-2x.png') }}",
            iconSize: [30, 53], // size of the icon [width, height] in px
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        });
        var searchControl = new L.esri.Controls.Geosearch().addTo(map);
        var results = new L.LayerGroup().addTo(map);
        searchControl.on('results', function(data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
                L.marker([data.results[i].latlng.lat, data.results[i].latlng.lng], {
                    icon: markerIcon
                }).addTo(map);
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
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, '+'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: - 1
        }).addTo(map);
        var bounds = [
            [nblt, wblg],
            [sblt, eblg]
        ];
        rectangle = L.rectangle(bounds).addTo(map);
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
            zoomOffset: - 1
        }).addTo(map);
    }

    function saveData() {
        var nbltValue = document.getElementById("nblt").value;
        var wblgValue = document.getElementById("wblg").value;
        var sbltValue = document.getElementById("sblt").value;
        var eblgValue = document.getElementById("eblg").value;
        var data = ["North Bound Latitude: " + nbltValue, "West Bound Longitude: " + wblgValue,"South Bound Latitude: " + sbltValue, "East Bound Longitude: " + eblgValue
        ];
        alert(data);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
@stop
