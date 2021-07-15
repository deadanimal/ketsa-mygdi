<div class="card card-primary div_c2" id="div_c2">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse2">
            <h4 class="card-title">
                <?php echo __('lang.accord_2'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-borderless" style="width:80%;">
                    <tbody>
                        <tr>
                            <td>Metadata Name&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Type Of Product&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->productType) && $metadataxml->identificationInfo->SV_ServiceIdentification->productType != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->productType;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Abstract&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->abstract;
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table-borderless">
                    <tbody>
                        <tr>
                            <td colspan="3"><br><b>Responsible Party</b><br></td>
                        </tr>
                        <tr>
                            <td>Name: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Agency/Organization &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                                }
                                ?>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Address &nbsp;</td>
                            <td style="vertical-align: top;">:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                                }
                                ?>
                                
                                <div class="form-group row">
                                    State:
                                    <?php
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != ""){
                                        echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString;
                                    }
                                    ?>
                               
                                    &nbsp;&nbsp;&nbsp;
                                    Country: 
                                    <?php echo $countries->name; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != ""){
                                        echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Fax: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != ""){
                                        echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone(Office): &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != ""){
                                        echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Website: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != ""){
                                        echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
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