<div class="card card-primary mb-4 div_c13" id="div_c13">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
            <a data-toggle="collapse" href="#collapse13">
                <?php echo __('lang.accord_13'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse13" class="panel-collapse collapse in" data-parent="#div_c13">
        <div class="card-body">
            <?php
            foreach($template->template[strtolower($catSelected)]['accordion13'] as $key=>$val){
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
                if($key == "c13_ref_sys_identify"){
                    ?>
                    <div class="row mb-5" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-xl-4">
                            <b for="input-system-identifier" data-toggle="tooltip"
                                title="Sistem rujukan bagi maklumat geospatial">
                                <?php echo __('lang.reference_system_identifier'); ?>
                                <?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                            </b>
                            <span style="float: right;">: </span>
                        </div>
                        <div class="col-xl-4">
                            <select class="form-control form-control-sm" name="c13_ref_sys_identify" id="c13_ref_sys_identify">
                                <option selected disabled>Pilih...</option>
                                <?php
                                if (count($refSys) > 0) {
                                    foreach ($refSys as $ids) {
                                        $class = "";
                                        if($ids->name == "UTM ZON 47" ||
                                                $ids->name == "UTM ZON 48" ||
                                                $ids->name == "UTM ZON 49" ||
                                                $ids->name == "UTM ZON 50"
                                        ){
                                            $class = "refSys_Services";
                                        }

                                        if ($ids->id == old('c13_ref_sys_identify')) {
                                            ?><option value="<?php echo $ids->id; ?>" selected class="<?php echo $class; ?>">
                                    <?php echo $ids->name; ?></option><?php
                                        } else {
                                            ?><option value="<?php echo $ids->id; ?>"
                                    class="<?php echo $class; ?>"><?php echo $ids->name; ?></option><?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <div class="row mb-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion13'] as $key=>$val){
                    if($key == "refsys_projection"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-6"><b><?php echo __('lang.projection'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?></b></div>
                            <div class="col-6">
                                : &nbsp; <input style="width: 290px;display:inline-block;" class="form-control form-control-sm" type="text" name="refsys_projection"
                                    id="refsys_projection" readonly value="{{ old('refsys_projection') }}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "refsys_axis_units"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-6"><b><?php echo __('lang.axis_units'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?></b></div>
                            <div class="col-6">: &nbsp; <input style="width: 290px;display:inline-block;" class="form-control form-control-sm" type="text" name="refsys_axis_units"
                                    id="refsys_axis_units" readonly value="{{ old('refsys_axis_units') }}"></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            
            
            <div class="row mb-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion13'] as $key=>$val){
                    if($key == "refsys_semiMajorAxis"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-6"><b><?php echo __('lang.semi_major_axis'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?></b></div>
                            <div class="col-6">
                                : &nbsp; <input style="width: 290px;display:inline-block;" class="form-control form-control-sm" type="text" name="refsys_semiMajorAxis"
                                    id="refsys_semiMajorAxis" readonly value="{{ old('refsys_semiMajorAxis') }}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "refsys_axis_units"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-6"><b><?php echo __('lang.datum'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?></b></div>
                            <div class="col-6">
                                : &nbsp; <input style="width: 290px;display:inline-block;" class="form-control form-control-sm" type="text" name="refsys_datum" id="refsys_datum"
                                    readonly value="{{ old('refsys_datum') }}">
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            
            
            <div class="row mb-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion13'] as $key=>$val){
                    if($key == "refsys_ellipsoid"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-6"><b><?php echo __('lang.ellipsoid'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?></b></div>
                            <div class="col-6">
                                : &nbsp; <input style="width: 290px;display:inline-block;" class="form-control form-control-sm" type="text" name="refsys_ellipsoid"
                                    id="refsys_ellipsoid" readonly value="{{ old('refsys_ellipsoid') }}">
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "refsys_denomFlatRatio"){
                        ?>
                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-6"><b><?php echo __('lang.denominator_of_flattening_ratio'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?></b></div>
                            <div class="col-6">
                                : &nbsp; <input style="width: 290px;display:inline-block;" class="form-control form-control-sm" type="text" name="refsys_denomFlatRatio"
                                    id="refsys_denomFlatRatio" readonly value="{{ old('refsys_denomFlatRatio') }}">
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
        if(null !== old('c13_ref_sys_identify')){
            ?>
        $("#c13_ref_sys_identify").val("<?php echo old('c13_ref_sys_identify'); ?>").change();
        <?php
        }
        ?>
    });
</script>
