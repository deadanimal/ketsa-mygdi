<div class="card card-primary mb-4 div_c14" id="div_c14">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse14">
            <h4 class="card-title">
                <?php echo __('lang.accord_14'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal14">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal14">Catatan</button>
        @endif
    </div>
    <div id="collapse14" class="panel-collapse collapse in show" data-parent="#div_c14">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                            <label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ (isset($metadataxml->customInputs->accordion14->$key) ? $metadataxml->customInputs->accordion14->$key:"") }}"/>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-6">
                    <h6 class="heading-small text muted">Legal Constraints</h6>
                    <div class="pl-lg-3">
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                            if($key == "c14_useLimitation"){
                                ?>
                                <div class="row mb-2 divUseLimitation" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-xl-5">
                                        <label class="form-control-label" for="input-access-cons">
                                            Use Limitation
                                        </label>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php
                                        $useLimitation = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
                                            $useLimitation = trim($metadataxml->identificationInfo->MD_DataIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString);
                                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString != "") {
                                            $useLimitation = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceSpecificUsage->MD_Usage->userDeterminedLimitations->CharacterString);
                                        }
                                        ?>
                                        <input type="text" name="c14_useLimitation" id="c14_useLimitation" class="form-control form-control-sm" value="{{ $useLimitation }}">
                                    </div>
                                </div>
                                <?php
                            }
                            if($key == "c14_access_constraint"){
                                ?>
                                <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-xl-5">
                                        <label class="form-control-label" for="input-access-cons">
                                            Access Constraints
                                        </label>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php
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
                                        ?>
                                        <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm">
                                            <option value="">Pilih...</option>
                                            <option value="Copyright" {{($accessConst == 'Copyright' ? "selected":"")}}>Copyright</option>
                                            <option value="Intellectual Property Rights" {{($accessConst == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                            <option value="License" {{($accessConst == 'License' ? "selected":"")}}>License</option>
                                            <option value="License End User" {{($accessConst == 'License End User' ? "selected":"")}}>License End User</option>
                                            <option value="License Unrestricted" {{($accessConst == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                            <option value="Other Restrictions" {{($accessConst == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                            <option value="Patent" {{($accessConst == 'Patent' ? "selected":"")}}>Patent</option>
                                            <option value="Patent Pending" {{($accessConst == 'Patent Pending' ? "selected":"")}}>Patent Pending</option>
                                            <option value="Restricted" {{($accessConst == 'Restricted' ? "selected":"")}}>Restricted</option>
                                            <option value="Trademark" {{($accessConst == 'Trademark' ? "selected":"")}}>Trademark</option>
                                            <option value="Unrestricted" {{($accessConst == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                            if($key == "c14_use_constraint"){
                                ?>
                                <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-xl-5">
                                        <label class="form-control-label" for="input-use-cons">
                                            Use Constraints
                                        </label>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php
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
                                        ?>
                                        <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm">
                                            <option value="">Pilih...</option>
                                            <option value="Copyright" {{($useConst == 'Copyright' ? "selected":"")}}>Copyright</option>
                                            <option value="Intellectual Property Rights" {{($useConst == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                            <option value="License" {{($useConst == 'License' ? "selected":"")}}>License</option>
                                            <option value="License End User" {{($useConst == 'License End User' ? "selected":"")}}>License End User</option>
                                            <option value="License Unrestricted" {{($useConst == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                            <option value="Other Restrictions" {{($useConst == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                            <option value="Patent" {{($useConst == 'Patent' ? "selected":"")}}>Patient</option>
                                            <option value="Patent Pending" {{($useConst == 'Patent Pending' ? "selected":"")}}>Patent Pending</option>
                                            <option value="Restricted" {{($useConst == 'Restricted' ? "selected":"")}}>Restricted</option>
                                            <option value="Trademark" {{($useConst == 'Trademark' ? "selected":"")}}>Trademark</option>
                                            <option value="Unrestricted" {{($useConst == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <h6 class="heading-small text muted">Security Constraints
                    </h6>
                    <div class="pl-lg-3">
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                            if($key == "c14_classification_sys"){
                                ?>
                                <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-xl-5">
                                        <label class="form-control-label" for="input-access-cons">
                                            Classification
                                        </label>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php
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
                                        ?>
                                        <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm">
                                            <option value="">Pilih...</option>
                                            <option value="Confidential" {{($classSys == 'Confidential' ? "selected":"")}}>Confidential</option>
                                            <option value="For Official Use Only" {{($classSys == 'For Official Use Only' ? "selected":"")}}>For Official Use Only</option>
                                            <option value="Limited Distribution" {{($classSys == 'Limited Distribution' ? "selected":"")}}>Limited Distribution</option>
                                            <option value="Protected" {{($classSys == 'Protected' ? "selected":"")}}>Protected</option>
                                            <option value="Restricted" {{($classSys == 'Restricted' ? "selected":"")}}>Restricted</option>
                                            <option value="Secret" {{($classSys == 'Secret' ? "selected":"")}}>Secret</option>
                                            <option value="Sensitive But Unclassified" {{($classSys == 'Sensitive But Unclassified' ? "selected":"")}}>Sensitive But Unclassified</option>
                                            <option value="Top Secret" {{($classSys == 'Top Secret' ? "selected":"")}}>Top Secret</option>
                                            <option value="Unclassified" {{($classSys == 'Unclassified' ? "selected":"")}}>Unclassified</option>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                            if($key == "c14_reference"){
                                ?>
                                <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-xl-5">
                                        <label class="form-control-label" for="input-reference">
                                            Reference
                                        </label>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php
                                        $ref = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                                            $ref = $metadataxml->identificationInfo->MD_DataIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
                                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                                            $ref = $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
                                        }
                                        ?>
                                        <input type="text" name="c14_reference" id="c14_reference" class="form-control form-control-sm" placeholder="Standard/Policy/Act/Circular/Legal" value="{{ $ref }}">
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
