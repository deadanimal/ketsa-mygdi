<?php $flag = 1; ?>
<div class="card card-primary div_c1" id="div_c1">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse1">
            <h4 class="card-title">
                <?php echo __('lang.accord_1'); ?>
            </h4>
        </a>
        </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <?php
            foreach($template->template[strtolower($catSelected)]['accordion1'] as $key=>$val){
                if($val['status'] == "customInput"){
                    ?>
                    <div class="row mb-2 sortIt">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                            <label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            {{ (isset($metadataxml->customInputs->accordion1->$key) ? $metadataxml->customInputs->accordion1->$key:"") }}
                        </div>
                    </div>
                    <?php
                }
                if($key == "c1_content_info"){
                    if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString != "") {
                        $flag *= 0;
                        ?>
                        <div class="form-group row" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <p class="pl-lg-3 form-control-label">Content Information<span class="mx-3">:</span></p>
                            <?php 
                            $f = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString;
                            if($f == "clearinghouse"){
                                $f = "Clearing House";
                            }
                            if($f == "downloadableData"){
                                $f = "Downloadable Data";
                            }
                            if($f == "geographicActivities"){
                                $f = "Geographic Activities";
                            }
                            if($f == "geographicService"){
                                $f = "Geographic Services";
                            }
                            if($f == "mapFiles"){
                                $f = "Map File";
                            }
                            if($f == "offlineData"){
                                $f = "Offline Data";
                            }
                            if($f == "staticMapImage"){
                                $f = "Static Map Images";
                            }
                            if($f == "other"){
                                $f = "Other Documents";
                            }
                            if($f == "liveData"){
                                $f = "Live Data and Maps";
                            }
                            
                            echo $f;
                            ?>
                        </div>
                        <?php
                    }
                }
            }
            
            ?>
            <?php
            if (isset($metadataxml->language->CharacterString) && $metadataxml->language->CharacterString != "") {
                $flag *= 0;
                
                $langSelected = "";
                $langSelected = strtolower(trim($metadataxml->language->CharacterString));
                if($langSelected == "english"){
                    $langSelected = "en";
                }elseif($langSelected == "bahasaMelayu"){
                    $langSelected = "bm";
                }else{
                    $langSelected = "en";
                }
                ?>
                <div class="form-group row">
                    <p class="pl-lg-3 form-control-label">Metadata Language<span class="mx-3">:</span></p>    
                    <?php
                    if($langSelected == 'en'){
                        echo "English";
                    }elseif($langSelected == 'bm'){
                        echo "Bahasa Malaysia";
                    }
                    ?>
                </div>    
                <?php
            }
            ?>
            <?php
            if($metadataSearched->createdate != ""){
                $flag *= 0;
                
                $metDate = '';
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
                    $metDate = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date;
                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
                    $metDate = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date;
                }
                ?>
                <div class="form-group row">
                    <p class="pl-lg-3 form-control-label">Metadata Create Date<span class="mx-3">:</span></p>
                    <?php echo date('d/m/Y',strtotime($metDate)); ?>
                </div>
                <?php
            }
            ?>
            <h2 class="heading-small text-muted">Metadata Publisher</h2>
            <div class="">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion1'] as $key=>$val){
                    if($key == "publisher_name"){
                        if (isset($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">
                                        Name
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">    
                                    <?php echo $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_agensi_organisasi"){
                        if (isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                                        Agency/Organization
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">    
                                <?php echo $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_email"){
                        if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_email">
                                        Email
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_phone"){
                        if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_phone">
                                        Telephone
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_role"){
                        if(isset($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode != ""){
                            $flag *= 0;
                            ?>
                            <div class="row my-0 py-0 divPublisherRole" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_role">
                                        Role
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
                
                <?php
                if(isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != ""){
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="metadata_standard_name">
                                Metadata Standard Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            MyGDI Metadata Standard
                            <?php echo '('.$metadataxml->hierarchyLevel->MD_ScopeCode.')'; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="metadata_standard_version">
                            Metadata Standard Version
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ strtoupper($template->version) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c1').hide();
        });
    </script>
    <?php
}
?>
