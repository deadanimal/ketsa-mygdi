<div class="card card-primary mb-4 div_c12" id="div_c12">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
            <a data-toggle="collapse" href="#collapse12">
                <?php echo __('lang.accord_12'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse12" class="panel-collapse collapse in" data-parent="#div_c12">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion12'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c12_dataset_type"){
                        ?>
                        <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-3">
                                <label class="form-control-label" for="input-dataset-type" data-toggle="tooltip" title="Jenis maklumat geospatial">
                                    <?php echo __('lang.spatial_data_set_type'); ?>
                                </label>
                            </div>
                            <div class="col-xl-4">
                                <span style="display:inline-block;">: </span>
                                <div style="display:inline-block;">
                                    <select class="form-control form-control-sm" id="c12_dataset_type" name="c12_dataset_type">
                                        <option selected disabled>Pilih...</option>
                                        <option value="Grid">Grid</option>
                                        <option value="Stereo Model">Stereo Model</option>
                                        <option value="Text Table">Text Table</option>
                                        <option value="Tin">Tin</option>
                                        <option value="Vector">Vector</option>
                                        <option value="Video">Video</option>
                                    </select>
                                </div>
                            </div>
                        </div>    
                        <?php
                    }
                }
                ?>
        
                <h6 class="heading-small text-muted mb-2" style="padding-top:25px;padding-bottom:10px;font-size:18px;"><?php echo __('lang.dataSetResolution'); ?></h6>
                <div class="row mb-2">
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion12'] as $key=>$val){
                        if($key == "c12_feature_scale"){
                            ?>
                            <div class="col-xl-5" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <label class="form-control-label" for="input-hardsoftcopy" data-toggle="tooltip" title="Pengisian butiran skala (sekiranya ada). Contoh skala 1:50,000">
                                    <?php echo __('lang.scale_in_hardcopy_softcopy'); ?>
                                    <span style="font-size: smaller;"><?php echo __('lang.features_scale'); ?></span>
                                    <span>: </span>
                                </label>
                                <input class="form-control form-control-sm" name="c12_feature_scale" id="c12_feature_scale" placeholder="10:50000" type="text" value="{{old('c12_feature_scale')}}">
                            </div>
                            <?php
                        }
                        if($key == "c12_image_res"){
                            ?>
                            <div class="col-xl-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <label class="form-control-label" for="input-imggsd" data-toggle="tooltip" title="Pengisian butiran resolusi (sekiranya ada). Contoh GSD (Ground Sample Distance) - Resolution = 0.5 meter">
                                    <?php echo __('lang.image_resolution'); ?>
                                    <span>: </span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="c12_image_res" id="c12_image_res" placeholder="10.5" value="{{old('c12_image_res')}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text input-group-sm py-0">meter</span>
                                        </div>
                                    </div>
                            </div>
                            <?php
                        }
                        if($key == "c12_language"){
                            ?>
                            <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <label class="form-control-label" for="input-language" data-toggle="tooltip" title="Penggunaan bahasa bagi maklumat geospatial">
                                    <?php echo __('lang.data_set_language'); ?>
                                    <span>: </span>
                                </label>
                                <select class="form-control form-control-sm" name="c12_language" id="c12_language">
                                    <option selected disabled>Pilih...</option>
                                    <option value="English" {{(old('c12_language') == 'English' ? "selected":"")}}>English</option>
                                    <option value="Bahasa Malaysia" {{(old('c12_language') == 'Bahasa Malaysia' ? "selected":"")}}>Bahasa Malaysia</option>
                                </select>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion12'] as $key=>$val){
                    if($key == "c12_maintenanceUpdate"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <h6 class="heading-small text-muted mb-2 divMaintenanceInfo"><?php echo __('lang.maintenanceInfomation'); ?></h6>
                            <div class="row mb-2 divMaintenanceInfo">
                                <div class="col-xl-3">
                                    <label class="form-control-label" for="input-hardsoftcopy">
                                        <?php echo __('lang.maintenance_and_update'); ?>
                                        <span>: </span>
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
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#c12_dataset_type').val("{{old('c12_dataset_type')}}").trigger('change');
    });
</script>
