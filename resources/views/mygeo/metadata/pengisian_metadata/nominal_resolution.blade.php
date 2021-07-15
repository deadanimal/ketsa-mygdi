<div class="card card-primary div_c4" id="div_c4">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse4">
            <h4 class="card-title">
                <?php echo __('lang.accord_4'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse4" class="panel-collapse collapse" data-parent="#div_c4">
        <div class="card-body">
            <div class="form-group row">
                Scanning Resolution<span class="required">*</span>:
                <input type="text" name="c4_scan_res" id="c4_scan_res" class="form-control col-lg-4" value="{{old('c4_scan_res')}}"> 
                &nbsp;&nbsp;&nbsp;
                Ground Scanning<span class="required">*</span>:
                <input type="text" name="c4_ground_scan" id="c4_ground_scan" class="form-control col-lg-4" value="{{old('c4_ground_scan')}}"> meter
                @error('c4_scan_res')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
                @error('c4_ground_scan')
                    <div style="margin-left:313px;color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>