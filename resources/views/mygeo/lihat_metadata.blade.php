@extends('layouts.app_mygeo_afiq')

@section('content')

<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">
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

    .card-header {
        padding: 0.5rem 1.5rem;
    }

    .card-title {
        margin-bottom: 0rem;
    }

    #collapse9 {
        height: 390px;
    }

    textarea {
        text-align: justify;
        height: fit-content;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="width:100%;">
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    $metadata_name = (isset($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString : "");
                    ?>
                    <h1 class="text-default">{{ $metadata_name }}</h1>
                    <div class="card">
                        <input type="hidden" name="metadata_id" value="{{ $metadata_id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-control-label">Category :</label>
                                <?php
                                if (count($categories) > 0) {
                                    $type = (isset($metadata->hierarchyLevel->MD_ScopeCode) ? (string) $metadata->hierarchyLevel->MD_ScopeCode : "");
                                    if ($type != "") {
                                        $found = 1;
                                        foreach ($categories as $cat) {
                                            if (strtolower($type) == strtolower($cat->name)) {
                                                echo $cat->name;
                                                $found = $found * 0;
                                            }
                                        }
                                        if ($found == 1) {
                                            ?>Agensi Persekutuan/Agensi Negeri<?php
                                                                                        }
                                                                                    } else {
                                                                                        ?>Agensi Persekutuan/Agensi Negeri<?php
                                                                                                                                }
                                                                                                                            }
                                                                                                                            ?>
                            </div>
                            <div id="accordion">
                                <?php //=== collapse1 =============================================================
                                ?>
                                <div class="card card-primary div_c1" id="div_c1">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse1">
                                                GENERAL INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <p class="pl-lg-3 form-control-label">Content Information<span class="mx-3">:</span></p>
                                                <select name="c1_content_info" class="form-control form-control-sm" style="width:175px;" disabled>
                                                    <option selected>Application</option>
                                                </select>
                                            </div>
                                            <h2 class="heading-small text-muted">Metadata Publisher</h2>
                                            <div class="">
                                                <div class="row my-0 py-0">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="uname">
                                                            Name
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        $name = (isset($metadata->contact->CI_ResponsibleParty->individualName->CharacterString) ? $metadata->contact->CI_ResponsibleParty->individualName->CharacterString : "");
                                                        if ($name != "") {
                                                            echo $name;
                                                        }
                                                        ?>
                                                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_name" value="{{ $name }}" />
                                                    </div>
                                                </div>
                                                <div class="row my-0 py-0">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                                                            Agency/Organization
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        $org = (isset($metadata->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $metadata->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                                                        if ($org != "") {
                                                            echo $org;
                                                        }
                                                        ?>
                                                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_agensi_organisasi" value="{{ $org }}" />
                                                    </div>
                                                </div>
                                                <div class="row my-0 py-0">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="publisher_email">
                                                            Email
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        $mail = (isset($metadata->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) ? $metadata->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString : "");
                                                        if ($mail != "") {
                                                            echo $mail;
                                                        }
                                                        ?>
                                                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_email" value="{{ $mail }}" />
                                                    </div>
                                                </div>
                                                <div class="row my-0 py-0">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="publisher_phone">
                                                            Telephone
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php
                                                        $tel = (isset($metadata->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) ? $metadata->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString : "");
                                                        if ($tel != "") {
                                                            echo $tel;
                                                        }
                                                        ?>
                                                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_phone" value="{{ $tel }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse2 =============================================================
                                ?>
                                <div class="card card-primary div_c2" id="div_c2">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse2">
                                                IDENTIFICATION INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Metadata Name<span class="text-warning">*</span>
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <?php
                                                        $metadata_name = (isset($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString : "");
                                                        ?>
                                                        <input class="form-control form-control-sm ml-3" type="text" name="c2_metadataName" id="c2_metadataName" value="{{ $metadata_name }}" disabled />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Type of Product<span class="text-warning">*</span>
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <select name="c2_product_type" class="form-control form-control-sm ml-3" disabled>
                                                            <option selected hidden>Application</option>
                                                            <!-- <option value="application">Application</option>
                                                                <option value="document">Document</option>
                                                                <option value="gisActivityProject">GIS Activity/Project</option>
                                                                <option value="theMap">Map</option>
                                                                <option value="rasterData">Raster Data</option>
                                                                <option value="services">Services</option>
                                                                <option value="software">Software</option>
                                                                <option value="vectorData">Vector Data</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Abstract<span class="text-warning">*</span>
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <?php
                                                        $abstract = (isset($metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString : "");
                                                        ?>
                                                        <textarea name="c2_abstract" id="c2_abstract" rows="10" class="form-control form-control-sm ml-3" disabled>{{ $abstract }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2 class="heading-small text-muted">Responsible Party</h2>
                                            <div class="my-2">
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Name<span class="text-warning">*</span>
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <?php
                                                        $cp = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString : "");
                                                        ?>
                                                        <input type="text" class="form-control form-control-sm ml-3" name="c2_contact_name" id="c2_contact_name" value="{{ $cp }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Agency/Organization
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <?php
                                                        $org = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3" value="{{ $org }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Address
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        $add1 = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control form-control-sm ml-3 mb-2" value="{{ $add1 }}" readonly>
                                                        <?php
                                                        $city = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control form-control-sm ml-3 mb-2" value="{{ $city }}" readonly>
                                                        <?php
                                                        $postal = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control form-control-sm ml-3 mb-2" value="{{ $postal }}" readonly>
                                                        <?php
                                                        $admin_area = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control form-control-sm ml-3 mb-2" value="{{ $admin_area }}" readonly>
                                                        <div class="form-inline row ml-3">
                                                            <label class="form-control-label mr-4" for="c2_contact_state">State :</label>
                                                            <select name="c2_contact_state" id="c2_contact_state" class="form-control form-control-sm col-2" readonly disabled>
                                                                <?php
                                                                if (count($states) > 0) {
                                                                    $admin_area = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString : "");
                                                                    if ($admin_area == "wpPutrajaya") {
                                                                        $admin_area = "WP Putrajaya";
                                                                    }
                                                                    $found = 1;
                                                                    foreach ($states as $st) {
                                                                        if (strtolower($st->name) == strtolower($admin_area)) {
                                                                            echo $st->name;
                                                                            $found = $found * 0;
                                                                        }
                                                                    }
                                                                    if ($found == 1) {
                                                                        ?>-<?php
                                                                                }
                                                                            }
                                                                            ?>
                                                            </select>
                                                            <label class="form-control-label mr-4 ml-4" for="c2_contact_country">Country :</label>
                                                            <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm ml-4 col-2" readonly disabled>
                                                                <?php
                                                                $country2 = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->country->CharacterString : "");
                                                                if (count($countries) > 0) {
                                                                    $found = 1;
                                                                    foreach ($countries as $country) {
                                                                        if (strtolower($country->name) == strtolower($country2)) {
                                                                            ?><option value="<?php echo $country->id; ?>" selected><?php echo $country->name; ?></option><?php
                                                                                                                                                                                        $found = $found * 0;
                                                                                                                                                                                    }
                                                                                                                                                                                }
                                                                                                                                                                                if ($found == 1) {
                                                                                                                                                                                    ?>-<?php
                                                                                                                                                                                            }
                                                                                                                                                                                        }
                                                                                                                                                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Email
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        $contact_email = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString : "");
                                                        ?>
                                                        <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control form-control-sm ml-3" value="
                                                        {{ $contact_email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Fax No
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        $fax = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control form-control-sm ml-3" value="{{ $fax }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Telephone (Office)
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        $phone_office = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control form-control-sm ml-3" value="{{ $phone_office }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                                            Website
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        $url = (isset($metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) ? $metadata->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL : "");
                                                        ?>
                                                        <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control form-control-sm ml-3" value="{{ $url }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse3 =============================================================
                                ?>
                                <div class="card card-primary div_c3" id="div_c3">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse3">
                                                TOPIC CATEGORY
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse in show" data-parent="#div_c3">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="c3_1">Biota</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="c3_2">Boundaries</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="c3_3">Climatology Meteorology Atmosphere</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse4 =============================================================
                                ?>
                                <div class="card card-primary div_c4" id="div_c4">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse4" class="fixMap">
                                                NOMINAL RESOLUTION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-inline ml-3">
                                                        <div class="form-control-label mr-3">
                                                            Scanning Resolution<span class="text-warning">*</span> :
                                                        </div>
                                                        <input name="c4_scan_res" id="c4_file_name" class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0">
                                                        <div class="form-control-label ml-2">
                                                            meter
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-inline">
                                                        <div class="form-control-label mr-3">
                                                            Ground Scanning<span class="text-warning">*</span> :
                                                        </div>
                                                        <input class="form-control form-control-sm" type="text" name="c4_ground_scan" id="c4_url" style="width :100px" placeholder="0.0">
                                                        <div class="form-control-label ml-2">
                                                            meter
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse5 =============================================================
                                ?>
                                <div class="card card-primary div_c5" id="div_c5">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse5" class="fixMap">
                                                PROCESS STEP INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse in show" data-parent="#div_c5">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-inline ml-3">
                                                        <div class="form-control-label mr-3">
                                                            Process Level
                                                        </div>
                                                        <input class="form-control form-control-sm" type="text" style="width :120pxpx" placeholder="Insert Process Level" name="c5_" id="c5_process_lvl">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-inline">
                                                        <div class="form-control-label mr-3">
                                                            Resolution
                                                        </div>
                                                        <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c5_url" id="c5_resolution">
                                                        <div class="form-control-label ml-2">
                                                            meter
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse6 =============================================================
                                ?>
                                <div class="card card-primary div_c6" id="div_c6">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse6" class="fixMap">
                                                SPATIAL REPRESENTATION INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-7">
                                                    <div class="form-inline ml-3">
                                                        <div class="form-control-label mr-3">
                                                            Collection Name<span class="text-warning">*</span>
                                                        </div>
                                                        <input class="form-control form-control-sm" type="text" style="width :280px" placeholder="Insert Collection Name" name="c6_file_name" id="c6_collection_name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="form-inline">
                                                        <div class="form-control-label mr-3">
                                                            Collection Identification<span class="text-warning">*</span>
                                                        </div>
                                                        <input class="form-control form-control-sm" type="text" style="width :150px" placeholder="Identification" name="c6_url" id="c6_collection_id">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse7 =============================================================
                                ?>
                                <div class="card card-primary div_c7" id="div_c7">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse7" class="fixMap">
                                                CONTENT INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse7" class="panel-collapse collapse in show" data-parent="#div_c7">
                                        <div class="card-body">
                                            <div class="acard-body opacity-8">
                                                <h6 class="heading-small text-muted mb-2">Wavelength Band
                                                    Information</h6>
                                                <div class="pl-lg-3">
                                                    <div class="row mb-2">
                                                        <div class="col-xl-6">
                                                            <div class="form-inline">
                                                                <div class="form-control-label mr-3">
                                                                    Band Boundry
                                                                </div>
                                                                <input type="text" name="c7_file_name" id="c7_band_boundary" class="form-control form-control-sm" style="width:150px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-xl-6">
                                                            <div class="form-inline">
                                                                <div class="form-control-label mr-4">
                                                                    Transfer Function Type
                                                                </div>
                                                                <input class="form-control form-control-sm" type="text" style="width :200px" placeholder="Transfer Type" name="c7_file_name" id="c7_trans_fn_type">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-inline">
                                                                <div class="form-control-label mr-3">
                                                                    Transmitted Polarization
                                                                </div>
                                                                <input class="form-control form-control-sm" type="text" style="width :180px" placeholder="Transmitted Polarization" name="c7_url" id="c7_trans_polar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-xl-6">
                                                            <div class="form-inline">
                                                                <div class="form-control-label mr-4">
                                                                    Nominal Spatial Resolution
                                                                </div>
                                                                <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c7_file_name" id="c7_nominal_spatial_res">
                                                                <div class="form-control-label ml-2">
                                                                    meter
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-inline">
                                                                <div class="form-control-label mr-3">
                                                                    Detected Polarization
                                                                </div>
                                                                <input class="form-control form-control-sm" type="text" style="width :180px" placeholder="Detected Polarization" name="c7_url" id="c7_detected_polar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse8 =============================================================
                                ?>
                                <div class="card card-primary div_c8" id="div_c8">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse8" class="fixMap">
                                                AQUISITION INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
                                        <div class="card-body">
                                            <div class="acard-body opacity-8">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <h6 class="heading-small text-muted mb-3">Enviroment Record
                                                        </h6>
                                                        <div class="form-group">
                                                            <div class="row mb-2">
                                                                <div class="col-xl-8">
                                                                    <div class="form-control-label">
                                                                        Average Air Temperature
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Celcius" name="c8_file_name" id="c8_avg_air_temp">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-8">
                                                                    <div class="form-control-label">
                                                                        Altitude
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Feet" name="c8_url" id="c8_altitude">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-8">
                                                                    <div class="form-control-label">
                                                                        Relative Humidity
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Humidity" name="c8_file_name" id="c8_relative_humid">
                                                                </div>
                                                            </div>
                                                            <div class="row mb">
                                                                <div class="col-xl-8">
                                                                    <div class="form-control-label">
                                                                        Meteorological Condition
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Condition" name="c8_url" id="c8_meteor_cond">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <h6 class="heading-small text-muted mb-3">Event Identifier
                                                        </h6>
                                                        <div class="form-group">
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Identifier<span class="text-warning">*</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_file_name" id="c8_identifier">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Trigger
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <select class="form-control form-control-sm" type="text" style="width :120px" name="c8_url" id="c8_trigger">
                                                                        <option selected disabled hidden>Select
                                                                            Trigger
                                                                        </option>
                                                                        <option value="automatic">Automatic</option>
                                                                        <option value="manual">Manual</option>
                                                                        <option value="pre_programmed">Pre Programmed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Context
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <select class="form-control form-control-sm" type="text" style="width :120px" name="c8_file_name" id="c8_context">
                                                                        <option value="acquisition">Acquisition</option>
                                                                        <option value="pass">Pass</option>
                                                                        <option value="way_point">Way Point</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Sequence
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <select class="form-control form-control-sm" type="text" style="width :120px" name="c8_url" id="c8_sequence">
                                                                        <option selected disabled hidden>Select
                                                                            Sequence
                                                                        </option>
                                                                        <option value="start">Start</option>
                                                                        <option value="end">End</option>
                                                                        <option value="instataneous">Instataneous</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Time
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" type="time" style="width :120px" name="c8_file_name" id="c8_time">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <h6 class="heading-small text-muted mb-3">Instrument Identification</h6>
                                                        <div class="form-group">
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Type<span class="text-warning">*</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_file_name" id="c8_type">
                                                                </div>
                                                            </div>
                                                            <h6 class="heading-small text-muted mt-2 mb-3">Operation</h6>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Identifier<span class="text-warning">*</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_file_name" id="c8_identifier">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Status
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Status" name="c8_url" id="c8_op_status">
                                                                </div>
                                                            </div>
                                                            <div class="row mb">
                                                                <div class="col-xl-5">
                                                                    <div class="form-control-label">
                                                                        Type
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_file_name" id="c8_op_type">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 px-0">
                                                        <h6 class="heading-small text-muted mb-3">Request Data Range
                                                        </h6>
                                                        <div class="form-group">
                                                            <div class="form-control-label mr-3">
                                                                Date
                                                            </div>
                                                            <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_url" id="c8_op_type">
                                                            <div class="form-control-label mt-3 mr-3">
                                                                Last Acceptable Date
                                                            </div>
                                                            <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_file_name" id="c8_last_accept_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse9 =============================================================
                                ?>
                                <div class="card card-primary div_c9" id="div_c9">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse9" class="fixMap">
                                                SPATIAL DOMAIN
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse9" class="panel-collapse collapse in show" data-parent="#div_c9" style="height:500px;">
                                        <div class="card-body">
                                            <?php
                                            $westBoundLongitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal : "");
                                            $eastBoundLongitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal : "");
                                            $southBoundLatitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal : "");
                                            $northBoundLatitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal : "");
                                            ?>

                                            <div class="float-right col-lg-2">
                                                West Bound Longitude: {{ $westBoundLongitude }}<input type="hidden" name="c9_west_bound_longitude" id="west_bound_longitude" value="{{ $westBoundLongitude }}"> <br>
                                                East Bound Longitude: {{ $eastBoundLongitude }}<input type="hidden" name="c9_east_bound_longitude" id="east_bound_longitude" value="{{ $eastBoundLongitude }}"> <br>
                                                South Bound Latitude: {{ $southBoundLatitude }}<input type="hidden" name="c9_south_bound_latitude" id="south_bound_latitude" value="{{ $southBoundLatitude }}"> <br>
                                                North Bound Latitude: {{ $northBoundLatitude }}<input type="hidden" name="c9_north_bound_latitude" id="north_bound_latitude" value="{{ $northBoundLatitude }}"> <br>
                                                <br>
                                                <button type="button" id="btn_set_area" class="btn btn-block btn-primary">Set</button>
                                                <button type="button" id="btn_reset_map" class="btn btn-block btn-primary">Reset Map</button>
                                            </div>
                                            <div id="map" style="width:70%;margin-top:66px;"></div>
                                            <div class="calculation-box" style="top:254px;">
                                                <p>Draw a polygon using the draw tools.</p>
                                                <div id="calculated-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse10 =============================================================
                                ?>
                                <div class="card card-primary div_c10" id="div_c10">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse10">
                                                BROWSING INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
                                        <div class="card-body">
                                            <h2 class="heading-small text-muted">Browsing Graphic</h2>
                                            <div class="my-2">
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c10_file_name">
                                                            File Name
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" name="c10_file_name" id="c10_file_name" class="form-control form-control-sm ml-3">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c10_file_type">
                                                            File Type
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" name="c10_file_type" id="c10_file_type" class="form-control form-control-sm ml-3">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c10_file_url">
                                                            URL
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <input type="text" name="c10_file_url" id="c10_file_type" class="form-control form-control-sm ml-3">
                                                    </div>
                                                </div>
                                            </div>
                                            <h2 class="heading-small text-muted">Keyword</h2>
                                            <div class="my-2">
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c10_file_name">
                                                            Keyword<span class="text-warning">*</span>
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c10_file_type">
                                                            Additional Keyword
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3 pl-5">
                                                        <label class="form-control-label mr-4" for="c10_file_url">
                                                            Additional Keyword
                                                        </label><label class="float-right">:</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse11 =============================================================
                                ?>
                                <div class="card card-primary div_c11" id="div_c11">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse11">
                                                DISTRIBUTION INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse11" class="panel-collapse collapse in show" data-parent="#div_c11">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-xl-2">
                                                    <label class="form-control-label" for="input-distribution-format">
                                                        Distribution Format </label>
                                                </div>
                                                <div class="col-xl-3">
                                                    <input class="form-control form-control-sm " type="text" name="c11_dist_format" id="c11_dist_format" placeholder="Format Name">
                                                </div>
                                                <div class="col-xl-1">
                                                    <label class="form-control-label" for="input-version">
                                                        Version </label>
                                                </div>
                                                <div class="col-xl-2">
                                                    <input class="form-control form-control-sm" type="text" name="c11_version" id="c11_version" placeholder="Format Version">
                                                </div>
                                                <div class="col-xl-1">
                                                    <label class="form-control-label" for="input-medium">
                                                        Medium </label>
                                                </div>
                                                <div class="col-xl-3">
                                                    <?php
                                                    $medium = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name : "");
                                                    ?>
                                                    <input type="text" name="c11_medium" id="c11_medium" class="form-control form-control-sm" value="{{ $medium }}">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-2">
                                                    <label class="form-control-label" for="input-distributor">
                                                        Distributor </label>
                                                </div>
                                                <div class="col-xl-6">

                                                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm" placeholder="Organization Name">
                                                </div>
                                            </div>
                                            <h6 class="heading-small text-muted mt-4">Distribution Order Process
                                            </h6>
                                            <div class="pl-lg-3">
                                                <div class="row mb-2">
                                                    <div class="col-xl-2">
                                                        <label class="form-control-label" for="input-unit-distribution">
                                                            Units of Distribution </label>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <?php
                                                        $unit_distribute = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString : "");
                                                        ?>
                                                        <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control form-control-sm" value="{{ $unit_distribute }}">
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <?php
                                                        $size = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real : "");
                                                        ?>
                                                        <label class="form-control-label" for="input-sizemb">
                                                            Size (Megabytes) </label>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm" value="{{ $size }}" placehorder="Size">
                                                    </div>
                                                    <div class="col-xl-1">
                                                        <label class="form-control-label" for="input-fees">
                                                            Fees </label>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <input type="text" name="c11_fees" id="c11_fees" class="form-control form-control-sm" placeholder="RM 0.00">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-xl-1">
                                                        <?php
                                                        $link = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL : "");
                                                        ?>
                                                        <label class="form-control-label" for="input-distributor">
                                                            Link </label>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <input class="form-control form-control-sm" name="c11_link" id="c11_link" placeholder="Ordering Website Link" type="text">
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <?php
                                                        $order_instruct = (isset($metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) ? $metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString : "");
                                                        ?>
                                                        <label class="form-control-label" for="input-instructionorder">
                                                            Ordering Instruction </label>
                                                    </div>
                                                    <div class="col-xl-5">
                                                        <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm" value="{{ $order_instruct }}">
                                                        <!--<input type="file" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm p-0">-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse12 =============================================================
                                ?>
                                <div class="card card-primary div_c12" id="div_c12">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse12">
                                                DATA SET IDENTIFICATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse12" class="panel-collapse collapse in show" data-parent="#div_c12">
                                        <div class="card-body">
                                            <div class="acard-body opacity-8">
                                                <div class="row mb-4">
                                                    <div class="col-xl-2">
                                                        <label class="form-control-label" for="input-dataset-type">
                                                            Data Set Type<span class="text-warning">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <select class="form-control form-control-sm" id="c12_dataset_type" disabled>
                                                            <option value="grid">Grid</option>
                                                            <option value="stereo_model">Stereo Model</option>
                                                            <option value="text_table">Text Table</option>
                                                            <option value="tin">Tin</option>
                                                            <option value="vector">Vector</option>
                                                            <option value="video">Video</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-xl-3">
                                                        <label class="form-control-label" for="input-hardsoftcopy">
                                                            Scale in Hardcopy/Softcopy
                                                            <span style="font-size: smaller;">(feature scale)</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <input class="form-control form-control-sm" name="c12_feature_scale" id="c12_feature_scale" placeholder="10:50000" type="text" disabled>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <label class="form-control-label" for="input-imggsd">
                                                            Image Resolution (GSD)</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm" name="c12_image_res" id="c12_image_res" placeholder="10.5" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text input-group-sm py-0">meter</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-1">
                                                        <label class="form-control-label" for="input-language">
                                                            Language
                                                        </label>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <select class="form-control form-control-sm" name="c12_language" id="c12_language" disabled>
                                                            <option selected disabled hidden> Language
                                                            </option>
                                                            <option value="english">English</option>
                                                            <option value="bahasa_malaysia">Bahasa Malaysia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse13 =============================================================
                                ?>
                                <div class="card card-primary div_c13" id="div_c13">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse13">
                                                REFERENCE SYSTEM INFORMATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse13" class="panel-collapse collapse in show" data-parent="#div_c13">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-xl-3">
                                                    <label class="form-control-label" for="input-system-identifier">
                                                        Reference System Identifier<span class="ml-3">:</span>
                                                    </label>
                                                </div>
                                                <div class="col-xl-3">
                                                    <select class="form-control form-control-sm" name="c13_ref_sys_identify" id="c13_ref_sys_identify">
                                                        <option selected disabled>Select Identifier</option>
                                                        <?php
                                                        if (count($refSysIds) > 0) {
                                                            foreach ($refSysIds as $ids) {
                                                                ?><option value="<?php echo $ids->id; ?>"><?php echo $ids->name; ?></option><?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row my-4">
                                                <div class="col-xl-12">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" style="margin-left:20px;" for="c3_1"><b>Projection :</b> Cassini-Soldner</label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" style="margin-left:20px;" for="c3_2"><b>Semi Major Axis :</b> 6337304.0630000001</label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" style="margin-left:20px;" for="c3_3"><b>Ellipsoid :</b> Modified Everest</label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" style="margin-left:20px;" for="c3_4"><b>Axis Units :</b> Meter</label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" style="margin-left:20px;" for="c3_5"><b>Datum :</b> Kertau 1948</label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" style="margin-left:20px;" for="c3_6"><b>Denominator of Flattening Ratio :</b> 300.801699999999980</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse14 =============================================================
                                ?>
                                <div class="card card-primary div_c14" id="div_c14">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse14">
                                                CONSTRAINTS
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse14" class="panel-collapse collapse in show" data-parent="#div_c14">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <h6 class="heading-small text-muted">Legal Constraints</h6>
                                                    <div class="pl-lg-3">
                                                        <div class="row mb-2">
                                                            <div class="col-xl-5">
                                                                <label class="form-control-label" for="input-access-cons">
                                                                    Access Constraints
                                                                </label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm" disabled>
                                                                    <option value="copyright">Copyright</option>
                                                                    <option value="intelect_prop_right">Intellectual Property Rights</option>
                                                                    <option value="license">License</option>
                                                                    <option value="license_end_user">License End User</option>
                                                                    <option value="license_unrestricted">License Unrestricted</option>
                                                                    <option value="other_restrictions">Other Restrictions</option>
                                                                    <option value="patient">Patient</option>
                                                                    <option value="patient_pending">Patient Pending</option>
                                                                    <option value="restricted">Restricted</option>
                                                                    <option value="trademark">Trademark</option>
                                                                    <option value="unrestricted">Unrestricted</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-xl-5">
                                                                <label class="form-control-label" for="input-use-cons">
                                                                    Use Constraints
                                                                </label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm" disabled>
                                                                    <option value="copyright">Copyright</option>
                                                                    <option value="intelect_prop_right">Intellectual Property Rights</option>
                                                                    <option value="license">License</option>
                                                                    <option value="license_end_user">License End User</option>
                                                                    <option value="license_unrestricted">License Unrestricted</option>
                                                                    <option value="other_restrictions">Other Restrictions</option>
                                                                    <option value="patient">Patient</option>
                                                                    <option value="patient_pending">Patient Pending</option>
                                                                    <option value="restricted">Restricted</option>
                                                                    <option value="trademark">Trademark</option>
                                                                    <option value="unrestricted">Unrestricted</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <h6 class="heading-small text-muted">Security Constraints
                                                    </h6>
                                                    <div class="pl-lg-3">
                                                        <div class="row mb-2">
                                                            <div class="col-xl-5">
                                                                <label class="form-control-label" for="input-access-cons">
                                                                    Classification System
                                                                </label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm" disabled>
                                                                    <option value="limited">Limited</option>
                                                                    <option value="open">Open</option>
                                                                    <option value="secret">Secret</option>
                                                                    <option value="top_secret">Top Secret</option>
                                                                    <option value="others">Others</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-xl-5">
                                                                <label class="form-control-label" for="input-reference">
                                                                    Reference
                                                                </label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <input class="form-control form-control-sm" id="input-reference" type="text" placeholder="Standard/Policy/Act/Circular/Legal" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //=== collapse15 ============================================================
                                ?>
                                <div class="card card-primary div_c15" id="div_c15">
                                    <div class="card-header ftest">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" href="#collapse15">
                                                DATA QUALITY
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse15" class="panel-collapse collapse in show" data-parent="#div_c15">
                                        <div class="card-body pl-lg-5">
                                            <div class="form-group row">
                                                <b>Data Quality Information</b>
                                            </div>
                                            <div class="pl-lg-2">
                                                <div class="row mb-2">
                                                    <div class="col-xl-1 mb-4">
                                                        <label class="form-control-label" for="input-DQscope">
                                                            DQ Scope
                                                        </label>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <select name="c15_data_quality_info" id="c15_data_quality_info" class="form-control form-control-sm">
                                                            <option value="attribute">Attribute</option>
                                                            <option value="attribute_type">Attribute Type</option>
                                                            <option value="collection_session">Collection Session</option>
                                                            <option value="dataset">Dataset</option>
                                                            <option value="feature">Feature</option>
                                                            <option value="dimension_group">Dimension Group</option>
                                                            <option value="feature_type">Feature Type</option>
                                                            <option value="field_session">Field Session</option>
                                                            <option value="model">Model</option>
                                                            <option value="non_geo_date_set">Non Geographic Date Set</option>
                                                            <option value="prop_type">Property Type</option>
                                                            <option value="service">Service</option>
                                                            <option value="software">Software</option>
                                                            <option value="tile">Tile</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <label class="form-control-label float-right" for="input-datahistory">
                                                            Data History</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="form-control form-control-sm" type="text" name="c15_data_history" id="c15_data_history" placeholder="None">
                                                    </div>
                                                    <div class="col-xl-1">
                                                        <label class="form-control-label  float-right" for="input-date">
                                                            Date
                                                        </label>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <input class="form-control form-control-sm" type="date" name="c15_date" id="c15_date" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="card card-primary card-outline card-outline-tabs">
                                                    <div class="card-header p-0 border-bottom-0">
                                                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness" role="tab" aria-controls="completeness" aria-selected="true">Completeness</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="tab_consistency" data-toggle="pill" href="#consistency" role="tab" aria-controls="consistency" aria-selected="false">Consistency</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="tab_position_accuracy" data-toggle="pill" href="#position_accuracy" role="tab" aria-controls="position_accuracy" aria-selected="false">Positional Accuracy</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="tab_temp_accuracy" data-toggle="pill" href="#temp_accuracy" role="tab" aria-controls="temp_accuracy" aria-selected="false">Temporal Accuracy</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="tab_thematic_accuracy" data-toggle="pill" href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy" aria-selected="false">Thematic Accuracy</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-four-tabContent">
                                                            <div class="tab-pane fade active show" id="completeness" role="tabpanel" aria-labelledby="tab_completeness">
                                                                <div class="form-group row">
                                                                    <div class="d-flex flex-wrap bd-highlight">
                                                                        <div class="table-responsive">
                                                                            <table class="table-borderless">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" checked="" disabled>&nbsp;Completeness Commission
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" disabled>&nbsp;Completeness Omission
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t1_commission_scope" id="c15_t1_commission_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t1_omission_scope" id="c15_t1_omission_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t1_commission_comply_level" id="c15_t1_commission_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t1_omission_comply_level" id="c15_t1_omission_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t1_commission_date" id="c15_t1_commission_date" class="form-control datetimepicker-input" data-target="#c15_t1_commission_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t1_commission_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t1_omission_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t1_omission_date" id="c15_t1_omission_date" class="form-control datetimepicker-input" data-target="#c15_t1_omission_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t1_omission_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t1_commission_result" id="c15_t1_commission_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t1_omission_result" id="c15_t1_omission_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t1_commission_conform_result" id="c15_t1_commission_conform_result" class="form-control">
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t1_omission_conform_result" id="c15_t1_omission_conform_result" class="form-control">
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="consistency" role="tabpanel" aria-labelledby="tab_consistency">
                                                                <div class="form-group row">
                                                                    <div class="d-flex flex-wrap bd-highlight">
                                                                        <div class="table-responsive">
                                                                            <table class="table-borderless">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t2_type" checked="" disabled>&nbsp;Conceptual
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t2_type" disabled>&nbsp;Domain
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t2_type" disabled>&nbsp;Format
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t2_type" disabled>&nbsp;Topological
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t2_conceptual_scope" id="c15_t2_conceptual_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t2_domain_scope" id="c15_t2_domain_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t2_format_scope" id="c15_t2_format_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t2_topological_scope" id="c15_t2_topological_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t2_conceptual_comply_level" id="c15_t2_conceptual_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t2_domain_comply_level" id="c15_t2_domain_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t2_format_comply_level" id="c15_t2_format_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t2_topological_comply_level" id="c15_t2_topological_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t2_conceptual_date" id="c15_t2_conceptual_date" class="form-control datetimepicker-input" data-target="#c15_t2_conceptual_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t2_conceptual_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t2_domain_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t2_domain_date" id="c15_t2_domain_date" class="form-control datetimepicker-input" data-target="#c15_t2_domain_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t2_domain_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t2_format_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t2_format_date" id="c15_t2_format_date" class="form-control datetimepicker-input" data-target="#c15_t2_format_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t2_format_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t2_topological_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t2_topological_date" id="c15_t2_topological_date" class="form-control datetimepicker-input" data-target="#c15_t2_topological_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t2_topological_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t2_conceptual_result" id="c15_t2_conceptual_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t2_domain_result" id="c15_t2_domain_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t2_format_result" id="c15_t2_format_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t2_topological_result" id="c15_t2_topological_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t2_conceptual_conform_result" id="c15_t2_conceptual_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t2_domain_conform_result" id="c15_t2_domain_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t2_format_conform_result" id="c15_t2_format_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t2_topological_conform_result" id="c15_t2_topological_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="position_accuracy" role="tabpanel" aria-labelledby="tab_position_accuracy">
                                                                <div class="form-group row">
                                                                    <div class="d-flex flex-wrap bd-highlight">
                                                                        <div class="table-responsive">
                                                                            <table class="table-borderless">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t3_type" checked="" disabled>&nbsp;Absolute or External
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t3_type" disabled>&nbsp;Relative or Internal
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t3_type" disabled>&nbsp;Gridded Data
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t3_absExt_scope" id="c15_t3_absExt_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t3_relInt_scope" id="c15_t3_relInt_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t3_gridded_scope" id="c15_t3_gridded_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t3_absExt_comply_level" id="c15_t3_absExt_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t3_relInt_comply_level" id="c15_t3_relInt_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t3_gridded_comply_level" id="c15_t3_gridded_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t3_absExt_date" id="c15_t3_absExt_date" class="form-control datetimepicker-input" data-target="#c15_t3_absExt_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t3_absExt_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t3_relInt_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t3_relInt_date" id="c15_t3_relInt_date" class="form-control datetimepicker-input" data-target="#c15_t3_relInt_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t3_relInt_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t3_gridded_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t3_gridded_date" id="c15_t3_gridded_date" class="form-control datetimepicker-input" data-target="#c15_t3_gridded_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t3_gridded_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t3_absExt_result" id="c15_t3_absExt_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t3_relInt_result" id="c15_t3_relInt_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t3_gridded_result" id="c15_t3_gridded_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t3_absExt_conform_result" id="c15_t3_absExt_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t3_relInt_conform_result" id="c15_t3_relInt_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t3_gridded_conform_result" id="c15_t3_gridded_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="temp_accuracy" role="tabpanel" aria-labelledby="tab_temp_accuracy">
                                                                <div class="form-group row">
                                                                    <div class="bd-highlight">
                                                                        <div class="table-responsive">
                                                                            <table class="table-borderless">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t4_type" checked="" disabled>&nbsp;Accuracy or Time Measurement
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t4_type" disabled>&nbsp;Temporal Consistency
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t4_type" disabled>&nbsp;Temporal Validity
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t4_accuTimeMeasure_scope" id="c15_t4_accuTimeMeasure_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t4_tempConsist_scope" id="c15_t4_tempConsist_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t4_tempValid_scope" id="c15_t4_tempValid_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t4_accuTimeMeasure_comply_level" id="c15_t4_accuTimeMeasure_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t4_tempConsist_comply_level" id="c15_t4_tempConsist_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t4_tempValid_comply_level" id="c15_t4_tempValid_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t4_accuTimeMeasure_date" id="c15_t4_accuTimeMeasure_date" class="form-control datetimepicker-input" data-target="#c15_t4_accuTimeMeasure_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t4_accuTimeMeasure_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t4_tempConsist_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t4_tempConsist_date" id="c15_t4_tempConsist_date" class="form-control datetimepicker-input" data-target="#c15_t4_tempConsist_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t4_tempConsist_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t4_tempValid_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t4_tempValid_date" id="c15_t4_tempValid_date" class="form-control datetimepicker-input" data-target="#c15_t4_tempValid_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t4_tempValid_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t4_accuTimeMeasure_result" id="c15_t4_accuTimeMeasure_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t4_tempConsist_result" id="c15_t4_tempConsist_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t4_tempValid_result" id="c15_t4_tempValid_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t4_accuTimeMeasure_conform_result" id="c15_t4_accuTimeMeasure_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t4_tempConsist_conform_result" id="c15_t4_tempConsist_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t4_tempValid_conform_result" id="c15_t4_tempValid_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="thematic_accuracy" role="tabpanel" aria-labelledby="tab_thematic_accuracy">
                                                                <div class="form-group row">
                                                                    <div class="d-flex flex-wrap bd-highlight">
                                                                        <div class="table-responsive">
                                                                            <table class="table-borderless">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t5_type" checked="" disabled>&nbsp;Classification Correctness
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t5_type" disabled>&nbsp;Non Quantitative Attribute Correctness
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <input type="radio" name="c15_t5_type" disabled>&nbsp;Quantitative Attribute Accuracy
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t5_classCorrect_scope" id="c15_t5_classCorrect_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t5_nonQuant_scope" id="c15_t5_nonQuant_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_1">
                                                                                                <b>Scope:</b>
                                                                                                <select name="c15_t5_quant_scope" id="c15_t5_quant_scope" class="form-control" disabled>
                                                                                                    <option value="attribute">Aeronautical</option>
                                                                                                    <option value="attribute_type">Built Environment</option>
                                                                                                    <option value="collection_session">Demarcation</option>
                                                                                                    <option value="dataset">General</option>
                                                                                                    <option value="feature">Geology</option>
                                                                                                    <option value="dimension_group">Hydrography</option>
                                                                                                    <option value="feature_type">Hypsography</option>
                                                                                                    <option value="field_session">Soil</option>
                                                                                                    <option value="model">Special Use</option>
                                                                                                    <option value="non_geo_date_set">Transportation</option>
                                                                                                    <option value="prop_type">Utility</option>
                                                                                                    <option value="service">Vegetation</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t5_classCorrect_comply_level" id="c15_t5_classCorrect_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t5_nonQuant_comply_level" id="c15_t5_nonQuant_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_3">
                                                                                                <b>Compliance Level:</b>
                                                                                                <input type="text" name="c15_t5_quant_comply_level" id="c15_t5_comply_level" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t5_classCorrect_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t5_classCorrect_date" id="c15_t5_classCorrect_date" class="form-control datetimepicker-input" data-target="#c15_t5_classCorrect_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t5_classCorrect_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t5_nonQuant_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t5_nonQuant_date" id="c15_t5_nonQuant_date" class="form-control datetimepicker-input" data-target="#c15_t5_nonQuant_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t5_nonQuant_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_5">
                                                                                                <b>Date:</b>
                                                                                                <div class="input-group date" id="c15_t5_quant_date_div" data-target-input="nearest">
                                                                                                    <input type="text" name="c15_t5_quant_date" id="c15_t5_quant_date" class="form-control datetimepicker-input" data-target="#c15_t5_quant_date_div" disabled>
                                                                                                    <div class="input-group-append" data-target="#c15_t5_quant_date_div" data-toggle="datetimepicker">
                                                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t5_classCorrect_result" id="c15_t5_classCorrect_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t5_nonQuant_result" id="c15_t5_nonQuant_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_2">
                                                                                                <b>Result:</b>
                                                                                                <select name="c15_t5_quant_result" id="c15_t5_quant_result" class="form-control" disabled>
                                                                                                    <option value="attribute">Pass</option>
                                                                                                    <option value="attribute_type">Fail</option>
                                                                                                    <option value="collection_session">Not Relevant</option>
                                                                                                </select>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t5_classCorrect_conform_result" id="c15_t5_classCorrect_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t5_nonQuant_conform_result" id="c15_t5_nonQuant_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="form-check-label" for="c3_4">
                                                                                                <b>Conformance Result:</b>
                                                                                                <input type="text" name="c15_t5_quant_conform_result" id="c15_t5_quant_conform_result" class="form-control" disabled>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.js"></script>
<script>
    // TO MAKE THE MAP APPEAR YOU MUST
    // ADD YOUR ACCESS TOKEN FROM
    // https://account.mapbox.com
    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFyaGFucmkiLCJhIjoiY2tqd2p2cGtxMDJ2ODMzb3l5OTJuMjJ6ZSJ9.OsdgNMv2XB-tkWx_Ug4ivg';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', //hosted style id
        center: [101.68, 2.91], // starting position
        zoom: 0 // starting zoom
    });

    var draw = new MapboxDraw({
        displayControlsDefault: false,
        controls: {
            polygon: true,
            trash: true
        }
    });

    var langlat = []; //coordinates of the user created polygon. currently unused.

    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );
    map.addControl(draw);
    map.addControl(new mapboxgl.FullscreenControl());
    map.addControl(new mapboxgl.NavigationControl());
    map.on('draw.create', updateArea);
    map.on('draw.delete', updateArea);
    map.on('draw.update', updateArea);
    map.on('click', function(e) {
        langlat.push(JSON.stringify(e.lngLat.wrap()));
    });
    map.on('load', function() {
        // alert('ftest');
    });

    $(document).on("click", ".fixMap", function() {
        setTimeout(function() {
            map.resize();
        }, 1500);
    });


    function updateArea(e) {
        console.log(e);
        var data = draw.getAll();
        var answer = document.getElementById('calculated-area');
        if (data.features.length > 0) {
            var area = turf.area(data);
            // restrict to area to 2 decimal points
            var rounded_area = Math.round(area * 100) / 100;
            answer.innerHTML =
                '<p><strong>' +
                rounded_area +
                '</strong></p><p>square meters</p>';
        } else {
            answer.innerHTML = '';
            if (e.type !== 'draw.delete') {
                alert('Use the draw tools to draw a polygon!');
            }
        }
    }


    $(document).on('click', '#btn_reset_map', function() {
        //delete any existing drawings
        $(".mapbox-gl-draw_trash").click();
        var mapLayer = map.getLayer('ftest');
        if (typeof mapLayer !== 'undefined') {
            map.removeLayer('ftest').removeSource('ftest');
        }
    });


    $(document).ready(function() {
        $('.mapbox-gl-draw_ctrl-draw-btn.mapbox-gl-draw_trash').click(function() {
            //delete any existing drawings
            var mapLayer = map.getLayer('ftest');
            if (typeof mapLayer !== 'undefined') {
                map.removeLayer('ftest').removeSource('ftest');
            }
        });

        $('#c10_date_div,#c10_t1_commission_date_div,#c10_t1_omission_date_div,#c10_t2_conceptual_date_div,#c10_t2_domain_date_div,#c10_t2_format_date_div,#c10_t2_topological_date_div,#c10_t3_absExt_date_div,#c10_t3_relInt_date_div,#c10_t3_gridded_date_div,#c10_t4_accuTimeMeasure_date_div,#c10_t4_tempConsist_date_div,#c10_t4_tempValid_date_div,#c10_t5_classCorrect_date_div,#c10_t5_nonQuant_date_div,#c10_t5_quant_date_div').datetimepicker({
            // format:'DD/MM/YYYY',
            // format: 'L'
        });

        <?php
        if (count($categories) > 0) {
            $type = (isset($metadata->hierarchyLevel->MD_ScopeCode) ? $metadata->hierarchyLevel->MD_ScopeCode : "");
            if (isset($type) && $type != "" && (strtolower($type) == "dataset" || strtolower($type) == "services")) {
                ?>
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
            <?php
                } elseif (isset($type) && $type != "" && (strtolower($type) == "imagery" || strtolower($type) == "gridded")) {
                    ?>
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
        <?php
            }
        }
        ?>
    });


    //user submitted coordinates
    $(document).on('click', '#btn_set_area', function() {
        //delete any existing drawings
        var mapLayer = map.getLayer('ftest');
        if (typeof mapLayer !== 'undefined') {
            map.removeLayer('ftest').removeSource('ftest');
        }

        //check if inputs are empty
        var wbl = $("#west_bound_longitude").val();
        var ebl = $("#east_bound_longitude").val();
        var sbl = $("#south_bound_latitude").val();
        var nbl = $("#north_bound_latitude").val();
        if ((wbl == null || wbl == "") || (ebl == null || ebl == "") || (sbl == null || sbl == "") || (nbl == null || nbl == "")) {
            alert("Isi semua maklumat Longitude dan Latitude");
            return false;
        }

        //add preloaded points to map
        var polygon2 = {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {},
                "geometry": {
                    "type": "Polygon",
                    "coordinates": [
                        [
                            wbl.split("."), sbl.split("."), nbl.split("."), ebl.split("."),
                        ]
                    ]
                }
            }]
        };

        var ts = Date.now();
        map.addSource('ftest', {
            'type': 'geojson',
            'data': polygon2
        });
        map.addLayer({
            'id': 'ftest',
            'type': 'fill',
            'source': 'ftest',
            'layout': {},
            'paint': {
                'fill-color': 'rgba(128, 255, 0,0.9)',
                'fill-opacity': 0.6
            }
        });



        //calculate area of preloaded points=================
        var area = turf.area(polygon2);
        var rounded_area = Math.round(area * 100) / 100;
        var answer = document.getElementById('calculated-area');
        answer.innerHTML =
            '<p><strong>' +
            rounded_area +
            '</strong></p><p>square meters</p>';
    });
</script>
@stop
