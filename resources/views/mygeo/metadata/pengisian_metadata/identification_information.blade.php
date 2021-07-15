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
                            <td>Metadata Name<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <?php
                                $metadata_name = (isset($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString : "");
                                ?>
                                <input type="text" name="c2_metadataName" id="c2_metadataName" class="form-control" value="{{ old('c2_metadataName') }}">
                                @error('c2_metadataName')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Type Of Product<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <select name="c2_product_type" id="c2_product_type" class="form-control">
                                    <option selected disabled>Type of Product</option>
                                    <option value="Application">Application</option>
                                    <option value="Document">Document</option>
                                    <option value="GIS Activity/Project">GIS Activity/Project</option>
                                    <option value="Map">Map</option>
                                    <option value="Raster Data">Raster Data</option>
                                    <option value="Services">Services</option>
                                    <option value="Software">Software</option>
                                    <option value="Vector Data">Vector Data</option>
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
                                $abstract = (isset($metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString : "");
                                ?>
                                <textarea name="c2_abstract" id="c2_abstract" class="form-control">{{ old('c2_abstract') }}</textarea>
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
                                if (isset($pengesahs->agensi_organisasi)) {
                                    echo $pengesahs->agensi_organisasi;
                                }
                                ?><input type="hidden" name="c2_contact_name" id="c2_contact_name" value="{{ (isset($pengesahs->agensi_organisasi) ? $pengesahs->agensi_organisasi:"") }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Agency/Organization<span class="required">*</span> &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control" value="{{ (isset($pengesahs->agensi_organisasi) ? $pengesahs->agensi_organisasi:"") }}" readonly>
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
                                <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control" value="{{ (isset($pengesahs->alamat) ? $pengesahs->alamat:"") }}" readonly><br>
                                <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control" value="" readonly><br>
                                <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control" value="" readonly><br>
                                <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control" value="" readonly><br>
                                <div class="form-group row">
                                    State<span class="required">*</span>:
                                    <select name="c2_contact_state" id="c2_contact_state" class="form-control col-lg-4">
                                        <option selected disabled>Select State</option>
                                        <?php
                                        if (count($states) > 0) {
                                            foreach ($states as $st) {
                                                ?><option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option><?php
                                            }
                                        }
                                        ?>
                                    </select> 
                                &nbsp;&nbsp;&nbsp;
                                    Country: <select name="c2_contact_country" id="c2_contact_country" class="form-control col-lg-4">
                                        <option selected disabled>Select Country</option>
                                        <?php
                                        if (count($countries) > 0) {
                                            foreach ($countries as $country) {
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
                                <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control" value="{{ (isset($pengesahs->email) ? $pengesahs->email:"") }}" readonly>
                                @error('c2_contact_email')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Fax: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control" value="{{ old('c2_contact_fax') }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone(Office)<span class="required">*</span>: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control" value="{{ (isset($pengesahs->phone_pejabat) ? $pengesahs->phone_pejabat:"") }}" readonly>
                                @error('c2_contact_phone_office')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Website: &nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control" value="{{ old('c2_contact_website') }}">
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
        $('#c2_product_type').val("{{old('c2_product_type')}}").trigger('change');
        $('#c2_contact_state').val("{{old('c2_contact_state')}}").trigger('change');
        $('#c2_contact_country').val("{{old('c2_contact_country')}}").trigger('change');
    });
</script>