<div class="card card-primary mb-4 div_c7" id="div_c7">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse7">
                <?php echo __('lang.accord_7'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="7">Tambah</button>
    </div>
    <div id="collapse7" class="panel-collapse collapse in " data-parent="#div_c7">
        <div class="card-body">
            <div class="sortableContainer1">
                <h6 class="heading-small text-muted mb-2"><?php echo __('lang.wavelengthBandInformation'); ?></h6>
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion7'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
<<<<<<< HEAD
=======
                                Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }elseif($key == "c7_band_boundary"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="">
                                        <?php echo __('lang.band_boundry'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Dropdown
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <select name="c7_band_boundary" id="c7_band_boundary" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c7_trans_fn_type"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-4" data-toggle="tooltip" title="Jenis fungsi pemindahan yang digunakan dalam menentukan skala">
                                        <?php echo __('lang.transfer_function_type'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :200px" placeholder="Transfer Type" name="c7_trans_fn_type" id="c7_trans_fn_type" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c7_trans_polar"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Polar radar yag dihantar">
                                        <?php echo __('lang.transmitted_polarization'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :180px" placeholder="Transmitted Polarization" name="c7_trans_polar" id="c7_trans_polar" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c7_nominal_spatial_res"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-4" data-toggle="tooltip" title="Jarak terkecil antara titik">
                                        <?php echo __('lang.nominal_spatial_resolution'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :100px" placeholder="0.0" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" data-status="<?php echo $val['status']; ?>">
                                    <div class="form-control-label ml-2">
                                        meter
                                    </div>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c7_detected_polar"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Polar radar yang dikesan">
                                        <?php echo __('lang.detected_polarization'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :180px" placeholder="Detected Polarization" name="c7_detected_polar" id="c7_detected_polar" data-status="<?php echo $val['status']; ?>">
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
