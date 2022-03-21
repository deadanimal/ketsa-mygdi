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
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }elseif($key == "c11_dist_format"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-distribution-format" data-toggle="tooltip" title="Pengisian bagi format data yang disediakan untuk penyebaran. Contoh: tab, dwg, shp dan lain-lain">
                                    <?php echo __('lang.format_name'); ?></label>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="c11_dist_format" id="c11_dist_format" placeholder="Format Name" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_version"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                        <label class="form-control-label mr-3" for="input-version" data-toggle="tooltip" title="Pengisianbagiversi format data yang disediakan untukpenyebaran. Contoh: MapInfo 7.8, Arcview 3.2,  AutoCad 2005 dan lain-lain"><?php echo __('lang.format_version'); ?></label>
                                        Textbox
                                        <input class="form-control form-control-sm sortable" type="text" name="c11_version" id="c11_version" placeholder="Format Version" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_distributor"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-distributor" data-toggle="tooltip" title="Organisasi yang bertanggungjawab dalam penyebaran maklumat geospatial tersebut"><?php echo __('lang.organisation_name'); ?></label>
                                    Textbox
                                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm sortable" placeholder="Organization Name" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_units_of_dist"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-unit-distribution" data-toggle="tooltip" title="Pengisian bagi unit penyebaran maklumat geospatial yang telah disediakan untuk distribution. Samaada mengikut data, tiles, layer atau kawasan geografi."><?php echo __('lang.units_of_distribution'); ?></label>
                                    Textbox
                                    <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_size"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-sizemb" data-toggle="tooltip" title="Saiz maklumat geospatial (megabytes)"><?php echo __('lang.size'); ?></label>
                                    Textbox
                                    <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm sortable" placehorder="Size" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_link"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-distributor" data-toggle="tooltip" title="Pautan capaian maklumat geospatial (untuk muat turun)"><?php echo __('lang.link'); ?></label>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" name="c11_link" id="c11_link" placeholder="Ordering Website Link" type="text" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_fees"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-fees" data-toggle="tooltip" title="Harga maklumat geospatial (Ringgit Malaysia)"><?php echo __('lang.fees'); ?></label>
                                    Textbox
                                    <input type="text" name="c11_fees" id="c11_fees" class="form-control form-control-sm sortable" placeholder="RM 0.00" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c11_order_instructions"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-instructionorder" data-toggle="tooltip" title="Pengisian bagi Panduan/ Standard Order Proses (SOP) dalam memperolehi syarat-syarat atau arahan secara umum untuk mendapatkan/memperolehi maklumat geospatial"><?php echo __('lang.ordering_instructions'); ?></label>
                                    Textbox
                                    <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                         </div>
                         <?php
                    }
                    if($key == "c11_medium"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-medium" data-toggle="tooltip" title="Medium penyebaran maklumat geospatial"><?php echo __('lang.medium_name'); ?></label>
                                    Dropdown
                                    <select name="c11_medium" id="c11_medium" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
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
