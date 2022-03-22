<div class="card card-primary mb-4 div_c4" id="div_c4">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse4">
                <?php echo __('lang.accord_4'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="4">Tambah</button>
    </div>
    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion4'] as $key=>$val){
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
                    }elseif($key == "c4_scan_res"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline ml-3">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                        <?php echo __('lang.scanning_resolution'); ?><span class="text-warning">*</span> :
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="number" style="width :100px" placeholder="0.0" name="c4_scan_res" id="c4_scan_res" data-status="<?php echo $val['status']; ?>">
                                    <div class="form-control-label ml-2">
                                        meter
                                    </div>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c4_ground_scan"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                        <?php echo __('lang.ground_scanning'); ?><span class="text-warning">*</span> :
                                    </div>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control form-control-sm sortable" type="number" style="width :100px" placeholder="0.0" name="c4_ground_scan" id="c4_ground_scan" data-status="<?php echo $val['status']; ?>">
                                    <div class="form-control-label ml-2">
                                        meter
                                    </div>
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
