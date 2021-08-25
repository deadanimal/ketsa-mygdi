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
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal3">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal3">Catatan</button>
        @endif
    </div>
    <div id="collapse3" class="panel-collapse collapse in show" data-parent="#div_c3">
        <div class="card-body">
            <div class="row pl-lg-4 mt-4"> 
                <?php
                $tc = [];
                foreach($metadataxml->identificationInfo->MD_DataIdentification->topicCategory as $tcd){
                    if(trim($tcd->MD_TopicCategoryCode) != ""){
                        $tc[]= trim($tcd->MD_TopicCategoryCode);
                    }
                }
                ?>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="Administrative and Political Boundaries" {{ (!empty($tc) && in_array('Administrative and Political Boundaries',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_2">Administrative and Political Boundaries</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]" value="Agriculture and Farming" {{ (!empty($tc) && in_array('Agriculture and Farming',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_8">Agriculture and Farming</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Atmosphere and Climatic" {{ (!empty($tc) && in_array('Atmosphere and Climatic',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Atmosphere and Climatic</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Biology and Ecology" {{ (!empty($tc) && in_array('Biology and Ecology',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Biology and Ecology</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Business and Economic" {{ (!empty($tc) && in_array('Business and Economic',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Business and Economic</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Cadastral" {{ (!empty($tc) && in_array('Cadastral',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Cadastral</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Cultural, Society and Demography" {{ (!empty($tc) && in_array('Cultural, Society and Demography',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Cultural, Society and Demography</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Elevation and Derived Products" {{ (!empty($tc) && in_array('Elevation and Derived Products',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Elevation and Derived Products</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Environment and Conservation" {{ (!empty($tc) && in_array('Environment and Conservation',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Environment and Conservation</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Facilities and Structures" {{ (!empty($tc) && in_array('Facilities and Structures',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Facilities and Structures</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Geological and Geophysical" {{ (!empty($tc) && in_array('Geological and Geophysical',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Geological and Geophysical</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Human Health and Disease" {{ (!empty($tc) && in_array('Human Health and Disease',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Human Health and Disease</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Imagery and Base Maps" {{ (!empty($tc) && in_array('Imagery and Base Maps',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Imagery and Base Maps</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Inland Water Resources" {{ (!empty($tc) && in_array('Inland Water Resources',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Inland Water Resources</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Locations and Geodetic Networks" {{ (!empty($tc) && in_array('Locations and Geodetic Networks',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Locations and Geodetic Networks</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Military" {{ (!empty($tc) && in_array('Military',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Military</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Oceans and Estuaries" {{ (!empty($tc) && in_array('Oceans and Estuaries',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Oceans and Estuaries</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Transportation Networks" {{ (!empty($tc) && in_array('Transportation Networks',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Transportation Networks</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Utilities and Communication" {{ (!empty($tc) && in_array('Utilities and Communication',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Utilities and Communication</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
