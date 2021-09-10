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
                                <label class="form-check-label" style="margin-left:20px;" for="c3_1"><b>Projection:</b>{{(isset($refSys->projection) ? $refSys->projection:"")}}</label>
                            </td>
                            <td>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_2"><b>Semi Major Axis:</b>{{(isset($refSys->semi_major_axis) ? $refSys->semi_major_axis:"")}}</label>
                            </td>
                            <td>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_3"><b>Ellipsoid:</b>{{(isset($refSys->ellipsoid) ? $refSys->ellipsoid:"")}}</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_4"><b>Axis Units:</b>{{(isset($refSys->axis_units) ? $refSys->axis_units:"")}}</label>
                            </td>
                            <td>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_5"><b>Datum:</b>{{(isset($refSys->datum) ? $refSys->datum:"")}}</label>
                            </td>
                            <td>
                                <label class="form-check-label" style="margin-left:20px;" for="c3_6"><b>Denominator of Flattening Ratio:</b>{{(isset($refSys->denominator_flattening_ratio) ? $refSys->denominator_flattening_ratio:"")}}</label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
