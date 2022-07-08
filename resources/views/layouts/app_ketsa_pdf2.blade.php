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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <link rel="icon" href="{{ asset('assetsangular/img/logo/jata-negara.png/') }}" type="image/png">
    <link rel="text/css" href="{{ asset('afiqlogin_files/css') }}">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css"
        type="text/css" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css" />

    <link href="{{ asset('css/afiq.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assetsweb/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assetsweb/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsweb/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsweb/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsweb/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsweb/vendor/aos/aos.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsweb/css/style.css') }}" rel="stylesheet">

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

        @media print {
         pagebreakf {page-break-after: always !important;}
      }
    </style>
</head>

<body class="g-sidenav-show g-sidenav-pinned ng-tns-0-0" style="height: auto;width:50%;">
    <nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark"
        style="background-color: #0563bb;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('afiqlogin_files/mygeoexplorer-logo.png') }}">
            </a>
            <div id="collapseBasic" class="collapse navbar-collapse" aria-expanded="false" aria-hidden="true" style="display: none;">
                <ul id="button-animated"
                    class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#">
                            &nbsp;
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--container-->
    <div class="" style="min-height: 800px;">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    
    <!-- Template Main JS File -->
    <script src="{{ asset('/assetsweb/js/main.js') }}"></script>
    
</body>

</html>
