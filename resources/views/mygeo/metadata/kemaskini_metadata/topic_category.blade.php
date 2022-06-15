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
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal3">Catatan</button>
        @endif
    </div>
    <div id="collapse3" class="panel-collapse collapse in show" data-parent="#div_c3">
        <div class="card-body">
            <div class="row pl-lg-4 mt-4"> 
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
                ?>
                <div class="form-group col-4">
                    @if($elemenMetadata['Administrative and Political Boundaries']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="boundaries" {{ (!empty($tc) && in_array('boundaries',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_2">Administrative and Political Boundaries</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Agriculture and Farming']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]" value="farming" {{ (!empty($tc) && in_array('farming',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_8">Agriculture and Farming</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Atmosphere and Climatic']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="climatologyMeteorologyAtmosphere" {{ (!empty($tc) && in_array('climatologyMeteorologyAtmosphere',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Atmosphere and Climatic</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Biology and Ecology']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="biota" {{ (!empty($tc) && in_array('biota',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Biology and Ecology</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Business and Economic']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="economy" {{ (!empty($tc) && in_array('economy',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Business and Economic</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Cadastral']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="planningCadastre" {{ (!empty($tc) && in_array('planningCadastre',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Cadastral</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Cultural, Society and Demography']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="society" {{ (!empty($tc) && in_array('society',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Cultural, Society and Demography</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Elevation and Derived Products']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="elevation" {{ (!empty($tc) && in_array('elevation',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Elevation and Derived Products</label>
                    </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if($elemenMetadata['Environment and Conservation']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="environment" {{ (!empty($tc) && in_array('environment',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Environment and Conservation</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Facilities and Structures']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="structure" {{ (!empty($tc) && in_array('structure',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Facilities and Structures</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Geological and Geophysical']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="geoscientificInformation" {{ (!empty($tc) && in_array('geoscientificInformation',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Geological and Geophysical</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Human Health and Disease']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="health" {{ (!empty($tc) && in_array('health',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Human Health and Disease</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Imagery and Base Maps']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="imageryBaseMapsEarthCover" {{ (!empty($tc) && in_array('imageryBaseMapsEarthCover',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Imagery and Base Maps</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Inland Water Resources']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="inlandWaters" {{ (!empty($tc) && in_array('inlandWaters',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Inland Water Resources</label>
                    </div>
                    @endif
                </div>
                <div class="form-group col-4">
                    @if($elemenMetadata['Locations and Geodetic Networks']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="location" {{ (!empty($tc) && in_array('location',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Locations and Geodetic Networks</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Military']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="intelligenceMilitary" {{ (!empty($tc) && in_array('intelligenceMilitary',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Military</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Oceans and Estuaries']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="oceans" {{ (!empty($tc) && in_array('oceans',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Oceans and Estuaries</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Transportation Networks']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="transportation" {{ (!empty($tc) && in_array('transportation',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Transportation Networks</label>
                    </div>
                    @endif
                    @if($elemenMetadata['Utilities and Communication']->status == '1')
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="utilitiesCommunication" {{ (!empty($tc) && in_array('utilitiesCommunication',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Utilities and Communication</label>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
