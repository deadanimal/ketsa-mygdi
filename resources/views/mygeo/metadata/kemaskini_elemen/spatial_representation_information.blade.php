<div class="card card-primary mb-4 div_c6" id="div_c6">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse6">
                <?php echo __('lang.accord_6'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="6">Tambah</button>
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion6'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }elseif($key == "c6_collection_name"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-7">
                                <div class="form-inline ml-3">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan nama kumpulan GCP yang diambil/ dicerap">
                                        <?php echo __('lang.collection_name'); ?><span class="text-warning">*</span>
                                    </div>
                                    <input class="form-control form-control-sm sortable" type="text" style="width :280px" placeholder="Insert Collection Name" name="c6_collection_name" id="c6_collection_name" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c6_collection_id"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-5">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan bilangan titik GCP ">
                                        <?php echo __('lang.collection_identification'); ?><span class="text-warning">*</span>
                                    </div>
                                    <input class="form-control form-control-sm sortable" type="text" style="width :150px" placeholder="Identification" name="c6_collection_id" id="c6_collection_id" data-status="<?php echo $val['status']; ?>">
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
