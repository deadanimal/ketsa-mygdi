<div class="card card-primary mb-4 div_c4" id="div_c4">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
            <a data-toggle="collapse" href="#collapse4">
                <?php echo __('lang.accord_4'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion4'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion4'] as $key=>$val){
                    if($key == "c4_scan_res"){
                        ?>
                        <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="form-inline ml-3">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                    <?php echo __('lang.scanning_resolution'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?> :
                                </div>
                                <input class="form-control form-control-sm" type="number" style="width :100px" placeholder="0.0" name="c4_scan_res" id="c4_scan_res" value="{{old('c4_scan_res')}}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                            </div>
                            @error('c4_scan_res')
                            <div class="text-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <?php
                    }
                    if($key == "c4_ground_scan"){
                        ?>
                        <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                    <?php echo __('lang.ground_scanning'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?> :
                                </div>
                                <input class="form-control form-control-sm" type="number" style="width :100px" placeholder="0.0" name="c4_ground_scan" id="c4_ground_scan" value="{{old('c4_ground_scan')}}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                            </div>
                            @error('c4_ground_scan')
                            <div class="text-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
