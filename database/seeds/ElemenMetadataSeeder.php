<?php

use Illuminate\Database\Seeder;
use App\ElemenMetadata;

class CountriesStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //General Information
        ElemenMetadata::create(["label"=>"Content Information","tajuk"=>"General Information","input_name"=>"c1_content_info","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Publisher Name","tajuk"=>"General Information","input_name"=>"publisher_name","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Organisation Name","tajuk"=>"General Information","input_name"=>"publisher_agensi_organisasi","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Email","tajuk"=>"General Information","input_name"=>"publisher_email","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Telephone (Office)","tajuk"=>"General Information","input_name"=>"publisher_phone","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Role","tajuk"=>"General Information","input_name"=>"publisher_role","status"=>"1"]);
        //Identification Information
        ElemenMetadata::create(["label"=>"Metadata Name","tajuk"=>"Identification Information","input_name"=>"c2_metadataName","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Product Type","tajuk"=>"Identification Information","input_name"=>"c2_product_type","status"=>"1"]);
//        ElemenMetadata::create(["label"=>"URL","tajuk"=>"Identification Information","input_name"=>"c10_file_url","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date","tajuk"=>"Identification Information","input_name"=>"c2_metadataDate","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date Type","tajuk"=>"Identification Information","input_name"=>"c2_metadataDateType","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Status","tajuk"=>"Identification Information","input_name"=>"c2_metadataStatus","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Type of Services","tajuk"=>"Identification Information","input_name"=>"c2_typeOfServices","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Operation Name","tajuk"=>"Identification Information","input_name"=>"c2_operationName","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Service URL","tajuk"=>"Identification Information","input_name"=>"c2_serviceUrl","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Type of Coupling Dataset","tajuk"=>"Identification Information","input_name"=>"c2_typeOfCouplingDataset","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Name","tajuk"=>"Identification Information","input_name"=>"c2_contact_name","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Organisation Name","tajuk"=>"Identification Information","input_name"=>"c2_contact_agensiorganisasi","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Position Name","tajuk"=>"Identification Information","input_name"=>"c2_position_name","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Address","tajuk"=>"Identification Information","input_name"=>"c2_contact_address1","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Address","tajuk"=>"Identification Information","input_name"=>"c2_contact_address2","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Address","tajuk"=>"Identification Information","input_name"=>"c2_contact_address3","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Address","tajuk"=>"Identification Information","input_name"=>"c2_contact_address4","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Postal Code","tajuk"=>"Identification Information","input_name"=>"c2_postal_code","status"=>"1"]);
        ElemenMetadata::create(["label"=>"City","tajuk"=>"Identification Information","input_name"=>"c2_contact_city","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Country","tajuk"=>"Identification Information","input_name"=>"c2_contact_country","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Email","tajuk"=>"Identification Information","input_name"=>"c2_contact_email","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Fax No","tajuk"=>"Identification Information","input_name"=>"c2_contact_fax","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Telephone (Office)","tajuk"=>"Identification Information","input_name"=>"c2_contact_phone_office","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Contact Website","tajuk"=>"Identification Information","input_name"=>"c2_contact_website","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Role","tajuk"=>"Identification Information","input_name"=>"c2_contact_role","status"=>"1"]);
        //Topic Category
        ElemenMetadata::create(["label"=>"Administrative and Political Boundaries","tajuk"=>"Topic Category","input_name"=>"Administrative and Political Boundaries","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Agriculture and Farming","tajuk"=>"Topic Category","input_name"=>"Agriculture and Farming","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Atmosphere and Climatic","tajuk"=>"Topic Category","input_name"=>"Atmosphere and Climatic","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Biology and Ecology","tajuk"=>"Topic Category","input_name"=>"Biology and Ecology","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Cadastral","tajuk"=>"Topic Category","input_name"=>"Cadastral","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Cultural, Society and Demography","tajuk"=>"Topic Category","input_name"=>"Cultural, Society and Demography","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Elevation and Derived Products","tajuk"=>"Topic Category","input_name"=>"Elevation and Derived Products","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Environment and Conservation","tajuk"=>"Topic Category","input_name"=>"Environment and Conservation","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Facilities and Structures","tajuk"=>"Topic Category","input_name"=>"Facilities and Structures","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Geological and Geophysical","tajuk"=>"Topic Category","input_name"=>"Geological and Geophysical","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Human Health and Disease","tajuk"=>"Topic Category","input_name"=>"Human Health and Disease","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Imagery and Base Maps","tajuk"=>"Topic Category","input_name"=>"Imagery and Base Maps","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Inland Water Resources","tajuk"=>"Topic Category","input_name"=>"Inland Water Resources","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Locations and Geodetic Networks","tajuk"=>"Topic Category","input_name"=>"Locations and Geodetic Networks","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Military","tajuk"=>"Topic Category","input_name"=>"Military","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Oceans and Estuaries","tajuk"=>"Topic Category","input_name"=>"Oceans and Estuaries","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Transportation Networks","tajuk"=>"Topic Category","input_name"=>"Transportation Networks","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Utilities and Communication","tajuk"=>"Topic Category","input_name"=>"Utilities and Communication","status"=>"1"]);
        //Nominal Resolution
        ElemenMetadata::create(["label"=>"Scanning Resolution","tajuk"=>"Nominal Resolution","input_name"=>"c4_scan_res","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Ground Scanning","tajuk"=>"Nominal Resolution","input_name"=>"c4_ground_scan","status"=>"1"]);
        //Process Step Information
        ElemenMetadata::create(["label"=>"Process Level","tajuk"=>"Process Step Information","input_name"=>"c5_process_lvl","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Resolution","tajuk"=>"Process Step Information","input_name"=>"c5_resolution","status"=>"1"]);
        //Spatial Representation Information
        ElemenMetadata::create(["label"=>"Collection Name","tajuk"=>"Process Step Information","input_name"=>"c6_collection_name","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Collection Identification","tajuk"=>"Process Step Information","input_name"=>"c6_collection_id","status"=>"1"]);
        //Content Information
        ElemenMetadata::create(["label"=>"Band Boundry","tajuk"=>"Content Information","input_name"=>"c7_band_boundary","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Transfer Function Type","tajuk"=>"Content Information","input_name"=>"c7_trans_fn_type","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Transmitted Polarization","tajuk"=>"Content Information","input_name"=>"c7_trans_polar","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Nominal Spatial Resolution","tajuk"=>"Content Information","input_name"=>"c7_nominal_spatial_res","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Detected Polarization","tajuk"=>"Content Information","input_name"=>"c7_detected_polar","status"=>"1"]);
        //Aquisition Information
        ElemenMetadata::create(["label"=>"Average Air Temperature","tajuk"=>"Aquisition Information","input_name"=>"c8_avg_air_temp","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Altitude","tajuk"=>"Aquisition Information","input_name"=>"c8_altitude","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Relative Humidity","tajuk"=>"Aquisition Information","input_name"=>"c8_relative_humid","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Meteorological Conditions","tajuk"=>"Aquisition Information","input_name"=>"c8_meteor_cond","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Identifier (Event Identification)","tajuk"=>"Aquisition Information","input_name"=>"c8_identifier","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Trigger","tajuk"=>"Aquisition Information","input_name"=>"c8_trigger","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Context","tajuk"=>"Aquisition Information","input_name"=>"c8_context","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Sequence","tajuk"=>"Aquisition Information","input_name"=>"c8_sequence","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Time","tajuk"=>"Aquisition Information","input_name"=>"c8_time","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Type (Instrument Identification)","tajuk"=>"Aquisition Information","input_name"=>"c8_type","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Identifier (Operation)","tajuk"=>"Aquisition Information","input_name"=>"c8_op_identifier","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Status","tajuk"=>"Aquisition Information","input_name"=>"c8_op_status","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Type","tajuk"=>"Aquisition Information","input_name"=>"c8_op_type","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date","tajuk"=>"Aquisition Information","input_name"=>"c8_rdr_date","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Latest Acceptable Date","tajuk"=>"Aquisition Information","input_name"=>"c8_last_accept_date","status"=>"1"]);
        //Spatial Domain
        ElemenMetadata::create(["label"=>"West Bound Longitude","tajuk"=>"Spatial Domain","input_name"=>"c9_west_bound_longitude","status"=>"1"]);
        ElemenMetadata::create(["label"=>"East Bound Longitude","tajuk"=>"Spatial Domain","input_name"=>"c9_east_bound_longitude","status"=>"1"]);
        ElemenMetadata::create(["label"=>"South Bound Latitude","tajuk"=>"Spatial Domain","input_name"=>"c9_south_bound_latitude","status"=>"1"]);
        ElemenMetadata::create(["label"=>"North Bound Latitude","tajuk"=>"Spatial Domain","input_name"=>"c9_north_bound_latitude","status"=>"1"]);
        //Browsing Information
        ElemenMetadata::create(["label"=>"File Name","tajuk"=>"Browsing Information","input_name"=>"c10_file_name","status"=>"1"]);
        ElemenMetadata::create(["label"=>"File Type","tajuk"=>"Browsing Information","input_name"=>"c10_file_type","status"=>"1"]);
        ElemenMetadata::create(["label"=>"URL","tajuk"=>"Browsing Information","input_name"=>"c10_file_url","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Keywords","tajuk"=>"Browsing Information","input_name"=>"c10_keyword","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional Keywords (1)","tajuk"=>"Browsing Information","input_name"=>"c10_additional_keyword[]","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional Keywords (1)","tajuk"=>"Browsing Information","input_name"=>"c10_additional_keyword[]","status"=>"1"]);
        //Distribution Information
        ElemenMetadata::create(["label"=>"Format Name","tajuk"=>"Distribution Information","input_name"=>"c11_dist_format","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Format Version","tajuk"=>"Distribution Information","input_name"=>"c11_version","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Organisation Name","tajuk"=>"Distribution Information","input_name"=>"c11_distributor","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Units of Distribution","tajuk"=>"Distribution Information","input_name"=>"c11_units_of_dist","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Size (Megabytes)","tajuk"=>"Distribution Information","input_name"=>"c11_size","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Link (Online)","tajuk"=>"Distribution Information","input_name"=>"c11_link","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Fees","tajuk"=>"Distribution Information","input_name"=>"c11_fees","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Ordering Instructions","tajuk"=>"Distribution Information","input_name"=>"c11_order_instructions","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Medium Name","tajuk"=>"Distribution Information","input_name"=>"c11_medium","status"=>"1"]);
        //Data Set Identification
        ElemenMetadata::create(["label"=>"Spatial Data Set Type","tajuk"=>"Data Set Identification","input_name"=>"c12_dataset_type","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Scale in Hardcopy/ Softcopy","tajuk"=>"Data Set Identification","input_name"=>"c12_feature_scale","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Image Resolution (GSD)","tajuk"=>"Data Set Identification","input_name"=>"c12_image_res","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Data Set Language","tajuk"=>"Data Set Identification","input_name"=>"c12_language","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Maintenance and Update","tajuk"=>"Data Set Identification","input_name"=>"c12_maintenanceUpdate","status"=>"1"]);
        //Reference System Information
        ElemenMetadata::create(["label"=>"Reference System Identifier","tajuk"=>"Reference System Information","input_name"=>"c13_ref_sys_identify","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Projection","tajuk"=>"Reference System Information","input_name"=>"refsys_projection","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Axis Units","tajuk"=>"Reference System Information","input_name"=>"refsys_axis_units","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Semi Major Axis","tajuk"=>"Reference System Information","input_name"=>"refsys_semiMajorAxis","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Datum","tajuk"=>"Reference System Information","input_name"=>"refsys_datum","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Ellipsoid","tajuk"=>"Reference System Information","input_name"=>"refsys_ellipsoid","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Denominator of Flattening Ratio","tajuk"=>"Reference System Information","input_name"=>"refsys_denomFlatRatio","status"=>"1"]);
        //Constraints
        ElemenMetadata::create(["label"=>"Limitation Contsraints","tajuk"=>"Constraints","input_name"=>"c14_useLimitation","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Access Constraints","tajuk"=>"Constraints","input_name"=>"c14_access_constraint","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Use Constraints","tajuk"=>"Constraints","input_name"=>"c14_use_constraint","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Constraints","input_name"=>"c14_classification_sys","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification System","tajuk"=>"Constraints","input_name"=>"c14_reference","status"=>"1"]);
        //Data Quality
        ElemenMetadata::create(["label"=>"DQ Scope","tajuk"=>"Data Quality","input_name"=>"c15_data_quality_info","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Data History","tajuk"=>"Data Quality","input_name"=>"c15_data_history","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Data Time","tajuk"=>"Data Quality","input_name"=>"c15_date","status"=>"1"]);
        //Data Quality - Completeness
        ElemenMetadata::create(["label"=>"Scope (Completeness Commission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Completeness Commission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Completeness Commission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Completeness Commission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Completeness Commission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Scope (Completeness Omission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Completeness Omission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Completeness Omission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Completeness Omission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Completeness Omission)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        //Data Quality - Conceptual Consistency
        ElemenMetadata::create(["label"=>"Scope (Conceptual Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Conceptual Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Conceptual Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Conceptual Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Conceptual Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Scope (Domain Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Domain Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Domain Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Domain Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Domain Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Scope (Format Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Format Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Format Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Format Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Format Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Scope (Topological Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Topological Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Topological Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Topological Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Topological Consistency)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        //Data Quality - Positional Consistency
        ElemenMetadata::create(["label"=>"Scope (Absolute or External Accuracy)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Compliance Level (Absolute or External Accuracy)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Date (Absolute or External Accuracy)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Result (Absolute or External Accuracy)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Conformance Result (Absolute or External Accuracy)","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        //SMBG SINI
        
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Classification","tajuk"=>"Data Quality","input_name"=>"c14_reference","status"=>"1"]);
    }
}
