<div class="card card-primary div_c5" id="div_c5">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse5">
            <h4 class="card-title">
                <?php echo __('lang.accord_5'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse5" class="panel-collapse collapse" data-parent="#div_c5">
        <div class="card-body">
            <div class="form-group row">
                Process Level:
                <input type="text" name="c5_process_lvl" id="c5_process_lvl" class="form-control col-lg-4" value="{{old('c5_process_lvl')}}"> 
                &nbsp;&nbsp;&nbsp;
                Resolution:
                <input type="text" name="c5_resolution" id="c5_resolution" class="form-control col-lg-4" value="{{old('c5_resolution')}}"> meter
            </div>
        </div>
    </div>
</div>