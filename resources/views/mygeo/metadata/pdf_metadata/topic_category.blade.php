<div class="card card-primary div_c3" id="div_c3">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse3">
            <h4 class="card-title">
                <?php echo __('lang.accord_3'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse3" class="panel-collapse collapse in show" data-parent="#div_c3">
        <div class="card-body">
            <div class="d-flex flex-wrap bd-highlight">
                <?php
                $flag = 1;
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->topicCategory) && trim($metadataxml->identificationInfo->MD_DataIdentification->topicCategory->MD_TopicCategoryCode) != ""){
                    foreach($metadataxml->identificationInfo->MD_DataIdentification->topicCategory as $tc){
                        if(trim($tc->MD_TopicCategoryCode) != ""){
                            $flag *= 0;
                            ?>
                            <div class="p-2 bd-highlight">
                                <div class="form-check">
                                    <label class="form-check-label" for="c3_1"><?php echo $tc->MD_TopicCategoryCode; ?></label>
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
            $('#div_c3').hide();
        });
    </script>
        <?php
}
?>
