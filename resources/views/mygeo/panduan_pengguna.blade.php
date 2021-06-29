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
        <form method="post" class="form-horizontal" action="{{url('simpan_panduan_pengguna')}}" id="form_portal_settings">
          @csrf  
          <input type="hidden" name="content_panduan_pengguna" id="content_panduan_pengguna">
          <input type="hidden" name="content_hubungi_kami" id="content_hubungi_kami">
          <input type="hidden" name="content_penafian" id="content_penafian">
          <input type="hidden" name="content_penyataan_privasi" id="content_penyataan_privasi">
          <input type="hidden" name="id_panduan_pengguna" id="content_faq" value="{{ (isset($panduan_pengguna->id) ? $panduan_pengguna->id:"") }}">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0 col-lg-12">
                    <input type="text" name="title_panduan_pengguna" id="title_panduan_pengguna" class="form-control" value="{{ (!is_null($panduan_pengguna) ? $panduan_pengguna->title:'') }}">
                  </h5>
                </div>
                <div class="card-body">
                  <div id="content_panduan_pengguna_input"></div>
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
        $('#content_panduan_pengguna').val($(".ql-editor").html());
        $("#form_portal_settings").submit();
    });
    var quill_panduan_pengguna = new Quill('#content_panduan_pengguna_input',{
      modules: {
        toolbar: [
          ['bold', 'italic'],
          ['link', 'blockquote', 'code-block', 'image'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ],
      },
      placeholder: 'Compose an epic...',
      theme: 'snow',
    });
    quill_panduan_pengguna.root.innerHTML='{!! (!is_null($panduan_pengguna) ? $panduan_pengguna->content:"") !!}';
  });
</script>

@stop