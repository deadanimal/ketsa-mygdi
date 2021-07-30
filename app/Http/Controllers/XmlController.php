<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class XmlController extends Controller {

    function __construct() {}

    public function createXml($request) {
        $c2_metadataName = strtoupper($request->c2_metadataName);
        
        $xml = <<<XML
                <gmd:MD_Metadata xmlns:gmd="http://www.isotc211.org/2005/gmd" xmlns:gco="http://www.isotc211.org/2005/gco" xmlns:srv="http://www.isotc211.org/2005/srv" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                    <gmd:fileIdentifier>
                        <gco:CharacterString>{82EB5705-61EA-41A7-BAF5-183B3B3EA010}</gco:CharacterString>
                    </gmd:fileIdentifier>
                    <gmd:language>
                        <gco:CharacterString>$request->flanguage</gco:CharacterString>
                    </gmd:language>
                    <gmd:characterSet>
                        <gmd:MD_CharacterSetCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_CharacterSetCode" codeListValue="8859part3"></gmd:MD_CharacterSetCode>
                    </gmd:characterSet>
                    <gmd:hierarchyLevel>
                        <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="dataset"></gmd:MD_ScopeCode>
                    </gmd:hierarchyLevel>

                    <gmd:categoryTitle>$request->kategori
                        <gmd:categoryItem>
                            <gco:CharacterString></gco:CharacterString>
                        </gmd:categoryItem>
                    </gmd:categoryTitle>

                    <gmd:contact>
                        <gmd:CI_ResponsibleParty>$request->c1_content_info
                            <gmd:organisationName>
                                <gco:CharacterString>$request->publisher_agensi_organisasi</gco:CharacterString>
                            </gmd:organisationName>
                            <gmd:individualName>
                                <gco:CharacterString>$request->publisher_name</gco:CharacterString>
                            </gmd:individualName>
                            <gmd:role>
                                <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian"></gmd:CI_RoleCode>
                            </gmd:role>
                            <gmd:contactInfo>
                                <gmd:CI_Contact>
                                    <gmd:phone>
                                        <gmd:CI_Telephone>
                                            <gmd:voice>
                                                <gco:CharacterString>$request->publisher_phone</gco:CharacterString>
                                            </gmd:voice>
                                        </gmd:CI_Telephone>
                                    </gmd:phone>
                                    <gmd:address>
                                        <gmd:CI_Address>
                                            <gmd:electronicMailAddress>
                                                <gco:CharacterString>$request->publisher_email</gco:CharacterString>
                                            </gmd:electronicMailAddress>
                                        </gmd:CI_Address>
                                    </gmd:address>
                                </gmd:CI_Contact>
                            </gmd:contactInfo>
                            <gmd:publisherRole>
                                <gco:CharacterString>$request->publisher_role</gco:CharacterString>
                            </gmd:publisherRole>
                        </gmd:CI_ResponsibleParty>
                    </gmd:contact>
                    <gmd:dateStamp>
                        <gco:Date></gco:Date>
                    </gmd:dateStamp>
                    <gmd:metadataStandardName>
                        <gco:CharacterString></gco:CharacterString>
                    </gmd:metadataStandardName>
                    <gmd:metadataStandardVersion>
                        <gco:CharacterString></gco:CharacterString>
                    </gmd:metadataStandardVersion>
                    <gmd:metadataMaintenance>
                        <gmd:MD_MaintenanceInformation>
                            <gmd:maintenanceAndUpdateFrequency>
                                <gmd:MD_MaintenanceFrequencyCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_MaintenanceFrequencyCode" codeListValue="" />
                            </gmd:maintenanceAndUpdateFrequency>
                        </gmd:MD_MaintenanceInformation>
                    </gmd:metadataMaintenance>
                    <gmd:referenceSystemInfo>
                        <gmd:MD_ReferenceSystem>
                            <gmd:referenceSystemIdentifier>
                                <gmd:RS_Identifier>
                                    <gmd:codeSpace>
                                        <gco:CharacterString>$request->c13_ref_sys_identify</gco:CharacterString>
                                    </gmd:codeSpace>
                                </gmd:RS_Identifier>
                            </gmd:referenceSystemIdentifier>
                        </gmd:MD_ReferenceSystem>
                        <gmd:MD_CRS>
                            <gmd:projection>
                                <gmd:RS_Identifier>
                                    <gmd:codeSpace>
                                        <gco:CharacterString>$request->c13_projection</gco:CharacterString>
                                    </gmd:codeSpace>
                                </gmd:RS_Identifier>
                            </gmd:projection>
                            <gmd:ellipsoid>
                                <gmd:RS_Identifier>
                                    <gmd:codeSpace>
                                        <gco:CharacterString>$request->c13_ellipsoid</gco:CharacterString>
                                    </gmd:codeSpace>
                                </gmd:RS_Identifier>
                            </gmd:ellipsoid>
                            <gmd:datum>
                                <gmd:RS_Identifier>
                                    <gmd:codeSpace>
                                        <gco:CharacterString>$request->c13_datum</gco:CharacterString>
                                    </gmd:codeSpace>
                                </gmd:RS_Identifier>
                            </gmd:datum>
                            <gmd:ellipsoidParameters>
                                <gmd:MD_EllipsoidParameters>
                                    <gmd:semiMajorAxis>
                                        <gco:CharacterString>$request->c13_semi_major_axis</gco:CharacterString>
                                    </gmd:semiMajorAxis>
                                    <gmd:axisUnits>
                                        <gco:UomLength>$request->c13_axis_units Meter</gco:UomLength>
                                    </gmd:axisUnits>
                                    <gmd:denominatorOfFlatteningRatio>
                                        <gco:CharacterString>$request->c13_denom_flat_ratio</gco:CharacterString>
                                    </gmd:denominatorOfFlatteningRatio>
                                </gmd:MD_EllipsoidParameters>
                            </gmd:ellipsoidParameters>
                        </gmd:MD_CRS>
                    </gmd:referenceSystemInfo>
                    <gmd:identificationInfo>
                        <srv:SV_ServiceIdentification>
                            <gmd:citation>
                                <gmd:CI_Citation>
                                    <gmd:title>
                                        <gco:CharacterString>$c2_metadataName</gco:CharacterString>
                                    </gmd:title>
                                    <gmd:date>
                                        <gmd:CI_Date>
                                            <gmd:date>
                                                <gco:Date></gco:Date>
                                            </gmd:date>
                                            <gmd:dateType>
                                                <gmd:CI_DateTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_DateTypeCode" codeListValue="creation"></gmd:CI_DateTypeCode>
                                            </gmd:dateType>
                                        </gmd:CI_Date>
                                    </gmd:date>
                                    <gmd:series>
                                        <gmd:CI_Series />
                                    </gmd:series>
                                    <gmd:edition>
                                        <gco:CharacterString />
                                    </gmd:edition>
                                    <gmd:editionDate>
                                        <gco:Date></gco:Date>
                                    </gmd:editionDate>
                                </gmd:CI_Citation>
                            </gmd:citation>
                            <gmd:productType>$request->c2_product_type
                                <gmd:productTypeItem>
                                    <gco:CharacterString></gco:CharacterString>
                                </gmd:productTypeItem>
                            </gmd:productType>
                            <gmd:abstract>$request->c2_abstract
                                <gco:CharacterString></gco:CharacterString>
                            </gmd:abstract>
                            <gmd:purpose>
                                <gco:CharacterString />
                            </gmd:purpose>
                            <gmd:credit>
                                <gco:CharacterString />
                            </gmd:credit>
                            <gmd:status>
                                <gmd:MD_ProgressCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ProgressCode" codeListValue="completed"></gmd:MD_ProgressCode>
                            </gmd:status>
                            <gmd:metadataDate>
                                <gco:CharacterString>$request->c2_metadataDate</gco:CharacterString>
                            </gmd:metadataDate>
                            <gmd:metadataDateType>
                                <gco:CharacterString>$request->c2_metadataDateType</gco:CharacterString>
                            </gmd:metadataDateType>
                            <gmd:metadataStatus>
                                <gco:CharacterString>$request->c2_metadataStatus</gco:CharacterString>
                            </gmd:metadataStatus>
                            <gmd:pointOfContact>
                                <gmd:CI_ResponsibleParty>
                                    <gmd:organisationName>
                                        <gco:CharacterString>$request->c2_contact_agensiorganisasi</gco:CharacterString>
                                    </gmd:organisationName>
                                    <gmd:individualName>$request->c2_contact_name
                                        <gco:CharacterString></gco:CharacterString>
                                    </gmd:individualName>
                                    <gmd:positionName>
                                        <gco:CharacterString></gco:CharacterString>
                                    </gmd:positionName>
                                    <gmd:contactInfo>
                                        <gmd:CI_Contact>
                                            <gmd:phone>
                                                <gmd:CI_Telephone>
                                                    <gmd:voice>
                                                        <gco:CharacterString>$request->c2_contact_phone_office</gco:CharacterString>
                                                    </gmd:voice>
                                                    <gmd:facsimile>
                                                        <gco:CharacterString>$request->c2_contact_fax</gco:CharacterString>
                                                    </gmd:facsimile>
                                                </gmd:CI_Telephone>
                                            </gmd:phone>
                                            <gmd:address>
                                                <gmd:CI_Address>
                                                    <gmd:deliveryPoint>
                                                        <gco:CharacterString>$request->c2_contact_address1</gco:CharacterString>
                                                    </gmd:deliveryPoint>
                                                    <gmd:city>
                                                        <gco:CharacterString>$request->c2_contact_city</gco:CharacterString>
                                                    </gmd:city>
                                                    <gmd:administrativeArea>
                                                        <gco:CharacterString>$request->c2_contact_state</gco:CharacterString>
                                                    </gmd:administrativeArea>
                                                    <gmd:postalCode>
                                                        <gco:CharacterString></gco:CharacterString>
                                                    </gmd:postalCode>
                                                    <gmd:country>
                                                        <gco:CharacterString>$request->c2_contact_country</gco:CharacterString>
                                                    </gmd:country>
                                                    <gmd:electronicMailAddress>
                                                        <gco:CharacterString>$request->c2_contact_email</gco:CharacterString>
                                                    </gmd:electronicMailAddress>
                                                </gmd:CI_Address>
                                            </gmd:address>
                                            <gmd:onlineResource>
                                                <gmd:CI_OnlineResource>
                                                    <gmd:linkage>
                                                        <gmd:URL>$request->c2_contact_website</gmd:URL>
                                                    </gmd:linkage>
                                                </gmd:CI_OnlineResource>
                                            </gmd:onlineResource>
                                            <gmd:hoursOfService>
                                                <gco:CharacterString></gco:CharacterString>
                                            </gmd:hoursOfService>
                                        </gmd:CI_Contact>
                                    </gmd:contactInfo>
                                    <gmd:role>
                                        <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="pointOfContact"></gmd:CI_RoleCode>
                                    </gmd:role>
                                </gmd:CI_ResponsibleParty>
                            </gmd:pointOfContact>
                            <srv:serviceType>
                                <gco:LocalName></gco:LocalName>
                            </srv:serviceType>
                            <gmd:descriptiveKeywords>
                                <gmd:MD_Keywords>
                                    <gmd:keyword>
                                        <gco:CharacterString></gco:CharacterString>
                                    </gmd:keyword>
                                    <gmd:keyword>
                                        <gco:CharacterString>$request->c10_additional_keyword</gco:CharacterString>
                                    </gmd:keyword>
                                    <gmd:keyword>
                                        <gco:CharacterString>$request->c10_additional_keyword</gco:CharacterString>
                                    </gmd:keyword>
                                </gmd:MD_Keywords>
                            </gmd:descriptiveKeywords>
                            <gmd:spatialRepresentationType>$request->c12_dataset_type
                                <gmd:MD_SpatialRepresentationTypeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_SpatialRepresentationTypeCode" codeListValue="" />
                            </gmd:spatialRepresentationType>
                            <gmd:spatialResolution>
                                <gmd:MD_Resolution>
                                    <gmd:equivalentScale>
                                        <gmd:MD_RepresentativeFraction>
                                            <gmd:denominator>$request->c12_feature_scale
                                                <gco:Integer />
                                            </gmd:denominator>
                                        </gmd:MD_RepresentativeFraction>
                                    </gmd:equivalentScale>
                                    <gmd:distance>$request->c12_image_res
                                        <gco:Distance />
                                    </gmd:distance>
                                </gmd:MD_Resolution>
                            </gmd:spatialResolution>
                            <gmd:language>$request->c12_language
                                <gco:CharacterString />
                            </gmd:language>
                            <gmd:topicCategory>$request->topic_category
                            </gmd:topicCategory>
                            <gmd:scanningResolution>
                                <gco:CharacterString>$request->c4_scan_res</gco:CharacterString>
                            </gmd:scanningResolution>
                            <gmd:groundScanning>
                                <gco:Decimal>$request->c4_ground_scan</gco:Decimal>
                            </gmd:groundScanning>
                            <gmd:processLevel>
                                <gco:CharacterString>$request->c5_process_lvl</gco:CharacterString>
                            </gmd:processLevel>
                            <gmd:processResolution>
                                <gco:Decimal>$request->c5_resolution</gco:Decimal>
                            </gmd:processResolution>
                            <gmd:collectionName>
                                <gco:CharacterString>$request->c6_collection_name</gco:CharacterString>
                            </gmd:collectionName>
                            <gmd:collectionIdentification>
                                <gco:CharacterString>$request->c6_collection_id</gco:CharacterString>
                            </gmd:collectionIdentification>
                            <gmd:bandBoundry>
                                <gco:CharacterString>$request->c7_band_boundary</gco:CharacterString>
                            </gmd:bandBoundry>
                            <gmd:transferFunctionType>
                                <gco:CharacterString>$request->c7_trans_fn_type</gco:CharacterString>
                            </gmd:transferFunctionType>
                            <gmd:transmittedPolarization>
                                <gco:CharacterString>$request->c7_trans_polar</gco:CharacterString>
                            </gmd:transmittedPolarization>
                            <gmd:nominalSpatialResolution>
                                <gco:CharacterString>$request->c7_nominal_spatial_res</gco:CharacterString>
                            </gmd:nominalSpatialResolution>
                            <gmd:detectedPolarisation>
                                <gco:CharacterString>$request->c7_detected_polar</gco:CharacterString>
                            </gmd:detectedPolarisation>
                            <gmd:averageAirTemperature>
                                <gco:CharacterString>$request->c8_avg_air_temp</gco:CharacterString>
                            </gmd:averageAirTemperature>
                            <gmd:altitude>
                                <gco:CharacterString>$request->c8_altitude</gco:CharacterString>
                            </gmd:altitude>
                            <gmd:relativeHumidity>
                                <gco:CharacterString>$request->c8_relative_humid</gco:CharacterString>
                            </gmd:relativeHumidity>
                            <gmd:meteorologicalCondition>
                                <gco:CharacterString>$request->c8_meteor_cond</gco:CharacterString>
                            </gmd:meteorologicalCondition>
                            <gmd:identifier>
                                <gco:CharacterString>$request->c8_identifier</gco:CharacterString>
                            </gmd:identifier>
                            <gmd:trigger>
                                <gco:CharacterString>$request->c8_trigger</gco:CharacterString>
                            </gmd:trigger>
                            <gmd:context>
                                <gco:CharacterString>$request->c8_context</gco:CharacterString>
                            </gmd:context>
                            <gmd:sequence>
                                <gco:CharacterString>$request->c8_sequence</gco:CharacterString>
                            </gmd:sequence>
                            <gmd:EvtIdentifiertime>
                                <gco:CharacterString>$request->c8_time</gco:CharacterString>
                            </gmd:EvtIdentifiertime>
                            <gmd:typeInstrumentIdentification>
                                <gco:CharacterString>$request->c8_type</gco:CharacterString>
                            </gmd:typeInstrumentIdentification>
                            <gmd:operationIdentifier>
                                <gco:CharacterString>$request->c8_op_identifier</gco:CharacterString>
                            </gmd:operationIdentifier>
                            <gmd:operationStatus>
                                <gco:CharacterString>$request->c8_op_status</gco:CharacterString>
                            </gmd:operationStatus>
                            <gmd:operationType>
                                <gco:CharacterString>$request->c8_op_type</gco:CharacterString>
                            </gmd:operationType>
                            <gmd:operationDate>
                                <gco:Date>$request->c8_rdr_date</gco:Date>
                            </gmd:operationDate>
                            <gmd:lastAcceptableDate>
                                <gco:Date>$request->c8_last_accept_date</gco:Date>
                            </gmd:lastAcceptableDate>
                            <srv:extent>
                                <gmd:EX_Extent>
                                    <gmd:geographicElement>
                                        <gmd:EX_GeographicBoundingBox>
                                            <gmd:westBoundLongitude>
                                                <gco:Decimal>$request->c9_west_bound_longitude</gco:Decimal>
                                            </gmd:westBoundLongitude>
                                            <gmd:eastBoundLongitude>
                                                <gco:Decimal>$request->c9_east_bound_longitude</gco:Decimal>
                                            </gmd:eastBoundLongitude>
                                            <gmd:southBoundLatitude>
                                                <gco:Decimal>$request->c9_south_bound_latitude</gco:Decimal>
                                            </gmd:southBoundLatitude>
                                            <gmd:northBoundLatitude>
                                                <gco:Decimal>$request->c9_north_bound_latitude</gco:Decimal>
                                            </gmd:northBoundLatitude>
                                        </gmd:EX_GeographicBoundingBox>
                                    </gmd:geographicElement>
                                </gmd:EX_Extent>
                            </srv:extent>
                            <gmd:fileName>
                                <gco:CharacterString>$request->c10_file_name</gco:CharacterString>
                            </gmd:fileName>
                            <gmd:fileType>
                                <gco:CharacterString>$request->c10_file_type</gco:CharacterString>
                            </gmd:fileType>
                            <gmd:fileURL>
                                <gco:CharacterString>$request->c10_file_url</gco:CharacterString>
                            </gmd:fileURL>
                            <gmd:searchKeyword>
                                <gco:CharacterString>$request->c10_keyword</gco:CharacterString>
                            </gmd:searchKeyword>
                            <gmd:searchAddtionalKeyword>
                                <gco:CharacterString>$request->c10_additional_keyword</gco:CharacterString>
                            </gmd:searchAddtionalKeyword>
                            <srv:couplingType>
                                <!-- Mandated by ISO 19119-->
                                <srv:SV_CouplingType codeList="#SV_CouplingType" codeListValue="" />
                            </srv:couplingType>
                            <srv:containsOperations>
                                <srv:SV_OperationMetadata>
                                    <srv:operationName>
                                        <gco:CharacterString></gco:CharacterString>
                                    </srv:operationName>
                                    <srv:DCP>
                                        <srv:DCPList codeList="#DCPList" codeListValue="WebServices"></srv:DCPList>
                                    </srv:DCP>
                                    <srv:connectPoint>
                                        <gmd:CI_OnlineResource>
                                            <gmd:linkage>
                                                <gmd:URL></gmd:URL>
                                            </gmd:linkage>
                                        </gmd:CI_OnlineResource>
                                    </srv:connectPoint>
                                </srv:SV_OperationMetadata>
                            </srv:containsOperations>
                            <gmd:resourceSpecificUsage>
                                <gmd:MD_Usage>
                                    <gmd:specificUsage>
                                        <gco:CharacterString />
                                    </gmd:specificUsage>
                                    <gmd:userDeterminedLimitations>
                                        <gco:CharacterString />
                                    </gmd:userDeterminedLimitations>
                                </gmd:MD_Usage>
                            </gmd:resourceSpecificUsage>
                            <gmd:resourceConstraints>
                                <gmd:MD_Constraints />
                                <gmd:MD_LegalConstraints>
                                    <gmd:accessConstraints>$request->c14_access_constraint</gmd:accessConstraints>
                                    <gmd:useConstraints>$request->c14_use_constraint</gmd:useConstraints>
                                </gmd:MD_LegalConstraints>
                                <gmd:MD_SecurityConstraints>
                                    <gmd:classification>$request->c14_classification_sys</gmd:classification>
                                    <gmd:constraintsReference>$request->c14_reference</gmd:constraintsReference>
                                </gmd:MD_SecurityConstraints>
                            </gmd:resourceConstraints>
                        </srv:SV_ServiceIdentification>
                        <gmd:MD_FeatureCatalogueDescription>
                            <gmd:complianceCode>
                                <gco:Boolean />
                            </gmd:complianceCode>
                            <gmd:language>
                                <gco:CharacterString />
                            </gmd:language>
                        </gmd:MD_FeatureCatalogueDescription>
                    </gmd:identificationInfo>
                    <gmd:distributionInfo>
                        <gmd:MD_Distribution>
                            <gmd:distributionFormat>
                                <gmd:MD_Format>
                                    <gmd:name>
                                        <gco:CharacterString>$request->c11_dist_format</gco:CharacterString>
                                    </gmd:name>
                                    <gmd:version>
                                        <gco:CharacterString>$request->c11_version</gco:CharacterString>
                                    </gmd:version>
                                </gmd:MD_Format>
                            </gmd:distributionFormat>
                            <gmd:distributor>
                                <gmd:MD_Distributor>
                                    <gmd:distributorContact>
                                        <gmd:CI_ResponsibleParty>
                                            <gmd:organisationName>$request->c11_distributor
                                                <gco:CharacterString />
                                            </gmd:organisationName>
                                            <gmd:role>
                                                <gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="custodian"></gmd:CI_RoleCode>
                                            </gmd:role>
                                        </gmd:CI_ResponsibleParty>
                                    </gmd:distributorContact>
                                    <gmd:distributionOrderProcess>
                                        <gmd:MD_StandardOrderProcess>
                                            <gmd:fees>$request->c11_fees
                                                <gco:CharacterString />
                                            </gmd:fees>
                                            <gmd:plannedAvailableDateTime>
                                                <gco:DateTime></gco:DateTime>
                                            </gmd:plannedAvailableDateTime>
                                            <gmd:orderingInstructions>$request->c11_order_instructions
                                                <gco:CharacterString />
                                            </gmd:orderingInstructions>
                                        </gmd:MD_StandardOrderProcess>
                                    </gmd:distributionOrderProcess>
                                </gmd:MD_Distributor>
                            </gmd:distributor>
                            <gmd:transferOptions>
                                <gmd:MD_DigitalTransferOptions>
                                    <gmd:unitsOfDistribution>$request->c11_units_of_dist
                                        <gco:CharacterString />
                                    </gmd:unitsOfDistribution>
                                    <gmd:transferSize>$request->c11_size
                                        <gco:CharacterString />
                                    </gmd:transferSize>
                                    <gmd:onLine>
                                        <gmd:CI_OnlineResource>
                                            <gmd:linkage>$request->c11_link
                                                <gmd:URL />
                                            </gmd:linkage>
                                            <gmd:description>
                                                <gco:CharacterString></gco:CharacterString>
                                            </gmd:description>
                                            <gmd:function>
                                                <gmd:CI_OnLineFunctionCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_OnLineFunctionCode" codeListValue="" />
                                            </gmd:function>
                                        </gmd:CI_OnlineResource>
                                    </gmd:onLine>
                                    <gmd:offLine>
                                        <gmd:MD_Medium>$request->c11_medium
                                            <gmd:name />
                                        </gmd:MD_Medium>
                                    </gmd:offLine>
                                </gmd:MD_DigitalTransferOptions>
                            </gmd:transferOptions>
                        </gmd:MD_Distribution>
                    </gmd:distributionInfo>
                    <gmd:dataQualityInfo>
                        <gmd:DQ_DataQuality>
                            <gmd:scope>
                                <gmd:DQ_Scope>
                                    <gmd:level>$request->c15_data_quality_info
                                        <gmd:MD_ScopeCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#MD_ScopeCode" codeListValue="" />
                                    </gmd:level>
                                </gmd:DQ_Scope>
                            </gmd:scope>
                            <gmd:lineage>
                                <gmd:LI_Lineage>
                                    <gmd:statement>$request->c15_data_history
                                        <gco:CharacterString />
                                    </gmd:statement>
                                </gmd:LI_Lineage>
                            </gmd:lineage>
                            <gmd:report>
                                <gmd:DQ_Element>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_date</gco:Date>
                                    </gmd:dateTime>
                                </gmd:DQ_Element>
                                <gmd:DQ_CompletenessCommission>
                                    <gmd:radio>
                                        $request->c15_t1_complete_comm_or_omit
                                    </gmd:radio>
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:compCommissScope>$request->c15_t1_scope
                                        <gmd:compCommissScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:compCommissScopeItem>
                                    </gmd:compCommissScope>
                                    <gmd:compCommissComplLevel>$request->c15_t1_comply_level
                                        <gco:CharacterString></gco:CharacterString>
                                    </gmd:compCommissComplLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t1_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t1_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t1_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_CompletenessCommission>
                                <gmd:DQ_CompletenessOmission>
                                    <gmd:radio>
                                        $request->c15_t1_complete_comm_or_omit
                                    </gmd:radio>
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:compOmissScope>$request->c15_t1_scope
                                        <gmd:compOmissScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:compOmissScopeItem>
                                    </gmd:compOmissScope>
                                    <gmd:compOmissLevel>$request->c15_t1_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:compOmissLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t1_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t1_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t1_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_CompletenessOmission>
                                <gmd:DQ_ConceptualConsistency>$request->c15_t2_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:consistConceptScope>$request->c15_t2_scope
                                        <gmd:consistConceptScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:consistConceptScopeItem>
                                    </gmd:consistConceptScope>
                                    <gmd:compOmissLevel>$request->c15_t2_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:compOmissLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t2_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t2_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t2_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_ConceptualConsistency>
                                <gmd:DQ_DomainConsistency>$request->c15_t2_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:consistDomainScope>$request->c15_t2_scope
                                        <gmd:consistConceptScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:consistConceptScopeItem>
                                    </gmd:consistDomainScope>
                                    <gmd:compDomainLevel>$request->c15_t2_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:compDomainLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t2_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t2_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t2_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_DomainConsistency>
                                <gmd:DQ_FormatConsistency> $request->c15_t2_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:dateTime>
                                        <gmd:consistFormatScope>$request->c15_t2_scope
                                            <gmd:consistFormatScopeItem>
                                                <gco:CharacterString></gco:CharacterString>
                                            </gmd:consistFormatScopeItem>
                                        </gmd:consistFormatScope>
                                        <gmd:compFormatLevel>$request->c15_t2_comply_level
                                            <gco:CharacterString></gco:CharacterString >
                                        </gmd:compFormatLevel>
                                        <gco:Date>$request->c15_t2_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t2_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t2_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_FormatConsistency>
                                <gmd:DQ_TopologicalConsistency>$request->c15_t2_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:dateTime>
                                        <gmd:consistTopoScope>$request->c15_t2_scope
                                            <gmd:consistTopoScopeItem>
                                                <gco:CharacterString></gco:CharacterString>
                                            </gmd:consistTopoScopeItem>
                                        </gmd:consistTopoScope>
                                        <gmd:compTopoLevel>$request->c15_t2_comply_level
                                            <gco:CharacterString></gco:CharacterString >
                                        </gmd:compTopoLevel>
                                        <gco:Date>$request->c15_t2_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t2_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t2_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_TopologicalConsistency>
                                <gmd:DQ_AbsoluteExternalPositionalAccuracy>$request->c15_t3_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:posAccAbsoluteScope>$request->c15_t3_scope
                                        <gmd:posAccAbsoluteScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:posAccAbsoluteScopeItem>
                                    </gmd:posAccAbsoluteScope>
                                    <gmd:compPosAccAbsoluteLevel>$request->c15_t3_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:compPosAccAbsoluteLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t3_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t3_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t3_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_AbsoluteExternalPositionalAccuracy>
                                <gmd:DQ_RelativeInternalPositionalAccuracy>$request->c15_t3_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:posAccRelativeScope>$request->c15_t3_scope
                                        <gmd:posAccRelativeScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:posAccRelativeScopeItem>
                                    </gmd:posAccRelativeScope>
                                    <gmd:posAccRelativeLevel>$request->c15_t3_comply_level
                                        <gco:CharacterString></gco:CharacterString>
                                    </gmd:posAccRelativeLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t3_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t3_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t3_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_RelativeInternalPositionalAccuracy>
                                <gmd:DQ_GriddedDataPositionalAccuracy>$request->c15_t3_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:posAccGridScope>$request->c15_t3_scope
                                        <gmd:posAccGridScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:posAccGridScopeItem>
                                    </gmd:posAccGridScope>
                                    <gmd:posAccGridLevel>$request->c15_t3_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:posAccGridLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t3_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t3_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t3_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_GriddedDataPositionalAccuracy>
                                <gmd:DQ_AccuracyOfATimeMeasurement> $request->c15_t4_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:AccuracyOfATimeMeasurementScope>$request->c15_t4_scope
                                        <gmd:AccuracyOfATimeMeasurementItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:AccuracyOfATimeMeasurementItem>
                                    </gmd:AccuracyOfATimeMeasurementScope>
                                    <gmd:AccuracyOfATimeMeasurementLevel>$request->c15_t4_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:AccuracyOfATimeMeasurementLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t4_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t4_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t4_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_AccuracyOfATimeMeasurement>
                                <gmd:DQ_TemporalConsistency>$request->c15_t4_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:TemporalConsistencyScope>$request->c15_t4_scope
                                        <gmd:TemporalConsistencyItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:TemporalConsistencyItem>
                                    </gmd:TemporalConsistencyScope>
                                    <gmd:TemporalConsistencyLevel>$request->c15_t4_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:TemporalConsistencyLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t4_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t4_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t4_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_TemporalConsistency>
                                <gmd:DQ_TemporalValidity> $request->c15_t4_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:TemporalValidityScope>$request->c15_t4_scope
                                        <gmd:TemporalValidityItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:TemporalValidityItem>
                                    </gmd:TemporalValidityScope>
                                    <gmd:TemporalValidityLevel>$request->c15_t4_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:TemporalValidityLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t4_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t4_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t4_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_TemporalValidity>
                                <gmd:DQ_ThematicClassificationCorrectness>$request->c15_t5_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:ThematicClassificationCorrectnessScope>$request->c15_t5_scope
                                        <gmd:ThematicClassificationCorrectnessItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:ThematicClassificationCorrectnessItem>
                                    </gmd:ThematicClassificationCorrectnessScope>
                                    <gmd:ThematicClassificationCorrectnessLevel>$request->c15_t5_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:ThematicClassificationCorrectnessLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t5_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t5_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t5_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_ThematicClassificationCorrectness>
                                <gmd:DQ_NonQuantitativeAttributeAccuracy> $request->c15_t5_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:NonQuantitativeAttributeAccuracyScope>$request->c15_t5_scope
                                        <gmd:NonQuantitativeAttributeAccuracyScopeItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:NonQuantitativeAttributeAccuracyScopeItem>
                                    </gmd:NonQuantitativeAttributeAccuracyScope>
                                    <gmd:NonQuantitativeAttributeAccuracyLevel>$request->c15_t5_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:NonQuantitativeAttributeAccuracyLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t5_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t5_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t5_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_NonQuantitativeAttributeAccuracy>
                                <gmd:DQ_QuantitativeAttributeAccuracy>$request->c15_t5_type
                                    <gmd:statement>
                                        <gco:CharacterString />
                                    </gmd:statement>
                                    <gmd:QuantitativeAttributeAccuracyScope>$request->c15_t5_scope
                                        <gmd:QuantitativeAttributeAccuracyItem>
                                            <gco:CharacterString></gco:CharacterString>
                                        </gmd:QuantitativeAttributeAccuracyItem>
                                    </gmd:QuantitativeAttributeAccuracyScope>
                                    <gmd:QuantitativeAttributeAccuracyLevel>$request->c15_t5_comply_level
                                        <gco:CharacterString></gco:CharacterString >
                                    </gmd:QuantitativeAttributeAccuracyLevel>
                                    <gmd:dateTime>
                                        <gco:Date>$request->c15_t5_date</gco:Date>
                                    </gmd:dateTime>
                                    <gmd:measureDescription>
                                        <gco:CharacterString />
                                    </gmd:measureDescription>
                                    <gmd:result>
                                        <gmd:DQ_ConformanceResult>
                                            <gmd:pass>$request->c15_t5_result
                                                <gco:Boolean />
                                            </gmd:pass>
                                            <gmd:explanation>$request->c15_t5_conform_result
                                                <gco:CharacterString />
                                            </gmd:explanation>
                                        </gmd:DQ_ConformanceResult>
                                    </gmd:result>
                                </gmd:DQ_QuantitativeAttributeAccuracy>
                            </gmd:report>
                        </gmd:DQ_DataQuality>
                    </gmd:dataQualityInfo>
                </gmd:MD_Metadata>
        XML;
        return $xml;
    }
}