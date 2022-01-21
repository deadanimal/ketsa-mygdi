<div class="card card-primary mb-4 div_c13" id="div_c13">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse13">
                <?php echo __('lang.accord_13'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse13" class="panel-collapse collapse in" data-parent="#div_c13">
        <div class="card-body">
            <div class="sortableContainer1">
                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['c13_ref_sys_identify']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b for="input-system-identifier" data-toggle="tooltip" title="Sistem rujukan bagi maklumat geospatial">
                                <?php echo __('lang.reference_system_identifier'); ?>
                            </b>
                            <select class="form-control form-control-sm sortable" name="c13_ref_sys_identify" id="c13_ref_sys_identify">
                                <option selected disabled>Pilih...</option>
                                <?php
                                if (count($refSys) > 0) {
                                    foreach ($refSys as $ids) {
                                        $class = "";
                                        if ($ids->name == "UTM ZON 47" ||
                                                $ids->name == "UTM ZON 48" ||
                                                $ids->name == "UTM ZON 49" ||
                                                $ids->name == "UTM ZON 50"
                                        ) {
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
                    <span class="close btnClose">&times;</span>
                </div>
                @endif

                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['refsys_projection']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b><?php echo __('lang.projection'); ?> :</b>
                            <input class="form-control form-control-sm sortable" type="text" name="refsys_projection" id="refsys_projection" readonly value="{{ old('refsys_projection') }}">
                        </div>
                    </div>
                    <span class="close btnClose">&times;</span>
                </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['refsys_axis_units']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b><?php echo __('lang.axis_units'); ?> :</b>
                            <input class="form-control form-control-sm sortable" type="text" name="refsys_axis_units" id="refsys_axis_units" readonly value="{{ old('refsys_axis_units') }}">
                        </div>
                    </div>
                    <span class="close btnClose">&times;</span>
                </div>
                @endif


                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['refsys_semiMajorAxis']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b><?php echo __('lang.semi_major_axis'); ?> :</b>
                            <input class="form-control form-control-sm sortable" type="text" name="refsys_semiMajorAxis" id="refsys_semiMajorAxis" readonly value="{{ old('refsys_semiMajorAxis') }}">
                        </div>
                    </div>
                    <span class="close btnClose">&times;</span>
                </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['refsys_datum']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b><?php echo __('lang.datum'); ?> :</b>
                            <input class="form-control form-control-sm sortable" type="text" name="refsys_datum" id="refsys_datum" readonly value="{{ old('refsys_datum') }}">
                        </div>
                    </div>
                    <span class="close btnClose">&times;</span>
                </div>
                @endif


                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['refsys_ellipsoid']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b><?php echo __('lang.ellipsoid'); ?> :</b>
                            <input class="form-control form-control-sm sortable" type="text" name="refsys_ellipsoid" id="refsys_ellipsoid" readonly value="{{ old('refsys_ellipsoid') }}">
                        </div>
                    </div>
                    <span class="close btnClose">&times;</span>
                </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion13']['refsys_denomFlatRatio']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <b><?php echo __('lang.denominator_of_flattening_ratio'); ?> :</b>
                            <input class="form-control form-control-sm sortable" type="text" name="refsys_denomFlatRatio" id="refsys_denomFlatRatio" readonly value="{{ old('refsys_denomFlatRatio') }}">
                        </div>
                    </div>
                    <span class="close btnClose">&times;</span>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var refSys = <?php echo json_encode($refSys); ?>;

        $(document).on("change", "#c13_ref_sys_identify", function () {
            var selectedId = $(this).val();
            $.each(refSys, function (key, val) {
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
if (null !== old('c13_ref_sys_identify')) {
    ?>
            $("#c13_ref_sys_identify").val("<?php echo old('c13_ref_sys_identify'); ?>").change();
    <?php
}
?>
    });
</script>
