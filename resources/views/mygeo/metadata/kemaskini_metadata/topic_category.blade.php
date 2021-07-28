<div class="card card-primary mb-4 div_c3" id="div_c3">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse3">
            <h4 class="card-title">
                <?php echo __('lang.accord_3'); ?>
                <?php
                if(isset($metadataxml->categoryTitle) && $metadataxml->categoryTitle != ""){
                    if(strtolower($metadataxml->categoryTitle) == "dataset"){
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
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory) && $metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory != "") {
                    $topic_categories =  $metadataxml->identificationInfo->SV_ServiceIdentification->topicCategory;
                    $tc = array_map('trim', explode(',', $topic_categories));
                }
                ?>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="Biota" {{ (!empty($tc) && in_array('Biota',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_1">Biota</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="Boundaries" {{ (!empty($tc) && in_array('Boundaries',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_2">Boundaries</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="Climatology Meteorology Atmosphere" {{ (!empty($tc) && in_array('Climatology Meteorology Atmosphere',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_3">Climatology Meteorology Atmosphere</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_4" name="topic_category[]" value="Disaster" {{ (!empty($tc) && in_array('Disaster',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_4">Disaster</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_5" name="topic_category[]" value="Economy" {{ (!empty($tc) && in_array('Economy',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_5">Economy</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_6" name="topic_category[]" value="Elevation" {{ (!empty($tc) && in_array('Elevation',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_6">Elevation</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_7" name="topic_category[]" value="Environment" {{ (!empty($tc) && in_array('Environment',$tc) ? "checked":"") }}>`
                        <label class="form-check-label" for="c3_7">Environment</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]" value="Farming" {{ (!empty($tc) && in_array('Farming',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_8">Farming</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_9" name="topic_category[]" value="Geoscientific Information" {{ (!empty($tc) && in_array('Geoscientific Information',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_9">Geoscientific Information</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_10" name="topic_category[]" value="Health" {{ (!empty($tc) && in_array('Health',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_10">Health</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_11" name="topic_category[]" value="Imagery Base Maps-Earth Cover" {{ (!empty($tc) && in_array('Imagery Base Maps-Earth Cover',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_11">Imagery Base Maps-Earth Cover</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_12" name="topic_category[]" value="Intelligence Military" {{ (!empty($tc) && in_array('Intelligence Military',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_12">Intelligence Military</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_13" name="topic_category[]" value="Inland Waters" {{ (!empty($tc) && in_array('Inland Waters',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_13">Inland Waters</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_14" name="topic_category[]" value="Location" {{ (!empty($tc) && in_array('Location',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_14">Location</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_15" name="topic_category[]" alue="Oceans" {{ (!empty($tc) && in_array('Oceans',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_15">Oceans</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_16" name="topic_category[]" value="Planning Cadastre" {{ (!empty($tc) && in_array('Planning Cadastre',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_16">Planning Cadastre</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_17" name="topic_category[]" value="Society" {{ (!empty($tc) && in_array('Society',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_17">Society</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_18" name="topic_category[]" value="Structure" {{ (!empty($tc) && in_array('Structure',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_18">Structure</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_19" name="topic_category[]" value="Transportation" {{ (!empty($tc) && in_array('Transportation',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_19">Transportation</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="c3_20" name="topic_category[]" value="Utilities and Communication" {{ (!empty($tc) && in_array('Utilities and Communication',$tc) ? "checked":"") }}>
                        <label class="form-check-label" for="c3_20">Utilities and Communication</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
