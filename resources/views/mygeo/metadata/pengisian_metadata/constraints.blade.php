<div class="card card-primary mb-4 div_c14" id="div_c14">
    <div class="card-header" style="background-color: #b3d1ff;color: black;cursor: pointer;border-radius: 10px;padding: 15px 13px;font-size: 1.2rem;">
        <h4 class="card-title" style="font-weight: 600 !important;">
                                                <a data-toggle="collapse" href="#collapse14">
                                                    <?php echo __('lang.accord_14'); ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse14" class="panel-collapse collapse in" data-parent="#div_c14">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                                if($val['status'] == "customInput"){
                                                                    ?>
                                                                    <div class="col-3 pl-5">
                                                                        <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                                                        <label class="float-right">:</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <h6 class="heading-small text muted"><?php echo __('lang.legalConstraints'); ?></h6>
                                                        <div class="pl-lg-3">
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                                if($key == "c14_useLimitation"){
                                                                    ?>
                                                                    <div class="row mb-2 divUseLimitation" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <div class="col-xl-5">
                                                                            <label class="form-control-label" for="c14_useLimitation">
                                                                                <?php echo __('lang.use_limitation'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                                            </label>
                                                                            <span style="float: right;">: </span>
                                                                        </div>
                                                                        <div class="col-xl-7">
                                                                            <input type="text" name="c14_useLimitation" id="c14_useLimitation" class="form-control form-control-sm" value="{{ old('c14_useLimitation') }}">
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($key == "c14_access_constraint"){
                                                                    ?>
                                                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <div class="col-xl-5">
                                                                            <label class="form-control-label" for="input-access-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                                                                <?php echo __('lang.access_constraints'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                                            </label>
                                                                            <span style="float: right;">: </span>
                                                                        </div>
                                                                        <div class="col-xl-7">
                                                                            <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm">
                                                                                <option value="">Pilih</option>
                                                                                <option value="Copyright" {{(old('c14_access_constraint') == 'Copyright' ? "selected":"")}}>Copyright</option>
                                                                                <option value="Intellectual Property Rights" {{(old('c14_access_constraint') == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                                                                <option value="License" {{(old('c14_access_constraint') == 'License' ? "selected":"")}}>License</option>
                                                                                <option value="License End User" {{(old('c14_access_constraint') == 'License End User' ? "selected":"")}}>License End User</option>
                                                                                <option value="License Unrestricted" {{(old('c14_access_constraint') == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                                                                <option value="Other Restrictions" {{(old('c14_access_constraint') == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                                                                <option value="Patent" {{(old('c14_access_constraint') == 'Patent' ? "selected":"")}}>Patent</option>
                                                                                <option value="Patent Pending" {{(old('c14_access_constraint') == 'Patent Pending' ? "selected":"")}}>Patent Pending</option>
                                                                                <option value="Restricted" {{(old('c14_access_constraint') == 'Restricted' ? "selected":"")}}>Restricted</option>
                                                                                <option value="Trademark" {{(old('c14_access_constraint') == 'Trademark' ? "selected":"")}}>Trademark</option>
                                                                                <option value="Unrestricted" {{(old('c14_access_constraint') == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($key == "c14_use_constraint"){
                                                                    ?>
                                                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <div class="col-xl-5">
                                                                            <label class="form-control-label" for="input-use-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                                                                <?php echo __('lang.use_constraints'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                                            </label>
                                                                            <span style="float: right;">: </span>
                                                                        </div>
                                                                        <div class="col-xl-7">
                                                                            <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm">
                                                                                <option value="">Pilih</option>
                                                                                <option value="Copyright" {{(old('c14_use_constraint') == 'Copyright' ? "selected":"")}}>Copyright</option>
                                                                                <option value="Intellectual Property Rights" {{(old('c14_use_constraint') == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                                                                <option value="License" {{(old('c14_use_constraint') == 'License' ? "selected":"")}}>License</option>
                                                                                <option value="License End User" {{(old('c14_use_constraint') == 'License End User' ? "selected":"")}}>License End User</option>
                                                                                <option value="License Unrestricted" {{(old('c14_use_constraint') == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                                                                <option value="Other Restrictions" {{(old('c14_use_constraint') == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                                                                <option value="Patent" {{(old('c14_use_constraint') == 'Patent' ? "selected":"")}}>Patent</option>
                                                                                <option value="Patent Pending" {{(old('c14_use_constraint') == 'Patent Pending' ? "selected":"")}}>Patent Pending</option>
                                                                                <option value="Restricted" {{(old('c14_use_constraint') == 'Restricted' ? "selected":"")}}>Restricted</option>
                                                                                <option value="Trademark" {{(old('c14_use_constraint') == 'Trademark' ? "selected":"")}}>Trademark</option>
                                                                                <option value="Unrestricted" {{(old('c14_use_constraint') == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <h6 class="heading-small text muted"> <?php echo __('lang.securityConstraints'); ?></h6>
                                                        <div class="pl-lg-3">
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                                if($key == "c14_classification_sys"){
                                                                    ?>
                                                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <div class="col-xl-5">
                                                                            <label class="form-control-label" for="input-access-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                                                                <?php echo __('lang.classification'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                                            </label>
                                                                            <span style="float: right;">: </span>
                                                                        </div>
                                                                        <div class="col-xl-7">
                                                                            <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm">
                                                                                <option value="">Pilih</option>
                                                                                <option value="Confidential" {{(old('c14_classification_sys') == 'Confidential' ? "selected":"")}}>Confidential</option>
                                                                                <option value="For Official Use Only" {{(old('c14_classification_sys') == 'For Official Use Only' ? "selected":"")}}>For Official Use Only</option>
                                                                                <option value="Limited Distribution" {{(old('c14_classification_sys') == 'Limited Distribution' ? "selected":"")}}>Limited Distribution</option>
                                                                                <option value="Protected" {{(old('c14_classification_sys') == 'Protected' ? "selected":"")}}>Protected</option>
                                                                                <option value="Restricted" {{(old('c14_classification_sys') == 'Restricted' ? "selected":"")}}>Restricted</option>
                                                                                <option value="Secret" {{(old('c14_classification_sys') == 'Secret' ? "selected":"")}}>Secret</option>
                                                                                <option value="Sensitive But Unclassified" {{(old('c14_classification_sys') == 'Sensitive But Unclassified' ? "selected":"")}}>Sensitive But Unclassified</option>
                                                                                <option value="Top Secret" {{(old('c14_classification_sys') == 'Top Secret' ? "selected":"")}}>Top Secret</option>
                                                                                <option value="Unclassified" {{(old('c14_classification_sys') == 'Unclassified' ? "selected":"")}}>Unclassified</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                if($key == "c14_reference"){
                                                                    ?>
                                                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <div class="col-xl-5">
                                                                            <label class="form-control-label" for="input-reference" data-toggle="tooltip" title="Pengisian polisi/perundangan bagi maklumat geospatial.
                                                                            Contoh: Pekeliling Arahan Keselamatan Dokumen Geospatial Terperingkat Terhadap">
                                                                            <?php echo __('lang.classification_system'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                                                            </label>
                                                                            <span style="float: right;position: absolute;">: </span>
                                                                        </div>
                                                                        <div class="col-xl-7">
                                                                            <input class="form-control form-control-sm" name="c14_reference" id="input-reference" type="text" placeholder="Standard/Policy/Act/Circular/Legal" value="{{old('c14_reference')}}">
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
                                        </div>
                                    </div>
