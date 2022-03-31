<div class="card card-primary div_c1" id="div_c1">
    <div class="card-header pb-0 mb-0">
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
                        ?>
                        <div class="form-group row" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <p class="pl-lg-3 form-control-label">Content Information<span class="mx-3">:</span></p>
                            <?php 
                            $f = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString; 
                            if($f == "application"){
                                echo "Application";
                            }
                            if($f == "clearinghouse"){
                                echo "Clearing House";
                            }
                            if($f == "downloadableData"){
                                echo "Downloadable Data";
                            }
                            if($f == "geographicActivities"){
                                echo "Geographic Activities";
                            }
                            if($f == "geographicService"){
                                echo "Geographic Services";
                            }
                            if($f == "mapFiles"){
                                echo "Map File";
                            }
                            if($f == "offlineData"){
                                echo "Offline Data";
                            }
                            if($f == "staticMapImage"){
                                echo "Static Map Images";
                            }
                            if($f == "other"){
                                echo "Other Documents";
                            }
                            if($f == "liveData"){
                                echo "Live Data and Maps";
                            }
                            if($f == "Gridded"){
                                echo "Gridded";
                            }
                            if($f == "Imagery"){
                                echo "Imagery";
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <?php
            if ($langSelected != "") {
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
                        $pub_name = "";
                        if (isset($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                            $pub_name = ucwords($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString);
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">
                                        Name
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $pub_name; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_agensi_organisasi"){
                        $pub = "";
                        if (isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                            $pub = ucwords($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString);
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                                        Agency/Organization
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $pub; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_email"){
                        $pub = "";
                        if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                            $pub = ucwords($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString);
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_email">
                                        Email
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $pub; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_phone"){
                        $pub = "";
                        if(isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != ""){
                            $pub = ucwords($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString);
                            ?>
                            <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_phone">
                                        Telephone
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $pub; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "publisher_role"){
                        $pub = "";
                        if(isset($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode != ""){
                            $pub = ucwords($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode);
                            ?>
                            <div class="row my-0 py-0 divPublisherRole" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="publisher_role">
                                        Role
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <?php echo $pub; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
                <?php
                if($catSelected != ""){
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="metadata_standard_name">
                                Metadata Standard Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            MyGDI Metadata Standard
                            <?php echo '('.ucwords($catSelected).')'; ?>
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
