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
              <div class="card-header">
                <h3 class="card-title" style="font-size: 2rem;">Senarai Semakan Metadata</h3>
                <button type="button" class="btn btn-secondary float-right btn_lulus_multi">Lulus</button>
              </div>
              <div class="card-body">
                <table id="table_metadatas" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Bil</th>
                      <th>Nama Metadata</th>
                      <th>Kategori</th>
                      <th>Tarikh</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil = 1;
                    if(count($metadatas) > 0){
                      foreach($metadatas as $key=>$val){
                        ?>
                        <tr>
                          <td><input type="checkbox" class="checkbox_metadatas" name="checkbox_metadatas" value="{{ $key }}"></td>
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
                                    if(isset($val[1]->createdate) && $val[1]->createdate != ""){
                                        echo date('d-m-Y',strtotime($val[1]->createdate));
                                    }
                                ?>
                          </td>
                          <td>
                                <?php //sahkan(kemaskini)======================================= ?>
                                <a href="{{ url('/kemaskini_metadata/'.$key) }}">
                                    <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:3px;">Semak</button>
                                </a>
                                <button type="button" class="btn btn-danger btn_tolak btn-sm" data-metadataid="{{ $key }}">Tolak</button>
                                <button type="button" class="btn btn-success btn_sahkan btn-sm" data-metadataid="{{ $key }}">Sahkan</button>
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
    var checked_metadatas = [];
    var table_metadatas = $("#table_metadatas").DataTable({
      "responsive": true,
      "autoWidth": false,
      "drawCallback": function( settings ) {
        $(".checkbox_metadatas").on("click",function(){
            if($(this).is(":checked")){
              checked_metadatas.push($(this).val())
            }else{
              for (var i = 0; i < checked_metadatas.length; i++){
                if (checked_metadatas[i] === $(this).val()) { 
                    checked_metadatas.splice(i, 1);
                    break;
                }
              }
            }
        });
      },
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
    
    $(document).on("click",".btn_sahkan",function(){
      if(confirm("Adakah anda pasti untuk mengesahkan metadata ini?")){
        // ajax sahkan metadata
        var metadata_id = $(this).data('metadataid');
        $.ajax({
            method: "POST",
            url: "metadata_sahkan",
            data: { "_token": "{{ csrf_token() }}", "metadata_id": metadata_id },
        })
        .done(function(response) {
          alert("Metadata berjaya disahkankan.");
          location.reload();
        });
      }
    }); 

    $(document).on("click",".btn_tolak",function(){
      if(confirm("Adakah anda pasti untuk menolak metadata ini?")){
        // ajax tolak metadata
        var metadata_id = $(this).data('metadataid');
        $.ajax({
            method: "POST",
            url: "metadata_tidak_disahkan",
            data: { "_token": "{{ csrf_token() }}", "metadata_id": metadata_id },
        })
        .done(function(response) {
          alert("Metadata berjaya ditolak.");
          location.reload();
        });
      }
    });

    $(document).on("click",".btn_lulus_multi",function(){
      var checkbox_metadatas = [];

      if (checked_metadatas.length === 0) {
        alert("Sila pilih sekurang-kurangnya satu metadata.");
      }else{
        if(confirm("Adakah anda pasti untuk mengesahkan pilihan metadata ini?")){
          //ajax sahkan metadata
          $.ajax({
              method: "POST",
              url: "metadata_sahkan",
              data: { "_token": "{{ csrf_token() }}", "metadata_id": checked_metadatas },
          }).done(function(response) {
            alert("Metadata berjaya disahkan.");
            location.reload();
          });
        }
      }
    });
  });
</script>
@stop
