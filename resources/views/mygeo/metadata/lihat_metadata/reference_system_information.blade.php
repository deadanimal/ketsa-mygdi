<div class="card card-primary div_c13" id="div_c13">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse13">
            <h4 class="card-title">
                <?php echo __('lang.accord_13'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse13" class="panel-collapse collapse in show" data-parent="#div_c13">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-xl-3">
                    <label class="form-control-label" for="input-system-identifier">
                        Reference System Identifier<span class="ml-3">:</span>
                    </label>
                </div>
                <div class="col-xl-3">
                    <?php
                    if (!empty($refSys) > 0) {
                        echo "&nbsp;&nbsp;<p>" . $refSys->name . "</p>";
                    }
                    foreach($template->template[strtolower($catSelected)]['accordion13'] as $key=>$val){
                        if($val['status'] == "customInput"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    {{ $metadataxml->customInputs->accordion13->$key }}
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row my-4">
                <div class="col-xl-12">
                    <table>
                        <?php
                        $counter = 1;
                        foreach($template->template[strtolower($catSelected)]['accordion13'] as $key=>$val){
                            if($key == "c13_ref_sys_identify"){
                                continue;
                            }
                            if($counter == 1 || $counter == 4){
                                ?><tr><td><?php
                            }else{
                                ?><td><?php
                            }
                            if($key == "refsys_projection"){
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->projection->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->projection->RS_Identifier->codeSpace->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->projection->RS_Identifier->codeSpace->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <b>Projection:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_projection" id="refsys_projection" class="form-control form-control-sm" readonly value="{{ $var }}">
                                </label>
                                <?php
                            }
                            if($key == "refsys_semiMajorAxis"){
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->semiMajorAxis->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->semiMajorAxis->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->semiMajorAxis->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <b>Semi Major Axis:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_semiMajorAxis" id="refsys_semiMajorAxis" class="form-control form-control-sm" readonly value="{{ $var }}">
                                </label>
                                <?php
                            }
                            if($key == "refsys_ellipsoid"){
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoid->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoid->RS_Identifier->codeSpace->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoid->RS_Identifier->codeSpace->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <b>Ellipsoid:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_ellipsoid" id="refsys_ellipsoid" class="form-control form-control-sm" readonly value="{{ $var }}">
                                </label>
                                <?php
                            }
                            if($key == "refsys_axis_units"){
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->axisUnits->UomLength) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->axisUnits->UomLength != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->axisUnits->UomLength;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <b>Axis Units:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_axis_units" id="refsys_axis_units" class="form-control form-control-sm" readonly value="{{ $var }}">
                                </label>
                                <?php
                            }
                            if($key == "refsys_datum"){
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->datum->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->datum->RS_Identifier->codeSpace->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->datum->RS_Identifier->codeSpace->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <b>Datum:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_datum" id="refsys_datum" class="form-control form-control-sm" readonly value="{{ $var }}">
                                </label>
                                <?php
                            }
                            if($key == "refsys_denomFlatRatio"){
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->denominatorOfFlatteningRatio->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->denominatorOfFlatteningRatio->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->denominatorOfFlatteningRatio->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <b>Denominator of Flattening Ratio:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_denomFlatRatio" id="refsys_denomFlatRatio" class="form-control form-control-sm" readonly value="{{ $var }}">
                                </label>
                                <?php
                            }
                            if($counter == 3 || $counter == 6){
                                ?></td></tr><?php
                            }else{
                                ?></td><?php
                            }
                            $counter++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
