<div class="card card-primary mb-4 div_c6" id="div_c6">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse6">
                <?php echo __('lang.accord_6'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-7">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3">
                            Collection Name<span class="text-warning">*</span>
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :280px" placeholder="Insert Collection Name" name="c6_collection_name" id="c6_collection_name" value="{{old('c6_collection_name')}}">
                    </div>
                    @error('c6_collection_name')
                    <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-xl-5">
                    <div class="form-inline">
                        <div class="form-control-label mr-3">
                            Collection Identification<span class="text-warning">*</span>
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :150px" placeholder="Identification" name="c6_collection_id" id="c6_collection_id" value="{{old('c6_collection_id')}}">
                    </div>
                    @error('c6_collection_id')
                    <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
