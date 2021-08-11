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
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                <?php
                                if(isset($metadataxml->categoryTitle->categoryItem->CharacterString) && $metadataxml->categoryTitle->categoryItem->CharacterString != ""){
                                    if(strtolower($metadataxml->categoryTitle->categoryItem->CharacterString) == "dataset"){
                                        echo "Title";
                                    }else{
                                        echo "Metadata Name";
                                    }
                                }
                                ?>
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->productType) && $metadataxml->identificationInfo->SV_ServiceIdentification->productType != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Type of Product
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-3">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->productType; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                $abstract = "";
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_abstract">
                                Abstract
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $abstract = $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->metadataDate->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDate->CharacterString != "") {
                    ?>
                    <div class="row mb-2 divMetadataDate">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Date
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDate->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->metadataDateType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDateType->CharacterString != "") {
                    ?>
                    <div class="row mb-2 divMetadataDateType">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Date Type
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDateType->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->metadataStatus->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->metadataStatus->CharacterString != "") {
                    ?>
                    <div class="row mb-2 divMetadataStatus">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Status
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->metadataStatus->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->typeOfServices->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->typeOfServices->CharacterString != "") {
                    ?>
                    <div class="row mb-2 divTypeOfServices">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Type of Services
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->typeOfServices->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != "") {
                    ?>
                    <div class="row mb-2 divOperationName">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Operation Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString != "") {
                    ?>
                    <div class="row mb-2 divServiceUrl">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Service URL
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->srv) && $metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->srv != "") {
                    ?>
                    <div class="row mb-2 divTypeOfCouplingDataset">
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Type of Coupling with Dataset
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->srv; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <h2 class="heading-small text-muted">Responsible Party</h2>
            <div class="my-2">
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString; ?>
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
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Agency/Organization
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != "") {
                    ?>
                    <div class="row mb-4">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Address
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != ""){
                    ?>
                    <div class="row mb-4 divPostalCode">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Postal Code:
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != ""){
                    ?>
                    <div class="row mb-4 divCity">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                City
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != "") {
                    ?>
                    <div class="row mb-4 divCity">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                State
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString; ?>
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
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_metadataName">
                                    Email
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-6">
                                <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Fax No
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != "") {
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Telephone (Office)
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != "") {
                    ?>
                    <div class="row mb-4">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Contact Website
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>  
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->role->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->role->CharacterString != "") {
                    ?>
                    <div class="row mb-4">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName">
                                Role
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->role->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
