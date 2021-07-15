<div class="card card-primary div_c10" id="div_c10">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse10">
            <h4 class="card-title">
                <?php echo __('lang.accord_10'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
        <div class="card-body">
            <div class="form-group row">
                <b>Browsing Graphic</b>
                <table style="width:100%;">
                    <tr>
                        <td>File Name:</td>
                        <td>
                            <input type="text" name="c10_file_name" id="c10_file_name" class="form-control col-lg-4" value="{{old('c10_file_name')}}">
                        </td>
                    </tr>
                    <tr>
                        <td>File Type:</td>
                        <td>
                            <input type="text" name="c10_file_type" id="c10_file_type" class="form-control col-lg-4" value="{{old('c10_file_type')}}">
                        </td>
                    </tr>
                    <tr>
                        <td>URL:</td>
                        <td>
                            <input type="text" name="c10_file_url" id="c10_file_url" class="form-control col-lg-4" value="{{old('c10_file_url')}}">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group row">
                <b>Keyword</b>
                <table style="width:100%;">
                    <tr>
                        <td>Keyword<span class="required">*</span>:</td>
                        <td>
                            <input type="text" name="c10_keyword" id="c10_keyword" class="form-control col-lg-4" value="{{old('c10_keyword')}}">
                            @error('c10_keyword')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Additional Keyword:</td>
                        <td>
                            <input type="text" name="c10_additional_keyword[]" class="form-control col-lg-4">
                        </td>
                    </tr>
                    <tr>
                        <td>Additional Keyword:</td>
                        <td>
                            <input type="text" name="c10_additional_keyword[]" class="form-control col-lg-4">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>