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
                if ($metadataSearched->title != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
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
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
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
                ?>
                <?php
                $abstract = "";
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_abstract">
                                Abstract
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $abstract = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divMetadataDate">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Date
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo date('d/m/Y',strtotime($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date)); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divMetadataDateType">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Date Type
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->metadataStatus->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->metadataStatus->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divMetadataStatus">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Status
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->metadataStatus->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divTypeOfServices">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Type of Services
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divOperationName">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Operation Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                /*
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divServiceUrl">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Service URL
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                */
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) && $metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divTypeOfCouplingDataset">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Type of Coupling with Dataset
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <h2 class="heading-small text-muted">Responsible Party</h2>
            <div class="my-2 pl-lg-3">
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
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
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Agency/Organization
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Bahagian
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Address
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != ""){
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divPostalCode">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Postal Code:
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != ""){
                    $flag *= 0;
                    ?>
                    <div class="row mb-2 divCity">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                City
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != "") {
                    $flag *= 0;
                    
                    $respState = ucwords($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString);
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
                    ?>
                    <div class="row mb-2 divCity">
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
                ?>
                <?php
//                if(isset($countries->name) && $countries->name != ""){
                    $flag *= 0;
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
//                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_metadataName">
                                    Email
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-6">
                                <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Fax No
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Telephone (Office)
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-4">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Contact Website
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-4">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Role
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode; ?>
                        </div>
                    </div>
                    <?php
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