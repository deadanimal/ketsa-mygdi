@extends('layouts.app_mygeo_afiq')

@section('content')
<style>
    thead input {
        width: 100%;
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
                  <div style="overflow-x:auto;">
                <table id="table_metadatas" class="table table-bordered table-striped" style="overflow: auto;">
                  <thead>
                    <tr>
                        @if(auth::user()->hasRole(['Pengesah Metadata']))
                            <th>Bil</th>
                            <th>Nama Metadata</th>
                            <th>Nama Penerbit</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tarikh</th>
                            <th>Tindakan</th>
                        @elseif(auth::user()->hasRole(['Pentadbir Metadata']))
                            <th>Bil</th>
                            <th>Nama Metadata</th>
                            <th>Nama Penerbit</th>
                            <th>Nama Agensi</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tarikh</th>
                            <th>Tindakan</th>
                        @elseif(auth::user()->hasRole(['Penerbit Metadata','Pentadbir Aplikasi']))
                            <th>Bil</th>
                            <th>Metadata</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tarikh</th>
                            <th>Tindakan</th>
                        @else
                            <th>Bil</th>
                            <th>Metadata</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        @endif
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
                          @if(Auth::user()->hasRole(['Pengesah Metadata'])) 
                              <?php //################################## ?>                          
                          <td>
                            {{ (isset($val[2]->name) ? $val[2]->name:"") }}
                          </td>
                            <td>
                                <?php
                                   if(isset($val[0]->categoryTitle->categoryItem->CharacterString) && $val[0]->categoryTitle->categoryItem->CharacterString != ""){
                                      echo $val[0]->categoryTitle->categoryItem->CharacterString;
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
                          <td>
                              {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
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
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @elseif(auth::user()->hasRole(['Pentadbir Metadata']))
                             <?php //################################## ?>                          
                         <td>
                              {{ (isset($val[2]->name) ? $val[2]->name:"") }}
                          </td>
                         <td>
                              {{ (isset($val[2]->agensiOrganisasi->name) ? $val[2]->agensiOrganisasi->name:"") }}
                          </td>
                            <td>
                                <?php
                                   if(isset($val[0]->categoryTitle->categoryItem->CharacterString) && $val[0]->categoryTitle->categoryItem->CharacterString != ""){
                                      echo $val[0]->categoryTitle->categoryItem->CharacterString;
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
                          <td>
                              {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
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
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @elseif(auth::user()->hasRole(['Penerbit Metadata','Pentadbir Aplikasi']))
                             <?php //################################## ?>                          
                            <td>
                                <?php
                                   if(isset($val[0]->categoryTitle->categoryItem->CharacterString) && $val[0]->categoryTitle->categoryItem->CharacterString != ""){
                                      echo $val[0]->categoryTitle->categoryItem->CharacterString;
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
                          <td>
                              {{ date('d/m/Y',strtotime($val[1]->createdate)) }}
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
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @else 
                             <?php //################################## ?>                          
                            <td>
                                <?php
                                   if(isset($val[0]->categoryTitle->categoryItem->CharacterString) && $val[0]->categoryTitle->categoryItem->CharacterString != ""){
                                      echo $val[0]->categoryTitle->categoryItem->CharacterString;
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
                                <form method="post" action="{{ url('/delete_metadata') }}">
                                    @csrf
                                    <input type="hidden" name="metadata_id" value="{{ $val[1]->id }}">
                                    <button type="button" class="btn btn-sm btn-danger btnDelete mr-2" style="margin-bottom:3px;"><i class="fas fa-trash"></i></button>
                                </form>
                              </div>
                          </td>
                         @endif
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
      </div>
    </section>
  </div>
  
<script>
  $(document).ready(function(){
    var table = $("#table_metadatas").DataTable({
        "orderCellsTop": true,
      "ordering": false,
      "responsive": false,
      "autoWidth": true,
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
    });
    
    // Setup - add a text input to each footer cell
    $('#table_metadatas thead tr').clone(true).appendTo('#table_metadatas thead');
    $('#table_metadatas thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search '+title+'" class="form-control"/>');
        $('input',this).on('keyup change', function(){
            if(table.column(i).search() !== this.value){
                table.column(i).search(this.value).draw();
            }
        });
    });

    $('#tarikh_mula_div,#tarikh_tamat_div').datetimepicker({
      format:'DD-MM-YYYY H:mm:ss',
      // format: 'L'
    });

    $(document).on('click','.btnDelete',function(){
        var conf = confirm('Anda pasti untuk menghapus metadata?');
        if (conf) {
          $(this).parent().submit();
        }
    });
  });
</script>
@stop
