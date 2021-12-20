<div class="card card-primary mb-4 div_c13" id="div_c13">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse13">
                <?php echo __('lang.accord_13'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse13" class="panel-collapse collapse in show" data-parent="#div_c13">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-xl-3">
                    <b for="input-system-identifier" data-toggle="tooltip"
                        title="Sistem rujukan bagi maklumat geospatial">
                        <?php echo __('lang.reference_system_identifier'); ?>
                    </b>
                </div>
                <div class="col-xl-3">
                    <select class="form-control form-control-sm" name="c13_ref_sys_identify" id="c13_ref_sys_identify">
                        <option selected disabled>Pilih...</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2"><b><?php echo __('lang.projection'); ?> :</b></div>
                <div class="col-4">
                    <input class="form-control form-control-sm" type="text" name="refsys_projection"
                        id="refsys_projection" readonly value="">
                </div>
                <div class="col-2"><b><?php echo __('lang.axis_units'); ?> :</b></div>
                <div class="col-4"><input class="form-control form-control-sm" type="text" name="refsys_axis_units"
                        id="refsys_axis_units" readonly value=""></div>
            </div>
            <div class="row mb-2">
                <div class="col-2"><b><?php echo __('lang.semi_major_axis'); ?> :</b></div>
                <div class="col-4">
                    <input class="form-control form-control-sm" type="text" name="refsys_semiMajorAxis"
                        id="refsys_semiMajorAxis" readonly value="">
                </div>
                <div class="col-2"><b><?php echo __('lang.datum'); ?> :</b></div>
                <div class="col-4">
                    <input class="form-control form-control-sm" type="text" name="refsys_datum" id="refsys_datum"
                        readonly value="">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2"><b><?php echo __('lang.ellipsoid'); ?> :</b></div>
                <div class="col-4">
                    <input class="form-control form-control-sm" type="text" name="refsys_ellipsoid"
                        id="refsys_ellipsoid" readonly value="">
                </div>
                <div class="col-2"><b><?php echo __('lang.denominator_of_flattening_ratio'); ?> :</b></div>
                <div class="col-4">
                    <input class="form-control form-control-sm" type="text" name="refsys_denomFlatRatio"
                        id="refsys_denomFlatRatio" readonly value="">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    });
</script>
