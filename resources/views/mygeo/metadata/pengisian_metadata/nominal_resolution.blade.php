<div class="card card-primary mb-4 div_c4" id="div_c4">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                <a data-toggle="collapse" href="#collapse4">
                                                    <?php echo __('lang.accord_4'); ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-inline ml-3">
                                                            <div class="form-control-label mr-3">
                                                                Scanning Resolution<span class="text-warning">*</span> :
                                                            </div>
                                                            <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c4_scan_res" id="c4_scan_res" value="{{old('c4_scan_res')}}">
                                                            <div class="form-control-label ml-2">
                                                                meter
                                                            </div>
                                                        </div>
                                                        @error('c4_scan_res')
                                                        <div class="text-error">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-inline">
                                                            <div class="form-control-label mr-3">
                                                                Ground Scanning<span class="text-warning">*</span> :
                                                            </div>
                                                            <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c4_ground_scan" id="c4_ground_scan" value="{{old('c4_ground_scan')}}">
                                                            <div class="form-control-label ml-2">
                                                                meter
                                                            </div>
                                                        </div>
                                                        @error('c4_ground_scan')
                                                        <div class="text-error">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
