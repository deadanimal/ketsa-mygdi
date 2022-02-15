<div class="card card-primary mb-4 div_c4" id="div_c4">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse4">
            <h4 class="card-title">
                <?php echo __('lang.accord_4'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal4">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal4">Catatan</button>
        @endif
    </div>
    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion4'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion4'] as $key=>$val){
                    if($key == "c4_scan_res"){
                        ?>
                        <div class="col-xl-6">
                            <div class="form-inline ml-3">
                                <div class="form-control-label mr-3">
                                    Scanning Resolution<span class="text-warning">*</span> :
                                </div>
                                <?php
                                $scanRes = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString != "") {
                                    $scanRes = $metadataxml->identificationInfo->MD_DataIdentification->scanningResolution->CharacterString;
                                }
                                ?>
                                <input type="text" name="c4_scan_res" id="c4_scan_res" class="form-control form-control-sm" style="width :100px" placeholder="0.0" value="{{ $scanRes }}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                                @error('c4_scan_res')
                                <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>    
                        <?php
                    }
                    if($key == "c4_ground_scan"){
                        ?>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Ground Scanning<span class="text-warning">*</span> :
                                </div>
                                <?php
                                $groundScan = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal != "") {
                                    $groundScan = $metadataxml->identificationInfo->MD_DataIdentification->groundScanning->Decimal;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="text" name="c4_ground_scan" id="c4_ground_scan" style="width :100px" placeholder="0.0" value="{{ $groundScan }}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                                @error('c4_ground_scan')
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
