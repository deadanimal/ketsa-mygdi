<div class="card card-primary div_c2" id="div_c2">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse2">
            <h4 class="card-title">
                <?php echo __('lang.accord_2'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal2">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal2">Catatan</button>
        @endif
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-borderless" style="width:80%;">
                    <tbody>
                        <tr>
                            <td>Metadata Name<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $met_name = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                                    $met_name = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_metadataName" id="c2_metadataName" class="form-control" value="{{ $met_name }}">
                                @error('c2_metadataName')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Type Of Product<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $typeofProd = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->productType) && $metadataxml->identificationInfo->SV_ServiceIdentification->productType != ""){
                                    $typeofProd = trim($metadataxml->identificationInfo->SV_ServiceIdentification->productType);
                                }
                                ?>
                                <select name="c2_product_type" id="c2_product_type" class="form-control">
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
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Abstract<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $abstract = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract != ""){
                                    $abstract = $metadataxml->identificationInfo->SV_ServiceIdentification->abstract;
                                }
                                ?>
                                <textarea name="c2_abstract" id="c2_abstract" class="form-control">{{ $abstract }}</textarea>
                                @error('c2_abstract')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
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
                                $respName = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName != ""){
                                    echo $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName;
                                    $respName = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName;
                                }
                                ?>
                                <input type="hidden" name="c2_contact_name" id="c2_contact_name" value="{{ $respName }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Agency/Organization<span class="required">*</span> &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $respAgencyOrg = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != ""){
                                    $respAgencyOrg = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control" value="{{ $respAgencyOrg }}" readonly>
                                @error('c2_contact_agensiorganisasi')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Address &nbsp;</td>
                            <td style="vertical-align: top;">:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $respAddress = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != ""){
                                    $respAddress = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control" value="{{ $respAddress }}" readonly><br>
                                <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control" value="" readonly><br>
                                <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control" value="" readonly><br>
                                <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control" value="" readonly><br>
                                <div class="form-group row">
                                    State<span class="required">*</span>:
                                    <?php
                                    $respState = "";
                                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != ""){
                                        $respState = strtolower(trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
                                    }
                                    ?>
                                    <select name="c2_contact_state" id="c2_contact_state" class="form-control col-lg-4">
                                        <option disabled>Select State</option>
                                        <?php
                                        if (count($states) > 0) {
                                            foreach ($states as $st) {
                                                if(strtolower($st->name) == $respState){
                                                    ?><option value="<?php echo $st->name; ?>" selected><?php echo $st->name; ?></option><?php
                                                }else{
                                                    ?><option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option><?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select> 
                                &nbsp;&nbsp;&nbsp;
                                    Country: 
                                    <select name="c2_contact_country" id="c2_contact_country" class="form-control col-lg-4">
                                        <option selected disabled>Select Country</option>
                                        <?php
                                        foreach ($countries as $country) {
                                            if($country->id == $countrySelected->id){
                                                ?><option value="<?php echo $country->id; ?>" selected><?php echo $country->name; ?></option><?php
                                            }else{
                                                ?><option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option><?php                                    
                                            }
                                        }
                                        ?>                                      
                                    </select>
                                    @error('c2_contact_state')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email<span class="required">*</span>: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $respEmail = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != ""){
                                    $respEmail = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                                }
                                ?>
                                <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control" value="{{ $respEmail }}" readonly>
                                @error('c2_contact_email')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Fax: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $fax = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != ""){
                                    $fax = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control" value="{{ $fax }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone(Office)<span class="required">*</span>: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $respPhone = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != ""){
                                    $respPhone = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control" value="{{ $respPhone }}" readonly>
                                @error('c2_contact_phone_office')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Website: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $respWebsite = "";
                                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != ""){
                                    $respWebsite = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
                                }
                                ?>
                                <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control" value="{{ $respWebsite }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
//        $('#c2_product_type').val("{{old('c2_product_type')}}").trigger('change');
//        $('#c2_contact_state').val("{{old('c2_contact_state')}}").trigger('change');
    });
</script>