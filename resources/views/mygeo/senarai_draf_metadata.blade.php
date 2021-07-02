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
                <div class="modal fade" id="modal-carian-tambahan">
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
                    <p>Cari Metadata :</p>
                    <input type="text" name="carian" id="carian" class="form-control">
                  </div>
                  <p>
                    <!--<a href="#" id="carian_tambahan" data-toggle="modal" data-target="#modal-carian-tambahan">Carian Tambahan >></a>-->
                  </p>
                </div>
                <button type="submit" class="form-control">Cari Metadata</button>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="font-size: 2rem;">Senarai Draf Metadata</h3>
                <!-- <button type="button" class="btn btn-default float-right">Kemas Kini</button> -->
              </div>
              <div class="card-body">
                <table id="table_metadatas" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Bil</th>
                      <th>Nama Metadata</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil = 1;
                    if(count($drafts) > 0){
                      foreach($drafts as $key=>$val){
                          if(isset($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString)){
//                              echo "<pre>";var_dump($metadata->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString);echo "</pre>";
                          }
                        ?>
                        <tr>
                          <td>{{ $bil }}</td>
                          <td>
                              <?php
                                if(isset($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
                                   echo $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                               }
                               ?>
                          </td>
                          <td>
                              <form method="post" action="{{ url('/lihat_draf_metadata') }}">
                                  @csrf
                                  <input type="hidden" name="metadata_id" value="{{ $key }}">
                                <button type="submit" class="btn btn-primary">Lihat</button>
                              </form>
                              <!--<button type="button" class="btn btn-primary">Delete</button>-->
                          </td>
                        </tr>
                        <?php
                        $bil++;
                      }
                    }
                    ?>
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th>Bil</th>
                      <th>Nama Metadata</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot> -->
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
  });
</script>
@stop
