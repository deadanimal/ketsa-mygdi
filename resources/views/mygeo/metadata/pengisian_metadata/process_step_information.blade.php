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
                @if($elemenMetadata['c5_process_lvl']->status == '1')
                <div class="col-xl-6">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3" data-toggle="tooltip" title="Tahap pemprosesan data">
                            <?php echo __('lang.process_level'); ?>
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :120px" placeholder="Insert Process Level" name="c5_process_lvl" id="c5_process_lvl" value="{{old('c5_process_lvl')}}">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c5_resolution']->status == '1')
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
                @endif
            </div>
        </div>
    </div>
</div>
