<!DOCTYPE html>
<html>

<head>
    <title>MyGeo Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/assets/bootstrap3.min.css" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
        margin-left: 25px;
        margin-right: 25px;
    }

    .username {
        top: 16.5%;
        left: 35.5%;
        position: absolute;
    }

    .nric {
        top: 15%;
        left: 23%;
        position: absolute;
        text-indent: 18%;
    }

    .institusi {
        top: 21.2%;
        left: 15%;
        position: absolute;
    }

    .others {
        margin-top: 78.5%;
        position: absolute;
        margin-left: 8.3%;
        margin-right: 3%;
    }

    .sign {
        margin-top: 60%;
        position: relative;
        text-indent: 50%;
    }

    .tarikh {
        margin-top: 15px;
        position: relative;
        text-indent: 50%;
    }

    .pemohon {
        margin-top: 15px;
        position: relative;
        text-indent: 50%;
    }

    .alamat {
        top: 57.5%;
        position: absolute;
        left: 43%;
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
                    <p>{{ $akuan->nama1 ?? $permohonan->username }}</p>
                </div>
                <div class="nric">
                    <p>{{ $akuan->nric ?? $permohonan->nric }}</p>
                </div>
                <div class="institusi">
                    <p>{!! nl2br($akuan->agensi_organisasi) ?? $agensi_name !!}</p>
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
                <img src="{{ url($akuan->digital_sign) }}" alt="Gambar Tandatangan" height="70">
            </div>
            <div class="tarikh">
                {{ Carbon\Carbon::parse($akuan->date_mohon)->format('d/m/Y') }}
            </div>
            <div class="pemohon">{{ $akuan->nama2 ?? $permohonan->username }}</div>
            <div class="alamat">{!! nl2br($akuan->alamat ?? $permohonan->alamat) !!}</div>


        </div>

    </div>
</body>

</html>
