<div class="card card-primary mb-4 div_c12" id="div_c12">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse12">
                <?php echo __('lang.accord_12'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse12" class="panel-collapse collapse in show" data-parent="#div_c12">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <div class="row mb-4">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-dataset-type">
                            Spatial Data Set Type
                        </label>
                    </div>
                    <div class="col-xl-3">
                        <select class="form-control form-control-sm" id="c12_dataset_type" name="c12_dataset_type">
                            <option selected disabled hidden> Select Type </option>
                            <option value="Grid" {{(old('c12_dataset_type') == 'grid' ? "selected":"")}}>Grid</option>
                            <option value="Stereo Model" {{(old('c12_dataset_type') == 'stereo_model' ? "selected":"")}}>Stereo Model</option>
                            <option value="Text Table" {{(old('c12_dataset_type') == 'text_table' ? "selected":"")}}>Text Table</option>
                            <option value="Tin" {{(old('c12_dataset_type') == 'tin' ? "selected":"")}}>Tin</option>
                            <option value="Vector" {{(old('c12_dataset_type') == 'vector' ? "selected":"")}}>Vector</option>
                            <option value="Video" {{(old('c12_dataset_type') == 'video' ? "selected":"")}}>Video</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-3">
                        <label class="form-control-label" for="input-hardsoftcopy">
                            Scale in Hardcopy/Softcopy
                            <span style="font-size: smaller;">(feature scale)</span>
                        </label>
                    </div>
                    <div class="col-xl-2">
                        <input class="form-control form-control-sm" name="c12_feature_scale" id="c12_feature_scale" placeholder="10:50000" type="text" value="{{old('c12_feature_scale')}}">
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-imggsd">
                            Image Resolution (GSD)</label>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="c12_image_res" id="c12_image_res" placeholder="10.5" value="{{old('c12_image_res')}}">
                            <div class="input-group-append">
                                <span class="input-group-text input-group-sm py-0">meter</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-language">
                            Language
                        </label>
                    </div>
                    <div class="col-xl-2">
                        <select class="form-control form-control-sm" name="c12_language" id="c12_language">
                            <option selected disabled hidden> Language </option>
                            <option value="English" {{(old('c12_language') == 'English' ? "selected":"")}}>English</option>
                            <option value="Bahasa Malaysia" {{(old('c12_language') == 'Bahasa Malaysia' ? "selected":"")}}>Bahasa Malaysia</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2 divMaintenanceInfo">
                    <div class="col-xl-3">
                        <label class="form-control-label" for="input-hardsoftcopy">
                            Maintenance and Update
                        </label>
                    </div>
                    <div class="col-xl-2">
                        <select class="form-control form-control-sm" name="c12_maintenanceUpdate" id="c12_maintenanceUpdate">
                            <option value="">Pilih...</option>
                            <option value="Continual" {{ (old('c12_maintenanceUpdate') == "Continual" ? "selected":"") }}>Continual</option>
                            <option value="Daily" {{ (old('c12_maintenanceUpdate') == "Daily" ? "selected":"") }}>Daily</option>
                            <option value="Weekly" {{ (old('c12_maintenanceUpdate') == "Weekly" ? "selected":"") }}>Weekly</option>
                            <option value="Fortnightly" {{ (old('c12_maintenanceUpdate') == "Fortnightly" ? "selected":"") }}>Fortnightly</option>
                            <option value="Monthly" {{ (old('c12_maintenanceUpdate') == "Monthly" ? "selected":"") }}>Monthly</option>
                            <option value="Quarterly" {{ (old('c12_maintenanceUpdate') == "Quarterly" ? "selected":"") }}>Quarterly</option>
                            <option value="Biannually" {{ (old('c12_maintenanceUpdate') == "Biannually" ? "selected":"") }}>Biannually</option>
                            <option value="Annually" {{ (old('c12_maintenanceUpdate') == "Annually" ? "selected":"") }}>Annually</option>
                            <option value="As needed" {{ (old('c12_maintenanceUpdate') == "As needed" ? "selected":"") }}>As needed</option>
                            <option value="Irregular" {{ (old('c12_maintenanceUpdate') == "Irregular" ? "selected":"") }}>Irregular</option>
                            <option value="Not planned" {{ (old('c12_maintenanceUpdate') == "Not planned" ? "selected":"") }}>Not planned</option>
                            <option value="Unknown" {{ (old('c12_maintenanceUpdate') == "Unknown" ? "selected":"") }}>Unknown</option>
                            <option value="None" {{ (old('c12_maintenanceUpdate') == "None" ? "selected":"") }}>None</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
