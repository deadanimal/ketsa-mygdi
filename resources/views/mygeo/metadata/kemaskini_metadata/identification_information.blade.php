<div class="card card-primary mb-4 div_c2" id="div_c2">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse2">
                <?php echo __('lang.accord_2'); ?>
            </a>
        </h4>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal2">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal2">Catatan</button>
        @endif
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            <?php
                            if(isset($metadataxml->categoryTitle) && $metadataxml->categoryTitle != ""){
                                if(strtolower($metadataxml->categoryTitle) == "dataset"){
                                    echo "Title";
                                }else{
                                    echo "Metadata Name";
                                }
                            }
                            ?>
                            <span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $met_name = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != "") {
                            $met_name = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                        }
                        ?>
                        <input type="text" name="c2_metadataName" id="c2_metadataName" class="form-control form-control-sm ml-3" value="{{ $met_name }}">
                        @error('c2_metadataName')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Type of Product<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $typeofProd = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->productType) && $metadataxml->identificationInfo->SV_ServiceIdentification->productType != "") {
                            $typeofProd = trim($metadataxml->identificationInfo->SV_ServiceIdentification->productType);
                        }
                        ?>
                        <select name="c2_product_type" id="c2_product_type" class="form-control form-control ml-3">
                            <option disabled>Type of Product</option>
                            <option value="Application" {{($typeofProd == "Application" ? "selected":"")}}>Application</option>
                            <option value="Document" {{($typeofProd == "Document" ? "selected":"")}}>Document</option>
                            <option value="GIS Activity/Project" {{($typeofProd == "GIS Activity/Project" ? "selected":"")}}>GIS Activity/Project</option>
                            <option value="Map" {{($typeofProd == "Map" ? "selected":"")}}>Map</option>
                            <option value="Raster Data" {{($typeofProd == "Raster Data" ? "selected":"")}}>Raster Data</option>
                            <option value="Services" {{($typeofProd == "Services" ? "selected":"")}}>Services</option>
                            <option value="Software" {{($typeofProd == "Software" ? "selected":"")}}>Software</option>
                            <option value="Vector Data" {{($typeofProd == "Vector Data" ? "selected":"")}}>Vector Data</option>
                        </select>
                        @error('c2_product_type')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_abstract">
                            Abstract<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $abstract = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract != "") {
                            $abstract = $metadataxml->identificationInfo->SV_ServiceIdentification->abstract;
                        }
                        ?>
                        <textarea name="c2_abstract" id="c2_abstract" class="form-control form-control-sm ml-3">{{ $abstract }}</textarea>
                        @error('c2_abstract')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataDate">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_date">
                            Date
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $metDate = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->metadataDate->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDate->CharacterString != "") {
                            $metDate = $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDate->CharacterString;
                        }
                        ?>
                        <input class="form-control form-control-sm" type="date" name="c2_metadataDate" id="c2_metadataDate" value="{{ $metDate }}">
                        @error('c2_metadataDate')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataDateType">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_date">
                            Date Type
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $metDateType = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->metadataDateType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDateType->CharacterString != "") {
                            $metDateType = $metadataxml->identificationInfo->SV_ServiceIdentification->metadataDateType->CharacterString;
                        }
                        ?>
                        <select name="c2_metadataDateType" id="c2_metadataDateType" class="form-control form-control-sm">
                            <option value="Adopted" {{ ($metDateType == "Adopted" ? "selected":"") }}>Adopted</option>
                            <option value="Creation" {{ ($metDateType == "Creation" ? "selected":"") }}>Creation</option>
                            <option value="Deprecated" {{ ($metDateType == "Deprecated" ? "selected":"") }}>Deprecated</option>
                            <option value="Distribution" {{ ($metDateType == "Distribution" ? "selected":"") }}>Distribution</option>
                            <option value="Expiry" {{ ($metDateType == "Expiry" ? "selected":"") }}>Expiry</option>
                            <option value="In Force" {{ ($metDateType == "In Force" ? "selected":"") }}>In Force</option>
                            <option value="Last Revison" {{ ($metDateType == "Last Revison" ? "selected":"") }}>Last Revison</option>
                            <option value="Last Update" {{ ($metDateType == "Last Update" ? "selected":"") }}>Last Update</option>
                            <option value="Next Update" {{ ($metDateType == "Next Update" ? "selected":"") }}>Next Update</option>
                            <option value="Publication" {{ ($metDateType == "Publication" ? "selected":"") }}>Publication</option>
                            <option value="Released" {{ ($metDateType == "Released" ? "selected":"") }}>Released</option>
                            <option value="Revision" {{ ($metDateType == "Revision" ? "selected":"") }}>Revision</option>
                            <option value="Superseded" {{ ($metDateType == "Superseded" ? "selected":"") }}>Superseded</option>
                            <option value="Validity Begins" {{ ($metDateType == "Validity Begins" ? "selected":"") }}>Validity Begins</option>
                            <option value="Validy Expires" {{ ($metDateType == "Validy Expires" ? "selected":"") }}>Validy Expires</option>
                            <option value="Unavailable" {{ ($metDateType == "Unavailable" ? "selected":"") }}>Unavailable</option>
                        </select>
                        @error('c2_metadataDateType')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataStatus">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataStatus">
                            Status
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $metStatus = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->metadataStatus->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->metadataStatus->CharacterString != "") {
                            $metStatus = $metadataxml->identificationInfo->SV_ServiceIdentification->metadataStatus->CharacterString;
                        }
                        ?>
                        <select class="form-control form-control-sm" name="c2_metadataStatus" id="c2_metadataStatus">
                            <option value="Accepted" {{ ($metStatus == "Accepted" ? "selected":"") }}>Accepted</option>
                            <option value="Completed" {{ ($metStatus == "Completed" ? "selected":"") }}>Completed</option>
                            <option value="Deprecated" {{ ($metStatus == "Deprecated" ? "selected":"") }}>Deprecated</option>
                            <option value="Final" {{ ($metStatus == "Final" ? "selected":"") }}>Final</option>
                            <option value="Historical Archive" {{ ($metStatus == "Historical Archive" ? "selected":"") }}>Historical Archive</option>
                            <option value="Not Accepted" {{ ($metStatus == "Not Accepted" ? "selected":"") }}>Not Accepted</option>
                            <option value="Obsolete" {{ ($metStatus == "Obsolete" ? "selected":"") }}>Obsolete</option>
                            <option value="On Going" {{ ($metStatus == "On Going" ? "selected":"") }}>On Going</option>
                            <option value="Pending" {{ ($metStatus == "Pending" ? "selected":"") }}>Pending</option>
                            <option value="Planned" {{ ($metStatus == "Planned" ? "selected":"") }}>Planned</option>
                            <option value="Proposed" {{ ($metStatus == "Proposed" ? "selected":"") }}>Proposed</option>
                            <option value="Required" {{ ($metStatus == "Required" ? "selected":"") }}>Required</option>
                            <option value="Retired" {{ ($metStatus == "Retired" ? "selected":"") }}>Retired</option>
                            <option value="Superseded" {{ ($metStatus == "Superseded" ? "selected":"") }}>Superseded</option>
                            <option value="Tentative" {{ ($metStatus == "Tentative" ? "selected":"") }}>Tentative</option>
                            <option value="Withrawn" {{ ($metStatus == "Withrawn" ? "selected":"") }}>Withrawn</option>
                            <option value="Under Development" {{ ($metStatus == "Under Development" ? "selected":"") }}>Under Development</option>
                            <option value="Valid" {{ ($metStatus == "Valid" ? "selected":"") }}>Valid</option>
                        </select>
                        @error('c2_metadataStatus')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <h2 class="heading-small text-muted">Responsible Party</h2>
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Name<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $respAgencyOrg = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                            $respAgencyOrg = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                        }
                        ?>
                        <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3" value="{{ $respAgencyOrg }}" readonly>
                        @error('c2_contact_agensiorganisasi')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Agency/Organization
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $respAgencyOrg = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != "") {
                            $respAgencyOrg = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                        }
                        ?>
                        <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm" value="{{ $respAgencyOrg }}" readonly>
                        @error('c2_contact_agensiorganisasi')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Address
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $respAddress = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != "") {
                            $respAddress = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                        }
                        ?>
                        <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control form-control-sm ml-3 mb-2" value="{{ $respAddress }}" readonly>
                        <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control form-control-sm ml-3 mb-2" value="" readonly>
                        <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control form-control-sm ml-3 mb-2" value="" readonly>
                        <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control form-control-sm ml-3 mb-2" value="" readonly>
                        <div class="form-inline row ml-3">
                            <label class="form-control-label mr-4 divCity" for="c2_contact_city">City :</label>
                            <?php
                                $city = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != ""){
                                    $city = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
                                }
                            ?>
                            <input type="text" name="c2_contact_city" id="c2_contact_city" class="form-control form-control-sm ml-3 mb-2 divCity" value="{{ $city }}">
                            <label class="form-control-label mr-4" for="c2_contact_state">State :</label>
                            <select name="c2_contact_state" id="c2_contact_state" class="form-control form-control-sm">
                                <option disabled>Select State</option>
                                <?php
                                    $respState = "";
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != ""){
                                        $respState = strtolower(trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
                                    }
                                ?>
                                <?php
                                if (count($states) > 0) {
                                    foreach ($states as $st) {
                                        if (strtolower($st->name) == $respState) {
                                            ?><option value="<?php echo $st->name; ?>" selected><?php echo $st->name; ?></option><?php
                                                                                                                                                                                } else {
                                                                                                                                                                                    ?><option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option><?php
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                ?>
                            </select>
                            @error('c2_contact_state')
                            <div class="text-error">{{ $message }}</div>
                            @enderror
                            <label class="form-control-label mx-4" for="c2_contact_country">Country :</label>
                            <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm ml-4" readonly>
                                <option selected disabled>Select Country</option>
                                <?php
                                foreach ($countries as $country) {
                                    if ($country->id == $countrySelected->id) {
                                        ?><option value="<?php echo $country->id; ?>" selected><?php echo $country->name; ?></option><?php
                                                                                                                                                                                } else {
                                                                                                                                                                                    ?><option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option><?php
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                        ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Email
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $respEmail = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != "") {
                            $respEmail = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                        }
                        ?>
                        <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control form-control-sm ml-3" value="{{ $respEmail }}" readonly>
                        @error('c2_contact_email')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Fax No
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $fax = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != "") {
                            $fax = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                        }
                        ?>
                        <input type="text" name="c2_contact_fax" id="c2_contact_fax" value="{{ $fax }}" class="form-control form-control-sm ml-3">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Telephone (Office)
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $respPhone = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != "") {
                            $respPhone = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                        }
                        ?>
                        <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control form-control-sm ml-3" value="{{ $respPhone }}" readonly>
                        @error('c2_contact_phone_office')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Contact Website
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $respWebsite = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != "") {
                            $respWebsite = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
                        }
                        ?>
                        <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control form-control-sm ml-3" value="{{ $respWebsite }}">
                    </div>
                </div>
                <div class="row mb-4 divResponsiblePartyRole">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_contact_role">
                            Role
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $role = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->role->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->role->CharacterString != "") {
                            $role = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->role->CharacterString;
                        }
                        ?>
                        <select name="c2_contact_role" id="c2_contact_role" class="form-control form-control-sm ml-3">
                            <option value="Author" {{ ($role == "Author" ? "selected":"") }}>Author</option>
                            <option value="Co Author" {{ ($role == "Co Author" ? "selected":"") }}>Co Author</option>
                            <option value="Collaborator" {{ ($role == "Collaborator" ? "selected":"") }}>Collaborator</option>
                            <option value="Contributor" {{ ($role == "Contributor" ? "selected":"") }}>Contributor</option>
                            <option value="Custodian" {{ ($role == "Custodian" ? "selected":"") }}>Custodian</option>
                            <option value="Distributor" {{ ($role == "Distributor" ? "selected":"") }}>Distributor</option>
                            <option value="Editor" {{ ($role == "Editor" ? "selected":"") }}>Editor</option>
                            <option value="Funder" {{ ($role == "Funder" ? "selected":"") }}>Funder</option>
                            <option value="Mediator" {{ ($role == "Mediator" ? "selected":"") }}>Mediator</option>
                            <option value="Originator" {{ ($role == "Originator" ? "selected":"") }}>Originator</option>
                            <option value="Point Of Contact" {{ ($role == "Point Of Contact" ? "selected":"") }}>Point Of Contact</option>
                            <option value="Principal Investigator" {{ ($role == "Principal Investigator" ? "selected":"") }}>Principal Investigator</option>
                            <option value="Processor" {{ ($role == "Processor" ? "selected":"") }}>Processor</option>
                            <option value="Publisher" {{ ($role == "Publisher" ? "selected":"") }}>Publisher</option>
                            <option value="Resource Provider " {{ ($role == "Resource Provider" ? "selected":"") }}>Resource Provider</option>
                            <option value="Rights Holder" {{ ($role == "Rights Holder" ? "selected":"") }}>Rights Holder</option>
                            <option value="Sponsor" {{ ($role == "Sponsor" ? "selected":"") }}>Sponsor</option>
                            <option value="Stakeholder" {{ ($role == "Stakeholder" ? "selected":"") }}>Stakeholder</option>
                            <option value="Owner" {{ ($role == "Owner" ? "selected":"") }}>Owner</option>
                            <option value="User" {{ ($role == "User" ? "selected":"") }}>User</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //        $('#c2_product_type').val("{{old('c2_product_type')}}").trigger('change');
        //        $('#c2_contact_state').val("{{old('c2_contact_state')}}").trigger('change');
    });
</script>
