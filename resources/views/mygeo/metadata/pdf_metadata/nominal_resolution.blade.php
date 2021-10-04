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
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="col-xl-6">
                        <div class="form-inline ml-3">
                            <div class="form-control-label mr-3">
                                Scanning Resolution :
                            </div>
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString . "</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal != "") {
                    $flag *= 0;
                    ?>
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <div class="form-control-label mr-3">
                                Ground Scanning :
                            </div>
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal . " meter</p>"; ?>
                        </div>
                    </div>
                    <?php
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