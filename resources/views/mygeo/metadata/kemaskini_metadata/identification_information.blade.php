<div class="card card-primary mb-4 div_c2" id="div_c2">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" href="#collapse2">
                <?php echo __('lang.accord_2'); ?>
            </a>
        </h4>
        @if (auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == 'no')
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal"
                data-target="#modal2">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
            <button type="button" class="btn btn-secondary float-right" data-toggle="modal"
                data-target="#modal2">Catatan</button>
        @endif
    </div>
    <div id="collapse2" class="panel-collapse collapse in show" data-parent="#div_c2">
        <div class="card-body">
            <div class="my-2">
                <?php
                $metDateType = '';
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ (isset($metadataxml->customInputs->accordion2->$key) ? $metadataxml->customInputs->accordion2->$key:"") }}"/>
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_metadataName"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="c2_metadataName">
                                    <?php
                                    if (isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != '') {
                                        if (strtolower($metadataxml->hierarchyLevel->MD_ScopeCode) == 'dataset') {
                                            echo strtoupper(__('lang.title'));
                                        } else {
                                            if(isset($_GET['bhs'])){
                                                if($_GET['bhs'] == "en"){
                                                    echo 'Metadata Name';
                                                }else{
                                                    echo 'Tajuk Metadata';
                                                }
                                            }elseif($langSelected == "en"){
                                                echo 'Metadata Name';
                                            }elseif($langSelected == "bm"){
                                                echo 'Tajuk Metadata';
                                            }
                                        }
                                    }else{
                                        echo strtoupper(__('lang.title'));
                                    }
                                    ?>
                                    <?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $met_name = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != '') {
                                    $met_name = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != '') {
                                    $met_name = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_metadataName" id="c2_metadataName"
                                    class="form-control form-control-sm " value="{{ strtoupper($met_name) }}">
                                <input type="hidden" name="c2_saveAsNew" id="c2_saveAsNew" value="no">
                                @error('c2_metadataName')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_product_type"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataNam3" data-toggle="tooltip" title="Pemilihan jenis abstrak">
                                <?php echo __('lang.type_of_product'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $typeofProd = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString != '') {
                                    $typeofProd = trim($metadataxml->identificationInfo->MD_DataIdentification->productType->productTypeItem->CharacterString);
                                }
                                ?>
                                <select name="c2_product_type" id="c2_product_type" class="form-control form-control">
                                    <option value="" selected>Pilih...</option>
                                    <option value="Application" {{ $typeofProd == 'Application' ? 'selected' : '' }}>
                                        Application</option>
                                    <option value="Document" {{ $typeofProd == 'Document' ? 'selected' : '' }}>Document
                                    </option>
                                    <option value="GIS Activity/Project"
                                        {{ $typeofProd == 'GIS Activity/Project' ? 'selected' : '' }}>GIS Activity/Project
                                    </option>
                                    <option value="Map" {{ $typeofProd == 'Map' ? 'selected' : '' }}>Map</option>
                                    <option value="Raster Data" {{ $typeofProd == 'Raster Data' ? 'selected' : '' }}>
                                        Raster
                                        Data</option>
                                    <option value="Services" {{ $typeofProd == 'Services' ? 'selected' : '' }}>Services
                                    </option>
                                    <option value="Software" {{ $typeofProd == 'Software' ? 'selected' : '' }}>Software
                                    </option>
                                    <option value="Vector Data" {{ $typeofProd == 'Vector Data' ? 'selected' : '' }}>
                                        Vector
                                        Data</option>
                                </select>
                                @error('c2_product_type')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                }
                ?> 
                    
                <h2 class="heading-small text-muted"><?php echo __('lang.abstract'); ?></h2>
                
                <?php //=== abstract============================================================== ?>
                <div class="row mb-4 divIdentificationInformationUrl" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                    <div class="col-3">
                        <label class="form-control-label mr-4" for="c10_file_url" data-toggle="tooltip"
                            title="Pengisian pautan imej berkenaan (saiz ideal adalah 200 pixels lebar dan 133 pixels tinggi)">
                            <?php echo __('lang.URL'); ?><span class="text-warning">*</span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $url = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString != '') {
                            $url = $metadataxml->identificationInfo->MD_DataIdentification->fileURL->CharacterString;
                        }
                        ?>
                        <input type="text" name="c10_file_url"
                            class="form-control form-control-sm  inputIdentificationInformationUrl urlToTest"
                            value="{{ $url }}">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-sm btn-success btnTestUrl" type="button" data-toggle="modal"
                            data-target="#modal-showweb" data-backdrop="false">Test</button>
                        @error('c2_serviceUrl')
                            <div class="text-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <?php 
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    ?>
                    @include('mygeo.metadata.kemaskini_metadata.abstract')
                    <?php
                    if($key == "c2_metadataDate"){
                        ?>
                        <div class="row mb-2 divMetadataDate" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataDate" data-toggle="tooltip" title="Tarikh berkaitan  bagi maklumat geospatial.">
                                <?php echo __('lang.date'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $metDate = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
                                    $metDate = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->date->Date;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date != '') {
                                    $metDate = $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->date->Date;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="date" name="c2_metadataDate"
                                    id="c2_metadataDate" value="{{ $metDate }}">
                                @error('c2_metadataDate')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_metadataDateType"){
                        ?>
                        <div class="row mb-2 divMetadataDateType" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataDateType" data-toggle="tooltip" title="Pengisian secara pilihan mengenai peringkat maklumat geospatial">
                                <?php echo __('lang.date_type'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != '') {
                                    $metDateType = ucwords($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode);
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode != '') {
                                    $metDateType = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->date->CI_Date->dateType->CI_DateTypeCode);
                                }
                                ?>
                                <select name="c2_metadataDateType" id="c2_metadataDateType"
                                class="form-control form-control-sm ">
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
                                @error('c2_metadataDateType')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_metadataStatus"){
                        ?>
                        <div class="row mb-2 divMetadataStatus" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_metadataStatus" data-toggle="tooltip" title="Status bagi maklumat geospatial merujuk dokumen MGMS (LAMPIRAN D)">
                                <?php echo __('lang.status'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $metStatus = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->status->MD_ProgressCode) && $metadataxml->identificationInfo->MD_DataIdentification->status->MD_ProgressCode != '') {
                                    $metStatus = ucwords($metadataxml->identificationInfo->MD_DataIdentification->status->MD_ProgressCode);
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode != '') {
                                    $metStatus = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->status->MD_ProgressCode);
                                }
                                if($metStatus == "HistoricalArchive"){
                                    $metStatus = "Historical Archive";
                                }elseif($metStatus == "OnGoing"){
                                    $metStatus = "On Going";
                                }elseif($metStatus == "UnderDevelopment"){
                                    $metStatus = "Under Development";
                                }
                                ?>
                                <select class="form-control form-control-sm" name="c2_metadataStatus"
                                    id="c2_metadataStatus">
                                    <option value="" selected>Pilih...</option>
                                    <option value="Accepted" {{ $metStatus == 'Accepted' ? 'selected' : '' }}
                                        class="optStatus_dataset">Accepted</option>
                                    <option value="Completed" {{ $metStatus == 'Completed' ? 'selected' : '' }}
                                        class="optStatus_dataset">Completed</option>
                                    <option value="Deprecated" {{ $metStatus == 'Deprecated' ? 'selected' : '' }}
                                        class="optStatus_dataset">Deprecated</option>
                                    <option value="Final" {{ $metStatus == 'Final' ? 'selected' : '' }}
                                        class="optStatus_dataset">Final</option>
                                    <option value="Historical Archive"
                                        {{ $metStatus == 'Historical Archive' ? 'selected' : '' }}
                                        class="optStatus_dataset">Historical Archive</option>
                                    <option value="Not Accepted" {{ $metStatus == 'Not Accepted' ? 'selected' : '' }}
                                        class="optStatus_dataset">Not Accepted</option>
                                    <option value="Obsolete" {{ $metStatus == 'Obsolete' ? 'selected' : '' }}
                                        class="optStatus_dataset">Obsolete</option>
                                    <option value="On Going" {{ $metStatus == 'On Going' ? 'selected' : '' }}
                                        class="optStatus_dataset">On Going</option>
                                    <option value="Pending" {{ $metStatus == 'Pending' ? 'selected' : '' }}
                                        class="optStatus_dataset">Pending</option>
                                    <option value="Planned" {{ $metStatus == 'Planned' ? 'selected' : '' }}
                                        class="optStatus_dataset">Planned</option>
                                    <option value="Proposed" {{ $metStatus == 'Proposed' ? 'selected' : '' }}
                                        class="optStatus_dataset">Proposed</option>
                                    <option value="Required" {{ $metStatus == 'Required' ? 'selected' : '' }}
                                        class="optStatus_dataset">Required</option>
                                    <option value="Retired" {{ $metStatus == 'Retired' ? 'selected' : '' }}
                                        class="optStatus_dataset">Retired</option>
                                    <option value="Superseded" {{ $metStatus == 'Superseded' ? 'selected' : '' }}
                                        class="optStatus_dataset">Superseded</option>
                                    <option value="Tentative" {{ $metStatus == 'Tentative' ? 'selected' : '' }}
                                        class="optStatus_dataset">Tentative</option>
                                    <option value="Withrawn" {{ $metStatus == 'Withrawn' ? 'selected' : '' }}
                                        class="optStatus_dataset">Withrawn</option>
                                    <option value="Under Development"
                                        {{ $metStatus == 'Under Development' ? 'selected' : '' }}
                                        class="optStatus_dataset">Under Development</option>
                                    <option value="Valid" {{ $metStatus == 'Valid' ? 'selected' : '' }}
                                        class="optStatus_dataset">Valid</option>

                                    <option value="Completed" {{ $metStatus == 'Completed' ? 'selected' : '' }}
                                        class="optStatus_services">Completed</option>
                                    <option value="Historical Archive"
                                        {{ $metStatus == 'Historical Archive' ? 'selected' : '' }}
                                        class="optStatus_services">Historical Archive</option>
                                    <option value="Obsolete" {{ $metStatus == 'Obsolete' ? 'selected' : '' }}
                                        class="optStatus_services">Obsolete</option>
                                    <option value="On Going" {{ $metStatus == 'On Going' ? 'selected' : '' }}
                                        class="optStatus_services">On Going</option>
                                    <option value="Planned" {{ $metStatus == 'Planned' ? 'selected' : '' }}
                                        class="optStatus_services">Planned</option>
                                    <option value="Required" {{ $metStatus == 'Required' ? 'selected' : '' }}
                                        class="optStatus_services">Required</option>
                                    <option value="Withdrawn" {{ $metStatus == 'Withdrawn' ? 'selected' : '' }}
                                        class="optStatus_services">Withdrawn</option>
                                    <option value="Under Development"
                                        {{ $metStatus == 'Under Development' ? 'selected' : '' }}
                                        class="optStatus_services">Under Development</option>
                                </select>
                                @error('c2_metadataStatus')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_typeOfServices"){
                        ?>
                        <div class="row mb-2 divTypeOfServices" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_typeOfServices" data-toggle="tooltip" title="Pengisian secara pilihan, jenis service bagi maklumat geospatial">
                                <?php echo __('lang.type_of_services'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $typeOfServices = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString != '') {
                                    $typeOfServices = $metadataxml->identificationInfo->MD_DataIdentification->typeOfServices->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName) && $metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName != '') {
                                    $typeOfServices = $metadataxml->identificationInfo->SV_ServiceIdentification->serviceType->LocalName;
                                }
                                if($typeOfServices == "urn:x-esri:specification:ServiceType:ArcIMS"){
                                    $typeOfServices = "ArcIMS Service";
                                }elseif($typeOfServices == "urn:ogc:dataFormat:GML:2.0" || $typeOfServices == "urn:ogc:dataFormat:GML:2.1.1" || $typeOfServices == "urn:ogc:dataFormat:GML:2.1.2" || $typeOfServices == "urn:ogc:dataFormat:GML:3.0" || $typeOfServices == "urn:ogc:dataFormat:GML:3.1.1"){
                                    $typeOfServices = "OGC Geography Markup Language";
                                }elseif($typeOfServices == "urn:ogc:serviceType:CoordinateTransformationService:1.0" || $typeOfServices == "urn:ogc:serviceType:CoordinateTransformationService:1.0:COM" || $typeOfServices == "urn:ogc:serviceType:CoordinateTransformationService:1.0:CORBA" || $typeOfServices == "urn:ogc:serviceType:CoordinateTransformationService:1.0:Java"){
                                    $typeOfServices = "OGC Coordinate Transformation Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:GridCoverage:1.0:COM" || $typeOfServices == "urn:ogc:serviceType:GridCoverage:1.0:CORBA"){
                                    $typeOfServices = "OGC Grid Coverage Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:OpenLSCoreServices:1.0" || $typeOfServices == "urn:ogc:serviceType:OpenLSCoreServices:1.0:SOAP" || $typeOfServices == "urn:ogc:serviceType:OpenLSCoreServices:1.1"){
                                    $typeOfServices = "OGC Location Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:KML:2.2"){
                                    $typeOfServices = "OGC KML 2.2";
                                }elseif($typeOfServices == "urn:ogc:serviceType:SimpleFeatureAccess:1.0:CORBA" || $typeOfServices == "urn:ogc:serviceType:SimpleFeatureAccess:1.1:OLE/COM" || $typeOfServices == "urn:ogc:serviceType:SimpleFeatureAccess:1.1:SQL" || $typeOfServices == "urn:ogc:serviceType:SimpleFeatureAccess:1.2:SQL"){
                                    $typeOfServices = "OGC Simple Feature Access";
                                }elseif($typeOfServices == "urn:ogc:serviceType:SensorObservationService:1.0"){
                                    $typeOfServices = "OGC Sensor Observation Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:WebCoverageService:1.0" || $typeOfServices == "urn:ogc:serviceType:WebCoverageService:1.1.0"){
                                    $typeOfServices = "OGC Web Coverage Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:WebFeatureService:1.0" || $typeOfServices == "urn:ogc:serviceType:WebFeatureService:1.1"){
                                    $typeOfServices = "OGC Web Feature Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:WebMapService:1.0" || $typeOfServices == "urn:ogc:serviceType:WebMapService:1.1" || $typeOfServices == "urn:ogc:serviceType:WebMapService:1.1.1" || $typeOfServices == "urn:ogc:serviceType:WebMapService:1.3.0" || $typeOfServices == "urn:ogc:serviceType:WebMapService:Post:0.0.3"){
                                    $typeOfServices = "OGC Web Map Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:WebProcessingService:0.4"){
                                    $typeOfServices = "OGC Web Processing Service";
                                }elseif($typeOfServices == "urn:ogc:serviceType:GenericService"){
                                    $typeOfServices = "Generic Service";
                                }
                                ?>
                                <select class="form-control form-control-sm" name="c2_typeOfServices"
                                    id="c2_typeOfServices">
                                    <option value="" selected>Pilih...</option>
                                    <option value="ArcIMS Service"
                                        {{ $typeOfServices == 'ArcIMS Service' ? 'selected' : '' }}>ArcIMS Service
                                    </option>
                                    <option value="ArcGIS Services"
                                        {{ $typeOfServices == 'ArcGIS Services' ? 'selected' : '' }}>ArcGIS Services
                                    </option>
                                    <option value="OGC Geography Markup Language"
                                        {{ $typeOfServices == 'OGC Geography Markup Language' ? 'selected' : '' }}>OGC
                                        Geography Markup Language</option>
                                    <option value="OGC Catalouge Service"
                                        {{ $typeOfServices == 'OGC Catalouge Service' ? 'selected' : '' }}>OGC Catalouge
                                        Service</option>
                                    <option value="OGC Coordinate Transformation Service Archive"
                                        {{ $typeOfServices == 'OGC Coordinate Transformation Service' ? 'selected' : '' }}>
                                        OGC Coordinate Transformation Service</option>
                                    <option value="OGC Grid Coverage Service"
                                        {{ $typeOfServices == 'OGC Grid Coverage Service' ? 'selected' : '' }}>OGC Grid
                                        Coverage Service</option>
                                    <option value="OGC Location Service"
                                        {{ $typeOfServices == 'OGC Location Service' ? 'selected' : '' }}>OGC Location
                                        Service</option>
                                    <option value="OGC KML 2.2" {{ $typeOfServices == 'OGC KML 2.2' ? 'selected' : '' }}>
                                        OGC KML 2.2</option>
                                    <option value="OGC Simple Feature Access"
                                        {{ $typeOfServices == 'OGC Simple Feature Access' ? 'selected' : '' }}>OGC Simple
                                        Feature Access</option>
                                    <option value="OGC Sensor Observation Service"
                                        {{ $typeOfServices == 'OGC Sensor Observation Service' ? 'selected' : '' }}>OGC
                                        Sensor Observation Service</option>
                                    <option value="OGC Web Coverage Service"
                                        {{ $typeOfServices == 'OGC Web Coverage Service' ? 'selected' : '' }}>OGC Web
                                        Coverage Service</option>
                                    <option value="OGC Web Feature Service"
                                        {{ $typeOfServices == 'OGC Web Feature Service' ? 'selected' : '' }}>OGC Web
                                        Feature Service</option>
                                    <option value="OGC Web Map Service"
                                        {{ $typeOfServices == 'OGC Web Map Service' ? 'selected' : '' }}>OGC Web Map
                                        Service</option>
                                    <option value="OGC Web Processing Service"
                                        {{ $typeOfServices == 'OGC Web Processing Service' ? 'selected' : '' }}>OGC Web
                                        Processing Service</option>
                                    <option value="Generic Service"
                                        {{ $typeOfServices == 'Generic Service' ? 'selected' : '' }}>Generic Service
                                    </option>
                                </select>
                                @error('c2_typeOfServices')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_operationName"){
                        ?>
                        <div class="row mb-2 divOperationName" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="c2_operationName">
                                    <?php echo __('lang.operation_name'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $operationName = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != '') {
                                    $operationName = $metadataxml->identificationInfo->MD_DataIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString != '') {
                                    $operationName = $metadataxml->identificationInfo->SV_ServiceIdentification->containsOperations->SV_OperationMetadata->operationName->CharacterString;
                                }
                                ?>
                                <input type="text" class="form-control form-control-sm" name="c2_operationName"
                                    id="c2_operationName" value="{{ $operationName }}">
                                @error('c2_operationName')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_serviceUrl"){
                        ?>
                        <div class="row mb-2 divServiceUrl" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_serviceUrl" data-toggle="tooltip" title="URL bagi service berkenaan. Klik ‘Test’ bagi percubaan URL berkenaan.">
                                <?php echo __('lang.service_URL'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-6">
                                <?php
                                $serviceUrl = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString != '') {
                                    $serviceUrl = $metadataxml->identificationInfo->MD_DataIdentification->serviceUrl->CharacterString;
                                }
                                ?>
                                <input type="text" class="form-control form-control-sm" name="c2_serviceUrl"
                                    id="c2_serviceUrl" value="{{ $serviceUrl }}">
                                @error('c2_serviceUrl')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <button class="btn btn-sm btn-success" id="btnTestServiceUrl3_esri" type="button" style="display: inline-block;">Test (Esri)</button>
                                <button class="btn btn-sm btn-success" id="btnTestServiceUrl3_wms" type="button" data-toggle="modal" data-target="#modal-showmap" data-backdrop="false" style="display: inline-block;">Test (WMS)</button>
                                @error('c2_serviceUrl')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_typeOfCouplingDataset"){
                        ?>
                        <div class="row mb-2 divTypeOfCouplingDataset" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3">
                            <label class="form-control-label mr-4" for="c2_typeOfCouplingDataset" data-toggle="tooltip" title="Pilihan jenis gandingan bagi Dataset">
                                <?php echo __('lang.type_of_coupling_with_dataset'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $typeCouplingDataset = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) && trim($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType) != '') {
                                    $typeCouplingDataset = ucwords($metadataxml->identificationInfo->MD_DataIdentification->couplingType->SV_CouplingType);
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->SV_CouplingType) && trim($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->SV_CouplingType) != '') {
                                    $typeCouplingDataset = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->couplingType->SV_CouplingType);
                                }
                                ?>
                                <select class="form-control form-control-sm" name="c2_typeOfCouplingDataset"
                                    id="c2_typeOfCouplingDataset">
                                    <option value="">Pilih...</option>
                                    <option value="Loose" {{ $typeCouplingDataset == 'Loose' ? 'selected' : '' }}>Loose
                                    </option>
                                    <option value="Mixed" {{ $typeCouplingDataset == 'Mixed' ? 'selected' : '' }}>Mixed
                                    </option>
                                    <option value="Tight" {{ $typeCouplingDataset == 'Tight' ? 'selected' : '' }}>Tight
                                    </option>
                                </select>
                                @error('c2_typeOfCouplingDataset')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            
            <h2 class="heading-small text-muted"><?php echo __('lang.responsibleParty'); ?></h2>
            <div class="my-2">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                    if($key == "c2_contact_name"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataNam2e" data-toggle="tooltip" title="Nama individu yang mewakili organisasi bagi maklumat geospatial">
                                <?php echo __('lang.name'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $respName = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != '') {
                                    $respName = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString != '') {
                                    $respName = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->individualName->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_name" id="c2_contact_name"
                                    class="form-control form-control-sm " value="{{ $respName }}">
                                @error('c2_contact_name')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_contact_agensiorganisasi"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Nama organisasi yang bertanggungjawab terhadap maklumat geospatial">
                                <?php echo __('lang.organisation_name'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $respAgencyOrg = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != '') {
                                    $respAgencyOrg = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString != '') {
                                    $respAgencyOrg = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->organisationName->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_agensiorganisasi" id="c2_contact_agensiorganisasi"
                                    class="form-control form-control-sm" value="{{ $respAgencyOrg }}">
                                @error('c2_contact_agensiorganisasi')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_contact_bahagian"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_contact_bahagian" data-toggle="tooltip" title="Nama bahagian yang bertanggungjawab terhadap maklumat geospatial">
                                    <?php echo __('lang.bahagian_name'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $respAgencyBhgn = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString != '') {
                                    $respAgencyBhgn = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString != '') {
                                    $respAgencyBhgn = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->bahagianName->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_contact_bahagian" id="c2_contact_bahagian" class="form-control form-control-sm" value="{{ $respAgencyBhgn }}" >
                                @error('c2_contact_bahagian')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c2_position_name"){
                        ?>
                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                            <div class="col-3 pl-5">
                            <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Jawatan individu yang mewakili organisasi bagi maklumat geospatial">
                                <?php echo __('lang.position_name'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                <?php
                                $positionName = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->positionName->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->positionName->CharacterString != '') {
                                    $positionName = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->positionName->CharacterString;
                                }
                                ?>
                                <input type="text" name="c2_position_name" id="c2_position_name"
                                    class="form-control form-control-sm  mb-2" value="{{ $positionName }}">
                                @error('c2_position_name')
                                    <div class="text-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <div class="row mb-4">
                    <div class="col-3 pl-5">
                        <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Alamat organisasi yang bertanggungjawab terhadap maklumat geospatial">
                            <?php echo __('lang.address'); ?><span id='addressLabel'></span>
                        </label><label class="float-right">:</label>
                    </div>
                    <div class="col-6">
                        <?php
                        $respAddress = '';
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != '') {
                            $respAddress = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString != '') {
                            $respAddress = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->deliveryPoint->CharacterString;
                        }
                        ?>
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                            if($key == "c2_contact_address1"){
                                if($val['mandatory'] == "yes"){ 
                                    ?>
                                    <script>
                                        $('#addressLabel').addClass("text-warning");
                                        $('#addressLabel').text("*");
                                    </script>
                                    <?php
                                }else{
                                    ?>
                                    <script>
                                        $('#addressLabel').removeClass("text-warning");
                                        $('#addressLabel').text("");
                                    </script>
                                    <?php
                                }
                                ?>
                                <input type="text" name="c2_contact_address1" id="c2_contact_address1"
                                    class="form-control form-control-sm  mb-2" value="{{ $respAddress }}" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
                            }
                            if($key == "c2_contact_address2"){
                                ?>
                                <input type="text" name="c2_contact_address2" id="c2_contact_address2"
                                    class="form-control form-control-sm mb-2" value="" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
                            }
                            if($key == "c2_contact_address3"){
                                ?>
                                <input type="text" name="c2_contact_address3" id="c2_contact_address3"
                                    class="form-control form-control-sm mb-2" value="" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
                            }
                            if($key == "c2_contact_address4"){
                                ?>
                                <input type="text" name="c2_contact_address4" id="c2_contact_address4"
                                    class="form-control form-control-sm mb-2" value="" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
                            }
                        }
                        ?>
                        <div class="row ">
                            <?php
                            $postalCode = '';
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != '') {
                                $postalCode = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString;
                            }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString != '') {
                                $postalCode = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->postalCode->CharacterString;
                            }
                            ?>
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                                if($key == "c2_postal_code"){
                                    ?>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <label class="form-control-label mr-4 divPostalCode"
                                            for="c2_contact_city">Postal
                                            Code<?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?> :</label>
                                    </div>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <input type="text" name="c2_postal_code" id="c2_postal_code"
                                            class="form-control form-control-sm mb-2 divPostalCode"
                                            value="{{ $postalCode }}" maxlength="5">
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $city = '';
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != '') {
                                    $city = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
                                }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString != '') {
                                    $city = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->city->CharacterString;
                                }
                                ?>
                                <?php
                                if($key == "c2_contact_city"){
                                    ?>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <label class="form-control-label mx-3 divCity" for="c2_contact_city" data-toggle="tooltip" title="Bandar">
                                            <?php echo __('lang.city'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?> :</label>
                                    </div>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <input type="text" name="c2_contact_city" id="c2_contact_city"
                                            class="form-control form-control-sm ml-4 divCity"
                                            value="{{ $city }}">
                                    </div>
                                    <?php
                                }
                                if($key == "c2_contact_state"){
                                    ?>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <label class="form-control-label mr-4" for="c2_contact_state">State<?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?> :</label>
                                    </div>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <select name="c2_contact_state" id="c2_contact_state"
                                            class="form-control form-control-sm">
                                            <option disabled>Pilih...</option>
                                            <?php
                                            $respState = '';
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != '') {
                                                $respState = ucwords(trim($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
                                            }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString != '') {
                                                $respState = ucwords(trim($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->administrativeArea->CharacterString));
                                            }
                                            if($respState == "NegeriSembilan"){
                                                $respState = "Negeri Sembilan";
                                            }elseif($respState == "PulauPinang"){
                                                $respState = "Pulau Pinang";
                                            }elseif($respState == "WpKualaLumpur"){
                                                $respState = "WP Kuala Lumpur";
                                            }elseif($respState == "WpLabuan"){
                                                $respState = "WP Labuan";
                                            }elseif($respState == "WpPutrajaya"){
                                                $respState = "WP Putrajaya";
                                            }
                                            ?>
                                            <?php
                                            if (count($states) > 0) {
                                                foreach ($states as $st) {
                                                    if ($st->name == $respState) {
                                                        ?>
                                                        <option value="<?php echo $st->name; ?>" selected><?php echo $st->name; ?></option><?php
                                                    } else {
                                                        ?><option value="<?php echo $st->name; ?>"><?php echo $st->name; ?></option><?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                        @error('c2_contact_state')
                                            <div class="text-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <?php
                                }
                                if($key == "c2_contact_country"){
                                    ?>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <label class="form-control-label mx-3" for="c2_contact_country" data-toggle="tooltip" title="Negara">
                                            <?php echo __('lang.country'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?> :</label>
                                    </div>
                                    <div class="col-3 px-0" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <input type="text" name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm" readonly value="Malaysia">
                                        <?php /* 
                                        <select name="c2_contact_country" id="c2_contact_country" class="form-control form-control-sm ml-4">
                                            <option selected disabled>Pilih...</option>
                                            <?php
                                            if (count($countries) > 0) {
                                                foreach ($countries as $country) {
                                                    if ($country->id == $countrySelected->id) {
                                                        ?><option value="<?php echo $country->id; ?>" selected><?php echo $country->name; ?></option><?php
                                                    } else {                                                                                                                                                                 ?><option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option><?php
                                                    }                                                                                                                                                                }
                                            }
                                            ?>
                                        </select>
                                         */
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!--<div class="row mb-4">-->
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion2'] as $key=>$val){
                        if($key == "c2_contact_email"){
                            ?>
                            <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Alamat emel rasmi">
                                    <?php echo __('lang.email'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $respEmail = '';
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != '') {
                                        $respEmail = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                                    }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString != '') {
                                        $respEmail = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->address->CI_Address->electronicMailAddress->CharacterString;
                                    }
                                    ?>
                                    <input type="email" name="c2_contact_email" id="c2_contact_email"
                                        class="form-control form-control-sm" value="{{ $respEmail }}">
                                    @error('c2_contact_email')
                                        <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <?php
                        }
                        if($key == "c2_contact_fax"){
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Nombor faksimili organisasi">
                                    <?php echo __('lang.fax_no'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $fax = '';
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != '') {
                                        $fax = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                                    }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString != '') {
                                        $fax = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->facsimile->CharacterString;
                                    }
                                    ?>
                                    <input type="text" name="c2_contact_fax" id="c2_contact_fax" value="{{ $fax }}"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <?php
                        }
                        if($key == "c2_contact_phone_office"){
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Nombor telefon organisasi">
                                    <?php echo __('lang.telephone_office'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $respPhone = '';
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != '') {
                                        $respPhone = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                                    }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString != '') {
                                        $respPhone = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->phone->CI_Telephone->voice->CharacterString;
                                    }
                                    ?>
                                    <input type="text" name="c2_contact_phone_office" id="c2_contact_phone_office"
                                        class="form-control form-control-sm" value="{{ $respPhone }}">
                                    @error('c2_contact_phone_office')
                                        <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <?php
                        }
                        if($key == "c2_contact_website"){
                            ?>
                            <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_metadataName2" data-toggle="tooltip" title="Alamat laman web organisasi">
                                    <?php echo __('lang.contact_website'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $respWebsite = '';
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != '') {
                                        $respWebsite = $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
                                    }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL != '') {
                                        $respWebsite = $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->contactInfo->CI_Contact->onlineResource->CI_OnlineResource->linkage->URL;
                                    }
                                    ?>
                                    <input type="text" name="c2_contact_website" id="c2_contact_website"
                                        class="form-control form-control-sm " value="{{ $respWebsite }}">
                                </div>
                            </div>
                            <?php
                        }
                        if($key == "c2_contact_role"){
                            ?>
                            <div class="row mb-4 divResponsiblePartyRole" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-3 pl-5">
                                <label class="form-control-label mr-4" for="c2_contact_role" data-toggle="tooltip" title="Peranan yang dijalankan oleh organisasi berkenaan Metadata ">
                                    <?php echo __('lang.role'); ?><?php if($val['mandatory'] == "yes"){ ?><span class="text-warning">*</span><?php } ?>
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $role = '';
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != '') {
                                        $role = ucwords($metadataxml->identificationInfo->MD_DataIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode);
                                    }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode != '') {
                                        $role = ucwords($metadataxml->identificationInfo->SV_ServiceIdentification->pointOfContact->CI_ResponsibleParty->role->CI_RoleCode);
                                    }
                                    if($role == "ResourceProvider"){
                                        $role = "Resource Provider";
                                    }elseif($role == "PointOfContact"){
                                        $role = "Point Of Contact";
                                    }elseif($role == "PrincipalInvestigator"){
                                        $role = "Principal Investigator";
                                    }
                                    ?>
                                    <select name="c2_contact_role" id="c2_contact_role"
                                        class="form-control form-control-sm ">
                                        <option value="">Pilih...</option>
                                        <option value="Author" {{ $role == 'Author' ? 'selected' : '' }}>Author</option>
                                        <option value="Co Author" {{ $role == 'Co Author' ? 'selected' : '' }}>Co Author
                                        </option>
                                        <option value="Collaborator" {{ $role == 'Collaborator' ? 'selected' : '' }}>
                                            Collaborator</option>
                                        <option value="Contributor" {{ $role == 'Contributor' ? 'selected' : '' }}>
                                            Contributor</option>
                                        <option value="Custodian" {{ $role == 'Custodian' ? 'selected' : '' }}>Custodian
                                        </option>
                                        <option value="Distributor" {{ $role == 'Distributor' ? 'selected' : '' }}>
                                            Distributor</option>
                                        <option value="Editor" {{ $role == 'Editor' ? 'selected' : '' }}>Editor</option>
                                        <option value="Funder" {{ $role == 'Funder' ? 'selected' : '' }}>Funder</option>
                                        <option value="Mediator" {{ $role == 'Mediator' ? 'selected' : '' }}>Mediator
                                        </option>
                                        <option value="Originator" {{ $role == 'Originator' ? 'selected' : '' }}>Originator
                                        </option>
                                        <option value="Point Of Contact" {{ $role == 'Point Of Contact' ? 'selected' : '' }}>
                                            Point Of Contact</option>
                                        <option value="Principal Investigator"
                                            {{ $role == 'Principal Investigator' ? 'selected' : '' }}>Principal Investigator
                                        </option>
                                        <option value="Processor" {{ $role == 'Processor' ? 'selected' : '' }}>Processor
                                        </option>
                                        <option value="Publisher" {{ $role == 'Publisher' ? 'selected' : '' }}>Publisher
                                        </option>
                                        <option value="Resource Provider "
                                            {{ $role == 'Resource Provider' ? 'selected' : '' }}>Resource Provider</option>
                                        <option value="Rights Holder" {{ $role == 'Rights Holder' ? 'selected' : '' }}>
                                            Rights Holder</option>
                                        <option value="Sponsor" {{ $role == 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                                        <option value="Stakeholder" {{ $role == 'Stakeholder' ? 'selected' : '' }}>
                                            Stakeholder</option>
                                        <option value="Owner" {{ $role == 'Owner' ? 'selected' : '' }}>Owner</option>
                                        <option value="User" {{ $role == 'User' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <!--</div>-->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#c2_metadataDateType').val("{{ $metDateType }}").trigger('change');
        
        $("#c2_metadataName").keyup(function () {  
            $(this).val($(this).val().toUpperCase());  
        }); 
        $('#c2_postal_code,#c2_contact_phone_office,#c2_contact_fax').keypress(function (e) {    
            var charCode = (e.which) ? e.which : event.keyCode    
            if (String.fromCharCode(charCode).match(/[^0-9]/g)){
                return false;                        
            }
        });  
    });
</script>
