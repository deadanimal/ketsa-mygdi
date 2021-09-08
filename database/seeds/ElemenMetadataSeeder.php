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
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_dist_format","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_version","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_distributor","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_units_of_dist","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_size","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_link","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_fees","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_order_instructions","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c11_medium","status"=>"1"]);
        ElemenMetadata::create(["label"=>"Additional","tajuk"=>"Distribution Information","input_name"=>"c10_additional_keyword","status"=>"1"]);
    }
}
