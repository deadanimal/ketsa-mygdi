<div class="card card-primary mb-4 div_c15" id="div_c15">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse15">
                <?php echo __('lang.accord_15'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse15" class="panel-collapse collapse in " data-parent="#div_c15">
        <div class="card-body">
            <div class="sortableContainer1">
                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_data_quality_info']['status'] == 'active')
                        <div class="row sortIt">
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-DQscope" data-toggle="tooltip" title="Pengisian secara Pilihan: Skop DQ"><?php echo __('lang.dq_scope'); ?>
                                    </label>
                                    <select name="c15_data_quality_info" id="c15_data_quality_info" class="form-control form-control-sm">
                                        <option value="">Pilih...</option>
                                        <option value="Attribute"
                                                {{ old('c15_data_quality_info') == 'Attribute' ? 'selected' : '' }}>Attribute
                                        </option>
                                        <option value="Attribute Type"
                                                {{ old('c15_data_quality_info') == 'Attribute Type' ? 'selected' : '' }}>Attribute
                                            Type</option>
                                        <option value="Collection Session"
                                                {{ old('c15_data_quality_info') == 'Collection Session' ? 'selected' : '' }}>
                                            Collection Session</option>
                                        <option value="Dataset"
                                                {{ old('c15_data_quality_info') == 'Dataset' ? 'selected' : '' }}>Dataset</option>
                                        <option value="Series"
                                                {{ old('c15_data_quality_info') == 'Series' ? 'selected' : '' }}>
                                            Series</option>
                                        <option value="Feature"
                                                {{ old('c15_data_quality_info') == 'Feature' ? 'selected' : '' }}>Feature</option>
                                        <option value="Dimension Group"
                                                {{ old('c15_data_quality_info') == 'Dimension Group' ? 'selected' : '' }}>
                                            Dimension
                                            Group</option>
                                        <option value="Feature Type"
                                                {{ old('c15_data_quality_info') == 'Feature Type' ? 'selected' : '' }}>Feature
                                            Type
                                        </option>
                                        <option value="Field Session"
                                                {{ old('c15_data_quality_info') == 'Field Session' ? 'selected' : '' }}>Field
                                            Session</option>
                                        <option value="Model" {{ old('c15_data_quality_info') == 'Model' ? 'selected' : '' }}>
                                            Model</option>
                                        <option value="Non Geographic Date Set"
                                                {{ old('c15_data_quality_info') == 'Non Geographic Date Set' ? 'selected' : '' }}>
                                            Non Geographic Date Set</option>
                                        <option value="Property Type"
                                                {{ old('c15_data_quality_info') == 'Property Type' ? 'selected' : '' }}>Property
                                            Type</option>
                                        <option value="Service"
                                                {{ old('c15_data_quality_info') == 'Service' ? 'selected' : '' }}>Service
                                        </option>
                                        <option value="Software"
                                                {{ old('c15_data_quality_info') == 'Software' ? 'selected' : '' }}>Software
                                        </option>
                                        <option value="Tile" {{ old('c15_data_quality_info') == 'Tile' ? 'selected' : '' }}>
                                            Tile</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_data_history']['status'] == 'active')
                        <div class="row sortIt">
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-datahistory">
                                        <?php echo __('lang.data_history'); ?></label>
                                    <input class="form-control form-control-sm" type="text" name="c15_data_history" id="c15_data_history" placeholder="None" value="{{ old('c15_data_history') }}">
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_date']['status'] == 'active')
                        <div class="row sortIt">
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <label class="form-control-label mr-3" for="input-date">
                                        <?php echo __('lang.date_time'); ?>
                                    </label>
                                    <input class="form-control form-control-sm" type="date" name="c15_date" id="c15_date" value="{{ old('c15_date') }}">      
                                </div>
                            </div>
                        </div>
                        @endif

                &nbsp;&nbsp;&nbsp;
                <div class="form-group row col-xl-12 divDataQualityTabs">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness"
                                       role="tab" aria-controls="completeness" aria-selected="true"><?php echo __('lang.completeness'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_consistency" data-toggle="pill" href="#consistency"
                                       role="tab" aria-controls="consistency" aria-selected="false"><?php echo __('lang.conceptualConsistency'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_position_accuracy" data-toggle="pill"
                                       href="#position_accuracy" role="tab" aria-controls="position_accuracy"
                                       aria-selected="false"><?php echo __('lang.positionalAccuracy'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_temp_accuracy" data-toggle="pill"
                                       href="#temp_accuracy" role="tab" aria-controls="temp_accuracy"
                                       aria-selected="false"><?php echo __('lang.temporalAccuracy'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_thematic_accuracy" data-toggle="pill"
                                       href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy"
                                       aria-selected="false"><?php echo __('lang.thematicAccuracy'); ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade active show" id="completeness" role="tabpanel"
                                     aria-labelledby="tab_completeness">
                                    <div class="form-group row">
                                        <div class="d-flex flex-wrap bd-highlight">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_complete_comm_or_omit" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t1_complete_comm_or_omit" id='completeness_comission' value='Completeness Commission' {{(old('c15_t1_complete_comm_or_omit') == 'Completeness Commission' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.completenessCommission'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_complete_comm_or_omit" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Omission' {{(old('c15_t1_complete_comm_or_omit') == 'Completeness Omission' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.completenessOmmission'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_scope']['status'] == 'active')
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t1_scope" id="c15_t1_scope" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t1_scope') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t1_scope') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t1_scope') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t1_scope') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t1_scope') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t1_scope') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t1_scope') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t1_scope') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t1_scope') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t1_scope') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t1_scope') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t1_scope') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_comply_level']['status'] == 'active')
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t1_comply_level" id="c15_t1_comply_level" class="form-control form-control-sm" value="{{old('c15_t1_comply_level')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_date']['status'] == 'active')
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_commission_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t1_date" id="c15_t1_date" class="form-control form-control-sm" value="{{old('c15_t1_date')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_result']['status'] == 'active')
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t1_result" id="c15_t1_result" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t1_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t1_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t1_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_conform_result']['status'] == 'active')
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t1_conform_result" id="c15_t1_conform_result" class="form-control form-control-sm" value="{{old('c15_t1_conform_result')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_scope_2']['status'] == 'active')
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t1_scope_2" id="c15_t1_scope_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t1_scope_2') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t1_scope_2') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t1_scope_2') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t1_scope_2') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t1_scope_2') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t1_scope_2') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t1_scope_2') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t1_scope_2') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t1_scope_2') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t1_scope_2') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t1_scope_2') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t1_scope_2') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_comply_level_2']['status'] == 'active')
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t1_comply_level_2" id="c15_t1_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t1_comply_level_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_date_2']['status'] == 'active')
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_commission_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t1_date_2" id="c15_t1_date_2" class="form-control form-control-sm" value="{{old('c15_t1_date_2')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_result_2']['status'] == 'active')
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t1_result_2" id="c15_t1_result_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t1_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t1_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t1_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t1_conform_result_2']['status'] == 'active')
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t1_conform_result_2" id="c15_t1_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t1_conform_result_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="consistency" role="tabpanel"
                                     aria-labelledby="tab_consistency">
                                    <div class="form-group row">
                                        <div class="d-flex flex-wrap bd-highlight">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t2_type" id='conceptual' value="Conceptual" {{(old('c15_t2_type') == 'Conceptual' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.conceptual_consistency'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t2_type" value="Domain" {{(old('c15_t2_type') == 'Domain' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.domainConsistency'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t2_type" value="Format" {{(old('c15_t2_type') == 'Format' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.formatConsistency'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t2_type" value="Topological" {{(old('c15_t2_type') == 'Topological' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.topologicalConsistency'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_scope']['status'] == 'active')
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t2_scope" id="c15_t2_scope" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t2_scope') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t2_scope') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t2_scope') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t2_scope') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t2_scope') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t2_scope') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t2_scope') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t2_scope') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t2_scope') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t2_scope') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t2_scope') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t2_scope') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_comply_level']['status'] == 'active')
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t2_comply_level" id="c15_t2_comply_level" class="form-control form-control-sm" value="{{old('c15_t2_comply_level')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_date']['status'] == 'active')
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t2_date" id="c15_t2_date" class="form-control form-control-sm" value="{{old('c15_t2_date')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_result']['status'] == 'active')
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t2_result" id="c15_t2_result" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t2_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t2_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t2_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_conform_result']['status'] == 'active')
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t2_conform_result" id="c15_t2_conform_result" class="form-control form-control-sm" value="{{old('c15_t2_conform_result')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_scope_2']['status'] == 'active')
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t2_scope_2" id="c15_t2_scope_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t2_scope_2') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t2_scope_2') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t2_scope_2') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t2_scope_2') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t2_scope_2') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t2_scope_2') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t2_scope_2') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t2_scope_2') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t2_scope_2') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t2_scope_2') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t2_scope_2') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t2_scope_2') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_comply_level_2']['status'] == 'active')
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t2_comply_level_2" id="c15_t2_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t2_comply_level_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_date_2']['status'] == 'active')
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_date_2">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t2_date_2" id="c15_t2_date_2" class="form-control form-control-sm" value="{{old('c15_t2_date_2')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_result_2']['status'] == 'active')
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t2_result_2" id="c15_t2_result_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t2_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t2_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t2_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_conform_result_2']['status'] == 'active')
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_conform_result_2">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t2_conform_result_2" id="c15_t2_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t2_conform_result_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_scope_3']['status'] == 'active')
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t2_scope_3" id="c15_t2_scope_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t2_scope_3') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t2_scope_3') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t2_scope_3') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t2_scope_3') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t2_scope_3') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t2_scope_3') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t2_scope_3') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t2_scope_3') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t2_scope_3') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t2_scope_3') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t2_scope_3') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t2_scope_3') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_comply_level_3']['status'] == 'active')
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_comply_level_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t2_comply_level_3" id="c15_t2_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t2_comply_level_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_date_3']['status'] == 'active')
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_date_3">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t2_date_3" id="c15_t2_date_3" class="form-control form-control-sm" value="{{old('c15_t2_date_3')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_result_3']['status'] == 'active')
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t2_result_3" id="c15_t2_result_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t2_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t2_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t2_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_conform_result_3']['status'] == 'active')
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t2_conform_result_3" id="c15_t2_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t2_conform_result_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_scope_4']['status'] == 'active')
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_scope_4">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t2_scope_4" id="c15_t2_scope_4" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t2_scope_4') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t2_scope_4') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t2_scope_4') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t2_scope_4') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t2_scope_4') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t2_scope_4') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t2_scope_4') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t2_scope_4') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t2_scope_4') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t2_scope_4') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t2_scope_4') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t2_scope_4') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_comply_level_4']['status'] == 'active')
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_comply_level_4">
                                                                    <b data-toggle="tooltip" title="" ><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t2_comply_level_4" id="c15_t2_comply_level_4" class="form-control form-control-sm" value="{{old('c15_t2_comply_level_4')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_date_4']['status'] == 'active')
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_date_4">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t2_date_4" id="c15_t2_date_4" class="form-control form-control-sm" value="{{old('c15_t2_date_4')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_result_4']['status'] == 'active')
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_result_4">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t2_result_4" id="c15_t2_result_4" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t2_result_4') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t2_result_4') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t2_result_4') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t2_conform_result_4']['status'] == 'active')
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_conform_result_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t2_conform_result_4" id="c15_t2_conform_result_4" class="form-control form-control-sm" value="{{old('c15_t2_conform_result_4')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="position_accuracy" role="tabpanel"
                                     aria-labelledby="tab_position_accuracy">
                                    <div class="form-group row">
                                        <div class="d-flex flex-wrap bd-highlight">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t3_type" id='AbsoluteOrExternal' value="Absolute or External" {{(old('c15_t3_type') == 'Absolute or External' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.absoluteOrExternalAccuracy'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t3_type" value="Relative or Internal" {{(old('c15_t3_type') == 'Relative or Internal' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.relativeOrInternalAccuracy'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t3_type" value="Gridded Data" {{(old('c15_t3_type') == 'Gridded Data' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.griddedDataPositionalAccuracy'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_scope']['status'] == 'active')
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_scope">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t3_scope" id="c15_t3_scope" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t3_scope') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t3_scope') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t3_scope') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t3_scope') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t3_scope') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t3_scope') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t3_scope') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t3_scope') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t3_scope') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t3_scope') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t3_scope') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t3_scope') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_comply_level']['status'] == 'active')
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_comply_level">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t3_comply_level" id="c15_t3_comply_level" class="form-control form-control-sm" value="{{old('c15_t3_comply_level')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_date']['status'] == 'active')
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t3_date" id="c15_t3_date" class="form-control form-control-sm" value="{{old('c15_t3_date')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_result']['status'] == 'active')
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_result">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t3_result" id="c15_t3_result" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t3_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t3_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t3_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_conform_result']['status'] == 'active')
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_conform_result">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t3_conform_result" id="c15_t3_conform_result" class="form-control form-control-sm" value="{{old('c15_t3_conform_result')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_scope_2']['status'] == 'active')
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_scope_2">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t3_scope_2" id="c15_t3_scope_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t3_scope_2') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t3_scope_2') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t3_scope_2') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t3_scope_2') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t3_scope_2') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t3_scope_2') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t3_scope_2') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t3_scope_2') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t3_scope_2') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t3_scope_2') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t3_scope_2') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t3_scope_2') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_comply_level_2']['status'] == 'active')
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_comply_level_2">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t3_comply_level_2" id="c15_t3_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t3_comply_level_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_date_2']['status'] == 'active')
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_date_2">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t3_date_2" id="c15_t3_date_2" class="form-control form-control-sm" value="{{old('c15_t3_date_2')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_result_2']['status'] == 'active')
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_result_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t3_result_2" id="c15_t3_result_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t3_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t3_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t3_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_conform_result_2']['status'] == 'active')
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_conform_result_2">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t3_conform_result_2" id="c15_t3_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t3_conform_result_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_scope_3']['status'] == 'active')
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_scope_3">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t3_scope_3" id="c15_t3_scope_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t3_scope_3') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t3_scope_3') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t3_scope_3') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t3_scope_3') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t3_scope_3') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t3_scope_3') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t3_scope_3') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t3_scope_3') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t3_scope_3') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t3_scope_3') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t3_scope_3') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t3_scope_3') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_comply_level_3']['status'] == 'active')
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_comply_level_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t3_comply_level_3" id="c15_t3_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t3_comply_level_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_date_3']['status'] == 'active')
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_date_3">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t3_date_3" id="c15_t3_date_3" class="form-control form-control-sm" value="{{old('c15_t3_date_3')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_result_3']['status'] == 'active')
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_result_3">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t3_result_3" id="c15_t3_result_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t3_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t3_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t3_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t3_conform_result_3']['status'] == 'active')
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_conform_result_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t3_conform_result_3" id="c15_t3_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t3_conform_result_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="temp_accuracy" role="tabpanel"
                                     aria-labelledby="tab_temp_accuracy">
                                    <div class="form-group row">
                                        <div class="bd-highlight">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t4_type" id='AccuracyorTimeMeasurement' value="Accuracy or Time Measurement" {{(old('c15_t4_type') == 'Accuracy or Time Measurement' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.accuracyOfATimeMeasurement'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t4_type" value="Temporal Consistency" {{(old('c15_t4_type') == 'Temporal Consistency' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.temporalConsistency'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t4_type" value="Temporal Validity" {{(old('c15_t4_type') == 'Temporal Validity' ? 'checked="checked"':'')}}>&nbsp;<?php echo __('lang.temporalValidity'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_scope']['status'] == 'active')
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_scope">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t4_scope" id="c15_t4_scope" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t4_scope') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t4_scope') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t4_scope') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t4_scope') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t4_scope') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t4_scope') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t4_scope') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t4_scope') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t4_scope') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t4_scope') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t4_scope') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t4_scope') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_comply_level']['status'] == 'active')
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_comply_level">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t4_comply_level" id="c15_t4_comply_level" class="form-control form-control-sm" value="{{old('c15_t4_comply_level')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_date']['status'] == 'active')
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t4_date" id="c15_t4_date" class="form-control form-control-sm" value="{{old('c15_t4_date')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_result']['status'] == 'active')
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_result">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t4_result" id="c15_t4_result" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t4_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t4_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t4_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_conform_result']['status'] == 'active')
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_conform_result">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t4_conform_result" id="c15_t4_conform_result" class="form-control form-control-sm" value="{{old('c15_t4_conform_result')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_scope_2']['status'] == 'active')
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_scope_2">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t4_scope_2" id="c15_t4_scope_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t4_scope_2') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t4_scope_2') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t4_scope_2') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t4_scope_2') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t4_scope_2') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t4_scope_2') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t4_scope_2') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t4_scope_2') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t4_scope_2') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t4_scope_2') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t4_scope_2') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t4_scope_2') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_comply_level_2']['status'] == 'active')
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_comply_level_2">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t4_comply_level_2" id="c15_t4_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t4_comply_level_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_date_2']['status'] == 'active')
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_date_2">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t4_date_2" id="c15_t4_date_2" class="form-control form-control-sm" value="{{old('c15_t4_date_2')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_result_2']['status'] == 'active')
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_result_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t4_result_2" id="c15_t4_result_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t4_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t4_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t4_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_conform_result_2']['status'] == 'active')
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t4_conform_result_2" id="c15_t4_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t4_conform_result_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_scope_3']['status'] == 'active')
                                                        <tr class='TemporalValidity'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_scope_3">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t4_scope_3" id="c15_t4_scope_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t4_scope_3') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t4_scope_3') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t4_scope_3') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t4_scope_3') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t4_scope_3') == 'Geology' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t4_scope_3') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t4_scope_3') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t4_scope_3') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t4_scope_3') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t4_scope_3') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t4_scope_3') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t4_scope_3') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_comply_level_3']['status'] == 'active')
                                                        <tr class='TemporalValidity'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_comply_level_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t4_comply_level_3" id="c15_t4_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t4_comply_level_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_comply_level_3']['status'] == 'active')
                                                        <tr class='TemporalValidity'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_date_3">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t4_comply_level_3" id="c15_t4_date_3" class="form-control form-control-sm" value="{{old('c15_t4_date_3')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_result_3']['status'] == 'active')
                                                        <tr class='TemporalValidity'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_result_3">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t4_result_3" id="c15_t4_result_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t4_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t4_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t4_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t4_conform_result_3']['status'] == 'active')
                                                        <tr class='TemporalValidity'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_conform_result_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t4_conform_result_3" id="c15_t4_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t4_conform_result_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="thematic_accuracy" role="tabpanel"
                                     aria-labelledby="tab_thematic_accuracy">
                                    <div class="form-group row">
                                        <div class="d-flex flex-wrap bd-highlight">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t5_type" id="ClassificationCorrectness" value="Classification Correctness" checked>&nbsp;<?php echo __('lang.classificationCorrectness'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t5_type" value="Non Quantitative Attribute Correctness">&nbsp;<?php echo __('lang.nonQuantitativeAttributeCorrectness'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t5_type" value="Quantitative Attribute Accuracy">&nbsp;<?php echo __('lang.quantitativeAttributeCorrectness'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_scope']['status'] == 'active')
                                                        <tr class='classificationCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t5_scope" id="c15_t5_scope" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t5_scope') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t5_scope') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t5_scope') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t5_scope') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t5_scope') == 'feature' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t5_scope') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t5_scope') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t5_scope') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t5_scope') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t5_scope') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t5_scope') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t5_scope') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_comply_level']['status'] == 'active')
                                                        <tr class='classificationCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t5_comply_level" id="c15_t5_comply_level" class="form-control form-control-sm" value="{{old('c15_t5_comply_level')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_date']['status'] == 'active')
                                                        <tr class='classificationCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t5_classCorrect_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t5_date" id="c15_t5_date" class="form-control form-control-sm" value="{{old('c15_t5_date')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_result']['status'] == 'active')
                                                        <tr class='classificationCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t5_result" id="c15_t5_result" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t5_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t5_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t5_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_conform_result']['status'] == 'active')
                                                        <tr class='classificationCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t5_conform_result" id="c15_t5_conform_result" class="form-control form-control-sm" value="{{old('c15_t5_conform_result')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_scope_2']['status'] == 'active')
                                                        <tr class='nonQuantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_scope_2">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t5_scope_2" id="c15_t5_scope_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t5_scope_2') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t5_scope_2') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t5_scope_2') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t5_scope_2') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t5_scope_2') == 'feature' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t5_scope_2') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t5_scope_2') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t5_scope_2') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t5_scope_2') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t5_scope_2') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t5_scope_2') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t5_scope_2') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_comply_level_2']['status'] == 'active')
                                                        <tr class='nonQuantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_comply_level_2">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t5_comply_level_2" id="c15_t5_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t5_comply_level_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_date_2']['status'] == 'active')
                                                        <tr class='nonQuantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_classCorrect_2_date">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t5_classCorrect_2_date_div" data-target-input="nearest">
                                                                        <input type="date" name="c15_t5_date_2" id="c15_t5_date_2" class="form-control form-control-sm" value="{{old('c15_t5_date_2')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_result_2']['status'] == 'active')
                                                        <tr class='nonQuantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_result_2">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t5_result_2" id="c15_t5_result_2" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t5_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t5_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t5_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_conform_result_2']['status'] == 'active')
                                                        <tr class='nonQuantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t5_conform_result_2" id="c15_t5_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t5_conform_result_2')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <?php //================= ?>
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_scope_3']['status'] == 'active')
                                                        <tr class='quantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_scope_3">
                                                                    <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                    <select name="c15_t5_scope_3" id="c15_t5_scope_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Aeronautical" {{(old('c15_t5_scope_3') == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                        <option value="Built Environment" {{(old('c15_t5_scope_3') == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                        <option value="Demarcation" {{(old('c15_t5_scope_3') == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                        <option value="General" {{(old('c15_t5_scope_3') == 'General' ? "selected":"")}}>General</option>
                                                                        <option value="Geology" {{(old('c15_t5_scope_3') == 'feature' ? "selected":"")}}>Geology</option>
                                                                        <option value="Hydrography" {{(old('c15_t5_scope_3') == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                        <option value="Hypsography" {{(old('c15_t5_scope_3') == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                        <option value="Soil" {{(old('c15_t5_scope_3') == 'Soil' ? "selected":"")}}>Soil</option>
                                                                        <option value="Special Use" {{(old('c15_t5_scope_3') == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                        <option value="Transportation" {{(old('c15_t5_scope_3') == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                        <option value="Utility" {{(old('c15_t5_scope_3') == 'Utility' ? "selected":"")}}>Utility</option>
                                                                        <option value="Vegetation" {{(old('c15_t5_scope_3') == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_comply_level_3']['status'] == 'active')
                                                        <tr class='quantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_comply_level_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                    <input type="text" name="c15_t5_comply_level_3" id="c15_t5_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t5_comply_level_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_date_3']['status'] == 'active')
                                                        <tr class='quantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_classCorrect_date_3">
                                                                    <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                    <div class="input-group date" id="c15_t5_classCorrect_date_div_3" data-target-input="nearest">
                                                                        <input type="date" name="c15_t5_date_3" id="c15_t5_date_3" class="form-control form-control-sm" value="{{old('c15_t5_date_3')}}">
                                                                    </div>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_result_3']['status'] == 'active')
                                                        <tr class='quantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_result_3">
                                                                    <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                    <select name="c15_t5_result_3" id="c15_t5_result_3" class="form-control form-control-sm">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Pass" {{(old('c15_t5_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                        <option value="Fail" {{(old('c15_t5_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                        <option value="Not Relevant" {{(old('c15_t5_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                    </select>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($template->template[strtolower($_GET['kategori'])]['accordion15']['c15_t5_conform_result_3']['status'] == 'active')
                                                        <tr class='quantitativeAttributeCorrectness'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t5_conform_result_3">
                                                                    <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                    <input type="text" name="c15_t5_conform_result_3" id="c15_t5_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t5_conform_result_3')}}">
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //t1
        $('.Completeness_Commission').hide();
        $('.Completeness_Omission').hide();
//        $("#completeness_comission").prop("checked", true);
        //t2
        $('.Conceptual').hide();
        $('.Domain').hide();
        $('.Format').hide();
        $('.Topological').hide();
//        $("#conceptual").prop("checked", true);
        //t3
        $('.AbsoluteorExternal').hide();
        $('.RelativeorInternal').hide();
        $('.GriddedData').hide();
//        $("#AbsoluteOrExternal").prop("checked", true);
        //t4
        $('.AccuracyorTimeMeasurement').hide();
        $('.TemporalConsistency').hide();
        $('.TemporalValidity').hide();
//        $("#AccuracyorTimeMeasurement").prop("checked", true);
        //t5
        $('.classificationCorrectness').hide();
        $('.nonQuantitativeAttributeCorrectness').hide();
        $('.quantitativeAttributeCorrectness').hide();
//        $("#ClassificationCorrectness").prop("checked", true);
    });

    $('input:radio[name="c15_t1_complete_comm_or_omit"]').change(function () {
        if ($(this).val() == 'Completeness Commission') {
            $('.Completeness_Commission').show();
            $('.Completeness_Omission').hide();
        } else if ($(this).val() == 'Completeness Omission') {
            $('.Completeness_Commission').hide();
            $('.Completeness_Omission').show();
        }
    });
    $('input:radio[name="c15_t2_type"]').change(function () {
        if ($(this).val() == 'Conceptual') {
            $('.Conceptual').show();
            $('.Domain').hide();
            $('.Format').hide();
            $('.Topological').hide();
        } else if ($(this).val() == 'Domain') {
            $('.Conceptual').hide();
            $('.Domain').show();
            $('.Format').hide();
            $('.Topological').hide();
        } else if ($(this).val() == 'Format') {
            $('.Conceptual').hide();
            $('.Domain').hide();
            $('.Format').show();
            $('.Topological').hide();
        } else if ($(this).val() == 'Topological') {
            $('.Conceptual').hide();
            $('.Domain').hide();
            $('.Format').hide();
            $('.Topological').show();
        }
    });
    $('input:radio[name="c15_t3_type"]').change(function () {
        if ($(this).val() == 'Absolute or External') {
            $('.AbsoluteorExternal').show();
            $('.RelativeorInternal').hide();
            $('.GriddedData').hide();
        } else if ($(this).val() == 'Relative or Internal') {
            $('.AbsoluteorExternal').hide();
            $('.RelativeorInternal').show();
            $('.GriddedData').hide();
        } else if ($(this).val() == 'Gridded Data') {
            $('.AbsoluteorExternal').hide();
            $('.RelativeorInternal').hide();
            $('.GriddedData').show();
        }
    });
    $('input:radio[name="c15_t4_type"]').change(function () {
        if ($(this).val() == 'Accuracy or Time Measurement') {
            $('.AccuracyorTimeMeasurement').show();
            $('.TemporalConsistency').hide();
            $('.TemporalValidity').hide();
        } else if ($(this).val() == 'Temporal Consistency') {
            $('.AccuracyorTimeMeasurement').hide();
            $('.TemporalConsistency').show();
            $('.TemporalValidity').hide();
        } else if ($(this).val() == 'Temporal Validity') {
            $('.AccuracyorTimeMeasurement').hide();
            $('.TemporalConsistency').hide();
            $('.TemporalValidity').show();
        }
    });
    $('input:radio[name="c15_t5_type"]').change(function () {
        if ($(this).val() == 'Classification Correctness') {
            $('.classificationCorrectness').show();
            $('.nonQuantitativeAttributeCorrectness').hide();
            $('.quantitativeAttributeCorrectness').hide();
        } else if ($(this).val() == 'Non Quantitative Attribute Correctness') {
            $('.classificationCorrectness').hide();
            $('.nonQuantitativeAttributeCorrectness').show();
            $('.quantitativeAttributeCorrectness').hide();
        } else if ($(this).val() == 'Quantitative Attribute Accuracy') {
            $('.classificationCorrectness').hide();
            $('.nonQuantitativeAttributeCorrectness').hide();
            $('.quantitativeAttributeCorrectness').show();
        }
    });
</script>
