<div class="card card-primary div_c1" id="div_c1">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse1">
            <h4 class="card-title">
                <?php echo __('lang.accord_1'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <div class="form-group row">
                <p>
                    Content Information:
                    <?php
                        if(isset($metadataxml->contact->CI_ResponsibleParty) && $metadataxml->contact->CI_ResponsibleParty != ""){
                            echo $metadataxml->contact->CI_ResponsibleParty;
                        }
                    ?>
                </p>
            </div>

            <br><b>Metadata Publisher</b><br>

            <div class="table-responsive">
                <table class="table-borderless">
                    <tbody>
                        <tr>
                            <td>Name&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != ""){
                                        echo $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString;
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Agency/Organization&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != ""){
                                        echo $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString;
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != ""){
                                        echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                    if(isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != ""){
                                        echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
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