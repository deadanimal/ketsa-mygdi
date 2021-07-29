<div class="card card-primary mb-4 div_c14" id="div_c14">
    <div class="card-header">
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
    <div id="collapse14" class="panel-collapse collapse in show" data-parent="#div_c14">
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
                                <?php
                                $accessConst = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints != "") {
                                    $accessConst = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints);
                                }
                                ?>
                                <select name="c14_access_constraint" id="c14_access_constraint" class="form-control form-control-sm">
                                    <option value="Copyright" {{($accessConst == 'Copyright' ? "selected":"")}}>Copyright</option>
                                    <option value="Intellectual Property Rights" {{($accessConst == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                    <option value="License" {{($accessConst == 'License' ? "selected":"")}}>License</option>
                                    <option value="License End User" {{($accessConst == 'License End User' ? "selected":"")}}>License End User</option>
                                    <option value="License Unrestricted" {{($accessConst == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                    <option value="Other Restrictions" {{($accessConst == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                    <option value="Patent" {{($accessConst == 'Patent' ? "selected":"")}}>Patent</option>
                                    <option value="Patent Pending" {{($accessConst == 'Patent Pending' ? "selected":"")}}>Patent Pending</option>
                                    <option value="Restricted" {{($accessConst == 'Restricted' ? "selected":"")}}>Restricted</option>
                                    <option value="Trademark" {{($accessConst == 'Trademark' ? "selected":"")}}>Trademark</option>
                                    <option value="Unrestricted" {{($accessConst == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
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
                                <?php
                                $useConst = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints != "") {
                                    $useConst = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints);
                                }
                                ?>
                                <select name="c14_use_constraint" id="c14_use_constraint" class="form-control form-control-sm">
                                    <option value="Copyright" {{($useConst == 'Copyright' ? "selected":"")}}>Copyright</option>
                                    <option value="Intellectual Property Rights" {{($useConst == 'Intellectual Property Rights' ? "selected":"")}}>Intellectual Property Rights</option>
                                    <option value="License" {{($useConst == 'License' ? "selected":"")}}>License</option>
                                    <option value="License End User" {{($useConst == 'License End User' ? "selected":"")}}>License End User</option>
                                    <option value="License Unrestricted" {{($useConst == 'License Unrestricted' ? "selected":"")}}>License Unrestricted</option>
                                    <option value="Other Restrictions" {{($useConst == 'Other Restrictions' ? "selected":"")}}>Other Restrictions</option>
                                    <option value="Patent" {{($useConst == 'Patent' ? "selected":"")}}>Patient</option>
                                    <option value="Patent Pending" {{($useConst == 'Patent Pending' ? "selected":"")}}>Patent Pending</option>
                                    <option value="Restricted" {{($useConst == 'Restricted' ? "selected":"")}}>Restricted</option>
                                    <option value="Trademark" {{($useConst == 'Trademark' ? "selected":"")}}>Trademark</option>
                                    <option value="Unrestricted" {{($useConst == 'Unrestricted' ? "selected":"")}}>Unrestricted</option>
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
                                    Classification
                                </label>
                            </div>
                            <div class="col-xl-7">
                                <?php
                                $classSys = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification != "") {
                                    $classSys = trim($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification);
                                }
                                ?>
                                <select name="c14_classification_sys" id="c14_classification_sys" class="form-control form-control-sm">
                                    <option value="unclassified" {{($classSys == 'unclassified' ? "selected":"")}}>unclassified</option>
                                    <option value="restricted" {{($classSys == 'restricted' ? "selected":"")}}>restricted</option>
                                    <option value="confidential" {{($classSys == 'confidential' ? "selected":"")}}>confidential</option>
                                    <option value="Secret" {{($classSys == 'Secret' ? "selected":"")}}>Secret</option>
                                    <option value="Top Secret" {{($classSys == 'Top Secret' ? "selected":"")}}>Top Secret</option>
                                    <option value="sensitiveButUnclassified" {{($classSys == 'sensitiveButUnclassified' ? "selected":"")}}>sensitiveButUnclassified</option>
                                    <option value="forOfficialUseOnly Others" {{($classSys == 'forOfficialUseOnly Others' ? "selected":"")}}>forOfficialUseOnly Others</option>
                                    <option value="protected" {{($classSys == 'protected' ? "selected":"")}}>protected</option>
                                    <option value="limitedDistribution" {{($classSys == 'limitedDistribution' ? "selected":"")}}>limitedDistribution</option>
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
                                <?php
                                $ref = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != "") {
                                    $ref = $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference;
                                }
                                ?>
                                <input type="text" name="c14_reference" id="c14_reference" class="form-control form-control-sm" placeholder="Standard/Policy/Act/Circular/Legal" value="{{ $ref }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
