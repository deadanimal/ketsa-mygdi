<?php $flag = 1; ?>
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
            if(count($metadataxml->customInput) > 0){
                foreach($metadataxml->customInput as $ci){
                    foreach($customMetadataInput as $cmi){
                        $val = "";
                        if(!empty($ci->{$cmi->input_name})){
                            $val = $ci->{$cmi->input_name}->CharacterString;
                            $flag *= 0;
                            ?>
                            <div class="my-1">
                                <div class="row my-0 py-0">
                                    <div class="col-3 pl-5">
                                        <label class="form-control-label mr-4" for="uname">
                                            {{ $cmi->name }}
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ $val }}
                                    </div>
                                </div>
                            </div>    
                            <?php
                            break;
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c16').hide();
        });
    </script>
    <?php
}
?>