<!DOCTYPE html>
<html>

<head>
    <title>MyGeo Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    h3,
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .text-center {
        text-align: center !important;
        font-size: 18;
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
        margin-left: 30px;
        margin-right: 30px;
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

    /* ol {
        margin: 0;
        padding: 0;
    } */

    li {
        text-align: justify;
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
                                <p class="text-center">AKUAN PELAJAR</p>
                                <div class="mx-6 pr-lg-5">
                                    (Sila nyatakan tajuk tesis/projek/kajian
                                    <u>{{ $akuan->title }}</u>
                                    <ol>
                                        <li align="justify">Saya (nyatakan nama) <u>{{ $permohonan->username }}</u>
                                            K.P. No <u>{{ $permohonan->nric }}</u> yang
                                            bertandatangan di bawah ini, sebagai
                                            seorang pelajar di (nyatakan nama Universiti/Institusi dan alamat penuh)
                                            <u>{{ $permohonan->agensi_name }}</u>
                                            dengan ini memberi jaminan bahawa saya akan menggunakan (nyatakan
                                            sama ada peta topografi / foto udara dan sebagainya)
                                            seperti butir-butir di bawah ini dengan mematuhi sepenuhnya syarat-syarat
                                            yang disebutkan di bawah.<br>
                                        </li><br>
                                        <li>Senarai Dokumen Geospatial Terperingkat<br></li>
                                        <ol type="i">
                                            <li>Peta Topografi :</li>
                                            <ol type="a">
                                                <li><u>{{ $akuan->peta_topo_a }}</u></li>
                                                <li><u>{{ $akuan->peta_topo_b }}</u></li>
                                                <li><u>{{ $akuan->peta_topo_c }}</u></li>
                                            </ol>
                                            <br>
                                            <li>Foto Udara :</li>
                                            <ol type="a">
                                                <li><u>{{ $akuan->foto_udara_a }}</u></li>
                                                <li><u>{{ $akuan->foto_udara_b }}</u></li>
                                                <li><u>{{ $akuan->foto_udara_c }}</u></li>
                                            </ol>
                                            <br>
                                            <li>Lain-lain :</li>
                                            <ol type="a">
                                                <li><u>{{ $akuan->lain_a }}</u></li>
                                                <li><u>{{ $akuan->lain_b }}</u></li>
                                                <li><u>{{ $akuan->lain_c }}</u></li>
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
                                                secara langsung atau tidak langsung kepada pihak akhbar atau orang lain
                                                yang tidak diberi kuasa untuk menerimanya.</li>
                                            <li>Bahan-bahan ini akan dibawa balik ke Malaysia dalam masa 6 bulan.
                                                Pengarah Pemetaan Negara, Malaysia hendaklah diberitahu mengenai
                                                tarikh bahan-bahan dibawa keluar dan dikembalikan ke Malaysia.<br><br>
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
