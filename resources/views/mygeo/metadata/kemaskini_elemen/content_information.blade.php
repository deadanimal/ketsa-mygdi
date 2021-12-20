<div class="card card-primary mb-4 div_c7" id="div_c7">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse7">
                <?php echo __('lang.accord_7'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse in show" data-parent="#div_c7">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <h6 class="heading-small text-muted mb-2"><?php echo __('lang.wavelengthBandInformation'); ?></h6>
                <div class="pl-lg-3">
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="">
                                    <?php echo __('lang.band_boundry'); ?>
                                </div>
                                <select name="c7_band_boundary" id="c7_band_boundary" class="form-control form-control-sm">
                                    <option value="">Pilih...</option>
                                    <option value="Equivalent Width">Equivalent Width</option>
                                    <option value="Fifty Percent">Fifty Percent</option>
                                    <option value="One Over E">One Over E</option>
                                    <option value="3d B">3d B</option>
                                    <option value="Half Mazimum">Half Mazimum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4" data-toggle="tooltip" title="Jenis fungsi pemindahan yang digunakan dalam menentukan skala">
                                    <?php echo __('lang.transfer_function_type'); ?>
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :200px" name="c7_trans_fn_type" id="c7_trans_fn_type" value="">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Polar radar yag dihantar">
                                    <?php echo __('lang.transmitted_polarization'); ?>
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :180px" name="c7_trans_polar" id="c7_trans_polar" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4" data-toggle="tooltip" title="Jarak terkecil antara titik">
                                    <?php echo __('lang.nominal_spatial_resolution'); ?>
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :100px" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" value="">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Polar radar yang dikesan">
                                    <?php echo __('lang.detected_polarization'); ?>
                                </div>
                                <input class="form-control form-control-sm" type="text" style="width :180px" name="c7_detected_polar" id="c7_detected_polar" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
