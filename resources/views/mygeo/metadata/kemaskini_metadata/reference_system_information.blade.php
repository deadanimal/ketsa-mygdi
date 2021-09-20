<div class="card card-primary mb-4 div_c13" id="div_c13">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse13">
            <h4 class="card-title">
                <?php echo __('lang.accord_13'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal13">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal13">Catatan</button>
        @endif
    </div>
    <div id="collapse13" class="panel-collapse collapse in show" data-parent="#div_c13">
        <div class="card-body">
            @if($elemenMetadata['c13_ref_sys_identify']->status == '1')
            <div class="row mb-2">
                <div class="col-xl-3">
                    <label class="form-control-label" for="input-system-identifier">
                        Reference System Identifier
                    </label>
                </div>
                <div class="col-xl-3">
                    <select class="form-control form-control-sm" name="c13_ref_sys_identify" id="c13_ref_sys_identify" readonly>
                        <option selected disabled>Pilih...</option>
                        <?php
                        if (count($refSys) > 0) {
                            foreach ($refSys as $ids) {
                                $class = "";
                                if($ids->name == "UTM ZON 47" ||
                                        $ids->name == "UTM ZON 48" ||
                                        $ids->name == "UTM ZON 49" ||
                                        $ids->name == "UTM ZON 50" ||
                                        $ids->name == "ESPG" ||
                                        $ids->name == "SR-ORG" ||
                                        $ids->name == "ESRI" ||
                                        $ids->name == "Unknown / Not Geo Reference"
                                ){
                                    $class = "refSys_Services";
                                }
                                
                                if (isset($refSysSelected->id) && $ids->id == $refSysSelected->id) {
                                    ?><option value="<?php echo $ids->id; ?>" selected class="<?php echo $class; ?>"><?php echo $ids->name; ?></option><?php
                                } else {
                                    ?><option value="<?php echo $ids->id; ?>" class="<?php echo $class; ?>"><?php echo $ids->name; ?></option><?php
                                }
                            }
                        }                                                                                                                                   ?>
                    </select>
                </div>
            </div>
            @endif
            <div class="form-group row">
                <div class="col-xl-12">
                    <table>
                        <tr>
                            <td>
                                @if($elemenMetadata['refsys_projection']->status == '1')
                                <label class="form-check-label" style="margin-left:20px;">
                                    <b>Projection:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_projection" id="refsys_projection" class="form-control form-control-sm" readonly value="{{old('refsys_projection')}}">
                                </label>
                                @endif
                            </td>
                            <td>
                                @if($elemenMetadata['refsys_semiMajorAxis']->status == '1')
                                <label class="form-check-label" style="margin-left:20px;">
                                    <b>Semi Major Axis:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_semiMajorAxis" id="refsys_semiMajorAxis" class="form-control form-control-sm" readonly value="{{old('refsys_semiMajorAxis')}}">
                                </label>
                                @endif
                            </td>
                            <td>
                                @if($elemenMetadata['refsys_ellipsoid']->status == '1')
                                <label class="form-check-label" style="margin-left:20px;">
                                    <b>Ellipsoid:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_ellipsoid" id="refsys_ellipsoid" class="form-control form-control-sm" readonly value="{{old('refsys_ellipsoid')}}">
                                </label>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @if($elemenMetadata['refsys_axis_units']->status == '1')
                                <label class="form-check-label" style="margin-left:20px;">
                                    <b>Axis Units:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_axis_units" id="refsys_axis_units" class="form-control form-control-sm" readonly value="{{old('refsys_axis_units')}}">
                                </label>
                                @endif
                            </td>
                            <td>
                                @if($elemenMetadata['refsys_datum']->status == '1')
                                <label class="form-check-label" style="margin-left:20px;">
                                    <b>Datum:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_datum" id="refsys_datum" class="form-control form-control-sm" readonly value="{{old('refsys_datum')}}">
                                </label>
                                @endif
                            </td>
                            <td>
                                @if($elemenMetadata['refsys_denomFlatRatio']->status == '1')
                                <label class="form-check-label" style="margin-left:20px;">
                                    <b>Denominator of Flattening Ratio:</b>&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="refsys_denomFlatRatio" id="refsys_denomFlatRatio" class="form-control form-control-sm" readonly value="{{old('refsys_denomFlatRatio')}}">
                                </label>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var refSys = <?php echo json_encode($refSys); ?>;

        $(document).on("change", "#c13_ref_sys_identify", function() {
            var selectedId = $(this).val();
            $.each(refSys, function(key, val) {
                if (val.id == selectedId) {
                    $("#refsys_projection").val(val.projection);
                    $("#refsys_semiMajorAxis").val(val.semi_major_axis);
                    $("#refsys_ellipsoid").val(val.ellipsoid);
                    $("#refsys_axis_units").val(val.axis_units);
                    $("#refsys_datum").val(val.datum);
                    $("#refsys_denomFlatRatio").val(val.denominator_flattening_ratio);
                }
            });
        });

        <?php
        if(isset($refSysSelected->id)){
            ?>
            $("#c13_ref_sys_identify").val("{{ $refSysSelected->id }}").trigger('change');
            <?php
        }
        ?>
    });
</script>
