<div class="abstractApplication">
    <?php
    if($key == "abstractApplication_namaAplikasi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Aplikasi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_namaAplikasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_namaAplikasi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_namaAplikasi->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_namaAplikasi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_tujuan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tujuan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tujuan->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_tujuan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_tahunPembangunan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tahun Pembangunan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tahunPembangunan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tahunPembangunan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_tahunPembangunan->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_tahunPembangunan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_kemaskini"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Kemaskini
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_kemaskini->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_kemaskini->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_kemaskini->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_kemaskini')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_dataTerlibat"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Data Terlibat
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_dataTerlibat->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_dataTerlibat->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_dataTerlibat->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_dataTerlibat')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_sasaranPengguna"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Sasaran Pengguna
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_sasaranPengguna->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_sasaranPengguna->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_sasaranPengguna->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_sasaranPengguna')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_versi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Versi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_versi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_versi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_versi->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_versi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_versi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractApplication_perisianDigunaPembangunan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Perisian Yang Digunakan Dalam Pembangunan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_perisianDigunaPembangunan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_perisianDigunaPembangunan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractApplication_perisianDigunaPembangunan->CharacterString;
                }
                ?>
                <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractApplication_perisianDigunaPembangunan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractDocument">
    <?php
    if($key == "abstractDocument_namaDokumen"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Dokumen
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_namaDokumen->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_namaDokumen->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_namaDokumen->CharacterString;
                }
                ?>
                <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractDocument_namaDokumen')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractDocument_tujuan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tujuan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tujuan->CharacterString;
                }
                ?>
                <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractDocument_tujuan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractDocument_tahunTerbitan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tahun Terbitan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tahunTerbitan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tahunTerbitan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_tahunTerbitan->CharacterString;
                }
                ?>
                <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractDocument_tahunTerbitan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractDocument_edisi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Edisi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_edisi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_edisi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractDocument_edisi->CharacterString;
                }
                ?>
                <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractDocument_edisi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractGISActivityProject">
    <?php
    if($key == "abstractGISActivityProject_namaAktiviti"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Aktiviti
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_namaAktiviti->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_namaAktiviti->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_namaAktiviti->CharacterString;
                }
                ?>
                <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractGISActivityProject_namaAktiviti')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractGISActivityProject_tujuan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tujuan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tujuan->CharacterString;
                }
                ?>
                <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractGISActivityProject_tujuan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractGISActivityProject_lokasi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Lokasi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_lokasi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_lokasi->CharacterString;
                }
                ?>
                <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractGISActivityProject_lokasi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractGISActivityProject_tahun"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tahun
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tahun->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tahun->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractGISActivityProject_tahun->CharacterString;
                }
                ?>
                <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractGISActivityProject_tahun')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractMap">
    <?php
    if($key == "abstractMap_namaPeta"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Peta
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_namaPeta->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_namaPeta->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_namaPeta->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_namaPeta')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_kawasan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Kawasan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_kawasan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_kawasan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_kawasan->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_kawasan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_tujuan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tujuan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tujuan->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_tujuan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_tahunTerbitan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tahun Terbitan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tahunTerbitan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tahunTerbitan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_tahunTerbitan->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_tahunTerbitan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_edisi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Edisi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_edisi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_edisi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_edisi->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_edisi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_edisi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_noSiri"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    No. Siri
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_noSiri->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_noSiri->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_noSiri->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_noSiri')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_skala"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Skala
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_skala->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_skala->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_skala->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_skala" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_skala')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractMap_unit"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Unit
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractMap_unit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_unit->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractMap_unit->CharacterString;
                }
                ?>
                <input type="text" name="abstractMap_unit" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractMap_unit')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractRasterData">
    <?php
    if($key == "abstractRasterData_namaData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_namaData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_namaData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_namaData->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_namaData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_lokasi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Lokasi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_lokasi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_lokasi->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_lokasi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_rumusanData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Rumusan Tentang Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_rumusanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_rumusanData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_rumusanData->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_rumusanData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_tujuanData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tujuanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tujuanData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tujuanData->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_tujuanData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_kaedahPenyediaanData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Kaedah Penyediaan Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kaedahPenyediaanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kaedahPenyediaanData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kaedahPenyediaanData->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_kaedahPenyediaanData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_format"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Format
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_format" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_format')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_unit"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Unit
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_unit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_unit->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_unit->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_unit')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_skala"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Skala
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_skala->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_skala->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_skala->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_skala')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_statusData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Status Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_statusData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_statusData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_statusData->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_statusData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_tahunPerolehan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tahun Perolehan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tahunPerolehan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tahunPerolehan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_tahunPerolehan->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_tahunPerolehan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>  
        <?php
    }
    if($key == "abstractRasterData_jenisSatelit"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Jenis Satelit
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_jenisSatelit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_jenisSatelit->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_jenisSatelit->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_jenisSatelit')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_format"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Format
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_format->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_format" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_format')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_resolusi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Resolusi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_resolusi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_resolusi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_resolusi->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_resolusi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractRasterData_kawasanLitupan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Kawasan Litupan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kawasanLitupan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kawasanLitupan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractRasterData_kawasanLitupan->CharacterString;
                }
                ?>
                <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractRasterData_kawasanLitupan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractServices">
    <?php
    if($key == "abstractServices_namaServis"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Servis
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_namaServis->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_namaServis->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_namaServis->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_namaServis')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractServices_lokasi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Lokasi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_lokasi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_lokasi->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_lokasi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractServices_tujuan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_tujuan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_tujuan->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_tujuan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractServices_dataTerlibat"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Data Yang Terlibat
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_dataTerlibat->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_dataTerlibat->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_dataTerlibat->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_dataTerlibat')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractServices_polisi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Polisi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_polisi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_polisi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_polisi->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_polisi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_polisi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractServices_peringkatCapaian"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Peringkat Capaian
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_peringkatCapaian->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_peringkatCapaian->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_peringkatCapaian->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_peringkatCapaian')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractServices_format"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Format
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractServices_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_format->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractServices_format->CharacterString;
                }
                ?>
                <input type="text" name="abstractServices_format" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractServices_format')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractSoftware">
    <?php
    if($key == "abstractSoftware_namaPerisian"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Perisian
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_namaPerisian->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_namaPerisian->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_namaPerisian->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_namaPerisian')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_versi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Versi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_versi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_versi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_versi->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_versi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_tujuan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tujuan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tujuan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tujuan->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_tujuan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_tahunPengunaanPerisian"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tahun Penggunaan Perisian
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tahunPengunaanPerisian->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tahunPengunaanPerisian->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_tahunPengunaanPerisian->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_tahunPengunaanPerisian')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_kaedahPerolehan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Kaedah Perolehan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_kaedahPerolehan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_kaedahPerolehan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_kaedahPerolehan->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_kaedahPerolehan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_format"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Format
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_format->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_format->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_format" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_format')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_pengeluar"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Pengeluar
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_pengeluar->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_pengeluar->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_pengeluar->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_pengeluar')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_keupayaan"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Keupayaan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keupayaan->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keupayaan->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keupayaan->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_keupayaan')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_dataTerlibat"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Data Yang Terlibat
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_dataTerlibat->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_dataTerlibat->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_dataTerlibat->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_dataTerlibat')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractSoftware_keperluanPerkakas"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Keperluan Perkakasan
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keperluanPerkakas->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keperluanPerkakas->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractSoftware_keperluanPerkakas->CharacterString;
                }
                ?>
                <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractSoftware_keperluanPerkakas')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>

