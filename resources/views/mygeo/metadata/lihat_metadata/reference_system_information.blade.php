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
                    ?>
                </div>
            </div>
            <div class="form-group row my-4">
                <div class="col-xl-12">
                    <table>
                        <tr>
                            <td>
                                <?php
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->projection->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->projection->RS_Identifier->codeSpace->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->projection->RS_Identifier->codeSpace->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_1"><b>Projection:</b>{{ $var }}</label>
                            </td>
                            <td>
                                <?php
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->semiMajorAxis->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->semiMajorAxis->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->semiMajorAxis->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_2"><b>Semi Major Axis:</b>{{ $var }}</label>
                            </td>
                            <td>
                                <?php
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoid->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoid->RS_Identifier->codeSpace->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoid->RS_Identifier->codeSpace->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_3"><b>Ellipsoid:</b>{{ $var }}</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->axisUnits->UomLength) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->axisUnits->UomLength != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->axisUnits->UomLength;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_4"><b>Axis Units:</b>{{ $var }}</label>
                            </td>
                            <td>
                                <?php
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->datum->RS_Identifier->codeSpace->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->datum->RS_Identifier->codeSpace->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->datum->RS_Identifier->codeSpace->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_5"><b>Datum:</b>{{ $var }}</label>
                            </td>
                            <td>
                                <?php
                                $var = "";
                                if (isset($metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->denominatorOfFlatteningRatio->CharacterString) && $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->denominatorOfFlatteningRatio->CharacterString != '') {
                                    $var = $metadataxml->referenceSystemInfo->MD_CRS->ellipsoidParameters->MD_EllipsoidParameters->denominatorOfFlatteningRatio->CharacterString;
                                }
                                ?>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_6"><b>Denominator of Flattening Ratio:</b>{{ $var }}</label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
