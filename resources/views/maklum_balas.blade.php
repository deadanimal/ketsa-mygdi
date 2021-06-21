@extends('layouts.app_afiq')

@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
              <!-- /.col-md-6 -->
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                            <h5 class="card-title m-0">Anda perlukan sebarang bantuan atau pertanyaan?</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form-horizontal" action="{{url('simpan_maklum_balas')}}" id="form_maklum_balas">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="custom-select" name="kategori">
                                                <option value="metadata">Metadata</option>
                                                <option value="permohonan data asas">Permohonan Data-data Asas</option>
                                                <option value="lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Pertanyaan</label>
                                            <textarea class="form-control" rows="3" name="pertanyaan" placeholder="Masukkan pertanyaan..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Emel Personal</label>
                                            <input type="text" class="form-control" name="email" placeholder="Masukkan emel...">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="btnHantar">Hantar</button>
                                </div>
                            </form>
                        </div>
                </div>
              </div>
              <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

<script>
    $(document).ready(function () {

    });

    $(document).on('click', '#btnHantar', function () {
        alert("Maklum balas berjaya dihantar.");
    });
</script>
@stop





















