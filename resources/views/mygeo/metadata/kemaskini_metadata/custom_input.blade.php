<div class="card card-primary mb-4 div_c16" id="div_c16">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse16">
                <?php echo __('lang.accord_16'); ?>
            </a>
        </h4>
    </div>
    <div id="collapse16" class="panel-collapse collapse in show" data-parent="#div_c16">
        <div class="card-body">
            <?php
            foreach($customMetadataInput as $cmi){
                $val = "";
                if(count($metadataxml->customInput) > 0){
                    foreach($metadataxml->customInput as $ci){
                        if(!empty($ci->{$cmi->input_name})){
                            $val = $ci->{$cmi->input_name}->CharacterString;
                            break;
                        }
                    }
                }
                ?>
                <div class="my-1">
                    <div class="row my-0 py-0">
                        <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="uname">
                                <?php
                                if(isset($_GET['bhs'])){
                                    if($_GET['bhs'] == 'bm'){
                                        echo $cmi->name_bm;
                                    }if($_GET['bhs'] == 'en'){
                                        echo $cmi->name;
                                    }
                                }
                                ?>
                                {!! ($cmi->mandatory == "Yes" ? '<span class="text-warning">*</span>':"") !!}
                            </label><label class="float-right">:</label>
                        </div>
                        <div class="col-8">
                            <?php
                            if($cmi->input_type == "Text"){
                                ?>
                                <input class="form-control form-control-sm ml-3" type="text" name="{{ $cmi->input_name }}" value="{{ $val }}"/>
                                <?php
                            }elseif($cmi->input_type == "Textarea"){
                                ?>
                                <textarea class="form-control form-control-sm ml-3" name="{{ $cmi->input_name }}"/>{{ $val }}</textarea>
                                <?php
                            }elseif($cmi->input_type == "Dropdown"){
                                ?>
                                <select class="form-control form-control-sm ml-3" name="{{ $cmi->input_name }}">
                                    <option value="">Pilih...</option>
                                    <option value="{{ $val }}" selected>{{ $val }}</option>
                                </select>
                                <?php
                            }elseif($cmi->input_type == "Date"){
                                ?>
                                <input class="form-control form-control-sm ml-3" type="date" name="{{ $cmi->input_name }}" value="{{ $val }}"/>
                                <?php
                            }elseif($cmi->input_type == "Number"){
                                ?>
                                <input class="form-control form-control-sm ml-3" type="number" name="{{ $cmi->input_name }}" value="{{ $val }}"/>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>    
                <?php
            }
            ?>
        </div>
    </div>
</div>