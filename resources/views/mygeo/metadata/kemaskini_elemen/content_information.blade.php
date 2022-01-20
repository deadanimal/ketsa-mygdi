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
            <div class="sortableContainer1">
                <h6 class="heading-small text-muted mb-2"><?php echo __('lang.wavelengthBandInformation'); ?></h6>
                @if($template->template[strtolower($_GET['kategori'])]['accordion7']['c7_band_boundary']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="">
                                    <?php echo __('lang.band_boundry'); ?>
                                </div>
                                <select name="c7_band_boundary" id="c7_band_boundary" class="form-control form-control-sm sortable">
                                    <option value="">Pilih...</option>
                                    <option value="Equivalent Width" {{ (old('c7_band_boundary') == "Equivalent Width" ? "selected":"") }}>Equivalent Width</option>
                                    <option value="Fifty Percent" {{ (old('c7_band_boundary') == "Fifty Percent" ? "selected":"") }}>Fifty Percent</option>
                                    <option value="One Over E" {{ (old('c7_band_boundary') == "One Over E" ? "selected":"") }}>One Over E</option>
                                    <option value="3d B" {{ (old('c7_band_boundary') == "3d B<" ? "selected":"") }}>3d B</option>
                                    <option value="Half Mazimum" {{ (old('c7_band_boundary') == "Half Mazimum" ? "selected":"") }}>Half Mazimum</option>
                                </select>
                            </div>
                            <span class="close btnClose">&times;</span>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion7']['c7_trans_fn_type']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4" data-toggle="tooltip" title="Jenis fungsi pemindahan yang digunakan dalam menentukan skala">
                                    <?php echo __('lang.transfer_function_type'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :200px" placeholder="Transfer Type" name="c7_trans_fn_type" id="c7_trans_fn_type" value="{{old('c7_trans_fn_type')}}">
                            </div>
                        </div>
                        <span class="close btnClose">&times;</span>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion7']['c7_trans_polar']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Polar radar yag dihantar">
                                    <?php echo __('lang.transmitted_polarization'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :180px" placeholder="Transmitted Polarization" name="c7_trans_polar" id="c7_trans_polar" value="{{old('c7_trans_polar')}}">
                            </div>
                        </div>
                        <span class="close btnClose">&times;</span>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion7']['c7_nominal_spatial_res']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4" data-toggle="tooltip" title="Jarak terkecil antara titik">
                                    <?php echo __('lang.nominal_spatial_resolution'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :100px" placeholder="0.0" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" value="{{old('c7_nominal_spatial_res')}}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                            </div>
                        </div>
                        <span class="close btnClose">&times;</span>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion7']['c7_detected_polar']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Polar radar yang dikesan">
                                    <?php echo __('lang.detected_polarization'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :180px" placeholder="Detected Polarization" name="c7_detected_polar" id="c7_detected_polar" value="{{old('c7_detected_polar')}}">
                            </div>
                        </div>
                        <span class="close btnClose">&times;</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
