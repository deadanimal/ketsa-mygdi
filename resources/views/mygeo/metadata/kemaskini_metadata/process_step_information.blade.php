<div class="card card-primary mb-4 div_c5" id="div_c5">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse5">
            <h4 class="card-title">
                <?php echo __('lang.accord_5'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal5">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal5">Catatan</button>
        @endif
    </div>
    <div id="collapse5" class="panel-collapse collapse in show" data-parent="#div_c5">
        <div class="card-body">
            <div class="row">
                @if($elemenMetadata['c5_process_lvl']->status == '1')
                <div class="col-xl-6">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3">
                            Process Level
                        </div>
                        <?php
                        $processLevel = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString != "") {
                            $processLevel = $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString;
                        }
                        ?>
                        <input type="text" name="c5_process_lvl" id="c5_process_lvl" class="form-control form-control-sm" value="{{ $processLevel }}" style="width :120pxpx" placeholder="Insert Process Level">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c5_resolution']->status == '1')
                <div class="col-xl-6">
                    <div class="form-inline">
                        <div class="form-control-label mr-3">
                            Resolution
                        </div>
                        <?php
                        $res = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal != "") {
                            $res = $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal;
                        }
                        ?>
                        <input type="text" name="c5_resolution" id="c5_resolution" class="form-control form-control-sm" value="{{ $res }}" style="width :100px" placeholder="0.0">
                        <div class="form-control-label ml-2">
                            meter
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
