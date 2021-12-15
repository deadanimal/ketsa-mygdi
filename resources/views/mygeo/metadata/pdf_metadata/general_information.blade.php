<?php $flag = 1; ?>
<div class="card card-primary div_c1" id="div_c1">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse1">
            <h4 class="card-title">
                <?php echo __('lang.accord_1'); ?>
            </h4>
        </a>
        </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <?php
            if (isset($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString != "") {
                $flag *= 0;
                ?>
                <div class="form-group row">
                    <p class="pl-lg-3 form-control-label">Content Information<span class="mx-3">:</span></p>
                    <?php echo $metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString; ?>
                </div>
                <?php
            }
            ?>
            <?php
            if (isset($metadataxml->language->CharacterString) && $metadataxml->language->CharacterString != "") {
                $flag *= 0;
                ?>
                <div class="form-group row">
                    <p class="pl-lg-3 form-control-label">Metadata Language<span class="mx-3">:</span></p>    
                    <?php
                    if($metadataxml->language->CharacterString == 'en'){
                        echo "English";
                    }elseif($metadataxml->language->CharacterString == 'bm'){
                        echo "Bahasa Malaysia";
                    }
                    ?>
                </div>    
                <?php
            }
            ?>
            <?php
            if($metadataSearched->createdate != ""){
                $flag *= 0;
                ?>
                <div class="form-group row">
                    <p class="pl-lg-3 form-control-label">Metadata Create Date<span class="mx-3">:</span></p>
                    <?php echo  date('d/m/Y',strtotime($metadataSearched->createdate)); ?>
                </div>
                <?php
            }
            ?>
            <h2 class="heading-small text-muted">Metadata Publisher</h2>
            <div class="">
                <?php
                if (isset($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="uname">
                                Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">    
                            <?php echo $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                                Agency/Organization
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">    
                        <?php echo $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_email">
                                Email
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != "") {
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_phone">
                                Telephone
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode != ""){
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0 divPublisherRole">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_role">
                                Role
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php echo $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if(isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != ""){
                    $flag *= 0;
                    ?>
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="metadata_standard_name">
                                Metadata Standard Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            MyGDI Metadata Standard
                            <?php echo '('.$metadataxml->hierarchyLevel->MD_ScopeCode.')'; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="metadata_standard_version">
                            Metadata Standard Version
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        Version 1.0 2021
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c1').hide();
        });
    </script>
    <?php
}
?>