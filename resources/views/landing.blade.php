@extends('layouts.app_afiq')

@section('content')

    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">


    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            height: 430%;
            width: 100%;
        }

        .ql-align-center {
            text-align: center;
        }

    </style>
    <style>
        .card-header {
            margin-top: 0;
            padding: 1.25rem 1.5rem;

            border-bottom: 1px solid rgba(255, 255, 255, 0);
            background-color: #fff0;
        }

        .pcard {
            border-radius: 25px;

        }

        .card-body {
            font-size: 90%;
        }

        .card-header {
            padding-bottom: 0;
        }

        .card-footer {
            padding-top: 0;
            border-top: 0px solid rgba(255, 255, 255, 0);
            background-color: #fff0;
        }

        .scroll {
            max-height: 450px;
            overflow-y: scroll;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .scroll::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .scroll {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .badge-custom {
            color: #303030;
            background-image: linear-gradient(to right, #ebba16, #ed8a19);
            font-size: 110%;
            padding: .75rem 1.05rem;
        }

        .badge-custom[href]:hover,
        .badge-custom[href]:focus {
            text-decoration: none;

            color: #fff;
            background-color: #fa3a0e;
        }

        .fancy_card {
            box-shadow: 8px 14px 38px rgba(39, 44, 49, 0.06), 1px 3px 8px rgba(39, 44, 49, 0.03);
            -webkit-transition: all 0.7s ease;
            transition: all 0.7s ease;
            color: rgb(37, 37, 37);
            text-transform: uppercase;
            /* background-image: -webkit-gradient(linear, left top, right top, from(#ebba16), to(#ed8a19));
            background-image: linear-gradient(to right, #ebba16, #ed8a19); */
        }

        .fancy_card:hover {
            box-shadow: 8px 28px 50px rgba(39, 44, 49, 0.07), 1px 6px 12px rgba(39, 44, 49, 0.04);
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;

            -webkit-transform: translate3D(0, -1px, 0) scale(1.2);
            transform: translate3D(0, -1px, 0) scale(1.05);
            font-size: 150%;
            color: black;
            background-color: #6aaff0;
            /* background-image: -webkit-gradient(linear, left top, right top, from(#ebc64c), to(#e4a053));
            background-image: linear-gradient(to right, #ebc64c, #e4a053); */
        }

        .navbar-search .form-control {
            width: 590px;
        }

        .navbar-search .form-control:focus {
            width: 630px;
        }

    </style>
    <style>
        .umum_card {
            border-radius: 25px;
        }

        .umum_header {
            background-color: #fff0;
            padding-bottom: 0px;
        }

        .umum_body {
            border-radius: 25px;
        }

        .umum_footer {
            padding-top: 0px;
            background-color: #fff0;
        }

        .scrollf {
            max-height: 450px;
            overflow-y: scroll;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
        }

        .scrollf::-webkit-scrollbar {
            /* WebKit */
            width: 0;
            height: 0;
        }

        .text-bl {
            color: #0563bb;
        }

        .text-caps {
            text-transform: uppercase;
        }

        .text-bold {
            font-weight: 500;
        }

    </style>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav class="nav-menu">
            <ul>
                <li class="active"><a href="#home"><i class="bx bx-home"></i> <span>Laman Utama</span></a></li>
                <li><a href="#home2"><i class="bx bx-map-alt"></i> <span>Carian Data</span></a></li>
                <li><a href="#about"><i class="bx bx-food-menu"></i> <span>Mengenai MyGeo Explorer</span></a></li>
                <li><a href="#vidtuto"><i class="bx bx-mouse"></i> <span>Video Tutorial</span></a></li>
                <li><a href="#feedback"><i class="bx bx-support"></i> <span>Maklum Balas</span></a></li>
                <li><a href="#contact"><i class="bx bx-envelope"></i> <span>Hubungi Kami</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </header>
    <!-- ======= Laman Utama Section ======= -->
    <section id="home" class="d-flex flex-column justify-content-center">
        <div class="container-fluid pr-lg-5" data-aos="fade-up">
            <div class="row mt-0 pt-0 mb-5">
                <div class="col-12">
                    <p class="text-bl">Selamat Datang ke</p>
                    <h1>MyGeo Explorer</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="demo" class="carousel slide mb-2" data-ride="carousel">
                        <?php
                    $bil = 0;
                    $bil2 = 0;
                    if (count($pengumuman) > 0) { ?>
                        <ul class="carousel-indicators">
                            <?php foreach ($pengumuman as $umum) { ?>
                            <li data-target="#demo" data-slide-to="{{ $bil }}"></li>
                            <?php $bil++;
                                } ?>
                        </ul>

                        <div class="carousel-inner">
                            <?php foreach ($pengumuman as $umum) { ?>
                            <div class="carousel-item <?php if ($bil2 == 0) {
    echo 'active';
} ?>">
                                <form id="form_umum_{{ $umum->id }}" method="post"
                                    action="{{ url('/tunjuk_pengumuman') }}">
                                    @csrf
                                    <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                                    <a href="#" class="aUmum" data-umumid="{{ $umum->id }}">
                                        <?php if ($bil2 % 2 == 1) { ?> <img src="{{ url('assetsweb/img/banner1.jpeg') }}"
                                            alt="{{ $bil2 }}"> <?php } ?>
                                        <?php if ($bil2 % 2 == 0) { ?> <img src="{{ url('assetsweb/img/banner2.jpeg') }}"
                                            alt="{{ $bil2 }}"> <?php } ?>
                                        <div class="carousel-caption">
                                            <h2 class="text-caps text-white">
                                                <?php echo date('j M Y', strtotime($umum->created_at)); ?>
                                            </h2>
                                            <p class="text-white text-bold">
                                                <?php echo $umum->kategori; ?>: <br>
                                                <?php echo $umum->title; ?>
                                            </p>
                                        </div>
                                    </a>
                                </form>
                            </div>
                            <?php $bil2++;
                                } ?>
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                        <?php
                    }
                    ?>
                    </div>
                    <a class="text-yellow float-right mr-2" style="font-weight: 600;"
                        href="{{ url('/senarai_pengumuman') }}">PAPAR SEMUA >&gt;</a>
                </div>
            </div>
        </div>
        </div>
    </section>


    <section id="home2" class="d-flex flex-column justify-content-center">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-title">
                <h2>Carian Data</h2>
            </div>
            <div class="row pl-lg-7">
                <div class="col-lg-12">
                    <div class="row mt-0 pt-0">
                        <div class="col-12 form-inline justify-content-center">
                            <form method="post"
                                class="navbar-search navbar-search-light form-inline my-4 justify-content-center"
                                action="{{ url('carian_metadata_nologin') }}" id="form_carian">
                                @csrf
                                @include('modal_carian_tambahan')
                                <div class="form-inline mb-0">
                                    <div class="input-group input-group-alternative input-group-merge"
                                        style="background-image: linear-gradient(to right, #ebba16, #ed8a19);">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <input placeholder="Carian..." type="text" name="carian" id="carian"
                                            class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <button type="button" data-action="search-close" data-target="#navbar-search-main"
                                    aria-label="Close" class="close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </form>
                            <a class="btn btn-success text-white text-center btn_cari_submit ml-3" style="cursor:pointer;">
                                Cari
                            </a>
                        </div>
                    </div>

                    <div class="row my-2 mx-4">
                        <div class="col-6">
                            <a href="{{ url('senarai_metadata_nologin') }}">
                                <div class="card fancy_card">
                                    <div class="card-body pointer form-inline" tabindex="0"
                                        ng-reflect-router-link="/metadata">
                                        <img height="90" src="./afiqlogin_files/meta.png">
                                        <h2 class="mx-auto mb-0">Metadata</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ url('data_asas_landing') }}">
                                <div class="card fancy_card">
                                    <div class="card-body pointer form-inline" tabindex="0"
                                        ng-reflect-router-link="/data-asas">
                                        <img height="90" src="./afiqlogin_files/data.png">
                                        <h2 class="mx-auto mb-0">Data Asas</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="bg-white">
        <div class="container" data-aos="fade-up" style="min-height: 500px;">

            <div class="section-title">
                <h2>Mengenai MyGeo Explorer</h2>
            </div>
            <div class="row pb-7">
                <div class="col-12">
                    <p align="center" class="my-4">
                        MyGeo Explorer merupakan inisiatif Kerajaan untuk mengembangkan Infrastruktur Data Geospatial bagi
                        meningkatkan kesedaran tentang ketersediaan data dan meningkatkan pautan akses ke maklumat
                        geospatial dengan memudahkan perkongsian data di antara agensi yang mengambil bahagian.
                        <br><br>
                        MyGDI sebagai Infrastruktur Data Spatial Nasional (NSDI) untuk Malaysia, adalah infrastruktur data
                        geospatial yang merangkumi teknologi, dasar, piawaian dan prosedur bagi agensi untuk menghasilkan
                        dan berkongsi maklumat geospatial secara kerjasama.
                        <br><br>
                        MyGDI menyediakan dasar untuk eksplorasi, penilaian, dan aplikasi data geospatial untuk pengguna dan
                        penyedia data dalam semua lapisan pemerintah, komersial, dan non-profit serta akademik dan
                        masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="vidtuto" class="">
        <div class=" container" data-aos="fade-up" style="min-height: 500px;">

        <div class="section-title">
            <h2>Video Tutorial</h2>
        </div>
        <div class="row">
            <div class="col text-center">
                <iframe width="900" height="475" src="https://www.youtube.com/embed/I2P1zEBciq4?autoplay=1&mute=1&loop=1"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        </div>
    </section>

    <section id="feedback" class="d-flex flex-column justify-content-center bg-white">
        <div class="container-fluid pl-lg-7 pr-lg-5">
            <div class="section-title">
                <h2>Maklum Balas</h2>
            </div>
            <h2 class="text-center text-muted my-4">Anda perlukan sebarang bantuan atau pertanyaan?</h2>

            <form method="POST" class="form-horizontal" action="{{ url('simpan_maklum_balas') }}" id="form_maklum_balas"
                style="min-height: 300px;">
                @csrf
                <div class="pl-lg-6">
                    <div class="row mb-3">
                        <div class="col-2"><label class="form-control-label ml-4"> Kategori </label>
                        </div>
                        <div class="col-9"><select name="kategori" class="form-control form-control-sm ml-3">
                                <option selected disabled> Pilih Kategori </option>
                                <option value="Metadata">Metadata</option>
                                <option value="Data-data Asas">Permohonan Data-data Asas</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><label for="input-feedback" class="form-control-label ml-4"> Pertanyaan
                            </label>
                        </div>
                        <div class="col-9"><textarea name="pertanyaan" placeholder="Nyatakan maklum balas anda"
                                type="text" rows="5" class="form-control form-control-sm ml-3"></textarea></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"><label for="input-emel" class="form-control-label ml-4"> Emel Personal
                            </label>
                        </div>
                        <div class="col-7">
                            <input placeholder="Masukan E-mel anda" type="text" name="email"
                                class="form-control form-control-sm ml-3">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary float-right" id="btnHantar"><i
                                    class="fas fa-paper-plane mr-2"></i>Hantar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Hubungi Kami</h2>
            </div>

            <div class="row pl-lg-7">
                <div class="col-lg-6">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Lokasi</h4>
                            <p> <span style="font-weight: bold; font-size: medium;">
                                {!! (isset($portal->name) ? $portal->name:"") !!}
                                </span><br>
                            {!! (isset($portal->address) ? $portal->address:"") !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info">
                        <div class="email mt-0">
                            <i class="icofont-envelope"></i>
                            <h4>Emel</h4>
                        <p>{!! (isset($portal->email_admin) ? $portal->email_admin:"") !!}</p>
                        </div>
                    </div>
                    <div class="info">
                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Hubungi</h4>
                        <p>{{ (isset($portal->contact) ? $portal->contact:"") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>


    <script>
        $(document).ready(function() {
            <?php
            if(Session::has('message')){
                ?>
                //alert("{{ Session::get('message') }}");
                <?php
            }
            ?>
            $(document).on("click", ".aUmum", function() {
                var umumid = $(this).data("umumid");
                $("#form_umum_" + umumid).submit();
            });
        });
    </script>

@stop
