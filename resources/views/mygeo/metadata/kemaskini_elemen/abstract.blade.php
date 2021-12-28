<div class="abstractApplication">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_namaAplikasi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aplikasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_namaAplikasi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_tujuan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_tujuan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_tahunPembangunan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_tahunPembangunan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_kemaskini']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kemaskini
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_kemaskini') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_dataTerlibat']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_dataTerlibat') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_sasaranPengguna']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Sasaran Pengguna
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_sasaranPengguna') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_versi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_versi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_versi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractApplication_perisianDigunaPembangunan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Perisian Yang Digunakan Dalam Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_perisianDigunaPembangunan') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractDocument">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractDocument_namaDokumen']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Dokumen
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_namaDokumen') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractDocument_tujuan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_tujuan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractDocument_tahunTerbitan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_tahunTerbitan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractDocument_edisi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_edisi') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractGISActivityProject">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractGISActivityProject_namaAktiviti']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aktiviti
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_namaAktiviti') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractGISActivityProject_tujuan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_tujuan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractGISActivityProject_lokasi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_lokasi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractGISActivityProject_tahun']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_tahun') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractMap">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_namaPeta']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Peta
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_namaPeta') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_kawasan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_kawasan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_tujuan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_tujuan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_tahunTerbitan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_tahunTerbitan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_edisi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_edisi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_edisi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_noSiri']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                No. Siri
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_noSiri') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_skala']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_skala" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_skala') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractMap_unit']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_unit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_unit') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractRasterData">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_namaData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_namaData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_lokasi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_lokasi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_rumusanData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_rumusanData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_tujuanData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_tujuanData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_kaedahPenyediaanData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_kaedahPenyediaanData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_format']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_format') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_unit']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_unit') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_skala']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_skala') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_statusData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_statusData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_tahunPerolehan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_tahunPerolehan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_jenisSatelit']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Jenis Satelit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_jenisSatelit') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_format']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_format') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_resolusi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Resolusi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_resolusi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractRasterData_kawasanLitupan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan Litupan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_kawasanLitupan') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractServices">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_namaServis']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Servis
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_namaServis') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_lokasi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_lokasi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_tujuan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_tujuan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_dataTerlibat']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_dataTerlibat') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_polisi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Polisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_polisi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_polisi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_peringkatCapaian']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Peringkat Capaian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_peringkatCapaian') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractServices_format']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_format') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractSoftware">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_namaPerisian']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_namaPerisian') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_versi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_versi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_tujuan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_tujuan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_tahunPengunaanPerisian']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Penggunaan Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_tahunPengunaanPerisian') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_kaedahPerolehan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_kaedahPerolehan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_format']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_format') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_pengeluar']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Pengeluar
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_pengeluar') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_keupayaan']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keupayaan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_keupayaan') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_dataTerlibat']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_dataTerlibat') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractSoftware_keperluanPerkakas']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keperluan Perkakasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_keperluanPerkakas') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractVectorData">
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_namaData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_namaData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_lokasi']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_lokasi') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_rumusanData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_rumusanData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_tujuanData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_tujuanData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_kaedahPenyediaanData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_kaedahPenyediaanData') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_format']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_format') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_unit']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_unit') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_skala']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_skala') }}">
        </div>
    </div>
    @endif
    @if($template->template[strtolower($_GET['kategori'])]['accordion2']['abstractVectorData_statusData']['status'] == 'active')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_statusData') }}">
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>
@if($template->template[strtolower($_GET['kategori'])]['accordion2']['c2_abstract']['status'] == 'active')
<div class="">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Abstract<span class="text-warning">*</span>
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3" >{{ old('c2_abstract') }}</textarea>
        </div>
        <div class="col-1">
            <a href="lampiran/abstract" class="text-yellow" target="_blank">
                <i class="fas fa-lightbulb"></i>
            </a>
        </div>
    </div>
</div>
@endif
