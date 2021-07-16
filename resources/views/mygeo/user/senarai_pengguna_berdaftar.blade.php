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
                <h3 class="card-title" style="font-size: 2rem;">Senarai pengguna berdaftar</h3>
                @if(auth::user()->hasRole(['Pentadbir Aplikasi']))
                    <a href="{{ url('pemindahan_akaun') }}">
                        <button type="button" class="btn btn-default float-right">Pemindahan Akaun</button>
                    </a>
                @endif
              </div>
              <div class="card-body">
                <table id="table_newUsers" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Bil</th>
                      <th>Nama</th>
                      <th>Agensi</th>
                      <th>Peranan</th>
                      <th>Status</th>
                      <th>Butiran</th>
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
                        <td>{{ ($user->status == "0" ? "Disabled":"Active") }}</td>
                        <td>
                          <button type="button" data-toggle="modal" data-target="#modal-butiran" class="butiran form-control" data-userid="{{ $user->id }}">Butiran</button>
                          <button type="button" class="btnStatus form-control" data-userid="{{ $user->id }}" data-statusid="1">Activate</button>
                          <button type="button" class="btnStatus form-control" data-userid="{{ $user->id }}" data-statusid="0">Disable</button>
                        </td>
                      </tr>
                      <?php
                      $bil++;
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
        "ordering": false,
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
      
      $(document).on("click",".btnStatus",function(){
        $user_id = $(this).data('userid');
        $status_id = $(this).data('statusid');
        $.ajax({
            method: "POST",
            url: "change_user_status",
            data: { "_token": "{{ csrf_token() }}", "user_id": $user_id, "status_id": $status_id },
        })
        .done(function(response) {
            location.reload();
        });
      });
    });
  </script>

@stop