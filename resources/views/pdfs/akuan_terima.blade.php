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

    label {
        display: block;
        padding-left: 15px;
        text-indent: -15px;
    }

    input {
        width: 13px;
        height: 13px;
        padding: 0;
        margin: 0;
        vertical-align: bottom;
        position: relative;
        top: -1px;
        *overflow: hidden;
    }
    h4{
        padding-bottom: 0;
        margin-bottom: 0;
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
                                <p class="text-center">BORANG PENGESAHAN PENERIMAAN MAKLUMAT
                                    GEOSPATIAL MELALUI
                                    MYGDI</p>
                                <div class="mx-6 pr-lg-5">
                                    <ol>
                                        <li>Saya bagi pihak Kementerian Tenaga dan Sumber Asli dengan ini mengesahkan
                                            telah
                                            menerima data geospatial MyGDI dari Pusat Geospatial Negara (PGN),
                                            Kementerian
                                            Tenaga dan Sumber Asli (KeTSA) seperti di <span
                                                class="text-bold">Lampiran
                                                1.</span>
                                        </li><br>
                                        <li> Kami memahami;</li><br>
                                        <dl>
                                            <ol type="i">
                                                <li>
                                                    Penggunaan data ini adalah terikat dengan Pekeliling Am Bil 1/2007:
                                                    Pekeliling Arahan Keselamatan Terhadap Dokumen Geospatial
                                                    Terperingkat,
                                                    Akta Rahsia Rasmi 1972 dan Surat Pekeliling Am Bil 1 Tahun 1997 :
                                                    Peraturan Pemeliharaan Rekod-Rekod Kerajaan.
                                                </li>
                                                <li>
                                                    Sebarang bentuk penggunaan data ini selain daripada tujuan yang
                                                    dinyatakan dalam
                                                    surat permohonan perlulah mendapat kebenaran daripada pihak Agensi
                                                    Pembekal
                                                    Data
                                                    (APD) iaitu Jabatan Pertanian, JUPEM, JPSM, JPS dan MPOB.
                                                </li>
                                                <li>
                                                    Sebarang bentuk pemindahan data ini kepada pihak ketiga atau
                                                    penyalinan
                                                    semula
                                                    data ini dalam sebarang bentuk/medium data adalah dilarang sama
                                                    sekali.
                                                </li>
                                                <li>
                                                    Pihak APD dan PGN tidak bertanggungjawab terhadap sebarang
                                                    kehilangan
                                                    atau
                                                    kerosakan yang dialami kerana menggunakan maklumat ini.
                                                </li>
                                            </ol>
                                            <br><br><br>
                                            <div class="custom-control custom-checkbox m-5">
                                                <label for="customCheck1"> <input type="checkbox" id="customCheck1"
                                                        name="customCheck1" checked disabled>Saya terima terma
                                                    dan
                                                    syarat diatas berikut</label><br>
                                            </div>
                                        </dl>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-0 mt-5">
                    <div class="column">
                        <h4 class="heading text-muted">PGN-ISMS-P3-019-002-{{ $permohonan->id }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
