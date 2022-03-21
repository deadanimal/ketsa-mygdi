<?php $flag = 1; ?>
<div class="card card-primary div_c6" id="div_c6">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse6">
            <h4 class="card-title">
                <?php echo __('lang.accord_6'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion6'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $metadataxml->customInputs->accordion6->$key }}
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c6_collection_name"){
                        $colName = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString != "") {
                            $colName = $metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString;
                        }
                        if($colName != ""){
                            $flag *= 0;
                            ?>
                            <div class="col-xl-7" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="form-inline ml-3">
                                    <div class="form-control-label mr-3">
                                        Collection Name
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $colName . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c6_collection_id"){
                        $collId = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString != "") {
                            $collId = $metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString;
                        }
                        if($collId != ""){
                            $flag *= 0;
                            ?>
                            <div class="col-xl-5" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Collection Identification
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $collId . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c6').hide();
        });
    </script>
        <?php
}
?>