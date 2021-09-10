<div class="card card-primary mb-4 div_c11" id="div_c11">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse11">
                <?php echo __('lang.accord_11'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse11" class="panel-collapse collapse in" data-parent="#div_c11">
        <div class="card-body">
            @if($elemenMetadata['c11_dist_format']->status == '1' || $elemenMetadata['c11_version']->status == '1')
            <h6 class="heading-small text-muted mt-4"><?php echo __('lang.distributionFormat'); ?></h6>
            <div class="row mb-2">
                @if($elemenMetadata['c11_dist_format']->status == '1')
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distribution-format" data-toggle="tooltip" title="Pengisian bagi format data yang disediakan untuk penyebaran. Contoh: tab, dwg, shp dan lain-lain">
                        <?php echo __('lang.format_name'); ?></label>
                </div>
                <div class="col-xl-3">
                    <input class="form-control form-control-sm " type="text" name="c11_dist_format" id="c11_dist_format"
                        placeholder="Format Name" value="{{ old('c11_dist_format') }}">
                </div>
                @endif
                @if($elemenMetadata['c11_version']->status == '1')
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-version" data-toggle="tooltip" title="Pengisianbagiversi format data yang disediakan untukpenyebaran. Contoh: MapInfo 7.8, Arcview 3.2,  AutoCad 2005 dan lain-lain">
                        <?php echo __('lang.format_version'); ?></label>
                </div>
                <div class="col-xl-2">
                    <input class="form-control form-control-sm" type="text" name="c11_version" id="c11_version"
                        placeholder="Format Version" value="{{ old('c11_version') }}">
                </div>
                @endif
            </div>
            @endif
            @if($elemenMetadata['c11_distributor']->status == '1')
            <h6 class="heading-small text-muted mt-4"><?php echo __('lang.distributor'); ?></h6>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distributor" data-toggle="tooltip" title="Organisasi yang bertanggungjawab dalam penyebaran maklumat geospatial tersebut">
                        <?php echo __('lang.organisation_name'); ?></label>
                </div>
                <div class="col-xl-6">
                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm"
                        placeholder="Organization Name" value="{{ old('c11_distributor') }}">
                </div>
            </div>
            @endif
            @if($elemenMetadata['c11_units_of_dist']->status == '1' || $elemenMetadata['c11_size']->status == '1' || $elemenMetadata['c11_link']->status == '1')
                <h6 class="heading-small text-muted mt-4"><?php echo __('lang.distributionTransferOptions'); ?></h6>
                <div class="row mb-2">
                    @if($elemenMetadata['c11_units_of_dist']->status == '1')
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-unit-distribution" data-toggle="tooltip" title="Pengisian bagi unit penyebaran maklumat geospatial yang telah disediakan untuk distribution. Samaada mengikut data, tiles, layer atau kawasan geografi.">
                            <?php echo __('lang.units_of_distribution'); ?></label>
                    </div>
                    <div class="col-xl-3">
                        <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist"
                            class="form-control form-control-sm" value="{{ old('c11_units_of_dist') }}">
                    </div>
                    @endif
                    @if($elemenMetadata['c11_size']->status == '1')
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-sizemb" data-toggle="tooltip" title="Saiz maklumat geospatial (megabytes)">
                            <?php echo __('lang.size'); ?></label>
                    </div>
                    <div class="col-xl-2">
                        <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm"
                            placehorder="Size" value="{{ old('c11_size') }}">
                    </div>
                    @endif
                </div>
                @if($elemenMetadata['c11_distributor']->status == '1')
                <div class="row">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-distributor" data-toggle="tooltip" title="Pautan capaian maklumat geospatial (untuk muat turun)">
                            <?php echo __('lang.link'); ?></label>
                    </div>
                    <div class="col-xl-2">
                        <input class="form-control form-control-sm" name="c11_link" id="c11_link"
                            placeholder="Ordering Website Link" type="text" value="{{ old('c11_link') }}">
                    </div>
                </div>
                @endif
            @endif
            @if($elemenMetadata['c11_fees']->status == '1' || $elemenMetadata['c11_order_instructions']->status == '1')
            <h6 class="heading-small text-muted mt-4"><?php echo __('lang.distributionOrderProcess'); ?></h6>
            <div class="row mb-2">
                @if($elemenMetadata['c11_fees']->status == '1')
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-fees" data-toggle="tooltip" title="Harga maklumat geospatial (Ringgit Malaysia)">
                        <?php echo __('lang.fees'); ?></label>
                </div>
                <div class="col-xl-2">
                    <input type="text" name="c11_fees" id="c11_fees" class="form-control form-control-sm"
                        placeholder="RM 0.00" value="{{ old('c11_fees') }}">
                </div>
                @endif
                @if($elemenMetadata['c11_order_instructions']->status == '1')
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-instructionorder" data-toggle="tooltip" title="Pengisian bagi Panduan/ Standard Order Proses (SOP) dalam memperolehi syarat-syarat atau arahan secara umum untuk mendapatkan/memperolehi maklumat geospatial">
                        <?php echo __('lang.ordering_instructions'); ?></label>
                </div>
                <div class="col-xl-5">
                    <input type="text" name="c11_order_instructions" id="c11_order_instructions"
                        class="form-control form-control-sm" value="{{ old('c11_order_instructions') }}">
                </div>
                @endif
            </div>
            @endif
            @if($elemenMetadata['c11_medium']->status == '1')
            <h6 class="heading-small text-muted mt-4"><?php echo __('lang.mediumFormat'); ?></h6>
            <div class="pl-lg-3">
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-medium" data-toggle="tooltip" title="Medium penyebaran maklumat geospatial">
                        <?php echo __('lang.medium_name'); ?></label>
                </div>
                <div class="col-xl-3">
                    <select name="c11_medium" id="c11_medium" class="form-control form-control-sm">
                        <option value="">Pilih...</option>
                        <option value="cdROM" {{ old('c11_medium') == 'cdROM' ? 'selected' : '' }}>cdROM</option>
                        <option value="dvd" {{ old('c11_medium') == 'dvd' ? 'selected' : '' }}>dvd</option>
                        <option value="dvdRom" {{ old('c11_medium') == 'dvdRom' ? 'selected' : '' }}>dvdRom</option>
                        <option value="3halfInchFloppy" {{ old('c11_medium') == '3halfInchFloppy' ? 'selected' : '' }}>
                            3halfInchFloppy</option>
                        <option value="5quarterInchFloppy"
                            {{ old('c11_medium') == '5quarterInchFloppy' ? 'selected' : '' }}>5quarterInchFloppy
                        </option>
                        <option value="7trackTape" {{ old('c11_medium') == '7trackTape' ? 'selected' : '' }}>7trackTape
                        </option>
                        <option value="9trackTape" {{ old('c11_medium') == '9trackTape' ? 'selected' : '' }}>9trackTape
                        </option>
                        <option value="3480Cartridge" {{ old('c11_medium') == '3480Cartridge' ? 'selected' : '' }}>
                            3480Cartridge</option>
                        <option value="3490Cartridge" {{ old('c11_medium') == '3490Cartridge' ? 'selected' : '' }}>
                            3490Cartridge</option>
                        <option value="3580Cartridge" {{ old('c11_medium') == '3580Cartridge' ? 'selected' : '' }}>
                            3580Cartridge</option>
                        <option value="4mmCartridgeTape"
                            {{ old('c11_medium') == '4mmCartridgeTape' ? 'selected' : '' }}>4mmCartridgeTape</option>
                        <option value="8mmCartridgeTape"
                            {{ old('c11_medium') == '8mmCartridgeTape' ? 'selected' : '' }}>8mmCartridgeTape</option>
                        <option value="1quaterInchCartridgeTape"
                            {{ old('c11_medium') == '1quaterInchCartridgeTape' ? 'selected' : '' }}>
                            1quaterInchCartridgeTape</option>
                        <option value="digitalLinearTape"
                            {{ old('c11_medium') == 'digitalLinearTape' ? 'selected' : '' }}>digitalLinearTape</option>
                        <option value="onLine" {{ old('c11_medium') == 'onLine' ? 'selected' : '' }}>onLine</option>
                        <option value="satellite" {{ old('c11_medium') == 'satellite' ? 'selected' : '' }}>satellite
                        </option>
                        <option value="telephoneLink" {{ old('c11_medium') == 'telephoneLink' ? 'selected' : '' }}>
                            telephoneLink</option>
                        <option value="hardcopy" {{ old('c11_medium') == 'hardcopy' ? 'selected' : '' }}>hardcopy
                        </option>
                    </select>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
