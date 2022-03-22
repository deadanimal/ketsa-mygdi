<div class="card card-primary mb-4 div_c10" id="div_c10">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse10">
                <?php echo __('lang.accord_10'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="10">Tambah</button>
    </div>
    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion10'] as $key=>$val){
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
                    }elseif($key == "file_contohJenisMetadata"){
                        ?>
                        <div class="row sortIt" id="div_contohJenisMetadata" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="file_contohJenisMetadata">
                                        Muat Naik Fail Contoh Jenis Metadata Yang Dimasukkan
                                    </label>
<<<<<<< HEAD
=======
                                    File Upload
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input class="form-control ml-3 sortable" id="file_contohJenisMetadata" type="file" name="file_contohJenisMetadata" data-status="<?php echo $val['status']; ?>"/>
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c10_file_name"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="c10_file_name" data-toggle="tooltip" title="Pengisian nama fail mengambarkan maklumat geospatial secara grafik (sekiranya ada)">
                                        <?php echo __('lang.file_name'); ?>
                                    </label><label class="float-right">:</label>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input type="text" name="c10_file_name" id="c10_file_name" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c10_file_type"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="c10_file_type" data-toggle="tooltip" title="Jenis format grafikberkenaan (JPEG, GIF, TIFF, XWD, EPS, CGM, PBM)">
                                        <?php echo __('lang.file_type'); ?>
                                    </label><label class="float-right">:</label>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input type="text" name="c10_file_type" id="c10_file_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c10_file_url"){
                        ?>
                        <div class="row sortIt divBrowsingInformationUrl" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="c10_file_url" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">
                                        <?php echo __('lang.URL'); ?>
                                    </label><label class="float-right">:</label>
<<<<<<< HEAD
                                    <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputBrowsingInformationUrl urlToTest sortable" data-status="<?php echo $val['status']; ?>">
                                    <button class="btn btn-sm btn-success btnTestUrl" type="button" data-toggle="modal" data-target="#modal-showweb" data-backdrop="false">Test</button>
=======
                                    Textbox
                                    <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputBrowsingInformationUrl urlToTest sortable" data-status="<?php echo $val['status']; ?>">
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c10_keyword"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="c10_file_name" data-toggle="tooltip" title="Kata Kunci (Carian)/ Keyword bagimaklumat geospatial berkenaan. Keyword perlu dimasukkan berdasarkankepada tajuk maklumat geospatial dengan bahasa bilingual (Bahasa Malaysia dan English). ">
                                        <?php echo __('lang.keywords'); ?><span class="text-warning">*</span>
                                    </label><label class="float-right">:</label>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <?php
                    }
                    if($key == "c10_additional_keyword[]"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="c10_file_type" data-toggle="tooltip" title="">
                                        <?php echo __('lang.additional_keywords'); ?>
                                    </label><label class="float-right">:</label>
<<<<<<< HEAD
=======
                                    Textbox
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                                    <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>">
                                </div>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="c10_file_url" data-toggle="tooltip" title="">
                                        <?php echo __('lang.additional_keywords'); ?>
                                    </label><label class="float-right">:</label>
<<<<<<< HEAD
                                    <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3" data-status="<?php echo $val['status']; ?>">
=======
                                    Textbox
                                    <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>">
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
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
