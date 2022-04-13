<?php $flag = 1; ?>
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
                foreach($template->template[strtolower($catSelected)]['accordion10'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ (isset($metadataxml->customInputs->accordion10->$key) ? $metadataxml->customInputs->accordion10->$key:"") }}
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c10_file_name"){
                        $fileName = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString != "") {
                            $fileName = $metadataxml->identificationInfo->MD_DataIdentification->fileName->CharacterString;
                        }
                        if($fileName != ""){
                            $flag1 *= 0;
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c10_file_name">
                                        File Name
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo "&nbsp;&nbsp;" . $fileName; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c10_file_type"){
                        $fileType = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString != "") {
                            $fileType = $metadataxml->identificationInfo->MD_DataIdentification->fileType->CharacterString;
                        }
                        if($fileType != ""){
                            $flag1 *= 0;
                            $flag *= 0;
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c10_file_type">
                                        File Type
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo "&nbsp;&nbsp;" . $fileType; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c10_file_url"){
                        $url = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString != "") {
                            $url = $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString;
                        }
                        if($url != ""){
                            $flag1 *= 0;
                            $flag *= 0;
                            ?>
                            <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="c10_file_url">
                                        URL
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-7">
                                    <?php echo "&nbsp;&nbsp;" . $url; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <h2 class="heading-small text-muted browseInfoSubtajuk2">Keywords</h2>
                <?php
                $flag2 = 1;
                $counter = 0;
                
                foreach($template->template[strtolower($catSelected)]['accordion10'] as $key=>$val){
                    if($key == "c10_keyword"){
                        $counter = 0; //dd(isset($metadataxml->identificationInfo->MD_DataIdentification->descriptiveKeywords->MD_Keywords));
                        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim((string)$keyword->CharacterString) != ""){
                                    if($counter == 0){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_url">
                                                    Keyword
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <?php echo "&nbsp;&nbsp;" . ucwords((string)$keyword->CharacterString); ?>
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
                                    if($counter == 0){ //first keyword is for input Keyword. others are Additional Keywords
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_url">
                                                    Keyword
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <?php echo "&nbsp;&nbsp;" . ucwords((string)$keyword->CharacterString); ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $counter++;
                                }
                            } 
                        }
                    }
                    if($key == "c10_additional_keyword[]"){ //============================
                        $counter = 0;
                        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords)){
                            foreach($metadataxml->identificationInfo->SV_ServiceIdentification->descriptiveKeywords->MD_Keywords->keyword as $keyword){
                                if(trim((string)$keyword->CharacterString) != ""){
                                    if($counter > 0){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_type">
                                                    Additional Keywords
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <?php echo "&nbsp;&nbsp;" . ucwords((string)$keyword->CharacterString); ?>
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
                                    if($counter > 0){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-3 pl-5">
                                                <label class="form-control-label mr-4" for="c10_file_type">
                                                    Additional Keywords
                                                </label><label class="float-right">:</label>
                                            </div>
                                            <div class="col-6">
                                                <?php echo "&nbsp;&nbsp;" . ucwords((string)$keyword->CharacterString); ?>
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

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c10').hide();
        });
    </script>
    <?php
}
?>
