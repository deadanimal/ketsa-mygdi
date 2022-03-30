<div class="card card-primary mb-4 div_c14" id="div_c14">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse14">
                <?php echo __('lang.accord_14'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="14">Tambah</button>
    </div>
    <div id="collapse14" class="panel-collapse collapse in" data-parent="#div_c14">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php
                foreach($template->template[strtolower($_GET['kategori'])]['accordion14'] as $key=>$val){
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
                    }elseif($key == "c14_access_constraint"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-access-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                        <?php echo __('lang.access_constraints'); ?>
                                    </label>
                                    Dropdown
                                    <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c14_use_constraint"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-use-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                        <?php echo __('lang.use_constraints'); ?>
                                    </label>
                                    Dropdown
                                    <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c14_classification_sys"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-access-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                        <?php echo __('lang.classification'); ?>
                                    </label>
                                    Dropdown
                                    <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c14_reference"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-reference" data-toggle="tooltip" title="Pengisian polisi/perundangan bagi maklumat geospatial.
                                           Contoh: Pekeliling Arahan Keselamatan Dokumen Geospatial Terperingkat Terhadap">
                                               <?php echo __('lang.classification_system'); ?>
                                    </label>
                                    Textbox
                                    <input class="form-control form-control-sm sortable" name="c14_reference" id="input-reference" type="text" placeholder="Standard/Policy/Act/Circular/Legal" value="{{old('c14_reference')}}" data-status="<?php echo $val['status']; ?>">
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
