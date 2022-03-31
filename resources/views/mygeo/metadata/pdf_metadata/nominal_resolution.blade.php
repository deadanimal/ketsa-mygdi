<?php $flag = 1; ?>
<div class="card card-primary div_c4" id="div_c4">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse4">
            <h4 class="card-title">
                <?php echo __('lang.accord_4'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion4'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ (isset($metadataxml->customInputs->accordion4->$key) ? $metadataxml->customInputs->accordion4->$key:"") }}
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c4_scan_res"){
                        $scanRes = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString != "") {
                            $scanRes = $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString;
                        }
                        if($scanRes != ""){
                            $flag *= 0;
                            ?>
                            <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="form-inline ml-3">
                                    <div class="form-control-label mr-3">
                                        Scanning Resolution :
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $scanRes . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c4_ground_scan"){
                        $groundScan = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal != "") {
                            $groundScan = $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal;
                        }
                        if($groundScan != ""){
                            $flag *= 0;
                            ?>
                            <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Ground Scanning :
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $groundScan . " meter</p>"; ?>
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
            $('#div_c4').hide();
        });
    </script>
        <?php
}
?>
