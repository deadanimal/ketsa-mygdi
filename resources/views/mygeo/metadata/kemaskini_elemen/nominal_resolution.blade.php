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
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c4_scan_res"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c4_ground_scan"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
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
