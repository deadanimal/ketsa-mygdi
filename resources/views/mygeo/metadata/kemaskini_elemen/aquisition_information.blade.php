<div class="card card-primary mb-4 div_c8" id="div_c8">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse8">
                <?php echo __('lang.accord_8'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="8">Tambah</button>
    </div>
    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion8'] as $key=>$val){
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
                    }elseif($key == "c8_avg_air_temp"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Purata suhu udara sepanjang penerbangan">
                                        <?php echo __('lang.average_air_temperature'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Celcius" name="c8_avg_air_temp" id="c8_avg_air_temp" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_altitude"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="">
                                        <?php echo __('lang.altitude'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Feet" name="c8_altitude" id="c8_altitude" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_relative_humid"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Kelembapan relatif maksimum sepanjang penerbangan">
                                        <?php echo __('lang.relative_humidity'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Humidity" name="c8_relative_humid" id="c8_relative_humid" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_meteor_cond"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Keadaan meteorologi kawasan penerbangan seperti awan dan angin">
                                        <?php echo __('lang.meteorological_conditions'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Condition" name="c8_meteor_cond" id="c8_meteor_cond" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_identifier"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Nama cerapan atau nombor cerapan">
                                        <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Identifier" name="c8_identifier" id="c8_identifier" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_trigger"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Permulaan cerapan">
                                        <?php echo __('lang.trigger'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Dropdown
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <select class="form-control form-control-sm sortable" name="c8_trigger" id="c8_trigger" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_context"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Tujuan cerapan">
                                        <?php echo __('lang.context'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Dropdown
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <select class="form-control form-control-sm sortable" name="c8_context" id="c8_context" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_sequence"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Masa relative cerapan dijalankan">
                                        <?php echo __('lang.sequence'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Dropdown
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <select class="form-control form-control-sm sortable" name="c8_sequence" id="c8_sequence" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih...</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_time"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Masa cerapan diambil">
                                        <?php echo __('lang.time'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="time" style="width :120px" name="c8_time" id="c8_time" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_type"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Jenis alat yang digunakan">
                                        <?php echo __('lang.type'); ?><span class="text-warning">*</span>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Type" name="c8_type" id="c8_type" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_op_identifier"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Numbor Pengenalan cerapan/ kerja">
                                        <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Identifier" name="c8_op_identifier" id="c8_op_identifier" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_op_status"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Status data cerapan">
                                        <?php echo __('lang.status'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Status" name="c8_op_status" id="c8_op_status" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_op_type"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Teknik cerapan diambil">
                                        <?php echo __('lang.type'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Type" name="c8_op_type" id="c8_op_type" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_rdr_date"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Tarikh mula cerapan dijalankan ">
                                        <?php echo __('lang.date'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="date" style="width :150px" placeholder="Select Date" name="c8_rdr_date" id="c8_rdr_date" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c8_last_accept_date"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Tarikh cerapan siap dijalankan">
                                        <?php echo __('lang.latest_acceptable_date'); ?>
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="date" style="width :150px" placeholder="Select Date" name="c8_last_accept_date" id="c8_last_accept_date" data-status="<?php echo $val['status']; ?>">
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
