<div class="card card-primary mb-4 div_c5" id="div_c5">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse5">
                <?php echo __('lang.accord_5'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse in " data-parent="#div_c5">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3">
                            Process Level
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :120pxpx" placeholder="Insert Process Level" name="c5_process_lvl" id="c5_process_lvl" value="{{old('c5_process_lvl')}}">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-inline">
                        <div class="form-control-label mr-3">
                            Resolution
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c5_resolution" id="c5_resolution" value="{{old('c5_resolution')}}">
                        <div class="form-control-label ml-2">
                            meter
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
