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
                        <label class="form-control-label mr-4 lblMetadataName" for="c2_metadataName" data-toggle="tooltip" title="Nama metadata">
                            <?php echo __('lang.title'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input class="form-control form-control-sm ml-3" type="text" name="c2_metadataName"
                            id="c2_metadataName" value="{{ old('c2_metadataName') }}" />
                        @error('c2_metadataName')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Pemilihan jenis abstrak">
                            <?php echo __('lang.type_of_product'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3">
                            <option value="" selected>Pilih...</option>
                            <option value="Application"
                                {{ old('c2_product_type') == 'Application' ? 'selected' : '' }}>Application</option>
                            <option value="Document" {{ old('c2_product_type') == 'Document' ? 'selected' : '' }}>
                                Document</option>
                            <option value="GIS Activity/Project"
                                {{ old('c2_product_type') == 'GIS Activity/Project' ? 'selected' : '' }}>GIS
                                Activity/Project</option>
                            <option value="Map" {{ old('c2_product_type') == 'Map' ? 'selected' : '' }}>Map</option>
                            <option value="Raster Data"
                                {{ old('c2_product_type') == 'Raster Data' ? 'selected' : '' }}>Raster Data</option>
                            <option value="Services" {{ old('c2_product_type') == 'Services' ? 'selected' : '' }}>
                                Services</option>
                            <option value="Software" {{ old('c2_product_type') == 'Software' ? 'selected' : '' }}>
                                Software</option>
                            <option value="Vector Data"
                                {{ old('c2_product_type') == 'Vector Data' ? 'selected' : '' }}>Vector Data</option>
                        </select>
                        @error('c2_product_type')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Penerangan ringkasan tentang maklumat geospatial berkenaan">
                            <?php echo __('lang.abstract'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3"
                            placeholder="Nama Aplikasi – Tujuan – Tahun Pembangunan – Kemaskini – Data Terlibat – Sasaran Pengguna – Versi – Perisian Yang Digunakan Dalam Pembangunan">{{ old('c2_abstract') }}</textarea>
                        @error('c2_abstract')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataDate">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataDate" data-toggle="tooltip" title="Tarikh berkaitan  bagi maklumat geospatial.">
                            <?php echo __('lang.date'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input class="form-control form-control-sm ml-3" type="date" name="c2_metadataDate"
                            id="c2_metadataDate" value="{{ old('c2_metadataDate') }}">
                        @error('c2_date')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataDateType">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataDateType" data-toggle="tooltip" title="Pengisian secara pilihan mengenai peringkat maklumat geospatial">
                            <?php echo __('lang.date_type'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select name="c2_metadataDateType" id="c2_metadataDateType"
                            class="form-control form-control-sm ml-3">
                            <option value="" selected>Pilih...</option>
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
                            <option value="Validity Expires">Validity Expires</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                        @error('c2_metadataDateType')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divMetadataStatus">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataStatus" data-toggle="tooltip" title="Status bagi maklumat geospatial merujuk dokumen MGMS (LAMPIRAN D)">
                            <?php echo __('lang.status'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control form-control-sm ml-3" name="c2_metadataStatus"
                            id="c2_metadataStatus">
                            <option value="" selected>Pilih...</option>
                            <option value="Accepted" {{ old('c2_metadataStatus') == 'Accepted' ? 'selected' : '' }}
                                class="optStatus_dataset">Accepted</option>
                            <option value="Completed" {{ old('c2_metadataStatus') == 'Completed' ? 'selected' : '' }}
                                class="optStatus_dataset">Completed</option>
                            <option value="Deprecated"
                                {{ old('c2_metadataStatus') == 'Deprecated' ? 'selected' : '' }}
                                class="optStatus_dataset">Deprecated</option>
                            <option value="Final" {{ old('c2_metadataStatus') == 'Final' ? 'selected' : '' }}
                                class="optStatus_dataset">Final</option>
                            <option value="Historical Archive"
                                {{ old('c2_metadataStatus') == 'Historical Archive' ? 'selected' : '' }}
                                class="optStatus_dataset">Historical Archive</option>
                            <option value="Not Accepted"
                                {{ old('c2_metadataStatus') == 'Not Accepted' ? 'selected' : '' }}
                                class="optStatus_dataset">Not Accepted</option>
                            <option value="Obsolete" {{ old('c2_metadataStatus') == 'Obsolete' ? 'selected' : '' }}
                                class="optStatus_dataset">Obsolete</option>
                            <option value="On Going" {{ old('c2_metadataStatus') == 'On Going' ? 'selected' : '' }}
                                class="optStatus_dataset">On Going</option>
                            <option value="Pending" {{ old('c2_metadataStatus') == 'Pending' ? 'selected' : '' }}
                                class="optStatus_dataset">Pending</option>
                            <option value="Planned" {{ old('c2_metadataStatus') == 'Planned' ? 'selected' : '' }}
                                class="optStatus_dataset">Planned</option>
                            <option value="Proposed" {{ old('c2_metadataStatus') == 'Proposed' ? 'selected' : '' }}
                                class="optStatus_dataset">Proposed</option>
                            <option value="Required" {{ old('c2_metadataStatus') == 'Required' ? 'selected' : '' }}
                                class="optStatus_dataset">Required</option>
                            <option value="Retired" {{ old('c2_metadataStatus') == 'Retired' ? 'selected' : '' }}
                                class="optStatus_dataset">Retired</option>
                            <option value="Superseded"
                                {{ old('c2_metadataStatus') == 'Superseded' ? 'selected' : '' }}
                                class="optStatus_dataset">Superseded</option>
                            <option value="Tentative" {{ old('c2_metadataStatus') == 'Tentative' ? 'selected' : '' }}
                                class="optStatus_dataset">Tentative</option>
                            <option value="Withrawn" {{ old('c2_metadataStatus') == 'Withrawn' ? 'selected' : '' }}
                                class="optStatus_dataset">Withrawn</option>
                            <option value="Under Development"
                                {{ old('c2_metadataStatus') == 'Under Development' ? 'selected' : '' }}
                                class="optStatus_dataset">Under Development</option>
                            <option value="Valid" {{ old('c2_metadataStatus') == 'Valid' ? 'selected' : '' }}
                                class="optStatus_dataset">Valid</option>

                            <option value="Completed" {{ old('c2_metadataStatus') == 'Completed' ? 'selected' : '' }}
                                class="optStatus_services">Completed</option>
                            <option value="Historical Archive"
                                {{ old('c2_metadataStatus') == 'Historical Archive' ? 'selected' : '' }}
                                class="optStatus_services">Historical Archive</option>
                            <option value="Obsolete" {{ old('c2_metadataStatus') == 'Obsolete' ? 'selected' : '' }}
                                class="optStatus_services">Obsolete</option>
                            <option value="On Going" {{ old('c2_metadataStatus') == 'On Going' ? 'selected' : '' }}
                                class="optStatus_services">On Going</option>
                            <option value="Planned" {{ old('c2_metadataStatus') == 'Planned' ? 'selected' : '' }}
                                class="optStatus_services">Planned</option>
                            <option value="Required" {{ old('c2_metadataStatus') == 'Required' ? 'selected' : '' }}
                                class="optStatus_services">Required</option>
                            <option value="Withdrawn" {{ old('c2_metadataStatus') == 'Withdrawn' ? 'selected' : '' }}
                                class="optStatus_services">Withdrawn</option>
                            <option value="Under Development"
                                {{ old('c2_metadataStatus') == 'Under Development' ? 'selected' : '' }}
                                class="optStatus_services">Under Development</option>
                        </select>
                        @error('c2_metadataStatus')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divTypeOfServices">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_typeOfServices" data-toggle="tooltip" title="Pengisian secara pilihan, jenis service bagi maklumat geospatial">
                            <?php echo __('lang.type_of_services'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control form-control-sm ml-3" name="c2_typeOfServices" id="c2_typeOfServices">
                            <option value="" selected>Pilih...</option>
                            <option value="ArcIMS Service"
                                {{ old('c2_typeOfServices') == 'ArcIMS Service' ? 'selected' : '' }}>ArcIMS Service
                            </option>
                            <option value="ArcGIS Services"
                                {{ old('c2_typeOfServices') == 'ArcGIS Services' ? 'selected' : '' }}>ArcGIS Services
                            </option>
                            <option value="OGC Geography Markup Language"
                                {{ old('c2_typeOfServices') == 'OGC Geography Markup Language' ? 'selected' : '' }}>
                                OGC Geography Markup Language</option>
                            <option value="OGC Catalouge Service"
                                {{ old('c2_typeOfServices') == 'OGC Catalouge Service' ? 'selected' : '' }}>OGC
                                Catalouge Service</option>
                            <option value="OGC Coordinate Transformation Service Archive"
                                {{ old('c2_typeOfServices') == 'OGC Coordinate Transformation Service' ? 'selected' : '' }}>
                                OGC Coordinate Transformation Service</option>
                            <option value="OGC Grid Coverage Service"
                                {{ old('c2_typeOfServices') == 'OGC Grid Coverage Service' ? 'selected' : '' }}>OGC
                                Grid Coverage Service</option>
                            <option value="OGC Location Service"
                                {{ old('c2_typeOfServices') == 'OGC Location Service' ? 'selected' : '' }}>OGC
                                Location Service</option>
                            <option value="OGC KML 2.2"
                                {{ old('c2_typeOfServices') == 'OGC KML 2.2' ? 'selected' : '' }}>OGC KML 2.2
                            </option>
                            <option value="OGC Simple Feature Access"
                                {{ old('c2_typeOfServices') == 'OGC Simple Feature Access' ? 'selected' : '' }}>OGC
                                Simple Feature Access</option>
                            <option value="OGC Sensor Observation Service"
                                {{ old('c2_typeOfServices') == 'OGC Sensor Observation Service' ? 'selected' : '' }}>
                                OGC Sensor Observation Service</option>
                            <option value="OGC Web Coverage Service"
                                {{ old('c2_typeOfServices') == 'OGC Web Coverage Service' ? 'selected' : '' }}>OGC
                                Web Coverage Service</option>
                            <option value="OGC Web Feature Service"
                                {{ old('c2_typeOfServices') == 'OGC Web Feature Service' ? 'selected' : '' }}>OGC Web
                                Feature Service</option>
                            <option value="OGC Web Map Service"
                                {{ old('c2_typeOfServices') == 'OGC Web Map Service' ? 'selected' : '' }}>OGC Web Map
                                Service</option>
                            <option value="OGC Web Processing Service"
                                {{ old('c2_typeOfServices') == 'OGC Web Processing Service' ? 'selected' : '' }}>OGC
                                Web Processing Service</option>
                            <option value="Generic Service"
                                {{ old('c2_typeOfServices') == 'Generic Service' ? 'selected' : '' }}>Generic Service
                            </option>
                        </select>
                        @error('c2_typeOfServices')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divOperationName">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_operationName" data-toggle="tooltip" title="Pengisian bagi Nama Operasi yang ditawarkan oleh webservis ini
                        Contoh: Export Map, Identify, Find dan GenerateKML">
                        <?php echo __('lang.operation_name'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control form-control-sm ml-3" name="c2_operationName"
                            id="c2_operationName">
                        @error('c2_operationName')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divServiceUrl">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_serviceUrl" data-toggle="tooltip" title="URL bagi service berkenaan. Klik ‘Test’ bagi percubaan URL berkenaan.">
                            <?php echo __('lang.service_URL'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control form-control-sm ml-3" name="c2_serviceUrl" id="c2_serviceUrl">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-sm btn-success" id="btnTestServiceUrl" type="button">Test</button>
                        @error('c2_serviceUrl')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 divTypeOfCouplingDataset">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_typeOfCouplingDataset" data-toggle="tooltip" title="Pilihan jenis gandingan bagi Dataset">
                            <?php echo __('lang.type_of_coupling_with_dataset'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control form-control-sm ml-3" name="c2_typeOfCouplingDataset"
                            id="c2_typeOfCouplingDataset">
                            <option value="">Pilih...</option>
                            <option value="Loose" {{ old('c2_typeOfCouplingDataset') == 'Loose' ? 'selected' : '' }}>
                                Loose</option>
                            <option value="Mixed" {{ old('c2_typeOfCouplingDataset') == 'Mixed' ? 'selected' : '' }}>
                                Mixed</option>
                            <option value="Tight" {{ old('c2_typeOfCouplingDataset') == 'Tight' ? 'selected' : '' }}>
                                Tight</option>
                        </select>
                        @error('c2_typeOfCouplingDataset')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <h2 class="heading-small text-muted"><?php echo __('lang.responsibleParty'); ?></h2>
            <div class="my-2">
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Nama individu yang mewakili organisasi bagi maklumat geospatial">
                            <?php echo __('lang.name'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <div class="ml-3">
                            <?php
                            if (isset($pengesahs->name)) {
                                echo $pengesahs->name;
                            }
                            ?>
                        </div>
                        <input type="hidden" name="c2_contact_name" id="c2_contact_name"
                            value="{{ isset($pengesahs->name) ? $pengesahs->name : '' }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Nama organisasi yang bertanggungjawab terhadap maklumat geospatial">
                            <?php echo __('lang.organisation_name'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3" value="{{ (isset($pengesahs->agensiOrganisasi->name) ? $pengesahs->agensiOrganisasi->name:"") }}" readonly>
                        @error('c2_contact_agensiorganisasi')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">
                            <?php echo __('lang.position_name'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c2_position_name" id="c2_position_name"
                            class="form-control form-control-sm ml-3 mb-2"
                            value="{{ null !== old('c2_position_name') ? old('c2_position_name') : 'Metadata Approver' }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Alamat organisasi yang bertanggungjawab terhadap maklumat geospatial">
                            <?php echo __('lang.address'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c2_contact_address1" id="c2_contact_address1"
                            class="form-control form-control-sm ml-3 mb-2"
                            value="{{ isset($pengesahs->alamat) ? $pengesahs->alamat : '' }}">
                        <input type="text" name="c2_contact_address2" id="c2_contact_address2"
                            class="form-control form-control-sm ml-3 mb-2" value="">
                        <input type="text" name="c2_contact_address3" id="c2_contact_address3"
                            class="form-control form-control-sm ml-3 mb-2" value="">
                        <input type="text" name="c2_contact_address4" id="c2_contact_address4"
                            class="form-control form-control-sm ml-3 mb-2" value="">
                        <div class="row ml-3">
                            <div class="col-3 px-0">
                                <label class="form-control-label divPostalCode" for="c2_contact_city" data-toggle="tooltip" title="Poskod"><?php echo __('lang.postal_code'); ?>
                                    :</label>
                            </div>
                            <div class="col-3 px-0">
                                <input type="text" name="c2_postal_code" id="c2_postal_code"
                                    class="form-control form-control-sm mb-2 divPostalCode"
                                    value="{{ old('c2_postal_code') }}">
                            </div>
                            <div class="col-3 px-0">
                                <label class="form-control-label ml-3 divCity" for="c2_contact_city" data-toggle="tooltip" title="Bandar">
                                    <?php echo __('lang.city'); ?> :</label>
                            </div>
                            <div class="col-3 px-0">
                                <input type="text" name="c2_contact_city" id="c2_contact_city"
                                    class="form-control form-control-sm mb-2 divCity"
                                    value="{{ old('c2_contact_city') }}">
                            </div>
                        </div>

                        <div class="row ml-3">
                            <div class="col-3 px-0">
                                <label class="form-control-label" for="c2_contact_state" data-toggle="tooltip" title="Negeri / Wilayah Persekutuan">
                                    <?php echo __('lang.state'); ?><span
                                        class="text-warning">*</span> :</label>
                            </div>
                            <div class="col-3 px-0">
                                <select name="c2_contact_state" id="c2_contact_state"
                                    class="form-control form-control-sm">
                                    <option selected disabled>Select State</option>
                                    <?php
                                    if (count($states) > 0) {
                                        foreach ($states as $st) {
                                            ?><option value="<?php echo $st->name; ?>"
                                        {{ $st->name == old('c2_contact_state') ? 'selected' : '' }}>
                                        <?php echo $st->name; ?>
                                    </option><?php
                                        }
                                    }
                                                                                                                                                            ?>
                                </select>
                                @error('c2_contact_state')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 px-0">
                                <label class="form-control-label mx-3" for="c2_contact_country" data-toggle="tooltip" title="Negara">
                                    <?php echo __('lang.country'); ?> :</label>
                            </div>
                            <div class="col-3 px-0">
                                <select name="c2_contact_country" id="c2_contact_country"
                                    class="form-control form-control-sm">
                                    <option selected disabled>Select Country</option>
                                    <?php
                                if (count($countries) > 0) {
                                    foreach ($countries as $country) {
                                        ?><option value="<?php echo $country->id; ?>"
                                        {{ $country->id == old('c2_contact_country') ? 'selected' : '' }}>
                                        <?php echo $country->name; ?></option><?php
                                    }
                                }                                                                                                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Alamat emel rasmi">
                            <?php echo __('lang.email'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="email" name="c2_contact_email" id="c2_contact_email"
                            class="form-control form-control-sm ml-3"
                            value="{{ isset($pengesahs->email) ? $pengesahs->email : '' }}" readonly>
                        @error('c2_contact_email')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Nombor faksimili organisasi">
                            <?php echo __('lang.fax_no'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c2_contact_fax" id="c2_contact_fax"
                            class="form-control form-control-sm ml-3" value="{{ old('c2_contact_fax') }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Nombor telefon organisasi">
                            <?php echo __('lang.telephone_office'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office"
                            class="form-control form-control-sm ml-3"
                            value="{{ isset($pengesahs->phone_pejabat) ? $pengesahs->phone_pejabat : '' }}" readonly>
                        @error('c2_contact_phone_office')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Alamat laman web organisasi">
                            <?php echo __('lang.contact_website'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c2_contact_website" id="c2_contact_website"
                            class="form-control form-control-sm ml-3" value="{{ old('c2_contact_website') }}">
                    </div>
                </div>
                <div class="row mb-2 divResponsiblePartyRole">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_contact_role" data-toggle="tooltip" title="Peranan yang dijalankan oleh organisasi berkenaan Metadata ">
                            <?php echo __('lang.role'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <select name="c2_contact_role" id="c2_contact_role" class="form-control form-control-sm ml-3">
                            <option value="Author" {{ old('c2_contact_role') == 'Author' ? 'selected' : '' }}>Author
                            </option>
                            <option value="Co Author" {{ old('c2_contact_role') == 'Co Author' ? 'selected' : '' }}>
                                Co Author</option>
                            <option value="Collaborator"
                                {{ old('c2_contact_role') == 'Collaborator' ? 'selected' : '' }}>Collaborator
                            </option>
                            <option value="Contributor"
                                {{ old('c2_contact_role') == 'Contributor' ? 'selected' : '' }}>Contributor</option>
                            <option value="Custodian" {{ old('c2_contact_role') == 'Custodian' ? 'selected' : '' }}>
                                Custodian</option>
                            <option value="Distributor"
                                {{ old('c2_contact_role') == 'Distributor' ? 'selected' : '' }}>Distributor</option>
                            <option value="Editor" {{ old('c2_contact_role') == 'Editor' ? 'selected' : '' }}>Editor
                            </option>
                            <option value="Funder" {{ old('c2_contact_role') == 'Funder' ? 'selected' : '' }}>Funder
                            </option>
                            <option value="Mediator" {{ old('c2_contact_role') == 'Mediator' ? 'selected' : '' }}>
                                Mediator</option>
                            <option value="Originator"
                                {{ old('c2_contact_role') == 'Originator' ? 'selected' : '' }}>Originator</option>
                            <option value="Point Of Contact"
                                {{ old('c2_contact_role') == 'Point Of Contact' ? 'selected' : '' }}>Point Of Contact
                            </option>
                            <option value="Principal Investigator"
                                {{ old('c2_contact_role') == 'Principal Investigator' ? 'selected' : '' }}>Principal
                                Investigator</option>
                            <option value="Processor" {{ old('c2_contact_role') == 'Processor' ? 'selected' : '' }}>
                                Processor</option>
                            <option value="Publisher" {{ old('c2_contact_role') == 'Publisher' ? 'selected' : '' }}>
                                Publisher</option>
                            <option value="Resource Provider "
                                {{ old('c2_contact_role') == 'Resource Provider' ? 'selected' : '' }}>Resource
                                Provider</option>
                            <option value="Rights Holder"
                                {{ old('c2_contact_role') == 'Rights Holder' ? 'selected' : '' }}>Rights Holder
                            </option>
                            <option value="Sponsor" {{ old('c2_contact_role') == 'Sponsor' ? 'selected' : '' }}>
                                Sponsor</option>
                            <option value="Stakeholder"
                                {{ old('c2_contact_role') == 'Stakeholder' ? 'selected' : '' }}>Stakeholder</option>
                            <option value="Owner" {{ old('c2_contact_role') == 'Owner' ? 'selected' : '' }}>Owner
                            </option>
                            <option value="User" {{ old('c2_contact_role') == 'User' ? 'selected' : '' }}>User
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#c2_product_type').val("{{ old('c2_product_type') }}").trigger('change');
        $('#c2_contact_state').val("{{ old('c2_contact_state') }}").trigger('change');
        $('#c2_contact_country').val("{{ old('c2_contact_country') }}").trigger('change');
    });
</script>
