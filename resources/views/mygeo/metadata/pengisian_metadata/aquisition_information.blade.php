<div class="card card-primary mb-4 div_c8" id="div_c8">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
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
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($val['status'] == "customInput"){
                                    ?>
                                    <div class="row mb-2 sortIt">
                                        <div class="col-3 pl-5">
                                            <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                            <label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_avg_air_temp"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-8">
                                            <div class="form-control-label" data-toggle="tooltip" title="Purata suhu udara sepanjang penerbangan">
                                                <?php echo __('lang.average_air_temperature'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Celcius" name="c8_avg_air_temp" id="c8_avg_air_temp" value="{{old('c8_avg_air_temp')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_altitude"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-8">
                                            <div class="form-control-label" data-toggle="tooltip" title="">
                                                <?php echo __('lang.altitude'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Feet" name="c8_altitude" id="c8_altitude" value="{{old('c8_altitude')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_relative_humid"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-8">
                                            <div class="form-control-label" data-toggle="tooltip" title="Kelembapan relatif maksimum sepanjang penerbangan">
                                                <?php echo __('lang.relative_humidity'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Humidity" name="c8_relative_humid" id="c8_relative_humid" value="{{old('c8_relative_humid')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_meteor_cond"){
                                    ?>
                                    <div class="row mb">
                                        <div class="col-xl-8">
                                            <div class="form-control-label" data-toggle="tooltip" title="Keadaan meteorologi kawasan penerbangan seperti awan dan angin">
                                                <?php echo __('lang.meteorological_conditions'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Condition" name="c8_meteor_cond" id="c8_meteor_cond" value="{{old('c8_meteor_cond')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.eventIdentification'); ?>
                        </h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_identifier"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Nama cerapan atau nombor cerapan">
                                                <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_identifier" id="c8_identifier" value="{{old('c8_identifier')}}">
                                            @error('c8_identifier')
                                            <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_trigger"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Permulaan cerapan">
                                                <?php echo __('lang.trigger'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <select class="form-control form-control-sm" name="c8_trigger" id="c8_trigger">
                                                <option value="">Pilih...</option>
                                                <option value="Automatic" {{ (old('c8_trigger') == 'Automatic' ? "selected":"") }}>Automatic</option>
                                                <option value="Manual" {{ (old('c8_trigger') == 'Manual' ? "selected":"") }}>Manual</option>
                                                <option value="Pre Programmed" {{ (old('c8_trigger') == 'Pre Programmed' ? "selected":"") }}>Pre Programmed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_context"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Tujuan cerapan">
                                                <?php echo __('lang.context'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <select class="form-control form-control-sm" name="c8_context" id="c8_context">
                                                <option value="">Pilih...</option>
                                                <option value="Acquisition" {{ (old('c8_context') == 'Acquisition' ? "selected":"") }}>Acquisition</option>
                                                <option value="Pass" {{ (old('c8_context') == 'Pass' ? "selected":"") }}>Pass</option>
                                                <option value="Way Point" {{ (old('c8_context') == 'Way Point' ? "selected":"") }}>Way Point</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_sequence"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Masa relative cerapan dijalankan">
                                                <?php echo __('lang.sequence'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <select class="form-control form-control-sm" name="c8_sequence" id="c8_sequence">
                                                <option value="">Pilih...</option>
                                                <option value="Start" {{ (old('c8_sequence') == 'Start' ? "selected":"") }}>Start</option>
                                                <option value="End" {{ (old('c8_sequence') == 'End' ? "selected":"") }}>End</option>
                                                <option value="Instantaneous" {{ (old('c8_sequence') == 'Instantaneous' ? "selected":"") }}>Instantaneous</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_time"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Masa cerapan diambil">
                                                <?php echo __('lang.time'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <input class="form-control form-control-sm" type="time" style="width :120px" name="c8_time" id="c8_time" value="{{old('c8_time')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.instrumentIdentification'); ?></h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_type"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Jenis alat yang digunakan">
                                                <?php echo __('lang.type'); ?><span class="text-warning">*</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_type" id="c8_type" value="{{old('c8_type')}}">
                                            @error('c8_type')
                                            <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <h6 class="heading-small text-muted mt-2 mb-3"><?php echo __('lang.operation'); ?></h6>
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_op_identifier"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Numbor Pengenalan cerapan/ kerja">
                                                <?php echo __('lang.identifier'); ?><span class="text-warning">*</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_op_identifier" id="c8_op_identifier" value="{{ old('c8_op_identifier') }}">
                                            @error('c8_op_identifier')
                                            <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_op_status"){
                                    ?>
                                    <div class="row mb-2">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Status data cerapan">
                                                <?php echo __('lang.status'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Status" name="c8_op_status" id="c8_op_status" value="{{old('c8_op_status')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_op_type"){
                                    ?>
                                    <div class="row mb">
                                        <div class="col-xl-5">
                                            <div class="form-control-label" data-toggle="tooltip" title="Teknik cerapan diambil">
                                                <?php echo __('lang.type'); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_op_type" id="c8_op_type" value="{{old('c8_op_type')}}">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 px-0">
                        <h6 class="heading-small text-muted mb-3"><?php echo __('lang.requestDataRange'); ?>
                        </h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_rdr_date"){
                                    ?>
                                    <div class="form-control-label mr-3" data-toggle="tooltip" title="Tarikh mula cerapan dijalankan ">
                                        <?php echo __('lang.date'); ?>
                                    </div>
                                    <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_rdr_date" id="c8_rdr_date" value="{{old('c8_rdr_date')}}">
                                    <?php
                                }
                                if($key == "c8_last_accept_date"){
                                    ?>
                                    <div class="form-control-label mt-3 mr-3" data-toggle="tooltip" title="Tarikh cerapan siap dijalankan">
                                        <?php echo __('lang.latest_acceptable_date'); ?>
                                    </div>
                                    <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_last_accept_date" id="c8_last_accept_date" value="{{old('c8_last_accept_date')}}">
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
