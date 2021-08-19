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
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory) && trim($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory) != ""){
                    $topic_categories =  $metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory;
                    $tc = explode('|',$topic_categories);
                    if(count($tc) > 0){
                        foreach($tc as $t){
                            ?>
                            <div class="p-2 bd-highlight">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="topic_category[]" checked=""checked" disabled>
                                    <label class="form-check-label" for="c3_1"><?php echo $t; ?></label>
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
