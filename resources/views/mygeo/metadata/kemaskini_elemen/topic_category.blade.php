<div class="card card-primary mb-4 div_c3" id="div_c3">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse3">
            <h4 class="card-title">
                <?php echo __('lang.accord_3'); ?>
                <?php
                if(isset($metadataxml->categoryTitle->categoryItem->CharacterString) && $metadataxml->categoryTitle->categoryItem->CharacterString != ""){
                    if(strtolower($metadataxml->categoryTitle->categoryItem->CharacterString) == "dataset"){
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
            <div class="row pl-lg-4 mt-4">
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="Administrative and Political Boundaries">
                        <label class="form-check-label" for="c3_2">Administrative and Political Boundaries</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]" value="Agriculture and Farming">
                        <label class="form-check-label" for="c3_8">Agriculture and Farming</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Atmosphere and Climatic">
                        <label class="form-check-label" for="c3_3">Atmosphere and Climatic</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Biology and Ecology">
                        <label class="form-check-label" for="c3_3">Biology and Ecology</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Business and Economic">
                        <label class="form-check-label" for="c3_3">Business and Economic</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Cadastral">
                        <label class="form-check-label" for="c3_1">Cadastral</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Cultural, Society and Demography">
                        <label class="form-check-label" for="c3_1">Cultural, Society and Demography</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Elevation and Derived Products">
                        <label class="form-check-label" for="c3_1">Elevation and Derived Products</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Environment and Conservation">
                        <label class="form-check-label" for="c3_1">Environment and Conservation</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Facilities and Structures">
                        <label class="form-check-label" for="c3_1">Facilities and Structures</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Geological and Geophysical">
                        <label class="form-check-label" for="c3_1">Geological and Geophysical</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Human Health and Disease">
                        <label class="form-check-label" for="c3_1">Human Health and Disease</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Imagery and Base Maps">
                        <label class="form-check-label" for="c3_1">Imagery and Base Maps</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Inland Water Resources">
                        <label class="form-check-label" for="c3_1">Inland Water Resources</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Locations and Geodetic Networks">
                        <label class="form-check-label" for="c3_1">Locations and Geodetic Networks</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Military">
                        <label class="form-check-label" for="c3_1">Military</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Oceans and Estuaries">
                        <label class="form-check-label" for="c3_1">Oceans and Estuaries</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Transportation Networks">
                        <label class="form-check-label" for="c3_1">Transportation Networks</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Utilities and Communication">
                        <label class="form-check-label" for="c3_1">Utilities and Communication</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
