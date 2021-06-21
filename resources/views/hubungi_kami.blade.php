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
              <div class="col-lg-12 ">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title m-0">{!! (!is_null($hubungi_kami) ? $hubungi_kami->title:"") !!}</h5>
                  </div>
                  <div class="card-body">
                    {!! (!is_null($hubungi_kami) ? $hubungi_kami->content:"") !!}
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

@stop
