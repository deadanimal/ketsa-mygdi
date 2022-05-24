<div class="card card-primary mb-4 div_c2" id="div_c2">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse2">
                <?php echo __('lang.accord_2'); ?>
            </a>
        </h4>
        <button type="button" class="btn btn-default float-right btnTambah" data-toggle="modal" data-target="#modalTambahInput" data-accordion="2">Tambah</button>
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion2'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_metadataName"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="c2_metadataName" id="c2_metadataName" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"/>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_product_type"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "abstractApplication_namaAplikasi"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                Textbox
                                <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_versi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_edisi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_skala" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractMap_unit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_polisi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractServices_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_format" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
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
                                Textbox
                                <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm ml-3 abstractElement sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_abstract"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>"></textarea>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c10_file_url"){
                        ?>
                        <div class="row mb-2 sortIt divIdentificationInformationUrl" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputIdentificationInformationUrl urlToTest sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_metadataDate"){
                        ?>
                        <div class="row mb-2 sortIt divMetadataDate" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Tarikh berkaitan  bagi maklumat geospatial.">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input class="form-control form-control-sm ml-3 sortable" type="date" name="c2_metadataDate" id="c2_metadataDate" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_metadataDateType"){
                        ?>
                        <div class="row mb-2 sortIt divMetadataDateType" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian secara pilihan mengenai peringkat maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name="c2_metadataDateType" id="c2_metadataDateType" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_metadataStatus"){
                        ?>
                        <div class="row mb-2 sortIt divMetadataStatus" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Status bagi maklumat geospatial merujuk dokumen MGMS (LAMPIRAN D)">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select class="form-control form-control-sm ml-3 sortable" name="c2_metadataStatus" id="c2_metadataStatus" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_typeOfServices"){
                        ?>
                        <div class="row mb-2 sortIt divTypeOfServices" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian secara pilihan, jenis service bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select class="form-control form-control-sm ml-3 sortable" name="c2_typeOfServices" id="c2_typeOfServices" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="" selected>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_operationName"){
                        ?>
                        <div class="row mb-2 sortIt divOperationName" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian bagi Nama Operasi yang ditawarkan oleh webservis ini Contoh: Export Map, Identify, Find dan GenerateKML">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" class="form-control form-control-sm ml-3 sortable" name="c2_operationName" id="c2_operationName" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_serviceUrl"){
                        ?>
                        <div class="row mb-2 sortIt divServiceUrl" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="URL bagi service berkenaan. Klik ‘Test’ bagi percubaan URL berkenaan.">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" class="form-control form-control-sm ml-3 sortable" name="c2_serviceUrl" id="c2_serviceUrl" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_typeOfCouplingDataset"){
                        ?>
                        <div class="row mb-2 sortIt divTypeOfCouplingDataset" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pilihan jenis gandingan bagi Dataset">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select class="form-control form-control-sm ml-3 sortable" name="c2_typeOfCouplingDataset" id="c2_typeOfCouplingDataset" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="">Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_name"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nama individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_name" id="c2_contact_name" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_agensiorganisasi"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nama organisasi yang bertanggungjawab terhadap maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_bahagian"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nama bahagian yang bertanggungjawab terhadap maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_bahagian" id="c2_contact_bahagian" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_position_name"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_position_name" id="c2_position_name" class="form-control form-control-sm ml-3 mb-2 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_address1"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control form-control-sm ml-3 mb-2 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    /*
                    }elseif($key == "c2_contact_address2"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control form-control-sm ml-3 mb-2 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_address3"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control form-control-sm ml-3 mb-2 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_address4"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control form-control-sm ml-3 mb-2 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    */
                    }elseif($key == "c2_postal_code"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 divPostalCode" for="uname" data-toggle="tooltip" title="Poskod">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_postal_code" id="c2_postal_code" class="form-control form-control-sm mb-2 divPostalCode sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_city"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 divCity" for="uname" data-toggle="tooltip" title="Bandar">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_city" id="c2_contact_city" class="form-control form-control-sm mb-2 divCity sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_state"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Negeri / Wilayah Persekutuan">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name="c2_contact_state" id="c2_contact_state"class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option disabled>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_country"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Negara">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option disabled>Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_email"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Alamat emel rasmi">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_fax"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nombor faksimili organisasi">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_phone_office"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nombor telefon organisasi">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_website"){
                        ?>
                        <div class="row mb-2 sortIt" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Alamat laman web organisasi">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Textbox
                                <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }elseif($key == "c2_contact_role"){
                        ?>
                        <div class="row mb-2 sortIt divResponsiblePartyRole" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Peranan yang dijalankan oleh organisasi berkenaan Metadata">{{ $val['label_'.$bhs] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-3">
                                Dropdown
                                <select name="c2_contact_role" id="c2_contact_role" class="form-control form-control-sm ml-3 sortable" data-status="<?php echo $val['status']; ?>" data-mandatory="<?php echo $val['mandatory']; ?>">
                                    <option value="">Pilih...</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" name="mandatory" class="mandatory" value="1" <?php if($val['mandatory'] == "yes"){ echo "checked"; } ?>> Mandatori
                            </div>
                            <div class="col-1">
                                <span class="close btnClose">Active/Disable</span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
