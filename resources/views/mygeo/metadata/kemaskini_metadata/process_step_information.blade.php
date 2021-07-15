<div class="card card-primary div_c5" id="div_c5">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse5">
            <h4 class="card-title">
                <?php echo __('lang.accord_5'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal5">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal5">Catatan</button>
        @endif
    </div>
    <div id="collapse5" class="panel-collapse collapse" data-parent="#div_c5">
        <div class="card-body">
            <div class="form-group row">
                Process Level:
                <?php
                $processLevel = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString != ""){
                    $processLevel = $metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString;
                }
                ?>
                <input type="text" name="c5_process_lvl" id="c5_process_lvl" class="form-control col-lg-4" value="{{ $processLevel }}"> 
                &nbsp;&nbsp;&nbsp;
                Resolution:
                <?php
                $res = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal != ""){
                    $res = $metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal;
                }
                ?>
                <input type="text" name="c5_resolution" id="c5_resolution" class="form-control col-lg-4" value="{{ $res }}"> meter
            </div>
        </div>
    </div>
</div>