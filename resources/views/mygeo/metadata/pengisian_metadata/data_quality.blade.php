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
            <div class="form-group row col-xl-6">
                <b>Data Quality Information</b>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-DQscope">
                            DQ Scope
                        </label>
                    </div>
                    <div class="col-xl-3">
                        <select name="c15_data_quality_info" id="c15_data_quality_info" class="form-control form-control-sm">
                            <option value="Attribute" {{(old('c15_data_quality_info') == 'Attribute' ? "selected":"")}}>Attribute</option>
                            <option value="Attribute Type" {{(old('c15_data_quality_info') == 'Attribute Type' ? "selected":"")}}>Attribute Type</option>
                            <option value="Collection Session" {{(old('c15_data_quality_info') == 'Collection Session' ? "selected":"")}}>Collection Session</option>
                            <option value="Dataset" {{(old('c15_data_quality_info') == 'Dataset' ? "selected":"")}}>Dataset</option>
                            <option value="Series" {{(old('c15_data_quality_info') == 'Series' ? "selected":"")}}>Series</option>
                            <option value="Feature" {{(old('c15_data_quality_info') == 'Feature' ? "selected":"")}}>Feature</option>
                            <option value="Dimension Group" {{(old('c15_data_quality_info') == 'Dimension Group' ? "selected":"")}}>Dimension Group</option>
                            <option value="Feature Type" {{(old('c15_data_quality_info') == 'Feature Type' ? "selected":"")}}>Feature Type</option>
                            <option value="Field Session" {{(old('c15_data_quality_info') == 'Field Session' ? "selected":"")}}>Field Session</option>
                            <option value="Model" {{(old('c15_data_quality_info') == 'Model' ? "selected":"")}}>Model</option>
                            <option value="Non Geographic Date Set" {{(old('c15_data_quality_info') == 'Non Geographic Date Set' ? "selected":"")}}>Non Geographic Date Set</option>
                            <option value="Property Type" {{(old('c15_data_quality_info') == 'Property Type' ? "selected":"")}}>Property Type</option>
                            <option value="Service" {{(old('c15_data_quality_info') == 'Service' ? "selected":"")}}>Service</option>
                            <option value="Software" {{(old('c15_data_quality_info') == 'Software' ? "selected":"")}}>Software</option>
                            <option value="Tile" {{(old('c15_data_quality_info') == 'Tile' ? "selected":"")}}>Tile</option>
                        </select>
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label float-right" for="input-datahistory">
                            Data History</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control form-control-sm" type="text" name="c15_data_history" id="c15_data_history" placeholder="None" value="{{old('c15_data_history')}}">
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label  float-right" for="input-date">
                            Date
                        </label>
                    </div>
                    <div class="col-xl-3">
                        <input class="form-control form-control-sm" type="date" name="c15_date" id="c15_date" value="{{old('c15_date')}}">
                    </div>
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;
            <div class="form-group row col-xl-12 divDataQualityTabs">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness" role="tab" aria-controls="completeness" aria-selected="true">Completeness</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_consistency" data-toggle="pill" href="#consistency" role="tab" aria-controls="consistency" aria-selected="false">Consistency</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_position_accuracy" data-toggle="pill" href="#position_accuracy" role="tab" aria-controls="position_accuracy" aria-selected="false">Positional Accuracy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_temp_accuracy" data-toggle="pill" href="#temp_accuracy" role="tab" aria-controls="temp_accuracy" aria-selected="false">Temporal Accuracy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_thematic_accuracy" data-toggle="pill" href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy" aria-selected="false">Thematic Accuracy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="completeness" role="tabpanel" aria-labelledby="tab_completeness">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" id='completeness_comission' value='Completeness Commission' {{(old('c15_t1_complete_comm_or_omit') == 'Completeness Commission' ? 'checked="checked"':'')}}>&nbsp;Completeness Commission
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Omission' {{(old('c15_t1_complete_comm_or_omit') == 'Completeness Omission' ? 'checked="checked"':'')}}>&nbsp;Completeness Omission
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t1_scope" id="c15_t1_scope" class="form-control form-control-sm">
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
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t1_comply_level" id="c15_t1_comply_level" class="form-control form-control-sm" value="{{old('c15_t1_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_commission_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t1_commission_date" id="c15_t1_commission_date" class="form-control datetimepicker-input" data-target="#c15_t1_commission_date_div" value="{{old('c15_t1_commission_date')}}">-->
                                                                    <input type="date" name="c15_t1_date" id="c15_t1_date" class="form-control form-control-sm" value="{{old('c15_t1_date')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t1_commission_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t1_result" id="c15_t1_result" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t1_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t1_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t1_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t1_conform_result" id="c15_t1_conform_result" class="form-control form-control-sm" value="{{old('c15_t1_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t1_scope_2" id="c15_t1_scope_2" class="form-control form-control-sm">
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
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t1_comply_level_2" id="c15_t1_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t1_comply_level_2')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_commission_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t1_commission_date" id="c15_t1_commission_date" class="form-control datetimepicker-input" data-target="#c15_t1_commission_date_div" value="{{old('c15_t1_commission_date')}}">-->
                                                                    <input type="date" name="c15_t1_date_2" id="c15_t1_date_2" class="form-control form-control-sm" value="{{old('c15_t1_date_2')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t1_commission_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t1_result_2" id="c15_t1_result_2" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t1_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t1_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t1_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t1_conform_result_2" id="c15_t1_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t1_conform_result_2')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="tab-pane fade" id="consistency" role="tabpanel" aria-labelledby="tab_consistency">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" id='conceptual' value="Conceptual" {{(old('c15_t2_type') == 'Conceptual' ? 'checked="checked"':'')}}>&nbsp;Conceptual
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Domain" {{(old('c15_t2_type') == 'Domain' ? 'checked="checked"':'')}}>&nbsp;Domain
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Format" {{(old('c15_t2_type') == 'Format' ? 'checked="checked"':'')}}>&nbsp;Format
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Topological" {{(old('c15_t2_type') == 'Topological' ? 'checked="checked"':'')}}>&nbsp;Topological
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t2_scope" id="c15_t2_scope" class="form-control form-control-sm">
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
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t2_comply_level" id="c15_t2_comply_level" class="form-control form-control-sm" value="{{old('c15_t2_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t2_conceptual_date" id="c15_t2_conceptual_date" class="form-control datetimepicker-input" data-target="#c15_t2_conceptual_date_div" value="{{old('c15_t2_conceptual_date')}}">-->
                                                                    <input type="date" name="c15_t2_date" id="c15_t2_date" class="form-control form-control-sm" value="{{old('c15_t2_date')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t2_conceptual_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t2_result" id="c15_t2_result" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t2_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t2_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t2_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t2_conform_result" id="c15_t2_conform_result" class="form-control form-control-sm" value="{{old('c15_t2_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t2_scope_2" id="c15_t2_scope_2" class="form-control form-control-sm">
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
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t2_comply_level_2" id="c15_t2_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t2_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t2_conceptual_date" id="c15_t2_conceptual_date" class="form-control datetimepicker-input" data-target="#c15_t2_conceptual_date_div" value="{{old('c15_t2_conceptual_date')}}">-->
                                                                    <input type="date" name="c15_t2_date_2" id="c15_t2_date_2" class="form-control form-control-sm" value="{{old('c15_t2_date_2')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t2_conceptual_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t2_result_2" id="c15_t2_result_2" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t2_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t2_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t2_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t2_conform_result_2" id="c15_t2_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t2_conform_result_2')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t2_scope_3" id="c15_t2_scope_3" class="form-control form-control-sm">
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
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t2_comply_level_3" id="c15_t2_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t2_comply_level_3')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t2_conceptual_date" id="c15_t2_conceptual_date" class="form-control datetimepicker-input" data-target="#c15_t2_conceptual_date_div" value="{{old('c15_t2_conceptual_date')}}">-->
                                                                    <input type="date" name="c15_t2_date_3" id="c15_t2_date_3" class="form-control form-control-sm" value="{{old('c15_t2_date_3')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t2_conceptual_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t2_result_3" id="c15_t2_result_3" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t2_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t2_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t2_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t2_conform_result_3" id="c15_t2_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t2_conform_result_3')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t2_scope_4" id="c15_t2_scope_4" class="form-control form-control-sm">
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
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t2_comply_level_4" id="c15_t2_comply_level_4" class="form-control form-control-sm" value="{{old('c15_t2_comply_level_4')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t2_conceptual_date" id="c15_t2_conceptual_date" class="form-control datetimepicker-input" data-target="#c15_t2_conceptual_date_div" value="{{old('c15_t2_conceptual_date')}}">-->
                                                                    <input type="date" name="c15_t2_date_4" id="c15_t2_date_4" class="form-control form-control-sm" value="{{old('c15_t2_date_4')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t2_conceptual_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t2_result_4" id="c15_t2_result_4" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t2_result_4') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t2_result_4') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t2_result_4') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t2_conform_result_4" id="c15_t2_conform_result_4" class="form-control form-control-sm" value="{{old('c15_t2_conform_result_4')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="position_accuracy" role="tabpanel" aria-labelledby="tab_position_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" id='AbsoluteOrExternal' value="Absolute or External" {{(old('c15_t3_type') == 'Absolute or External' ? 'checked="checked"':'')}}>&nbsp;Absolute or External
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Relative or Internal" {{(old('c15_t3_type') == 'Relative or Internal' ? 'checked="checked"':'')}}>&nbsp;Relative or Internal
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Gridded Data" {{(old('c15_t3_type') == 'Gridded Data' ? 'checked="checked"':'')}}>&nbsp;Gridded Data
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <select name="c15_t3_scope" id="c15_t3_scope" class="form-control form-control-sm">
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
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t3_comply_level" id="c15_t3_comply_level" class="form-control form-control-sm" value="{{old('c15_t3_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_absExt_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t3_absExt_date" id="c15_t3_absExt_date" class="form-control datetimepicker-input" data-target="#c15_t3_absExt_date_div" value="{{old('c15_t3_absExt_date')}}">-->
                                                                    <input type="date" name="c15_t3_date" id="c15_t3_date" class="form-control form-control-sm" value="{{old('c15_t3_date')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t3_absExt_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t3_result" id="c15_t3_result" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t3_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t3_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t3_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t3_conform_result" id="c15_t3_conform_result" class="form-control form-control-sm" value="{{old('c15_t3_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_scope_2">
                                                                <b>Scope:</b>
                                                                <select name="c15_t3_scope_2" id="c15_t3_scope_2" class="form-control form-control-sm">
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
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_comply_level_2">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t3_comply_level_2" id="c15_t3_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t3_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_date_2">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t3_absExt_date" id="c15_t3_absExt_date" class="form-control datetimepicker-input" data-target="#c15_t3_absExt_date_div" value="{{old('c15_t3_absExt_date')}}">-->
                                                                    <input type="date" name="c15_t3_date_2" id="c15_t3_date_2" class="form-control form-control-sm" value="{{old('c15_t3_date_2')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t3_absExt_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_result_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t3_result_2" id="c15_t3_result_2" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t3_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t3_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t3_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_conform_result_2">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t3_conform_result_2" id="c15_t3_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t3_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_scope_3">
                                                                <b>Scope:</b>
                                                                <select name="c15_t3_scope_3" id="c15_t3_scope_3" class="form-control form-control-sm">
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
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_comply_level_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t3_comply_level_3" id="c15_t3_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t3_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_date_3">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t3_absExt_date" id="c15_t3_absExt_date" class="form-control datetimepicker-input" data-target="#c15_t3_absExt_date_div" value="{{old('c15_t3_absExt_date')}}">-->
                                                                    <input type="date" name="c15_t3_date_3" id="c15_t3_date_3" class="form-control form-control-sm" value="{{old('c15_t3_date_3')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t3_absExt_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_result_3">
                                                                <b>Result:</b>
                                                                <select name="c15_t3_result_3" id="c15_t3_result_3" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t3_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t3_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t3_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_conform_result_3">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t3_conform_result_3" id="c15_t3_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t3_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="temp_accuracy" role="tabpanel" aria-labelledby="tab_temp_accuracy">
                                <div class="form-group row">
                                    <div class="bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type">
                                                                <input type="radio" name="c15_t4_type" id='AccuracyorTimeMeasurement' value="Accuracy or Time Measurement" {{(old('c15_t4_type') == 'Accuracy or Time Measurement' ? 'checked="checked"':'')}}>&nbsp;Accuracy or Time Measurement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Consistency" {{(old('c15_t4_type') == 'Temporal Consistency' ? 'checked="checked"':'')}}>&nbsp;Temporal Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Validity" {{(old('c15_t4_type') == 'Temporal Validity' ? 'checked="checked"':'')}}>&nbsp;Temporal Validity
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                <b>Scope:</b>
                                                                <select name="c15_t4_scope" id="c15_t4_scope" class="form-control form-control-sm">
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
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t4_comply_level" id="c15_t4_comply_level" class="form-control form-control-sm" value="{{old('c15_t4_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_accuTimeMeasure_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t4_accuTimeMeasure_date" id="c15_t4_accuTimeMeasure_date" class="form-control datetimepicker-input" data-target="#c15_t4_accuTimeMeasure_date_div" value="{{old('c15_t4_accuTimeMeasure_date')}}">-->
                                                                    <input type="date" name="c15_t4_date" id="c15_t4_date" class="form-control form-control-sm" value="{{old('c15_t4_date')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t4_accuTimeMeasure_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t4_result" id="c15_t4_result" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t4_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t4_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t4_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t4_conform_result" id="c15_t4_conform_result" class="form-control form-control-sm" value="{{old('c15_t4_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_scope_2">
                                                                <b>Scope:</b>
                                                                <select name="c15_t4_scope_2" id="c15_t4_scope_2" class="form-control form-control-sm">
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
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_comply_level_2">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t4_comply_level_2" id="c15_t4_comply_level_2" class="form-control form-control-sm" value="{{old('c15_t4_comply_level_2')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_date_2">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t4_accuTimeMeasure_date" id="c15_t4_accuTimeMeasure_date" class="form-control datetimepicker-input" data-target="#c15_t4_accuTimeMeasure_date_div" value="{{old('c15_t4_accuTimeMeasure_date')}}">-->
                                                                    <input type="date" name="c15_t4_date_2" id="c15_t4_date_2" class="form-control form-control-sm" value="{{old('c15_t4_date_2')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t4_accuTimeMeasure_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t4_conform_result_2" id="c15_t4_conform_result_2" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t4_conform_result_2') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t4_conform_result_2') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t4_conform_result_2') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t4_conform_result_2" id="c15_t4_conform_result_2" class="form-control form-control-sm" value="{{old('c15_t4_conform_result_2')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                <b>Scope:</b>
                                                                <select name="c15_t4_scope_3" id="c15_t4_scope_3" class="form-control form-control-sm">
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
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_comply_level_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t4_comply_level_3" id="c15_t4_comply_level_3" class="form-control form-control-sm" value="{{old('c15_t4_comply_level_3')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_date_3">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t4_accuTimeMeasure_date" id="c15_t4_accuTimeMeasure_date" class="form-control datetimepicker-input" data-target="#c15_t4_accuTimeMeasure_date_div" value="{{old('c15_t4_accuTimeMeasure_date')}}">-->
                                                                    <input type="date" name="c15_t4_date_3" id="c15_t4_date_3" class="form-control form-control-sm" value="{{old('c15_t4_date_3')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t4_accuTimeMeasure_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_result_3">
                                                                <b>Result:</b>
                                                                <select name="c15_t4_result_3" id="c15_t4_result_3" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t4_result_3') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t4_result_3') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t4_result_3') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_conform_result_3">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t4_conform_result_3" id="c15_t4_conform_result_3" class="form-control form-control-sm" value="{{old('c15_t4_conform_result_3')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thematic_accuracy" role="tabpanel" aria-labelledby="tab_thematic_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_type">
                                                                <input type="radio" name="c15_t5_type" value="Classification Correctness" checked>&nbsp;Classification Correctness
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                                <b>Scope:</b>
                                                                <select name="c15_t5_scope" id="c15_t5_scope" class="form-control form-control-sm">
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
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <input type="text" name="c15_t5_comply_level" id="c15_t5_comply_level" class="form-control form-control-sm" value="{{old('c15_t5_comply_level')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                                <b>Date:</b>
                                                                <div class="input-group date" id="c15_t5_classCorrect_date_div" data-target-input="nearest">
                                                                    <!--<input type="text" name="c15_t5_classCorrect_date" id="c15_t5_classCorrect_date" class="form-control datetimepicker-input" data-target="#c15_t5_classCorrect_date_div" value="{{old('c15_t5_classCorrect_date')}}">-->
                                                                    <input type="date" name="c15_t5_date" id="c15_t5_date" class="form-control form-control-sm" value="{{old('c15_t5_date')}}">
                                                                    <!--                                                                    <div class="input-group-append" data-target="#c15_t5_classCorrect_date_div" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>-->
                                                                </div>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <select name="c15_t5_result" id="c15_t5_result" class="form-control form-control-sm">
                                                                    <option value="Pass" {{(old('c15_t5_result') == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{(old('c15_t5_result') == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{(old('c15_t5_result') == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <input type="text" name="c15_t5_conform_result" id="c15_t5_conform_result" class="form-control form-control-sm" value="{{old('c15_t5_conform_result')}}">
                                                            </label>
                                                        </td>
                                                    </tr>
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

<script>
    $(document).ready(function(){
        //t1
        $('.Completeness_Commission').show();
        $('.Completeness_Omission').hide();
        $("#completeness_comission").prop("checked", true);
        //t2
        $('.Conceptual').show();
        $('.Domain').hide();
        $('.Format').hide();
        $('.Topological').hide();
        $("#conceptual").prop("checked", true);
        //t3
        $('.AbsoluteorExternal').show();
        $('.RelativeorInternal').hide();
        $('.GriddedData').hide();
        $("#AbsoluteOrExternal").prop("checked", true);
        //t4
        $('.AccuracyorTimeMeasurement').show();
        $('.TemporalConsistency').hide();
        $('.TemporalValidity').hide();
        $("#AccuracyorTimeMeasurement").prop("checked", true);
    });
    
    $('input:radio[name="c15_t1_complete_comm_or_omit"]').change(function() {
        if ($(this).val() == 'Completeness Commission') {
            $('.Completeness_Commission').show();
            $('.Completeness_Omission').hide();
        } else if ($(this).val() == 'Completeness Omission') {
            $('.Completeness_Commission').hide();
            $('.Completeness_Omission').show();
        }
    });
    $('input:radio[name="c15_t2_type"]').change(function() {
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
    $('input:radio[name="c15_t3_type"]').change(function() {
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
    $('input:radio[name="c15_t4_type"]').change(function() {
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
</script>
