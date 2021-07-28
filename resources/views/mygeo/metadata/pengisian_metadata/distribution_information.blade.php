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
                    <select name="c11_medium" id="c11_medium" class="form-control form-control-sm">
                        <option value="cdROM (001)" {{ (old('c11_medium')=='cdROM (001)' ? 'selected':'') }}>cdROM (001)</option>
                        <option value="dvd (002)" {{ (old('c11_medium')=='dvd (002)' ? 'selected':'') }}>dvd (002)</option>
                        <option value="dvdRom (003)" {{ (old('c11_medium')=='dvdRom (003)' ? 'selected':'') }}>dvdRom (003)</option>
                        <option value="3halfInchFloppy (004)" {{ (old('c11_medium')=='3halfInchFloppy (004)' ? 'selected':'') }}>3halfInchFloppy (004)</option>
                        <option value="5quarterInchFloppy (005)" {{ (old('c11_medium')=='5quarterInchFloppy (005)' ? 'selected':'') }}>5quarterInchFloppy (005)</option>
                        <option value="7trackTape (006)" {{ (old('c11_medium')=='7trackTape (006)' ? 'selected':'') }}>7trackTape (006)</option>
                        <option value="9trackTape (007)" {{ (old('c11_medium')=='9trackTape (007)' ? 'selected':'') }}>9trackTape (007)</option>
                        <option value="3480Cartridge (008)" {{ (old('c11_medium')=='3480Cartridge (008)' ? 'selected':'') }}>3480Cartridge (008)</option>
                        <option value="3490Cartridge (009)" {{ (old('c11_medium')=='3490Cartridge (009)' ? 'selected':'') }}>3490Cartridge (009)</option>
                        <option value="3580Cartridge (010)" {{ (old('c11_medium')=='3580Cartridge (010)' ? 'selected':'') }}>3580Cartridge (010)</option>
                        <option value="4mmCartridgeTape (011)" {{ (old('c11_medium')=='4mmCartridgeTape (011)' ? 'selected':'') }}>4mmCartridgeTape (011)</option>
                        <option value="8mmCartridgeTape (012)" {{ (old('c11_medium')=='8mmCartridgeTape (012)' ? 'selected':'') }}>8mmCartridgeTape (012)</option>
                        <option value="1quaterInchCartridgeTape (013)" {{ (old('c11_medium')=='1quaterInchCartridgeTape (013)' ? 'selected':'') }}>1quaterInchCartridgeTape (013)</option>
                        <option value="digitalLinearTape (014)" {{ (old('c11_medium')=='digitalLinearTape (014)' ? 'selected':'') }}>digitalLinearTape (014)</option>
                        <option value="onLine (015)" {{ (old('c11_medium')=='onLine (015)' ? 'selected':'') }}>onLine (015)</option>
                        <option value="satellite (016)" {{ (old('c11_medium')=='satellite (016)' ? 'selected':'') }}>satellite (016)</option>
                        <option value="telephoneLink (017)" {{ (old('c11_medium')=='telephoneLink (017)' ? 'selected':'') }}>telephoneLink (017)</option>
                        <option value="hardcopy (018)" {{ (old('c11_medium')=='hardcopy (018)' ? 'selected':'') }}>hardcopy (018)</option>
                    </select>
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
