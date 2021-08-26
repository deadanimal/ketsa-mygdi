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
            <div class="my-2">
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != "") {
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
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString != "") {
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
                <h2 class="heading-small text-muted"><?php echo __('lang.abstract'); ?></h2>
                <?php //=== abstract==============================================================
                ?>
                @include('mygeo.metadata.lihat_metadata.abstract')
                <br>
                <?php
                /*
                $abstract = "";
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != "") {
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
                */
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date != "") {
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
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString != "") {
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
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) && $metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType != "") {
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
            <div class="my-2">
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != "") {
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
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != "") {
                    ?>
                    <div class="row mb-4">
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
                    ?>
                    <div class="row mb-4 divPostalCode">
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
                    ?>
                    <div class="row mb-4 divCity">
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
                    ?>
                    <div class="row mb-4 divCity">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                State
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php 
                if(isset($countries->name) && $countries->name != ""){
                    ?>
                    <div class="row mb-4 divCity">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Country
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $countries->name; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
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
