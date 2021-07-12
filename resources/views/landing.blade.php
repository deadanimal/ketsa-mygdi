@extends('layouts.app_afiq')

@section('content')

<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">


<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        height: 430px;
        width: 100%;
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
</style>
<!-- ======= Header ======= -->
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li class="active"><a href="#home"><i class="bx bx-home"></i> <span>Laman Utama</span></a></li>
            <li><a href="#home2"><i class="bx bx-map-alt"></i> <span>Carian Metadata</span></a></li>
            <li><a href="#about"><i class="bx bx-food-menu"></i> <span>MyGeo Explorer</span></a></li>
            <li><a href="#userguide"><i class="bx bx-mouse"></i> <span>Panduan Pengguna</span></a></li>
            <li><a href="#feedback"><i class="bx bx-support"></i> <span>Maklum Balas</span></a></li>
            <li><a href="#contact"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
    </nav><!-- .nav-menu -->

</header>
<!-- ======= Laman Utama Section ======= -->
<section id="home" class="d-flex flex-column justify-content-center">
    <div class="container-fluid pr-lg-5" data-aos="fade-up">
        <div class="row mt-0 pt-0 mb-5">
            <div class="col-12">
                <p>Selamat Datang ke</p>
                <h1><span class="typed" data-typed-items="MyGeo Explorer"></span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url('assetsweb/img/gallery.jpeg') }}" alt="">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('assetsweb/img/pgnketsa.png') }}" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('assetsweb/img/gallery.jpeg') }}" alt="">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<section id="home2" class="d-flex flex-column justify-content-center">
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-title">
            <h2>Carian Metadata</h2>
        </div>
        <div class="row pl-lg-7">
            <div class="col-lg-4">
                <div _ngcontent-ula-c486="" class="card umum_card" style="background-color: rgba(255, 255, 255, 0.527);">
                    <div class="card-header text-center umum_header">
                        <h1 class="card-title m-0" style="color: #161616;"><i class="fas fa-bullhorn fa-spin mr-2"></i>PENGUMUMAN</h1>
                    </div>
                    <div class="card-body">
                        <div class="card mb-0 umum_body" style="background-color: rgba(255, 255, 255, 0.808);">
                            <div class="card-body scrollf">
                                <?php
                                foreach ($pengumuman as $umum) {
                                    ?>
                                    <form id="form_umum_{{ $umum->id }}" method="post" action="{{ url('/tunjuk_pengumuman') }}">
                                        @csrf
                                        <input type="hidden" name="umum_id" value="{{ $umum->id }}">
                                        <a href="#" class="aUmum" data-umumid="{{ $umum->id }}">
                                            <span style="color: #252525;">
                                                <?php echo date('j M Y', strtotime($umum->created_at)); ?>
                                            </span>
                                            <p class="text-black">
                                                <?php echo $umum->kategori; ?>: <br>
                                                <?php echo $umum->title; ?>
                                            </p>
                                        </a>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center umum_footer">
                        <a class="badge badge-custom btnPaparSemuaPengumuman" href="{{ url('/senarai_pengumuman') }}">PAPAR SEMUA &gt;</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <!-- <div class="text-center">
                    <form method="post" class="navbar-search navbar-search-light form-inline my-4 justify-content-center" action="{{url('carian_metadata_nologin')}}" id="form_carian">
                        @csrf
                        @include('modal_carian_tambahan')
                        <div class="form-inline mb-0">
                            <div class="input-group input-group-alternative input-group-merge" style="background-image: linear-gradient(to right, #ebba16, #ed8a19);">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input placeholder="Carian..." type="text" name="carian" id="carian" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <button type="button" data-action="search-close" data-target="#navbar-search-main" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <a class="btn btn-sm btn-success text-white text-center btn_cari_submit" style="cursor:pointer;">
                        <span><i class="mr-2 fas fa-search"></i></span>
                        Cari
                    </a>
                    <a class="btn btn-sm btn-primary text-white text-center" data-toggle="modal" data-target="#modal-carian-tambahan" style="cursor:pointer;">
                        Carian Tambahan &gt;&gt;
                    </a>
                </div> -->

                <div class="row mt-0 pt-0">
                    <div class="col-12 form-inline justify-content-center">
                        <form method="post" class="navbar-search navbar-search-light form-inline my-4 justify-content-center" action="{{url('carian_metadata_nologin')}}" id="form_carian">
                            @csrf
                            @include('modal_carian_tambahan')
                            <div class="form-inline mb-0">
                                <div class="input-group input-group-alternative input-group-merge" style="background-image: linear-gradient(to right, #ebba16, #ed8a19);">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <input placeholder="Carian..." type="text" name="carian" id="carian" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <button type="button" data-action="search-close" data-target="#navbar-search-main" aria-label="Close" class="close">
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
                                <div class="card-body pointer form-inline" tabindex="0" ng-reflect-router-link="/metadata">
                                    <img height="90" src="./afiqlogin_files/metadata.png">
                                    <h2 class="mx-auto mb-0">Metadata</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('data_asas_landing') }}">
                            <div class="card fancy_card">
                                <div class="card-body pointer form-inline" tabindex="0" ng-reflect-router-link="/data-asas">
                                    <img height="90" src="./afiqlogin_files/dataapp.png">
                                    <h2 class="mx-auto mb-0">Data Asas</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- <div _ngcontent-lqr-c499="" class="col-lg-1">
                <div _ngcontent-lqr-c499="" class="form-group mt-7">
                    <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 ml-4 float-right">
                        <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0"
                            ng-reflect-router-link="/metadata">
                            <a href="{{ url('senarai_metadata_nologin') }}"><img _ngcontent-lqr-c499="" height="50"
                                    src="./afiqlogin_files/metadata.png"></a>
                        </div>
                        <span _ngcontent-lqr-c499="" class="text-center mt-2">Metadata</span>
                    </div>
                    <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 ml-4 float-right">
                        <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0"
                            ng-reflect-router-link="/data-asas">
                            <img _ngcontent-lqr-c499="" height="50" src="./afiqlogin_files/dataapp.png">
                        </div>
                        <span _ngcontent-lqr-c499="" class="text-center mt-2">Data Asas</span>
                    </div>
                    <div _ngcontent-lqr-c499="" class="card fancy_card square rounded-circle mt-4 float-right">
                        <div _ngcontent-lqr-c499="" class="card-body pointer" tabindex="0"
                            ng-reflect-router-link="/tutorial">
                            <img _ngcontent-lqr-c499="" height="50" src="./afiqlogin_files/tutorial.png">
                        </div>
                        <span _ngcontent-lqr-c499="" class="text-center mt-2">Tutorial</span>
                    </div>
                </div>
            </div> -->
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