<div class="abstractVectorData">
    <?php
    if($key == "abstractVectorData_namaData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Nama Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_namaData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_namaData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_namaData->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_namaData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_lokasi"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Lokasi
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_lokasi->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_lokasi->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_lokasi->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_lokasi')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_rumusanData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Rumusan Tentang Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_rumusanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_rumusanData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_rumusanData->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_rumusanData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_tujuanData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Tujuan Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_tujuanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_tujuanData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_tujuanData->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_tujuanData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_kaedahPenyediaanData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Kaedah Penyediaan Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_kaedahPenyediaanData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_kaedahPenyediaanData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_kaedahPenyediaanData->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_kaedahPenyediaanData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_format"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Format
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_format->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_format->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_format->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_format" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_format')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_unit"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Unit
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_unit->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_unit->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_unit->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_unit')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_skala"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Skala
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_skala->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_skala->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_skala->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_skala')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    if($key == "abstractVectorData_statusData"){
        ?>
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Status Data
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_statusData->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_statusData->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstractVectorData_statusData->CharacterString;
                }
                ?>
                <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm  abstractElement" value="{{ $var }}">
                @error('abstractVectorData_statusData')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>
<?php
if($key == "c2_abstract"){
    ?>
    <div class="">
        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3">
                <label class="form-control-label mr-4" for="c2_abstract" data-toggle="tooltip" title="Tooltip">
                    Abstract<span class="text-warning">*</span>
                </label><label class="float-right">:</label>
            </div>
            <div class="col-7">
                <?php
                $var = "";
                if(isset($metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->MD_DataIdentification->abstract->CharacterString;
                }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                    $var = $metadataxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString;
                }
                ?>
                <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ">{{ $var }}</textarea>
                @error('c2_abstract')
                <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <?php
}
?>
