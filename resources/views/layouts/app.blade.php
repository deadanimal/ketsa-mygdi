<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">

      <title>Ketsa Geo</title>

      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      
      <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css" type="text/css"/>
      <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
      <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
      <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
      <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>
      <!-- Main Quill library -->
      <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
      <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
      <style>
            body { margin: 0; padding: 0; }
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
             
            #calculated-area{}

            <?php if(Request::segment(1) != 'portal_settings'){ ?>
              .content-wrapper{
                background: url('{{ asset("dist/img/global.png") }}') 65% 3% no-repeat;
              }
            <?php } ?>

            .main-footer{
              background: #0A80B6;
              border-top: none;
              color: white;
              font-weight: 200;
            }

            .main-header {
              border-bottom: none;
            }

            .card { 
              background-color: rgba(255, 255, 255, 0.9);
            }

            .finline{
              display: inline;
            }
     </style>
      
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <!-- Navbar -->
              <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style='background-color:#FFAD29;'>
                <div class="container">
                  <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('dist/img/myGeoExplorer.png') }}" alt="AdminLTE Logo" class="brand-image">
                  </a>
                  
                  <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                  </div>

                  <!-- Right navbar links -->
                  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                      @auth
                        <a class="nav-link finline" href="{{ url('/logout') }}">
                          LOG KELUAR
                        </a>
                      @endauth
                      @guest
                        <a class="nav-link finline" href="{{ url('/register') }}">
                          DAFTAR
                        </a>
                        &nbsp; | &nbsp;
                        <a class="nav-link finline" href="{{ url('/login') }}">
                          LOG MASUK
                        </a>
                      @endguest
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                  </ul>
                </div>
              </nav>

            @yield('content')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>&nbsp;</h5>
                    <a href="{{ url('/') }}">Home</a> <br>
                    <a href="{{ url('/landing_mygeo') }}">MyGeo Explorer</a> <br>
                    <a href="{{ url('/panduan_pengguna') }}">Panduan Pengguna</a> <br>
                    <a href="{{ url('/maklum_balas') }}">Maklum Balas</a> <br>
                    <a href="{{ url('/hubungi_kami') }}">Hubungi Kami</a> <br>
                    <a href="{{ url('/soalan_lazim') }}">Soalan Lazim (FAQ)</a> <br>
                    <a href="{{ url('/portal_settings') }}">Portal Settings</a> <br>
                </div>
            </aside>

            <!-- Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline" style="text-align: right;">
                  Sebarang pertanyaan, boleh menghubungi: <br><br>
                  <i class="fas fa-envelope"></i> adminexplorer@ketsa.gov.my <br>
                  Masa Operasi: 8.00 Pagi - 5.00 Petang
                </div>
                <!-- Default to the left -->
                <a href="{{ url('/penafian') }}" style="color: white;">Penafian</a> | 
                <a href="{{ url('/penyataan_privasi') }}" style="color: white;">Penyataan Privasi</a>
                <br>
                Hakcipta Terpelihara © 2021. Pusat Geospatial Negara. <br><br>
                Jumlah Pelawat: <span style="color:#FFE802;">1,098,034</span>
            </footer>
        </div>

        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>        
        <!-- Datatables -->
        <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript">
          $(document).ready(function () {
            bsCustomFileInput.init();
          });
        </script>
    </body>
</html>
