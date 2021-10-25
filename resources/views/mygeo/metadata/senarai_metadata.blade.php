@extends('layouts.app_mygeo_ketsa')

@section('content')
<style>
    thead input {
        width: 100%;
    }
    </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Senarai Metadata</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Senarai Metadata
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Senarai Metadata</h3>
                        </div>
                        <div class="col-4 text-right">
                        </div>
                    </div>
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
                                if(isset($val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
                                   echo $val[0]->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                               }elseif(isset($val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $val[0]->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
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
                                   if(isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != ""){
                                      echo $val[0]->hierarchyLevel->MD_ScopeCode;
                                  }
                                  ?>
                             </td>
                                <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
                                        $status = "Perlu Pengesahan";
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                            <td <?php echo $style; ?>>
                                <?php echo $status; ?>
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
                                   if(isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != ""){
                                      echo $val[0]->hierarchyLevel->MD_ScopeCode;
                                  }
                                  ?>
                             </td>
                             <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
                                        $status = "Perlu Pengesahan";
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                            <td <?php echo $style; ?>>
                                <?php echo $status; ?>
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
                                   if(isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != ""){
                                      echo $val[0]->hierarchyLevel->MD_ScopeCode;
                                  }
                                  ?>
                             </td>
                             <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
                                        $status = "Perlu Pengesahan";
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                             <td <?php echo $style; ?>>
                                <?php echo $status; ?>
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
                                   if(isset($val[0]->hierarchyLevel->MD_ScopeCode) && $val[0]->hierarchyLevel->MD_ScopeCode != ""){
                                      echo $val[0]->hierarchyLevel->MD_ScopeCode;
                                  }
                                  ?>
                             </td>
                             <?php
                                $status = $style = "";
                                if($val[1]->is_draf == 'yes'){
                                  $status = "Draf";
                                }else{
                                    if($val[1]->disahkan == '0'){
                                        $status = "Perlu Pengesahan";
                                    }elseif($val[1]->disahkan == 'yes'){
                                        $status = "Diterbitkan";
                                    }elseif($val[1]->disahkan == 'no'){
                                        $style = 'style="background-color:#FFD1D1;"';
                                        $status = '<span style="color:red;"><strong>Perlu Pembetulan</strong></span>';
                                    }elseif($val[1]->disahkan == 'delete'){
                                        $status = "Dipadam";
                                    }
                                }
                                ?>
                             <td <?php echo $style; ?>>
                                <?php echo $status; ?>
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
                  
                  <?php
                                    $numCol = 3;
                                    $rowCount = 0;
                                    $rows = 5;
                                    $bil = 1;
                                    if (count($metadatas) > 0) {
                                        foreach ($metadatas as $key => $val) {
                                            if ($rowCount % $numCol == 0) { ?>
                                                <div class="row">
                                                <?php }
                                                        $rowCount++ ?>

                                                <?php //=== collapse1 =============================================================
                                                        ?>
                                                <div class="col-4">
                                                    <div class="card card-primary" id="divParentCollapse{{ $bil }}">
                                                        <div class="card-header cardw">
                                                            <a class="a_title" data-toggle="collapse" href="#divCollapse{{ $bil }}">
                                                                <?php
                                                                if (isset($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != "") {
                                                                  echo $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                                                }else{
                                                                    ?>--no title set--<?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $abstract = "";
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->abstract) && $val->identificationInfo->SV_ServiceIdentification->abstract != ""){
                                                                    $abstract = trim($val->identificationInfo->SV_ServiceIdentification->abstract);
                                                                }
                                                                ?>
                                                                <p style="white-space: normal;width:100%;height:50px;overflow: hidden;"><?php echo (strlen($abstract) > 225 ? substr($abstract, 0, 225) . "..." : $abstract); ?></p>
                                                            </a>
                                                            <?php /* @include('abstract') */ ?>
                                                        </div>
                                                        <div id="divCollapse{{ $bil }}" class="panel-collapse collapse in" data-parent="#divParentCollapse{{ $bil }}">
                                                            <div class="card-body">
                                                                <input class="p_abstract" type="hidden" value="{{ $abstract }}">
                                                                <form method="post" action="{{ url('/lihat_metadata_nologin') }}" id="formViewMetadata{{ $key }}" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <form method="post" action="{{ url('/lihat_xml_nologin') }}" id="formViewXml{{ $key }}" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <a href="#" class="btn btn-sm btn-primary metadataActionLinks aViewMetadata col-12 mb-2" onClick="return false;" data-metid="{{$key}}">Perincian Metadata</a><br>
                                                                <a href="#" class="btn btn-sm btn-warning metadataActionLinks aViewXml col-12 mb-2" onClick="return false;" data-metid="{{$key}}">Metadata (XML)</a><br>
                                                                <?php
                                                                $url = "";
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString)){
                                                                    $url = $val->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString;   
                                                                }elseif(isset($val->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString)){
                                                                    $url = $val->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString;   
                                                                }
                                                                if(trim($url) != ""){
                                                                    ?>
                                                                    <a href="#" class="btn btn-sm btn-success metadataActionLinks aViewMap col-12 mb-2" onClick="return false;" data-metid="{{$key}}" data-toggle="modal" data-target="#modal-showmap" data-mapurl="{{ $url }}" data-backdrop="false">Show map</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $website = (isset($val->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) ? $val->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL : "");
                                                                if(trim($website) != ""){
                                                                    ?>
                                                                    <a href="{{ $website }}" class="btn btn-sm btn-default metadataActionLinks col-12 mb-2" target="_blank">Website</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($rowCount % $numCol == 0) { ?>
                                                </div>
                                            <?php } ?>

                                    <?php
                                            $bil++;
                                        }
                                    }
                                    ?>
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
