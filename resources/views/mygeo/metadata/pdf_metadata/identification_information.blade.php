<?php $flag = 1; ?>
<div class="card card-primary div_c2" id="div_c2">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse2">
            <h4 class="card-title">
                <?php echo __('lang.accord_2'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="mt-2 mb-4 pl-lg-3">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $metadataxml->customInputs->accordion2->$key }}
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_metadataName"){
                        if ($metadataSearched->title != "") {
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        <?php
                                        if(isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != ""){
                                            if(strtolower($metadataxml->hierarchyLevel->MD_ScopeCode) == "dataset"){
                                                echo "Title";
                                            }else{
                                                echo "Metadata Name";
                                            }
                                        }
                                        ?>
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $metadataSearched->title; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_product_type"){
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Type of Product
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-3">
                                    <?php echo $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_abstract"){
                        $var = "";
                        if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                            $var = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
                        }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                            $var = $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString;
                        }
                        if($var != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_abstract">
                                        Abstract
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $abstract = $var; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_metadataDate"){
                        $metDate = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
                            $metDate = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
                            $metDate = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date;
                        }
                        if($metDate != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divMetadataDate" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Date
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo date('d/m/Y',strtotime($metDate)); ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_metadataDateType"){
                        $metDateType = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != '') {
                            $metDateType = ucwords($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode);
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != '') {
                            $metDateType = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode);
                        }
                        if($metDateType != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divMetadataDateType" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Date Type
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $metDateType; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_metadataStatus"){
                        $metStatus = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->status->MD_ProgressCode) && $metadataxml->identificationInfo->MD_DataIdentification->status->MD_ProgressCode != "") {
                            $metStatus = ucwords($metadataxml->identificationInfo->MD_DataIdentification->status->MD_ProgressCode);
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode != "") {
                            $metStatus = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode);
                        }
                        if($metStatus == "HistoricalArchive"){
                            $metStatus = "Historical Archive";
                        }elseif($metStatus == "OnGoing"){
                            $metStatus = "On Going";
                        }elseif($metStatus == "UnderDevelopment"){
                            $metStatus = "Under Development";
                        }
                        if($metStatus != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divMetadataStatus" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Status
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $metStatus; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_typeOfServices"){
                        $typeOfServices = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString != '') {
                            $typeOfServices = $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName) && $metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName != '') {
                            $typeOfServices = $metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName;
                        }
                        if($typeOfServices != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divTypeOfServices" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Type of Services
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $typeOfServices; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_operationName"){
                        $operationName = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != '') {
                            $operationName = $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != '') {
                            $operationName = $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString;
                        }
                        if($operationName != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divOperationName" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Operation Name
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $operationName; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_typeOfCouplingDataset"){
                        $typeCouplingDataset = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) && trim($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) != '') {
                            $typeCouplingDataset = ucwords($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType);
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->SV_CouplingType) && trim($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->SV_CouplingType) != '') {
                            $typeCouplingDataset = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->SV_CouplingType);
                        }
                        if($typeCouplingDataset != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divTypeOfCouplingDataset" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Type of Coupling with Dataset
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $typeCouplingDataset; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <h2 class="heading-small text-muted">Responsible Party</h2>
            <div class="my-2 pl-lg-3">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    if($key == "c2_contact_name"){
                        $respName = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != '') {
                            $respName = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != '') {
                            $respName = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString;
                        }
                        if($respName != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Name
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $respName; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Position Name
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        Metadata Approver
                    </div>
                </div>
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    if($key == "c2_contact_agensiorganisasi"){
                        $respAgencyOrg = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != '') {
                            $respAgencyOrg = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != '') {
                            $respAgencyOrg = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                        }
                        if($respAgencyOrg != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Agency/Organization
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $respAgencyOrg; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_bahagian"){
                        $respAgencyBhgn = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString != '') {
                            $respAgencyBhgn = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString != '') {
                            $respAgencyBhgn = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString;
                        }
                        if($respAgencyBhgn != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Bahagian
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo $respAgencyBhgn; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_address1"){
                        $respAddress = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != '') {
                            $respAddress = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != '') {
                            $respAddress = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                        }
                        if($respAddress != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Address
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $respAddress; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_postal_code"){
                        $postalCode = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != "") {
                            $postalCode = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != "") {
                            $postalCode = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString;
                        }
                        if($postalCode != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divPostalCode" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Postal Code:
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $postalCode; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_city"){
                        $city = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != "") {
                            $city = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != "") {
                            $city = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
                        }
                        if($city != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divCity" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        City
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $city; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_state"){
                        $respState = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != '') {
                            $respState = ucwords(trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != '') {
                            $respState = ucwords(trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
                        }
                        if($respState == "NegeriSembilan"){
                            $respState = "Negeri Sembilan";
                        }elseif($respState == "PulauPinang"){
                            $respState = "Pulau Pinang";
                        }elseif($respState == "WpKualaLumpur"){
                            $respState = "WP Kuala Lumpur";
                        }elseif($respState == "WpLabuan"){
                            $respState = "WP Labuan";
                        }elseif($respState == "WpPutrajaya"){
                            $respState = "WP Putrajaya";
                        }
                        if($respState != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2 divCity" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        State
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $respState; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
               
                <div class="row mb-2 divCity">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Country
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        Malaysia
                    </div>
                </div>
               
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    if($key == "c2_contact_email"){
                        $respEmail = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                            $respEmail = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                            $respEmail = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                        }
                        if($respEmail != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-3 pl-5">
                                        <label class="form-control-label mr-4" for="c2_metadataName">
                                            Email
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-6">
                                        <?php echo $respEmail; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_fax"){
                        $fax = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != "") {
                            $fax = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != "") {
                            $fax = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                        }
                        if($fax != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Fax No
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $fax; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_phone_office"){
                        $respPhone = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != '') {
                            $respPhone = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != '') {
                            $respPhone = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                        }
                        if($respPhone != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Telephone (Office)
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $respPhone; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_website"){
                        $respWebsite = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != '') {
                            $respWebsite = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != '') {
                            $respWebsite = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
                        }
                        if($respWebsite != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Contact Website
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $respWebsite; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c2_contact_role"){
                        $role = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != '') {
                            $role = ucwords($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode);
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != '') {
                            $role = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode);
                        }
                        if($role == "ResourceProvider"){
                            $role = "Resource Provider";
                        }elseif($role == "PointOfContact"){
                            $role = "Point Of Contact";
                        }elseif($role == "PrincipalInvestigator"){
                            $role = "Principal Investigator";
                        }
                        if($role != ""){
                            $flag *= 0;
                            ?>
                            <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c2_metadataName">
                                        Role
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php echo $role; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c2').hide();
        });
    </script>
        <?php
}
?>
