<div class="card card-primary mb-4 div_c1" id="div_c1">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse1">
                <?php echo __('lang.accord_1'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <div class="form-group row">
                <p class="pl-lg-3 form-control-label"><?php echo __('lang.content_information'); ?><span class="text-warning">*</span> : &nbsp;&nbsp;&nbsp;</p>
                <select name="c1_content_info" class="form-control form-control-sm" style="width:175px;" id="content_info_dropdown">
                    <option selected disabled>Select Content</option>
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
                
                <input type="text" name="c1_content_info" class="form-control form-control-sm" id="content_info_text" style="width:175px;display:none;" disabled>

                @error('c1_content_info')
                <div class="text-error ml-3">{{ $message }}</div>
                @enderror
            </div>

            <h2 class="heading-small text-muted"><?php echo __('lang.metadataPublisher'); ?></h2>
            <div class="my-1">
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="uname">
                            <?php echo __('lang.name'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <p class="ml-3 mb-0">{{ auth::user()->name }}</p>
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_name" value="{{ auth::user()->name }}" />
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_agensi_organisasi"><?php echo __('lang.organisation_name'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <p class="ml-3 mb-0">{{ (isset(auth::user()->agensiOrganisasi->name) ?  auth::user()->agensiOrganisasi->name: "") }}</p>
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_agensi_organisasi" value="{{ (isset(auth::user()->agensiOrganisasi->name) ?  auth::user()->agensiOrganisasi->name: "") }}" />
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_email">
                            <?php echo __('lang.email'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <p class="mb-0 ml-3">{{ auth::user()->email }}</p>
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_email" value="{{ auth::user()->email }}" />
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_phone">
                            <?php echo __('lang.telephone_office'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        <p class="ml-3 mb-0">{{ auth::user()->phone_pejabat }}</p>
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_phone" value="{{ auth::user()->phone_pejabat }}" />
                    </div>
                </div>
                <div class="row my-0 py-0 divPublisherRole">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_role">
                            <?php echo __('lang.role'); ?>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-7">
                        <select name='publisher_role' class='form-control form-control-sm ml-3'>
                            <option value="Author">Author</option>
                            <option value="Custodian">Custodian</option>
                            <option value="Distributor">Distributor</option>
                            <option value="Originator">Originator</option>
                            <option value="Owner">Owner</option>
                            <option value="Point of Contact">Point of Contact</option>
                            <option value="Principal Investigator">Principal Investigator</option>
                            <option value="Processor">Processor</option>
                            <option value="Publisher" selected>Publisher</option>
                            <option value="Resource Provider">Resource Provider</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#c1_content_info').val("{{old('c1_content_info')}}").trigger('change');
    });
</script>
