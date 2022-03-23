<div class="card card-primary mb-4 div_c5" id="div_c5">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
            <a data-toggle="collapse" href="#collapse5">
                <?php echo __('lang.accord_5'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse in " data-parent="#div_c5">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion5'] as $key=>$val){
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
                foreach($template->template[strtolower($catSelected)]['accordion5'] as $key=>$val){
                    if($key == "c5_process_lvl"){
                        ?>
                        <div class="col-xl-6">
                            <div class="form-inline ml-3">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Tahap pemprosesan data">
                                    <?php echo __('lang.process_level'); ?>
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :120px" placeholder="Insert Process Level" name="c5_process_lvl" id="c5_process_lvl" value="{{old('c5_process_lvl')}}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c5_resolution"){
                        ?>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Resolusi data">
                                    <?php echo __('lang.resolution'); ?>
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c5_resolution" id="c5_resolution" value="{{old('c5_resolution')}}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
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
