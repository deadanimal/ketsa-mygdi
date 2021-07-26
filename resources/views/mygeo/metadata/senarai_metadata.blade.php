@extends('layouts.app_mygeo_afiq')

@section('content')
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
              <div class="card-header">
                <h3 class="card-title" style="font-size: 2rem;">Senarai Metadata</h3>
              </div>
              <div class="card-body">
                <table id="table_metadatas" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Bil</th>
                      <th>Metadata</th>
                      <th>Kategori</th>
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
                          }
                        ?>
                        <tr>
                          <td>{{ $bil }}</td>
                          <td>
                              <?php
                                if(isset($val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                                   echo $val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                               }
                               ?>
                          </td>
                          <td>
                             <?php
                                if(isset($val[0]->categoryTitle) && $val[0]->categoryTitle != ""){
                                   echo $val[0]->categoryTitle;
                               }
                               ?>
                          </td>
                          <td>
                                <?php
                                if($val[1]->is_draf == 'yes'){
                                  ?>Draf<?php
                                }else{
                                    if($val[1]->disahkan == '0'){
                                        ?>Perlu Pengesahan<?php
                                    }elseif($val[1]->disahkan == 'yes'){
                                        ?>Diterbitkan<?php
                                    }elseif($val[1]->disahkan == 'no'){
                                        ?>Perlu Pembetulan<?php
                                    }elseif($val[1]->disahkan == 'delete'){
                                        ?>Dipadam<?php
                                    }
                                }
                                ?>
                          </td>
                          <td class="pr-1">
                            <div class="form-inline">
                                <?php //lihat(view only)================================ ?>
                                <form method="post" action="{{ url('/lihat_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-bottom:3px;"><i class="fas fa-eye"></i></button>
                                </form>
                                <?php //kemaskini======================================= ?>
                                <a href="{{ url('/kemaskini_metadata/'.$val[1]->id) }}">
                                    <button type="button" class="btn btn-sm btn-success mr-2" style="margin-bottom:3px;"><i class="fas fa-edit"></i></button>
                                </a>
                                <?php //delete========================================== ?>
                                <form method="post" action="{{ url('/delete_draf_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
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
      },
      "columns": [
        { "width": "5%" },
        { "width": "50%" },
        { "width": "15%" },
        { "width": "10%" },
        { "width": "15%" },
      ]
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
