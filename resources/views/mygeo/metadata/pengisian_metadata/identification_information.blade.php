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
                        <input class="form-control form-control-sm ml-3" type="text" name="c2_metadataName" id="c2_metadataName" value="{{ old('c2_metadataName') }}" />
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
                        <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3">
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
                        <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3" placeholder="Nama Aplikasi – Tujuan – Tahun Pembangunan – Kemaskini – Data Terlibat – Sasaran Pengguna – Versi – Perisian Yang Digunakan Dalam Pembangunan">{{old('c2_abstract')}}</textarea>
                        @error('c2_abstract')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataDate">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataDate">
                            Date
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input class="form-control form-control-sm" type="date" name="c2_metadataDate" id="c2_metadataDate" value="{{old('c2_metadataDate')}}">
                        @error('c2_date')
                        <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataDateType">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataDateType">
                            Date Type
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select name="c2_metadataDateType" id="c2_metadataDateType" class="form-control form-control-sm">
                            <option value="Adopted">Adopted</option>
                            <option value="Creation">Creation</option>
                            <option value="Deprecated">Deprecated</option>
                            <option value="Distribution">Distribution</option>
                            <option value="Expiry">Expiry</option>
                            <option value="In Force">In Force</option>
                            <option value="Last Revison">Last Revison</option>
                            <option value="Last Update">Last Update</option>
                            <option value="Next Update">Next Update</option>
                            <option value="Publication">Publication</option>
                            <option value="Released">Released</option>
                            <option value="Revision">Revision</option>
                            <option value="Superseded">Superseded</option>
                            <option value="Validity Begins">Validity Begins</option>
                            <option value="Validy Expires">Validy Expires</option>
                            <option value="Unavailable">Unavailable</option>
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
                        <select class="form-control form-control-sm" name="c2_metadataStatus" id="c2_metadataStatus">
                            <option value="Accepted" {{ (old('c2_metadataStatus') == "Accepted" ? "selected":"") }}>Accepted</option>
                            <option value="Completed" {{ (old('c2_metadataStatus') == "Completed" ? "selected":"") }}>Completed</option>
                            <option value="Deprecated" {{ (old('c2_metadataStatus') == "Deprecated" ? "selected":"") }}>Deprecated</option>
                            <option value="Final" {{ (old('c2_metadataStatus') == "Final" ? "selected":"") }}>Final</option>
                            <option value="Historical Archive" {{ (old('c2_metadataStatus') == "Historical Archive" ? "selected":"") }}>Historical Archive</option>
                            <option value="Not Accepted" {{ (old('c2_metadataStatus') == "Not Accepted" ? "selected":"") }}>Not Accepted</option>
                            <option value="Obsolete" {{ (old('c2_metadataStatus') == "Obsolete" ? "selected":"") }}>Obsolete</option>
                            <option value="On Going" {{ (old('c2_metadataStatus') == "On Going" ? "selected":"") }}>On Going</option>
                            <option value="Pending" {{ (old('c2_metadataStatus') == "Pending" ? "selected":"") }}>Pending</option>
                            <option value="Planned" {{ (old('c2_metadataStatus') == "Planned" ? "selected":"") }}>Planned</option>
                            <option value="Proposed" {{ (old('c2_metadataStatus') == "Proposed" ? "selected":"") }}>Proposed</option>
                            <option value="Required" {{ (old('c2_metadataStatus') == "Required" ? "selected":"") }}>Required</option>
                            <option value="Retired" {{ (old('c2_metadataStatus') == "Retired" ? "selected":"") }}>Retired</option>
                            <option value="Superseded" {{ (old('c2_metadataStatus') == "Superseded" ? "selected":"") }}>Superseded</option>
                            <option value="Tentative" {{ (old('c2_metadataStatus') == "Tentative" ? "selected":"") }}>Tentative</option>
                            <option value="Withrawn" {{ (old('c2_metadataStatus') == "Withrawn" ? "selected":"") }}>Withrawn</option>
                            <option value="Under Development" {{ (old('c2_metadataStatus') == "Under Development" ? "selected":"") }}>Under Development</option>
                            <option value="Valid" {{ (old('c2_metadataStatus') == "Valid" ? "selected":"") }}>Valid</option>
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
                            <label class="form-control-label mr-4 divCity" for="c2_contact_city">City :</label>
                            <input type="text" name="c2_contact_city" id="c2_contact_city" class="form-control form-control-sm ml-3 mb-2 divCity" value="{{ old('c2_contact_city') }}">
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
                                }                                                                                                                ?>
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
                <div class="row mb-4 divResponsiblePartyRole">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_contact_role">
                            Role
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <select name="c2_contact_role" id="c2_contact_role" class="form-control form-control-sm ml-3">
                            <option value="Author" {{ (old('c2_contact_role') == "Author" ? "selected":"") }}>Author</option>
                            <option value="Co Author" {{ (old('c2_contact_role') == "Co Author" ? "selected":"") }}>Co Author</option>
                            <option value="Collaborator" {{ (old('c2_contact_role') == "Collaborator" ? "selected":"") }}>Collaborator</option>
                            <option value="Contributor" {{ (old('c2_contact_role') == "Contributor" ? "selected":"") }}>Contributor</option>
                            <option value="Custodian" {{ (old('c2_contact_role') == "Custodian" ? "selected":"") }}>Custodian</option>
                            <option value="Distributor" {{ (old('c2_contact_role') == "Distributor" ? "selected":"") }}>Distributor</option>
                            <option value="Editor" {{ (old('c2_contact_role') == "Editor" ? "selected":"") }}>Editor</option>
                            <option value="Funder" {{ (old('c2_contact_role') == "Funder" ? "selected":"") }}>Funder</option>
                            <option value="Mediator" {{ (old('c2_contact_role') == "Mediator" ? "selected":"") }}>Mediator</option>
                            <option value="Originator" {{ (old('c2_contact_role') == "Originator" ? "selected":"") }}>Originator</option>
                            <option value="Point Of Contact" {{ (old('c2_contact_role') == "Point Of Contact" ? "selected":"") }}>Point Of Contact</option>
                            <option value="Principal Investigator" {{ (old('c2_contact_role') == "Principal Investigator" ? "selected":"") }}>Principal Investigator</option>
                            <option value="Processor" {{ (old('c2_contact_role') == "Processor" ? "selected":"") }}>Processor</option>
                            <option value="Publisher" {{ (old('c2_contact_role') == "Publisher" ? "selected":"") }}>Publisher</option>
                            <option value="Resource Provider " {{ (old('c2_contact_role') == "Resource Provider" ? "selected":"") }}>Resource Provider</option>
                            <option value="Rights Holder" {{ (old('c2_contact_role') == "Rights Holder" ? "selected":"") }}>Rights Holder</option>
                            <option value="Sponsor" {{ (old('c2_contact_role') == "Sponsor" ? "selected":"") }}>Sponsor</option>
                            <option value="Stakeholder" {{ (old('c2_contact_role') == "Stakeholder" ? "selected":"") }}>Stakeholder</option>
                            <option value="Owner" {{ (old('c2_contact_role') == "Owner" ? "selected":"") }}>Owner</option>
                            <option value="User" {{ (old('c2_contact_role') == "User" ? "selected":"") }}>User</option>
                        </select>
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
