<div class="card card-primary mb-4 div_c13" id="div_c13">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse13">
                <?php echo __('lang.accord_13'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="13">Tambah</button>
    </div>
    <div id="collapse13" class="panel-collapse collapse in" data-parent="#div_c13">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion13'] as $key=>$val){
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
                    }elseif($key == "c13_ref_sys_identify"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b for="input-system-identifier" data-toggle="tooltip" title="Sistem rujukan bagi maklumat geospatial">
                                        <?php echo __('lang.reference_system_identifier'); ?>
                                    </b>
                                    Dropdown
                                    <select class="form-control form-control-sm sortable" name="c13_ref_sys_identify" id="c13_ref_sys_identify" data-status="<?php echo $val['status']; ?>">
                                        <option selected disabled>Pilih...</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "refsys_projection"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b><?php echo __('lang.projection'); ?> :</b>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="refsys_projection" id="refsys_projection" readonly data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "refsys_axis_units"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b><?php echo __('lang.axis_units'); ?> :</b>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="refsys_axis_units" id="refsys_axis_units" readonly data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "refsys_semiMajorAxis"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b><?php echo __('lang.semi_major_axis'); ?> :</b>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="refsys_semiMajorAxis" id="refsys_semiMajorAxis" readonly data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "refsys_datum"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b><?php echo __('lang.datum'); ?> :</b>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="refsys_datum" id="refsys_datum" readonly data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "refsys_ellipsoid"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b><?php echo __('lang.ellipsoid'); ?> :</b>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="refsys_ellipsoid" id="refsys_ellipsoid" readonly data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "refsys_denomFlatRatio"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <b><?php echo __('lang.denominator_of_flattening_ratio'); ?> :</b>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" type="text" name="refsys_denomFlatRatio" id="refsys_denomFlatRatio" readonly data-status="<?php echo $val['status']; ?>">
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