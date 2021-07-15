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
                <input type="text" name="c11_dist_format" id="c11_dist_format" class="form-control col-lg-2" value="{{old('c11_dist_format')}}"> 
                &nbsp;&nbsp;&nbsp;
                Version:
                <input type="text" name="c11_version" id="c11_version" class="form-control col-lg-2" value="{{old('c11_version')}}"> 
                &nbsp;&nbsp;&nbsp;
                Medium:
                <?php
                $medium = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name : "");
                ?>
                <input type="text" name="c11_medium" id="c11_medium" class="form-control col-lg-3" value="{{old('c11_medium')}}">
            </div>
            <div class="form-group row">
                Distributor:
                <input type="text" name="c11_distributor" id="c11_distributor" class="form-control col-lg-4" value="{{old('c11_distributor')}}"> 
            </div>
            <div class="form-group row">
                <p><b>Distribution Order Process</b></p>
            </div>
            <div class="form-group row">
                <?php
                $unit_distribute = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString : "");
                ?>
                Units of Distribution:
                <input type="text" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control col-lg-2" value="{{old('c11_units_of_dist')}}"> 
                &nbsp;&nbsp;&nbsp;
                <?php
                $size = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real : "");
                ?>
                Size (Megabytes):
                <input type="text" name="c11_size" id="c11_size" class="form-control col-lg-2" value="{{old('c11_size')}}"> 
                &nbsp;&nbsp;&nbsp;
                Fees:
                <input type="text" name="c11_fees" id="c11_fees" class="form-control col-lg-2" placeholder="RM 0.00" value="{{old('c11_fees')}}"> 
            </div>
            <div class="form-group row">
                <?php
                $link = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL : "");
                ?>
                Link:
                <input type="text" name="c11_link" id="c11_link" class="form-control col-lg-3" value="{{old('c11_link')}}"> 
                &nbsp;&nbsp;&nbsp;
                <?php
                $order_instruct = (isset($metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) ? $metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString : "");
                ?>
                Ordering Instructions:
                <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control col-lg-5" value="{{old('c11_order_instructions')}}"> 
            </div>
        </div>
    </div>
</div>