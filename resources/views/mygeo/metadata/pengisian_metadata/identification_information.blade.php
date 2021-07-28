<div class="card card-primary mb-4 div_c2" id="div_c2">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse2">
                <?php echo __('lang.accord_2'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4 lblMetadataName" for="c2_metadataName">
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $metadata_name = (isset($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString : "");
                        ?>
                        <input class="form-control form-control-sm ml-3" type="text" name="c2_metadataName" id="c2_metadataName" value="{{ $metadata_name }}" />
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
                        <select name="c2_product_type" class="form-control form-control-sm ml-3">
                            <option selected disabled>Type of Product</option>
                            <option value="application">Application</option>
                            <option value="document">Document</option>
                            <option value="gisActivityProject">GIS Activity/Project</option>
                            <option value="theMap">Map</option>
                            <option value="rasterData">Raster Data</option>
                            <option value="services">Services</option>
                            <option value="software">Software</option>
                            <option value="vectorData">Vector Data</option>
                        </select>
                        @error('c2_product_type')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Abstract<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <?php
                        $abstract = (isset($metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString : "");
                        ?>
                        <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3">{{ $abstract }}</textarea>
                        @error('c2_abstract')
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
                        <div class="ml-3">
                            <?php
                            if (isset($pengesahs->agensi_organisasi)) {
                                echo $pengesahs->agensi_organisasi;
                            }
                            ?>
                        </div>
                        <input type="hidden" name="c2_contact_name" id="c2_contact_name" value="{{ (isset($pengesahs->agensi_organisasi) ? $pengesahs->agensi_organisasi:"") }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Agency/Organization<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3" value="{{ (isset($pengesahs->agensi_organisasi) ? $pengesahs->agensi_organisasi:"") }}" readonly>
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
                        <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control form-control-sm ml-3 mb-2" value="{{ (isset($pengesahs->alamat) ? $pengesahs->alamat:"") }}" readonly>
                        <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control form-control-sm ml-3 mb-2" value="" readonly>
                        <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control form-control-sm ml-3 mb-2" value="" readonly>
                        <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control form-control-sm ml-3 mb-2" value="" readonly>
                        <div class="form-inline row ml-3">
                            <label class="form-control-label mr-4" for="c2_contact_state">State :</label>
                            <select name="c2_contact_state" id="c2_contact_state" class="form-control form-control-sm">
                                <option selected disabled>Select State</option>
                                <?php
                                if (count($states) > 0) {
                                    foreach ($states as $st) {
                                        ?><option value="<?php echo $st->id; ?>"><?php echo $st->name; ?></option><?php
                                    }
                                }
                                                                                                                                                        ?>
                            </select>
                            <label class="form-control-label mx-3" for="c2_contact_country">Country :</label>
                            <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm ml-4">
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
                            <div class="text-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Email<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control form-control-sm ml-3" value="{{ (isset($pengesahs->email) ? $pengesahs->email:"") }}" readonly>
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
                        <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control form-control-sm ml-3">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName">
                            Telephone (Office)<span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control form-control-sm ml-3" value="{{ (isset($pengesahs->phone_pejabat) ? $pengesahs->phone_pejabat:"") }}" readonly>
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
                        <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control form-control-sm ml-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#c2_product_type').val("{{old('c2_product_type')}}").trigger('change');
        $('#c2_contact_state').val("{{old('c2_contact_state')}}").trigger('change');
        $('#c2_contact_country').val("{{old('c2_contact_country')}}").trigger('change');
    });
</script>
