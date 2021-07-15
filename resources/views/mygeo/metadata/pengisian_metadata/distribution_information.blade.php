<div class="card card-primary mb-4 div_c11" id="div_c11">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse11">
                <?php echo __('lang.accord_11'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse11" class="panel-collapse collapse in" data-parent="#div_c11">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distribution-format">
                        Distribution Format </label>
                </div>
                <div class="col-xl-3">
                    <input class="form-control form-control-sm " type="text" name="c11_dist_format" id="c11_dist_format" placeholder="Format Name" value="{{old('c11_dist_format')}}">
                </div>
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-version">
                        Version </label>
                </div>
                <div class="col-xl-2">
                    <input class="form-control form-control-sm" type="text" name="c11_version" id="c11_version" placeholder="Format Version" value="{{old('c11_version')}}">
                </div>
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-medium">
                        Medium </label>
                </div>
                <div class="col-xl-3">
                    <?php
                    $medium = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name : "");
                    ?>
                    <input type="text" name="c11_medium" id="c11_medium" class="form-control form-control-sm" value="{{old('c11_medium')}}">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distributor">
                        Distributor </label>
                </div>
                <div class="col-xl-6">

                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm" placeholder="Organization Name" value="{{old('c11_distributor')}}">
                </div>
            </div>
            <h6 class="heading-small text-muted mt-4">Distribution Order Process
            </h6>
            <div class="pl-lg-3">
                <div class="row mb-2">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-unit-distribution">
                            Units of Distribution </label>
                    </div>
                    <div class="col-xl-3">
                        <?php
                        $unit_distribute = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString : "");
                        ?>
                        <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control form-control-sm" value="{{old('c11_units_of_dist')}}">
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $size = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real : "");
                        ?>
                        <label class="form-control-label" for="input-sizemb">
                            Size (Megabytes) </label>
                    </div>
                    <div class="col-xl-2">
                        <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm" placehorder="Size" value="{{old('c11_size')}}">
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-fees">
                            Fees </label>
                    </div>
                    <div class="col-xl-2">
                        <input type="text" name="c11_fees" id="c11_fees" class="form-control form-control-sm" placeholder="RM 0.00" value="{{old('c11_fees')}}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-1">
                        <?php
                        $link = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL : "");
                        ?>
                        <label class="form-control-label" for="input-distributor">
                            Link </label>
                    </div>
                    <div class="col-xl-4">
                        <input class="form-control form-control-sm" name="c11_link" id="c11_link" placeholder="Ordering Website Link" type="text" value="{{old('c11_link')}}">
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $order_instruct = (isset($metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) ? $metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString : "");
                        ?>
                        <label class="form-control-label" for="input-instructionorder">
                            Ordering Instruction </label>
                    </div>
                    <div class="col-xl-5">
                        <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm" value="{{old('c11_order_instructions')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
