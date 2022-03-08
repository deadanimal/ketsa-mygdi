<div class="card card-primary div_c11" id="div_c11">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse11">
            <h4 class="card-title">
                <?php echo __('lang.accord_11'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse11" class="panel-collapse collapse in show" data-parent="#div_c11">
        <div class="card-body">
            <div class="row mb-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion11'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_dist_format"){
                        $distFormat = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString != "") {
                            $distFormat = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString;
                        }
                        if($distFormat != ""){
                            ?>
                            <div class="col-xl-2">
                                <label class="form-control-label" for="input-distribution-format">
                                    Format Name </label>
                            </div>
                            <div class="col-xl-3">
                                <?php echo "&nbsp;&nbsp;<p>" . $distFormat."</p>"; ?>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c11_version"){
                        $version = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString != "") {
                            $version = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString;
                        }
                        if($version != ""){
                            ?>
                            <div class="col-xl-1">
                                <label class="form-control-label" for="input-version">
                                    Version </label>
                            </div>
                            <div class="col-xl-2">
                                <?php echo "&nbsp;&nbsp;<p>" . $version."</p>"; ?>
                             </div>
                            <?php
                        }
                    }
                    if($key == "c11_medium"){
                        $medium = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name->MD_MediumNameCode) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name->MD_MediumNameCode != "") {
                            $medium = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name->MD_MediumNameCode;
                        }
                        if($medium != ""){
                            ?>
                            <div class="col-xl-1">
                                <label class="form-control-label" for="input-medium">
                                    Medium </label>
                            </div>
                            <div class="col-xl-3">
                                <?php echo "&nbsp;&nbsp;<p>" . $medium."</p>"; ?>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <?php
            foreach($template->template[strtolower($catSelected)]['accordion11'] as $key=>$val){
                if($key == "c11_distributor"){
                    $dist = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                        $dist = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName->CharacterString;
                    }
                    if($dist != ""){
                        ?>
                        <div class="row mb-2">
                            <div class="col-xl-2">
                                <label class="form-control-label" for="input-distributor">
                                    Organisation Name </label>
                            </div>
                            <div class="col-xl-6">
                                <?php echo "&nbsp;&nbsp;<p>" . $dist."</p>"; ?>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <h6 class="heading-small text-muted mt-4 distInfoSubtajuk1">Distribution Order Process
            </h6>
            <div class="pl-lg-3">
                <div class="row mb-2">
                    <?php
                    $flag1 = 1;
                    foreach($template->template[strtolower($catSelected)]['accordion11'] as $key=>$val){
                        if($key == "c11_units_of_dist"){
                            $unitDist = "";
                            if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString != "") {
                                $unitDist = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString;
                            }
                            if($unitDist != ""){
                                ?>
                                <div class="col-xl-2">
                                    <label class="form-control-label" for="input-unit-distribution">
                                        Units of Distribution </label>
                                </div>
                                <div class="col-xl-3">
                                    <?php echo "&nbsp;&nbsp;<p>" . $unitDist."</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                        if($key == "c11_size"){
                            $size = "";
                            if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real != "") {
                                $size = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real;
                            }
                            if($size != ""){
                                ?>
                                <div class="col-xl-2">
                                    <label class="form-control-label" for="input-sizemb">
                                        Size (Megabytes) </label>
                                </div>
                                <div class="col-xl-2">
                                    <?php echo "&nbsp;&nbsp;<p>" .$size."</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                        if($key == "c11_fees"){
                            $fees = "";
                            if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees->CharacterString != "") {
                                $fees = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees->CharacterString;
                            }
                            if($fees != ""){
                                $flag1 *= 0;
                                ?>
                                <div class="col-xl-1">
                                    <label class="form-control-label" for="input-fees">
                                        Fees </label>
                                </div>
                                <div class="col-xl-2">
                                    <?php echo "&nbsp;&nbsp;<p>" . $fees."</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="row mb-2">
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion11'] as $key=>$val){
                        if($key == "c11_link"){
                            $link = "";
                            if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL != "") {
                                $link = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL;
                            }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->connectPoint->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->connectPoint->CI_OnlineResource->linkage->URL != "") {
                                $link = $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->connectPoint->CI_OnlineResource->linkage->URL;
                            }
                            if($link != ""){
                                $flag1 *= 0;
                                ?>
                                <div class="col-xl-1">
                                    <label class="form-control-label" for="input-distributor">
                                        Link </label>
                                </div>
                                <div class="col-xl-4">
                                    <?php echo "&nbsp;&nbsp;<p>" . $link . "</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                        if($key == "c11_order_instructions"){
                            $orderInstruct = "";
                            if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) && trim($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) != "") {
                                $orderInstruct = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString;
                            }
                            if($orderInstruct != ""){
                                $flag1 *= 0;
                                ?>
                                <div class="col-xl-2">
                                    <label class="form-control-label" for="input-instructionorder">
                                        Ordering Instruction </label>
                                </div>
                                <div class="col-xl-5">
                                    <?php echo "&nbsp;&nbsp;<p>" . $orderInstruct . "</p>"; ?>
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

<script>
    $(document).ready(function(){
        <?php
        if($flag1 == 1){
            ?>
            $('.distInfoSubtajuk1').hide();    
            <?php
        }else{
            ?>
            $('.distInfoSubtajuk1').show();
            <?php
        }
        ?>
    });
</script>