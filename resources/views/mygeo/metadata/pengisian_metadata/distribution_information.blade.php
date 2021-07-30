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
            <h6 class="heading-small text-muted mt-4">Distribution Format</h6>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distribution-format">
                        Format Name</label>
                </div>
                <div class="col-xl-3">
                    <input class="form-control form-control-sm " type="text" name="c11_dist_format" id="c11_dist_format" placeholder="Format Name" value="{{old('c11_dist_format')}}">
                </div>
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-version">
                        Format Version </label>
                </div>
                <div class="col-xl-2">
                    <input class="form-control form-control-sm" type="text" name="c11_version" id="c11_version" placeholder="Format Version" value="{{old('c11_version')}}">
                </div>
            </div>
            <h6 class="heading-small text-muted mt-4">Distributor</h6>
            <div class="row mb-2">
                <div class="col-xl-2">
                    <label class="form-control-label" for="input-distributor">
                        Organisation Name </label>
                </div>
                <div class="col-xl-6">

                    <input type="text" name="c11_distributor" id="c11_distributor" class="form-control form-control-sm" placeholder="Organization Name" value="{{old('c11_distributor')}}">
                </div>
            </div>
            <h6 class="heading-small text-muted mt-4">Ordering Transfer Options</h6>
                <div class="row mb-2">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-unit-distribution">
                            Units of Distribution </label>
                    </div>
                    <div class="col-xl-3">
                        <input type="text" placeholder="Units" name="c11_units_of_dist" id="c11_units_of_dist" class="form-control form-control-sm" value="{{old('c11_units_of_dist')}}">
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-sizemb">
                            Size (Megabytes) </label>
                    </div>
                    <div class="col-xl-2">
                        <input type="text" name="c11_size" id="c11_size" class="form-control form-control-sm" placehorder="Size" value="{{old('c11_size')}}">
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-distributor">
                            Link </label>
                    </div>
                    <div class="col-xl-4">
                        <input class="form-control form-control-sm" name="c11_link" id="c11_link" placeholder="Ordering Website Link" type="text" value="{{old('c11_link')}}">
                    </div>
                </div>
            <h6 class="heading-small text-muted mt-4">Medium Format</h6>
            <div class="pl-lg-3">
                <div class="col-xl-1">
                    <label class="form-control-label" for="input-medium">
                        Medium Name</label>
                </div>
                <div class="col-xl-3">
                    <select name="c11_medium" id="c11_medium" class="form-control form-control-sm">
                        <option value="cdROM" {{ (old('c11_medium')=='cdROM' ? 'selected':'') }}>cdROM</option>
                        <option value="dvd" {{ (old('c11_medium')=='dvd' ? 'selected':'') }}>dvd</option>
                        <option value="dvdRom" {{ (old('c11_medium')=='dvdRom' ? 'selected':'') }}>dvdRom</option>
                        <option value="3halfInchFloppy" {{ (old('c11_medium')=='3halfInchFloppy' ? 'selected':'') }}>3halfInchFloppy</option>
                        <option value="5quarterInchFloppy" {{ (old('c11_medium')=='5quarterInchFloppy' ? 'selected':'') }}>5quarterInchFloppy</option>
                        <option value="7trackTape" {{ (old('c11_medium')=='7trackTape' ? 'selected':'') }}>7trackTape</option>
                        <option value="9trackTape" {{ (old('c11_medium')=='9trackTape' ? 'selected':'') }}>9trackTape</option>
                        <option value="3480Cartridge" {{ (old('c11_medium')=='3480Cartridge' ? 'selected':'') }}>3480Cartridge</option>
                        <option value="3490Cartridge" {{ (old('c11_medium')=='3490Cartridge' ? 'selected':'') }}>3490Cartridge</option>
                        <option value="3580Cartridge" {{ (old('c11_medium')=='3580Cartridge' ? 'selected':'') }}>3580Cartridge</option>
                        <option value="4mmCartridgeTape" {{ (old('c11_medium')=='4mmCartridgeTape' ? 'selected':'') }}>4mmCartridgeTape</option>
                        <option value="8mmCartridgeTape" {{ (old('c11_medium')=='8mmCartridgeTape' ? 'selected':'') }}>8mmCartridgeTape</option>
                        <option value="1quaterInchCartridgeTape" {{ (old('c11_medium')=='1quaterInchCartridgeTape' ? 'selected':'') }}>1quaterInchCartridgeTape</option>
                        <option value="digitalLinearTape" {{ (old('c11_medium')=='digitalLinearTape' ? 'selected':'') }}>digitalLinearTape</option>
                        <option value="onLine" {{ (old('c11_medium')=='onLine' ? 'selected':'') }}>onLine</option>
                        <option value="satellite" {{ (old('c11_medium')=='satellite' ? 'selected':'') }}>satellite</option>
                        <option value="telephoneLink" {{ (old('c11_medium')=='telephoneLink' ? 'selected':'') }}>telephoneLink</option>
                        <option value="hardcopy" {{ (old('c11_medium')=='hardcopy' ? 'selected':'') }}>hardcopy</option>
                    </select>
                </div>
                <h6 class="heading-small text-muted mt-4">Distribution Order Process</h6>
                <div class="row mb-2">
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-fees">
                            Fees </label>
                    </div>
                    <div class="col-xl-2">
                        <input type="text" name="c11_fees" id="c11_fees" class="form-control form-control-sm" placeholder="RM 0.00" value="{{old('c11_fees')}}">
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-instructionorder">
                            Ordering Instructions </label>
                    </div>
                    <div class="col-xl-5">
                        <input type="file" name="c11_order_instructions" id="c11_order_instructions" class="form-control form-control-sm" value="{{old('c11_order_instructions')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
