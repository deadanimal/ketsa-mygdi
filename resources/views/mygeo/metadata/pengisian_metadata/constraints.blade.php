<div class="card card-primary div_c14" id="div_c14">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse14">
            <h4 class="card-title">
                <?php echo __('lang.accord_14'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse14" class="panel-collapse collapse" data-parent="#div_c14">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-borderless" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 50%">Legal Constraints</th>
                            <th style="width: 50%">Security Constraints</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Access Constraints:
                                <select name="c14_access_constraint" id="c14_access_constraint" class="form-control col-lg-7">
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
                            </td>
                            <td>
                                Classification System:
                                <select name="c14_classification_sys" id="c14_classification_sys" class="form-control col-lg-4"> 
                                    <option value="Limited" {{(old('c14_classification_sys') == 'Limited' ? "selected":"")}}>Limited</option>
                                    <option value="Open" {{(old('c14_classification_sys') == 'Open' ? "selected":"")}}>Open</option>
                                    <option value="Secret" {{(old('c14_classification_sys') == 'Secret' ? "selected":"")}}>Secret</option>
                                    <option value="Top Secret" {{(old('c14_classification_sys') == 'Top Secret' ? "selected":"")}}>Top Secret</option>
                                    <option value="Others" {{(old('c14_classification_sys') == 'Others' ? "selected":"")}}>Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Use Constraints:
                                <select name="c14_use_constraint" id="c14_use_constraint" class="form-control col-lg-7">
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
                            </td>
                            <td>
                                Reference:
                                <input type="text" name="c14_reference" id="c14_reference" class="form-control col-lg-9" placeholder="Standard/Policy/Act/Circular/Legal" value="{{old('c14_reference')}}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>