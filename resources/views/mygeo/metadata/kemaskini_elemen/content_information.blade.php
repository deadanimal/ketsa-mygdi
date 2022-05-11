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
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c7_band_boundary"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c7_trans_fn_type"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Jenis fungsi pemindahan yang digunakan dalam menentukan skala">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c7_trans_polar"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Polar radar yag dihantar">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c7_nominal_spatial_res"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Jarak terkecil antara titik">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c7_detected_polar"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Polar radar yang dikesan">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
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
