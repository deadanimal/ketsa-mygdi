@extends('layouts.app_mygeo_afiq')

@section('content')

  <style>
    .card-primary:not(.card-outline)>.card-header{
      background-color:#b3ecff;
      color:black;
    }
    .card-primary:not(.card-outline)>.card-header a{
      color:black;
    }

    .p-2{
      width:150px;
    }
    .p-8{
      width:285px;
      padding-bottom:3px;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </section>
      
    <!--===== MODALS =====-->
    <div class="modal fade" id="modal-muat-naik-xml">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('muat_naik_xml') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="file_xml">
                                                Muat Naik Fail XML
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control ml-3" id="file_xml" type="file" name="file_xml"/>
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between1">
                        <button type="submit" class="btn btn-primary" id="btn_muat_naik_xml">Muat Naik</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="card-body">
                <h1 class="float-left">Pengisian Metadata</h1>
                <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#modal-muat-naik-xml">
                     <?php echo __('lang.btn_upload_xml'); ?>
                </button>
            </div>
          <div class="col-12">
            <div class="card">
              <form method="post" class="form-horizontal" action="{{url('store_metadata')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <!-- <div class="form-group row"> -->
                    <div class="clearfix">
                        <p id="lbl_kategori"><?php echo __('lang.metadata_category'); ?> : &nbsp;&nbsp;&nbsp;</p>
                      <select name="kategori" id="kategori" class="form-control float-left" style="width:175px;">
                        <option selected disabled><?php echo __('lang.dropdown_choose'); ?></option>
                        <?php
                        if(count($categories) > 0){
                          foreach($categories as $cat){
                            ?><option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option><?php
                          }
                        }
                        ?>
                      </select>
                      &nbsp;&nbsp;&nbsp;  
                      <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <img src="{{ url('/img/flagMalaysia.jpeg') }}" alt="User Avatar" >
                            <input type="radio" name="flanguage" value="bm" {{ (isset($_GET['bhs']) && $_GET['bhs'] == 'bm' ? 'checked':'') }}>BM
                        </label>
                        <label class="btn btn-secondary">
                            <img src="{{ url('/img/flagUnitedKingdom.jpeg') }}" alt="User Avatar" >
                          <input type="radio" name="flanguage" value="en" {{ (isset($_GET['bhs']) && $_GET['bhs'] == 'en' ? 'checked':'') }}>ENG
                        </label>
                      </div>
                    </div>
                    <br>
                  <!-- </div> -->
                  <div id="accordion">
                    <?php //=== collapse1 =============================================================?>
                  <div class="card card-primary div_c1" id="div_c1">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse1">
                          <?php echo __('lang.accord_1'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in show" data-parent="#div_c1">
                      <div class="card-body">
                        <div class="form-group row">
                          <p>Content Information : &nbsp;&nbsp;&nbsp;</p>
                          <select name="c1_content_info" class="form-control" style="width:175px;">
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
                        </div>

                          <br><b>Metadata Publisher</b><br>

                        <div class="table-responsive">
                          <table class="table-borderless">
                            <tbody>
                              <tr>
                                <td>Name&nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    {{ auth::user()->name }}
                                    <input type="hidden" name="publisher_name" value="{{ auth::user()->name }}">
                                </td>
                              </tr>
                              <tr>
                                <td>Agency/Organization&nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    {{ (isset(auth::user()->agensi_organisasi) ?  auth::user()->agensi_organisasi: "") }}
                                    <input type="hidden" name="publisher_agensi_organisasi" value="{{ (isset(auth::user()->agensi_organisasi) ?  auth::user()->agensi_organisasi: "") }}">
                                </td>
                              </tr>
                              <tr>
                                <td>Email&nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    {{ auth::user()->email }}
                                    <input type="hidden" name="publisher_email" value="{{ auth::user()->email }}">
                                </td>
                              </tr>
                              <tr>
                                <td>Telephone&nbsp;</td>
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
                  <?php //=== collapse2 =============================================================?>
                  <div class="card card-primary div_c2" id="div_c2">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse2">
                          <?php echo __('lang.accord_2'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table-borderless" style="width:80%;">
                            <tbody>
                              <tr>
                                <td>Metadata Name&nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <?php 
                                  $metadata_name = (isset($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString:"");
                                  ?>
                                  <input type="text" name="c2_metadataName" id="c2_metadataName" class="form-control" value="{{ $metadata_name }}">
                                </td>
                              </tr>
                              <tr>
                                <td>Type Of Product&nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <select name="c2_product_type" class="form-control">
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
                                </td>
                              </tr>
                              <tr>
                                <td>Abstract&nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <?php 
                                  $abstract = (isset($metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString) ? $metadata->identificationInfo->MD_DataIdentification->abstract->CharacterString:"");
                                  ?>
                                  <textarea name="c2_abstract" id="c2_abstract" class="form-control">{{ $abstract }}</textarea>
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
                                    if(isset($pengesahs->agensi_organisasi)){
                                      echo $pengesahs->agensi_organisasi;
                                    }
                                    ?><input type="hidden" name="c2_contact_name" id="c2_contact_name" value="{{ (isset($pengesahs->agensi_organisasi) ? $pengesahs->agensi_organisasi:"") }}">
                                </td>
                              </tr>
                              <tr>
                                <td>Agency/Organization &nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control" value="{{ (isset($pengesahs->agensi_organisasi) ? $pengesahs->agensi_organisasi:"") }}" readonly>
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
                                    State:
                                    <select name="c2_contact_state" id="c2_contact_state" class="form-control col-lg-4" readonly>
                                      <option selected disabled>Select State</option>
                                      <?php
                                      if(count($states) > 0){
                                        foreach($states as $st){
                                           ?><option value="<?php echo $st->id; ?>"><?php echo $st->name; ?></option><?php
                                        }
                                      }
                                      ?>
                                    </select> &nbsp;&nbsp;&nbsp;
                                    Country: <select name="c2_contact_country" id="c2_contact_country" class="form-control col-lg-4" readonly>
                                      <option selected disabled>Select Country</option>
                                      <?php
                                      if(count($countries) > 0){
                                        foreach($countries as $country){
                                           ?><option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option><?php                                      
                                        }
                                      }
                                      ?>                                      
                                    </select>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Email: &nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control" value="{{ (isset($pengesahs->email) ? $pengesahs->email:"") }}" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>Fax: &nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td>Telephone(Office): &nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control" value="{{ (isset($pengesahs->phone_pejabat) ? $pengesahs->phone_pejabat:"") }}" readonly>
                                </td>
                              </tr>
                              <tr>
                                <td>Website: &nbsp;</td>
                                <td>:&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                  <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse3 =============================================================?>
                  <div class="card card-primary div_c3" id="div_c3">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse3">
                          <?php echo __('lang.accord_3'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in show" data-parent="#div_c3">
                      <div class="card-body">
                       <div class="d-flex flex-wrap bd-highlight">
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_1" name="topic_category[]" value="biota">
                              <label class="form-check-label" for="c3_1">Biota</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_2" name="topic_category[]" value="boundaries">
                              <label class="form-check-label" for="c3_2">Boundaries</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_3" name="topic_category[]" value="climatology meteorology atmosphere">
                              <label class="form-check-label" for="c3_3">Climatology Meteorology Atmosphere</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_4" name="topic_category[]" value="disaster">
                              <label class="form-check-label" for="c3_4">Disaster</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_5" name="topic_category[]" value="economy">
                              <label class="form-check-label" for="c3_5">Economy</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_6" name="topic_category[]" value="elevation">
                              <label class="form-check-label" for="c3_6">Elevation</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_7" name="topic_category[]" value="environment">
                              <label class="form-check-label" for="c3_7">Environment</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_8" name="topic_category[]" value="farming">
                              <label class="form-check-label" for="c3_8">Farming</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_9" name="topic_category[]" value="geoscientific information">
                              <label class="form-check-label" for="c3_9">Geoscientific Information</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_10" name="topic_category[]" value="health">
                              <label class="form-check-label" for="c3_10">Health</label>
                            </div>
                          </div>
                          <?php /* ######### */?>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_11" name="topic_category[]" value="Imagery Base Maps-Earth Cover">
                              <label class="form-check-label" for="c3_11">Imagery Base Maps-Earth Cover</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_12" name="topic_category[]" value="Intelligence Military">
                              <label class="form-check-label" for="c3_12">Intelligence Military</label>
                            </div>
                          </div>
                           <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_13" name="topic_category[]" value="Inland Waters">
                              <label class="form-check-label" for="c3_13">Inland Waters</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_14" name="topic_category[]" value="Location">
                              <label class="form-check-label" for="c3_14">Location</label>
                            </div>
                          </div>
                           <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_15" name="topic_category[]" value="Oceans">
                              <label class="form-check-label" for="c3_15">Oceans</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_16" name="topic_category[]" value="Planning Cadastre">
                              <label class="form-check-label" for="c3_16">Planning Cadastre</label>
                            </div>
                          </div>
                           <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_17" name="topic_category[]" value="Society">
                              <label class="form-check-label" for="c3_17">Society</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_18" name="topic_category[]" value="Structure">
                              <label class="form-check-label" for="c3_18">Structure</label>
                            </div>
                          </div>
                           <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_19" name="topic_category[]" value="Transportation">
                              <label class="form-check-label" for="c3_19">Transportation</label>
                            </div>
                          </div>
                          <div class="p-2 bd-highlight">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="c3_20" name="topic_category[]" value="Utilities and Communication">
                              <label class="form-check-label" for="c3_20">Utilities and Communication</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse4 =============================================================?>
                  <div class="card card-primary div_c4" id="div_c4">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse4">
                          <?php echo __('lang.accord_4'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
                      <div class="card-body">
                        <div class="form-group row">
                          Scanning Resolution:
                          <input type="text" name="c4_scan_res" id="c4_file_name" class="form-control col-lg-4"> 
                          &nbsp;&nbsp;&nbsp;
                          Ground Scanning:
                          <input type="text" name="c4_ground_scan" id="c4_url" class="form-control col-lg-4"> meter
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse5 =============================================================?>
                  <div class="card card-primary div_c5" id="div_c5">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse5">
                          <?php echo __('lang.accord_5'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse in show" data-parent="#div_c5">
                      <div class="card-body">
                        <div class="form-group row">
                          Process Level:
                          <input type="text" name="c5_" id="c5_process_lvl" class="form-control col-lg-4"> 
                          &nbsp;&nbsp;&nbsp;
                          Resolution:
                          <input type="text" name="c5_url" id="c5_resolution" class="form-control col-lg-4"> meter
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse6 =============================================================?>
                  <div class="card card-primary div_c6" id="div_c6">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse6">
                          <?php echo __('lang.accord_6'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
                      <div class="card-body">
                        <div class="form-group row">
                          Collection Name:
                          <input type="text" name="c6_file_name" id="c6_collection_name" class="form-control col-lg-4"> 
                          &nbsp;&nbsp;&nbsp;
                          Collection Identification:
                          <input type="text" name="c6_url" id="c6_collection_id" class="form-control col-lg-4"> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse7 =============================================================?>
                  <div class="card card-primary div_c7" id="div_c7">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse7">
                          <?php echo __('lang.accord_7'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse in show" data-parent="#div_c7">
                      <div class="card-body">
                        <b>Wavelength Band Information</b>
                        <div class="form-group row">
                          Band Boundry:
                          <input type="text" name="c7_file_name" id="c7_band_boundary" class="form-control col-lg-4">
                        </div>
                        <div class="form-group row">
                          Transfer Function Type:
                          <input type="text" name="c7_file_name" id="c7_trans_fn_type" class="form-control col-lg-4"> 
                          &nbsp;&nbsp;&nbsp;
                          Transmitted Polarization:
                          <input type="text" name="c7_url" id="c7_trans_polar" class="form-control col-lg-4"> 
                        </div>
                        <div class="form-group row">
                          Nominal Spatial Resolution:
                          <input type="text" name="c7_file_name" id="c7_nominal_spatial_res" class="form-control col-lg-4"> 
                          &nbsp;&nbsp;&nbsp;
                          Detected Polarization:
                          <input type="text" name="c7_url" id="c7_detected_polar" class="form-control col-lg-4"> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse8 =============================================================?>
                  <div class="card card-primary div_c8" id="div_c8">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse8">
                          <?php echo __('lang.accord_8'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
                      <div class="card-body">
                        <b>Environment Record</b>
                        <div class="form-group row">
                          Average Air Temperature:
                          <input type="text" name="c8_file_name" id="c8_avg_air_temp" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                          Altitude:
                          <input type="text" name="c8_url" id="c8_altitude" class="form-control col-lg-4"> 
                        </div>
                        <div class="form-group row">
                          Relative Humidity:
                          <input type="text" name="c8_file_name" id="c8_relative_humid" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                          Meteorological Condition:
                          <input type="text" name="c8_url" id="c8_meteor_cond" class="form-control col-lg-4"> 
                        </div>
                        <b>Event Identifier</b>
                        <div class="form-group row">
                          Identifier:
                          <input type="text" name="c8_file_name" id="c8_identifier" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                          Trigger:
                          <input type="text" name="c8_url" id="c8_trigger" class="form-control col-lg-4"> 
                        </div>
                        <div class="form-group row">
                          Context:
                          <input type="text" name="c8_file_name" id="c8_context" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                          Sequence:
                          <input type="text" name="c8_url" id="c8_sequence" class="form-control col-lg-4"> 
                        </div>
                        <div class="form-group row">
                          Time:
                          <input type="text" name="c8_file_name" id="c8_time" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                        </div>
                        <b>Instrument Identification</b>
                        <div class="form-group row">
                          Type:
                          <input type="text" name="c8_file_name" id="c8_type" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                        </div>
                        <b>Operation</b>
                        <div class="form-group row">
                          Identifier:
                          <input type="text" name="c8_file_name" id="c8_op_identifier" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                          Status:
                          <input type="text" name="c8_url" id="c8_op_status" class="form-control col-lg-4"> 
                        </div>
                        <div class="form-group row">
                          Type:
                          <input type="text" name="c8_file_name" id="c8_op_type" class="form-control col-lg-4">
                          &nbsp;&nbsp;&nbsp;
                        </div>
                        <b>Request Data Range</b>
                        <div class="form-group row">
                          Date:
                          <input type="text" name="c8_url" id="c8_op_type" class="form-control col-lg-4"> 
                          &nbsp;&nbsp;&nbsp;
                          Last Acceptable Date:
                          <input type="text" name="c8_file_name" id="c8_last_accept_date" class="form-control col-lg-4">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse9 =============================================================?>
                  <div class="card card-primary div_c9" id="div_c9">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse9" class="fixMap">
                          <?php echo __('lang.accord_9'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse in show" data-parent="#div_c9" style="height:500px;">
                      <div class="card-body">
                          <?php
                          $westBoundLongitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal:"");
                          $eastBoundLongitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal:"");
                          $southBoundLatitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal:"");
                          $northBoundLatitude = (isset($metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal) ? $metadata->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal:"");
                          ?>
                        
                        <div class="float-right col-lg-2">
                          West Bound Longitude: <input type="text" name="c9_west_bound_longitude" id="west_bound_longitude" value="{{ $westBoundLongitude }}"> <br>
                          East Bound Longitude: <input type="text" name="c9_east_bound_longitude" id="east_bound_longitude" value="{{ $eastBoundLongitude }}"> <br>
                          South Bound Latitude: <input type="text" name="c9_south_bound_latitude" id="south_bound_latitude" value="{{ $southBoundLatitude }}"> <br>
                          North Bound Latitude: <input type="text" name="c9_north_bound_latitude" id="north_bound_latitude" value="{{ $northBoundLatitude }}"> <br>
                          <br>
                          <button type="button" id="btn_set_area" class="btn btn-block btn-primary">Set</button>
                          <button type="button" id="btn_reset_map" class="btn btn-block btn-primary">Reset Map</button>
                        </div>
                        <div id="map" style="width:70%;margin-top:66px;"></div>
                        <div class="calculation-box" style="top:254px;">
                            <p>Draw a polygon using the draw tools.</p>
                            <div id="calculated-area"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse10 =============================================================?>
                  <div class="card card-primary div_c10" id="div_c10">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse10">
                          <?php echo __('lang.accord_10'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse in show" data-parent="#div_c10">
                      <div class="card-body">
                        <div class="form-group row">
                            <b>Browsing Graphic</b>
                            <table style="width:100%;">
                                <tr>
                                    <td>File Name:</td>
                                    <td>
                                        <input type="text" name="c10_file_name" id="c10_file_name" class="form-control col-lg-4">
                                    </td>
                                </tr>
                                <tr>
                                    <td>File Type:</td>
                                    <td>
                                        <input type="text" name="c10_file_type" id="c10_file_type" class="form-control col-lg-4">
                                    </td>
                                </tr>
                                <tr>
                                    <td>URL:</td>
                                    <td>
                                        <input type="text" name="c10_file_url" id="c10_file_type" class="form-control col-lg-4">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group row">
                            <b>Keyword</b>
                            <table style="width:100%;">
                                <tr>
                                    <td>Keyword:</td>
                                    <td>
                                        <input type="text" name="c10_keyword" id="c10_keyword" class="form-control col-lg-4">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Additional Keyword:</td>
                                    <td>
                                        <input type="text" name="c10_additional_keyword[]" class="form-control col-lg-4">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Additional Keyword:</td>
                                    <td>
                                        <input type="text" name="c10_additional_keyword[]" class="form-control col-lg-4">
                                    </td>
                                </tr>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse11 =============================================================?>
                  <div class="card card-primary div_c11" id="div_c11">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse11">
                          <?php echo __('lang.accord_11'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse11" class="panel-collapse collapse in show" data-parent="#div_c11">
                      <div class="card-body">
                        <div class="form-group row">
                          Distribution Format:
                          <input type="text" name="c11_dist_format" id="c11_dist_format" class="form-control col-lg-2"> 
                          &nbsp;&nbsp;&nbsp;
                          Version:
                          <input type="text" name="c11_version" id="c11_version" class="form-control col-lg-2"> 
                          &nbsp;&nbsp;&nbsp;
                          Medium:
                          <?php
                          $medium = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->offLine->MD_Medium->name:"");
                          ?>
                          <input type="text" name="c11_medium" id="c11_medium" class="form-control col-lg-3" value="{{ $medium }}">
                        </div>
                        <div class="form-group row">
                          Distributor:
                          <input type="text" name="c11_distributor" id="c11_distributor" class="form-control col-lg-4"> 
                        </div>
                        <div class="form-group row">
                          <p><b>Distribution Order Process</b></p>
                        </div>
                        <div class="form-group row">
                          <?php
                          $unit_distribute = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->unitsOfDistribution->CharacterString:"");
                          ?>
                          Units of Distribution:
                          <input type="text" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control col-lg-2" value="{{ $unit_distribute }}"> 
                          &nbsp;&nbsp;&nbsp;
                          <?php
                          $size = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->transferSize->Real:"");
                          ?>
                          Size (Megabytes):
                          <input type="text" name="c11_size" id="c11_size" class="form-control col-lg-2" value="{{ $size }}"> 
                          &nbsp;&nbsp;&nbsp;
                          Fees:
                          <input type="text" name="c11_fees" id="c11_fees" class="form-control col-lg-2" placeholder="RM 0.00"> 
                        </div>
                        <div class="form-group row">
                          <?php
                          $link = (isset($metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL) ? $metadata->distributionInfo->MD_Distribution->transferOptions->MD_DigitalTransferOptions->onLine->CI_OnlineResource->linkage->URL:"");
                          ?>
                          Link:
                          <input type="text" name="c11_link" id="c11_link" class="form-control col-lg-3"> 
                          &nbsp;&nbsp;&nbsp;
                          <?php
                          $order_instruct = (isset($metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString) ? $metadata->distributionInfo->MD_Distribution->distributor->MD_Distributor->distributionOrderProcess->MD_StandardOrderProcess->orderingInstructions->CharacterString:"");
                          ?>
                          Ordering Instructions:
                          <input type="text" name="c11_order_instructions" id="c11_order_instructions" class="form-control col-lg-5" value="{{ $order_instruct }}"> 
                          <!--<input type="file" name="c11_order_instructions" id="c11_order_instructions" class="form-control col-lg-5">--> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse12 =============================================================?>
                  <div class="card card-primary div_c12" id="div_c12">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse12">
                          <?php echo __('lang.accord_12'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse12" class="panel-collapse collapse in show" data-parent="#div_c12">
                      <div class="card-body">
                        <div class="form-group row">
                          Data Set Type:
                          <select name="c12_dataset_type" id="c12_dataset_type" class="form-control col-lg-2"> 
                            <option value="grid">Grid</option>
                            <option value="stereo_model">Stereo Model</option>
                            <option value="text_table">Text Table</option>
                            <option value="tin">Tin</option>
                            <option value="vector">Vector</option>
                            <option value="video">Video</option>
                          </select>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-4">
                            Scale in Hardcopy / Softcopy (feature scale):
                            <input type="text" name="c12_feature_scale" id="c12_feature_scale" class="form-control col-lg-7" placeholder="10:50000"> 
                            &nbsp;&nbsp;&nbsp;
                          </div>
                          <div class="col-lg-4">
                            Image Resolution (GSD):
                            <div class="input-group mb-3">
                              <input type="text" class="form-control col-lg-5" name="c12_image_res" id="c12_image_res" placeholder="10.5">
                              <div class="input-group-append">
                                <span class="input-group-text">meter</span>
                              </div>
                            </div>
                            &nbsp;&nbsp;&nbsp;
                          </div>
                          <div class="col-lg-4">
                            Language:
                            <select name="c12_language" id="c12_language" class="form-control col-lg-7"> 
                              <option value="english">English</option>
                              <option value="bahasa_malaysia">Bahasa Malaysia</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse13 =============================================================?>
                  <div class="card card-primary div_c13" id="div_c13">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse13">
                          <?php echo __('lang.accord_13'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse13" class="panel-collapse collapse in show" data-parent="#div_c13">
                      <div class="card-body">
                        <div class="form-group row">
                          Reference System Identifier:
                          <select name="c13_ref_sys_identify" id="c13_ref_sys_identify" class="form-control col-lg-2"> 
                            <option selected disabled>Select Identifier</option>
                            <?php
                            if(count($refSysIds) > 0){
                              foreach($refSysIds as $ids){
                                ?><option value="<?php echo $ids->id; ?>"><?php echo $ids->name; ?></option><?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group row">
                            <table>
                                <tr>
                                    <td>
                                        <label class="form-check-label" style="margin-left:20px;" for="c3_1"><b>Projection:</b> Cassini-Soldner</label>
                                    </td>
                                    <td>
                                        <label class="form-check-label" style="margin-left:20px;" for="c3_2"><b>Semi Major Axis:</b> 6337304.0630000001</label>
                                    </td>
                                    <td>
                                        <label class="form-check-label" style="margin-left:20px;" for="c3_3"><b>Ellipsoid:</b> Modified Everest</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-check-label" style="margin-left:20px;" for="c3_4"><b>Axis Units:</b> Meter</label>
                                    </td>
                                    <td>
                                        <label class="form-check-label" style="margin-left:20px;" for="c3_5"><b>Datum:</b> Kertau 1948</label>
                                    </td>
                                    <td>
                                       <label class="form-check-label" style="margin-left:20px;" for="c3_6"><b>Denominator of Flattening Ratio:</b> 300.801699999999980</label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse14 =============================================================?>
                  <div class="card card-primary div_c14" id="div_c14">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse14">
                          <?php echo __('lang.accord_14'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse14" class="panel-collapse collapse in show" data-parent="#div_c14">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table-borderless" style="width: 100%">
                            <thead>
                              <tr>
                                <th style="width: 50%">Legal Constraints</th>
                                <th style="width: 50%">Security Constraints</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  Access Constraints:
                                  <select name="c14_access_constraint" id="c14_access_constraint" class="form-control col-lg-7">
                                    <option value="copyright">Copyright</option>
                                    <option value="intelect_prop_right">Intellectual Property Rights</option>
                                    <option value="license">License</option>
                                    <option value="license_end_user">License End User</option>
                                    <option value="license_unrestricted">License Unrestricted</option>
                                    <option value="other_restrictions">Other Restrictions</option>
                                    <option value="patient">Patient</option>
                                    <option value="patient_pending">Patient Pending</option>
                                    <option value="restricted">Restricted</option>
                                    <option value="trademark">Trademark</option>
                                    <option value="unrestricted">Unrestricted</option>
                                  </select>
                                </td>
                                <td>
                                  Classification System:
                                  <select name="c14_classification_sys" id="c14_classification_sys" class="form-control col-lg-4"> 
                                    <option value="limited">Limited</option>
                                    <option value="open">Open</option>
                                    <option value="secret">Secret</option>
                                    <option value="top_secret">Top Secret</option>
                                    <option value="others">Others</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Use Constraints:
                                  <select name="c14_use_constraint" id="c14_use_constraint" class="form-control col-lg-7">
                                    <option value="copyright">Copyright</option>
                                    <option value="intelect_prop_right">Intellectual Property Rights</option>
                                    <option value="license">License</option>
                                    <option value="license_end_user">License End User</option>
                                    <option value="license_unrestricted">License Unrestricted</option>
                                    <option value="other_restrictions">Other Restrictions</option>
                                    <option value="patient">Patient</option>
                                    <option value="patient_pending">Patient Pending</option>
                                    <option value="restricted">Restricted</option>
                                    <option value="trademark">Trademark</option>
                                    <option value="unrestricted">Unrestricted</option>
                                  </select>
                                </td>
                                <td>
                                  Reference:
                                  <input type="text" name="c14_reference" id="c14_reference" class="form-control col-lg-9" placeholder="Standard/Policy/Act/Circular/Legal">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //=== collapse15 ============================================================?>
                  <div class="card card-primary div_c15" id="div_c15">
                    <div class="card-header ftest">
                      <h4 class="card-title">
                        <a data-toggle="collapse" href="#collapse15">
                          <?php echo __('lang.accord_15'); ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse15" class="panel-collapse collapse in show" data-parent="#div_c15">
                      <div class="card-body">
                        <div class="form-group row">
                          <b>Data Quality Information</b>
                        </div>
                        <div class="form-group row">
                          <div class="table-responsive">
                            <table class="table-borderless">
                              <tbody>
                                <tr>
                                  <td>&nbsp;DQ Scope</td>
                                  <td>&nbsp;:</td>
                                  <td> <select name="c15_data_quality_info" id="c15_data_quality_info" style="max-width: 100%;" class="form-control col-lg-3"> 
                                      <option value="attribute">Attribute</option>
                                      <option value="attribute_type">Attribute Type</option>
                                      <option value="collection_session">Collection Session</option>
                                      <option value="dataset">Dataset</option>
                                      <option value="feature">Feature</option>
                                      <option value="dimension_group">Dimension Group</option>
                                      <option value="feature_type">Feature Type</option>
                                      <option value="field_session">Field Session</option>
                                      <option value="model">Model</option>
                                      <option value="non_geo_date_set">Non Geographic Date Set</option>
                                      <option value="prop_type">Property Type</option>
                                      <option value="service">Service</option>
                                      <option value="software">Software</option>
                                      <option value="tile">Tile</option>
                                    </select></td>
                                <td>&nbsp;Data History</td>
                                <td>&nbsp;:</td>
                                <td><input type="text" name="c15_data_history" id="c15_data_history" style="max-width: 100%;" class="form-control col-lg-2">
                                </td>
                                <td>&nbsp;Date</td>
                                <td>&nbsp;:</td>
                                <td>
                                     <div class="input-group date" id="c15_date_div" data-target-input="nearest">
                                          <input type="text" name="c15_date" id="c15_date" class="form-control datetimepicker-input" data-target="#c15_date_div">
                                          <div class="input-group-append" data-target="#c15_date_div" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="form-group row">
                          <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness" role="tab" aria-controls="completeness" aria-selected="true">Completeness</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tab_consistency" data-toggle="pill" href="#consistency" role="tab" aria-controls="consistency" aria-selected="false">Consistency</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tab_position_accuracy" data-toggle="pill" href="#position_accuracy" role="tab" aria-controls="position_accuracy" aria-selected="false">Positional Accuracy</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tab_temp_accuracy" data-toggle="pill" href="#temp_accuracy" role="tab" aria-controls="temp_accuracy" aria-selected="false">Temporal Accuracy</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="tab_thematic_accuracy" data-toggle="pill" href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy" aria-selected="false">Thematic Accuracy</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade active show" id="completeness" role="tabpanel" aria-labelledby="tab_completeness">
                                  <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                      <div class="table-responsive">
                                          <table class="table-borderless">
                                            <tbody>
                                              <tr>
                                                <td> 
                                                  <label class="form-check-label" for="c3_1">
                                                      <input type="radio" name="c15_t1_complete_comm_or_omit" checked="">&nbsp;Completeness Commission
                                                  </label>
                                                  </td>
                                                <td>
                                                  <label class="form-check-label" for="c3_1">
                                                       <input type="radio" name="c15_t1_complete_comm_or_omit">&nbsp;Completeness Omission
                                                  </label>
                                               </td>
                                              </tr>
                                              <tr>
                                                <td> 
                                                  <label class="form-check-label" for="c3_1">
                                                      <b>Scope:</b>
                                                      <select name="c15_t1_commission_scope" id="c15_t1_commission_scope" class="form-control"> 
                                                      <option value="attribute">Aeronautical</option>
                                                      <option value="attribute_type">Built Environment</option>
                                                      <option value="collection_session">Demarcation</option>
                                                      <option value="dataset">General</option>
                                                      <option value="feature">Geology</option>
                                                      <option value="dimension_group">Hydrography</option>
                                                      <option value="feature_type">Hypsography</option>
                                                      <option value="field_session">Soil</option>
                                                      <option value="model">Special Use</option>
                                                      <option value="non_geo_date_set">Transportation</option>
                                                      <option value="prop_type">Utility</option>
                                                      <option value="service">Vegetation</option>
                                                    </select>
                                                  </label>
                                                </td>
                                                <td>
                                                  <label class="form-check-label" for="c3_1">
                                                    <b>Scope:</b>
                                                    <select name="c15_t1_omission_scope" id="c15_t1_omission_scope" class="form-control"> 
                                                      <option value="attribute">Aeronautical</option>
                                                      <option value="attribute_type">Built Environment</option>
                                                      <option value="collection_session">Demarcation</option>
                                                      <option value="dataset">General</option>
                                                      <option value="feature">Geology</option>
                                                      <option value="dimension_group">Hydrography</option>
                                                      <option value="feature_type">Hypsography</option>
                                                      <option value="field_session">Soil</option>
                                                      <option value="model">Special Use</option>
                                                      <option value="non_geo_date_set">Transportation</option>
                                                      <option value="prop_type">Utility</option>
                                                      <option value="service">Vegetation</option>
                                                    </select>
                                                  </label>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td> 
                                                    <label class="form-check-label" for="c3_3">
                                                    <b>Compliance Level:</b>
                                                    <input type="text" name="c15_t1_commission_comply_level" id="c15_t1_commission_comply_level" class="form-control">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_3">
                                                    <b>Compliance Level:</b>
                                                    <input type="text" name="c15_t1_omission_comply_level" id="c15_t1_omission_comply_level" class="form-control">
                                                    </label>
                                                </td>
                                              </tr>
                                              <tr>
                                                  <td> 
                                                      <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t1_commission_date_div" data-target-input="nearest">
                                                              <input type="text" name="c15_t1_commission_date" id="c15_t1_commission_date" class="form-control datetimepicker-input" data-target="#c15_t1_commission_date_div">
                                                              <div class="input-group-append" data-target="#c15_t1_commission_date_div" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                              </div>
                                                          </div>
                                                      </label>
                                                  </td>
                                                  <td>
                                                      <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t1_omission_date_div" data-target-input="nearest">
                                                          <input type="text" name="c15_t1_omission_date" id="c15_t1_omission_date" class="form-control datetimepicker-input" data-target="#c15_t1_omission_date_div">
                                                          <div class="input-group-append" data-target="#c15_t1_omission_date_div" data-toggle="datetimepicker">
                                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                          </div>
                                                      </label>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td> 
                                                      <label class="form-check-label" for="c3_2">
                                                        <b>Result:</b>
                                                        <select name="c15_t1_commission_result" id="c15_t1_commission_result" class="form-control"> 
                                                          <option value="attribute">Pass</option>
                                                          <option value="attribute_type">Fail</option>
                                                          <option value="collection_session">Not Relevant</option>
                                                        </select>
                                                      </label>
                                                  </td>
                                                  <td>
                                                     <label class="form-check-label" for="c3_2">
                                                        <b>Result:</b>
                                                        <select name="c15_t1_omission_result" id="c15_t1_omission_result" class="form-control"> 
                                                          <option value="attribute">Pass</option>
                                                          <option value="attribute_type">Fail</option>
                                                          <option value="collection_session">Not Relevant</option>
                                                        </select>
                                                      </label>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td> 
                                                      <label class="form-check-label" for="c3_4">
                                                        <b>Conformance Result:</b>
                                                        <input type="text" name="c15_t1_commission_conform_result" id="c15_t1_commission_conform_result" class="form-control">
                                                      </label>
                                                        </td>
                                                  <td>
                                                     <label class="form-check-label" for="c3_4">
                                                        <b>Conformance Result:</b>
                                                        <input type="text" name="c15_t1_omission_conform_result" id="c15_t1_omission_conform_result" class="form-control">
                                                      </label>
                                                  </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="consistency" role="tabpanel" aria-labelledby="tab_consistency">
                                     <div class="form-group row">
                                      <div class="d-flex flex-wrap bd-highlight">
                                         <div class="table-responsive">
                                            <table class="table-borderless">
                                              <tbody>
                                                <tr>
                                                  <td> 
                                                    <label class="form-check-label" for="c3_1">
                                                        <input type="radio" name="c15_t2_type" checked="">&nbsp;Conceptual
                                                    </label>
                                                    </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_1">
                                                        <input type="radio" name="c15_t2_type">&nbsp;Domain
                                                     </label>
                                                </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_1">
                                                        <input type="radio" name="c15_t2_type">&nbsp;Format
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_1">
                                                      <input type="radio" name="c15_t2_type">&nbsp;Topological
                                                    </label>
                                                </td>
                                                </tr>
                                                <tr>
                                                  <td> 
                                                    <label class="form-check-label" for="c3_1">
                                                      <b>Scope:</b>
                                                      <select name="c15_t2_conceptual_scope" id="c15_t2_conceptual_scope" class="form-control"> 
                                                        <option value="attribute">Aeronautical</option>
                                                        <option value="attribute_type">Built Environment</option>
                                                        <option value="collection_session">Demarcation</option>
                                                        <option value="dataset">General</option>
                                                        <option value="feature">Geology</option>
                                                        <option value="dimension_group">Hydrography</option>
                                                        <option value="feature_type">Hypsography</option>
                                                        <option value="field_session">Soil</option>
                                                        <option value="model">Special Use</option>
                                                        <option value="non_geo_date_set">Transportation</option>
                                                        <option value="prop_type">Utility</option>
                                                        <option value="service">Vegetation</option>
                                                      </select>
                                                    </label>
                                                  </td>
                                                  <td>
                                                        <label class="form-check-label" for="c3_1">
                                                        <b>Scope:</b>
                                                         <select name="c15_t2_domain_scope" id="c15_t2_domain_scope" class="form-control"> 
                                                            <option value="attribute">Aeronautical</option>
                                                            <option value="attribute_type">Built Environment</option>
                                                            <option value="collection_session">Demarcation</option>
                                                            <option value="dataset">General</option>
                                                            <option value="feature">Geology</option>
                                                            <option value="dimension_group">Hydrography</option>
                                                            <option value="feature_type">Hypsography</option>
                                                            <option value="field_session">Soil</option>
                                                            <option value="model">Special Use</option>
                                                            <option value="non_geo_date_set">Transportation</option>
                                                            <option value="prop_type">Utility</option>
                                                            <option value="service">Vegetation</option>
                                                        </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                         <label class="form-check-label" for="c3_1">
                                                         <b>Scope:</b>
                                                          <select name="c15_t2_format_scope" id="c15_t2_format_scope" class="form-control"> 
                                                            <option value="attribute">Aeronautical</option>
                                                            <option value="attribute_type">Built Environment</option>
                                                            <option value="collection_session">Demarcation</option>
                                                            <option value="dataset">General</option>
                                                            <option value="feature">Geology</option>
                                                            <option value="dimension_group">Hydrography</option>
                                                            <option value="feature_type">Hypsography</option>
                                                            <option value="field_session">Soil</option>
                                                            <option value="model">Special Use</option>
                                                            <option value="non_geo_date_set">Transportation</option>
                                                            <option value="prop_type">Utility</option>
                                                            <option value="service">Vegetation</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_1">
                                                          <b>Scope:</b>
                                                          <select name="c15_t2_topological_scope" id="c15_t2_topological_scope" class="form-control"> 
                                                            <option value="attribute">Aeronautical</option>
                                                            <option value="attribute_type">Built Environment</option>
                                                            <option value="collection_session">Demarcation</option>
                                                            <option value="dataset">General</option>
                                                            <option value="feature">Geology</option>
                                                            <option value="dimension_group">Hydrography</option>
                                                            <option value="feature_type">Hypsography</option>
                                                            <option value="field_session">Soil</option>
                                                            <option value="model">Special Use</option>
                                                            <option value="non_geo_date_set">Transportation</option>
                                                            <option value="prop_type">Utility</option>
                                                            <option value="service">Vegetation</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <label class="form-check-label" for="c3_3">
                                                            <b>Compliance Level:</b>
                                                            <input type="text" name="c15_t2_conceptual_comply_level" id="c15_t2_conceptual_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_3">
                                                            <b>Compliance Level:</b>
                                                            <input type="text" name="c15_t2_domain_comply_level" id="c15_t2_domain_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_3">
                                                          <b>Compliance Level:</b>
                                                          <input type="text" name="c15_t2_format_comply_level" id="c15_t2_format_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_3">
                                                          <b>Compliance Level:</b>
                                                          <input type="text" name="c15_t2_topological_comply_level" id="c15_t2_topological_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                         <label class="form-check-label" for="c3_5">
                                                            <b>Date:</b>
                                                                <div class="input-group date" id="c15_t2_conceptual_date_div" data-target-input="nearest">
                                                                    <input type="text" name="c15_t2_conceptual_date" id="c15_t2_conceptual_date" class="form-control datetimepicker-input" data-target="#c15_t2_conceptual_date_div">
                                                                    <div class="input-group-append" data-target="#c15_t2_conceptual_date_div" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t2_domain_date_div" data-target-input="nearest">
                                                            <input type="text" name="c15_t2_domain_date" id="c15_t2_domain_date" class="form-control datetimepicker-input" data-target="#c15_t2_domain_date_div">
                                                            <div class="input-group-append" data-target="#c15_t2_domain_date_div" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_5">
                                                              <b>Date:</b>
                                                              <div class="input-group date" id="c15_t2_format_date_div" data-target-input="nearest">
                                                                <input type="text" name="c15_t2_format_date" id="c15_t2_format_date" class="form-control datetimepicker-input" data-target="#c15_t2_format_date_div">
                                                                <div class="input-group-append" data-target="#c15_t2_format_date_div" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t2_topological_date_div" data-target-input="nearest">
                                                            <input type="text" name="c15_t2_topological_date" id="c15_t2_topological_date" class="form-control datetimepicker-input" data-target="#c15_t2_topological_date_div">
                                                            <div class="input-group-append" data-target="#c15_t2_topological_date_div" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <label class="form-check-label" for="c3_2">
                                                          <b>Result:</b>
                                                          <select name="c15_t2_conceptual_result" id="c15_t2_conceptual_result" class="form-control"> 
                                                            <option value="attribute">Pass</option>
                                                            <option value="attribute_type">Fail</option>
                                                            <option value="collection_session">Not Relevant</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                              <b>Result:</b>
                                                              <select name="c15_t2_domain_result" id="c15_t2_domain_result" class="form-control"> 
                                                                <option value="attribute">Pass</option>
                                                                <option value="attribute_type">Fail</option>
                                                                <option value="collection_session">Not Relevant</option>
                                                              </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                          <b>Result:</b>
                                                          <select name="c15_t2_format_result" id="c15_t2_format_result" class="form-control"> 
                                                            <option value="attribute">Pass</option>
                                                            <option value="attribute_type">Fail</option>
                                                            <option value="collection_session">Not Relevant</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                          <b>Result:</b>
                                                          <select name="c15_t2_topological_result" id="c15_t2_topological_result" class="form-control"> 
                                                            <option value="attribute">Pass</option>
                                                            <option value="attribute_type">Fail</option>
                                                            <option value="collection_session">Not Relevant</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <label class="form-check-label" for="c3_4">
                                                              <b>Conformance Result:</b>
                                                              <input type="text" name="c15_t2_conceptual_conform_result" id="c15_t2_conceptual_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                          <b>Conformance Result:</b>
                                                          <input type="text" name="c15_t2_domain_conform_result" id="c15_t2_domain_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                          <b>Conformance Result:</b>
                                                          <input type="text" name="c15_t2_format_conform_result" id="c15_t2_format_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                          <b>Conformance Result:</b>
                                                          <input type="text" name="c15_t2_topological_conform_result" id="c15_t2_topological_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                     </div>
                                  </div>                                       
                                <div class="tab-pane fade" id="position_accuracy" role="tabpanel" aria-labelledby="tab_position_accuracy">
                                     <div class="form-group row">
                                      <div class="d-flex flex-wrap bd-highlight">
                                         <div class="table-responsive">
                                            <table class="table-borderless">
                                              <tbody>
                                                <tr>
                                                  <td> 
                                                    <label class="form-check-label" for="c3_1">
                                                      <input type="radio" name="c15_t3_type" checked="">&nbsp;Absolute or External
                                                    </label>
                                                    </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_1">
                                                      <input type="radio" name="c15_t3_type">&nbsp;Relative or Internal
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_1">
                                                      <input type="radio" name="c15_t3_type">&nbsp;Gridded Data
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                  <td> 
                                                    <label class="form-check-label" for="c3_1">
                                                      <b>Scope:</b>
                                                      <select name="c15_t3_absExt_scope" id="c15_t3_absExt_scope" class="form-control"> 
                                                        <option value="attribute">Aeronautical</option>
                                                        <option value="attribute_type">Built Environment</option>
                                                        <option value="collection_session">Demarcation</option>
                                                        <option value="dataset">General</option>
                                                        <option value="feature">Geology</option>
                                                        <option value="dimension_group">Hydrography</option>
                                                        <option value="feature_type">Hypsography</option>
                                                        <option value="field_session">Soil</option>
                                                        <option value="model">Special Use</option>
                                                        <option value="non_geo_date_set">Transportation</option>
                                                        <option value="prop_type">Utility</option>
                                                        <option value="service">Vegetation</option>
                                                      </select>
                                                    </label>
                                                  </td>
                                                  <td>
                                                       <label class="form-check-label" for="c3_1">
                                                          <b>Scope:</b>
                                                          <select name="c15_t3_relInt_scope" id="c15_t3_relInt_scope" class="form-control"> 
                                                            <option value="attribute">Aeronautical</option>
                                                            <option value="attribute_type">Built Environment</option>
                                                            <option value="collection_session">Demarcation</option>
                                                            <option value="dataset">General</option>
                                                            <option value="feature">Geology</option>
                                                            <option value="dimension_group">Hydrography</option>
                                                            <option value="feature_type">Hypsography</option>
                                                            <option value="field_session">Soil</option>
                                                            <option value="model">Special Use</option>
                                                            <option value="non_geo_date_set">Transportation</option>
                                                            <option value="prop_type">Utility</option>
                                                            <option value="service">Vegetation</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                         <label class="form-check-label" for="c3_1">
                                                              <b>Scope:</b>
                                                              <select name="c15_t3_gridded_scope" id="c15_t3_gridded_scope" class="form-control"> 
                                                                <option value="attribute">Aeronautical</option>
                                                                <option value="attribute_type">Built Environment</option>
                                                                <option value="collection_session">Demarcation</option>
                                                                <option value="dataset">General</option>
                                                                <option value="feature">Geology</option>
                                                                <option value="dimension_group">Hydrography</option>
                                                                <option value="feature_type">Hypsography</option>
                                                                <option value="field_session">Soil</option>
                                                                <option value="model">Special Use</option>
                                                                <option value="non_geo_date_set">Transportation</option>
                                                                <option value="prop_type">Utility</option>
                                                                <option value="service">Vegetation</option>
                                                              </select>
                                                            </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <label class="form-check-label" for="c3_3">
                                                          <b>Compliance Level:</b>
                                                          <input type="text" name="c15_t3_absExt_comply_level" id="c15_t3_absExt_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                       <label class="form-check-label" for="c3_3">
                                                          <b>Compliance Level:</b>
                                                          <input type="text" name="c15_t3_relInt_comply_level" id="c15_t3_relInt_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_3">
                                                          <b>Compliance Level:</b>
                                                          <input type="text" name="c15_t3_gridded_comply_level" id="c15_t3_gridded_comply_level" class="form-control">
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                         <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t3_absExt_date_div" data-target-input="nearest">
                                                            <input type="text" name="c15_t3_absExt_date" id="c15_t3_absExt_date" class="form-control datetimepicker-input" data-target="#c15_t3_absExt_date_div">
                                                            <div class="input-group-append" data-target="#c15_t3_absExt_date_div" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t3_relInt_date_div" data-target-input="nearest">
                                                            <input type="text" name="c15_t3_relInt_date" id="c15_t3_relInt_date" class="form-control datetimepicker-input" data-target="#c15_t3_relInt_date_div">
                                                            <div class="input-group-append" data-target="#c15_t3_relInt_date_div" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_5">
                                                          <b>Date:</b>
                                                          <div class="input-group date" id="c15_t3_gridded_date_div" data-target-input="nearest">
                                                            <input type="text" name="c15_t3_gridded_date" id="c15_t3_gridded_date" class="form-control datetimepicker-input" data-target="#c15_t3_gridded_date_div">
                                                            <div class="input-group-append" data-target="#c15_t3_gridded_date_div" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                       <label class="form-check-label" for="c3_2">
                                                          <b>Result:</b>
                                                          <select name="c15_t3_absExt_result" id="c15_t3_absExt_result" class="form-control"> 
                                                            <option value="attribute">Pass</option>
                                                            <option value="attribute_type">Fail</option>
                                                            <option value="collection_session">Not Relevant</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                              <b>Result:</b>
                                                              <select name="c15_t3_relInt_result" id="c15_t3_relInt_result" class="form-control"> 
                                                                <option value="attribute">Pass</option>
                                                                <option value="attribute_type">Fail</option>
                                                                <option value="collection_session">Not Relevant</option>
                                                              </select>
                                                            </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                          <b>Result:</b>
                                                          <select name="c15_t3_gridded_result" id="c15_t3_gridded_result" class="form-control"> 
                                                            <option value="attribute">Pass</option>
                                                            <option value="attribute_type">Fail</option>
                                                            <option value="collection_session">Not Relevant</option>
                                                          </select>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        <label class="form-check-label" for="c3_4">
                                                          <b>Conformance Result:</b>
                                                          <input type="text" name="c15_t3_absExt_conform_result" id="c15_t3_absExt_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                          <b>Conformance Result:</b>
                                                          <input type="text" name="c15_t3_relInt_conform_result" id="c15_t3_relInt_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                          <b>Conformance Result:</b>
                                                          <input type="text" name="c15_t3_gridded_conform_result" id="c15_t3_gridded_conform_result" class="form-control">
                                                        </label>
                                                    </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                      </div>
                                      </div>                        
                                <div class="tab-pane fade" id="temp_accuracy" role="tabpanel" aria-labelledby="tab_temp_accuracy">
                                  <div class="form-group row">
                                    <div class="bd-highlight">
                                      <div class="table-responsive">
                                        <table class="table-borderless">
                                          <tbody>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_1">
                                                  <input type="radio" name="c15_t4_type" checked="">&nbsp;Accuracy or Time Measurement
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_1">
                                                  <input type="radio" name="c15_t4_type">&nbsp;Temporal Consistency
                                                </label>
                                              </td>
                                              <td>
                                                  <label class="form-check-label" for="c3_1">
                                                    <input type="radio" name="c15_t4_type">&nbsp;Temporal Validity
                                                  </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_1">
                                                  <b>Scope:</b>
                                                  <select name="c15_t4_accuTimeMeasure_scope" id="c15_t4_accuTimeMeasure_scope" class="form-control"> 
                                                    <option value="attribute">Aeronautical</option>
                                                    <option value="attribute_type">Built Environment</option>
                                                    <option value="collection_session">Demarcation</option>
                                                    <option value="dataset">General</option>
                                                    <option value="feature">Geology</option>
                                                    <option value="dimension_group">Hydrography</option>
                                                    <option value="feature_type">Hypsography</option>
                                                    <option value="field_session">Soil</option>
                                                    <option value="model">Special Use</option>
                                                    <option value="non_geo_date_set">Transportation</option>
                                                    <option value="prop_type">Utility</option>
                                                    <option value="service">Vegetation</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                               <label class="form-check-label" for="c3_1">
                                                  <b>Scope:</b>
                                                  <select name="c15_t4_tempConsist_scope" id="c15_t4_tempConsist_scope" class="form-control"> 
                                                    <option value="attribute">Aeronautical</option>
                                                    <option value="attribute_type">Built Environment</option>
                                                    <option value="collection_session">Demarcation</option>
                                                    <option value="dataset">General</option>
                                                    <option value="feature">Geology</option>
                                                    <option value="dimension_group">Hydrography</option>
                                                    <option value="feature_type">Hypsography</option>
                                                    <option value="field_session">Soil</option>
                                                    <option value="model">Special Use</option>
                                                    <option value="non_geo_date_set">Transportation</option>
                                                    <option value="prop_type">Utility</option>
                                                    <option value="service">Vegetation</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                               <label class="form-check-label" for="c3_1">
                                                  <b>Scope:</b>
                                                  <select name="c15_t4_tempValid_scope" id="c15_t4_tempValid_scope" class="form-control"> 
                                                    <option value="attribute">Aeronautical</option>
                                                    <option value="attribute_type">Built Environment</option>
                                                    <option value="collection_session">Demarcation</option>
                                                    <option value="dataset">General</option>
                                                    <option value="feature">Geology</option>
                                                    <option value="dimension_group">Hydrography</option>
                                                    <option value="feature_type">Hypsography</option>
                                                    <option value="field_session">Soil</option>
                                                    <option value="model">Special Use</option>
                                                    <option value="non_geo_date_set">Transportation</option>
                                                    <option value="prop_type">Utility</option>
                                                    <option value="service">Vegetation</option>
                                                  </select>
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                                <td> 
                                                    <label class="form-check-label" for="c3_3">
                                                      <b>Compliance Level:</b>
                                                      <input type="text" name="c15_t4_accuTimeMeasure_comply_level" id="c15_t4_accuTimeMeasure_comply_level" class="form-control">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="form-check-label" for="c3_3">
                                                      <b>Compliance Level:</b>
                                                      <input type="text" name="c15_t4_tempConsist_comply_level" id="c15_t4_tempConsist_comply_level" class="form-control">
                                                    </label>
                                                </td>
                                                <td>
                                                   <label class="form-check-label" for="c3_3">
                                                      <b>Compliance Level:</b>
                                                      <input type="text" name="c15_t4_tempValid_comply_level" id="c15_t4_tempValid_comply_level" class="form-control">
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_5">
                                                  <b>Date:</b>
                                                  <div class="input-group date" id="c15_t4_accuTimeMeasure_date_div" data-target-input="nearest">
                                                    <input type="text" name="c15_t4_accuTimeMeasure_date" id="c15_t4_accuTimeMeasure_date" class="form-control datetimepicker-input" data-target="#c15_t4_accuTimeMeasure_date_div">
                                                    <div class="input-group-append" data-target="#c15_t4_accuTimeMeasure_date_div" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                  </div>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_5">
                                                  <b>Date:</b>
                                                  <div class="input-group date" id="c15_t4_tempConsist_date_div" data-target-input="nearest">
                                                    <input type="text" name="c15_t4_tempConsist_date" id="c15_t4_tempConsist_date" class="form-control datetimepicker-input" data-target="#c15_t4_tempConsist_date_div">
                                                    <div class="input-group-append" data-target="#c15_t4_tempConsist_date_div" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                  </div>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_5">
                                                  <b>Date:</b>
                                                  <div class="input-group date" id="c15_t4_tempValid_date_div" data-target-input="nearest">
                                                    <input type="text" name="c15_t4_tempValid_date" id="c15_t4_tempValid_date" class="form-control datetimepicker-input" data-target="#c15_t4_tempValid_date_div">
                                                    <div class="input-group-append" data-target="#c15_t4_tempValid_date_div" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                  </div>
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                               <label class="form-check-label" for="c3_2">
                                                  <b>Result:</b>
                                                  <select name="c15_t4_accuTimeMeasure_result" id="c15_t4_accuTimeMeasure_result" class="form-control"> 
                                                    <option value="attribute">Pass</option>
                                                    <option value="attribute_type">Fail</option>
                                                    <option value="collection_session">Not Relevant</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_2">
                                                  <b>Result:</b>
                                                  <select name="c15_t4_tempConsist_result" id="c15_t4_tempConsist_result" class="form-control"> 
                                                    <option value="attribute">Pass</option>
                                                    <option value="attribute_type">Fail</option>
                                                    <option value="collection_session">Not Relevant</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_2">
                                                  <b>Result:</b>
                                                  <select name="c15_t4_tempValid_result" id="c15_t4_tempValid_result" class="form-control"> 
                                                    <option value="attribute">Pass</option>
                                                    <option value="attribute_type">Fail</option>
                                                    <option value="collection_session">Not Relevant</option>
                                                  </select>
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_4">
                                                  <b>Conformance Result:</b>
                                                  <input type="text" name="c15_t4_accuTimeMeasure_conform_result" id="c15_t4_accuTimeMeasure_conform_result" class="form-control">
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_4">
                                                  <b>Conformance Result:</b>
                                                  <input type="text" name="c15_t4_tempConsist_conform_result" id="c15_t4_tempConsist_conform_result" class="form-control">
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_4">
                                                  <b>Conformance Result:</b>
                                                  <input type="text" name="c15_t4_tempValid_conform_result" id="c15_t4_tempValid_conform_result" class="form-control">
                                                </label>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="thematic_accuracy" role="tabpanel" aria-labelledby="tab_thematic_accuracy">
                                  <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                      <div class="table-responsive">
                                        <table class="table-borderless">
                                          <tbody>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_1">
                                                  <input type="radio" name="c15_t5_type" checked="">&nbsp;Classification Correctness
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_1">
                                                  <input type="radio" name="c15_t5_type">&nbsp;Non Quantitative Attribute Correctness
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_1">
                                                  <input type="radio" name="c15_t5_type">&nbsp;Quantitative Attribute Accuracy
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_1">
                                                  <b>Scope:</b>
                                                  <select name="c15_t5_classCorrect_scope" id="c15_t5_classCorrect_scope" class="form-control"> 
                                                    <option value="attribute">Aeronautical</option>
                                                    <option value="attribute_type">Built Environment</option>
                                                    <option value="collection_session">Demarcation</option>
                                                    <option value="dataset">General</option>
                                                    <option value="feature">Geology</option>
                                                    <option value="dimension_group">Hydrography</option>
                                                    <option value="feature_type">Hypsography</option>
                                                    <option value="field_session">Soil</option>
                                                    <option value="model">Special Use</option>
                                                    <option value="non_geo_date_set">Transportation</option>
                                                    <option value="prop_type">Utility</option>
                                                    <option value="service">Vegetation</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_1">
                                                  <b>Scope:</b>
                                                  <select name="c15_t5_nonQuant_scope" id="c15_t5_nonQuant_scope" class="form-control"> 
                                                    <option value="attribute">Aeronautical</option>
                                                    <option value="attribute_type">Built Environment</option>
                                                    <option value="collection_session">Demarcation</option>
                                                    <option value="dataset">General</option>
                                                    <option value="feature">Geology</option>
                                                    <option value="dimension_group">Hydrography</option>
                                                    <option value="feature_type">Hypsography</option>
                                                    <option value="field_session">Soil</option>
                                                    <option value="model">Special Use</option>
                                                    <option value="non_geo_date_set">Transportation</option>
                                                    <option value="prop_type">Utility</option>
                                                    <option value="service">Vegetation</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_1">
                                                  <b>Scope:</b>
                                                  <select name="c15_t5_quant_scope" id="c15_t5_quant_scope" class="form-control"> 
                                                    <option value="attribute">Aeronautical</option>
                                                    <option value="attribute_type">Built Environment</option>
                                                    <option value="collection_session">Demarcation</option>
                                                    <option value="dataset">General</option>
                                                    <option value="feature">Geology</option>
                                                    <option value="dimension_group">Hydrography</option>
                                                    <option value="feature_type">Hypsography</option>
                                                    <option value="field_session">Soil</option>
                                                    <option value="model">Special Use</option>
                                                    <option value="non_geo_date_set">Transportation</option>
                                                    <option value="prop_type">Utility</option>
                                                    <option value="service">Vegetation</option>
                                                  </select>
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_3">
                                                  <b>Compliance Level:</b>
                                                  <input type="text" name="c15_t5_classCorrect_comply_level" id="c15_t5_classCorrect_comply_level" class="form-control">
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_3">
                                                  <b>Compliance Level:</b>
                                                  <input type="text" name="c15_t5_nonQuant_comply_level" id="c15_t5_nonQuant_comply_level" class="form-control">
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_3">
                                                  <b>Compliance Level:</b>
                                                  <input type="text" name="c15_t5_quant_comply_level" id="c15_t5_comply_level" class="form-control">
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_5">
                                                  <b>Date:</b>
                                                  <div class="input-group date" id="c15_t5_classCorrect_date_div" data-target-input="nearest">
                                                    <input type="text" name="c15_t5_classCorrect_date" id="c15_t5_classCorrect_date" class="form-control datetimepicker-input" data-target="#c15_t5_classCorrect_date_div">
                                                    <div class="input-group-append" data-target="#c15_t5_classCorrect_date_div" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                  </div>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_5">
                                                  <b>Date:</b>
                                                  <div class="input-group date" id="c15_t5_nonQuant_date_div" data-target-input="nearest">
                                                    <input type="text" name="c15_t5_nonQuant_date" id="c15_t5_nonQuant_date" class="form-control datetimepicker-input" data-target="#c15_t5_nonQuant_date_div">
                                                    <div class="input-group-append" data-target="#c15_t5_nonQuant_date_div" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                  </div>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_5">
                                                  <b>Date:</b>
                                                  <div class="input-group date" id="c15_t5_quant_date_div" data-target-input="nearest">
                                                    <input type="text" name="c15_t5_quant_date" id="c15_t5_quant_date" class="form-control datetimepicker-input" data-target="#c15_t5_quant_date_div">
                                                    <div class="input-group-append" data-target="#c15_t5_quant_date_div" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                  </div>
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                               <label class="form-check-label" for="c3_2">
                                                  <b>Result:</b>
                                                  <select name="c15_t5_classCorrect_result" id="c15_t5_classCorrect_result" class="form-control"> 
                                                    <option value="attribute">Pass</option>
                                                    <option value="attribute_type">Fail</option>
                                                    <option value="collection_session">Not Relevant</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_2">
                                                  <b>Result:</b>
                                                  <select name="c15_t5_nonQuant_result" id="c15_t5_nonQuant_result" class="form-control"> 
                                                    <option value="attribute">Pass</option>
                                                    <option value="attribute_type">Fail</option>
                                                    <option value="collection_session">Not Relevant</option>
                                                  </select>
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_2">
                                                  <b>Result:</b>
                                                  <select name="c15_t5_quant_result" id="c15_t5_quant_result" class="form-control"> 
                                                    <option value="attribute">Pass</option>
                                                    <option value="attribute_type">Fail</option>
                                                    <option value="collection_session">Not Relevant</option>
                                                  </select>
                                                </label>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> 
                                                <label class="form-check-label" for="c3_4">
                                                  <b>Conformance Result:</b>
                                                  <input type="text" name="c15_t5_classCorrect_conform_result" id="c15_t5_classCorrect_conform_result" class="form-control">
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_4">
                                                  <b>Conformance Result:</b>
                                                  <input type="text" name="c15_t5_nonQuant_conform_result" id="c15_t5_nonQuant_conform_result" class="form-control">
                                                </label>
                                              </td>
                                              <td>
                                                <label class="form-check-label" for="c3_4">
                                                  <b>Conformance Result:</b>
                                                  <input type="text" name="c15_t5_quant_conform_result" id="c15_t5_quant_conform_result" class="form-control">
                                                </label>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div id="div_action_buttons">
                  <input type="submit" name="btn_draf" value="Simpan" class="btn btn-primary">
                  <input type="submit" name="btn_save" value="Hantar" class="btn btn-success">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.js"></script>
<script>
  // TO MAKE THE MAP APPEAR YOU MUST
  // ADD YOUR ACCESS TOKEN FROM
  // https://account.mapbox.com
  mapboxgl.accessToken = 'pk.eyJ1IjoiZmFyaGFucmkiLCJhIjoiY2tqd2p2cGtxMDJ2ODMzb3l5OTJuMjJ6ZSJ9.OsdgNMv2XB-tkWx_Ug4ivg';
  var map = new mapboxgl.Map({
      container: 'map', // container id
      style: 'mapbox://styles/mapbox/streets-v11', //hosted style id
      center: [101.68,2.91], // starting position
      zoom: 0 // starting zoom
  });

  var draw = new MapboxDraw({
      displayControlsDefault: false,
          controls: {
          polygon: true,
          trash: true
      }
  });

  var langlat = []; //coordinates of the user created polygon. currently unused.

  map.addControl(
    new MapboxGeocoder({
      accessToken: mapboxgl.accessToken,
      mapboxgl: mapboxgl
    })
  );
  map.addControl(draw);
  map.addControl(new mapboxgl.FullscreenControl());
  map.addControl(new mapboxgl.NavigationControl());
  map.on('draw.create', updateArea);
  map.on('draw.delete', updateArea);
  map.on('draw.update', updateArea);
  map.on('click', function (e) {
    langlat.push(JSON.stringify(e.lngLat.wrap()));
  });
  map.on('load', function() {
    // alert('ftest');
    // console.log(langlat);
  });

  $(document).on("click",".fixMap",function(){
    setTimeout(function() { map.resize(); }, 1500); 
  });


  function updateArea(e) {
    console.log(e);
      var data = draw.getAll();
      var answer = document.getElementById('calculated-area');
      if (data.features.length > 0) {
          var area = turf.area(data);
          // restrict to area to 2 decimal points
          var rounded_area = Math.round(area * 100) / 100;
          answer.innerHTML =
              '<p><strong>' +
              rounded_area +
              '</strong></p><p>square meters</p>';
      } else {
          answer.innerHTML = '';
          if (e.type !== 'draw.delete'){
              alert('Use the draw tools to draw a polygon!');
          }
      }
  }


  $(document).on('click','#btn_reset_map',function(){
    //delete any existing drawings
    $(".mapbox-gl-draw_trash").click();
    var mapLayer = map.getLayer('ftest');
    if(typeof mapLayer !== 'undefined') {
        map.removeLayer('ftest').removeSource('ftest');
    }
  });
  
  var pengesahs = [];
  
  $(document).ready(function(){
    $('#accordion').hide();
    <?php
    if(isset($_GET['bhs']) && $_GET['bhs'] != ""){
        ?>
        $('#kategori').show();
        $('#lbl_kategori').show();    
        <?php
    }else{
        ?>
        $('#kategori').hide();
        $('#lbl_kategori').hide();
        <?php
    }
    ?>
    <?php
    if(empty($pengesahs)){
        ?>
        alert('Tiada pengesah dari bahagian sama dijumpai');
        $('#kategori').hide();
        $('#lbl_kategori').hide();
        $("#accordion").hide();
        <?php
    }
    ?>
    $('#div_action_buttons').hide();
    $('.mapbox-gl-draw_ctrl-draw-btn.mapbox-gl-draw_trash').click(function(){ 
      //delete any existing drawings
      var mapLayer = map.getLayer('ftest');
      if(typeof mapLayer !== 'undefined') {
          map.removeLayer('ftest').removeSource('ftest');
      }
    });

    $('#c15_date_div,#c15_t1_commission_date_div,#c15_t1_omission_date_div,#c15_t2_conceptual_date_div,#c15_t2_domain_date_div,#c15_t2_format_date_div,#c15_t2_topological_date_div,#c15_t3_absExt_date_div,#c15_t3_relInt_date_div,#c15_t3_gridded_date_div,#c15_t4_accuTimeMeasure_date_div,#c15_t4_tempConsist_date_div,#c15_t4_tempValid_date_div,#c15_t5_classCorrect_date_div,#c15_t5_nonQuant_date_div,#c15_t5_quant_date_div').datetimepicker({
      // format:'DD/MM/YYYY',
      // format: 'L'
    });

    $('input:radio[name="flanguage"]').change(function() {
      if ($(this).val() == 'bm') {
        var url = '{{ url("/mygeo_pengisian_metadata") }}';    
        url += '?bhs=bm'
        window.location.href = url;
      } else if ($(this).val() == 'en') {
        var url = '{{ url("/mygeo_pengisian_metadata") }}';    
        url += '?bhs=en'
        window.location.href = url;
      }
    });

    <?php
    if(count($categories) > 0){
      $type = (isset($metadata->hierarchyLevel->MD_ScopeCode) ? $metadata->hierarchyLevel->MD_ScopeCode:"");
      if(isset($type) && $type != "" && (strtolower($type) == "dataset" || strtolower($type) == "services")){
        ?>
        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
        <?php
      }elseif(isset($type) && $type != "" && (strtolower($type) == "imagery" || strtolower($type) == "gridded")){
        ?>
        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
        <?php
      }
    }
    ?>
    
    
    <?php
    /*
    if(count($pengesahs) > 0){
        foreach($pengesahs as $p){
            ?>pengesahs[<?php echo $p->id; ?>] = <?php echo $p; ?>;<?php
        }
    }
    */
    ?>
  });
  
  /* following block only used if there are many pengesahs
  $(document).on('change','#pengesahs',function(){
    var pengesah_id = $(this).val();
    $("#c2_contact_name").val(pengesahs[pengesah_id].name); 
    $("#c2_contact_agensiorganisasi").val(pengesahs[pengesah_id].agensi_organisasi); 
    $("#c2_contact_address1").val(pengesahs[pengesah_id].alamat); 
//    $("#c2_contact_address2").val(pengesahs[pengesah_id].name); 
//    $("#c2_contact_address3").val(pengesahs[pengesah_id].name); 
//    $("#c2_contact_address4").val(pengesahs[pengesah_id].name); 
//    $("#c2_contact_state").val(pengesahs[pengesah_id].name); 
//    $("#c2_contact_country").val(pengesahs[pengesah_id].name); 
    $("#c2_contact_email").val(pengesahs[pengesah_id].email); 
    $("#c2_contact_fax").val(pengesahs[pengesah_id].phone_pejabat); 
    $("#c2_contact_phone_office").val(pengesahs[pengesah_id].phone_pejabat); 
//    $("#c2_contact_website").val(pengesahs[pengesah_id].name); 
  });
*/

  $(document).on('change','#kategori',function(){
    var kategori = $(this).val();
    if(kategori.toLowerCase() == "dataset" || kategori.toLowerCase() == "services"){
      $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
      $('#accordion').show();
      $('#div_action_buttons').show();
    }else if(kategori.toLowerCase() == "imagery" || kategori.toLowerCase() == "gridded"){
      $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
      $('#accordion').show();
      $('#div_action_buttons').show();
    }
  });

  //user submitted coordinates
  $(document).on('click','#btn_set_area',function(){
    //delete any existing drawings
    var mapLayer = map.getLayer('ftest');
    if(typeof mapLayer !== 'undefined') {
        map.removeLayer('ftest').removeSource('ftest');
    }

    //check if inputs are empty
    var wbl = $("#west_bound_longitude").val();
    var ebl = $("#east_bound_longitude").val();
    var sbl = $("#south_bound_latitude").val();
    var nbl = $("#north_bound_latitude").val();
    if (wbl == null || wbl == "", ebl == null || ebl == "", sbl == null || sbl == "", nbl == null || nbl == "") {
      alert("Isi semua maklumat Longitude dan Latitude");
      return false;
    }

    //add preloaded points to map
    var polygon2 = {
      "type": "FeatureCollection",
      "features": [
        {
          "type": "Feature",
          "properties": {},
          "geometry": {
            "type": "Polygon",
            "coordinates": [[
              wbl.split(","),sbl.split(","),ebl.split(","),nbl.split(","),
              //sample box values (order following frontend inputs top to bottom): "0,30","-30,-30","-30,30","0,-30"
            ]]
          }
        }
      ]
    };

    var ts = Date.now();
    map.addSource('ftest', {
      'type': 'geojson',
      'data': polygon2     
    });
    map.addLayer({
      'id': 'ftest',
      'type': 'fill',
      'source': 'ftest',
      'layout': {},
      'paint': {
        'fill-color': 'rgba(128, 255, 0,0.9)',
        'fill-opacity': 0.6
      }
    });

    var longcenter = ebl.replace(',','.') + ((ebl.replace(',','.') - (wbl.replace(',','.'))) / 2);
    var latcenter = nbl.replace(',','.') + ((nbl.replace(',','.') - (sbl.replace(',','.'))) / 2); //SMBG SINI check if north or south is bigger
    console.log(longcenter,latcenter);

    // map.flyTo({
    //   center: [
    //   longcenter,
    //   latcenter
    //   ],
    //   essential: true // this animation is considered essential with respect to prefers-reduced-motion
    // });



    //calculate area of preloaded points=================
    var area = turf.area(polygon2);
    var rounded_area = Math.round(area * 100) / 100;
    var answer = document.getElementById('calculated-area');
    answer.innerHTML =
        '<p><strong>' +
        rounded_area +
        '</strong></p><p>square meters</p>';
  });
  /*
  */
</script>
@stop
