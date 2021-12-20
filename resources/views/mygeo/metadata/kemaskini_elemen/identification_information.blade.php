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
                        <label class="form-control-label mr-4 lblMetadataNameBekap" for="c2_metadataName" data-toggle="tooltip" title="Nama metadata">
                            <?php echo __('lang.title'); ?><span style="color:red;">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input class="form-control form-control-sm ml-3" type="text" name="c2_metadataName" id="c2_metadataName" value=""/>
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
                            <option value="Application">Application</option>
                            <option value="Document">Document</option>
                            <option value="GIS Activity/Project">GIS Activity/Project</option>
                            <option value="Map">Map</option>
                            <option value="Raster Data">Raster Data</option>
                            <option value="Services">Services</option>
                            <option value="Software">Software</option>
                            <option value="Vector Data">Vector Data</option>
                        </select>
                    </div>
                </div>
                <h2 class="heading-small text-muted"><?php echo __('lang.abstract'); ?></h2>
                <?php //=== abstract= =============================================================
                ?>
                @include('mygeo.metadata.kemaskini_elemen.abstract')
                <br>
                
                <div class="row mb-2 divIdentificationInformationUrl">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c10_file_url" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">
                            <?php echo __('lang.URL'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputIdentificationInformationUrl urlToTest" value="">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-sm btn-success btnTestUrl" type="button" data-toggle="modal" data-target="#modal-showweb" data-backdrop="false">Test</button>
                    </div>
                </div>
                <div class="row mb-2 divMetadataDate">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_metadataDate" data-toggle="tooltip" title="Tarikh berkaitan  bagi maklumat geospatial.">
                            <?php echo __('lang.date'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input class="form-control form-control-sm ml-3" type="date" name="c2_metadataDate" id="c2_metadataDate" value="">
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
                            <option value="Accepted" class="optStatus_dataset">Accepted</option>
                            <option value="Completed" class="optStatus_dataset">Completed</option>
                            <option value="Deprecated" class="optStatus_dataset">Deprecated</option>
                            <option value="Final" class="optStatus_dataset">Final</option>
                            <option value="Historical Archive" class="optStatus_dataset">Historical Archive</option>
                            <option value="Not Accepted" class="optStatus_dataset">Not Accepted</option>
                            <option value="Obsolete" class="optStatus_dataset">Obsolete</option>
                            <option value="On Going" class="optStatus_dataset">On Going</option>
                            <option value="Pending" class="optStatus_dataset">Pending</option>
                            <option value="Planned" class="optStatus_dataset">Planned</option>
                            <option value="Proposed" class="optStatus_dataset">Proposed</option>
                            <option value="Required" class="optStatus_dataset">Required</option>
                            <option value="Retired" class="optStatus_dataset">Retired</option>
                            <option value="Superseded" class="optStatus_dataset">Superseded</option>
                            <option value="Tentative" class="optStatus_dataset">Tentative</option>
                            <option value="Withrawn" class="optStatus_dataset">Withrawn</option>
                            <option value="Under Development" class="optStatus_dataset">Under Development</option>
                            <option value="Valid" class="optStatus_dataset">Valid</option>
                            <option value="Completed" class="optStatus_services">Completed</option>
                            <option value="Historical Archive" class="optStatus_services">Historical Archive</option>
                            <option value="Obsolete" class="optStatus_services">Obsolete</option>
                            <option value="On Going" class="optStatus_services">On Going</option>
                            <option value="Planned" class="optStatus_services">Planned</option>
                            <option value="Required" class="optStatus_services">Required</option>
                            <option value="Withdrawn" class="optStatus_services">Withdrawn</option>
                            <option value="Under Development" class="optStatus_services">Under Development</option>
                        </select>
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
                            <option value="ArcIMS Service">ArcIMS Service</option>
                            <option value="ArcGIS Services">ArcGIS Services</option>
                            <option value="OGC Geography Markup Language">OGC Geography Markup Language</option>
                            <option value="OGC Catalouge Service">OGC Catalouge Service</option>
                            <option value="OGC Coordinate Transformation Service Archive">OGC Coordinate Transformation Service</option>
                            <option value="OGC Grid Coverage Service">OGC Grid Coverage Service</option>
                            <option value="OGC Location Service">OGC Location Service</option>
                            <option value="OGC KML 2.2">OGC KML 2.2</option>
                            <option value="OGC Simple Feature Access">OGC Simple Feature Access</option>
                            <option value="OGC Sensor Observation Service">OGC Sensor Observation Service</option>
                            <option value="OGC Web Coverage Service">OGC Web Coverage Service</option>
                            <option value="OGC Web Feature Service">OGC Web Feature Service</option>
                            <option value="OGC Web Map Service">OGC Web Map Service</option>
                            <option value="OGC Web Processing Service">OGC Web Processing Service</option>
                            <option value="Generic Service">Generic Service
                            </option>
                        </select>
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
                        <input type="text" class="form-control form-control-sm ml-3" name="c2_operationName" id="c2_operationName" value="">
                    </div>
                </div>
                <div class="row mb-2 divServiceUrl">
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c2_serviceUrl" data-toggle="tooltip" title="URL bagi service berkenaan. Klik ‘Test’ bagi percubaan URL berkenaan.">
                            <?php echo __('lang.service_URL'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control form-control-sm ml-3" name="c2_serviceUrl" id="c2_serviceUrl" value="">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-sm btn-success" id="btnTestServiceUrl" type="button" data-toggle="modal" data-target="#modal-showmap" data-backdrop="false">Test</button>
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
                            <option value="Loose">Loose</option>
                            <option value="Mixed">Mixed</option>
                            <option value="Tight">Tight</option>
                        </select>
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
                        <div class="ml-3"></div>
                        <input type="text" name="c2_contact_name" id="c2_contact_name" class="form-control form-control-sm ml-3" value="">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Nama organisasi yang bertanggungjawab terhadap maklumat geospatial">
                            <?php echo __('lang.organisation_name'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3" value="" >
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_contact_bahagian" data-toggle="tooltip" title="Nama bahagian yang bertanggungjawab terhadap maklumat geospatial">
                            <?php echo __('lang.bahagian_name'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c2_contact_bahagian" id="c2_contact_bahagian" class="form-control form-control-sm ml-3" value="" >
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">
                            <?php echo __('lang.position_name'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <input type="text" name="c2_position_name" id="c2_position_name" class="form-control form-control-sm ml-3 mb-2" value="">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName" data-toggle="tooltip" title="Alamat organisasi yang bertanggungjawab terhadap maklumat geospatial">
                            <?php echo __('lang.address'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control form-control-sm ml-3 mb-2" value="">
                        <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control form-control-sm ml-3 mb-2" value="">
                        <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control form-control-sm ml-3 mb-2" value="">
                        <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control form-control-sm ml-3 mb-2" value="">
                        <div class="row ml-3">
                            <div class="col-3 px-0">
                                <label class="form-control-label divPostalCode" for="c2_postal_code" data-toggle="tooltip" title="Poskod"><?php echo __('lang.postal_code'); ?>
                                    :</label>
                            </div>
                            <div class="col-3 px-0">
                                <input type="text" name="c2_postal_code" id="c2_postal_code" class="form-control form-control-sm mb-2 divPostalCode" value="">
                            </div>
                            <div class="col-3 px-0">
                                <label class="form-control-label ml-3 divCity" for="c2_contact_city" data-toggle="tooltip" title="Bandar">
                                    <?php echo __('lang.city'); ?> :</label>
                            </div>
                            <div class="col-3 px-0">
                                <input type="text" name="c2_contact_city" id="c2_contact_city" class="form-control form-control-sm mb-2 divCity" value="">
                            </div>
                        </div>
                        <div class="row ml-3">
                            <div class="col-3 px-0">
                                <label class="form-control-label" for="c2_contact_state" data-toggle="tooltip" title="Negeri / Wilayah Persekutuan">
                                    <?php echo __('lang.state'); ?><span
                                        class="text-warning">*</span> :</label>
                            </div>
                            <div class="col-3 px-0">
                                <select name="c2_contact_state" id="c2_contact_state"class="form-control form-control-sm">
                                    <option disabled>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-3 px-0">
                                <label class="form-control-label mx-3" for="c2_contact_country" data-toggle="tooltip" title="Negara">
                                    <?php echo __('lang.country'); ?> :</label>
                            </div>
                            <div class="col-3 px-0">
                                <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm">
                                    <option disabled>Pilih...</option>
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
                        <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control form-control-sm ml-3" value="">
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
                            class="form-control form-control-sm ml-3" value="">
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
                            value="" >
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
                            class="form-control form-control-sm ml-3" value="">
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
                            <option value="">Pilih...</option>
                            <option value="Author">Author</option>
                            <option value="Co Author">Co Author</option>
                            <option value="Collaborator">Collaborator</option>
                            <option value="Contributor">Contributor</option>
                            <option value="Custodian">Custodian</option>
                            <option value="Distributor">Distributor</option>
                            <option value="Editor">Editor</option>
                            <option value="Funder">Funder</option>
                            <option value="Mediator">Mediator</option>
                            <option value="Originator">Originator</option>
                            <option value="Point Of Contact">Point Of Contact</option>
                            <option value="Principal Investigator">Principal Investigator</option>
                            <option value="Processor">Processor</option>
                            <option value="Publisher">Publisher</option>
                            <option value="Resource Provider ">Resource Provider</option>
                            <option value="Rights Holder">Rights Holder</option>
                            <option value="Sponsor">Sponsor</option>
                            <option value="Stakeholder">Stakeholder</option>
                            <option value="Owner">Owner</option>
                            <option value="User">User
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
        
    });
</script>
