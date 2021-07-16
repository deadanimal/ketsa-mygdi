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
            <div class="form-group row">
                <p class="pl-lg-3 form-control-label">Content Information<span class="text-warning">*</span> : &nbsp;&nbsp;&nbsp;</p>
                <?php
                $var = "";
                if (isset($metadataxml->contact->CI_ResponsibleParty) && $metadataxml->contact->CI_ResponsibleParty != "") {
                    $var = trim($metadataxml->contact->CI_ResponsibleParty);
                }
                ?>
                <select name="c1_content_info" id="c1_content_info" class="form-control" style="width:175px;">
                    <option disabled>Select Content</option>
                    <option value="Application" {{($var=="Application" ? "selected":"")}}>Application</option>
                    <option value="Clearing House" {{($var=='Clearing House' ? 'selected':'')}}>Clearing House</option>
                    <option value="Downloadable Data" {{($var=='Downloadable Data' ? 'selected':'')}}>Downloadable Data</option>
                    <option value="Geographic Activities" {{($var=='Geographic Activities' ? 'selected':'')}}>Geographic Activities</option>
                    <option value="Geographic Services" {{($var=='Geographic Services' ? 'selected':'')}}>Geographic Services</option>
                    <option value="Map File" {{($var=='Map File' ? 'selected':'')}}>Map File</option>
                    <option value="Offline Data" {{($var=='Offline Data' ? 'selected':'')}}>Offline Data</option>
                    <option value="Static Map Images" {{($var=='Static Map Images' ? 'selected':'')}}>Static Map Images</option>
                    <option value="Other Documents" {{($var=='Other Documents' ? 'selected':'')}}>Other Documents</option>
                </select>
                @error('c1_content_info')
                <div class="text-error">{{ $message }}</div>
                @enderror value="otherDocs">Other Documents</option>
                </select>
            </div>

            <h2 class="heading-small text-muted">Metadata Publisher</h2>

            <div class="my-1">
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
                            echo $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString;
                        }
                        ?>
                        <input type="hidden" name="publisher_name" value="{{ $pub_name }}">
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                            Agency/Organization
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <?php
                        $pub_agencyOrg = "";
                        if (isset($metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->individualName->CharacterString != "") {
                            $pub_agencyOrg = $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString;
                            echo $metadataxml->contact->CI_ResponsibleParty->organisationName->CharacterString;
                        }
                        ?>
                        <input type="hidden" name="publisher_agensi_organisasi" value="{{ $pub_agencyOrg }}">
                    </div>
                </div>
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
                            echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                        }
                        ?>
                        <input type="hidden" name="publisher_email" value="{{ $pub_email }}">
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_phone">
                            Telephone
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        ?php
                        $pub_phone = "";
                        if(isset($metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != ""){
                        $pub_phone = $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                        echo $metadataxml->contact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                        }
                        ?>
                        <input type="hidden" name="publisher_phone" value="{{ $pub_phone }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {});
</script>
