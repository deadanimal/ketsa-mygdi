@extends('layouts.app_mygeo_afiq')

@section('content')

  <style>
    .ftest{
      display:inline;
      width:auto;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
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
                <h3 class="card-title" style="font-size: 2rem;">Pengesahan Penerbit dan Pengesah Metadata</h3>
                <button type="button" class="btn btn-default float-right">Kemas Kini</button>
              </div>
              <div class="card-body">
                  <div style="overflow-x:auto;">
                <table id="table_newUsers" class="table table-bordered table-striped" style="overflow: auto;">
                  <thead>
                    <tr>
                      <th>Bil</th>
                      <th>Nama Metadata</th>
                      <th>Agensi</th>
                      <th>Peranan</th>
                      <th>Butiran</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $bil = 1;
                    foreach($users as $user){
                      ?>
                      <tr>
                        <td>{{ $bil }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->agensi_organisasi }}</td>
                        <td>
                          <?php
                          if(count($user->getRoleNames()) > 0){
                            foreach($user->getRoleNames() as $role){
                              echo $role."<br>";
                            }
                          }
                          ?>
                        </td>
                        <td>
                          <button type="button" data-toggle="modal" data-target="#modal-butiran" class="butiran form-control" data-userid="{{ $user->id }}">Butiran</button>
                        </td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-success btn_lulus" data-userid="{{ $user->id }}">Lulus</button>
                            <button type="button" class="btn btn-danger btn_tolak" data-userid="{{ $user->id }}">Tolak</button>
                          </div>
                        </td>
                      </tr>
                      <?php
                      $bil++;
                    }
                    ?>
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th>Bil</th>
                      <th>Nama Metadata</th>
                      <th>Agensi</th>
                      <th>Peranan</th>
                      <th>Butiran</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot> -->
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="modal-butiran">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Maklumat Pengguna</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card-body modal_user_detail">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between1">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(function () {
      $("#table_newUsers").DataTable({
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

      $(document).on("click",".butiran",function(){
        // ajax get user details
        $user_id = $(this).data('userid');
        $.ajax({
            method: "POST",
            url: "get_user_details",
            data: { "_token": "{{ csrf_token() }}", "user_id": $user_id },
        })
        .done(function(response) {
            $('.modal_user_detail').html(response);
        });
      });

      $(document).on("click",".btn_lulus",function(){
        if(confirm("Adakah anda pasti untuk meluluskan pendaftaran?")){
          // ajax sahkan user
          $user_id = $(this).data('userid');
          $.ajax({
              method: "POST",
              url: "user_sahkan",
              data: { "_token": "{{ csrf_token() }}", "user_id": $user_id },
          })
          .done(function(response) {
            alert("Pengguna berjaya didaftarkan.");
            location.reload();
          });
        }
      });

      $(document).on("click",".btn_tolak",function(){
        if(confirm("Adakah anda pasti untuk menolak pendaftaran?")){
          // ajax sahkan user
          $user_id = $(this).data('userid');
          $.ajax({
              method: "POST",
              url: "user_pengesahan_ditolak",
              data: { "_token": "{{ csrf_token() }}", "user_id": $user_id },
          })
          .done(function(response) {
            alert("Pendaftaran ditolak.");
            location.reload();
          });
        }
      });
    });
  </script>

@stop
