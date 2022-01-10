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
                                                    @if($template->template[strtolower($_GET['kategori'])]['accordion4']['c4_scan_res']['status'] == 'active')
                                                    <div class="col-xl-6">
                                                        <div class="form-inline ml-3">
                                                            <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                                                <?php echo __('lang.scanning_resolution'); ?><span class="text-warning">*</span> :
                                                            </div>
                                                            <input class="form-control form-control-sm" type="number" style="width :100px" placeholder="0.0" name="c4_scan_res" id="c4_scan_res" value="{{old('c4_scan_res')}}">
                                                            <div class="form-control-label ml-2">
                                                                meter
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($template->template[strtolower($_GET['kategori'])]['accordion4']['c4_ground_scan']['status'] == 'active')
                                                    <div class="col-xl-6">
                                                        <div class="form-inline">
                                                            <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan jarak larian pesawat (kiri, kanan dan bahagian tengah)">
                                                                <?php echo __('lang.ground_scanning'); ?><span class="text-warning">*</span> :
                                                            </div>
                                                            <input class="form-control form-control-sm" type="number" style="width :100px" placeholder="0.0" name="c4_ground_scan" id="c4_ground_scan" value="{{old('c4_ground_scan')}}">
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
