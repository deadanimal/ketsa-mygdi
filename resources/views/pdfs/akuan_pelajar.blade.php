<!DOCTYPE html>
<html>

<head>
    <title>MyGeo Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}
</head>
<style>
    h3,
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 83%;
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
        margin: 0 60px;
        padding: 0;
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

    u,
    .underline {
        /* flex-grow: 1; */
        border-bottom: 1.5px dotted #000;
        text-decoration: none;
    }

</style>
<style>
    .content-wrapper {
        word-wrap: break-word;
        width: 100%;
    }

    .brg1 {
        top: 0;
        position: absolute;
        z-index: -999;
    }

    .page_break {
        page-break-before: always;
    }

    .title {
        top: 8.65%;
        position: relative;
        text-indent: 47%;
    }

    .username {
        top: 12.5%;
        position: relative;
        text-indent: 35%;
    }

    .nric {
        top: 10%;
        position: relative;
        text-indent: 18%;
    }

    .institusi {
        top: 8.8%;
        position: relative;
        text-indent: 8%;
    }

    .others {
        margin-top: 78.5%;
        position: relative;
        margin-left: 8.3%;
        margin-right: 3%;
    }

    .sign {
        margin-top: 60%;
        position: relative;
        text-indent: 55%;
    }

    .tarikh {
        margin-top: 15px;
        position: relative;
        text-indent: 55%;
    }

    .pemohon {
        margin-top: 15px;
        position: relative;
        text-indent: 55%;
    }

    .alamat {
        margin-top: 27px;
        position: relative;
        margin-left: 45%;
    }

</style>


<body>
    <div class="content-wrapper" style="width:100%;">
        <div>

            <div class="brg1">
                <img src="{{ $borang1 }}" alt="borang" style="width: 100%;">
            </div>
            <div class="mx-6">
                <div class="title">
                    <p>{{ $akuan->title }}</p>
                </div>
                <div class="username">
                    <p>{{ $permohonan->username }}</p>
                </div>
                <div class="nric">
                    <p>{{ $permohonan->nric }}</p>
                </div>
                <div class="institusi">
                    <p>{{ $agensi_name }}</p>
                </div>
                <ol type="a">
                    <div class="others">
                        @foreach ($skdatas as $sk)
                            <li><u>{{ $sk->lapisan_data }} -
                                    {{ $sk->kawasan_data }}</u>
                            </li>
                        @endforeach
                    </div>
                </ol>

            </div>
            <div class="page_break"></div>
            <div class="brg1">
                <img src="{{ $borang2 }}" alt="borang" style="width: 100%;">
            </div>
            <div class="sign">
                <img src="{{ public_path($akuan->digital_sign) }}" alt="Gambar Tandatangan" height="70">
            </div>
            <div class="tarikh">
                {{ Carbon\Carbon::parse($akuan->date_mohon)->format('d/m/Y') }}
            </div>
            <div class="pemohon">{{ $permohonan->username }}</div>
            <div class="alamat">{{ $permohonan->alamat }}</div>


        </div>
        {{-- <div class=" content">
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
                                                <div class="underline">{{ $akuan->title }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="main">
                                        <li>
                                            Saya (nyatakan nama)
                                            <div class="underline">{{ $permohonan->username }}</div>
                                            K.P. No <div class="underline">{{ $permohonan->nric }}</div> yang
                                            bertandatangan di bawah ini, sebagai
                                            seorang pelajar di (nyatakan nama Universiti/Institusi dan alamat penuh)
                                            <div class="underline">{{ $agensi_name }}</div>
                                            dengan ini memberi jaminan bahawa saya akan menggunakan (nyatakan
                                            sama ada peta topografi / foto udara dan sebagainya)
                                            seperti butir-butir di bawah ini dengan mematuhi sepenuhnya
                                            syarat-syarat
                                            yang disebutkan di bawah.<br>
                                        </li><br>
                                        <li>Senarai Dokumen Geospatial Terperingkat<br></li><br>
                                        <ol class="roman">
                                            <li>(i) Peta Topografi :</li>
                                            <ol class="alpha">
                                                <li>(a)
                                                    <div>{{ $akuan->peta_topo_a != null ? $akuan->peta_topo_a : ' ' }}
                                                    </div>
                                                </li>
                                                <li>(b)
                                                    <u>{{ $akuan->peta_topo_b != null ? $akuan->peta_topo_b : ' ' }}</u>
                                                </li>
                                                <li>(c)
                                                    <u>{{ $akuan->peta_topo_c != null ? $akuan->peta_topo_c : ' ' }}</u>
                                                </li>
                                            </ol>
                                            <br>
                                            <li>(ii) Foto Udara :</li>
                                            <ol class="alpha">
                                                <li>(a)
                                                    <u>{{ $akuan->foto_udara_a != null ? $akuan->foto_udara_a : ' ' }}</u>
                                                </li>
                                                <li>(b)
                                                    <u>{{ $akuan->foto_udara_b != null ? $akuan->foto_udara_b : ' ' }}</u>
                                                </li>
                                                <li>(c)
                                                    <u>{{ $akuan->foto_udara_c != null ? $akuan->foto_udara_c : ' ' }}</u>
                                                </li>
                                                </ol>
                                                <br>
                                                <li>(iii) Lain-lain :</li>
                                                <ol type="alpha">
                                                    @foreach ($skdatas as $sk)
                                                        <li><u>{{ $sk->lapisan_data }},
                                                                {{ $sk->kawasan_data }}</u>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </ol>
                                            <br><br>
                                            <li>Syarat-syarat :</li>
                                            <br>
                                            <ol class="roman" align="justify">
                                                <li>Di samping syarat-syarat yang dinyatakan di dalam Borang
                                                    PPNM – 1 (Pind. 1/2008) PERMOHONAN MEMBELI DOKUMEN GEOSPATIAL
                                                    TERPERINGKAT, maklumat-maklumat berkenaan akan digunakan
                                                    mengikut prinsip PERLU MENGETAHUI.</li><br>
                                                <li>Penggunaan bahan-bahan dengan Hak Cipta Kerajaan akan dibataskan
                                                    kepada keperluan sendiri sahaja. Penggunaan bahan-bahan berkenaan
                                                    untuk tujuan lain tidak dibenarkan.</li><br>
                                                <li>Kandungan bahan-bahan ini tidak akan dihebahkan atau disampaikan
                                                    secara langsung atau tidak langsung kepada pihak akhbar atau orang
                                                    lain
                                                    yang tidak diberi kuasa untuk menerimanya.</li><br>
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
        </div> --}}
    </div>
</body>

</html>
