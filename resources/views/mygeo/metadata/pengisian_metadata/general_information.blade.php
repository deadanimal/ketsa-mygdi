<div class="card card-primary div_c1" id="div_c1">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse1">
            <h4 class="card-title">
                <?php echo __('lang.accord_1'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
        <div class="card-body">
            <div class="form-group row">
                <p>Content Information<span class="required">*</span> : &nbsp;&nbsp;&nbsp;</p>
                <select name="c1_content_info" id="c1_content_info" class="form-control" style="width:175px;">
                    <option selected disabled>Select Content</option>
                    <option value="Application">Application</option>
                    <option value="Clearing House">Clearing House</option>
                    <option value="Downloadable Data">Downloadable Data</option>
                    <option value="Geographic Activities">Geographic Activities</option>
                    <option value="Geographic Services">Geographic Services</option>
                    <option value="Map File">Map File</option>
                    <option value="Offline Data">Offline Data</option>
                    <option value="Static Map Images">Static Map Images</option>
                    <option value="Other Documents">Other Documents</option>
                </select>
                @error('c1_content_info')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>

            <br><b>Metadata Publisher</b><br>

            <div class="table-responsive">
                <table class="table-borderless">
                    <tbody>
                        <tr>
                            <td>Name<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                {{ auth::user()->name }}
                                <input type="hidden" name="publisher_name" value="{{ auth::user()->name }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Agency/Organization<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                {{ (isset(auth::user()->agensi_organisasi) ?  auth::user()->agensi_organisasi: "") }}
                                <input type="hidden" name="publisher_agensi_organisasi" value="{{ (isset(auth::user()->agensi_organisasi) ?  auth::user()->agensi_organisasi: "") }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Email<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                {{ auth::user()->email }}
                                <input type="hidden" name="publisher_email" value="{{ auth::user()->email }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone<span class="required">*</span>&nbsp;</td>
                            <td>:&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                {{ auth::user()->phone_pejabat }}
                                <input type="hidden" name="publisher_phone" value="{{ auth::user()->phone_pejabat }}">
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
        $('#c1_content_info').val("{{old('c1_content_info')}}").trigger('change');
    });
</script>