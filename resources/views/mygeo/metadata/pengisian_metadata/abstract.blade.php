<div class="abstractApplication">
    @if($elemenMetadata['abstractApplication_namaAplikasi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aplikasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_namaAplikasi') }}">
            @error('abstractApplication_namaAplikasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_tujuan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_tujuan') }}">
            @error('abstractApplication_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_tahunPembangunan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_tahunPembangunan') }}">
            @error('abstractApplication_tahunPembangunan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_kemaskini']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kemaskini
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_kemaskini') }}">
            @error('abstractApplication_kemaskini')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_dataTerlibat']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_dataTerlibat') }}">
            @error('abstractApplication_dataTerlibat')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_sasaranPengguna']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Sasaran Pengguna
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_sasaranPengguna') }}">
            @error('abstractApplication_sasaranPengguna')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_versi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_versi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_versi') }}">
            @error('abstractApplication_versi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractApplication_perisianDigunaPembangunan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Perisian Yang Digunakan Dalam Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractApplication_perisianDigunaPembangunan') }}">
            @error('abstractApplication_perisianDigunaPembangunan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractDocument">
    @if($elemenMetadata['abstractDocument_namaDokumen']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Dokumen
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_namaDokumen') }}">
            @error('abstractDocument_namaDokumen')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractDocument_tujuan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_tujuan') }}">
            @error('abstractDocument_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractDocument_tahunTerbitan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_tahunTerbitan') }}">
            @error('abstractDocument_tahunTerbitan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractDocument_edisi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractDocument_edisi') }}">
            @error('abstractDocument_edisi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractGISActivityProject">
    @if($elemenMetadata['abstractGISActivityProject_namaAktiviti']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aktiviti
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_namaAktiviti') }}">
            @error('abstractGISActivityProject_namaAktiviti')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractGISActivityProject_tujuan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_tujuan') }}">
            @error('abstractGISActivityProject_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractGISActivityProject_lokasi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_lokasi') }}">
            @error('abstractGISActivityProject_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractGISActivityProject_tahun']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractGISActivityProject_tahun') }}">
            @error('abstractGISActivityProject_tahun')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractMap">
    @if($elemenMetadata['abstractMap_namaPeta']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Peta
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_namaPeta') }}">
            @error('abstractMap_namaPeta')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_kawasan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_kawasan') }}">
            @error('abstractMap_kawasan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_tujuan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_tujuan') }}">
            @error('abstractMap_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_tahunTerbitan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_tahunTerbitan') }}">
            @error('abstractMap_tahunTerbitan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_edisi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_edisi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_edisi') }}">
            @error('abstractMap_edisi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_noSiri']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                No. Siri
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_noSiri') }}">
            @error('abstractMap_noSiri')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_skala']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_skala" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_skala') }}">
            @error('abstractMap_skala')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractMap_unit']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractMap_unit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractMap_unit') }}">
            @error('abstractMap_unit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractRasterData">
    @if($elemenMetadata['abstractRasterData_namaData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_namaData') }}">
            @error('abstractRasterData_namaData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_lokasi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_lokasi') }}">
            @error('abstractRasterData_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_rumusanData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_rumusanData') }}">
            @error('abstractRasterData_rumusanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_tujuanData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_tujuanData') }}">
            @error('abstractRasterData_tujuanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_kaedahPenyediaanData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_kaedahPenyediaanData') }}">
            @error('abstractRasterData_kaedahPenyediaanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_format']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_format') }}">
            @error('abstractRasterData_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_unit']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_unit') }}">
            @error('abstractRasterData_unit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_skala']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_skala') }}">
            @error('abstractRasterData_skala')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_statusData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_statusData') }}">
            @error('abstractRasterData_statusData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_tahunPerolehan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_tahunPerolehan') }}">
            @error('abstractRasterData_tahunPerolehan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_jenisSatelit']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Jenis Satelit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_jenisSatelit') }}">
            @error('abstractRasterData_jenisSatelit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_format']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_format') }}">
            @error('abstractRasterData_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_resolusi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Resolusi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_resolusi') }}">
            @error('abstractRasterData_resolusi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractRasterData_kawasanLitupan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan Litupan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractRasterData_kawasanLitupan') }}">
            @error('abstractRasterData_kawasanLitupan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractServices">
    @if($elemenMetadata['abstractServices_namaServis']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Servis
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_namaServis') }}">
            @error('abstractServices_namaServis')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractServices_lokasi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_lokasi') }}">
            @error('abstractServices_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractServices_tujuan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_tujuan') }}">
            @error('abstractServices_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractServices_dataTerlibat']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_dataTerlibat') }}">
            @error('abstractServices_dataTerlibat')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractServices_polisi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Polisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_polisi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_polisi') }}">
            @error('abstractServices_polisi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractServices_peringkatCapaian']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Peringkat Capaian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_peringkatCapaian') }}">
            @error('abstractServices_peringkatCapaian')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractServices_format']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractServices_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractServices_format') }}">
            @error('abstractServices_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractSoftware">
    @if($elemenMetadata['abstractSoftware_namaPerisian']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_namaPerisian') }}">
            @error('abstractSoftware_namaPerisian')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_versi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_versi') }}">
            @error('abstractSoftware_versi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_tujuan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_tujuan') }}">
            @error('abstractSoftware_tujuan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_tahunPengunaanPerisian']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Penggunaan Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_tahunPengunaanPerisian') }}">
            @error('abstractSoftware_tahunPengunaanPerisian')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_kaedahPerolehan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_kaedahPerolehan') }}">
            @error('abstractSoftware_kaedahPerolehan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_format']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_format') }}">
            @error('abstractSoftware_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_pengeluar']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Pengeluar
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_pengeluar') }}">
            @error('abstractSoftware_pengeluar')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_keupayaan']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keupayaan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_keupayaan') }}">
            @error('abstractSoftware_keupayaan')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_dataTerlibat']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_dataTerlibat') }}">
            @error('abstractSoftware_dataTerlibat')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractSoftware_keperluanPerkakas']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keperluan Perkakasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractSoftware_keperluanPerkakas') }}">
            @error('abstractSoftware_keperluanPerkakas')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>

<div class="abstractVectorData">
    @if($elemenMetadata['abstractVectorData_namaData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_namaData') }}">
            @error('abstractVectorData_namaData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_lokasi']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_lokasi') }}">
            @error('abstractVectorData_lokasi')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_rumusanData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_rumusanData') }}">
            @error('abstractVectorData_rumusanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_tujuanData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_tujuanData') }}">
            @error('abstractVectorData_tujuanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_kaedahPenyediaanData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_kaedahPenyediaanData') }}">
            @error('abstractVectorData_kaedahPenyediaanData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_format']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_format" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_format') }}">
            @error('abstractVectorData_format')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_unit']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_unit') }}">
            @error('abstractVectorData_unit')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_skala']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_skala') }}">
            @error('abstractVectorData_skala')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if($elemenMetadata['abstractVectorData_statusData']->status == '1')
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm ml-3 abstractElement" value="{{ old('abstractVectorData_statusData') }}">
            @error('abstractVectorData_statusData')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
</div>

<?php //###################################################################### ?>
@if($elemenMetadata['c2_abstract']->status == '1')
<div class="">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Abstract<span class="text-warning">*</span>
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3" >{{ old('c2_abstract') }}</textarea>
            @error('c2_abstract')
            <div class="text-error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
@endif
