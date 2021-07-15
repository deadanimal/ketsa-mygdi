<div class="card card-primary div_c8" id="div_c8">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse8">
            <h4 class="card-title">
                <?php echo __('lang.accord_8'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse8" class="panel-collapse collapse" data-parent="#div_c8">
        <div class="card-body">
            <b>Environment Record</b>
            <div class="form-group row">
                Average Air Temperature:
                <input type="text" name="c8_avg_air_temp" id="c8_avg_air_temp" class="form-control col-lg-4" value="{{old('c8_avg_air_temp')}}">
                &nbsp;&nbsp;&nbsp;
                Altitude:
                <input type="text" name="c8_altitude" id="c8_altitude" class="form-control col-lg-4" value="{{old('c8_altitude')}}"> 
            </div>
            <div class="form-group row">
                Relative Humidity:
                <input type="text" name="c8_relative_humid" id="c8_relative_humid" class="form-control col-lg-4" value="{{old('c8_relative_humid')}}">
                &nbsp;&nbsp;&nbsp;
                Meteorological Condition:
                <input type="text" name="c8_meteor_cond" id="c8_meteor_cond" class="form-control col-lg-4" value="{{old('c8_meteor_cond')}}"> 
            </div>
            <b>Event Identifier</b>
            <div class="form-group row">
                Identifier<span class="required">*</span>:
                <input type="text" name="c8_identifier" id="c8_identifier" class="form-control col-lg-4" value="{{old('c8_identifier')}}">
                &nbsp;&nbsp;&nbsp;
                Trigger:
                <input type="text" name="c8_trigger" id="c8_trigger" class="form-control col-lg-4" value="{{old('c8_trigger')}}"> 
            </div>
            @error('c8_identifier')
                <div style="color:red;">{{ $message }}</div>
            @enderror
            <div class="form-group row">
                Context:
                <input type="text" name="c8_context" id="c8_context" class="form-control col-lg-4" value="{{old('c8_context')}}">
                &nbsp;&nbsp;&nbsp;
                Sequence:
                <input type="text" name="c8_sequence" id="c8_sequence" class="form-control col-lg-4" value="{{old('c8_sequence')}}"> 
            </div>
            <div class="form-group row">
                Time:
                <input type="text" name="c8_time" id="c8_time" class="form-control col-lg-4" value="{{old('c8_time')}}">
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Instrument Identification</b>
            <div class="form-group row">
                Type<span class="required">*</span>:
                <input type="text" name="c8_type" id="c8_type" class="form-control col-lg-4" value="{{old('c8_type')}}">
                &nbsp;&nbsp;&nbsp;
                @error('c8_type')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <b>Operation</b>
            <div class="form-group row">
                Identifier<span class="required">*</span>:
                <input type="text" name="c8_op_identifier" id="c8_op_identifier" class="form-control col-lg-4" value="{{old('c8_op_identifier')}}">
                &nbsp;&nbsp;&nbsp;
                Status:
                <input type="text" name="c8_op_status" id="c8_op_status" class="form-control col-lg-4" value="{{old('c8_op_status')}}"> 
            </div>
            @error('c8_op_identifier')
                <div style="color:red;">{{ $message }}</div>
            @enderror
            <div class="form-group row">
                Type:
                <input type="text" name="c8_op_type" id="c8_op_type" class="form-control col-lg-4" value="{{old('c8_op_type')}}">
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Request Data Range</b>
            <div class="form-group row">
                Date:
                <input type="date" name="c8_rdr_date" id="c8_rdr_date" class="form-control col-lg-4" value="{{old('c8_rdr_date')}}"> 
                &nbsp;&nbsp;&nbsp;
                Last Acceptable Date:
                <input type="date" name="c8_last_accept_date" id="c8_last_accept_date" class="form-control col-lg-4" value="{{old('c8_last_accept_date')}}">
            </div>
        </div>
    </div>
</div>