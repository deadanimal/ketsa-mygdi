<div class="card card-primary mb-4 div_c14" id="div_c14">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse14">
                <?php echo __('lang.accord_14'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse14" class="panel-collapse collapse in" data-parent="#div_c14">
        <div class="card-body">
            <div class="sortableContainer1">
                @if($template->template[strtolower($_GET['kategori'])]['accordion14']['c14_useLimitation']['status'] == 'active')
                <div class="row sortIt divUseLimitation">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <label class="form-control-label mr-3" for="c14_useLimitation">
                                <?php echo __('lang.use_limitation'); ?>
                            </label>
                            <input type="text" name="c14_useLimitation" id="c14_useLimitation" class="form-control form-control-sm sortable" value="{{ old('c14_useLimitation') }}">
                        </div>
                    </div>
                </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion14']['c14_access_constraint']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <label class="form-control-label mr-3" for="input-access-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                <?php echo __('lang.access_constraints'); ?>
                            </label>
                            <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm sortable">
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
                </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion14']['c14_use_constraint']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <label class="form-control-label mr-3" for="input-use-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                <?php echo __('lang.use_constraints'); ?>
                            </label>
                            <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm sortable">
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
                </div>
                @endif


                @if($template->template[strtolower($_GET['kategori'])]['accordion14']['c14_classification_sys']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <label class="form-control-label mr-3" for="input-access-cons" data-toggle="tooltip" title="Pengisian berkaitan sekatan capaian maklumat Geospatial">
                                <?php echo __('lang.classification'); ?>
                            </label>
                            <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm sortable">
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
                </div>
                @endif
                @if($template->template[strtolower($_GET['kategori'])]['accordion14']['c14_reference']['status'] == 'active')
                <div class="row sortIt">
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <label class="form-control-label mr-3" for="input-reference" data-toggle="tooltip" title="Pengisian polisi/perundangan bagi maklumat geospatial.
                                   Contoh: Pekeliling Arahan Keselamatan Dokumen Geospatial Terperingkat Terhadap">
                                       <?php echo __('lang.classification_system'); ?>
                            </label>
                            <input class="form-control form-control-sm sortable" name="c14_reference" id="input-reference" type="text" placeholder="Standard/Policy/Act/Circular/Legal" value="{{old('c14_reference')}}">
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
