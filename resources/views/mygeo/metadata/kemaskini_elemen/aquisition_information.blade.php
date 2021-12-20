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
            <div class="acard-body opacity-8">
                <div class="row">
                    <div class="col-xl-4">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.enviromentRecord'); ?>
                        </h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label" data-toggle="tooltip" title="Purata suhu udara sepanjang penerbangan">
                                        <?php echo __('lang.average_air_temperature'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_avg_air_temp" id="c8_avg_air_temp" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label" data-toggle="tooltip" title="">
                                        <?php echo __('lang.altitude'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_altitude" id="c8_altitude" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label" data-toggle="tooltip" title="Kelembapan relatif maksimum sepanjang penerbangan">
                                        <?php echo __('lang.relative_humidity'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_relative_humid" id="c8_relative_humid" value="">
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-xl-8">
                                    <div class="form-control-label" data-toggle="tooltip" title="Keadaan meteorologi kawasan penerbangan seperti awan dan angin">
                                        <?php echo __('lang.meteorological_conditions'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_meteor_cond" id="c8_meteor_cond" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.eventIdentification'); ?>
                        </h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Nama cerapan atau nombor cerapan">
                                        <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_identifier" id="c8_identifier" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Permulaan cerapan">
                                        <?php echo __('lang.trigger'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <select class="form-control form-control-sm" name="c8_trigger" id="c8_trigger">
                                        <option value="">Pilih...</option>
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Pre Programmed">Pre Programmed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Tujuan cerapan">
                                        <?php echo __('lang.context'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <select class="form-control form-control-sm" name="c8_context" id="c8_context">
                                        <option value="">Pilih...</option>
                                        <option value="Acquisition">Acquisition</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Way Point">Way Point</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Masa relative cerapan dijalankan">
                                        <?php echo __('lang.sequence'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <select class="form-control form-control-sm" name="c8_sequence" id="c8_sequence">
                                        <option value="">Pilih...</option>
                                        <option value="Start">Start</option>
                                        <option value="End">End</option>
                                        <option value="Instantaneous">Instantaneous</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Masa cerapan diambil">
                                        <?php echo __('lang.time'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="time" style="width :120px" name="c8_time" id="c8_time" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.instrumentIdentification'); ?></h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Jenis alat yang digunakan">
                                        <?php echo __('lang.type'); ?><span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_type" id="c8_type" value="">
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mt-2 mb-3"><?php echo __('lang.operation'); ?></h6>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Numbor Pengenalan cerapan/ kerja">
                                        <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_op_identifier" id="c8_op_identifier" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Status data cerapan">
                                        <?php echo __('lang.status'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_op_status" id="c8_op_status" value="">
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-xl-5">
                                    <div class="form-control-label" data-toggle="tooltip" title="Teknik cerapan diambil">
                                        <?php echo __('lang.type'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_op_type" id="c8_op_type" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 px-0">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.requestDataRange'); ?>
                        </h6>
                        <div class="form-group">
                            
                            <div class="form-control-label mr-3" data-toggle="tooltip" title="Tarikh mula cerapan dijalankan ">
                                <?php echo __('lang.date'); ?>
                            </div>
                            <input class="form-control form-control-sm" type="date" style="width :150px" name="c8_rdr_date" id="c8_rdr_date" value="">
                            <div class="form-control-label mt-3 mr-3" data-toggle="tooltip" title="Tarikh cerapan siap dijalankan">
                                <?php echo __('lang.latest_acceptable_date'); ?>
                            </div>
                            <input class="form-control form-control-sm" type="date" style="width :150px" name="c8_last_accept_date" id="c8_last_accept_date" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
