<div class="card card-primary mb-4 div_c5" id="div_c5">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse5">
            <h4 class="card-title">
                <?php echo __('lang.accord_5'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal5">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal5">Catatan</button>
        @endif
    </div>
    <div id="collapse5" class="panel-collapse collapse in show" data-parent="#div_c5">
        <div class="card-body">
            <div class="row">
                <?php 
                foreach($template->template[strtolower($catSelected)]['accordion5'] as $key=>$val){
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
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ $metadataxml->customInputs->accordion5->$key }}"/>
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
                foreach($template->template[strtolower($catSelected)]['accordion5'] as $key=>$val){
                    if($key == "c5_process_lvl"){
                        ?>
<<<<<<< HEAD
                        <div class="col-xl-6">
=======
                        <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                            <div class="form-inline ml-3">
                                <div class="form-control-label mr-3">
                                    Process Level
                                </div>
                                <?php
                                $processLevel = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString != "") {
                                    $processLevel = $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString;
                                }
                                ?>
                                <input type="text" name="c5_process_lvl" id="c5_process_lvl" class="form-control form-control-sm" value="{{ $processLevel }}" style="width :120pxpx" placeholder="Insert Process Level">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c5_resolution"){
                        ?>
<<<<<<< HEAD
                        <div class="col-xl-6">
=======
                        <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Resolution
                                </div>
                                <?php
                                $res = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal != "") {
                                    $res = $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal;
                                }
                                ?>
                                <input type="text" name="c5_resolution" id="c5_resolution" class="form-control form-control-sm" value="{{ $res }}" style="width :100px" placeholder="0.0">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
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
