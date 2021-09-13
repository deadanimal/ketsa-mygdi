<div class="card card-primary mb-4 div_c6" id="div_c6">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse6">
            <h4 class="card-title">
                <?php echo __('lang.accord_6'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal6">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal6">Catatan</button>
        @endif
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="row">
                @if($elemenMetadata['c6_collection_name']->status == '1')
                <div class="col-xl-7">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3">
                            Collection Name<span class="text-warning">*</span>
                        </div>
                        <?php
                        $colName = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString != "") {
                            $colName = $metadataxml->identificationInfo->MD_DataIdentification->collectionName->CharacterString;
                        }
                        ?>
                        <input type="text" name="c6_collection_name" id="c6_collection_name" class="form-control form-control-sm" value="{{ $colName }}" style="width :280px" placeholder="Insert Collection Name">
                    </div>
                    @error('c6_collection_name')
                    <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>
                @endif
                @if($elemenMetadata['c6_collection_id']->status == '1')
                <div class="col-xl-5">
                    <div class="form-inline">
                        <div class="form-control-label mr-3">
                            Collection Identification<span class="text-warning">*</span>
                            <?php
                            $collId = "";
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString != "") {
                                $collId = $metadataxml->identificationInfo->MD_DataIdentification->collectionIdentification->CharacterString;
                            }
                            ?>
                            <input type="text" name="c6_collection_id" id="c6_collection_id" value="{{ $collId }}" class="form-control form-control-sm" style="width :150px" placeholder="Identification">
                        </div>
                        @error('c6_collection_id')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
