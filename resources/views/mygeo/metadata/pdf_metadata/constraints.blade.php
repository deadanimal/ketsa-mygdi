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
                    <h6 class="heading-small text-muted constraintSubTajuk1">Legal Constraints</h6>
                    <div class="pl-lg-3">
                        <?php
                        $flag1 = 1;
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
                            $flag1 *= 0;
                            ?>
                            <div class="row mb-2 divUseLimitation">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-access-cons">
                                        Use Limitation
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php trim($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode != "") {
                            $flag1 *= 0;
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-access-cons">
                                        Access Constraints
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode != "") {
                            $flag1 *= 0;
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-use-cons">
                                        Use Constraints
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <h6 class="heading-small text-muted constraintSubTajuk2">Security Constraints
                    </h6>
                    <div class="pl-lg-3">
                        <?php
                        $flag2 = 1;
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode != "") {
                            $flag2 *= 0;
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-access-cons">
                                        Classification
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                            $flag2 *= 0;
                            ?>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <label class="form-control-label" for="input-reference">
                                        Reference
                                    </label>
                                </div>
                                <div class="col-xl-7">
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference . "</p>"; ?>
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

<script>
    $(document).ready(function(){
        <?php
        if($flag1 == 1){
            ?>
            $('.constraintSubTajuk1').hide();    
            <?php
        }else{
            ?>
            $('.constraintSubTajuk1').show();
            <?php
        }
        
        if($flag2 == 1){
            ?>
            $('.constraintSubTajuk2').hide();    
            <?php
        }else{
            ?>
            $('.constraintSubTajuk2').show();
            <?php
        }
        ?>
    });
</script>