<div class="abstractApplication">
    <?php
    if($key == "abstractApplication_namaAplikasi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_tujuan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_tahunPembangunan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_kemaskini"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_dataTerlibat"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_sasaranPengguna"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_versi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_versi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractApplication_perisianDigunaPembangunan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractDocument_namaDokumen"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractDocument_tujuan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractDocument_tahunTerbitan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractDocument_edisi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractGISActivityProject_namaAktiviti"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractGISActivityProject_tujuan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractGISActivityProject_lokasi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractGISActivityProject_tahun"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_namaPeta"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_kawasan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_tujuan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_tahunTerbitan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_edisi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_edisi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_noSiri"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_skala"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_skala" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractMap_unit"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractMap_unit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_namaData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_lokasi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_rumusanData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_tujuanData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_kaedahPenyediaanData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_format"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_unit"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_skala"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_statusData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_tahunPerolehan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_jenisSatelit"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_format"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_resolusi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractRasterData_kawasanLitupan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_namaServis"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_lokasi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_tujuan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_dataTerlibat"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_polisi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_polisi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_peringkatCapaian"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractServices_format"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractServices_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_namaPerisian"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_versi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_tujuan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_tahunPengunaanPerisian"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_kaedahPerolehan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_format"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_pengeluar"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_keupayaan"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_dataTerlibat"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractSoftware_keperluanPerkakas"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_namaData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_lokasi"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_rumusanData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_tujuanData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_kaedahPenyediaanData"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_format"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_unit"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_skala"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }elseif($key == "abstractVectorData_skala"){
        ?>
        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
            <div class="col-3 pl-5">
                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                <label class="float-right">:</label>
            </div>
            <div class="col-8">
                <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
            </div>
            <span class="close btnClose">Active/Disable</span>
        </div>
        <?php
    }
    ?>
</div>

<?php //###################################################################### ?>
<?php
if($key == "c2_abstract"){
    ?>
    <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
        <div class="col-3 pl-5">
            <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
            <label class="float-right">:</label>
        </div>
        <div class="col-8">
            <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"></textarea>
            <a href="lampiran/abstract" class="text-yellow" target="_blank">
                <i class="fas fa-lightbulb"></i>
            </a>
        </div>
        <span class="close btnClose">Active/Disable</span>
    </div>
    <?php
}
?>
    
