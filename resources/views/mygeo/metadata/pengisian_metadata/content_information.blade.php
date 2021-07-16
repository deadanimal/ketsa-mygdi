<div class="card card-primary mb-4 div_c7" id="div_c7">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse7">
                <?php echo __('lang.accord_7'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse in " data-parent="#div_c7">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <h6 class="heading-small text-muted mb-2">Wavelength Band
                    Information</h6>
                <div class="pl-lg-3">
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Band Boundry
                                </div>
                                <input type="text" name="c7_band_boundary" id="c7_band_boundary" class="form-control form-control-sm" style="width:150px;" value="{{old('c7_band_boundary')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4">
                                    Transfer Function Type
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :200px" placeholder="Transfer Type" nname="c7_trans_fn_type" id="c7_trans_fn_type" value="{{old('c7_trans_fn_type')}}">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Transmitted Polarization
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :180px" placeholder="Transmitted Polarization" name="c7_trans_polar" id="c7_trans_polar" value="{{old('c7_trans_polar')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4">
                                    Nominal Spatial Resolution
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" value="{{old('c7_nominal_spatial_res')}}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Detected Polarization
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :180px" placeholder="Detected Polarization" name="c7_detected_polar" id="c7_detected_polar" value="{{old('c7_detected_polar')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
