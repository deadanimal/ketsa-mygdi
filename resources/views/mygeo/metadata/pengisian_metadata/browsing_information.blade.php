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
            <div class="my-2">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-muat-naik-contohJenisMetadata">
                    Contoh jenis metadata yang dimasukkan
                </button>
            </div>
            <br>
            <h2 class="heading-small text-muted"><?php echo __('lang.browsingGraphic'); ?></h2>
            <div class="my-2">
                @if($elemenMetadata['c10_file_name']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name" data-toggle="tooltip" title="Pengisian nama fail mengambarkan maklumat geospatial secara grafik (sekiranya ada)">
                            <?php echo __('lang.file_name'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c10_file_name" id="c10_file_name" class="form-control form-control-sm ml-3" value="{{old('c10_file_name')}}">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_file_type']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type" data-toggle="tooltip" title="Jenis format grafikberkenaan (JPEG, GIF, TIFF, XWD, EPS, CGM, PBM)">
                            <?php echo __('lang.file_type'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c10_file_type" id="c10_file_type" class="form-control form-control-sm ml-3" value="{{old('c10_file_type')}}">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_file_url']->status == '1')
                <div class="row mb-2 divBrowsingInformationUrl">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_url" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">
                            <?php echo __('lang.URL'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputBrowsingInformationUrl urlToTest" value="{{old('c10_file_url')}}">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-sm btn-success btnTestUrl" type="button" data-toggle="modal" data-target="#modal-showweb" data-backdrop="false">Test</button>
                        @error('c2_serviceUrl')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endif
            </div>
            <h2 class="heading-small text-muted"><?php echo __('lang.keywords'); ?></h2>
            <div class="my-2">
                @if($elemenMetadata['c10_keyword']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_name" data-toggle="tooltip" title="Kata Kunci (Carian)/ Keyword bagimaklumat geospatial berkenaan. Keyword perlu dimasukkan berdasarkankepada tajuk maklumat geospatial dengan bahasa bilingual (Bahasa Malaysia dan English). ">
                            <?php echo __('lang.keywords'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_keyword" id="c10_keyword" class="form-control form-control-sm ml-3" value="{{ old('c10_keyword') }}">
                        @error('c10_keyword')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_additional_keyword[]']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_type" data-toggle="tooltip" title="">
                            <?php echo __('lang.additional_keywords'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3" value="{{ (isset(old('c10_additional_keyword')[0]) ? old('c10_additional_keyword')[0]:"") }}">
                    </div>
                </div>
                @endif
                @if($elemenMetadata['c10_additional_keyword[]']->status == '1')
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c10_file_url" data-toggle="tooltip" title="">
                            <?php echo __('lang.additional_keywords'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_additional_keyword[]" class="form-control form-control-sm ml-3" value="{{ (isset(old('c10_additional_keyword')[1]) ? old('c10_additional_keyword')[1]:"") }}">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
