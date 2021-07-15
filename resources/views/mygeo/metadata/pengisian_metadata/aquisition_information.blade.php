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
                        <h6 class="heading-small text-muted mb-3">Enviroment Record
                        </h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Average Air Temperature
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Celcius" name="c8_file_name" id="c8_avg_air_temp" value="{{old('c8_avg_air_temp')}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Altitude
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Feet" name="c8_url" id="c8_altitude" value="{{old('c8_altitude')}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Relative Humidity
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Humidity" name="c8_file_name" id="c8_relative_humid" value="{{old('c8_relative_humid')}}">
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Meteorological Condition
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Condition" name="c8_url" id="c8_meteor_cond" value="{{old('c8_meteor_cond')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Event Identifier
                        </h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Identifier<span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_file_name" id="c8_identifier" value="{{old('c8_identifier')}}">
                                    @error('c8_identifier')
                                    <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Trigger
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_trigger" id="c8_trigger" value="{{old('c8_trigger')}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Context
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_context" id="c8_context" value="{{old('c8_context')}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Sequence
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" name="c8_sequence" id="c8_sequence" value="{{old('c8_sequence')}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Time
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="time" style="width :120px" name="c8_time" id="c8_time" value="{{old('c8_time')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Instrument Identification</h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Type<span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_type" id="c8_type" value="{{old('c8_type')}}">
                                    @error('c8_type')
                                    <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mt-2 mb-3">Operation</h6>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Identifier<span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_op_identifier" id="c8_op_identifier">
                                    @error('c8_op_identifier')
                                    <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Status
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Status" name="c8_op_status" id="c8_op_status" value="{{old('c8_op_status')}}">
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Type
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_op_type" id="c8_op_type" value="{{old('c8_op_type')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 px-0">
                        <h6 class="heading-small text-muted mb-3">Request Data Range
                        </h6>
                        <div class="form-group">
                            <div class="form-control-label mr-3">
                                Date
                            </div>
                            <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_rdr_date" id="c8_rdr_date" value="{{old('c8_rdr_date')}}">
                            <div class="form-control-label mt-3 mr-3">
                                Last Acceptable Date
                            </div>
                            <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_last_accept_date" id="c8_last_accept_date" value="{{old('c8_last_accept_date')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
