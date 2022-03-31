<?php $flag = 1; ?>
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
                        foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                            if($val['status'] == "customInput"){
                                ?>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    {{ (isset($metadataxml->customInputs->accordion14->$key) ? $metadataxml->customInputs->accordion14->$key:"") }}
                                </div>
                                <?php
                            }
                            if($key == "c14_useLimitation"){
                                $useLimitation = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
                                    $useLimitation = trim($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString);
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
                                    $useLimitation = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString);
                                }
                                if($useLimitation != ""){
                                    $flag1 *= 0;
                                    $flag *= 0;
                                    ?>
                                    <div class="row mb-2 divUseLimitation" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <label class="form-control-label" for="input-access-cons">
                                                Use Limitation
                                            </label>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php trim($useLimitation); ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            if($key == "c14_access_constraint"){
                                $accessConst = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode != "") {
                                    $accessConst = ucwords(trim($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode));
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode != "") {
                                    $accessConst = ucwords(trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints->MD_RestrictionCode));
                                }
                                if($accessConst == "PatentPending"){
                                    $accessConst = "Patent Pending";
                                }elseif($accessConst == "IntellectualpropertyRights"){
                                    $accessConst = "Intellectual Property Rights";
                                }elseif($accessConst == "OtherRestrictions"){
                                    $accessConst = "Other Restrictions";
                                }
                                if($accessConst != ""){
                                    $flag1 *= 0;
                                    $flag *= 0;
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <label class="form-control-label" for="input-access-cons">
                                                Access Constraints
                                            </label>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php echo "&nbsp;&nbsp;<p>" . $accessConst . "</p>"; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            if($key == "c14_use_constraint"){
                                $useConst = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode != "") {
                                    $useConst = ucwords(trim($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode));
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode != "") {
                                    $useConst = ucwords(trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints->MD_RestrictionCode));
                                }
                                if($useConst == "PatentPending"){
                                    $useConst = "Patent Pending";
                                }elseif($useConst == "IntellectualpropertyRights"){
                                    $useConst = "Intellectual Property Rights";
                                }elseif($useConst == "OtherRestrictions"){
                                    $useConst = "Other Restrictions";
                                }
                                if($useConst != ""){
                                    $flag1 *= 0;
                                    $flag *= 0;
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <label class="form-control-label" for="input-use-cons">
                                                Use Constraints
                                            </label>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php echo "&nbsp;&nbsp;<p>" . $useConst . "</p>"; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
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
                        $classSys = $arr = "";
                        foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                            if($key == "c14_classification_sys"){
                                $classSys = $arr = "";
                                if(isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode)){
                                    $arr = (array)$metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode;
                                }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode)){
                                    $arr = (array)$metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification->MD_ClassificationCode;

                                }
                                if($arr != ""){
                                    foreach($arr as $ar){
                                        if(is_array($ar)){
                                            $classSys = $ar['codeListValue'];
                                        }
                                    }
                                }
                                $classSys = ucwords($classSys);

                                if($classSys == "TopSecret"){
                                    $classSys = "Top Secret";
                                }
                                if($classSys != ""){
                                    $flag2 *= 0;
                                }
                                if($classSys != ""){
                                    $flag2 *= 0;
                                    $flag *= 0;
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <label class="form-control-label" for="input-reference">
                                                Reference
                                            </label>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php echo "&nbsp;&nbsp;<p>" . $classSys . "</p>"; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            if($key == "c14_reference"){
                                $ref = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                                    $ref = $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                                    $ref = $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
                                }
                                if($ref != ""){
                                    $flag2 *= 0;
                                    $flag *= 0;
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
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
                            }
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

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c14').hide();
        });
    </script>
    <?php
}
?>
