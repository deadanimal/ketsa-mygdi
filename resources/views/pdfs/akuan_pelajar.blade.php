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
                                        <h3 class="text-white mb-0">Borang Akuan Pelajar</h3>
                                    </div>

                                    <div class="col-4 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                    <h3 class="text-center">AKUAN PELAJAR</h3>
                                    <p class="mx-6 pr-lg-4">
                                        (Sila nyatakan tajuk tesis/projek/kajian
                                        <input type="text" class="form-control form-control-sm" name="title"
                                            placeholder="Tajuk" value="{{ $akuan->title }}"><br>
                                    <ol align="justify" class="mx-5 pr-lg-4">
                                        <li>Saya (nyatakan nama) <input type="text" class="form-control form-control-sm"
                                                name="nama" disabled value="{{ $permohonan->users->name }}">
                                            K.P. No <input type="text" class="form-control form-control-sm" name="nric"
                                                disabled placeholder="No Kad Pengenalan"
                                                value="{{ $permohonan->users->nric }}"> yang
                                            bertandatangan di bawah ini, sebagai
                                            seorang pelajar di (nyatakan nama Universiti/Institusi dan alamat penuh)
                                            <textarea name="agensi_organisasi" rows="4" class="form-control form-control-sm"
                                                name="agensi_organisasi" disabled>{{ $permohonan->users->agensi_organisasi }}, {{ $permohonan->users->alamat }}
                                                             </textarea>
                                            dengan ini memberi jaminan bahawa saya akan menggunakan (nyatakan
                                            sama ada peta topografi / foto udara dan sebagainya)
                                            seperti butir-butir di bawah ini dengan mematuhi sepenuhnya syarat-syarat
                                            yang disebutkan di bawah.<br>
                                        </li><br><br>
                                        <li>Senarai Dokumen Geospatial Terperingkat<br></li>
                                        <ol type="i">
                                            <li>Peta Topografi :</li>
                                            <ol type="a">
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="peta_topo_a"
                                                            placeholder="Peta Topologi A"
                                                            value="{{ $akuan->peta_topo_a }}"></span></li>
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="peta_topo_b"
                                                            placeholder="Peta Topologi B"
                                                            value="{{ $akuan->peta_topo_b }}"></span></li>
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="peta_topo_c"
                                                            placeholder="Peta Topologi C"
                                                            value="{{ $akuan->peta_topo_c }}"></span></li>
                                            </ol>
                                            <br><br>
                                            <li>Foto Udara :</li>
                                            <ol type="a">
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="foto_udara_a"
                                                            placeholder="Foto Udara A"
                                                            value="{{ $akuan->foto_udara_a }}"></span></li>
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="foto_udara_b"
                                                            placeholder="Foto Udara B"
                                                            value="{{ $akuan->foto_udara_b }}"></span></li>
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="foto_udara_c"
                                                            placeholder="Foto Udara C"
                                                            value="{{ $akuan->foto_udara_c }}"></span></li>
                                            </ol>
                                            <br><br>
                                            <li>Lain-lain :</li>
                                            <ol type="a">
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="lain_a"
                                                            placeholder="Lain-lain A"
                                                            value="{{ $akuan->lain_a }}"></span></li>
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="lain_b"
                                                            placeholder="Lain-lain B"
                                                            value="{{ $akuan->lain_b }}"></span></li>
                                                <li><span class="form-inline"><input type="text"
                                                            class="form-control form-control-sm" name="lain_c"
                                                            placeholder="Lain-lain C"
                                                            value="{{ $akuan->lain_c }}"></span></li>
                                            </ol>
                                        </ol>
                                        <br><br>
                                        <li>Syarat-syarat</li>
                                        <br>
                                        <ol type="i">
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
                                                Tandatangan</li>
                                        </ol>
                                    </ol>


                                    <br><br>
                                    <div class="mx-6 pl-lg-8">
                                        Tandatangan Pelajar:
                                        {{-- <img src="{{ $akuan->digital_sign }}" alt="Gambar Tandatangan" height="120">
                                        <input type="file" class="form-control form-control-sm py-0" name="file"
                                            placeholder="Digital Sign">
                                        <input type="hidden" name="date_sign" value="{{ Carbon\Carbon::now() }}">
                                        Tarikh:<input type="text" class="form-control form-control-sm"
                                            placeholder="Auto Pilih Tarikh Semasa" disabled
                                            value="{{ Carbon\Carbon::parse($akuan->date_mohon)->format('d M Y') }}">
                                        Nama:<input type="text" class="form-control form-control-sm"
                                            value="{{ $permohonan->users->name }}" disabled>
                                        Alamat:<textarea class="form-control form-control-sm" cols="30" rows="6"
                                            disabled>{{ $permohonan->users->alamat }}</textarea> --}}
                                    </div>

                                    <input type="hidden" name="permohonan_id" value="{{ $permohonan->id }}">
                                    <input type="hidden" name="id" value="{{ $permohonan->id }}">

                                    </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
