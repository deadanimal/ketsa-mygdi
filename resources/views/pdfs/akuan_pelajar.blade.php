<!DOCTYPE html>
<html>

<head>
    <title>MyGeo Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<style>
    h3,
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 90%;
    }

    .text-center {
        text-align: center !important;
        font-size: 14px;
        font-weight: bold;
    }

    .text-right {
        text-align: right !important;
        font-size: 14px;
        font-weight: bold;
    }

</style>
<style type="text/css">
    .text-custom {
        /* text-align:center !important; */
        font-size: 10;
        font-weight: bold;
    }

    .mx-6 {
        margin-left: 70px;
        margin-right: 70px;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 30%;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    .column-auto {
        float: left;
        width: auto;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
        padding-top: 0px;
    }

    hr {
        border-top: 1px solid black;
        padding-top: 0;
    }

    ol.main {
        padding-left: 15px;
    }



    li {
        text-align: justify;
    }

    u {
        border-bottom: 1.2px dotted #000;
        text-decoration: none;
    }

    .title-container {
        width: 100%;
    }

    div.title {
        display: inline;
        width: 200%;
        padding: 0;
    }

    .underline {
        /* flex-grow: 1; */
        border-bottom: 1.2px dotted #000;
    }

</style>
<style>
    ol.a {
        counter-reset: list;
    }

    ol.a>li {
        list-style: none;
    }

    ol.a>li:before {
        content: " ("counter(list, lower-alpha) ") ";
        counter-increment: list;
    }

    ol.roman {
        counter-reset: list;
    }

    ol.alpha {
        counter-reset: alpha;
    }

    ol.alpha>li,
    ol.roman>li {
        list-style: none;
        position: relative;
    }

    ol.roman>li:before {
        counter-increment: list;
        content: " ("counter(list, lower-roman)") ";
    }

    ol.alpha>li:before {
        counter-increment: alpha;
        content: " ("counter(alpha, lower-alpha)") ";
    }

</style>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-body">
                                <div class="mx-6">
                                    <p class="text-right">LAMPIRAN IV</p>
                                    <br>
                                    <p class="text-center">AKUAN PELAJAR</p>
                                    <div class="title-container">
                                        <div class="title">
                                            <div>(Sila nyatakan tajuk tesis/projek/kajian
                                                <p class="underline">{{ $akuan->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="main">
                                        <li align="justify">Saya (nyatakan nama)
                                            <u>{{ $permohonan->username }}</u>
                                            K.P. No <u>{{ $permohonan->nric }}</u> yang
                                            bertandatangan di bawah ini, sebagai
                                            seorang pelajar di (nyatakan nama Universiti/Institusi dan alamat penuh)
                                            <u>{{ $agensi_name }}</u>
                                            dengan ini memberi jaminan bahawa saya akan menggunakan (nyatakan
                                            sama ada peta topografi / foto udara dan sebagainya)
                                            seperti butir-butir di bawah ini dengan mematuhi sepenuhnya
                                            syarat-syarat
                                            yang disebutkan di bawah.<br>
                                        </li><br>
                                        <li>Senarai Dokumen Geospatial Terperingkat<br></li>
                                        <ol type="i">
                                            <li>Peta Topografi :</li>
                                            <ol class="a">
                                                <li><u>{{ $akuan->peta_topo_a != null ? $akuan->peta_topo_a : ' ' }}</u>
                                                </li>
                                                <li><u>{{ $akuan->peta_topo_b != null ? $akuan->peta_topo_b : ' ' }}</u>
                                                </li>
                                                <li><u>{{ $akuan->peta_topo_c != null ? $akuan->peta_topo_c : ' ' }}</u>
                                                </li>
                                            </ol>
                                            <br>
                                            <li>Foto Udara :</li>
                                            <ol type="a">
                                                <li><u>{{ $akuan->foto_udara_a != null ? $akuan->foto_udara_a : ' ' }}</u>
                                                </li>
                                                <li><u>{{ $akuan->foto_udara_b != null ? $akuan->foto_udara_b : ' ' }}</u>
                                                </li>
                                                <li><u>{{ $akuan->foto_udara_c != null ? $akuan->foto_udara_c : ' ' }}</u>
                                                </li>
                                            </ol>
                                            <br>
                                            <li>Lain-lain :</li>
                                            <ol type="a">
                                                @foreach ($skdatas as $sk)
                                                    <li><u>{{ $sk->lapisan_data }}, {{ $sk->kawasan_data }}</u></li>
                                                @endforeach
                                            </ol>
                                        </ol>
                                        <br><br>
                                        <li>Syarat-syarat :</li>
                                        <br>
                                        <ol type="i" align="justify">
                                            <li>Di samping syarat-syarat yang dinyatakan di dalam Borang
                                                PPNM – 1 (Pind. 1/2008) PERMOHONAN MEMBELI DOKUMEN GEOSPATIAL
                                                TERPERINGKAT, maklumat-maklumat berkenaan akan digunakan
                                                mengikut prinsip PERLU MENGETAHUI.</li>
                                            <li>Penggunaan bahan-bahan dengan Hak Cipta Kerajaan akan dibataskan
                                                kepada keperluan sendiri sahaja. Penggunaan bahan-bahan berkenaan
                                                untuk tujuan lain tidak dibenarkan.</li>
                                            <li>Kandungan bahan-bahan ini tidak akan dihebahkan atau disampaikan
                                                secara langsung atau tidak langsung kepada pihak akhbar atau orang
                                                lain
                                                yang tidak diberi kuasa untuk menerimanya.</li>
                                            <li>Bahan-bahan ini akan dibawa balik ke Malaysia dalam masa 6 bulan.
                                                Pengarah Pemetaan Negara, Malaysia hendaklah diberitahu mengenai
                                                tarikh bahan-bahan dibawa keluar dan dikembalikan ke
                                                Malaysia.<br><br>
                                        </ol>
                                    </ol>
                                    <div class="row">
                                        <div class="column"></div>
                                        <div class="column-auto">
                                            Tandatangan Pelajar:
                                            <img src="{{ public_path($akuan->digital_sign) }}"
                                                alt="Gambar Tandatangan" height="70"><br>
                                            Tarikh:
                                            <u>{{ Carbon\Carbon::parse($akuan->date_mohon)->format('d/m/Y') }}</u><br>
                                            Nama: <u>{{ $permohonan->username }}</u><br>
                                            Alamat: <u>{{ $permohonan->alamat }}</u>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
