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
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion1'] as $key=>$val){
                    if($val['status'] == "active"){
                        if($key == "c1_content_info"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name="c1_content_info" class="form-control form-control-sm ml-3" id="content_info_dropdown">
                                        <option value="" selected>Pilih...</option>
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
                                    <a href="lampiran/content_information" class="text-yellow" target="_blank">
                                        <i class="fas fa-lightbulb mx-2"></i>
                                    </a>


                                    <p class="ml-3 mb-0 lblContentInfo">Live Data and Maps</p>
                                    <input type="hidden" name="c1_content_info" class="form-control form-control-sm" id="content_info_text" style="width:175px;display:none;" disabled>
                                </div>
                            </div>
                            <?php
                        }elseif($key == "publisher_name"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" type="text" name="publisher_name" value="{{ auth::user()->name }}" />
                                </div>
                            </div>
                            <?php
                        }elseif($key == "publisher_agensi_organisasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" type="text" name="publisher_agensi_organisasi" value="{{ (isset(auth::user()->agensiOrganisasi->name) ?  auth::user()->agensiOrganisasi->name: "") }}" />
                                <input type="hidden" name="publisher_bahagian" value="{{ auth::user()->bahagian }}" />
                                </div>
                            </div>
                            <?php
                        }elseif($key == "publisher_email"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" type="text" name="publisher_email" value="{{ auth::user()->email }}" />
                                </div>
                            </div>
                            <?php
                        }elseif($key == "publisher_phone"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" type="text" name="publisher_phone" value="{{ auth::user()->phone_pejabat }}" />
                                </div>
                            </div>
                            <?php
                        }elseif($key == "publisher_role"){
                            ?>
                            <div class="row mb-2 sortIt divPublisherRole">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name='publisher_role' class='form-control form-control-sm ml-3'>
                                        <option value="">Pilih...</option>
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
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
