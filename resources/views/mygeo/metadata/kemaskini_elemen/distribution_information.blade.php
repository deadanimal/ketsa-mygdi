<div class="card card-primary mb-4 div_c11" id="div_c11">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse11">
                <?php echo __('lang.accord_11'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="11">Tambah</button>
    </div>
    <div id="collapse11" class="panel-collapse collapse in" data-parent="#div_c11">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion11'] as $key=>$val){
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
                    }elseif($key == "c11_dist_format"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian bagi format data yang disediakan untuk penyebaran. Contoh: tab, dwg, shp dan lain-lain">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_version"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisianbagiversi format data yang disediakan untukpenyebaran. Contoh: MapInfo 7.8, Arcview 3.2,  AutoCad 2005 dan lain-lain">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_distributor"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Organisasi yang bertanggungjawab dalam penyebaran maklumat geospatial tersebut">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_units_of_dist"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian bagi unit penyebaran maklumat geospatial yang telah disediakan untuk distribution. Samaada mengikut data, tiles, layer atau kawasan geografi">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_size"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Saiz maklumat geospatial (megabytes)">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_link"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pautan capaian maklumat geospatial (untuk muat turun)">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_fees"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Harga maklumat geospatial (Ringgit Malaysia)">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c11_order_instructions"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian bagi Panduan/ Standard Order Proses (SOP) dalam memperolehi syarat-syarat atau arahan secara umum untuk mendapatkan/memperolehi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                         </div>
                         <?php
                    }
                    if($key == "c11_medium"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Medium penyebaran maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mantadori
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
