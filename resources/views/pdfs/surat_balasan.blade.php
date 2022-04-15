<!DOCTYPE html>
<html>

<head>
    <title>MyGeo Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
</head>
<style>
    html,
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 95%;
    }

    .text-custom {
        /* text-align:center !important; */
        font-size: 10;
        font-weight: bold;
    }

    .mx-6 {
        margin: 0 45px;
        padding: 0;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: right;
        width: 100%;
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

    .ql-align-justify {
        text-align: justify
    }

    .alamat {
        width: 200px;
        word-wrap: break-word;
        padding: 0;
        margin: 0
    }

</style>


<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-header mx-6">
                                <div class="row">
                                    <div class="column-auto">
                                        <img src="https://www.malaysia.gov.my/media/uploads/c9558a31-7723-4558-9fee-f69baca119ff.png"
                                            alt="PGN" height="80" style="">
                                    </div>
                                    <div class="column-auto">
                                        <span style="font-weight: bold">
                                            KEMENTERIAN TENAGA DAN SUMBER ASLI (KeTSA) <br></span>
                                        <i style="font-weight: bold">(Ministry of Energy and Natural Resources) <br></i>
                                        Pusat Geospatial Negara (PGN) <br>
                                        <i>National Geospatial Centre <br></i>
                                        Aras 7 & 8,
                                        Wisma Sumber Asli, <br>
                                        No. 25, Persiaran Perdana, Presint 4 <br>
                                        62574 PUTRAJAYA
                                    </div>
                                    <div class="column" style="padding-top: 130px;">
                                        <p style="font-size: 10px; float:right;">
                                            Tel : +603-8000 8000 (1MOCC) <br>
                                            Faks : +603-8889 4851 <br>
                                            Portal Rasmi : www.ketsa.gov.my
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body mx-6">
                                <div class="row" style="border-top: 1px solid black;">
                                    <div class="column">
                                        <div style="float: right">
                                            <span>Rujukan : KeTSA 606-4/3/2 Jld.13 (1q)</span> <br>
                                            <?php Carbon\Carbon::setlocale(config('app.locale2')); ?>
                                            <span>Tarikh :
                                                {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </div>
                                </div> <br>
                                <div>
                                    {!! $surat->nama_alamat ?? $permohonan->username !!},
                                </div>
                                <div class="alamat">{{ $permohonan->alamat }}</div>
                                <div>{!! $surat->content !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