<section id="userguide" class="">
    <div class="container" data-aos="fade-up" style="min-height: 500px;">

        <div class="section-title">
            <h2>Panduan Pengguna</h2>
        </div>
        <div class="row pb-7">
            <div class="col-12">
                <p align="center">
                    MyGeo Explorer sesuai dilayari oleh semua perisian pelayar (Desktop & Versi Mobile) atau mana-mana perisian pelayan web yang setara dengannya. Jika anda menggunakan pelayar versi terdahulu atau selainnya, segelintir paparan tidak dapat dilakukan dengan sempurna.<br>
                    Pelayar web mestilah menyokong penggunaan JavaScript, Cascading Style Sheet, warna, format teks dan fungsi-fungsi asas yang lain.Resolusi minima yang bersesuaian untuk memaparkan laman web ini ialah 1024 x 768 piksel.<br>
                    Muat Turun PDF Panduan Pengguna:
                </p>
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

        <form method="post" class="form-horizontal" action="{{url('simpan_maklum_balas')}}" id="form_maklum_balas" style="min-height: 300px;">
            <div class="pl-lg-6">
                <div class="row mb-3">
                    <div class="col-2"><label for="input-agensi" class="form-control-label ml-4"> Kategori </label>
                    </div>
                    <div class="col-9"><select id="input-agensi" class="form-control form-control-sm ml-3">
                            <option selected disabled hidden=""> Pilih Kategori </option>
                            <option value="metadata">Metadata</option>
                            <option value="permohonan data asas">Permohonan Data-data Asas</option>
                            <option value="lain-lain">Lain-lain</option>
                        </select></div>
                </div>
                <div class="row mb-3">
                    <div class="col-2"><label for="input-feedback" class="form-control-label ml-4"> Pertanyaan </label>
                    </div>
                    <div class="col-9"><textarea name="pertanyaan" placeholder="Nyatakan maklum balas anda" type="text" rows="5" class="form-control form-control-sm ml-3"></textarea></div>
                </div>
                <div class="row mb-3">
                    <div class="col-2"><label for="input-emel" class="form-control-label ml-4"> Emel Personal </label>
                    </div>
                    <div class="col-7"><input placeholder="Masukan E-mel anda" type="text" name="email" class="form-control form-control-sm ml-3"></div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary float-right" id="btnHantar"><i class="fas fa-paper-plane mr-2"></i>Hantar</button>
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
                                Pusat Geospatial Negara (PGN) <br>
                                Kementerian Tenaga dan Sumber Asli (KeTSA) <br>
                            </span>
                            Aras 7 & 8, Wisma Sumber Asli <br>
                            No 25, Persiaran Perdana, Presint 4 <br>
                            62574 Putrajaya, Malaysia
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info">
                    <div class="email mt-0">
                        <i class="icofont-envelope"></i>
                        <h4>Emel</h4>
                        <p>adminexplorer@ketsa.gov.my</p>
                    </div>
                </div>
                <div class="info">
                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Hubungi</h4>
                        <p>Tel: +603 8886 1156 | Faks: +603 8889 4851</p>
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
        $(document).on("click", ".aUmum", function() {
            var umumid = $(this).data("umumid");
            $("#form_umum_" + umumid).submit();
        });
    });
</script>

@stop
