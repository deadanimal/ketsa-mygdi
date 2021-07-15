<div class="card card-primary div_c10" id="div_c10">
    <div class="card-header ftest">
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
            <div class="form-group row">
                <b>Browsing Graphic</b>
                <table style="width:100%;">
                    <tr>
                        <td>File Name:</td>
                        <td>
                            <?php
                            $fileName = "";
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString != ""){
                                $fileName = $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString;
                            }
                            ?>
                            <input type="text" name="c10_file_name" id="c10_file_name" class="form-control col-lg-4" value="{{ $fileName }}">
                        </td>
                    </tr>
                    <tr>
                        <td>File Type:</td>
                        <td>
                            <?php
                            $fileType = "";
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString != ""){
                                $fileType = $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString;
                            }
                            ?>
                            <input type="text" name="c10_file_type" id="c10_file_type" class="form-control col-lg-4" value="{{ $fileType }}">
                        </td>
                    </tr>
                    <tr>
                        <td>URL:</td>
                        <td>
                            <?php
                            $url = "";
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString != ""){
                                $url = $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString;
                            }
                            ?>
                            <input type="text" name="c10_file_url" id="c10_file_url" class="form-control col-lg-4" value="{{ $url }}">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group row">
                <b>Keyword</b>
                <table style="width:100%;">
                    <tr>
                        <td>Keyword<span class="required">*</span>:</td>
                        <td>
                            <?php
                            $keyword = "";
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString != ""){
                                $keyword = $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString;
                            }
                            ?>
                            <input type="text" name="c10_keyword" id="c10_keyword" class="form-control col-lg-4" value="{{ $keyword }}">
                            @error('c10_keyword')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    
                    <?php
                    $addKeyword = "";
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString != ""){
                        $addKeyword = $metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString;
                        $addKeyword = explode(',',$addKeyword);
                        if(count($addKeyword) > 0){
                            foreach($addKeyword as $ak){
                                ?>
                                <tr>
                                    <td>Additional Keyword:</td>
                                    <td>
                                        <input type="text" name="c10_additional_keyword[]" class="form-control col-lg-4" value="{{ $ak }}">
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>