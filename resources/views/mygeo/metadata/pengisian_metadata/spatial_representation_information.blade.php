<div class="card card-primary mb-4 div_c6" id="div_c6">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
            <a data-toggle="collapse" href="#collapse6">
                <?php echo __('lang.accord_6'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="row">
                @if($elemenMetadata['c6_collection_name']->status == '1')
                <div class="col-xl-7">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan nama kumpulan GCP yang diambil/ dicerap">
                            <?php echo __('lang.collection_name'); ?><span class="text-warning">*</span>
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :280px" placeholder="Insert Collection Name" name="c6_collection_name" id="c6_collection_name" value="{{old('c6_collection_name')}}">
                    </div>
                    @error('c6_collection_name')
                    <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>
                @endif
                @if($elemenMetadata['c6_collection_id']->status == '1')
                <div class="col-xl-5">
                    <div class="form-inline">
                        <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan bilangan titik GCP ">
                            <?php echo __('lang.collection_identification'); ?><span class="text-warning">*</span>
                        </div>
                        <input class="form-control form-control-sm" type="text" style="width :150px" placeholder="Identification" name="c6_collection_id" id="c6_collection_id" value="{{old('c6_collection_id')}}">
                    </div>
                    @error('c6_collection_id')
                    <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
