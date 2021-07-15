<div class="card card-primary div_c14" id="div_c14">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse14">
            <h4 class="card-title">
                <?php echo __('lang.accord_14'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal14">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal14">Catatan</button>
        @endif
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
                                <?php
                                $accessConst = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints != ""){
                                    $accessConst = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints);
                                }
                                ?>
                                <select name="c14_access_constraint" id="c14_access_constraint" class="form-control col-lg-7">
                                    <option value="Copyright" {{($accessConst == 'Copyright' ? "selected":"")}}>Copyright</option>
                                    <option value="Intellectual Property Rights" {{($accessConst == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                    <option value="License" {{($accessConst == 'License' ? "selected":"")}}>License</option>
                                    <option value="License End User" {{($accessConst == 'License End User' ? "selected":"")}}>License End User</option>
                                    <option value="License Unrestricted" {{($accessConst == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                    <option value="Other Restrictions" {{($accessConst == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                    <option value="Patient" {{($accessConst == 'Patient' ? "selected":"")}}>Patient</option>
                                    <option value="Patient Pending" {{($accessConst == 'Patient Pending' ? "selected":"")}}>Patient Pending</option>
                                    <option value="Restricted" {{($accessConst == 'Restricted' ? "selected":"")}}>Restricted</option>
                                    <option value="Trademark" {{($accessConst == 'Trademark' ? "selected":"")}}>Trademark</option>
                                    <option value="Unrestricted" {{($accessConst == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                </select>
                            </td>
                            <td>
                                Classification System:
                                <?php
                                $classSys = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification != ""){
                                    $classSys = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification);
                                }
                                ?>
                                <select name="c14_classification_sys" id="c14_classification_sys" class="form-control col-lg-4"> 
                                    <option value="Limited" {{($classSys == 'Limited' ? "selected":"")}}>Limited</option>
                                    <option value="Open" {{($classSys == 'Open' ? "selected":"")}}>Open</option>
                                    <option value="Secret" {{($classSys == 'Secret' ? "selected":"")}}>Secret</option>
                                    <option value="Top Secret" {{($classSys == 'Top Secret' ? "selected":"")}}>Top Secret</option>
                                    <option value="Others" {{($classSys == 'Others' ? "selected":"")}}>Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Use Constraints:
                                <?php
                                $useConst = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints != ""){
                                    $useConst = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints);
                                }
                                ?>
                                <select name="c14_use_constraint" id="c14_use_constraint" class="form-control col-lg-7">
                                    <option value="Copyright" {{($useConst == 'Copyright' ? "selected":"")}}>Copyright</option>
                                    <option value="Intellectual Property Rights" {{($useConst == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                    <option value="License" {{($useConst == 'License' ? "selected":"")}}>License</option>
                                    <option value="License End User" {{($useConst == 'License End User' ? "selected":"")}}>License End User</option>
                                    <option value="License Unrestricted" {{($useConst == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                    <option value="Other Restrictions" {{($useConst == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                    <option value="Patient" {{($useConst == 'Patient' ? "selected":"")}}>Patient</option>
                                    <option value="Patient Pending" {{($useConst == 'Patient Pending' ? "selected":"")}}>Patient Pending</option>
                                    <option value="Restricted" {{($useConst == 'Restricted' ? "selected":"")}}>Restricted</option>
                                    <option value="Trademark" {{($useConst == 'Trademark' ? "selected":"")}}>Trademark</option>
                                    <option value="Unrestricted" {{($useConst == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
                                </select>
                            </td>
                            <td>
                                Reference:
                                <?php
                                $ref = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != ""){
                                    $ref = $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
                                }
                                ?>
                                <input type="text" name="c14_reference" id="c14_reference" class="form-control col-lg-9" placeholder="Standard/Policy/Act/Circular/Legal" value="{{ $ref }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>