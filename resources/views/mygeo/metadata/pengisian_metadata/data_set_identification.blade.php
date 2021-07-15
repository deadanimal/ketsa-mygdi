<div class="card card-primary div_c12" id="div_c12">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse12">
            <h4 class="card-title">
                <?php echo __('lang.accord_12'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse12" class="panel-collapse collapse" data-parent="#div_c12">
        <div class="card-body">
            <div class="form-group row">
                Data Set Type:
                <select name="c12_dataset_type" id="c12_dataset_type" class="form-control col-lg-2"> 
                    <option value="Grid" {{(old('c12_dataset_type') == 'grid' ? "selected":"")}}>Grid</option>
                    <option value="Stereo Model" {{(old('c12_dataset_type') == 'stereo_model' ? "selected":"")}}>Stereo Model</option>
                    <option value="Text Table" {{(old('c12_dataset_type') == 'text_table' ? "selected":"")}}>Text Table</option>
                    <option value="Tin" {{(old('c12_dataset_type') == 'tin' ? "selected":"")}}>Tin</option>
                    <option value="Vector" {{(old('c12_dataset_type') == 'vector' ? "selected":"")}}>Vector</option>
                    <option value="Video" {{(old('c12_dataset_type') == 'video' ? "selected":"")}}>Video</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    Scale in Hardcopy / Softcopy (feature scale):
                    <input type="text" name="c12_feature_scale" id="c12_feature_scale" class="form-control col-lg-7" placeholder="10:50000" value="{{old('c12_feature_scale')}}"> 
                    &nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-lg-4">
                    Image Resolution (GSD):
                    <div class="input-group mb-3">
                        <input type="text" class="form-control col-lg-5" name="c12_image_res" id="c12_image_res" placeholder="10.5" value="{{old('c12_image_res')}}">
                        <div class="input-group-append">
                            <span class="input-group-text">meter</span>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-lg-4">
                    Language:
                    <select name="c12_language" id="c12_language" class="form-control col-lg-7"> 
                        <option value="English" {{(old('c12_language') == 'english' ? "selected":"")}}>English</option>
                        <option value="Bahasa Malaysia" {{(old('c12_language') == 'bahasa_malaysia' ? "selected":"")}}>Bahasa Malaysia</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>