@extends('layouts.app_mygeo_afiq')

@section('content')

  <style>

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form method="post" class="form-horizontal" action="{{url('carian_metadata')}}" id="form_carian">
                @csrf
                <!--===== MODALS START =====-->
                <div class="modal fade" id="modal-carian-tabahan">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Carian Tambahan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Maklumat Kandungan (Content Type)</label>
                                    <select name="content_type" id="content_type" class="form-control" autofocus>
                                      <option selected disabled>Pilih</option>
                                      <option value="application">Application</option>
                                      <option value="document">Document</option>
                                      <option value="gisActivityProject">GIS Activity/Project</option>
                                      <option value="theMap">Map</option>
                                      <option value="rasterData">Raster Data</option>
                                      <option value="services">Services</option>
                                      <option value="software">Software</option>
                                      <option value="vectorData">Vector Data</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Data (Topic Category)</label>
                                    <select name="topic_category[]" id="topic_category" class="form-control" multiple>
                                      <option value="biota">Biota</label>
                                      <option value="boundaries">Boundaries</label>
                                      <option value="climatology meteorology atmosphere">Climatology Meteorology Atmosphere</label>
                                      <option value="disaster">Disaster</label>
                                      <option value="economy">Economy</label>
                                      <option value="elevation">Elevation</label>
                                      <option value="environment">Environment</label>
                                      <option value="farming">Farming</label>
                                      <option value="geoscientific information">Geoscientific Information</label>
                                      <option value="health">Health</label>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tarikh Mula</label>
                                    <div class="input-group date" id="tarikh_mula_div" data-target-input="nearest">
                                        <input type="text" name="tarikh_mula" id="tarikh_mula" class="form-control datetimepicker-input" data-target="#tarikh_mula_div">
                                        <div class="input-group-append" data-target="#tarikh_mula_div" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tarikh Tamat</label>
                                    <div class="input-group date" id="tarikh_tamat_div" data-target-input="nearest">
                                        <input type="text" name="tarikh_tamat" id="tarikh_tamat" class="form-control datetimepicker-input" data-target="#tarikh_tamat_div">
                                        <div class="input-group-append" data-target="#tarikh_tamat_div" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between1">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                        </div>
                    </div>
                  </div>
                </div>
                <!--===== MODALS END =====-->
                
                <div class="card-body">
                  <div class="form-group row">
                    <p>Carian Metadata :</p>
                    <input type="text" name="carian" id="carian" class="form-control">
                  </div>
                  <p>
                    <!--<a href="#" id="carian_tambahan" data-toggle="modal" data-target="#modal-carian-tabahan">Carian Tambahan >></a>-->
                  </p>
                  <div class="row">
                    <button type="submit" class="btn btn-primary">Carian Metadata</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="font-size: 2rem;">Senarai Metadata</h3>
                <!-- <button type="button" class="btn btn-default float-right">Kemas Kini</button> -->
              </div>
              <div class="card-body">
                <table id="table_metadatas" class="table table-bordered table-striped">
                    <colgroup>
                        <col span="1" style="width: 10%;">
                        <col span="1" style="width: 40%;">
                        <col span="1" style="width: 25%;">
                        <col span="1" style="width: 25%;">
                     </colgroup>
                  <thead>
                    <tr>
                      <th>Bil</th>
                      <th>Nama Metadata</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil = 1;
                    if(count($metadatas) > 0){
                      foreach($metadatas as $key=>$val){
                          if(isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString)){
//                              echo "<pre>";var_dump($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString);echo "</pre>";
                          }
                        ?>
                        <tr>
                          <td>{{ $bil }}</td>
                          <td>
                              <?php
                                if(isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
                                   echo $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                               }
                               ?>
                          </td>
                          <td>
                              <?php
                              if($val[2] == 'draft'){
                                  ?>Draf<?php
                              }else{ 
                                if($val[1]->disahkan == 'yes'){
                                    ?>Diterbitkan<?php
                                }elseif($val[1]->disahkan == 'no'){
                                    ?>Perlu Pembetulan<?php
                                }elseif($val[1]->disahkan == '0' || $val[1]->disahkan == ''){
                                    ?>Perlu Pengesahan<?php
                                }
                              }
                              ?>
                          </td>
                          <td>
                                <?php /*
                                <a href="javascript:void(0)" class="text-green">
                                    <i class="fas fa-eye mr-3"></i>
                                </a>
                                */ ?>
                                <?php 
                                //lihat(view only)================================
                                if($val[2] == 'draft'){
                                    ?>
                                    <form method="post" action="{{ url('/lihat_metadata') }}">
                                        @csrf
                                        <input type="hidden" name="metadata_type" value="draf">
                                        <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:3px;">Lihat</button>
                                    </form>
                                    <?php
                                }else{
                                    ?>
                                    <form method="post" action="{{ url('/lihat_metadata') }}">
                                        @csrf
                                        <input type="hidden" name="metadata_type" value="not_draf">
                                        <input type="hidden" name="metadata_id" value="{{ $key }}">
                                        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:3px;">Lihat</button>
                                    </form>
                                    <?php
                                }
                                //kemaskini=======================================
                                if($val[2] == 'draft'){
                                    ?>
                                    <form method="post" action="{{ url('/kemaskini_draf_metadata') }}">
                                        @csrf
                                 
                                        <input type="hidden" name="metadata_type" value="draf">
                                        <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:3px;">Edit</button>
                                    </form>
                                    <?php 
                                }else{
                                    ?>
                                    <form method="post" action="{{ url('/kemaskini_metadata') }}">
                                        @csrf
                                        <input type="hidden" name="metadata_type" value="not_draf">
                                        <input type="hidden" name="metadata_id" value="{{ $key }}">
                                        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:3px;">Edit</button>
                                    </form>
                                    <?php
                                }
                                //delete==========================================
                                if($val[2] == 'draft'){
                                    ?>
                                    <form method="post" action="{{ url('/delete_draf_metadata') }}">
                                        @csrf
                                        <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                        <button type="button" class="btn btn-danger btn-sm btnDelete" style="margin-bottom:3px;">Delete</button>
                                    </form>
                                    <?php
                                }else{
                                    ?>
                                    <form method="post" action="{{ url('/delete_metadata') }}">
                                        @csrf
                                        <input type="hidden" name="metadata_id" value="{{ $key }}">
                                        <button type="button" class="btn btn-danger btn-sm btnDelete" style="margin-bottom:3px;">Delete</button>
                                    </form>
                                    <?php
                                }
                                ?>
                          </td>
                        </tr>
                        <?php
                        $bil++;
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script>  
  $(document).ready(function(){
    $("#table_metadatas").DataTable({
      "responsive": true,
      "autoWidth": false,
      "oLanguage": {
        "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
        "sEmptyTable": "Tiada rekod ditemui",
         "sZeroRecords": "Tiada rekod ditemui",
        "sLengthMenu": "Papar _MENU_ rekod",
        "sLoadingRecords": "Sila tunggu...",
        "sSearch": "Carian:",
        "oPaginate": {
           "sFirst": "Pertama",
           "sLast": "Terakhir",
           "sNext": ">",
           "sPrevious": "<",
         }
      }
    });

    $('#tarikh_mula_div,#tarikh_tamat_div').datetimepicker({
      format:'DD-MM-YYYY H:mm:ss',
      // format: 'L'
    });
    
    $(document).on('click','.btnDelete',function(){
        var conf = confirm('Adakah anda pasti untuk buang metadata ini?');
        if (conf) {
          $(this).parent().submit();
        }
    });
  });
</script>
@stop
