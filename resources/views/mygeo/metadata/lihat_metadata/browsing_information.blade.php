<div class="card card-primary div_c10" id="div_c10">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse10">
            <h4 class="card-title">
                <?php echo __('lang.accord_10'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
        <div class="card-body">
            <h2 class="heading-small text-muted">Browsing Graphic</h2>
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name">
                            File Name
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString != "") {
                            echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString;
                        }
                        ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type">
                            File Type
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString != "") {
                            echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString;
                        }
                        ?>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_url">
                            URL
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString != "") {
                            echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <h2 class="heading-small text-muted">Keyword</h2>
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name">
                            Keyword<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString != "") {
                            echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString;
                        }
                        ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type">
                            Additional Keyword
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString != "") {
                            echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
