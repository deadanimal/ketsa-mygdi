<div class="card card-primary div_c7" id="div_c7">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse7">
            <h4 class="card-title">
                <?php echo __('lang.accord_7'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse7" class="panel-collapse collapse" data-parent="#div_c7">
        <div class="card-body">
            <b>Wavelength Band Information</b>
            <div class="form-group row">
                Band Boundry:
                <input type="text" name="c7_band_boundary" id="c7_band_boundary" class="form-control col-lg-4" value="{{old('c7_band_boundary')}}">
            </div>
            <div class="form-group row">
                Transfer Function Type:
                <input type="text" name="c7_trans_fn_type" id="c7_trans_fn_type" class="form-control col-lg-4" value="{{old('c7_trans_fn_type')}}"> 
                &nbsp;&nbsp;&nbsp;
                Transmitted Polarization:
                <input type="text" name="c7_trans_polar" id="c7_trans_polar" class="form-control col-lg-4" value="{{old('c7_trans_polar')}}"> 
            </div>
            <div class="form-group row">
                Nominal Spatial Resolution:
                <input type="text" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" class="form-control col-lg-4" value="{{old('c7_nominal_spatial_res')}}"> 
                &nbsp;&nbsp;&nbsp;
                Detected Polarization:
                <input type="text" name="c7_detected_polar" id="c7_detected_polar" class="form-control col-lg-4" value="{{old('c7_detected_polar')}}"> 
            </div>
        </div>
    </div>
</div>