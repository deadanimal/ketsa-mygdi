<div class="card card-primary mb-4 div_c8" id="div_c8">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse8">
                <?php echo __('lang.accord_8'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
        <div class="card-body">
            <div class="sortableContainer1">

                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_avg_air_temp']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Purata suhu udara sepanjang penerbangan">
                                    <?php echo __('lang.average_air_temperature'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Celcius" name="c8_avg_air_temp" id="c8_avg_air_temp" value="{{old('c8_avg_air_temp')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_altitude']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="">
                                    <?php echo __('lang.altitude'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Feet" name="c8_altitude" id="c8_altitude" value="{{old('c8_altitude')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_relative_humid']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Kelembapan relatif maksimum sepanjang penerbangan">
                                    <?php echo __('lang.relative_humidity'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Humidity" name="c8_relative_humid" id="c8_relative_humid" value="{{old('c8_relative_humid')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_meteor_cond']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Keadaan meteorologi kawasan penerbangan seperti awan dan angin">
                                    <?php echo __('lang.meteorological_conditions'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Condition" name="c8_meteor_cond" id="c8_meteor_cond" value="{{old('c8_meteor_cond')}}">
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_identifier']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Nama cerapan atau nombor cerapan">
                                    <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Identifier" name="c8_identifier" id="c8_identifier" value="{{old('c8_identifier')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_trigger']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Permulaan cerapan">
                                    <?php echo __('lang.trigger'); ?>
                                </div>
                                <select class="form-control form-control-sm sortable" name="c8_trigger" id="c8_trigger">
                                    <option value="">Pilih...</option>
                                    <option value="Automatic" {{ (old('c8_trigger') == 'Automatic' ? "selected":"") }}>Automatic</option>
                                    <option value="Manual" {{ (old('c8_trigger') == 'Manual' ? "selected":"") }}>Manual</option>
                                    <option value="Pre Programmed" {{ (old('c8_trigger') == 'Pre Programmed' ? "selected":"") }}>Pre Programmed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_context']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Tujuan cerapan">
                                    <?php echo __('lang.context'); ?>
                                </div>
                                <select class="form-control form-control-sm sortable" name="c8_context" id="c8_context">
                                    <option value="">Pilih...</option>
                                    <option value="Acquisition" {{ (old('c8_context') == 'Acquisition' ? "selected":"") }}>Acquisition</option>
                                    <option value="Pass" {{ (old('c8_context') == 'Pass' ? "selected":"") }}>Pass</option>
                                    <option value="Way Point" {{ (old('c8_context') == 'Way Point' ? "selected":"") }}>Way Point</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_sequence']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Masa relative cerapan dijalankan">
                                    <?php echo __('lang.sequence'); ?>
                                </div>
                                <select class="form-control form-control-sm sortable" name="c8_sequence" id="c8_sequence">
                                    <option value="">Pilih...</option>
                                    <option value="Start" {{ (old('c8_sequence') == 'Start' ? "selected":"") }}>Start</option>
                                    <option value="End" {{ (old('c8_sequence') == 'End' ? "selected":"") }}>End</option>
                                    <option value="Instantaneous" {{ (old('c8_sequence') == 'Instantaneous' ? "selected":"") }}>Instantaneous</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_time']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Masa cerapan diambil">
                                    <?php echo __('lang.time'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="time" style="width :120px" name="c8_time" id="c8_time" value="{{old('c8_time')}}">
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_type']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Jenis alat yang digunakan">
                                    <?php echo __('lang.type'); ?><span class="text-warning">*</span>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Type" name="c8_type" id="c8_type" value="{{old('c8_type')}}">
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_op_identifier']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Numbor Pengenalan cerapan/ kerja">
                                    <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Identifier" name="c8_op_identifier" id="c8_op_identifier" value="{{ old('c8_op_identifier') }}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_op_status']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Status data cerapan">
                                    <?php echo __('lang.status'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Status" name="c8_op_status" id="c8_op_status" value="{{old('c8_op_status')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_op_type']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Teknik cerapan diambil">
                                    <?php echo __('lang.type'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :80px" placeholder="Type" name="c8_op_type" id="c8_op_type" value="{{old('c8_op_type')}}">
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_rdr_date']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Tarikh mula cerapan dijalankan ">
                                    <?php echo __('lang.date'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="date" style="width :150px" placeholder="Select Date" name="c8_rdr_date" id="c8_rdr_date" value="{{old('c8_rdr_date')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion8']['c8_last_accept_date']['status'] == 'active')
                <div class="row sortIt">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Tarikh cerapan siap dijalankan">
                                    <?php echo __('lang.latest_acceptable_date'); ?>
                                </div>
                                <input class="form-control form-control-sm sortable" type="date" style="width :150px" placeholder="Select Date" name="c8_last_accept_date" id="c8_last_accept_date" value="{{old('c8_last_accept_date')}}">
                            </div>
                        </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
