<div class="abstractApplication">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aplikasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_namaAplikasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_tahunPembangunan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kemaskini
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_kemaskini')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_dataTerlibat')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Sasaran Pengguna
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_sasaranPengguna')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_versi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_versi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Perisian Yang Digunakan Dalam Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractApplication_perisianDigunaPembangunan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractDocument">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Dokumen
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractDocument_namaDokumen')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractDocument_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractDocument_tahunTerbitan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractDocument_edisi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractGISActivityProject">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aktiviti
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractGISActivityProject_namaAktiviti')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractGISActivityProject_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractGISActivityProject_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractGISActivityProject_tahun')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractMap">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Peta
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_namaPeta')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_kawasan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_tahunTerbitan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_edisi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_edisi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                No. Siri
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_noSiri')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_skala" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_skala')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_unit" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractMap_unit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractRasterData">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_namaData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_rumusanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_tujuanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_kaedahPenyediaanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_unit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_skala')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_statusData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_tahunPerolehan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Jenis Satelit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_jenisSatelit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Resolusi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_resolusi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan Litupan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractRasterData_kawasanLitupan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractServices">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Servis
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_namaServis')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_dataTerlibat')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Polisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_polisi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_polisi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Peringkat Capaian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_peringkatCapaian')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_format" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractServices_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractSoftware">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_namaPerisian')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_versi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Penggunaan Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_tahunPengunaanPerisian')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_kaedahPerolehan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_format" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Pengeluar
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_pengeluar')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keupayaan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_keupayaan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_dataTerlibat')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keperluan Perkakasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractSoftware_keperluanPerkakas')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="abstractVectorData">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_namaData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_rumusanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_tujuanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_kaedahPenyediaanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_format" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_unit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_skala')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm ml-3 abstractElement">
            @error('abstractVectorData_statusData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<?php //###################################################################### ?>

<div class="">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Abstract<span class="text-warning">*</span>
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3">{{ old('c2_abstract') }}</textarea>
            @error('c2_abstract')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>