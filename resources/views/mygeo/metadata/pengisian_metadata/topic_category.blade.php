<div class="card card-primary mb-4 div_c3" id="div_c3">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <a data-toggle="collapse" href="#collapse3">
            <h4 class="card-title" style="font-weight: 600 !important;color: black;">
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
                                value="boundaries"
                                {{ null !== old('topic_category') && in_array('Administrative and Political Boundaries', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_2">Administrative and Political Boundaries</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Agriculture and Farming']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]"
                                value="farming"
                                {{ null !== old('topic_category') && in_array('Agriculture and Farming', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_8">Agriculture and Farming</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Atmosphere and Climatic']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]"
                                value="climatologyMeteorologyAtmosphere"
                                {{ null !== old('topic_category') && in_array('Atmosphere and Climatic', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_3">Atmosphere and Climatic</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Biology and Ecology']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]"
                                value="biota"
                                {{ null !== old('topic_category') && in_array('Biology and Ecology', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_3">Biology and Ecology</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Business and Economic']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]"
                                value="economy"
                                {{ null !== old('topic_category') && in_array('Business and Economic', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_3">Business and Economic</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Cadastral']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="planningCadastre"
                                {{ null !== old('topic_category') && in_array('Cadastral', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Cadastral</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Cultural, Society and Demography']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="society"
                                {{ null !== old('topic_category') && in_array('Cultural, Society and Demography', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Cultural, Society and Demography</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Elevation and Derived Products']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="elevation"
                                {{ null !== old('topic_category') && in_array('Elevation and Derived Products', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Elevation and Derived Products</label>
                        </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if ($elemenMetadata['Environment and Conservation']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="environment"
                                {{ null !== old('topic_category') && in_array('Environment and Conservation', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Environment and Conservation</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Facilities and Structures']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="structure"
                                {{ null !== old('topic_category') && in_array('Facilities and Structures', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Facilities and Structures</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Geological and Geophysical']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="geoscientificInformation"
                                {{ null !== old('topic_category') && in_array('Geological and Geophysical', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Geological and Geophysical</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Human Health and Disease']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="health"
                                {{ null !== old('topic_category') && in_array('Human Health and Disease', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Human Health and Disease</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Imagery and Base Maps']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="imageryBaseMapsEarthCover"
                                {{ null !== old('topic_category') && in_array('Imagery and Base Maps', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Imagery and Base Maps</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Inland Water Resources']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="inlandWaters"
                                {{ null !== old('topic_category') && in_array('Inland Water Resources', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Inland Water Resources</label>
                        </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if ($elemenMetadata['Locations and Geodetic Networks']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="location"
                                {{ null !== old('topic_category') && in_array('Locations and Geodetic Networks', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Locations and Geodetic Networks</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Military']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="intelligenceMilitary"
                                {{ null !== old('topic_category') && in_array('Military', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Military</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Oceans and Estuaries']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="oceans"
                                {{ null !== old('topic_category') && in_array('Oceans and Estuaries', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Oceans and Estuaries</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Transportation Networks']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="transportation"
                                {{ null !== old('topic_category') && in_array('Transportation Networks', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Transportation Networks</label>
                        </div>
                    @endif
                    @if ($elemenMetadata['Utilities and Communication']->status == '1')
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]"
                                value="utilitiesCommunication"
                                {{ null !== old('topic_category') && in_array('Utilities and Communication', old('topic_category')) ? 'checked' : '' }}>
                            <label class="form-control-label mr-4" for="c3_1">Utilities and Communication</label>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row col-12">
                <a href="#" class="text-yellow" data-toggle="modal" data-target="#topic_category">
                    <i class="fas fa-lightbulb mx-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
