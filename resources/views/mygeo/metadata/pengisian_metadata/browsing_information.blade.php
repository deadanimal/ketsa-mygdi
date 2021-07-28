<div class="card card-primary mb-4 div_c10" id="div_c10">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse10">
                <?php echo __('lang.accord_10'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
        <div class="card-body">
            <h2 class="heading-small text-muted">Browsing Graphic</h2>
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name">
                            File Name
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c10_file_name" id="c10_file_name" class="form-control form-control-sm ml-3" value="{{old('c10_file_name')}}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type">
                            File Type
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c10_file_type" id="c10_file_type" class="form-control form-control-sm ml-3" value="{{old('c10_file_type')}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_url">
                            URL
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c10_file_url" id="c10_file_type" class="form-control form-control-sm ml-3" value="{{old('c10_file_url')}}">
                    </div>
                </div>
            </div>
            <h2 class="heading-small text-muted">Keywords</h2>
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name">
                            Keywords<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3">
                        @error('c10_keyword')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type">
                            Additional Keywords
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_url">
                            Additional Keywords
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
