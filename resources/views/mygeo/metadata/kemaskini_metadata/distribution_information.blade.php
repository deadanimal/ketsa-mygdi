<div class="card card-primary div_c11" id="div_c11">
    <div class="card-header">
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
    <div id="collapse11" class="panel-collapse collapse in show" data-parent="#div_c11">
        <div class="card-body">            
            <h6 class="heading-small text-muted mt-4">Distribution Format</h6>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distribution-format">
                        Format Name</label>
                </div>
                <div class="col-xl-3">
                    <?php
                    $distFormat = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString != "") {
                        $distFormat = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->name->CharacterString;
                    }
                    ?>
                    <input class="form-control form-control-sm " type="text" name="c11_dist_format" id="c11_dist_format" placeholder="Format Name" value="{{ $distFormat }}">
                </div>
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-version">
                        Format Version </label>
                </div>
                <div class="col-xl-2">
                    <?php
                    $version = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString != "") {
                        $version = $metadataxml->distributionInfo->MD_Distribution->distributionFormat->MD_Format->version->CharacterString;
                    }
                    ?>
                    <input class="form-control form-control-sm" type="text" name="c11_version" id="c11_version" placeholder="Format Version" value="{{ $version }}">
                </div>
            </div>
            <h6 class="heading-small text-muted mt-4">Distributor</h6>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distributor">
                        Organisation Name </label>
                </div>
                <div class="col-xl-6">
                    <?php
                    $dist = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName != "") {
                        $dist = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName;
                    }
                    ?>
                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm" placeholder="Organization Name" value="{{ $dist }}">
                </div>
            </div>
            <h6 class="heading-small text-muted mt-4">Ordering Transfer Options</h6>
                <div class="row mb-2">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-unit-distribution">
                            Units of Distribution </label>
                    </div>
                    <div class="col-xl-3">
                        <?php
                        $unitDist = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution != "") {
                            $unitDist = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution;
                        }
                        ?>
                        <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control form-control-sm" value="{{ $unitDist }}">
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-sizemb">
                            Size (Megabytes) </label>
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $size = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize != "") {
                            $size = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize;
                        }
                        ?>
                        <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm" placehorder="Size" value="{{ $size }}">
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-distributor">
                            Link </label>
                    </div>
                    <div class="col-xl-4">
                        <?php
                        $link = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage != "") {
                            $link = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage;
                        }
                        ?>
                        <input class="form-control form-control-sm" name="c11_link" id="c11_link" placeholder="Ordering Website Link" type="text" value="{{ $link }}">
                    </div>
                </div>
            <h6 class="heading-small text-muted mt-4">Medium Format</h6>
            <div class="pl-lg-3">
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-medium">
                        Medium Name</label>
                </div>
                <div class="col-xl-3">
                    <?php
                    $medium = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name != "") {
                        $medium = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name;
                    }
                    ?>
                    <select name="c11_medium" id="c11_medium" class="form-control form-control-sm">
                        <option value="cdROM" {{ ($medium=='cdROM' ? 'selected':'') }}>cdROM</option>
                        <option value="dvd" {{ ($medium=='dvd' ? 'selected':'') }}>dvd</option>
                        <option value="dvdRom" {{ ($medium=='dvdRom' ? 'selected':'') }}>dvdRom</option>
                        <option value="3halfInchFloppy" {{ ($medium=='3halfInchFloppy' ? 'selected':'') }}>3halfInchFloppy</option>
                        <option value="5quarterInchFloppy" {{ ($medium=='5quarterInchFloppy' ? 'selected':'') }}>5quarterInchFloppy</option>
                        <option value="7trackTape" {{ ($medium=='7trackTape' ? 'selected':'') }}>7trackTape</option>
                        <option value="9trackTape" {{ ($medium=='9trackTape' ? 'selected':'') }}>9trackTape</option>
                        <option value="3480Cartridge" {{ ($medium=='3480Cartridge' ? 'selected':'') }}>3480Cartridge</option>
                        <option value="3490Cartridge" {{ ($medium=='3490Cartridge' ? 'selected':'') }}>3490Cartridge</option>
                        <option value="3580Cartridge" {{ ($medium=='3580Cartridge' ? 'selected':'') }}>3580Cartridge</option>
                        <option value="4mmCartridgeTape" {{ ($medium=='4mmCartridgeTape' ? 'selected':'') }}>4mmCartridgeTape</option>
                        <option value="8mmCartridgeTape" {{ ($medium=='8mmCartridgeTape' ? 'selected':'') }}>8mmCartridgeTape</option>
                        <option value="1quaterInchCartridgeTape" {{ ($medium=='1quaterInchCartridgeTape' ? 'selected':'') }}>1quaterInchCartridgeTape</option>
                        <option value="digitalLinearTape" {{ ($medium=='digitalLinearTape' ? 'selected':'') }}>digitalLinearTape</option>
                        <option value="onLine" {{ ($medium=='onLine' ? 'selected':'') }}>onLine</option>
                        <option value="satellite" {{ ($medium=='satellite' ? 'selected':'') }}>satellite</option>
                        <option value="telephoneLink" {{ ($medium=='telephoneLink' ? 'selected':'') }}>telephoneLink</option>
                        <option value="hardcopy" {{ ($medium=='hardcopy' ? 'selected':'') }}>hardcopy</option>
                    </select>
                </div>
                <h6 class="heading-small text-muted mt-4">Distribution Order Process</h6>
                <div class="row mb-2">
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-fees">
                            Fees </label>
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $fees = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees != "") {
                            $fees = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->fees;
                        }
                        ?>
                        <input type="text" name="c11_fees" id="c11_fees" class="form-control form-control-sm" placeholder="RM 0.00" value="{{ $fees }}">
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-instructionorder">
                            Ordering Instructions </label>
                    </div>
                    <div class="col-xl-5">
                        <?php
                        $orderInstruct = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions != "") {
                            $orderInstruct = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions;
                        }
                        ?>
                        <input type="file" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm" value="{{ $orderInstruct }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
