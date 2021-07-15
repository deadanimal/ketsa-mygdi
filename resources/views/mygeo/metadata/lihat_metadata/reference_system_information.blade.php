<div class="card card-primary div_c13" id="div_c13">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse13">
            <h4 class="card-title">
                <?php echo __('lang.accord_13'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse13" class="panel-collapse collapse" data-parent="#div_c13">
        <div class="card-body">
            <div class="form-group row">
                Reference System Identifier:
                <?php
                if(!empty($refSys) > 0){
                    echo "&nbsp;&nbsp;<p>".$refSys->name."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                <table>
                    <tr>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;" for="c3_1"><b>Projection:</b>{{$refSys->projection}}</label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;" for="c3_2"><b>Semi Major Axis:</b>{{$refSys->semi_major_axis}}</label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;" for="c3_3"><b>Ellipsoid:</b>{{$refSys->ellipsoid}}</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;" for="c3_4"><b>Axis Units:</b>{{$refSys->axis_units}}</label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;" for="c3_5"><b>Datum:</b>{{$refSys->datum}}</label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;" for="c3_6"><b>Denominator of Flattening Ratio:</b>{{$refSys->denominator_flattening_ratio}}</label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>