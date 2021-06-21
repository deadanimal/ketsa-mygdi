<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Fixed Sidebar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css" type="text/css"/>
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
  
  <!-- jQuery -->
  <!-- <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script> -->

  <style>
    #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    .calculation-box {
        height: 175px;
        width: 150px;
        position: absolute;
        bottom: 40px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 15px;
        text-align: center;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{ url('/img/mrt.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 ">
              <div class="media-body">
                <h3 class="dropdown-item-title">Brad Diesel</h3>
                <p class="text-sm text-muted">Pentadbir Metadata</p>
              </div>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('dist/img/myGeoExplorer.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Utama</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <?php
            if(Request::segment(1) == 'mygeo_profil'){
                $menuStatus = "active";
            }else{
                $menuStatus = "";
            }
            ?>
            <a href="{{ url('/mygeo_profil') }}" class="nav-link {{ $menuStatus }}">
              <i class="nav-icon fas fa-user"></i>
              <p>Profil</p>
            </a>
          </li>
          @if(auth::user()->hasRole(['Penerbit Metadata','Super Admin']))
          <li class="nav-item has-treeview">
            <?php
            if(Request::segment(1) == 'pengisian_metadata'){
                $menuStatus = "active";
            }else{
                $menuStatus = "";
            }
            ?>
            <a href="{{ url('/mygeo_pengisian_metadata') }}" class="nav-link {{ $menuStatus }}">
              <i class="nav-icon fas fa-pencil-alt"></i>
              <p>Pengisian Metadata</p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(auth::user()->hasRole(['Pentadbir Aplikasi','Super Admin']))
            <li class="nav-item has-treeview">
              <?php
              if(Request::segment(1) == 'mygeo_pengesahan'){
                  $menuStatus = "active";
              }else{
                  $menuStatus = "";
              }
              ?>
              <a href="{{ url('/mygeo_pengesahan') }}" class="nav-link {{ $menuStatus }}">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>Pengesahan</p>
              </a>
            </li>
          @endif
          @if(auth::user()->hasRole(['Pengesah Metadata','Pentadbir Metadata','Super Admin']))
          <li class="nav-item has-treeview">
            <a href="{{ url('/mygeo_senarai_metadata') }}" class="nav-link">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Senarai Metadata</p>
            </a>
          </li>
          @endif
          @if(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
          <li class="nav-item has-treeview">
              <?php
              if(Request::segment(1) == 'mygeo_pengesahan_metadata'){
                  $menuStatus = "active";
              }else{
                  $menuStatus = "";
              }
              ?>
            <a href="{{ url('/mygeo_pengesahan_metadata') }}" class="nav-link {{ $menuStatus }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Pengesahan Metadata</p>
            </a>
          </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="{{ url('/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <strong>Hakcipta Terpelihara &copy; 2021. Pusat Geospatial Negara.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Datatables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/dist/js/demo.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
</body>
</html>
