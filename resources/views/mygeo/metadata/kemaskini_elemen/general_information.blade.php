<div class="card card-primary mb-4 div_c1" id="div_c1">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse1">
                <?php echo __('lang.accord_1'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="1">Tambah</button>
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion1'] as $key=>$val){
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
                    }elseif($key == "c1_content_info"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name="c1_content_info" class="form-control form-control-sm ml-3 sortable" id="content_info_dropdown" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "publisher_name"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="publisher_name" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "publisher_agensi_organisasi"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="publisher_agensi_organisasi" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "publisher_email"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="publisher_email" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "publisher_phone"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="publisher_phone" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Is Mandatory
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "publisher_role"){
                        ?>
                        <div class="row mb-2 sortIt divPublisherRole" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name='publisher_role' class='form-control form-control-sm ml-3 sortable' data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="">Pilih...</option>
                                </select>
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
