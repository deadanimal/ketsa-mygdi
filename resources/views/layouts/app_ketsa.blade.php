<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="perfect-scrollbar-off">

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
    <link rel="icon" href="{{ asset('assetsangular/img/logo/jata-negara.png/') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('afiqlogin_files/css') }}">
    <!--<link href="./afiqlogin_files/bootstrap.min.css" rel="stylesheet">-->
    <!--        <link href="{{ asset('afiqlogin_files/mapbox-gl.css') }}" rel="stylesheet">-->

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css"
        type="text/css" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css" />

    <link href="{{ asset('css/afiq.css') }}" rel="stylesheet">
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
    <link href="assetsweb/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="assetsweb/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assetsweb/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assetsweb/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assetsweb/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assetsweb/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assetsweb/css/style.css" rel="stylesheet">


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
    <style>
        .bgland {
            width: 100%;
            min-height: 100vh;
            background: url("./assetsweb/img/bg4.png") top right no-repeat;
            background-size: cover;
            position: relative;
        }

        .bgland:before {
            content: "";
            background: rgba(126, 126, 126, 0.4);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="g-sidenav-show g-sidenav-pinned ng-tns-0-0">
    @include('sweet::alert')
    <app-root _nghost-lqr-c446="" ng-version="9.0.2">
        <app-auth-layout _nghost-lqr-c448="">
            <app-navbar2 _nghost-lqr-c453="">
                <nav _ngcontent-lqr-c453="" class="navbar navbar-horizontal navbar-expand-lg navbar-dark"
                    style="background-color: #0563bb;">
                    <div _ngcontent-lqr-c453="" class="container-fluid">
                        <a _ngcontent-lqr-c453="" class="navbar-brand" ng-reflect-router-link="/portal"
                            href="{{ url('/') }}">
                            <img _ngcontent-lqr-c453="" src="{{ url('afiqlogin_files/mygeoexplorer-logo.png') }}">
                        </a>
                        <button _ngcontent-lqr-c453="" type="button" data-toggle="collapse"
                            data-target="#navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"
                            aria-controls="collapseBasic" class="navbar-toggler">
                            <span _ngcontent-lqr-c453="">
                                <img _ngcontent-lqr-c453="" height="21"
                                    src="{{ url('afiqlogin_files/menuoption.png') }}">
                            </span>
                        </button>
                        <div _ngcontent-lqr-c453="" id="collapseBasic" class="collapse navbar-collapse"
                            ng-reflect-collapse="true" aria-expanded="false" aria-hidden="true" style="display: none;">
                            <div _ngcontent-lqr-c453="" class="navbar-collapse-header">
                                <div _ngcontent-lqr-c453="" class="row">
                                    <div _ngcontent-lqr-c453="" class="col-6 collapse-brand">
                                        <a _ngcontent-lqr-c453="" ng-reflect-router-link="/portal"
                                            href="{{ url('/') }}">
                                            <img _ngcontent-lqr-c453=""
                                                src="{{ url('afiqlogin_files/mygeoexplorer-logo2.png') }}">
                                        </a>
                                    </div>
                                    <div _ngcontent-lqr-c453="" class="col-6 collapse-close">
                                        <button _ngcontent-lqr-c453="" type="button" data-toggle="collapse"
                                            data-target="#navbar-collapse" aria-controls="navbar-collapse"
                                            aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                                            <span _ngcontent-lqr-c453=""></span>
                                            <span _ngcontent-lqr-c453=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <ul _ngcontent-lqr-c453="" id="button-animated"
                                class="navbar-nav align-items-center ml-md-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-link-icon" href="{{ url('/panduan_pengguna') }}">
                                        PANDUAN PENGGUNA
                                    </a>
                                </li>
                                <li _ngcontent-lqr-c453="" class="nav-item">
                                    <a class="nav-link nav-link-icon" href="{{ url('/soalan_lazim') }}">
                                        <!-- <img height="25" src="{{ url('afiqlogin_files/faq-gold.png') }}"> -->
                                        <span class="nav-link-inner--text text-bold"> FAQ </span>
                                    </a>
                                </li>
                                @auth
                                    <li _ngcontent-lqr-c453="" class="nav-item">
                                        <a class="nav-link nav-link-icon" href="{{ url('/landing_mygeo') }}">
                                            <!-- <img height="25" src="{{ url('afiqlogin_files/faq-gold.png') }}"> -->
                                            <span class="nav-link-inner--text text-bold"> DASHBOARD </span>
                                        </a>
                                    </li>
                                @endauth
                                <li class="nav-item dropdown">
                                    @auth
                                        <a class="nav-link nav-link-icon" href="{{ url('/logout') }}">
                                            LOG KELUAR
                                        </a>
                                    @endauth
                                    @guest
                                        <a class="nav-link nav-link-icon" href="{{ url('/login') }}">
                                            DAFTAR | LOG MASUK
                                        </a>
                                    @endguest
                                </li>
                                <!-- Notifications Dropdown Menu -->
                                <!-- <li class="nav-item dropdown">
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

                                    <?php /* ?> ?> ?> ?>
                                    <a href="{{ url('/soalan_lazim') }}">Soalan Lazim (FAQ)</a> <br>
                                    <a href="{{ url('/portal_settings') }}">Portal Settings</a> <br>
                                    <?php */ ?>

                                </li> -->
                                <!--container-->
                                <li _ngcontent-lqr-c453="" class="nav-item d-lg-none">
                                    <div _ngcontent-lqr-c453="" data-action="sidenav-pin" data-target="#mySidenav"
                                        class="sidenav-toggler sidenav-toggler-dark">
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
                <div _ngcontent-lqr-c499="" class="" style=" min-height: 800px;">
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
                <footer class="footer" style="background: #034f96;">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-xl-between">
                            <div class="col-xl-4">
                                <div class="copyright text-xl-left text-light">
                                    <a class="text-light" href="{{ url('/penyataan_privasi') }}">PENYATAAN PRIVASI</a>
                                    <span class="mr-2 ml-2">|</span>
                                    <a class="text-light" href="{{ url('/penafian') }}">PENAFIAN</a>
                                    <br>
                                    <br>
                                    <br> Hakcipta Terpelihara © 2021. Pusat Geospatial Malaysia.
                                    <br>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="copyright text-center text-light mt-2"> Jumlah Pelawat:
                                    <br>
                                    <span class="badge badge-custom badge-pill mt-1">
                                        <?php
                                        //get ip address =======================
                                        $address = [];
                                        foreach (explode("\n", Storage::disk('public')->get('address.txt')) as $key => $line) {
                                            $address[] = $line;
                                        }
                                        $ip = '';
                                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                                            //whether ip is from the share internet
                                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                                        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                                            //whether ip is from the proxy
                                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                        } else {
                                            //whether ip is from the remote address
                                            $ip = $_SERVER['REMOTE_ADDR'];
                                        }
                                        //get browser ==========================
                                        $browser = '';
                                        $arr_browsers = ['Opera', 'Edg', 'Chrome', 'Safari', 'Firefox', 'MSIE', 'Trident'];
                                        $agent = $_SERVER['HTTP_USER_AGENT'];
                                        $user_browser = '';
                                        foreach ($arr_browsers as $browser) {
                                            if (strpos($agent, $browser) !== false) {
                                                $user_browser = $browser;
                                                break;
                                            }
                                        }
                                        switch ($user_browser) {
                                            case 'MSIE':
                                                $user_browser = 'Internet Explorer';
                                                break;

                                            case 'Trident':
                                                $user_browser = 'Internet Explorer';
                                                break;

                                            case 'Edg':
                                                $user_browser = 'Microsoft Edge';
                                                break;
                                        }

                                        $total_visitors = 0;
                                        $total_visitors = (int) Storage::disk('public')->get('counter.txt');
                                        if (!in_array($ip . ' ' . $user_browser, $address)) {
                                            $total_visitors++;
                                            Storage::disk('public')->put('counter.txt', $total_visitors);
                                            $addresses = Storage::disk('public')->get('address.txt');
                                            $addresses .= "\n" . $ip . ' ' . $user_browser;
                                            Storage::disk('public')->put('address.txt', $addresses);
                                        }
                                        echo number_format($total_visitors, 0, '.', ',');
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="copyright text-xl-right text-light"> Sebarang pertanyaan, boleh menghubungi:
                                    <br>
                                    <br>
                                    <i class="fas fa-envelope"></i> {{ $portal->email_admin ?? '' }}
                                    <br> Masa Operasi: {{ $portal->operation_time ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </app-footer2>
        </app-auth-layout>
        <!--container-->
    </app-root>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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

    <!-- Vendor JS Files -->
    <script src="assetsweb/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assetsweb/vendor/php-email-form/validate.js"></script>
    <script src="assetsweb/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assetsweb/vendor/counterup/counterup.min.js"></script>
    <script src="assetsweb/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsweb/vendor/venobox/venobox.min.js"></script>
    <script src="assetsweb/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assetsweb/vendor/typed.js/typed.min.js"></script>
    <script src="assetsweb/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsweb/js/main.js"></script>
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
