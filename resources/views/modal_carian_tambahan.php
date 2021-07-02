<div class="modal fade" id="modal-carian-tambahan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary mb-0">
                <h4 class="text-white">Carian Tambahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Maklumat Kandungan (Content Type)</label>
                                <select name="content_type" id="content_type" class="form-control" autofocus>
                                    <option selected disabled>Pilih</option>
                                    <option value="application">Application</option>
                                    <option value="document">Document</option>
                                    <option value="gisActivityProject">GIS Activity/Project</option>
                                    <option value="theMap">Map</option>
                                    <option value="rasterData">Raster Data</option>
                                    <option value="services">Services</option>
                                    <option value="software">Software</option>
                                    <option value="vectorData">Vector Data</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Data (Topic Category)</label>
                                <select name="topic_category[]" id="topic_category" class="form-control" multiple>
                                    <option value="biota">Biota</label>
                                    <option value="boundaries">Boundaries</label>
                                    <option value="climatology meteorology atmosphere">Climatology Meteorology Atmosphere</label>
                                    <option value="disaster">Disaster</label>
                                    <option value="economy">Economy</label>
                                    <option value="elevation">Elevation</label>
                                    <option value="environment">Environment</label>
                                    <option value="farming">Farming</label>
                                    <option value="geoscientific information">Geoscientific Information</label>
                                    <option value="health">Health</label>
                                    <option value="imagery base maps-earth cover">Imagery Base Maps-Earth Cover</label>
                                    <option value="intelligence military">Intelligence Military</label>
                                    <option value="inland waters">Inland Waters</label>
                                    <option value="location">Location</label>
                                    <option value="oceans">Oceans</label>
                                    <option value="planning Cadastre">Planning Cadastre</label>
                                    <option value="society">Society</label>
                                    <option value="structure">Structure</label>
                                    <option value="transportation">Transportation</label>
                                    <option value="utilities and communication">Utilities and Communication</label>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tarikh Mula</label>
                                <div class="input-group date" id="tarikh_mula_div" data-target-input="nearest">
                                    <input type="text" name="tarikh_mula" id="tarikh_mula" class="form-control datetimepicker-input" data-target="#tarikh_mula_div">
                                    <div class="input-group-append" data-target="#tarikh_mula_div" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tarikh Tamat</label>
                                <div class="input-group date" id="tarikh_tamat_div" data-target-input="nearest">
                                    <input type="text" name="tarikh_tamat" id="tarikh_tamat" class="form-control datetimepicker-input" data-target="#tarikh_tamat_div">
                                    <div class="input-group-append" data-target="#tarikh_tamat_div" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between1">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>
