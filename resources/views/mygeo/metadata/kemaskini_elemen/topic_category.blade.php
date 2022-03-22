<div class="card card-primary mb-4 div_c3" id="div_c3">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse3">
            <h4 class="card-title">
                <?php echo __('lang.accord_3'); ?>
                <?php
                if (isset($metadataxml->categoryTitle->categoryItem->CharacterString) && $metadataxml->categoryTitle->categoryItem->CharacterString != "") {
                    if (strtolower($metadataxml->categoryTitle->categoryItem->CharacterString) == "dataset") {
                        ?><span class="text-warning">*</span><?php
                    }
                }
                ?>
                <span class="text-warning">*</span>
            </h4>
        </a>
    </div>
    <div id="collapse3" class="panel-collapse collapse in show" data-parent="#div_c3">
        <div class="card-body">
            <div class="row col-12">
                <a href="lampiran/content_information" class="text-yellow float-right" target="_blank">
                    <i class="fas fa-lightbulb"></i>
                </a>
            </div>
            <div class="row pl-lg-4 mt-4">
                <div class="form-group col-4">
                    <?php
                    $topic_category = $template->template[strtolower($_GET['kategori'])]['accordion3'];
                    if(isset($topic_category) && count($topic_category) > 0){
                        $counter = 1;
                        foreach($topic_category as $tc){
                            if($tc['status'] == "active"){
                                ?>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="{{ $tc['label_bm'] }}">
                                    <label class="form-check-label" for="c3_2">{{ $tc['label_bm'] }}</label>
                                </div>    
                                <?php
                                if($counter % 8 == 0){
                                    ?></div><div class="form-group col-4"><?php
                                }
                                $counter++;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
