<div class="card card-primary mb-4 div_c2" id="div_c2">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse2">
                <?php echo __('lang.accord_2'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="sortableContainer1">
                <?php 
                foreach($template->template[strtolower($_GET['kategori'])]['accordion2'] as $key=>$val){
                    if($val['status'] == "active"){
                        if($key == "c2_metadataName"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3 sortable" type="text" name="c2_metadataName" id="c2_metadataName" value="{{ old('c2_metadataName') }}" />
                                    <a href="lampiran/title" class="text-yellow" target="_blank">
                                        <i class="fas fa-lightbulb"></i>
                                    </a>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_product_type"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name="c2_product_type" id="c2_product_type" class="form-control form-control-sm ml-3 sortable">
                                        <option value="" selected>Pilih...</option>
                                        <option value="Application"
                                            {{ old('c2_product_type') == 'Application' ? 'selected' : '' }}>Application</option>
                                        <option value="Document" {{ old('c2_product_type') == 'Document' ? 'selected' : '' }}>
                                            Document</option>
                                        <option value="GIS Activity/Project"
                                            {{ old('c2_product_type') == 'GIS Activity/Project' ? 'selected' : '' }}>GIS
                                            Activity/Project</option>
                                        <option value="Map" {{ old('c2_product_type') == 'Map' ? 'selected' : '' }}>Map</option>
                                        <option value="Raster Data"
                                            {{ old('c2_product_type') == 'Raster Data' ? 'selected' : '' }}>Raster Data</option>
                                        <option value="Services" {{ old('c2_product_type') == 'Services' ? 'selected' : '' }}>
                                            Services</option>
                                        <option value="Software" {{ old('c2_product_type') == 'Software' ? 'selected' : '' }}>
                                            Software</option>
                                        <option value="Vector Data"
                                            {{ old('c2_product_type') == 'Vector Data' ? 'selected' : '' }}>Vector Data</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_namaAplikasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_namaAplikasi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_namaAplikasi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_tujuan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_tujuan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_tahunPembangunan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_tahunPembangunan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_tahunPembangunan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_kemaskini"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_kemaskini" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_kemaskini') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_dataTerlibat"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_dataTerlibat') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_sasaranPengguna"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_sasaranPengguna" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_sasaranPengguna') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_versi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_versi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_versi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractApplication_perisianDigunaPembangunan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractApplication_perisianDigunaPembangunan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractApplication_perisianDigunaPembangunan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractDocument_namaDokumen"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractDocument_namaDokumen" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractDocument_namaDokumen') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractDocument_tujuan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractDocument_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractDocument_tujuan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractDocument_tahunTerbitan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractDocument_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractDocument_tahunTerbitan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractDocument_edisi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractDocument_edisi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractDocument_edisi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractGISActivityProject_namaAktiviti"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractGISActivityProject_namaAktiviti" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractGISActivityProject_namaAktiviti') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractGISActivityProject_tujuan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractGISActivityProject_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractGISActivityProject_tujuan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractGISActivityProject_lokasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractGISActivityProject_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractGISActivityProject_lokasi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractGISActivityProject_tahun"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractGISActivityProject_tahun" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractGISActivityProject_tahun') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_namaPeta"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_namaPeta" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_namaPeta') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_kawasan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_kawasan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_kawasan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_tujuan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_tujuan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_tahunTerbitan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_tahunTerbitan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_tahunTerbitan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_edisi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_edisi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_edisi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_noSiri"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_noSiri" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_noSiri') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_skala"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_skala" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_skala') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractMap_unit"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractMap_unit" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractMap_unit') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_namaData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_namaData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_namaData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_lokasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_lokasi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_rumusanData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_rumusanData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_rumusanData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_tujuanData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_tujuanData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_tujuanData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_kaedahPenyediaanData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_kaedahPenyediaanData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_format"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_format') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_unit"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_unit" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_unit') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_skala"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_skala" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_skala') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_statusData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_statusData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_statusData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_tahunPerolehan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_tahunPerolehan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_tahunPerolehan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_jenisSatelit"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_jenisSatelit" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_jenisSatelit') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_format"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_format" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_format') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_resolusi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_resolusi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_resolusi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractRasterData_kawasanLitupan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractRasterData_kawasanLitupan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractRasterData_kawasanLitupan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_namaServis"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_namaServis" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_namaServis') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_lokasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_lokasi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_tujuan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_tujuan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_dataTerlibat"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_dataTerlibat') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_polisi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_polisi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_polisi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_peringkatCapaian"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_peringkatCapaian" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_peringkatCapaian') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractServices_format"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractServices_format" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractServices_format') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_namaPerisian"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_namaPerisian" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_namaPerisian') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_versi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_versi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_versi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_tujuan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_tujuan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_tujuan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_tahunPengunaanPerisian"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_tahunPengunaanPerisian" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_tahunPengunaanPerisian') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_kaedahPerolehan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_kaedahPerolehan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_kaedahPerolehan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_format"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_format" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_format') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_pengeluar"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_pengeluar" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_pengeluar') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_keupayaan"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_keupayaan" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_keupayaan') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_dataTerlibat"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_dataTerlibat" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_dataTerlibat') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractSoftware_keperluanPerkakas"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractSoftware_keperluanPerkakas" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractSoftware_keperluanPerkakas') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_namaData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_namaData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_namaData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_lokasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_lokasi" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_lokasi') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_rumusanData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_rumusanData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_rumusanData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_tujuanData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_tujuanData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_tujuanData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_kaedahPenyediaanData"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_kaedahPenyediaanData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_kaedahPenyediaanData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_format"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_format" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_format') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_unit"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_unit" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_unit') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_skala"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_skala" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_skala') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "abstractVectorData_skala"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="abstractVectorData_statusData" class="form-control form-control-sm ml-3 abstractElement sortable" value="{{ old('abstractVectorData_statusData') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_abstract"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pemilihan jenis abstrak">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <textarea name="c2_abstract" id="c2_abstract" rows="5" class="form-control form-control-sm ml-3 sortable" >{{ old('c2_abstract') }}</textarea>
                                    <a href="lampiran/abstract" class="text-yellow" target="_blank">
                                        <i class="fas fa-lightbulb"></i>
                                    </a>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c10_file_url"){
                            ?>
                            <div class="row mb-2 sortIt divIdentificationInformationUrl">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c10_file_url" class="form-control form-control-sm ml-3 inputIdentificationInformationUrl urlToTest sortable" value="{{old('c10_file_url')}}">
                                    <button class="btn btn-sm btn-success btnTestUrl" type="button" data-toggle="modal" data-target="#modal-showweb" data-backdrop="false">Test</button>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_metadataDate"){
                            ?>
                            <div class="row mb-2 sortIt divMetadataDate">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Tarikh berkaitan  bagi maklumat geospatial.">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3 sortable" type="date" name="c2_metadataDate" id="c2_metadataDate" value="{{ old('c2_metadataDate') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_metadataDateType"){
                            ?>
                            <div class="row mb-2 sortIt divMetadataDateType">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian secara pilihan mengenai peringkat maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name="c2_metadataDateType" id="c2_metadataDateType" class="form-control form-control-sm ml-3 sortable">
                                        <option value="" selected>Pilih...</option>
                                        <option value="Adopted">Adopted</option>
                                        <option value="Creation">Creation</option>
                                        <option value="Deprecated">Deprecated</option>
                                        <option value="Distribution">Distribution</option>
                                        <option value="Expiry">Expiry</option>
                                        <option value="In Force">In Force</option>
                                        <option value="Last Revison">Last Revison</option>
                                        <option value="Last Update">Last Update</option>
                                        <option value="Next Update">Next Update</option>
                                        <option value="Publication">Publication</option>
                                        <option value="Released">Released</option>
                                        <option value="Revision">Revision</option>
                                        <option value="Superseded">Superseded</option>
                                        <option value="Validity Begins">Validity Begins</option>
                                        <option value="Validity Expires">Validity Expires</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_metadataStatus"){
                            ?>
                            <div class="row mb-2 sortIt divMetadataStatus">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Status bagi maklumat geospatial merujuk dokumen MGMS (LAMPIRAN D)">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control form-control-sm ml-3 sortable" name="c2_metadataStatus" id="c2_metadataStatus">
                                        <option value="" selected>Pilih...</option>
                                        <option value="Accepted" {{ old('c2_metadataStatus') == 'Accepted' ? 'selected' : '' }} class="optStatus_dataset">Accepted</option>
                                        <option value="Completed" {{ old('c2_metadataStatus') == 'Completed' ? 'selected' : '' }}class="optStatus_dataset">Completed</option>
                                        <option value="Deprecated" {{ old('c2_metadataStatus') == 'Deprecated' ? 'selected' : '' }} class="optStatus_dataset">Deprecated</option>
                                        <option value="Final" {{ old('c2_metadataStatus') == 'Final' ? 'selected' : '' }} class="optStatus_dataset">Final</option>
                                        <option value="Historical Archive" {{ old('c2_metadataStatus') == 'Historical Archive' ? 'selected' : '' }} class="optStatus_dataset">Historical Archive</option>
                                        <option value="Not Accepted" {{ old('c2_metadataStatus') == 'Not Accepted' ? 'selected' : '' }} class="optStatus_dataset">Not Accepted</option>
                                        <option value="Obsolete" {{ old('c2_metadataStatus') == 'Obsolete' ? 'selected' : '' }} class="optStatus_dataset">Obsolete</option>
                                        <option value="On Going" {{ old('c2_metadataStatus') == 'On Going' ? 'selected' : '' }} class="optStatus_dataset">On Going</option>
                                        <option value="Pending" {{ old('c2_metadataStatus') == 'Pending' ? 'selected' : '' }} class="optStatus_dataset">Pending</option>
                                        <option value="Planned" {{ old('c2_metadataStatus') == 'Planned' ? 'selected' : '' }} class="optStatus_dataset">Planned</option>
                                        <option value="Proposed" {{ old('c2_metadataStatus') == 'Proposed' ? 'selected' : '' }} class="optStatus_dataset">Proposed</option>
                                        <option value="Required" {{ old('c2_metadataStatus') == 'Required' ? 'selected' : '' }} class="optStatus_dataset">Required</option>
                                        <option value="Retired" {{ old('c2_metadataStatus') == 'Retired' ? 'selected' : '' }} class="optStatus_dataset">Retired</option>
                                        <option value="Superseded" {{ old('c2_metadataStatus') == 'Superseded' ? 'selected' : '' }} class="optStatus_dataset">Superseded</option>
                                        <option value="Tentative" {{ old('c2_metadataStatus') == 'Tentative' ? 'selected' : '' }} class="optStatus_dataset">Tentative</option>
                                        <option value="Withrawn" {{ old('c2_metadataStatus') == 'Withrawn' ? 'selected' : '' }} class="optStatus_dataset">Withrawn</option>
                                        <option value="Under Development" {{ old('c2_metadataStatus') == 'Under Development' ? 'selected' : '' }} class="optStatus_dataset">Under Development</option>
                                        <option value="Valid" {{ old('c2_metadataStatus') == 'Valid' ? 'selected' : '' }} class="optStatus_dataset">Valid</option>
                                        <option value="Completed" {{ old('c2_metadataStatus') == 'Completed' ? 'selected' : '' }} class="optStatus_services">Completed</option>
                                        <option value="Historical Archive" {{ old('c2_metadataStatus') == 'Historical Archive' ? 'selected' : '' }} class="optStatus_services">Historical Archive</option>
                                        <option value="Obsolete" {{ old('c2_metadataStatus') == 'Obsolete' ? 'selected' : '' }} class="optStatus_services">Obsolete</option>
                                        <option value="On Going" {{ old('c2_metadataStatus') == 'On Going' ? 'selected' : '' }} class="optStatus_services">On Going</option>
                                        <option value="Planned" {{ old('c2_metadataStatus') == 'Planned' ? 'selected' : '' }} class="optStatus_services">Planned</option>
                                        <option value="Required" {{ old('c2_metadataStatus') == 'Required' ? 'selected' : '' }} class="optStatus_services">Required</option>
                                        <option value="Withdrawn" {{ old('c2_metadataStatus') == 'Withdrawn' ? 'selected' : '' }} class="optStatus_services">Withdrawn</option>
                                        <option value="Under Development" {{ old('c2_metadataStatus') == 'Under Development' ? 'selected' : '' }} class="optStatus_services">Under Development</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_typeOfServices"){
                            ?>
                            <div class="row mb-2 sortIt divTypeOfServices">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian secara pilihan, jenis service bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control form-control-sm ml-3 sortable" name="c2_typeOfServices" id="c2_typeOfServices">
                                        <option value="" selected>Pilih...</option>
                                        <option value="ArcIMS Service" {{ old('c2_typeOfServices') == 'ArcIMS Service' ? 'selected' : '' }}>ArcIMS Service</option>
                                        <option value="ArcGIS Services" {{ old('c2_typeOfServices') == 'ArcGIS Services' ? 'selected' : '' }}>ArcGIS Services</option>
                                        <option value="OGC Geography Markup Language" {{ old('c2_typeOfServices') == 'OGC Geography Markup Language' ? 'selected' : '' }}>OGC Geography Markup Language</option>
                                        <option value="OGC Catalouge Service" {{ old('c2_typeOfServices') == 'OGC Catalouge Service' ? 'selected' : '' }}>OGC Catalouge Service</option>
                                        <option value="OGC Coordinate Transformation Service Archive" {{ old('c2_typeOfServices') == 'OGC Coordinate Transformation Service' ? 'selected' : '' }}>OGC Coordinate Transformation Service</option>
                                        <option value="OGC Grid Coverage Service" {{ old('c2_typeOfServices') == 'OGC Grid Coverage Service' ? 'selected' : '' }}>OGC Grid Coverage Service</option>
                                        <option value="OGC Location Service" {{ old('c2_typeOfServices') == 'OGC Location Service' ? 'selected' : '' }}>OGC Location Service</option>
                                        <option value="OGC KML 2.2" {{ old('c2_typeOfServices') == 'OGC KML 2.2' ? 'selected' : '' }}>OGC KML 2.2</option>
                                        <option value="OGC Simple Feature Access" {{ old('c2_typeOfServices') == 'OGC Simple Feature Access' ? 'selected' : '' }}>OGC Simple Feature Access</option>
                                        <option value="OGC Sensor Observation Service" {{ old('c2_typeOfServices') == 'OGC Sensor Observation Service' ? 'selected' : '' }}>OGC Sensor Observation Service</option>
                                        <option value="OGC Web Coverage Service" {{ old('c2_typeOfServices') == 'OGC Web Coverage Service' ? 'selected' : '' }}>OGC Web Coverage Service</option>
                                        <option value="OGC Web Feature Service" {{ old('c2_typeOfServices') == 'OGC Web Feature Service' ? 'selected' : '' }}>OGC Web Feature Service</option>
                                        <option value="OGC Web Map Service" {{ old('c2_typeOfServices') == 'OGC Web Map Service' ? 'selected' : '' }}>OGC Web Map Service</option>
                                        <option value="OGC Web Processing Service" {{ old('c2_typeOfServices') == 'OGC Web Processing Service' ? 'selected' : '' }}>OGC Web Processing Service</option>
                                        <option value="Generic Service" {{ old('c2_typeOfServices') == 'Generic Service' ? 'selected' : '' }}>Generic Service</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_operationName"){
                            ?>
                            <div class="row mb-2 sortIt divOperationName">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pengisian bagi Nama Operasi yang ditawarkan oleh webservis ini Contoh: Export Map, Identify, Find dan GenerateKML">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control form-control-sm ml-3 sortable" name="c2_operationName" id="c2_operationName" value="{{ old('c2_operationName') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_serviceUrl"){
                            ?>
                            <div class="row mb-2 sortIt divServiceUrl">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="URL bagi service berkenaan. Klik ‘Test’ bagi percubaan URL berkenaan.">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control form-control-sm ml-3 sortable" name="c2_serviceUrl" id="c2_serviceUrl" value="{{ old('c2_serviceUrl') }}">
                                    <button class="btn btn-sm btn-success" id="btnTestServiceUrl" type="button" data-toggle="modal" data-target="#modal-showmap" data-backdrop="false">Test</button>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_typeOfCouplingDataset"){
                            ?>
                            <div class="row mb-2 sortIt divTypeOfCouplingDataset">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Pilihan jenis gandingan bagi Dataset">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control form-control-sm ml-3 sortable" name="c2_typeOfCouplingDataset" id="c2_typeOfCouplingDataset">
                                        <option value="">Pilih...</option>
                                        <option value="Loose" {{ old('c2_typeOfCouplingDataset') == 'Loose' ? 'selected' : '' }}>
                                            Loose</option>
                                        <option value="Mixed" {{ old('c2_typeOfCouplingDataset') == 'Mixed' ? 'selected' : '' }}>
                                            Mixed</option>
                                        <option value="Tight" {{ old('c2_typeOfCouplingDataset') == 'Tight' ? 'selected' : '' }}>
                                            Tight</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_name"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nama individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_name" id="c2_contact_name" class="form-control form-control-sm ml-3 sortable">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_agensiorganisasi"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nama organisasi yang bertanggungjawab terhadap maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi" class="form-control form-control-sm ml-3 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_bahagian"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nama bahagian yang bertanggungjawab terhadap maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_bahagian" id="c2_contact_bahagian" class="form-control form-control-sm ml-3 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_position_name"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_position_name" id="c2_position_name" class="form-control form-control-sm ml-3 mb-2 sortable" value="{{ null !== old('c2_position_name') ? old('c2_position_name') : '' }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_address1"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_address1" id="c2_contact_address1" class="form-control form-control-sm ml-3 mb-2 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_address2"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_address2" id="c2_contact_address2" class="form-control form-control-sm ml-3 mb-2 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_address3"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_address3" id="c2_contact_address3" class="form-control form-control-sm ml-3 mb-2 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_address4"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_address4" id="c2_contact_address4" class="form-control form-control-sm ml-3 mb-2 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_postal_code"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4 divPostalCode" for="uname" data-toggle="tooltip" title="Poskod">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_postal_code" id="c2_postal_code" class="form-control form-control-sm mb-2 divPostalCode sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_city"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4 divCity" for="uname" data-toggle="tooltip" title="Bandar">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_city" id="c2_contact_city" class="form-control form-control-sm mb-2 divCity sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_state"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Negeri / Wilayah Persekutuan">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name="c2_contact_state" id="c2_contact_state"class="form-control form-control-sm sortable">
                                        <option disabled>Pilih...</option>
                                        <?php
                                        if (isset($states) && count($states) > 0) {
                                            foreach ($states as $st) {
                                                $selected = "";
                                                ?>
                                                <option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option><?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_country"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Negara">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm sortable">
                                        <option disabled>Pilih...</option>
                                        <?php
                                        if (isset($countries) && count($countries) > 0) {
                                            foreach ($countries as $country) {
                                                ?>
                                                <option value="<?php echo $country->name; ?>"><?php echo $country->name; ?></option><?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_email"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Alamat emel rasmi">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="email" name="c2_contact_email" id="c2_contact_email" class="form-control form-control-sm ml-3 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_fax"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nombor faksimili organisasi">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_fax" id="c2_contact_fax" class="form-control form-control-sm ml-3 sortable" value="{{ old('c2_contact_fax') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_phone_office"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Nombor telefon organisasi">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office" class="form-control form-control-sm ml-3 sortable" value="">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_website"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Alamat laman web organisasi">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="c2_contact_website" id="c2_contact_website" class="form-control form-control-sm ml-3 sortable" value="{{ old('c2_contact_website') }}">
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }elseif($key == "c2_contact_role"){
                            ?>
                            <div class="row mb-2 sortIt divResponsiblePartyRole">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4" for="uname" data-toggle="tooltip" title="Peranan yang dijalankan oleh organisasi berkenaan Metadata">{{ $val['label_'.$bhs] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select name="c2_contact_role" id="c2_contact_role" class="form-control form-control-sm ml-3 sortable">
                                        <option value="">Pilih...</option>
                                        <option value="Author" {{ old('c2_contact_role') == 'Author' ? 'selected' : '' }}>Author</option>
                                        <option value="Co Author" {{ old('c2_contact_role') == 'Co Author' ? 'selected' : '' }}>Co Author</option>
                                        <option value="Collaborator" {{ old('c2_contact_role') == 'Collaborator' ? 'selected' : '' }}>Collaborator</option>
                                        <option value="Contributor" {{ old('c2_contact_role') == 'Contributor' ? 'selected' : '' }}>Contributor</option>
                                        <option value="Custodian" {{ old('c2_contact_role') == 'Custodian' ? 'selected' : '' }}>Custodian</option>
                                        <option value="Distributor" {{ old('c2_contact_role') == 'Distributor' ? 'selected' : '' }}>Distributor</option>
                                        <option value="Editor" {{ old('c2_contact_role') == 'Editor' ? 'selected' : '' }}>Editor</option>
                                        <option value="Funder" {{ old('c2_contact_role') == 'Funder' ? 'selected' : '' }}>Funder</option>
                                        <option value="Mediator" {{ old('c2_contact_role') == 'Mediator' ? 'selected' : '' }}>Mediator</option>
                                        <option value="Originator" {{ old('c2_contact_role') == 'Originator' ? 'selected' : '' }}>Originator</option>
                                        <option value="Point Of Contact" {{ old('c2_contact_role') == 'Point Of Contact' ? 'selected' : '' }}>Point Of Contact</option>
                                        <option value="Principal Investigator" {{ old('c2_contact_role') == 'Principal Investigator' ? 'selected' : '' }}>Principal Investigator</option>
                                        <option value="Processor" {{ old('c2_contact_role') == 'Processor' ? 'selected' : '' }}>Processor</option>
                                        <option value="Publisher" {{ old('c2_contact_role') == 'Publisher' ? 'selected' : '' }}>Publisher</option>
                                        <option value="Resource Provider" {{ old('c2_contact_role') == 'Resource Provider' ? 'selected' : '' }}>Resource Provider</option>
                                        <option value="Rights Holder" {{ old('c2_contact_role') == 'Rights Holder' ? 'selected' : '' }}>Rights Holder</option>
                                        <option value="Sponsor" {{ old('c2_contact_role') == 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                                        <option value="Stakeholder"{{ old('c2_contact_role') == 'Stakeholder' ? 'selected' : '' }}>Stakeholder</option>
                                        <option value="Owner" {{ old('c2_contact_role') == 'Owner' ? 'selected' : '' }}>Owner</option>
                                        <option value="User" {{ old('c2_contact_role') == 'User' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                                <span class="close btnClose">&times;</span>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
