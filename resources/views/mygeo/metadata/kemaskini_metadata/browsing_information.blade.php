<div class="card card-primary mb-4 div_c10" id="div_c10">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse10">
            <h4 class="card-title">
                <?php echo __('lang.accord_10'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal10">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal10">Catatan</button>
        @endif
    </div>
    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
        <div class="card-body">
            <?php
            foreach($template->template[strtolower($catSelected)]['accordion10'] as $key=>$val){
                if($val['status'] == "customInput"){
                    ?>
                    <div class="row mb-2 sortIt">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                            <label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ (isset($metadataxml->customInputs->accordion10->$key) ? $metadataxml->customInputs->accordion10->$key:"") }}"/>
                        </div>
                    </div>
                    <?php
                }
                if($key == "file_contohJenisMetadata"){
                    ?>
                    <div class="row mb-2" id="div_contohJenisMetadata" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-3">
                            <label class="form-control-label mr-4" for="file_contohJenisMetadata">
                                <?php echo __('lang.sampleData'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                            </label>
                        </div>
                        <div class="col-8">
                            <?php
                            if($metadataSearched->file_contohjenismetadata != ""){
                                ?>
                                <div class="row">
                                    <button type="button" class="btn btn-sm btn-default btn_file_contohjenismetadata" data-href='{{ url('download_file_contohjenismetadata').'/'.$metadataSearched->id }}'>Muat Turun</button>
                                </div>
                                <br>
                                <?php
                            }
                            ?>
                            <div class="row">
                                <input class="form-control ml-3" id="file_contohJenisMetadata" type="file" name="file_contohJenisMetadata" />
                                <span style="font-size: smaller;color:#ffc107;">* Upload Format: PDF, Max 10MB</span>
                            </div>
                            <p class="error-message"><span></span></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            
            <h2 class="heading-small text-muted"><?php echo __('lang.browsingGraphic'); ?></h2>
            
            <div class="my-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion10'] as $key=>$val){
                    if($key == "c10_file_name"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c10_file_name">
                                    <?php echo __('lang.file_name'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $fileName = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileName->CharacterString != "") {
                                    $fileName = $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileName->CharacterString;
                                }
                                ?>
                                <input type="text" name="c10_file_name" id="c10_file_name" class="form-control from-control-sm ml-3" value="{{ $fileName }}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c10_state"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c10_state">
                                    <?php echo __('lang.c10_state'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $state = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileState->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileState->CharacterString != "") {
                                    $state = $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileState->CharacterString;
                                }
                                ?>
                                <input type="text" name="c10_state" id="c10_state" class="form-control from-control-sm ml-3" value="{{ $state }}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c10_file_type"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c10_file_type">
                                    <?php echo __('lang.file_type'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $fileType = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileType->CharacterString != "") {
                                    $fileType = $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileType->CharacterString;
                                }
                                ?>
                                <input type="text" name="c10_file_type" id="c10_file_type" class="form-control form-control-sm ml-3" value="{{ $fileType }}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c10_file_url"){
                        ?>
                        <div class="row mb-2 divBrowsingInformationUrl" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c10_file_url" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">
                                    <?php echo __('lang.URL'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-6">
                                <?php
                                $url = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileURL->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileURL->CharacterString != "") {
                                    $url = $metadataxml->identificationInfo->MD_DataIdentification->graphicOverview->MD_BrowseGraphic->fileURL->CharacterString;
                                }
                                ?>
                                <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputBrowsingInformationUrl urlToTest" value="{{ $url }}">
                            </div>
                            <div class="col-1">
                                <button class="btn btn-sm btn-success btnTestUrl" type="button" data-toggle="modal" data-target="#modal-showweb" data-backdrop="false">Test</button>
                                @error('c10_file_url')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <h2 class="heading-small text-muted"><?php echo __('lang.keywords'); ?></h2>
            <div class="my-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion10'] as $key=>$val){
                    if($key == "c10_keyword"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c10_file_name">
                                    <?php echo __('lang.keywords'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-6">
                                <?php
                                $counter = 0; //dd(isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords));
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                                    foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                        if(trim((string)$keyword->CharacterString) != ""){
                                            if($counter == 0){
                                                ?>
                                                <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3" value="{{ ucwords((string)$keyword->CharacterString) }}">
                                                @error('c10_keyword')
                                                <div class="text-error">{{ $message }}</div>
                                                @enderror
                                                <?php
                                            }
                                            $counter++;
                                        }
                                    }
                                }elseif(isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords)){
                                   foreach($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                        if(trim((string)$keyword->CharacterString) != ""){
                                            if($counter == 0){ //first keyword is for input Keyword. others are Additional Keywords
                                                ?>
                                                <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3" value="{{ ucwords((string)$keyword->CharacterString) }}">
                                                @error('c10_keyword')
                                                <div class="text-error">{{ $message }}</div>
                                                @enderror
                                                <?php
                                            }
                                            $counter++;
                                        }
                                    } 
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c10_additional_keyword1"){ //============================
                        $counter = 0;
                        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim((string)$keyword->CharacterString) != ""){
                                    if($counter == 1){
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_type">
                                                    <?php echo __('lang.additional_keywords'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="c10_additional_keyword1" class="form-control form-control-sm ml-3" value="{{ ucwords((string)$keyword->CharacterString) }}">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $counter++;
                                }
                            }
                        }elseif(isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim((string)$keyword->CharacterString) != ""){
                                    if($counter == 1){
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_type">
                                                    <?php echo __('lang.additional_keywords'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="c10_additional_keyword1" class="form-control form-control-sm ml-3" value="{{ ucwords((string)$keyword->CharacterString) }}">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $counter++;
                                }
                            }
                        }
                    }
                    if($key == "c10_additional_keyword2"){ //============================
                        $counter = 0;
                        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim((string)$keyword->CharacterString) != ""){
                                    if($counter == 2){
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_type">
                                                    <?php echo __('lang.additional_keywords'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="c10_additional_keyword2" class="form-control form-control-sm ml-3" value="{{ ucwords((string)$keyword->CharacterString) }}">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $counter++;
                                }
                            }
                        }elseif(isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim((string)$keyword->CharacterString) != ""){
                                    if($counter == 2){
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_type">
                                                    <?php echo __('lang.additional_keywords'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="c10_additional_keyword2" class="form-control form-control-sm ml-3" value="{{ ucwords((string)$keyword->CharacterString) }}">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $counter++;
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
