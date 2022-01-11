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
            <div class="sortableContainer1">
                @if($template->template[strtolower($_GET['kategori'])]['accordion6']['c6_collection_name']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-7">
                            <div class="form-inline ml-3">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan nama kumpulan GCP yang diambil/ dicerap">
                                    <?php echo __('lang.collection_name'); ?><span class="text-warning">*</span>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :280px" placeholder="Insert Collection Name" name="c6_collection_name" id="c6_collection_name" value="{{old('c6_collection_name')}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion6']['c6_collection_id']['status'] == 'active')
                    <div class="row sortIt">
                        <div class="col-xl-5">
                            <div class="form-inline">
                                <div class="form-control-label mr-3" data-toggle="tooltip" title="Maklumat berkaitan bilangan titik GCP ">
                                    <?php echo __('lang.collection_identification'); ?><span class="text-warning">*</span>
                                </div>
                                <input class="form-control form-control-sm sortable" type="text" style="width :150px" placeholder="Identification" name="c6_collection_id" id="c6_collection_id" value="{{old('c6_collection_id')}}">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
