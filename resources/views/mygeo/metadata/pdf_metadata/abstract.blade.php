<div class="abstractApplication">
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Nama Aplikasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_namaAplikasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_namaAplikasi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_namaAplikasi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tujuan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tujuan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tahunPembangunan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tahunPembangunan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tahunPembangunan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kemaskini
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_kemaskini->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_kemaskini->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_kemaskini->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_dataTerlibat->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_dataTerlibat->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_dataTerlibat->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Sasaran Pengguna
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_sasaranPengguna->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_sasaranPengguna->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_sasaranPengguna->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_versi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_versi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_versi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Perisian Yang Digunakan Dalam Pembangunan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_perisianDigunaPembangunan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_perisianDigunaPembangunan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_perisianDigunaPembangunan->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_namaDokumen->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_namaDokumen->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_namaDokumen->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tujuan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tujuan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tahunTerbitan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tahunTerbitan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tahunTerbitan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_edisi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_edisi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_edisi->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_namaAktiviti->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_namaAktiviti->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_namaAktiviti->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tujuan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tujuan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_lokasi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_lokasi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tahun->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tahun->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tahun->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_namaPeta->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_namaPeta->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_namaPeta->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_kawasan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_kawasan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_kawasan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tujuan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tujuan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Terbitan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tahunTerbitan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tahunTerbitan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tahunTerbitan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Edisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_edisi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_edisi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_edisi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                No. Siri
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_noSiri->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_noSiri->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_noSiri->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_skala->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_skala->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_skala->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_unit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_unit->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_unit->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_namaData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_namaData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_namaData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_lokasi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_lokasi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_rumusanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_rumusanData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_rumusanData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tujuanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tujuanData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tujuanData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kaedahPenyediaanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kaedahPenyediaanData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kaedahPenyediaanData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_unit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_unit->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_unit->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_skala->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_skala->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_skala->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_statusData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_statusData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_statusData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tahunPerolehan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tahunPerolehan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tahunPerolehan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Jenis Satelit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_jenisSatelit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_jenisSatelit->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_jenisSatelit->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Resolusi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_resolusi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_resolusi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_resolusi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kawasan Litupan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kawasanLitupan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kawasanLitupan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kawasanLitupan->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_namaServis->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_namaServis->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_namaServis->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_lokasi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_lokasi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_tujuan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_tujuan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_dataTerlibat->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_dataTerlibat->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_dataTerlibat->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Polisi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_polisi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_polisi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_polisi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Peringkat Capaian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_peringkatCapaian->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_peringkatCapaian->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_peringkatCapaian->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_format->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_format->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_namaPerisian->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_namaPerisian->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_namaPerisian->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Versi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_versi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_versi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_versi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tujuan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tujuan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tahun Penggunaan Perisian
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tahunPengunaanPerisian->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tahunPengunaanPerisian->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tahunPengunaanPerisian->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Perolehan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_kaedahPerolehan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_kaedahPerolehan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_kaedahPerolehan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_format->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_format->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Pengeluar
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_pengeluar->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_pengeluar->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_pengeluar->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keupayaan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keupayaan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keupayaan->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keupayaan->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Data Yang Terlibat
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_dataTerlibat->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_dataTerlibat->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_dataTerlibat->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Keperluan Perkakasan
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keperluanPerkakas->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keperluanPerkakas->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keperluanPerkakas->CharacterString;
            }
            ?>
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
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_namaData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_namaData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_namaData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Lokasi
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_lokasi->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_lokasi->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Rumusan Tentang Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_rumusanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_rumusanData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_rumusanData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Tujuan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_tujuanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_tujuanData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_tujuanData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Kaedah Penyediaan Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_kaedahPenyediaanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_kaedahPenyediaanData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_kaedahPenyediaanData->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Format
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_format->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_format->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Unit
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_unit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_unit->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_unit->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Skala
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_skala->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_skala->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_skala->CharacterString;
            }
            ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-3">
            <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                Status Data
            </label><label class="float-right">:</label>
        </div>
        <div class="col-7">
            <?php
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_statusData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_statusData->CharacterString != ""){
                echo $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_statusData->CharacterString;
            }
            ?>
        </div>
    </div>
</div>
