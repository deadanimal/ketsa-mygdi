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
    .text-custom {
        /* text-align:center !important; */
        font-size: 10;
        font-weight: bold;
    }

    .mx-6 {
        margin-left: 50px;
        margin-right: 50px;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 50%;
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

</style>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="column-auto">
                                        <img src="{{ public_path('storage/jatanegara.png') }}" alt="PGN" height="80"
                                            style="">
                                    </div>
                                    <div class="column-auto">
                                        <span style="font-weight: bold">
                                            KEMENTERIAN TENAGA DAN SUMBER ASLI (KeTSA) <br></span>
                                        <i style="font-weight: bold">(Ministry of Energy and Natural Resources) <br></i>
                                        Pusat Geospatial Negara (PGN) <br>
                                        <i>National Geospatial Centre <br></i>
                                        Aras 7 & 8, Wisma <br>
                                        Sumber Asli <br>
                                        No. 25, Persiaran Perdana, Presint 4 <br>
                                        62574 PUTRAJAYA
                                    </div>
                                    <div class="column" style="padding-top: 130px;">
                                        <p style="font-size: 10px;">
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
                                    </div>
                                    <div class="column">
                                        <span>Rujukan : KeTSA 606-4/3/2 Jld.13 (1q)</span> <br>
                                        <span>Tarikh : {{ Carbon\Carbon::now()->format('d M Y') }}</span>
                                    </div>
                                </div> <br>
                                <p align="justify">
                                    {{ $permohonan->username }},<br>{{ $permohonan->alamat }}
                                    <br><br>

                                    Tuan/Puan,<br><br>
                                    <span class="text-custom">{{ $surat->tajuk_surat }}</span><br>
                                    {{-- <span class="form-inline">Dengan segala hormatnya merujuk kepada surat tuan/puan
                                        <i class="mx-2"> JPBD.Tr 1/1572/8({{$permohonan->id}}) </i>
                                        bertarikh
                                        <span
                                            class="mx-2">{{ Carbon\Carbon::parse($permohonan->date)->format('d M Y') }}</span>
                                        mengenai perkara di atas.</span><br><br>

                                    2. Sukacita dimaklumkan bahawa Pusat Geospatial Negara (PGN) ambil maklum dengan
                                    permohonan data geospatial terperingkat dan tiada halangan atas permohonan tersebut.
                                    Senarai data yang dibekalkan adalah seperti <span class="text-bold">Lampiran
                                        1</span>. Walau bagaimanapun, untuk
                                    permohonan metadata pula, pihak tuan/puan boleh melayari aplikasi MyGDI Explorer
                                    untuk mendapatkan informasi yang lebih terperinci
                                    <span class="text-bold">https://www.mygeoportal.gov.my/node/173.</span>
                                    <br><br>

                                    3. Untuk makluman tuan/puan, penggunaan data ini adalah terikat dengan Pekeliling Am
                                    Bil 1/2007: Pekeliling Arahan Keselamatan Terhadap Dokumen Geospatial Terperingkat,
                                    Akta Rahsia Rasmi 1972 dan Surat Pekeliling Am Bil 1 Tahun 1997 : Peraturan
                                    Pemeliharaan Rekod-Rekod Kerajaan. <br><br>

                                    4. Pihak tuan/puan boleh melayari Aplikasi MyGDI Data Services di
                                    <span class="text-bold">https://mygos.mygeoportal.gov.my/myservices</span> bagi
                                    mendapatkan paparan data asas GDC
                                    yang boleh dikongsi antara agensi kerajaan melalui program MyGDl. Permohonan untuk
                                    mendapatkan capaian ke aplikasi ini boleh dihantar kepada pihak PGN melalui emel
                                    <span class="text-bold">pgn.ktotQketsa.gov.mv.</span> <br><br>

                                    5. Sebarang pertanyaan mengenai kesahihan dan ketepatan data perlulah dirujuk kepada
                                    Agensi Pembekal Data (APD) yang berkenaan. Penggunaan data ini selain daripada
                                    tujuan asal yang dimohon perlulah mendapat kebenaran daripada pihak APD dan PGN.
                                    <br><br>

                                    6. Mohon kerjasama pihak tuan/puan untuk melengkapkan Borang Pengesahan Penerimaan
                                    Data Geospatial seperti di <span class="text-bold">Lampiran 2</span> dan Borang
                                    Penilaian Perkongsian Data Melalui
                                    MyGDI seperti di <span class="text-bold">Lampiran 3</span> dan dikembalikan
                                    semula
                                    kepada pihak PGN dalam tempoh
                                    dua minggu dari tarikh surat ini. Sekiranya ada sebarang pertanyaan, sila hubungi
                                    Puan Normala Binti Mohamed Solehhin di talian 03-8886 1193 (normala@ketsa.gov.my).
                                    <br><br>
                                    Sekian terima kasih.
                                    <br><br>
                                    <span style="font-weight: bold">"BERKHIDMAT UNTUK NEGARA"</span><br><br>
                                    <i> **Ini adalah surat cetakan komputer, tidak perlu tandatangan**</i> --}}

                                </p>
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
