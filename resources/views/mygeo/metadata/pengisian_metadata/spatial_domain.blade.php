<link rel="stylesheet" href="{{ asset('intecxmap/css/leaflet@1.7.1/leaflet.css') }}" />
<script src="{{ asset('intecxmap/js/leaflet@1.7.1/dist/leaflet.js') }}"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="{{ asset('intecxmap/css/leaflet.draw/0.2.3/leaflet.draw.css') }}" rel="stylesheet">
<script src="{{ asset('intecxmap/js/leaflet.draw/0.2.3/leaflet.draw.js' ) }}"></script>
<script src="{{ asset('intecxmap/js/esri-leaflet@3.0.2/dist/esri-leaflet-debug.js') }}"></script>
<script src="{{ asset('intecxmap/js/esri-leaflet/0.0.1-beta.5/esri-leaflet.js') }}"></script>
<script src="{{ asset('intecxmap/js/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('intecxmap/css/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css') }}">

<div class="card card-primary mb-4 div_c9" id="div_c9">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse9" class="fixMap">
            <h4 class="card-title">
                <?php echo __('lang.accord_9'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse9" class="panel-collapse collapse in show" data-parent="#div_c9">
        <div class="card-body">
            <div class="row justify-content-md-center" style="height:425px;">
                <div class="col col-lg-7">
                    <div id='map'></div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col col-lg-4">
                    <form id="formSpatialDomain">
                        <div class="row">
                            <div class="col col-lg-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="width: 50px;" id="btnGroupAddon">W<span class="text-red">*</span></div>
                                    </div>
                                    <input type="number" step="any" id="wblg" onchange="updateLayer()" class="form-control" placeholder="<?php echo __('lang.west_bound_longitude'); ?>" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="right" title="West Bound Longitude" value="{{ old('c9_west_bound_longitude') }}" name="c9_west_bound_longitude">
                                    <br>
                                </div>

                                @error('c9_west_bound_longitude')
                                <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col col-lg-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="width: 50px;" id="btnGroupAddon">E<span class="text-red">*</span></div>
                                    </div>
                                    <input type="number" id="eblg" onchange="updateLayer()" step="any" class="form-control" placeholder="<?php echo __('lang.east_bound_longitude'); ?>" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="East Bound Longitude" value="{{ old('c9_east_bound_longitude') }}" name="c9_east_bound_longitude">
                                    <br>
                                </div>

                                @error('c9_east_bound_longitude')
                                <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col col-lg-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="width: 50px;" id="btnGroupAddon">S<span class="text-red">*</span></div>
                                    </div>
                                    <input type="number" id="sblt" onchange="updateLayer()" step="any" class="form-control" placeholder="<?php echo __('lang.south_bound_latitude'); ?>" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="right" title="South Bound Latitude" value="{{ old('c9_south_bound_latitude') }}" name="c9_south_bound_latitude">
                                    <br>
                                </div>

                                @error('c9_south_bound_latitude')
                                <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col col-lg-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="width: 50px;" id="btnGroupAddon">N<span class="text-red">*</span></div>
                                    </div>
                                    <input type="number" id="nblt" onchange="updateLayer()" step="any" class="form-control" placeholder="<?php echo __('lang.north_bound_latitude'); ?>" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="top" title="North Bound Latitude" value="{{ old('c9_north_bound_latitude') }}" name="c9_north_bound_latitude">
                                    <br>
                                </div>

                                @error('c9_north_bound_latitude')
                                <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="btn-group" role="group" aria-label="Basic example"></div>
                                <button type="reset" onclick="cleaLayer()" class="btn btn-outline-primary">
                                    <i class="fas fa-retweet"></i> Reset
                                </button>
<!--                                <button type="button" onclick="saveData()" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
