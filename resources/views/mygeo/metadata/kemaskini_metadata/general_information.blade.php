<div class="card card-primary mb-4 div_c1" id="div_c1">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse1">
            <h4 class="card-title">
                <?php echo __('lang.accord_1'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal1">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal1">Catatan</button>
        @endif
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <?php 
            foreach($template->template[strtolower($catSelected)]['accordion1'] as $key=>$val){
                if($val['status'] == "customInput"){
                    ?>
                    <div class="row mb-2 sortIt">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                            <label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>"/>
                        </div>
                    </div>
                    <?php
                }
                if($key == "c1_content_info"){
                    ?>
                    <div class="form-group row" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <p class="pl-lg-3 form-control-label">Content Information<span class="text-warning">*</span> : &nbsp;&nbsp;&nbsp;</p>
                        <?php
                        $contentInfo = $ci = "";
                        if (isset($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString) && $metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString != "") {
                            $ci = ucwords($metadataxml->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->description->CharacterString);
                        }
                        if($ci != ""){
                            if($ci == "Clearinghouse"){
                                $contentInfo = "Clearing House";
                            }elseif($ci == "DownloadableData"){
                                $contentInfo = "Downloadable Data";
                            }elseif($ci == "GeographicActivities"){
                                $contentInfo = "Geographic Activities";
                            }elseif($ci == "GeographicService"){
                                $contentInfo = "Geographic Service";
                            }elseif($ci == "MapFiles"){
                                $contentInfo = "Map Files";
                            }elseif($ci == "OfflineData"){
                                $contentInfo = "Offline Data";
                            }elseif($ci == "StaticMapImage"){
                                $contentInfo = "Static Map Image";
                            }elseif($ci == "LiveData"){
                                $contentInfo = "Live Data";
                            }
                        }
                        ?>
                        <select name="c1_content_info" id="c1_content_info" class="form-control" style="width:175px;">
                            <option value="">Pilih...</option>
                            <option value="application" class='optContentInfo_dataset'>Application</option>
                            <option value="clearinghouse" class='optContentInfo_dataset'>Clearing House</option>
                            <option value="downloadableData" class='optContentInfo_dataset'>Downloadable Data</option>
                            <option value="geographicActivities" class='optContentInfo_dataset'>Geographic Activities</option>
                            <option value="geographicService" class='optContentInfo_dataset'>Geographic Services</option>
                            <option value="mapFiles" class='optContentInfo_dataset'>Map File</option>
                            <option value="offlineData" class='optContentInfo_dataset'>Offline Data</option>
                            <option value="staticMapImage" class='optContentInfo_dataset'>Static Map Images</option>
                            <option value="other" class='optContentInfo_dataset'>Other Documents</option>

                            <option value="liveData" class='optContentInfo_services'>Live Data and Maps</option>

                            <option value="Gridded" class='optContentInfo_gridded'>Gridded</option>

                            <option value="Imagery" class='optContentInfo_imagery'>Imagery</option>
                        </select>

                        <p class="ml-3 mb-0 lblContentInfo">{{ $contentInfo }}</p>
                        <input type="hidden" name="c1_content_info" class="form-control form-control-sm" id="content_info_text" style="width:175px;display:none;" disabled value="">

                        @error('c1_content_info')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                        </select>
                    </div>
                    <?php
                }
            }
            ?>

            <h2 class="heading-small text-muted">Metadata Publisher</h2>
            
            <div class="my-1">
            <?php
            foreach($template->template[strtolower($catSelected)]['accordion1'] as $key=>$val){
                if($key == "publisher_name"){
                    ?>
                    <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="uname">
                                Name
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php
                            $pub_name = "";
                            if (isset($metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                                $pub_name = $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString;
    //                            echo $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString;
                            }
                            ?>
                            <input class="form-control form-control-sm ml-3" type="text" name="publisher_name" value="{{ $pub_name }}">
                        </div>
                    </div>
                    <?php
                }
                if($key == "publisher_agensi_organisasi"){
                    ?>
                    <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                                Agency/Organization
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php
                            $pub_agencyOrg = "";
                            if (isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                                $pub_agencyOrg = $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString;
    //                            echo $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString;
                            }
                            ?>
                            <input class="form-control form-control-sm ml-3" type="text" name="publisher_agensi_organisasi" value="{{ $pub_agencyOrg }}">
                            <?php
                            $bahagian = "";
                            if (isset($metadataxml->contact->CI_ResponsibleParty->departmentName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->departmentName->CharacterString != "") {
                                $bahagian = $metadataxml->contact->CI_ResponsibleParty->departmentName->CharacterString;
                            }
                            ?>
                            <input type="hidden" name="publisher_bahagian" value="{{ $bahagian }}" />
                        </div>
                    </div>
                    <?php
                }
                if($key == "publisher_email"){
                    ?>
                    <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_email">
                                Email
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php
                            $pub_email = "";
                            if (isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                                $pub_email = $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
    //                            echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                            }
                            ?>
                            <input class="form-control form-control-sm ml-3" type="text" name="publisher_email" value="{{ $pub_email }}">
                        </div>
                    </div>
                    <?php
                }
                if($key == "publisher_phone"){
                    ?>
                    <div class="row my-0 py-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_phone">
                                Telephone {{ $val['status'] }}
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php
                            $pub_phone = "";
                            if(isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != ""){
                            $pub_phone = $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
    //                        echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                            }
                            ?>
                            <input class="form-control form-control-sm ml-3" type="text" name="publisher_phone" value="{{ $pub_phone }}">
                        </div>
                    </div>
                    <?php
                }
                if($key == "publisher_role"){
                    ?>
                    <div class="row my-0 py-0 divPublisherRole" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="publisher_role">
                                Role
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php 
                            $pub_role = "";
                            if(isset($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode != ""){
                                $pub_role = ucwords($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode);
                            }
                            ?>
                            <select name='publisher_role' class='form-control form-control-sm ml-3'>
                                <option value="">Pilih...</option>
                                <option value="Author" {{ ($pub_role == "Author" ? "selected":"") }}>Author</option>
                                <option value="Custodian" {{ ($pub_role == "Custodian" ? "selected":"") }}>Custodian</option>
                                <option value="Distributor" {{ ($pub_role == "Distributor" ? "selected":"") }}>Distributor</option>
                                <option value="Originator" {{ ($pub_role == "Originator" ? "selected":"") }}>Originator</option>
                                <option value="Owner" {{ ($pub_role == "Owner" ? "selected":"") }}>Owner</option>
                                <option value="Point of Contact" {{ ($pub_role == "Point of Contact" ? "selected":"") }}>Point of Contact</option>
                                <option value="Principal Investigator" {{ ($pub_role == "Principal Investigator" ? "selected":"") }}>Principal Investigator</option>
                                <option value="Processor" {{ ($pub_role == "Processor" ? "selected":"") }}>Processor</option>
                                <option value="Publisher" {{ ($pub_role == "Publisher" ? "selected":"") }}>Publisher</option>
                                <option value="Resource Provider" {{ ($pub_role == "Resource Provider" ? "selected":"") }}>Resource Provider</option>
                                <option value="User" {{ ($pub_role == "User" ? "selected":"") }}>User</option>
                            </select>
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

<script>
    $(document).ready(function() {
        <?php
        $var = "";
        if(old('c1_content_info') != ""){
            $var = old('c1_content_info');
        }else{
            $var = $contentInfo;
        }
        ?>
        $('#c1_content_info').val("{{ $var }}").trigger('change');
        $('#content_info_text').val("{{ $var }}");
    });
</script>
