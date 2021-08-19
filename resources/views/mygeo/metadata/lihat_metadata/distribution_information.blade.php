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
                if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString != "") {
                    ?>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-distribution-format">
                            Distribution Format </label>
                    </div>
                    <div class="col-xl-3">
                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString . "</p>"; ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString != "") {
                    ?>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-version">
                            Version </label>
                    </div>
                    <div class="col-xl-2">
                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString . "</p>"; ?>
                     </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name != "") {
                    ?>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-medium">
                            Medium </label>
                    </div>
                    <div class="col-xl-3">
                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name . "</p>"; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName) && trim($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName) != "") {
                ?>
                <div class="row mb-2">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-distributor">
                            Distributor </label>
                    </div>
                    <div class="col-xl-6">
                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName . "</p>"; ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <h6 class="heading-small text-muted mt-4 distInfoSubtajuk1">Distribution Order Process
            </h6>
            <div class="pl-lg-3">
                <div class="row mb-2">
                    <?php
                    $flag1 = 1;
                    if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution) && trim($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution) != "") {
                        $flag1 *= 0;
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-unit-distribution">
                                Units of Distribution </label>
                        </div>
                        <div class="col-xl-3">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution . "</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize) && trim($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize) != "") {
                        $flag1 *= 0;
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-sizemb">
                                Size (Megabytes) </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize . "</p>"; ?>
                        </div>  
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees) && trim($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees) != "") {
                        $flag1 *= 0;
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-fees">
                                Fees </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees . "</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="row mb-2">
                    <?php
                    if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage) && trim($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage) != "") {
                        $flag1 *= 0;
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-distributor">
                                Link </label>
                        </div>
                        <div class="col-xl-4">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage . "</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString != "") {
                        $flag1 *= 0;
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-instructionorder">
                                Ordering Instruction </label>
                        </div>
                        <div class="col-xl-5">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString . "</p>"; ?>
                        </div>
                        <?php
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