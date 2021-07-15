<div class="card card-primary div_c10" id="div_c10">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse10">
            <h4 class="card-title">
                <?php echo __('lang.accord_10'); ?>
            </h4>
        </a>
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
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString != ""){
                                echo "&nbsp;&nbsp;".$metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>File Type:</td>
                        <td>
                            <?php
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString != ""){
                                echo "&nbsp;&nbsp;".$metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>URL:</td>
                        <td>
                            <?php
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString != ""){
                                echo "&nbsp;&nbsp;".$metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group row">
                <b>Keyword</b>
                <table style="width:100%;">
                    <tr>
                        <td>Keyword:</td>
                        <td>
                            <?php
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString != ""){
                                echo "&nbsp;&nbsp;".$metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Additional Keyword:</td>
                        <td>
                            <?php
                            if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString != ""){
                                echo "&nbsp;&nbsp;".$metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>