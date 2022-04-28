<div class="card card-primary mb-4 div_c15" id="div_c15">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse15">
                <?php echo __('lang.accord_15'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="15">Tambah</button>
    </div>
    <div id="collapse15" class="panel-collapse collapse in " data-parent="#div_c15">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php
                foreach($template->template[strtolower($_GET['kategori'])]['accordion15'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c15_data_quality_info"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Pengisian secara Pilihan: Skop DQ">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                Dropdown
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c15_data_history"){
                        ?>
                        <div class="row sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Pengisian secara Pilihan: Skop DQ">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c15_date"){
                        ?>
                        <div class="row sortIt"  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5" data-toggle="tooltip" title="Pengisian secara Pilihan: Skop DQ">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
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
                                                <table class="table table-borderless dqtabstable">
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
                                                        <?php
                                                        foreach($template->template[strtolower($_GET['kategori'])]['accordion15'] as $key=>$val){
                                                            if($key == "c15_t1_scope"){
                                                                ?>
                                                                <tr class="Completeness_Commission sortIt"  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t1_scope" id="c15_t1_scope" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_comply_level"){
                                                                ?>
                                                                <tr class="Completeness_Commission sortIt"  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t1_comply_level" id="c15_t1_comply_level" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_date"){
                                                                ?>
                                                                <tr class="Completeness_Commission sortIt"  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t1_commission_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t1_date" id="c15_t1_date" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_result"){
                                                                ?>
                                                                <tr class="Completeness_Commission sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t1_result" id="c15_t1_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_conform_result"){
                                                                ?>
                                                                <tr class="Completeness_Commission sortIt"  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t1_conform_result" id="c15_t1_conform_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_scope_2"){
                                                                ?>
                                                                <tr class="Completeness_Omission sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t1_scope_2" id="c15_t1_scope_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_comply_level_2"){
                                                                ?>
                                                                <tr class="Completeness_Omission sortIt"  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t1_comply_level_2" id="c15_t1_comply_level_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_date_2"){
                                                                ?>
                                                                <tr class="Completeness_Omission sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t1_commission_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t1_date_2" id="c15_t1_date_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_result_2"){
                                                                ?>
                                                                <tr class="Completeness_Omission sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t1_result_2" id="c15_t1_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t1_result_2"){
                                                                ?>
                                                                <tr class="Completeness_Omission sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t1_conform_result_2" id="c15_t1_conform_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                                <table class="table table-borderless dqtabstable">
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
                                                        <?php
                                                        foreach($template->template[strtolower($_GET['kategori'])]['accordion15'] as $key=>$val){
                                                            if($key == "c15_t2_scope"){
                                                                ?>
                                                                <tr class='Conceptual sortIt'  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_scope" id="c15_t2_scope" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_comply_level"){
                                                                ?>
                                                                <tr class='Conceptual sortIt'  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_comply_level" id="c15_t2_comply_level" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_date"){
                                                                ?>
                                                                <tr class='Conceptual sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t2_date" id="c15_t2_date" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_result"){
                                                                ?>
                                                                <tr class='Conceptual sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_result" id="c15_t2_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_conform_result"){
                                                                ?>
                                                                <tr class='Conceptual sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_conform_result" id="c15_t2_conform_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_scope_2"){
                                                                ?>
                                                                <tr class='Domain sortIt'  <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_scope_2" id="c15_t2_scope_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_comply_level_2"){
                                                                ?>
                                                                <tr class='Domain sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_comply_level_2" id="c15_t2_comply_level_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_date_2"){
                                                                ?>
                                                                <tr class='Domain sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_date_2">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t2_date_2" id="c15_t2_date_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_result_2"){
                                                                ?>
                                                                <tr class='Domain sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_result_2" id="c15_t2_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_conform_result_2"){
                                                                ?>
                                                                <tr class='Domain sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_conform_result_2">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_conform_result_2" id="c15_t2_conform_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_scope_3"){
                                                                ?>
                                                                <tr class='Format sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_scope_3" id="c15_t2_scope_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_comply_level_3"){
                                                                ?>
                                                                <tr class='Format sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_comply_level_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_comply_level_3" id="c15_t2_comply_level_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_date_3"){
                                                                ?>
                                                                <tr class='Format sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_date_3">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t2_date_3" id="c15_t2_date_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_result_3"){
                                                                ?>
                                                                <tr class='Format sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_result_3" id="c15_t2_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_conform_result_3"){
                                                                ?>
                                                                <tr class='Format sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_conform_result_3" id="c15_t2_conform_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_scope_4"){
                                                                ?>
                                                                <tr class='Topological sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_scope_4">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_scope_4" id="c15_t2_scope_4" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_comply_level_4"){
                                                                ?>
                                                                <tr class='Topological sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_comply_level_4">
                                                                            <b data-toggle="tooltip" title="" ><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_comply_level_4" id="c15_t2_comply_level_4" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_date_4"){
                                                                ?>
                                                                <tr class='Topological sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_date_4">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t2_date_4" id="c15_t2_date_4" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_result_4"){
                                                                ?>
                                                                <tr class='Topological sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_result_4">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t2_result_4" id="c15_t2_result_4" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t2_conform_result_4"){
                                                                ?>
                                                               <tr class='Topological sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_conform_result_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t2_conform_result_4" id="c15_t2_conform_result_4" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                                <table class="table table-borderless dqtabstable">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t3_type" id='AbsoluteOrExternal' value="Absolute or External">&nbsp;<?php echo __('lang.absoluteOrExternalAccuracy'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t3_type" value="Relative or Internal">&nbsp;<?php echo __('lang.relativeOrInternalAccuracy'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t3_type" value="Gridded Data">&nbsp;<?php echo __('lang.griddedDataPositionalAccuracy'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        foreach($template->template[strtolower($_GET['kategori'])]['accordion15'] as $key=>$val){
                                                            if($key == "c15_t3_scope"){
                                                                ?>
                                                                <tr class='AbsoluteorExternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_scope">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t3_scope" id="c15_t3_scope" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_comply_level"){
                                                                ?>
                                                                <tr class='AbsoluteorExternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_comply_level">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t3_comply_level" id="c15_t3_comply_level" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_date"){
                                                                ?>
                                                                <tr class='AbsoluteorExternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            Textbox
                                                                            <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                                <input type="date" name="c15_t3_date" id="c15_t3_date" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_result"){
                                                                ?>
                                                                <tr class='AbsoluteorExternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_result">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t3_result" id="c15_t3_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_conform_result"){
                                                                ?>
                                                                <tr class='AbsoluteorExternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_conform_result">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t3_conform_result" id="c15_t3_conform_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_scope_2"){
                                                                ?>
                                                                <tr class='RelativeorInternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_scope_2">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t3_scope_2" id="c15_t3_scope_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_comply_level_2"){
                                                                ?>
                                                                <tr class='RelativeorInternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_comply_level_2">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t3_comply_level_2" id="c15_t3_comply_level_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_date_2"){
                                                                ?>
                                                                <tr class='RelativeorInternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_date_2">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            Textbox
                                                                            <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                                <input type="date" name="c15_t3_date_2" id="c15_t3_date_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_result_2"){
                                                                ?>
                                                                <tr class='RelativeorInternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_result_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t3_result_2" id="c15_t3_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_conform_result_2"){
                                                                ?>
                                                                <tr class='RelativeorInternal sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_conform_result_2">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t3_conform_result_2" id="c15_t3_conform_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_scope_3"){
                                                                ?>
                                                                <tr class='GriddedData sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_scope_3">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t3_scope_3" id="c15_t3_scope_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_comply_level_3"){
                                                                ?>
                                                                <tr class='GriddedData sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_comply_level_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t3_comply_level_3" id="c15_t3_comply_level_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_date_3"){
                                                                ?>
                                                                <tr class='GriddedData sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_date_3">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            Textbox
                                                                            <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                                                <input type="date" name="c15_t3_date_3" id="c15_t3_date_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_result_3"){
                                                                ?>
                                                                <tr class='GriddedData sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_result_3">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t3_result_3" id="c15_t3_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t3_conform_result_3"){
                                                                ?>
                                                                <tr class='GriddedData sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_conform_result_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t3_conform_result_3" id="c15_t3_conform_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                                <table class="table table-borderless dqtabstable">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t4_type" id='AccuracyorTimeMeasurement' value="Accuracy or Time Measurement">&nbsp;<?php echo __('lang.accuracyOfATimeMeasurement'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t4_type" value="Temporal Consistency">&nbsp;<?php echo __('lang.temporalConsistency'); ?>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                    <input type="radio" name="c15_t4_type" value="Temporal Validity">&nbsp;<?php echo __('lang.temporalValidity'); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        foreach($template->template[strtolower($_GET['kategori'])]['accordion15'] as $key=>$val){
                                                            if($key == "c15_t4_scope"){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_scope">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t4_scope" id="c15_t4_scope" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_comply_level"){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_comply_level">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t4_comply_level" id="c15_t4_comply_level" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_date"){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t4_date" id="c15_t4_date" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_result"){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_result">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t4_result" id="c15_t4_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_conform_result"){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_conform_result">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t4_conform_result" id="c15_t4_conform_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_scope_2"){
                                                                ?>
                                                                <tr class='TemporalConsistency sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_scope_2">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t4_scope_2" id="c15_t4_scope_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_comply_level_2"){
                                                                ?>
                                                                <tr class='TemporalConsistency sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_comply_level_2">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t4_comply_level_2" id="c15_t4_comply_level_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_date_2"){
                                                                ?>
                                                                <tr class='TemporalConsistency sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_date_2">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            Textbox
                                                                            <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                                <input type="date" name="c15_t4_date_2" id="c15_t4_date_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_result_2"){
                                                                ?>
                                                                <tr class='TemporalConsistency sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_result_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t4_result_2" id="c15_t4_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_conform_result_2"){
                                                                ?>
                                                                <tr class='TemporalConsistency sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t4_conform_result_2" id="c15_t4_conform_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_scope_3"){
                                                                ?>
                                                                <tr class='TemporalValidity sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_scope_3">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t4_scope_3" id="c15_t4_scope_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_comply_level_3"){
                                                                ?>
                                                                <tr class='TemporalValidity sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_comply_level_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t4_comply_level_3" id="c15_t4_comply_level_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_comply_level_3"){
                                                                ?>
                                                                <tr class='TemporalValidity sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_date_3">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t4_comply_level_3" id="c15_t4_date_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_result_3"){
                                                                ?>
                                                                <tr class='TemporalValidity sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_result_3">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t4_result_3" id="c15_t4_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t4_conform_result_3"){
                                                                ?>
                                                                <tr class='TemporalValidity sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_conform_result_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t4_conform_result_3" id="c15_t4_conform_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                                <table class="table table-borderless dqtabstable">
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
                                                        <?php
                                                        foreach($template->template[strtolower($_GET['kategori'])]['accordion15'] as $key=>$val){
                                                            if($key == "c15_t5_scope"){
                                                                ?>
                                                                <tr class='classificationCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t5_scope" id="c15_t5_scope" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_comply_level"){
                                                                ?>
                                                                <tr class='classificationCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t5_comply_level" id="c15_t5_comply_level" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_date"){
                                                                ?>
                                                                <tr class='classificationCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t5_classCorrect_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t5_date" id="c15_t5_date" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_result"){
                                                                ?>
                                                                <tr class='classificationCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t5_result" id="c15_t5_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_conform_result"){
                                                                ?>
                                                                <tr class='classificationCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t5_conform_result" id="c15_t5_conform_result" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_scope_2"){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_scope_2">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b> 
                                                                            Dropdown
                                                                            <select name="c15_t5_scope_2" id="c15_t5_scope_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_comply_level_2"){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_comply_level_2">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t5_comply_level_2" id="c15_t5_comply_level_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_date_2"){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_2_date">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t5_classCorrect_2_date_div" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t5_date_2" id="c15_t5_date_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_result_2"){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_result_2">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t5_result_2" id="c15_t5_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_conform_result_2"){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t5_conform_result_2" id="c15_t5_conform_result_2" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_scope_3"){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_scope_3">
                                                                            <b data-toggle="tooltip" title="Pilihan meliputi 12 kategori"><?php echo __('lang.scope'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t5_scope_3" id="c15_t5_scope_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_comply_level_3"){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_comply_level_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.compliance_level'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t5_comply_level_3" id="c15_t5_comply_level_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_date_3"){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_date_3">
                                                                            <b data-toggle="tooltip" title="Tarikh penilaian kualiti data"><?php echo __('lang.date'); ?> :</b>
                                                                            <div class="input-group date" id="c15_t5_classCorrect_date_div_3" data-target-input="nearest">
                                                                                Textbox
                                                                                <input type="date" name="c15_t5_date_3" id="c15_t5_date_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                            </div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_result_3"){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_result_3">
                                                                            <b data-toggle="tooltip" title="Pengisian berdasarkan keputusan penilaian kualiti"><?php echo __('lang.result'); ?> :</b>
                                                                            Dropdown
                                                                            <select name="c15_t5_result_3" id="c15_t5_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                                <option value="">Pilih...</option>
                                                                            </select>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            if($key == "c15_t5_conform_result_3"){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness sortIt' <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_conform_result_3">
                                                                            <b data-toggle="tooltip" title="Pengisian ketekalan konsep berdasarkan tahap pematuhan."><?php echo __('lang.conformance_result'); ?> :</b>
                                                                            Textbox
                                                                            <input type="text" name="c15_t5_conform_result_3" id="c15_t5_conform_result_3" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>">
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
    $(document).ready(function () {
        $(".dqtabstable tbody").sortable({
            /* helper: fixHelperModified, */
//            stop: updateIndex
        }).disableSelection();
        
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
