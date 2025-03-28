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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="{{ asset('assetsangular/img/logo/jata-negara.png/') }}" type="image/png">
    <!--<link rel="stylesheet" href="{{ asset('afiqadminmygeo_files/css') }}">-->
    <link href="{{ asset('afiqadminmygeo_files/mapbox-gl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


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
    <!-- Google Font: Open Sans -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css"
        type="text/css" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Main Quill library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- DataTable -->


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

        .nav-item>.nav-link-text {
            font-size: 12px;

        }

        .bg-custom {
            background-image: url("{{ asset('afiqadminmygeo_files/navbar-mygeo.png') }}");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .tb table {
            table-layout: auto;
            width: 180px;
        }

        .tb th,
        .tb td {
            font-size: 14px;
            width: fit-content;
            padding: 8px 15px;
            max-width: 550px !important;
        }

        .badge,
        .form-control {
            color: black !important;
        }

        tr:nth-child(even) {
            /* background-color: #dddddd; */
        }

        html,
        body {
            font-size: 110%;
            color: black !important;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="g-sidenav-show g-sidenav-pinned ng-tns-0-0" style="padding-right: 0px;">
    @include('sweet::alert')
    <app-root _nghost-oai-c446="" ng-version="9.0.2">
        <router-outlet _ngcontent-oai-c446=""></router-outlet>
        <app-admin-layout _nghost-oai-c447="" class="ng-star-inserted">
            <div>
                <nav id="sidenav-main" class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light">
                    <div class="ps-content">
                        <div class="scrollbar-inner">
                            <div class="sidenav-header d-flex align-items-center">
                                <a class="navbar-brand" href="#"><img
                                        src="{{ url('afiqadminmygeo_files/mygeologo.jpeg') }}" alt="..."
                                        class="navbar-brand-img"></a>
                                <div class="ml-auto">
                                    <div data-action="sidenav-unpin" data-target="#sidenav-main"
                                        class="sidenav-toggler d-none d-xl-block">
                                        <div class="sidenav-toggler-inner"><i class="sidenav-toggler-line"></i><i
                                                class="sidenav-toggler-line"></i><i class="sidenav-toggler-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="navbar-inner">
                                <div id="sidenav-collapse-main" class="collapse navbar-collapse">
                                    <ul class="navbar-nav nav-sidebar flex-column" data-widget="treeview" role="menu"
                                        data-accordion="false">
                                        @if (auth::user()->hasRole(['Penerbit Metadata', 'Pengesah Metadata', 'Pemohon Data', 'Pentadbir Aplikasi', 'Pentadbir Metadata', 'Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item ng-star-inserted">
                                                <a class="nav-link active" href="{{ url('/ ') }}">
                                                    <i class="fas fa-home text-teal"></i>
                                                    <span class="nav-link-text">Utama</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Penerbit Metadata', 'Pengesah Metadata', 'Pemohon Data', 'Pentadbir Aplikasi', 'Pentadbir Metadata', 'Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item ng-star-inserted">
                                                <a class="nav-link active" href="{{ url('mygeo_profil') }}">
                                                    <i class="fas fa-user text-blue"></i>
                                                    <span class="nav-link-text">Profil</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active" href="#">
                                                    <i class="fa-desktop fas text-orange"></i>
                                                    <span class="nav-link-text">Dashboard</span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        <a class="nav-link active"
                                                            href="{{ url('mygeo_dashboard_metadata') }}">
                                                            <span class="nav-link-text">Dashboard Metadata</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active"
                                                            href="{{ url('mygeo_dashboard_data_asas') }}">
                                                            <span class="nav-link-text">Dashboard Data Asas</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @elseif (auth::user()->hasRole(['Pengesah Metadata', 'Pentadbir Metadata', 'Penerbit Metadata']))
                                            <li class="nav-item ng-star-inserted">
                                                <a class="nav-link active"
                                                    href="{{ url('mygeo_dashboard_metadata') }}">
                                                    <i class="fa-desktop fas text-orange"></i>
                                                    <span class="nav-link-text">Dashboard</span>
                                                </a>
                                            </li>
                                        @elseif(auth::user()->hasRole(['Pentadbir Data', 'Pemohon Data']))
                                            <li class="nav-item ng-star-inserted">
                                                <a class="nav-link active"
                                                    href="{{ url('mygeo_dashboard_data_asas') }}">
                                                    <i class="fa-desktop fas text-orange"></i>
                                                    <span class="nav-link-text">Dashboard</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active" href="#">
                                                    <i class="fa-user-cog fas text-purple"></i>
                                                    <span class="nav-link-text">Pengurusan Pengguna</span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_pengesahan') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Pengesahan Pengguna</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_senarai_pengguna_berdaftar') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Senarai Pengguna
                                                                Berdaftar</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_senarai_penerbit_pengesah') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Senarai Penerbit /
                                                                Pengesah</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Metadata', 'Super Admin', 'Pentadbir Aplikasi']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active">
                                                    <i class="fa-braille fas text-indigo"></i>
                                                    <span class="nav-link-text">Pengurusan Metadata</span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_pengesahan_metadata') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Semakan Metadata</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_senarai_metadata') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Senarai Metadata</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif

                                        @if (auth::user()->hasRole(['Super Admin', 'Pentadbir Aplikasi']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active">
                                                    <i class="fa-braille fas text-indigo"></i>
                                                    <span class="nav-link-text">Pengurusan Data Asas</span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="{{ url('mohon_data') }}" class="nav-link active">
                                                            <span class="nav-link-text">Mohon Data</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('permohonan_baru') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Permohonan Baru</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('semakan_status') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Semakan Status</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('status_permohonan') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Status Permohonan</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('proses_data') }}" class="nav-link active">
                                                            <span class="nav-link-text">Proses Data</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('muat_turun_data') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Muat Turun Data</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('penilaian') }}" class="nav-link active">
                                                            <span class="nav-link-text">Penilaian Data</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('penilaian') }}" class="nav-link active">
                                                            <span class="nav-link-text">Akuan Penerimaan dan Penilaian
                                                                Data</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item has-treeview">
                                                        <a class="nav-link active">
                                                            <i class="fas fa-magic text-red"></i>
                                                            <span class="nav-link-text">Kemas Kini Data</span>
                                                            <span class="ml-auto"><i
                                                                    class="right fas fa-angle-left"></i></span>
                                                        </a>
                                                        <ul class="nav nav-sm nav-treeview">
                                                            <li class="nav-item">
                                                                <a href="{{ url('senarai_data') }}"
                                                                    class="nav-link active">
                                                                    <span class="nav-link-text">Senarai Data</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="{{ url('kategori_kelas_kongsi_data') }}"
                                                                    class="nav-link active">
                                                                    <span class="nav-link-text">Kategori Pengkelasan
                                                                        Perkongsian
                                                                        Data</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif

                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active">
                                                    <i class="fas fa-cogs text-teal"></i>
                                                    <span class="nav-link-text">Pengurusan Portal</span>
                                                    </span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="{{ url('kemaskini_faq') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Soalan Lazim</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('pengumuman_edit') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Pengumuman</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('panduan_pengguna_edit') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Panduan Pengguna</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('dokumen_utama_edit') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Dokumen Berkaitan</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('tatacara_edit') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Tatacara Permohonan</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_penafian') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Penafian</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('mygeo_penyataan_privasi') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Penyataan Privasi</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('portal_tetapan') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Tetapan Portal</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif

                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('senarai_agensi_organisasi') }}"
                                                    class="nav-link active">
                                                    <i class="fas fa-list-ul text-indigo"></i>
                                                    <span class="nav-link-text">Kemaskini Agensi / Organisasi /
                                                        Institusi</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if (auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active">
                                                    <i class="fas fa-magic text-red"></i>
                                                    <span class="nav-link-text">Kemas Kini Data</span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="{{ url('senarai_data') }}" class="nav-link active">
                                                            <span class="nav-link-text">Senarai Data</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('kategori_kelas_kongsi_data') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Kategori Pengkelasan
                                                                Perkongsian
                                                                Data</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi']))
                                            <li class="nav-item">
                                                <a href="{{ url('mygeo_kemaskini_elemen_metadata') }}"
                                                    class="nav-link active">
                                                    <i class="far fa-id-card text-green"></i>
                                                    <span class="nav-link-text">Kemas Kini Elemen</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('permohonan_baru') }}" class="nav-link active">
                                                    <i class="far fa-id-card text-green"></i>
                                                    <span class="nav-link-text">Permohonan Baru</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('status_permohonan') }}" class="nav-link active">
                                                    <i class="fas fa-book text-purple"></i>
                                                    <span class="nav-link-text">Status Permohonan</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('proses_data') }}" class="nav-link active">
                                                    <i class="fas fa-sync-alt text-cyan"></i>
                                                    <span class="nav-link-text">Proses Data</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('penilaian') }}" class="nav-link active">
                                                    <i class="fas fa-file-signature text-primary"></i>
                                                    <span class="nav-link-text">Akuan Penerimaan dan Penilaian
                                                        Data</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('audit_trail') }}" class="nav-link active">
                                                    <i class="fa-comments fas text-green"></i>
                                                    <span class="nav-link-text">Audit Trail</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin', 'Pentadbir Metadata', 'Pentadbir Data']))
                                            <li class="nav-item">
                                                <a href="{{ url('maklum_balas') }}" class="nav-link active">
                                                    <i class="fa-comments fas text-green"></i>
                                                    <span class="nav-link-text">Maklum Balas</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pengesah Metadata', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('mygeo_pengesahan_metadata') }}"
                                                    class="nav-link active">
                                                    <i class="fas fa-edit text-green"></i>
                                                    <span class="nav-link-text">Semakan Metadata</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pemohon Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('mohon_data') }}" class="nav-link active">
                                                    <i class="fas fa-pen-alt text-warning"></i>
                                                    <span class="nav-link-text">Mohon Data</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pemohon Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('semakan_status') }}" class="nav-link active">
                                                    <i class="fas fa-search text-danger"></i>
                                                    <span class="nav-link-text">Semakan Status</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pemohon Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('muat_turun_data') }}" class="nav-link active">
                                                    <i class="fas fa-cloud-download-alt text-purple"></i>
                                                    <span class="nav-link-text">Muat Turun Data</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pemohon Data', 'Super Admin']))
                                            <li class="nav-item">
                                                <a href="{{ url('penilaian') }}" class="nav-link active">
                                                    <i class="fas fa-edit text-green"></i>
                                                    <span class="nav-link-text">Penilaian Data</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Penerbit Metadata', 'Super Admin', 'Pentadbir Aplikasi']))
                                            <li class="nav-item">
                                                <a href="{{ url('mygeo_pengisian_metadata') }}"
                                                    class="nav-link active">
                                                    <i class="fa-edit fas text-warning"></i>
                                                    <span class="nav-link-text">Pengisian Metadata</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Penerbit Metadata', 'Pengesah Metadata']))
                                            <li class="nav-item">
                                                <a href="{{ url('mygeo_senarai_metadata') }}"
                                                    class="nav-link active">
                                                    <i class="fas fa-list-ul text-indigo"></i>
                                                    <span class="nav-link-text">Senarai Metadata</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Metadata']))
                                            <li class="nav-item">
                                                <a href="{{ url('mygeo_senarai_penerbit_pengesah') }}"
                                                    class="nav-link active">
                                                    <i class="fas fa-list-ul text-indigo"></i>
                                                    <span class="nav-link-text">Senarai Penerbit / Pengesah</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (auth::user()->hasRole(['Pentadbir Aplikasi', 'Super Admin']))
                                            <li class="nav-item has-treeview">
                                                <a class="nav-link active" href="#">
                                                    <i class="fa-chart-bar fas text-purple"></i>
                                                    <span class="nav-link-text">Laporan</span>
                                                    <span class="ml-auto"><i
                                                            class="right fas fa-angle-left"></i></span>
                                                </a>
                                                <ul class="nav nav-sm nav-treeview">
                                                    <li class="nav-item">
                                                        {{-- <a href="{{ url('laporan_metadata') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Laporan Metadata</span>
                                                        </a> --}}
                                                        <a href="{{ url('laporan_pilihan_metadata') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Laporan Metadata</span>
                                                        </a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a href="{{ url('laporan_data_asas') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Laporan Data Asas</span>
                                                        </a>
                                                    </li> --}}
                                                    <li class="nav-item">
                                                        <a href="{{ url('laporan_pilihan_data_asas') }}"
                                                            class="nav-link active">
                                                            <span class="nav-link-text">Laporan Data Asas</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @elseif (auth::user()->hasRole(['Pengesah Metadata', 'Pentadbir Metadata']))
                                            <li class="nav-item">
                                                {{-- <a href="{{ url('laporan_metadata') }}" class="nav-link active">
                                                    <i class="fa-chart-bar fas text-purple"></i>
                                                    <span class="nav-link-text">Laporan Metadata</span>
                                                </a> --}}
                                                <a href="{{ url('laporan_pilihan_metadata') }}"
                                                    class="nav-link active">
                                                    <i class="fa-chart-bar fas text-purple"></i>
                                                    <span class="nav-link-text">Laporan Metadata</span>
                                                </a>
                                            </li>
                                        @elseif (auth::user()->hasRole(['Pentadbir Data']))
                                            {{-- <li class="nav-item">
                                                <a href="{{ url('laporan_data_asas') }}" class="nav-link active">
                                                    <i class="fa-chart-bar fas text-purple"></i>
                                                    <span class="nav-link-text">Laporan Data Asas</span>
                                                </a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a href="{{ url('laporan_pilihan_data_asas') }}" class="nav-link active">
                                                    <i class="fa-chart-bar fas text-purple"></i>
                                                    <span class="nav-link-text">Laporan Data Asas</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <hr class="my-3">
                                    <ul class="navbar-nav">
                                        <li class="nav-item pointer">
                                            <a class="nav-link active" href="{{ url('/logout') }}">
                                                <i class="fas fa-door-open text-black"></i>
                                                <span class="nav-link-text">Log keluar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px; height: 558px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 488px;"></div>
                    </div>
                </nav>

                <div class="main-content">
                    <app-navbar>
                        <nav id="navbar-main"
                            class="navbar navbar-top navbar-expand navbar-light bg-custom border-bottom">
                            <div class="container-fluid">
                                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                                    <div style="width:60%;">
                                        <img alt="Image placeholder"
                                            src="{{ url('afiqadminmygeo_files/mygeoexplorer-logo2.png') }}"
                                            width="60%">
                                    </div>
                                    <ul class="navbar-nav align-items-center ml-md-auto">
                                        <li placement="bottom-right" class="nav-item">
                                            <!--<a role="button" dropdowntoggle="" class="nav-link pr-0 dropdown-toggle" aria-haspopup="true">-->
                                            <!--<a class="nav-link pr-0 dropdown-toggle" data-toggle="dropdown" href="#">-->
                                            <div class="media align-items-center pointer">
                                                <div class="media-body ml-2 d-none d-lg-block">
                                                    <span class="mb-0 text-sm font-weight-bold ng-star-inserted">
                                                        {{ strtoupper(auth::user()->name) }}
                                                    </span>
                                                    <br>
                                                    <span
                                                        class="float-right text-sm font-weight-light ng-star-inserted">
                                                        <?php
                                                        $roles = '';
                                                        if (!empty(auth::user()->getRoleNames())) {
                                                            foreach (auth::user()->getRoleNames() as $role) {
                                                                $roles .= $role . ', ';
                                                            }
                                                        } ?> </span>
                                                    <?php
                                                    echo rtrim($roles, ', ') . '<br><a href="#" data-toggle="modal" data-target="#modal_tukar_peranan"><i class="fas fa-user-cog"  id="link_tukarPeranan" data-toggle="popover"></i></a>';
                                                    ?>

                                                    </a>
                                                </div>
                                                <span class="avatar avatar-md rounded-circle ml-3">
                                                    <?php
                                                        if (auth::user()->gambar_profil != "") {
                                                            ?>
                                                    <img alt="Image"
                                                        src="{{ asset('storage/' . auth::user()->gambar_profil) }}">
                                                    <?php
                                                        } else {
                                                            ?>
                                                    <img alt="Image" src="./afiqadminmygeo_files/avatar.png">
                                                    <?php
                                                        }
                                                        ?>
                                                </span>
                                            </div>
                                            <!--</a>-->
                                            <!--<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <a href="#" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal_tukar_peranan">
                                                    <i class="fas fa-users mr-2 tukarPeranan"></i> Tukar Peranan
                                                </a>
                                            </div>-->
                                            <!--container-->
                                        </li>
                                        <!--container-->
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="backdrop d-xl-none ng-star-inserted"></div>
                    </app-navbar>

                    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
                    @yield('content')

                    <!--container-->
                    <app-footer>
                        <div>
                            <footer class="footer" style="background: #40b3e9;">
                                <div class="container-fluid">
                                    <div class="row align-items-center justify-content-xl-between">
                                        <div class="col-xl-6">
                                            <div class="copyright text-xl-left text-white">
                                                Hakcipta Terpelihara ©
                                                2021. Pusat Geospatial Negara.
                                            </div>
                                        </div>
                                        <div class="col-xl-6"></div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </app-footer>
                </div>
            </div>
        </app-admin-layout>
        <!--container-->
    </app-root>

    <div class="modal fade" id="modal_tukar_peranan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tukar Peranan:</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('tukar_peranan') }}" id='formTukarPeranan'>
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="div_pilihan_peranan">
                                        <?php
                                        $peranans = array_unique(explode(',',Auth::user()->assigned_roles));
                                        if(count($peranans) > 0){
                                            $count = 1;
                                            foreach($peranans as $p){
                                                $checked = "";
                                                if(Auth::user()->hasRole($p)){
                                                    $checked = "checked";
                                                }
                                                ?>
                                        <div class=" custom-control custom-radio mb-3">
                                            <input class="custom-control-input" name="perananSelect" type="radio"
                                                value="{{ $p }}" {{ $checked }}
                                                id="peranan_{{ $count }}" />
                                            <label class="custom-control-label"
                                                for="peranan_{{ $count }}">{{ $p }}</label>
                                        </div>
                                        <?php
                                                $count++;
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between1">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-default">Tukar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="overlay-container">
        <div id="toast-container" class="toast-top-right toast-container"></div>
    </div>

    <form action="/notificationMuatTurun" id="formTigaJam" method="post" target="TheWindow">
        @csrf
        <div id="inputTigaJam">
        </div>
    </form>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- daterange picker -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}
    <!-- <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        function checkThreeHourNotifySelesaiMuatTurun() {
            //check for completed data
            $.ajax({
                method: "POST",
                url: "{{ url('checkThreeHourNotifySelesaiMuatTurun') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
            }).done(function(response) {
                var res = JSON.parse(response);
                console.log(res);
                // console.log(jQuery.isEmptyObject(res));
                if (!jQuery.isEmptyObject(res)) {
                    // window.open("https://www.w3schools.com");
                    var msg = "Data-data berikut telah diakui terima dan dimuat turun:<br>";
                    var mohons = "";
                    var counter = 1;
                    $("#inputTigaJam").html('');
                    jQuery.each(res, function(key, val) {
                        $("#inputTigaJam").append(`
                            <input type="hidden" name="name[]" value="` + val + `">
                            <input type="hidden" name="data[]" value="` + key + `">
                        `);
                    });

                    window.open('', 'TheWindow', 'width:800px;height:800px;');
                    document.getElementById('formTigaJam').submit();
                    // swal({
                    //     title: "Adakah anda berjaya memuat turun data?",
                    //     html: msg,
                    //     type: "warning",
                    //     input: "checkbox",
                    //     inputPlaceholder: " Saya berjaya memuat turun data",
                    //     buttonsStyling: false,
                    //     allowOutsideClick: true,
                    //     showCancelButton: true,
                    //     cancelButtonClass: "btn btn-warning",
                    //     confirmButtonClass: "btn btn-success",
                    //     cancelButtonText: "Belum Selesai Muat Turun",
                    //     confirmButtonText: 'Selesai Muat Turun&nbsp;<i class="fa fa-arrow-right"></i>',
                    // }).then(function(result) {
                    //     if (result.dismiss == "cancel") { //clicked belum selesai (cancel)

                    //     } else if (result.dismiss == "overlay") { //clicked outside alert box

                    //     } else { //clicked selesai
                    //         if ($("#swal2-checkbox:checked").length > 0) {
                    //             $.ajax({
                    //                 method: "POST",
                    //                 url: "{{ url('berjayaMuatTurun') }}",
                    //                 data: {
                    //                     "_token": "{{ csrf_token() }}",
                    //                     "mohons": mohons
                    //                 },
                    //             }).done(function(response) {

                    //             });
                    //         }
                    //     }
                    // });
                }
            });
        }
        //check if user has completed download============================================================
        <?php
        if(Auth::user()->hasRole(['Pemohon Data'])){
            ?>
        setInterval(
            checkThreeHourNotifySelesaiMuatTurun,
            18000 /* 300000 ms = 5 min for testing */
            // 10800000 /* 10800000 ms = 3 hrs */ //ori specs
        );
        <?php
        }
        ?>
        $(document).ready(function() {
            $("#link_tukarPeranan").popover({
                placement: 'bottom',
                sanitize: false,
                html: true,
                content : '<span>Tukar Peranan Di Sini</span><button type="button" class="close addGap" onclick="$(&quot;#link_tukarPeranan&quot;).popover(&quot;hide&quot;);">X</button>'
            });
            $('[data-toggle="popover"]').popover('show');
            <?php
            //notify user (pemohon data only) to do penilaian after 6 months==================================
            if(Auth::user()->hasRole(['Pemohon Data']) && Session::has('msgPenilaian') && Session::get('msgPenilaian') !== ""){
                ?>
            var msg = "<?php echo htmlspecialchars_decode(Session::get('msgPenilaian')); ?>";
            swal({
                title: "Sila buat penilaian untuk data yang anda berjaya muat turun",
                html: msg,
                type: "warning",
                buttonsStyling: false,
                allowOutsideClick: true,
                confirmButtonClass: "btn btn-success",
                confirmButtonText: 'Okay&nbsp;<i class="fa fa-arrow-right"></i>',
            }).then(function(result) {

            });
            <?php
            }
            ?>
        });
    </script>
</body>

</html>
