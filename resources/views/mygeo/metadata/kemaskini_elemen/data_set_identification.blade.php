<div class="card card-primary mb-4 div_c12" id="div_c12">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse12">
                <?php echo __('lang.accord_12'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="12">Tambah</button>
    </div>
    <div id="collapse12" class="panel-collapse collapse in" data-parent="#div_c12">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php
                foreach($template->template[strtolower($_GET['kategori'])]['accordion12'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }elseif($key == "c12_dataset_type"){
                        ?>
                        <div class="row sortIt mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-2">
                                <label class="form-control-label" for="input-dataset-type">
                                    Spatial Data Set Type
                                </label>
                            </div>
                            <div class="col-xl-3">
                                <select name="c12_dataset_type" id="c12_dataset_type" class="form-control form-control-sm" data-status="<?php echo $val['status']; ?>">
                                    <option value="">Pilih...</option>
                                </select>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c12_feature_scale"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-hardsoftcopy" data-toggle="tooltip" title="Pengisian butiran skala (sekiranya ada). Contoh skala 1:50,000">
                                        <?php echo __('lang.scale_in_hardcopy_softcopy'); ?>
                                        <span style="font-size: smaller;"><?php echo __('lang.features_scale'); ?></span>
                                    </label>
                                    <input class="form-control form-control-sm sortable" name="c12_feature_scale" id="c12_feature_scale" placeholder="10:50000" type="text" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c12_image_res"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-imggsd" data-toggle="tooltip" title="Pengisian butiran resolusi (sekiranya ada). Contoh GSD (Ground Sample Distance) - Resolution = 0.5 meter">
                                        <?php echo __('lang.image_resolution'); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm sortable" name="c12_image_res" id="c12_image_res" placeholder="10.5" data-status="<?php echo $val['status']; ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text input-group-sm py-0">meter</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c12_language"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-language" data-toggle="tooltip" title="Penggunaan bahasa bagi maklumat geospatial">
                                        <?php echo __('lang.data_set_language'); ?>
                                    </label>
                                    <select class="form-control form-control-sm sortable" name="c12_language" id="c12_language" data-status="<?php echo $val['status']; ?>">
                                        <option selected disabled>Pilih...</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c12_maintenanceUpdate"){
                        ?>
                        <div class="row sortIt divMaintenanceInfo" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-hardsoftcopy">
                                        <?php echo __('lang.maintenance_and_update'); ?>
                                    </label>
                                    <select class="form-control form-control-sm sortable" name="c12_maintenanceUpdate" id="c12_maintenanceUpdate" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
