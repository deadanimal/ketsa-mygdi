<div class="card card-primary mb-4 div_c6" id="div_c6">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse6">
            <h4 class="card-title">
                <?php echo __('lang.accord_6'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal6">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal6">Catatan</button>
        @endif
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="row">
                <?php 
                foreach($template->template[strtolower($catSelected)]['accordion6'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
<<<<<<< HEAD
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
=======
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ $metadataxml->customInputs->accordion6->$key }}"/>
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="row">
                <?php 
                foreach($template->template[strtolower($catSelected)]['accordion6'] as $key=>$val){
                    if($key == "c6_collection_name"){
                        ?>
<<<<<<< HEAD
                        <div class="col-xl-7">
=======
                        <div class="col-xl-7" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
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
                        <?php
                    }
                    if($key == "c6_collection_id"){
                        ?>
<<<<<<< HEAD
                        <div class="col-xl-5">
=======
                        <div class="col-xl-5" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
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
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
