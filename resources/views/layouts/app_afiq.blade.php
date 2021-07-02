<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}" class="perfect-scrollbar-off">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pipeline Network Sdn. Bhd.">
    <meta name="author" content="Pipeline Network Sdn. Bhd.">
    <title>
        MyGeo Explorer
    </title>
    <!-- Favicon -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <link rel="icon" href="{{ asset('assetsangular/img/logo/jata-negara.png/')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('afiqlogin_files/css')}}">
    <!--<link href="./afiqlogin_files/bootstrap.min.css" rel="stylesheet">-->
    <!--        <link href="{{ asset('afiqlogin_files/mapbox-gl.css')}}" rel="stylesheet">-->

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css" type="text/css" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css" />

    <link href="{{ asset('css/afiq.css')}}" rel="stylesheet">
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">

    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

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

        #calculated-area {}

        .main-footer {
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

        .finline {
            display: inline;
        }

        .badge-custom {
            color: #303030;
            background-image: linear-gradient(to right, #ebba16, #ed8a19);
            font-size: 110%;
        }
    </style>
</head>

<body class="g-sidenav-show g-sidenav-pinned ng-tns-0-0">
    <app-root _nghost-lqr-c446="" ng-version="9.0.2">
        <router-outlet _ngcontent-lqr-c446=""></router-outlet>
        <app-auth-layout _nghost-lqr-c448="">
            <app-navbar2 _nghost-lqr-c453="">
                <nav _ngcontent-lqr-c453="" class="navbar navbar-horizontal navbar-expand-lg navbar-dark" style="background-color: #242881;">
                    <div _ngcontent-lqr-c453="" class="container-fluid">
                        <a _ngcontent-lqr-c453="" class="navbar-brand" ng-reflect-router-link="/portal" href="{{ url('/') }}">
                            <img _ngcontent-lqr-c453="" src="{{ url('afiqlogin_files/mygeoexplorer-logo.png') }}">
                        </a>
                        <button _ngcontent-lqr-c453="" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" aria-controls="collapseBasic" class="navbar-toggler">
                            <span _ngcontent-lqr-c453="">
                                <img _ngcontent-lqr-c453="" height="21" src="{{ url('afiqlogin_files/menuoption.png') }}">
                            </span>
                        </button>
                        <div _ngcontent-lqr-c453="" id="collapseBasic" class="collapse navbar-collapse" ng-reflect-collapse="true" aria-expanded="false" aria-hidden="true" style="display: none;">
                            <div _ngcontent-lqr-c453="" class="navbar-collapse-header">
                                <div _ngcontent-lqr-c453="" class="row">
                                    <div _ngcontent-lqr-c453="" class="col-6 collapse-brand">
                                        <a _ngcontent-lqr-c453="" ng-reflect-router-link="/portal" href="{{ url('/') }}">
                                            <img _ngcontent-lqr-c453="" src="{{ url('afiqlogin_files/mygeoexplorer-logo2.png') }}">
                                        </a>
                                    </div>
                                    <div _ngcontent-lqr-c453="" class="col-6 collapse-close">
                                        <button _ngcontent-lqr-c453="" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                                            <span _ngcontent-lqr-c453=""></span>
                                            <span _ngcontent-lqr-c453=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <ul _ngcontent-lqr-c453="" id="button-animated" class="navbar-nav align-items-center ml-md-auto">
                                <li class="nav-item dropdown">
                                    @auth
                                    <a class="nav-link finline" href="{{ url('/logout')}}">
                                        LOG KELUAR
                                    </a>
                                    @endauth
                                    @guest
                                    <a class="nav-link finline" href="{{ url('/login')}}">
                                        DAFTAR | LOG MASUK
                                    </a>
                                    @endguest
                                </li>
                                <li _ngcontent-lqr-c453="" class="nav-item">
                                    <a class="nav-link nav-link-icon" href="{{ url('/soalan_lazim') }}">
                                        <img height="25" src="{{ url('afiqlogin_files/faq-gold.png') }}">
                                        <span class="nav-link-inner--text text-bold d-lg-none"> Soalan Lazim </span>
                                    </a>
                                </li>
                                <!-- Notifications Dropdown Menu -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                        <img height="21" src="{{ url('afiqlogin_files/menuoption.png') }}">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        @auth
                                        <a href="{{ url('/landing_mygeo') }}" class="dropdown-item">
                                            Dashboard
                                        </a>
                                        @endauth
                                        <a href="{{ url('/mengenai_mygeo_explorer') }}" class="dropdown-item">
                                            MyGeo Explorer
                                        </a>
                                        <a href="{{ url('/panduan_pengguna') }}" class="dropdown-item">
                                            Panduan Pengguna
                                        </a>
                                        <a href="{{ url('/maklum_balas') }}" class="dropdown-item">
                                            Maklum Balas
                                        </a>
                                        <a href="{{ url('/hubungi_kami') }}" class="dropdown-item">
                                            Hubungi Kami
                                        </a>
                                    </div>

                                    <?php /* ?>
                                    <a href="{{ url('/soalan_lazim') }}">Soalan Lazim (FAQ)</a> <br>
                                    <a href="{{ url('/portal_settings') }}">Portal Settings</a> <br>
                                    <?php */ ?>

                                </li>
                                <!--container-->
                                <li _ngcontent-lqr-c453="" class="nav-item d-lg-none">
                                    <div _ngcontent-lqr-c453="" data-action="sidenav-pin" data-target="#mySidenav" class="sidenav-toggler sidenav-toggler-dark">
                                        <div _ngcontent-lqr-c453="" class="sidenav-toggler-inner">
                                            <i _ngcontent-lqr-c453="" class="sidenav-toggler-line"></i>
                                            <i _ngcontent-lqr-c453="" class="sidenav-toggler-line"></i>
                                            <i _ngcontent-lqr-c453="" class="sidenav-toggler-line"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--container-->
            </app-navbar2>
            <router-outlet></router-outlet>
            <app-login _nghost-lqr-c499="">
                <ngx-loading-bar _ngcontent-lqr-c499="" _nghost-lqr-c484="" class="loading-bar-fixed">
                    <!--bindings={
"ng-reflect-ng-if": null
}-->
                </ngx-loading-bar>
                <div _ngcontent-lqr-c499="" class="bgg" style="min-height: 800px;">
                    <div _ngcontent-lqr-c499="" class="content-header">
                        <div _ngcontent-lqr-c499="" class="container-fluid">
                            <div _ngcontent-lqr-c499="" class="row">
                                <div _ngcontent-lqr-c499="" class="col-sm-6">
                                    <h1 _ngcontent-lqr-c499="" class="m-0 text-dark"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
                <!--container-->
                <!--container-->
            </app-login>
            <!--container-->
            <app-footer2>
                <footer class="footer" style="background: #242881;">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-xl-between">
                            <div class="col-xl-4">
                                <div class="copyright text-xl-left text-light">
                                    <a class="text-light" ng-reflect-router-link="/disclaimer" href="{{ url('/penafian') }}">PENAFIAN</a>
                                    <span class="mr-2 ml-2">|</span>
                                    <a class="text-light" ng-reflect-router-link="/privacy" href="{{ url('/penyataan_privasi') }}">PENYATAAN PRIVASI</a>
                                    <br>
                                    <br>
                                    <br> Hakcipta Terpelihara © 2021. Pusat Geospatial Malaysia.
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="copyright text-center text-light mt-2"> Jumlah Pelawat:
                                    <br>
                                    <span class="badge badge-custom badge-pill mt-1">1,098,034</span>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="copyright text-xl-right text-light"> Sebarang pertanyaan, boleh menghubungi:
                                    <br>
                                    <br>
                                    <i class="fas fa-envelope"></i> adminexplorer@ketsa.gov.my
                                    <br> Masa Operasi: 8.00 Pagi - 5.00 Petang
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </app-footer2>
        </app-auth-layout>
        <!--container-->
    </app-root>
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        // Restricts input for the set of matched elements to the given inputFilter function.
        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));
    </script>
</body>

</html>
