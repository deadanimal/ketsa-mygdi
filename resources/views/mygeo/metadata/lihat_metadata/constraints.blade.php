<div class="card card-primary div_c14" id="div_c14">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse14">
            <h4 class="card-title">
                <?php echo __('lang.accord_14'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse14" class="panel-collapse collapse in show" data-parent="#div_c14">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <h6 class="heading-small text-muted">Legal Constraints</h6>
                    <div class="pl-lg-3">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
                            ?>
                            <div class="row mb-2 divUseLimitation">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-access-cons">
                                        Use Limitation
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints != "") {
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-access-cons">
                                        Access Constraints
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints != "") {
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-use-cons">
                                        Use Constraints
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <h6 class="heading-small text-muted">Security Constraints
                    </h6>
                    <div class="pl-lg-3">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification != "") {
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-access-cons">
                                        Classification System
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-reference">
                                        Reference
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
