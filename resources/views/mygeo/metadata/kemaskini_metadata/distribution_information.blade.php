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
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distribution-format">
                        Distribution Format </label>
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
                        Version </label>
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
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-medium">
                        Medium </label>
                </div>
                <div class="col-xl-3">
                    <?php
                    $medium = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium != "") {
                        $medium = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium;
                    }
                    ?>
                    <input type="text" name="c11_medium" id="c11_medium" class="form-control form-control-sm" value="{{ $medium }}">
                    <select name="c11_medium" id="c11_medium" class="form-control form-control-sm">
                        <option value="cdROM (001)" {{ ($medium=='cdROM (001)' ? 'selected':'') }}>cdROM (001)</option>
                        <option value="dvd (002)" {{ ($medium=='dvd (002)' ? 'selected':'') }}>dvd (002)</option>
                        <option value="dvdRom (003)" {{ ($medium=='dvdRom (003)' ? 'selected':'') }}>dvdRom (003)</option>
                        <option value="3halfInchFloppy (004)" {{ ($medium=='3halfInchFloppy (004)' ? 'selected':'') }}>3halfInchFloppy (004)</option>
                        <option value="5quarterInchFloppy (005)" {{ ($medium=='5quarterInchFloppy (005)' ? 'selected':'') }}>5quarterInchFloppy (005)</option>
                        <option value="7trackTape (006)" {{ ($medium=='7trackTape (006)' ? 'selected':'') }}>7trackTape (006)</option>
                        <option value="9trackTape (007)" {{ ($medium=='9trackTape (007)' ? 'selected':'') }}>9trackTape (007)</option>
                        <option value="3480Cartridge (008)" {{ ($medium=='3480Cartridge (008)' ? 'selected':'') }}>3480Cartridge (008)</option>
                        <option value="3490Cartridge (009)" {{ ($medium=='3490Cartridge (009)' ? 'selected':'') }}>3490Cartridge (009)</option>
                        <option value="3580Cartridge (010)" {{ ($medium=='3580Cartridge (010)' ? 'selected':'') }}>3580Cartridge (010)</option>
                        <option value="4mmCartridgeTape (011)" {{ ($medium=='4mmCartridgeTape (011)' ? 'selected':'') }}>4mmCartridgeTape (011)</option>
                        <option value="8mmCartridgeTape (012)" {{ ($medium=='8mmCartridgeTape (012)' ? 'selected':'') }}>8mmCartridgeTape (012)</option>
                        <option value="1quaterInchCartridgeTape (013)" {{ ($medium=='1quaterInchCartridgeTape (013)' ? 'selected':'') }}>1quaterInchCartridgeTape (013)</option>
                        <option value="digitalLinearTape (014)" {{ ($medium=='digitalLinearTape (014)' ? 'selected':'') }}>digitalLinearTape (014)</option>
                        <option value="onLine (015)" {{ ($medium=='onLine (015)' ? 'selected':'') }}>onLine (015)</option>
                        <option value="satellite (016)" {{ ($medium=='satellite (016)' ? 'selected':'') }}>satellite (016)</option>
                        <option value="telephoneLink (017)" {{ ($medium=='telephoneLink (017)' ? 'selected':'') }}>telephoneLink (017)</option>
                        <option value="hardcopy (018)" {{ ($medium=='hardcopy (018)' ? 'selected':'') }}>hardcopy (018)</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distributor">
                        Distributor </label>
                </div>
                <div class="col-xl-6">
                    <?php
                    $dist = "";
                    if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName != "") {
                        $dist = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributorContact->CI_ResponsibleParty->organisationName;
                    }
                    ?>
                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm" value="{{ $dist }}" placeholder="Organization Name">
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
                        $unitDist = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution != "") {
                            $unitDist = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution;
                        }
                        ?>
                        <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control form-control-sm" value="{{ $unitDist }}">
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $size = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize != "") {
                            $size = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize;
                        }
                        ?>
                        <label class="form-control-label" for="input-sizemb">
                            Size (Megabytes) </label>
                    </div>
                    <div class="col-xl-2">
                        <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm" value="{{ $size }}" placehorder="Size">
                    </div>
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
                        <input type="text" name="c11_fees" id="c11_fees" placeholder="RM 0.00" value="{{ $fees }}" class="form-control form-control-sm" placeholder="RM 0.00">
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
                        <?php
                        $link = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage != "") {
                            $link = $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage;
                        }
                        ?>
                        <input type="text" name="c11_link" id="c11_link" class="form-control col-lg-3" value="{{ $link }}" placeholder="Ordering Website Link">
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $order_instruct = (isset($metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) ? $metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString : "");
                        ?>
                        <label class="form-control-label" for="input-instructionorder">
                            Ordering Instruction </label>
                    </div>
                    <div class="col-xl-5">
                        <?php
                        $orderInstruct = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions) && $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions != "") {
                            $orderInstruct = $metadataxml->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions;
                        }
                        ?>
                        <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm" value="{{ $orderInstruct }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
