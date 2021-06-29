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
        <form method="post" class="form-horizontal" action="{{url('simpan_pengumuman')}}" id="form_kemaskini_pengumuman">
          @csrf
          <input type="hidden" name="id_pengumuman" value="{{ (!is_null($pengumuman) ? $pengumuman->id:'') }}">
          <input type="hidden" name="content_pengumuman" id="content_pengumuman">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0 col-lg-12">
                    <input type="text" name="title_pengumuman" id="title_pengumuman" class="form-control" value="{{ (!is_null($pengumuman) ? $pengumuman->title:'') }}">
                    <input type="text" name="date_pengumuman" id="date_pengumuman" class="form-control" value="{{ (!is_null($pengumuman) ? $pengumuman->date:'') }}">
                  </h5>
                </div>
                <div class="card-body">
                  <div id="content_pengumuman_input"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <button type="submit" id="btn_submit" class="form-control">Submit</button>
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
    var quill_pengumuman = new Quill('#content_pengumuman_input',{
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
    quill_pengumuman.root.innerHTML='{!! (!is_null($pengumuman) ? $pengumuman->content:"") !!}';

    $(document).on("click","#btn_submit",function(){
      $("#content_pengumuman").val($("#content_pengumuman_input > .ql-editor").html());
      $("#form_kemaskini_pengumuman").submit();
    });
  });
</script>

@stop