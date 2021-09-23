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
                    @if ($elemenMetadata['Administrative and Political Boundaries']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]"
                                value="Administrative and Political Boundaries"
                                {{ null !== old('topic_category') && in_array('Administrative and Political Boundaries', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_2">Administrative and Political Boundaries</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Agriculture and Farming']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]"
                                value="Agriculture and Farming"
                                {{ null !== old('topic_category') && in_array('Agriculture and Farming', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_8">Agriculture and Farming</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Atmosphere and Climatic']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]"
                                value="Atmosphere and Climatic"
                                {{ null !== old('topic_category') && in_array('Atmosphere and Climatic', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_3">Atmosphere and Climatic</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Biology and Ecology']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]"
                                value="Biology and Ecology"
                                {{ null !== old('topic_category') && in_array('Biology and Ecology', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_3">Biology and Ecology</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Business and Economic']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]"
                                value="Business and Economic"
                                {{ null !== old('topic_category') && in_array('Business and Economic', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_3">Business and Economic</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Cadastral']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Cadastral"
                                {{ null !== old('topic_category') && in_array('Cadastral', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Cadastral</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Cultural, Society and Demography']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Cultural, Society and Demography"
                                {{ null !== old('topic_category') && in_array('Cultural, Society and Demography', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Cultural, Society and Demography</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Elevation and Derived Products']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Elevation and Derived Products"
                                {{ null !== old('topic_category') && in_array('Elevation and Derived Products', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Elevation and Derived Products</label>
                        </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if ($elemenMetadata['Environment and Conservation']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Environment and Conservation"
                                {{ null !== old('topic_category') && in_array('Environment and Conservation', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Environment and Conservation</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Facilities and Structures']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Facilities and Structures"
                                {{ null !== old('topic_category') && in_array('Facilities and Structures', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Facilities and Structures</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Geological and Geophysical']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Geological and Geophysical"
                                {{ null !== old('topic_category') && in_array('Geological and Geophysical', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Geological and Geophysical</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Human Health and Disease']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Human Health and Disease"
                                {{ null !== old('topic_category') && in_array('Human Health and Disease', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Human Health and Disease</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Imagery and Base Maps']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Imagery and Base Maps"
                                {{ null !== old('topic_category') && in_array('Imagery and Base Maps', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Imagery and Base Maps</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Inland Water Resources']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Inland Water Resources"
                                {{ null !== old('topic_category') && in_array('Inland Water Resources', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Inland Water Resources</label>
                        </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if ($elemenMetadata['Locations and Geodetic Networks']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Locations and Geodetic Networks"
                                {{ null !== old('topic_category') && in_array('Locations and Geodetic Networks', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Locations and Geodetic Networks</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Military']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Military"
                                {{ null !== old('topic_category') && in_array('Military', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Military</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Oceans and Estuaries']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Oceans and Estuaries"
                                {{ null !== old('topic_category') && in_array('Oceans and Estuaries', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Oceans and Estuaries</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Transportation Networks']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Transportation Networks"
                                {{ null !== old('topic_category') && in_array('Transportation Networks', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Transportation Networks</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Utilities and Communication']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="Utilities and Communication"
                                {{ null !== old('topic_category') && in_array('Utilities and Communication', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c3_1">Utilities and Communication</label>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row col-12">
                <a href="lampiran/content_information" class="text-yellow float-right" target="_blank">
                    <i class="fas fa-lightbulb"></i>
                </a>
            </div>
        </div>
    </div>
</div>
