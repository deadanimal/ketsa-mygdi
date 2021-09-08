<div class="card card-primary mb-4 div_c16" id="div_c16">
    <div class="card-header">
        <a href="#collapse16" data-toggle="collapse">
            <h4 class="card-title">
                Custom Input
            </h4>
        </a>
    </div>
    <div id="collapse16" class="panel-collapse collapse in show" data-parent="#div_c16">
        <div class="card-body">
            <?php
            $ci = "";
            if(count($metadataxml->custom_input) > 0){
                foreach($metadataxml->custom_input as $mci){
                    $val = $mci->CharacterString;
                    $dbci = "";
                    foreach($customMetadataInput as $cmi){
                        if($cmi->name == $mci->CharacterString){
                            $dbci = $cmi;
                            break;
                        }
                    }
                    var_dump($dbci);
                    break;
                    ?>
                    <div class="my-1">
                        <div class="row my-0 py-0">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="uname">
                                    {{ $dbci->name }} {!! ($dbci->mandatory == "Yes" ? '<span class="text-warning">*</span>':"") !!}
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <?php
                                if($dbci->input_type == "Text"){
                                    ?>
                                    <input class="form-control form-control-sm ml-3" type="text" name="{{ $dbci->input_name }}" value="{{ $val }}"/>
                                    <?php
                                }elseif($dbci->input_type == "Textarea"){
                                    ?>
                                    <textarea class="form-control form-control-sm ml-3" name="{{ $dbci->input_name }}"/>{{ $val }}</textarea>
                                    <?php
                                }elseif($dbci->input_type == "Dropdown"){
                                    ?>
                                    <select class="form-control form-control-sm ml-3" name="{{ $dbci->input_name }}">
                                        <option value="">Pilih...</option>
                                        <option value="{{ $val }}" selected>{{ $val }}</option>
                                    </select>
                                    <?php
                                }elseif($dbci->input_type == "Date"){
                                    ?>
                                    <input class="form-control form-control-sm ml-3" type="date" name="{{ $dbci->input_name }}" value="{{ $val }}"/>
                                    <?php
                                }elseif($dbci->input_type == "Number"){
                                    ?>
                                    <input class="form-control form-control-sm ml-3" type="number" name="{{ $dbci->input_name }}" value="{{ $val }}"/>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>    
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>