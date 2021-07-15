<div class="card card-primary div_c6" id="div_c6">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse6">
            <h4 class="card-title">
                <?php echo __('lang.accord_6'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse6" class="panel-collapse collapse" data-parent="#div_c6">
        <div class="card-body">
            <div class="form-group row">
                Collection Name<span class="required">*</span>:
                <input type="text" name="c6_collection_name" id="c6_collection_name" class="form-control col-lg-4" value="{{old('c6_collection_name')}}"> 
                &nbsp;&nbsp;&nbsp;
                Collection Identification<span class="required">*</span>:
                <input type="text" name="c6_collection_id" id="c6_collection_id" class="form-control col-lg-4" value="{{old('c6_collection_id')}}"> 
                @error('c6_collection_name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
                @error('c6_collection_id')
                    <div style="margin-left:313px;color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>