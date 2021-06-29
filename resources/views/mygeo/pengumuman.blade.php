@extends('layouts.app_mygeo_afiq')

@section('content')
<style>
  #form-container {
  width: 500px;
}

.row {
  margin-top: 15px;
}
.row.form-group {
  padding-left: 15px;
  padding-right: 15px;
}
.btn {
  margin-left: 15px;
}

.change-link {
  background-color: #000;
  border-bottom-left-radius: 6px;
  border-bottom-right-radius: 6px;
  bottom: 0;
  color: #fff;
  opacity: 0.8;
  padding: 4px;
  position: absolute;
  text-align: center;
  width: 150px;
}
.change-link:hover {
  color: #fff;
  text-decoration: none;
}

img {
  width: 150px;
}

#editor-container {
  height: 130px;
}
</style>
      
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <form method="post" class="form-horizontal" action="{{url('simpan_portal_settings')}}" id="form_portal_settings">
          @csrf  
          <input type="hidden" name="content_panduan_pengguna" id="content_panduan_pengguna">
          <input type="hidden" name="content_hubungi_kami" id="content_hubungi_kami">
          <input type="hidden" name="content_penafian" id="content_penafian">
          <input type="hidden" name="content_penyataan_privasi" id="content_penyataan_privasi">
          <input type="hidden" name="content_faq" id="content_faq">
         
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0 col-lg-12">Pengumuman</h5>
                </div>
                <div class="card-body">
                  <table id="table_pengumuman" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bil</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($pengumuman as $umum){
                        ?>
                        <tr>
                          <td>{{ $umum->id }}</td>
                          <td>{{ $umum->title }}</td>
                          <td>{{ $umum->date }}</td>
                          <td>
                            <form id="form_umum_show_{{ $umum->id }}" method="post" action="{{ url('/mygeo_tunjuk_pengumuman') }}">
                              @csrf
                              <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                              <button type="submit" class='form-control'>View</button>
                            </form>
                            <form id="form_umum_edit_{{ $umum->id }}" method="post" action="{{ url('/mygeo_kemaskini_pengumuman') }}">
                              @csrf
                              <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                              <button type="submit" class='form-control'>Edit</button>
                            </form>
                            <form id="form_umum_delete_{{ $umum->id }}" method="post" action="{{ url('/mygeo_buang_pengumuman') }}">
                              @csrf
                              <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                              <button type="submit" class='form-control'>Delete</button>
                            </form>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Bil</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <button type="button" id="btn_submit" class="form-control">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function(){
    $(document).on("click","#btn_submit",function(){
      $("#content_panduan_pengguna").val($("#content_panduan_pengguna_input > .ql-editor").html());
      $("#content_hubungi_kami").val($("#content_hubungi_kami_input > .ql-editor").html());
      $("#content_penafian").val($("#content_penafian_input > .ql-editor").html());
      $("#content_penyataan_privasi").val($("#content_penyataan_privasi_input > .ql-editor").html());
      $("#content_faq").val($("#content_faq_input > .ql-editor").html());
      $("#form_portal_settings").submit();
    });

    $("#table_pengumuman").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

@stop