@extends('layouts.app_ketsa')

@section('content')

<style>
    .metadataActionLinks {
        margin-right: 30px;
        text-decoration: underline;
        text-decoration-line: underline;
    }

    .navbar-search .form-control {
        width: 500px;
    }

    .navbar-search .form-control:focus {
        width: 550px;
    }

    .card {
        background-color: white;
    }

    .cardw {
        height: 200px;
    }

    .fautocomplete .clear{
/*    clear:both;
    margin-top: 20px;*/
   }

   .fautocomplete #searchResult{
    list-style: none;
    padding: 0px;
    position: absolute;
    margin: 0;
    z-index: 1;
   }

   .fautocomplete #searchResult li{
    background: lavender;
    padding: 4px;
    margin-bottom: 1px;
   }

   .fautocomplete #searchResult li:nth-child(even){
/*    background: cadetblue;
    color: white;*/
   }

   .fautocomplete #searchResult li:hover{
    cursor: pointer;
   }







/*   * { box-sizing: border-box; }
body {
  font: 16px Arial;
}*/
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
/*input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}*/
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>

<section class="content pb-4">
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-title pt-0">
            <h2 class="">Carian Metadata</h2>
        </div>
        <div class="col-12 form-inline my-4 justify-content-center">
            <form method="post" class="navbar-search navbar-search-light" action="{{url('senarai_metadata_nologin')}}" id="form_carian" autocomplete="off">
                @csrf
                <div class="form-inline mb-0">
                    <div class="input-group input-group-alternative input-group-merge" style="background-image: linear-gradient(to right, #ebba16, #ed8a19);">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <div class="fautocomplete">
                            <div>
                                <div class="autocomplete" style="width:300px;">
                                    <input placeholder="Carian..." type="text" name="carian" id="carian" class="form-control" autocomplete="off" value="{{ $carian }}">
                                </div>
                            </div>
                            <ul id="searchResult"></ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <button type="button" data-action="search-close" data-target="#navbar-search-main" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <a class="btn btn-primary text-white text-center btn_cari_submit ml-3" style="cursor:pointer;">
                <span><i class="mr-2 fas fa-search"></i></span>
                Cari
            </a>
        </div>
        <div class="row">
            <div class="col-4 pl-lg-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <h3 class="text-muted heading mb-0">Carian Tambahan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('senarai_metadata_nologin')}}" id="form_carian2">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Maklumat Kandungan (Content Type)</label>
                                            <select name="content_type" id="content_type" class="form-control form-control-sm" autofocus>
                                                <option value="" selected disabled>Select Content</option>
                                                <option value="application" {{ (isset($params['content_type']) && $params['content_type'] == 'application' ? 'selected':'') }}>Application</option>
                                                <option value="clearinghouse" {{ (isset($params['content_type']) && $params['content_type'] == 'clearinghouse' ? 'selected':'') }}>Clearing House</option>
                                                <option value="downloadableData" {{ (isset($params['content_type']) && $params['content_type'] == 'downloadableData' ? 'selected':'') }}>Downloadable Data</option>
                                                <option value="geographicActivities" {{ (isset($params['content_type']) && $params['content_type'] == 'geographicActivities' ? 'selected':'') }}>Geographic Activities</option>
                                                <option value="geographicService" {{ (isset($params['content_type']) && $params['content_type'] == 'geographicService' ? 'selected':'') }}>Geographic Services</option>
                                                <option value="mapFiles" {{ (isset($params['content_type']) && $params['content_type'] == 'mapFiles' ? 'selected':'') }}>Map File</option>
                                                <option value="offlineData" {{ (isset($params['content_type']) && $params['content_type'] == 'offlineData' ? 'selected':'') }}>Offline Data</option>
                                                <option value="staticMapImage" {{ (isset($params['content_type']) && $params['content_type'] == 'staticMapImage' ? 'selected':'') }}>Static Map Images</option>
                                                <option value="other" {{ (isset($params['content_type']) && $params['content_type'] == 'other' ? 'selected':'') }}>Other Documents</option>
                                                <option value="liveData" {{ (isset($params['content_type']) && $params['content_type'] == 'liveData' ? 'selected':'') }}>Live Data and Maps</option>

                                                <option value="Gridded" {{ (isset($params['content_type']) && $params['content_type'] == 'Gridded' ? 'selected':'') }}>Gridded</option>

                                                <option value="Imagery" {{ (isset($params['content_type']) && $params['content_type'] == 'Imagery' ? 'selected':'') }}>Imagery</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Topik (Topic Category)</label><br>
                                            <input type="checkbox" name="topic_category[]"  value="Administrative and Political Boundaries" {{ (isset($params['topic_category']) && in_array('Administrative and Political Boundaries',$params['topic_category']) ? 'checked':'') }}> Administrative and Political Boundaries<br>
                                            <input type="checkbox" name="topic_category[]"  value="Agriculture and Farming" {{ (isset($params['topic_category']) && in_array('Agriculture and Farming',$params['topic_category']) ? 'checked':'') }}> Agriculture and Farming<br>
                                            <input type="checkbox" name="topic_category[]"  value="Atmosphere and Climatic" {{ (isset($params['topic_category']) && in_array('Atmosphere and Climatic',$params['topic_category']) ? 'checked':'') }}> Atmosphere and Climatic<br>
                                            <input type="checkbox" name="topic_category[]"  value="Biology and Ecology" {{ (isset($params['topic_category']) && in_array('Biology and Ecology',$params['topic_category']) ? 'checked':'') }}> Biology and Ecology<br>
                                            <input type="checkbox" name="topic_category[]"  value="Business and Economic" {{ (isset($params['topic_category']) && in_array('Business and Economic',$params['topic_category']) ? 'checked':'') }}> Business and Economic<br>
                                            <input type="checkbox" name="topic_category[]"  value="Cadastral" {{ (isset($params['topic_category']) && in_array('Cadastral',$params['topic_category']) ? 'checked':'') }}> Cadastral<br>
                                            <input type="checkbox" name="topic_category[]"  value="Cultural, Society and Demography" {{ (isset($params['topic_category']) && in_array('Cadastral',$params['topic_category']) ? 'checked':'') }}> Cultural, Society and Demography<br>
                                            <input type="checkbox" name="topic_category[]"  value="Elevation and Derived Products" {{ (isset($params['topic_category']) && in_array('Elevation and Derived Products',$params['topic_category']) ? 'checked':'') }}> Elevation and Derived Products<br>
                                            <input type="checkbox" name="topic_category[]"  value="Environment and Conservation" {{ (isset($params['topic_category']) && in_array('Environment and Conservation',$params['topic_category']) ? 'checked':'') }}> Environment and Conservation<br>
                                            <input type="checkbox" name="topic_category[]"  value="Facilities and Structures" {{ (isset($params['topic_category']) && in_array('Facilities and Structures',$params['topic_category']) ? 'checked':'') }}> Facilities and Structures<br>
                                            <input type="checkbox" name="topic_category[]"  value="Geological and Geophysical" {{ (isset($params['topic_category']) && in_array('Geological and Geophysical',$params['topic_category']) ? 'checked':'') }}> Geological and Geophysical<br>
                                            <input type="checkbox" name="topic_category[]"  value="Human Health and Disease" {{ (isset($params['topic_category']) && in_array('Human Health and Disease',$params['topic_category']) ? 'checked':'') }}> Human Health and Disease<br>
                                            <input type="checkbox" name="topic_category[]"  value="Imagery and Base Maps" {{ (isset($params['topic_category']) && in_array('Imagery and Base Maps',$params['topic_category']) ? 'checked':'') }}> Imagery and Base Maps<br>
                                            <input type="checkbox" name="topic_category[]"  value="Inland Water Resources" {{ (isset($params['topic_category']) && in_array('Inland Water Resources',$params['topic_category']) ? 'checked':'') }}> Inland Water Resources<br>
                                            <input type="checkbox" name="topic_category[]"  value="Locations and Geodetic Networks" {{ (isset($params['topic_category']) && in_array('Locations and Geodetic Networks',$params['topic_category']) ? 'checked':'') }}> Locations and Geodetic Networks<br>
                                            <input type="checkbox" name="topic_category[]"  value="Military" {{ (isset($params['topic_category']) && in_array('Military',$params['topic_category']) ? 'checked':'') }}> Military<br>
                                            <input type="checkbox" name="topic_category[]"  value="Oceans and Estuaries" {{ (isset($params['topic_category']) && in_array('Oceans and Estuaries',$params['topic_category']) ? 'checked':'') }}> Oceans and Estuaries<br>
                                            <input type="checkbox" name="topic_category[]"  value="Transportation Networks" {{ (isset($params['topic_category']) && in_array('Transportation Networks',$params['topic_category']) ? 'checked':'') }}> Transportation Networks<br>
                                            <input type="checkbox" name="topic_category[]"  value="Utilities and Communication" {{ (isset($params['topic_category']) && in_array('Utilities and Communication',$params['topic_category']) ? 'checked':'') }}> Utilities and Communication<br>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tarikh Mula</label>
                                            <input type="date" name="tarikh_mula" id="tarikh_mula" class="form-control form-control-sm" data-target="#tarikh_mula_div" value="{{ (isset($params['tarikh_mula']) ? $params['tarikh_mula']:'') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tarikh Tamat</label>
                                            <input type="date" name="tarikh_tamat" id="tarikh_tamat" class="form-control form-control-sm" data-target="#tarikh_tamat_div" value="{{ (isset($params['tarikh_tamat']) ? $params['tarikh_tamat']:'') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-8">
                <div class="row divSenaraiMetadata" style="display:none;">
                    <div class="col-12 pr-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="heading text-muted text-center mb-0">Senarai Metadata</h3>
                                <!-- <button type="button" class="btn btn-default float-right">Kemas Kini</button> -->
                            </div>
                            <div class="card-body">
                                <div id="accordion">
                                    <?php
                                    $numCol = 3;
                                    $rowCount = 0;
                                    $rows = 5;
                                    $bil = 1;
                                    if (count($metadatas) > 0) {
                                        foreach ($metadatas as $key => $val) {
                                            if ($rowCount % $numCol == 0) { ?>
                                                <div class="row">
                                                <?php }
                                                        $rowCount++ ?>

                                                <?php //=== collapse1 =============================================================
                                                        ?>
                                                <div class="col-4">
                                                    <div class="card card-primary" id="divParentCollapse{{ $bil }}">
                                                        <div class="card-header cardw">
                                                            <a class="a_title" data-toggle="collapse" href="#divCollapse{{ $bil }}">
                                                                <?php
                                                                $met_name = '';
                                                                if (isset($val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != '') {
                                                                    echo $val->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                                                }elseif (isset($val->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $val->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != '') {
                                                                    echo $val->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                                                                }else{
                                                                    ?>--no title set--<?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $abstract = "";
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $val->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                                                                    $abstract = trim($val->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
                                                                }elseif(isset($val->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $val->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                                                                    $abstract = trim($val->identificationInfo->MD_DataIdentification->abstract->CharacterString);
                                                                }
                                                                ?>
                                                                <p style="white-space: normal;width:100%;height:50px;overflow: hidden;"><?php echo (strlen($abstract) > 225 ? substr($abstract, 0, 225) . "..." : $abstract); ?></p>
                                                            </a>
                                                            <?php /* @include('abstract') */ ?>
                                                        </div>
                                                        <div id="divCollapse{{ $bil }}" class="panel-collapse collapse in" data-parent="#divParentCollapse{{ $bil }}">
                                                            <div class="card-body">
                                                                <input class="p_abstract" type="hidden" value="{{ $abstract }}">
                                                                <form method="post" action="{{ url('/lihat_metadata_nologin') }}" id="formViewMetadata{{ $key }}" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <form method="post" action="{{ url('/lihat_xml_nologin') }}" id="formViewXml{{ $key }}" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="metadata_id" value="{{ $key }}">
                                                                </form>
                                                                <a href="#" class="btn btn-sm btn-primary metadataActionLinks aViewMetadata col-12 mb-2" onClick="return false;" data-metid="{{$key}}">Perincian Metadata</a><br>
                                                                <a href="#" class="btn btn-sm btn-warning metadataActionLinks aViewXml col-12 mb-2" onClick="return false;" data-metid="{{$key}}">Metadata (XML)</a><br>
                                                                <?php
                                                                $url = "";
                                                                if(isset($val->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString)){
                                                                    $url = $val->identificationInfo->SV_ServiceIdentification->serviceUrl->CharacterString;
                                                                }elseif(isset($val->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString)){
                                                                    $url = $val->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString;
                                                                }
                                                                if(trim($url) != ""){
                                                                    ?>
                                                                    <a href="#" class="btn btn-sm btn-success metadataActionLinks aViewMap col-12 mb-2" onClick="return false;" data-metid="{{$key}}" data-toggle="modal" data-target="#modal-showmap" data-mapurl="{{ $url }}" data-backdrop="false">Show map</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                $website = (isset($val->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) ? $val->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL : "");
                                                                if(trim($website) != ""){
                                                                    ?>
                                                                    <a href="{{ $website }}" class="btn btn-sm btn-default metadataActionLinks col-12 mb-2" target="_blank">Website</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($rowCount % $numCol == 0) { ?>
                                                </div>
                                            <?php } ?>

                                    <?php
                                            $bil++;
                                        }
                                    }
                                    ?>
                                </div>
                                {{ ((isset($metadatasdb) && !empty($metadatasdb)) ? $metadatasdb->withQueryString()->appends($params)->links():"") }}
                                
                                <?php /* Showing {{--($metadatasdb->currentPage()-1)* $metadatasdb->perPage()+($metadatasdb->total() ? 1:0)--}} to {{--($metadatasdb->currentPage()-1)*$metadatasdb->perPage()+count($metadatasdb)--}}  of  {{--$metadatasdb->total()--}}  Results */ ?>
                                
                                Paparan {{$metadatasdb->total()}} rekod ({{($metadatasdb->currentPage()-1)* $metadatasdb->perPage()+($metadatasdb->total() ? 1:0)}} hingga {{($metadatasdb->currentPage()-1)*$metadatasdb->perPage()+count($metadatasdb)}})
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== MODALS show map =====-->
    <div class="modal fade" id="modal-showmap">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php

                                ?>
                                <iframe id="mapiframe" src="" height="425px" width="100%" title="ArcGIS REST Services">
</iframe>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p id="modal_title" style="white-space: normal;width:100%;margin-top:20px;"></p>
                                <p id="modal_abstract" style="white-space: normal;width:100%;margin-top:20px;"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-sm btn-primary metadataActionLinks a_metadata_details col-3 mb-2" onClick="return false;" data-metid="">Metadata Details</a><br>
                                <a href="#" class="btn btn-sm btn-success metadataActionLinks a_metadata_xml col-3 mb-2" onClick="return false;" data-metid="">Metadata (XML)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between1">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @include('modal_carian_tambahan')
    <div id="preloader"></div>
</section>

<script>
    function setText(element){
        var value = $(element).text();
        $("#carian").val(value);
        $("#searchResult").empty();
    }

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            var counter = 1;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                if (arr[i].toLowerCase().indexOf(val.toLowerCase()) == -1) {
                    //not found
                }else{
                    //found
                    if(counter > 8){
                        return false;
                    }
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = arr[i].substr(0, val.length);
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                    counter++;
                }


//                /*check if the item starts with the same letters as the text field value:*/
//                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
//                    /*create a DIV element for each matching element:*/
//                    b = document.createElement("DIV");
//                    /*make the matching letters bold:*/
//                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
//                    b.innerHTML += arr[i].substr(val.length);
//                    /*insert a input field that will hold the current array item's value:*/
//                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
//                    /*execute a function when someone clicks on the item value (DIV element):*/
//                    b.addEventListener("click", function(e) {
//                        /*insert the value for the autocomplete text field:*/
//                        inp.value = this.getElementsByTagName("input")[0].value;
//                        /*close the list of autocompleted values,
//                        (or any other open lists of autocompleted values:*/
//                        closeAllLists();
//                    });
//                    a.appendChild(b);
//                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    $(document).ready(function() {
        var availableTags = <?php echo json_encode($metadataTitles); ?>;
        autocomplete(document.getElementById("carian"), availableTags);

//        $("#carian").off().bind("keyup",function(event){
//            event.stopImmediatePropagation();
//            var carian = $(this).val();
//            $("#searchResult").empty();
//            if(carian != "" && carian.length > 2){
//                $.ajax({
//                    method: "POST",
//                    url: "{{-- url('findMetadataByName') --}}",
//                    data: {
//                        '_token': "{{-- csrf_token() --}}",
//                        'carian': carian,
//                    },
//                    dataType: 'json',
//                }).done(function(response) {
//                    $("#searchResult").empty();
//                    $.each(response, function(index,value) {
//                        $("#searchResult").append("<li value='"+index+"'>"+value[0]+"</li>");
//                    });
//                    $("#searchResult li").bind("click",function(){
//                        setText(this);
//                    });
//                });
//            }
//        });

        <?php
        if (count($metadatas) > 0) {
            ?>$(".divSenaraiMetadata").show();
        <?php
        } else {
            ?>$(".divSenaraiMetadata").hide();
    <?php
    }
    ?>

    $("#table_metadatas").DataTable({
        "ordering": false,
        "responsive": true,
        "autoWidth": false,
        "oLanguage": {
            "sInfo": "Paparan _TOTAL_ rekod (_START_ hingga _END_)",
            "sEmptyTable": "Tiada rekod ditemui",
            "sZeroRecords": "Tiada rekod ditemui",
            "sLengthMenu": "Papar _MENU_ rekod",
            "sLoadingRecords": "Sila tunggu...",
            "sSearch": "Carian:",
            "oPaginate": {
                "sFirst": "Pertama",
                "sLast": "Terakhir",
                "sNext": ">",
                "sPrevious": "<",
            }
        }
    });

    $('#tarikh_mula_div,#tarikh_tamat_div').datetimepicker({
        format: 'DD-MM-YYYY H:mm:ss',
        // format: 'L'
    });

    $(document).on("click", ".aViewMetadata, .a_metadata_details", function() {
        var metid = $(this).data('metid');
        $("#formViewMetadata" + metid).submit();
    });
    $(document).on("click", ".aViewXml, .a_metadata_xml", function() {
        var metid = $(this).data('metid');
        $("#formViewXml" + metid).submit();
    });
    $(document).on("click", ".aViewMap", function () {
        var mapurl = $(this).data('mapurl');
        var abstract = $(this).parent().find('.p_abstract').val();
        var title = $(this).parent().parent().parent().find('.a_title').html();

        $('#mapiframe').attr('src', '<?php echo url("/"); ?>/intecxmap/search/view-map-service.html?url='+mapurl);
        $('#modal_abstract').html(abstract);
        $('#modal_title').html(title);
        $('.a_metadata_details').data('metid',$(this).data('metid'));
        $('.a_metadata_xml').data('metid',$(this).data('metid'));
        $('#modal-showmap').modal('show');
    });

    $(document).on("click", ".btn_cari_submit", function() {
        $("#form_carian").submit();
    });
    });
</script>
@stop
