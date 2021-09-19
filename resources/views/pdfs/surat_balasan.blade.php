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

</style>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-header bg-default">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="text-white mb-0">Surat Balasan</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ url('simpan_surat_balasan') }}" method="POST">
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4">
                                            <div class="form-inline">
                                                Rujukan : KeTSA 606-4/3/2 Jld.13 (1q)
                                                <input type="hidden" name="no_rujukan" value="KeTSA 606-4/3/2 Jld.13 (1q)">
                                                <input type="hidden" name="date_mohon" value="{{$permohonan->date}}">
                                            </div>
                                            <div class="form-inline">
                                                Tarikh : {{ Carbon\Carbon::now()->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <p align="justify" class="mx-6">
                                        <textarea class="form-control form-control-sm mt-3" cols="30"
                                            placeholder="Nama dan Alamat" rows="10">{{$permohonan->users->name}},&#13;&#10;{{$permohonan->users->alamat}}
                                        </textarea>


                                        Tuan/Puan,<br>
                                        <input type="text" class="form-control form-control-sm heading" name="tajuk_surat"
                                            placeholder="Tajuk Surat Balasan Permohonan" value="{{$surat->tajuk_surat}}">

                                        <span class="form-inline">Dengan segala hormatnya merujuk kepada surat tuan/puan <i class="mx-2"> JPBD.Tr 1/1572/8(27) </i>
                                            <input type="hidden" class="form-control form-control-sm col-3 mx-1"
                                                name="no_rujukan_mohon" value="JPBD.Tr 1/1572/8(27)">
                                            bertarikh
                                            <span class="mx-2">{{ Carbon\Carbon::parse($permohonan->date)->format('d M Y') }}</span>
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
                                        MyGDI seperti di <span class="text-bold">Lampiran 3</span> dan dikembalikan semula
                                        kepada pihak PGN dalam tempoh
                                        dua minggu dari tarikh surat ini. Sekiranya ada sebarang pertanyaan, sila hubungi
                                        Puan Normala Binti Mohamed Solehhin di talian 03-8886 1193 (normala@ketsa.gov.my).
                                        <br><br><br>


                                        Sekian terima kasih.
                                        <br><br><br>
                                        <i> **Ini adalah surat cetakan komputer, tidak perlu tandatangan**</i>

                                    </p>
                                    @csrf

                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                    <input type="hidden" name="id" value="{{ $permohonan->id }}">

                                    @if (Auth::user()->hasRole(['Pentadbir Data', 'Super Admin']))
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
