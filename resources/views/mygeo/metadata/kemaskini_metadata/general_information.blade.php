<div class="card card-primary mb-4 div_c1" id="div_c1">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse1">
            <h4 class="card-title">
                <?php echo __('lang.accord_1'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal1">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal1">Catatan</button>
        @endif
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            @if($elemenMetadata['c1_content_info']->status == '1')
            <div class="form-group row">
                <p class="pl-lg-3 form-control-label">Content Information<span class="text-warning">*</span> : &nbsp;&nbsp;&nbsp;</p>
                <select name="c1_content_info" id="c1_content_info" class="form-control" style="width:175px;">
                    <option value="">Pilih...</option>
                    <option value="Application" class='optContentInfo_dataset'>Application</option>
                    <option value="Clearing House" class='optContentInfo_dataset'>Clearing House</option>
                    <option value="Downloadable Data" class='optContentInfo_dataset'>Downloadable Data</option>
                    <option value="Geographic Activities" class='optContentInfo_dataset'>Geographic Activities</option>
                    <option value="Geographic Services" class='optContentInfo_dataset'>Geographic Services</option>
                    <option value="Map File" class='optContentInfo_dataset'>Map File</option>
                    <option value="Offline Data" class='optContentInfo_dataset'>Offline Data</option>
                    <option value="Static Map Images" class='optContentInfo_dataset'>Static Map Images</option>
                    <option value="Other Documents" class='optContentInfo_dataset'>Other Documents</option>
                    
                    <option value="Live Data and Maps" class='optContentInfo_services'>Live Data and Maps</option>
                    
                    <option value="Gridded" class='optContentInfo_gridded'>Gridded</option>
                    
                    <option value="Imagery" class='optContentInfo_imagery'>Imagery</option>
                </select>
                
                <p class="ml-3 mb-0 lblContentInfo"></p>
                <input type="hidden" name="c1_content_info" class="form-control form-control-sm" id="content_info_text" style="width:175px;display:none;" disabled value="">
                
                @error('c1_content_info')
                <div class="text-error">{{ $message }}</div>
                @enderror
                </select>
            </div>
            @endif

            <h2 class="heading-small text-muted">Metadata Publisher</h2>

            <div class="my-1">
                @if($elemenMetadata['publisher_name']->status == '1')
                <div class="row my-0 py-0">
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
                @endif
                @if($elemenMetadata['publisher_agensi_organisasi']->status == '1')
                <div class="row my-0 py-0">
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
                @endif
                @if($elemenMetadata['publisher_email']->status == '1')
                <div class="row my-0 py-0">
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
                @endif
                @if($elemenMetadata['publisher_phone']->status == '1')
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_phone">
                            Telephone
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
                @endif
                @if($elemenMetadata['publisher_role']->status == '1')
                <div class="row my-0 py-0 divPublisherRole">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_role">
                            Role
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <?php
                        $pub_role = "";
                        if(isset($metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode != ""){
                            $pub_role = $metadataxml->contact->CI_ResponsibleParty->role->CI_RoleCode;
                        }
                        ?>
                        <select name='publisher_role' class='form-control form-control-sm ml-3'>
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
                @endif
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
        }elseif(isset($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString != "") {
            $var = trim($metadataxml->contact->CI_ResponsibleParty->contentInfo->CharacterString);
        }
        ?>
        $('#c1_content_info').val("{{ $var }}").trigger('change');
        $('#content_info_text').val("{{ $var }}");
        console.log("{{$var}}");
    });
</script>
