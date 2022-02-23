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
                $tc = [];
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->topicCategory)){
                    if(count($metadataxml->identificationInfo->MD_DataIdentification->topicCategory) > 0){
                        foreach($metadataxml->identificationInfo->MD_DataIdentification->topicCategory as $tcd){
                            if(trim($tcd->MD_TopicCategoryCode) != ""){
                                $tc[]= trim($tcd->MD_TopicCategoryCode);
                            }
                        }
                    }
                }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory)){
                    if(count($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory) > 0){
                        foreach($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory as $tcd){
                            if(trim($tcd->MD_TopicCategoryCode) != ""){
                                $tc[]= trim($tcd->MD_TopicCategoryCode);
                            }
                        }
                    }
                }
                if(count($tc) > 0){
                    foreach($tc as $key=>$val){
                        if($val == "boundaries"){
                            $tc[$key] = "Administrative and Political Boundaries";
                        }elseif($val == "farming"){
                            $tc[$key] = "Agriculture and Farming";
                        }elseif($val == "climatologyMeteorologyAtmosphere"){
                            $tc[$key] = "Atmosphere and Climatic";
                        }elseif($val == "biota"){
                            $tc[$key] = "Biology and Ecology";
                        }elseif($val == "economy"){
                            $tc[$key] = "Business and Economic";
                        }elseif($val == "planningCadastre"){
                            $tc[$key] = "Cadastral";
                        }elseif($val == "society"){
                            $tc[$key] = "Cultural, Society and Demography";
                        }elseif($val == "elevation"){
                            $tc[$key] = "Elevation and Derived Products";
                        }elseif($val == "environment"){
                            $tc[$key] = "Environment and Conservation";
                        }elseif($val == "structure"){
                            $tc[$key] = "Facilities and Structures";
                        }elseif($val == "geoscientificInformation"){
                            $tc[$key] = "Geological and Geophysical";
                        }elseif($val == "health"){
                            $tc[$key] = "Human Health and Disease";
                        }elseif($val == "imageryBaseMapsEarthCover"){
                            $tc[$key] = "Imagery and Base Maps";
                        }elseif($val == "inlandWaters"){
                            $tc[$key] = "Inland Water Resources";
                        }elseif($val == "location"){
                            $tc[$key] = "Locations and Geodetic Networks";
                        }elseif($val == "intelligenceMilitary"){
                            $tc[$key] = "Military";
                        }elseif($val == "oceans"){
                            $tc[$key] = "Oceans and Estuaries";
                        }elseif($val == "transportation"){
                            $tc[$key] = "Transportation Networks";
                        }elseif($val == "utilitiesCommunication"){
                            $tc[$key] = "Utilities and Communication";
                        }
                    }
                }
                ?>
                <div class="form-group col-4">
                    @if($elemenMetadata['Administrative and Political Boundaries']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="Administrative and Political Boundaries" {{ (!empty($tc) && in_array('Administrative and Political Boundaries',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_2">Administrative and Political Boundaries</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Agriculture and Farming']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]" value="Agriculture and Farming" {{ (!empty($tc) && in_array('Agriculture and Farming',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_8">Agriculture and Farming</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Atmosphere and Climatic']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Atmosphere and Climatic" {{ (!empty($tc) && in_array('Atmosphere and Climatic',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_3">Atmosphere and Climatic</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Biology and Ecology']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Biology and Ecology" {{ (!empty($tc) && in_array('Biology and Ecology',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_3">Biology and Ecology</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Business and Economic']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Business and Economic" {{ (!empty($tc) && in_array('Business and Economic',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_3">Business and Economic</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Cadastral']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Cadastral" {{ (!empty($tc) && in_array('Cadastral',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Cadastral</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Cultural, Society and Demography']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Cultural, Society and Demography" {{ (!empty($tc) && in_array('Cultural, Society and Demography',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Cultural, Society and Demography</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Elevation and Derived Products']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Elevation and Derived Products" {{ (!empty($tc) && in_array('Elevation and Derived Products',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Elevation and Derived Products</label>
                    </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if($elemenMetadata['Environment and Conservation']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Environment and Conservation" {{ (!empty($tc) && in_array('Environment and Conservation',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Environment and Conservation</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Facilities and Structures']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Facilities and Structures" {{ (!empty($tc) && in_array('Facilities and Structures',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Facilities and Structures</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Geological and Geophysical']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Geological and Geophysical" {{ (!empty($tc) && in_array('Geological and Geophysical',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Geological and Geophysical</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Human Health and Disease']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Human Health and Disease" {{ (!empty($tc) && in_array('Human Health and Disease',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Human Health and Disease</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Imagery and Base Maps']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Imagery and Base Maps" {{ (!empty($tc) && in_array('Imagery and Base Maps',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Imagery and Base Maps</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Inland Water Resources']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Inland Water Resources" {{ (!empty($tc) && in_array('Inland Water Resources',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Inland Water Resources</label>
                    </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if($elemenMetadata['Locations and Geodetic Networks']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Locations and Geodetic Networks" {{ (!empty($tc) && in_array('Locations and Geodetic Networks',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Locations and Geodetic Networks</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Military']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Military" {{ (!empty($tc) && in_array('Military',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Military</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Oceans and Estuaries']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Oceans and Estuaries" {{ (!empty($tc) && in_array('Oceans and Estuaries',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Oceans and Estuaries</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Transportation Networks']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Transportation Networks" {{ (!empty($tc) && in_array('Transportation Networks',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Transportation Networks</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Utilities and Communication']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Utilities and Communication" {{ (!empty($tc) && in_array('Utilities and Communication',$tc) ? "checked":"") }} disabled>
                        <label class="form-check-label" for="c3_1">Utilities and Communication</label>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
