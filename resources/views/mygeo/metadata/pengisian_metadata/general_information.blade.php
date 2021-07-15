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
                <p class="pl-lg-3 form-control-label">Content Information<span class="text-warning">*</span> : &nbsp;&nbsp;&nbsp;</p>
                <select name="c1_content_info" class="form-control form-control-sm" style="width:175px;">
                    <option selected disabled>Select Content</option>
                    <option value="application">Application</option>
                    <option value="clearHouse">Clearing House</option>
                    <option value="downloadableData">Downloadable Data</option>
                    <option value="geoActivities">Geographic Activities</option>
                    <option value="geoServices">Geographic Services</option>
                    <option value="mapFiles">Map File</option>
                    <option value="offlineData">Offline Data</option>
                    <option value="staticMapImg">Static Map Images</option>
                    <option value="otherDocs">Other Documents</option>
                </select>

                @error('c1_content_info')
                <div class="text-error ml-3">{{ $message }}</div>
                @enderror
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
                        {{ auth::user()->name }}
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_name" value="{{ auth::user()->name }}" />
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_agensi_organisasi">
                            Agency/Organization
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ (isset(auth::user()->agensi_organisasi) ?  auth::user()->agensi_organisasi: "") }}
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_agensi_organisasi" value="{{ (isset(auth::user()->agensi_organisasi) ?  auth::user()->agensi_organisasi: "") }}" />
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_email">
                            Email
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ auth::user()->email }}
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_email" value="{{ auth::user()->email }}" />
                    </div>
                </div>
                <div class="row my-0 py-0">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="publisher_phone">
                            Telephone
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-8">
                        {{ auth::user()->phone_pejabat }}
                        <input class="form-control form-control-sm ml-3" type="hidden" name="publisher_phone" value="{{ auth::user()->phone_pejabat }}" />
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
