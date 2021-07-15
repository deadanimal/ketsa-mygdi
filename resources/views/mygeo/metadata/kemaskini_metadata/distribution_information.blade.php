<div class="card card-primary div_c11" id="div_c11">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse11">
            <h4 class="card-title">
                <?php echo __('lang.accord_11'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal11">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal11">Catatan</button>
        @endif
    </div>
    <div id="collapse11" class="panel-collapse collapse" data-parent="#div_c11">
        <div class="card-body">
            <div class="form-group row">
                Distribution Format:
                <?php
                $distFormat = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString != ""){
                   $distFormat = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString;
                }
                ?>
                <input type="text" name="c11_dist_format" id="c11_dist_format" class="form-control col-lg-2" value="{{ $distFormat }}"> 
                &nbsp;&nbsp;&nbsp;
                Version:
                <?php
                $version = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString != ""){
                    $version = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString;
                }
                ?>
                <input type="text" name="c11_version" id="c11_version" class="form-control col-lg-2" value="{{ $version }}"> 
                &nbsp;&nbsp;&nbsp;
                Medium:
                <?php
                $medium = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium != ""){
                    $medium = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium;
                }
                ?>
                <input type="text" name="c11_medium" id="c11_medium" class="form-control col-lg-3" value="{{ $medium }}">
            </div>
            <div class="form-group row">
                Distributor:
                <?php
                $dist = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName != ""){
                   $dist = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName;
                }
                ?>
                <input type="text" name="c11_distributor" id="c11_distributor" class="form-control col-lg-4" value="{{ $dist }}"> 
            </div>
            <div class="form-group row">
                <p><b>Distribution Order Process</b></p>
            </div>
            <div class="form-group row">
                <?php
                $unitDist = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution != ""){
                   $unitDist = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution;
                }
                ?>
                Units of Distribution:
                <input type="text" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control col-lg-2" value="{{ $unitDist }}"> 
                &nbsp;&nbsp;&nbsp;
                Size (Megabytes):
                <?php
                $size = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize != ""){
                    $size = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize;
                }
                ?>
                <input type="text" name="c11_size" id="c11_size" class="form-control col-lg-2" value="{{ $size }}"> 
                &nbsp;&nbsp;&nbsp;
                Fees:
                <?php
                $fees = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees != ""){
                    $fees = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees;
                }
                ?>
                <input type="text" name="c11_fees" id="c11_fees" class="form-control col-lg-2" placeholder="RM 0.00" value="{{ $fees }}"> 
            </div>
            <div class="form-group row">
                Link:
                <?php
                $link = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage != ""){
                    $link = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage;
                }
                ?>
                <input type="text" name="c11_link" id="c11_link" class="form-control col-lg-3" value="{{ $link }}"> 
                &nbsp;&nbsp;&nbsp;
                Ordering Instructions:
                <?php
                $orderInstruct = "";
                if(isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions != ""){
                   $orderInstruct = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions;
                }
                ?>
                <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control col-lg-5" value="{{ $orderInstruct }}"> 
            </div>
        </div>
    </div>
</div>