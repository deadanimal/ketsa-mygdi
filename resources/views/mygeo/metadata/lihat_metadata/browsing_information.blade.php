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
            <h2 class="heading-small text-muted browseInfoSubtajuk1">Browsing Graphic</h2>
            <div class="my-2">
                <?php
                $flag1 = 1;
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString != "") {
                    $flag1 *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c10_file_name">
                                File Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->fileName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString != "") {
                    $flag1 *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c10_file_type">
                                File Type
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->fileType->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString != "") {
                    $flag1 *= 0;
                    ?>
                    <div class="row mb-4">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c10_file_url">
                                URL
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-7">
                            <?php echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->fileURL->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <h2 class="heading-small text-muted browseInfoSubtajuk2">Keywords</h2>
            <div class="my-2">
                <?php
                $flag2 = 1;
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString != "") {
                    $flag2 *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c10_file_name">
                                Keywords<span class="text-warning">*</span>
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->searchKeyword->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString) && trim($metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString) != "" && trim($metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString) != ",") {
                    $flag2 *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c10_file_type">
                                Additional Keywords
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-6">
                            <?php echo "&nbsp;&nbsp;" . $metadataxml->identificationInfo->SV_ServiceIdentification->searchAddtionalKeyword->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        <?php
        if($flag1 == 1){
            ?>
            $('.browseInfoSubtajuk1').hide();    
            <?php
        }else{
            ?>
            $('.browseInfoSubtajuk1').show();
            <?php
        }
        
        if($flag2 == 1){
            ?>
            $('.browseInfoSubtajuk2').hide();    
            <?php
        }else{
            ?>
            $('.browseInfoSubtajuk2').show();
            <?php
        }
        ?>
    });
</script>