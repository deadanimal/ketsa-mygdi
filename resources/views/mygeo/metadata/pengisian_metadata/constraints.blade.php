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
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <h6 class="heading-small text muted">Legal Constraints</h6>
                                                        <div class="pl-lg-3">
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <label class="form-control-label" for="input-access-cons">
                                                                        Access Constraints
                                                                    </label>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm">
                                                                        <option value="Copyright" {{(old('c14_access_constraint') == 'Copyright' ? "selected":"")}}>Copyright</option>
                                                                        <option value="Intellectual Property Rights" {{(old('c14_access_constraint') == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                                                        <option value="License" {{(old('c14_access_constraint') == 'License' ? "selected":"")}}>License</option>
                                                                        <option value="License End User" {{(old('c14_access_constraint') == 'License End User' ? "selected":"")}}>License End User</option>
                                                                        <option value="License Unrestricted" {{(old('c14_access_constraint') == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                                                        <option value="Other Restrictions" {{(old('c14_access_constraint') == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                                                        <option value="Patient" {{(old('c14_access_constraint') == 'Patient' ? "selected":"")}}>Patient</option>
                                                                        <option value="Patient Pending" {{(old('c14_access_constraint') == 'Patient Pending' ? "selected":"")}}>Patient Pending</option>
                                                                        <option value="Restricted" {{(old('c14_access_constraint') == 'Restricted' ? "selected":"")}}>Restricted</option>
                                                                        <option value="Trademark" {{(old('c14_access_constraint') == 'Trademark' ? "selected":"")}}>Trademark</option>
                                                                        <option value="Unrestricted" {{(old('c14_access_constraint') == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <label class="form-control-label" for="input-use-cons">
                                                                        Use Constraints
                                                                    </label>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm">
                                                                        <option value="Copyright" {{(old('c14_use_constraint') == 'Copyright' ? "selected":"")}}>Copyright</option>
                                                                        <option value="Intellectual Property Rights" {{(old('c14_use_constraint') == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                                                        <option value="License" {{(old('c14_use_constraint') == 'License' ? "selected":"")}}>License</option>
                                                                        <option value="License End User" {{(old('c14_use_constraint') == 'License End User' ? "selected":"")}}>License End User</option>
                                                                        <option value="License Unrestricted" {{(old('c14_use_constraint') == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                                                        <option value="Other Restrictions" {{(old('c14_use_constraint') == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                                                        <option value="Patient" {{(old('c14_use_constraint') == 'Patient' ? "selected":"")}}>Patient</option>
                                                                        <option value="Patient Pending" {{(old('c14_use_constraint') == 'Patient Pending' ? "selected":"")}}>Patient Pending</option>
                                                                        <option value="Restricted" {{(old('c14_use_constraint') == 'Restricted' ? "selected":"")}}>Restricted</option>
                                                                        <option value="Trademark" {{(old('c14_use_constraint') == 'Trademark' ? "selected":"")}}>Trademark</option>
                                                                        <option value="Unrestricted" {{(old('c14_use_constraint') == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <h6 class="heading-small text muted">Security Constraints
                                                        </h6>
                                                        <div class="pl-lg-3">
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <label class="form-control-label" for="input-access-cons">
                                                                        Classification System
                                                                    </label>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm">
                                                                        <option value="Limited" {{(old('c14_classification_sys') == 'Limited' ? "selected":"")}}>Limited</option>
                                                                        <option value="Open" {{(old('c14_classification_sys') == 'Open' ? "selected":"")}}>Open</option>
                                                                        <option value="Secret" {{(old('c14_classification_sys') == 'Secret' ? "selected":"")}}>Secret</option>
                                                                        <option value="Top Secret" {{(old('c14_classification_sys') == 'Top Secret' ? "selected":"")}}>Top Secret</option>
                                                                        <option value="Others" {{(old('c14_classification_sys') == 'Others' ? "selected":"")}}>Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-xl-5">
                                                                    <label class="form-control-label" for="input-reference">
                                                                        Reference
                                                                    </label>
                                                                </div>
                                                                <div class="col-xl-7">
                                                                    <input class="form-control form-control-sm" id="input-reference" type="text" placeholder="Standard/Policy/Act/Circular/Legal" value="{{old('c14_reference')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
