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
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints != ""){
                                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->accessConstraints."</p>";
                                }
                                ?>
                            </td>
                            <td>
                                Classification System:
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification != ""){
                                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->classification."</p>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Use Constraints:
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints != ""){
                                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_LegalConstraints->useConstraints."</p>";
                                }
                                ?>
                            </td>
                            <td>
                                Reference:
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference) && $metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference != ""){
                                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->resourceConstraints->MD_SecurityConstraints->constraintsReference."</p>";
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>