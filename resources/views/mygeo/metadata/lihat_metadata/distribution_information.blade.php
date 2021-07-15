<div class="card card-primary div_c11" id="div_c11">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse11">
            <h4 class="card-title">
                <?php echo __('lang.accord_11'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse11" class="panel-collapse collapse" data-parent="#div_c11">
        <div class="card-body">
            <div class="form-group row">
                Distribution Format:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Version:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Medium:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Distributor:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                <p><b>Distribution Order Process</b></p>
            </div>
            <div class="form-group row">
                Units of Distribution:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Size (Megabytes):
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Fees:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Link:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Ordering Instructions:
                <?php
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions."</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>