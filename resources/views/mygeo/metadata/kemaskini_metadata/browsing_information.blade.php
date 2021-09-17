<div class="card card-primary mb-4 div_c10" id="div_c10">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse10">
            <h4 class="card-title">
                <?php echo __('lang.accord_10'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal10">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal10">Catatan</button>
        @endif
    </div>
    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
        <div class="card-body">
            <h2 class="heading-small text-muted">Browsing Graphic</h2>
            <div class="my-2">
                @if($elemenMetadata['c10_file_name']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name">
                            File Name
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $fileName = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString != "") {
                            $fileName = $metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString;
                        }
                        ?>
                        <input type="text" name="c10_file_name" id="c10_file_name" class="form-control from-control-sm ml-3" value="{{ $fileName }}">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_file_type']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type">
                            File Type
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $fileType = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString != "") {
                            $fileType = $metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString;
                        }
                        ?>
                        <input type="text" name="c10_file_type" id="c10_file_type" class="form-control form-control-sm ml-3" value="{{ $fileType }}">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_file_url']->status == '1')
                <div class="row mb-2 divBrowsingInformationUrl">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_url" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">
                            <?php echo __('lang.URL'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $url = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString != "") {
                            $url = $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString;
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
                @endif
            </div>
            <h2 class="heading-small text-muted">Keywords</h2>
            <div class="my-2">
                @if($elemenMetadata['c10_keyword']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name">
                            Keywords<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $counter = 0;
                        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim($keyword->CharacterString) != ""){
                                    if($counter == 0){
                                        ?>
                                        <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3" value="{{ $keyword->CharacterString }}">
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
                                if(trim($keyword->CharacterString) != ""){
                                    if($counter == 0){
                                        ?>
                                        <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3" value="{{ $keyword->CharacterString }}">
                                        @error('c10_keyword')
                                        <div class="text-error">{{ $message }}</div>
                                        @enderror
                                        <?php
                                    }
                                    $counter++;
                                }
                            } 
                        }
                        }
                        ?>
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_additional_keyword[]']->status == '1')
                <?php
                $counter = 0;
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                    foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                        if(trim($keyword->CharacterString) != ""){
                            if($counter == 0){
                                ?>
                                <div class="row mb-2">
                                    <div class="col-3 pl-5">
                                        <label class="form-control-label mr-4" for="c10_file_type">
                                            Additional Keywords
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3" value="{{ $keyword->CharacterString }}">
                                    </div>
                                </div>
                                <?php
                            }
                            $counter++;
                        }
                    }
                }elseif(isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords)){
                    foreach($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                        if(trim($keyword->CharacterString) != ""){
                            if($counter == 0){
                                ?>
                                <div class="row mb-2">
                                    <div class="col-3 pl-5">
                                        <label class="form-control-label mr-4" for="c10_file_type">
                                            Additional Keywords
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3" value="{{ $keyword->CharacterString }}">
                                    </div>
                                </div>
                                <?php
                            }
                            $counter++;
                        }
                    }
                }
                }
                ?>
                @endif
            </div>
        </div>
    </div>
</div>
