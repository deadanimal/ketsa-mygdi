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
                <select name="c13_ref_sys_identify" id="c13_ref_sys_identify" class="form-control col-lg-2"> 
                    <option selected disabled>Select Identifier</option>
                    <?php
                    if (count($refSys) > 0) {
                        foreach ($refSys as $ids) {
                            if($ids->id == old('c13_ref_sys_identify')){
                                ?><option value="<?php echo $ids->id; ?>" selected><?php echo $ids->name; ?></option><?php
                            }else{
                                ?><option value="<?php echo $ids->id; ?>"><?php echo $ids->name; ?></option><?php
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group row">
                <table>
                    <tr>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;">
                                <b>Projection:</b>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="refsys_projection" id="refsys_projection" readonly value="{{old('refsys_projection')}}">
                            </label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;">
                                <b>Semi Major Axis:</b>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="refsys_semiMajorAxis" id="refsys_semiMajorAxis" readonly value="{{old('refsys_semiMajorAxis')}}">
                            </label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;">
                                <b>Ellipsoid:</b>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="refsys_ellipsoid" id="refsys_ellipsoid" readonly value="{{old('refsys_ellipsoid')}}">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;">
                                <b>Axis Units:</b>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="refsys_axis_units" id="refsys_axis_units" readonly value="{{old('refsys_axis_units')}}">
                            </label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;">
                                <b>Datum:</b>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="refsys_datum" id="refsys_datum" readonly value="{{old('refsys_datum')}}">
                            </label>
                        </td>
                        <td>
                            <label class="form-check-label" style="margin-left:20px;">
                                <b>Denominator of Flattening Ratio:</b>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="refsys_denomFlatRatio" id="refsys_denomFlatRatio" readonly value="{{old('refsys_denomFlatRatio')}}">
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var refSys = <?php echo json_encode($refSys); ?>;
    
        $(document).on("change","#c13_ref_sys_identify",function(){
            var selectedId = $(this).val();
            $.each(refSys,function(key,val) {
                if(val.id == selectedId){
                    $("#refsys_projection").val(val.projection);
                    $("#refsys_semiMajorAxis").val(val.semi_major_axis);
                    $("#refsys_ellipsoid").val(val.ellipsoid);
                    $("#refsys_axis_units").val(val.axis_units);
                    $("#refsys_datum").val(val.datum);
                    $("#refsys_denomFlatRatio").val(val.denominator_flattening_ratio);
                }
            });
        });
    });
</script>