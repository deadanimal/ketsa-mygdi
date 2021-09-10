<?php

use Illuminate\Database\Seeder;
use App\ElemenMetadata;

class ElemenMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($r=1;$r<5;$r++){ //seed for each kategori 1-4
            //General Information
            ElemenMetadata::create(["label"=>"Kategori","tajuk"=>"1","input_name"=>"c1_content_info","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Publisher Name","tajuk"=>"1","input_name"=>"publisher_name","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Organisation Name","tajuk"=>"1","input_name"=>"publisher_agensi_organisasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Email","tajuk"=>"1","input_name"=>"publisher_email","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Telephone (Office)","tajuk"=>"1","input_name"=>"publisher_phone","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Role","tajuk"=>"1","input_name"=>"publisher_role","status"=>"1","kategori"=>$r]);
            //Identification Information
            ElemenMetadata::create(["label"=>"Metadata Name","tajuk"=>"2","input_name"=>"c2_metadataName","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Product Type","tajuk"=>"2","input_name"=>"c2_product_type","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Aplikasi","tajuk"=>"2","input_name"=>"abstractApplication_namaAplikasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan","tajuk"=>"2","input_name"=>"abstractApplication_tujuan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tahun Pembangunan","tajuk"=>"2","input_name"=>"abstractApplication_tahunPembangunan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Kemaskini","tajuk"=>"2","input_name"=>"abstractApplication_kemaskini","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Data Terlibat","tajuk"=>"2","input_name"=>"abstractApplication_dataTerlibat","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Sasaran Pengguna","tajuk"=>"2","input_name"=>"abstractApplication_sasaranPengguna","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Versi","tajuk"=>"2","input_name"=>"abstractApplication_versi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Perisian Yang Digunakan Dalam Pembangunan","tajuk"=>"2","input_name"=>"abstractApplication_perisianDigunaPembangunan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Dokumen","tajuk"=>"2","input_name"=>"abstractDocument_namaDokumen","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan","tajuk"=>"2","input_name"=>"abstractDocument_tujuan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tahun Terbitan","tajuk"=>"2","input_name"=>"abstractDocument_tahunTerbitan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Edisi","tajuk"=>"2","input_name"=>"abstractDocument_edisi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Aktiviti","tajuk"=>"2","input_name"=>"abstractGISActivityProject_namaAktiviti","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan","tajuk"=>"2","input_name"=>"abstractGISActivityProject_tujuan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Lokasi","tajuk"=>"2","input_name"=>"abstractGISActivityProject_lokasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tahun","tajuk"=>"2","input_name"=>"abstractGISActivityProject_tahun","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Peta","tajuk"=>"2","input_name"=>"abstractMap_namaPeta","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Kawasan","tajuk"=>"2","input_name"=>"abstractMap_kawasan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan","tajuk"=>"2","input_name"=>"abstractMap_tujuan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tahun Terbitan","tajuk"=>"2","input_name"=>"abstractMap_tahunTerbitan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Edisi","tajuk"=>"2","input_name"=>"abstractMap_edisi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"No. Siri","tajuk"=>"2","input_name"=>"abstractMap_noSiri","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Skala","tajuk"=>"2","input_name"=>"abstractMap_skala","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Unit","tajuk"=>"2","input_name"=>"abstractMap_unit","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Data","tajuk"=>"2","input_name"=>"abstractRasterData_namaData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Lokasi","tajuk"=>"2","input_name"=>"abstractRasterData_lokasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Rumusan Tentang Data","tajuk"=>"2","input_name"=>"abstractRasterData_rumusanData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan Data","tajuk"=>"2","input_name"=>"abstractRasterData_tujuanData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Kaedah Penyediaan Data","tajuk"=>"2","input_name"=>"abstractRasterData_kaedahPenyediaanData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Format","tajuk"=>"2","input_name"=>"abstractRasterData_format","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Unit","tajuk"=>"2","input_name"=>"abstractRasterData_unit","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Skala","tajuk"=>"2","input_name"=>"abstractRasterData_skala","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Status Data","tajuk"=>"2","input_name"=>"abstractRasterData_statusData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tahun Perolehan","tajuk"=>"2","input_name"=>"abstractRasterData_tahunPerolehan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Jenis Satelit","tajuk"=>"2","input_name"=>"abstractRasterData_jenisSatelit","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Format","tajuk"=>"2","input_name"=>"abstractRasterData_format","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Resolusi","tajuk"=>"2","input_name"=>"abstractRasterData_resolusi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Kawasan Litupan","tajuk"=>"2","input_name"=>"abstractRasterData_kawasanLitupan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Servis","tajuk"=>"2","input_name"=>"abstractServices_namaServis","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Lokasi","tajuk"=>"2","input_name"=>"abstractServices_lokasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan","tajuk"=>"2","input_name"=>"abstractServices_tujuan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Data Yang Terlibat","tajuk"=>"2","input_name"=>"abstractServices_dataTerlibat","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Polisi","tajuk"=>"2","input_name"=>"abstractServices_polisi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Peringkat Capaian","tajuk"=>"2","input_name"=>"abstractServices_peringkatCapaian","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Format","tajuk"=>"2","input_name"=>"abstractServices_format","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Perisian","tajuk"=>"2","input_name"=>"abstractSoftware_namaPerisian","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Versi","tajuk"=>"2","input_name"=>"abstractSoftware_versi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan","tajuk"=>"2","input_name"=>"abstractSoftware_tujuan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tahun Penggunaan Perisian","tajuk"=>"2","input_name"=>"abstractSoftware_tahunPengunaanPerisian","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Kaedah Perolehan","tajuk"=>"2","input_name"=>"abstractSoftware_kaedahPerolehan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Format","tajuk"=>"2","input_name"=>"abstractSoftware_format","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Pengeluar","tajuk"=>"2","input_name"=>"abstractSoftware_pengeluar","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Keupayaan","tajuk"=>"2","input_name"=>"abstractSoftware_keupayaan","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Data Yang Terlibat","tajuk"=>"2","input_name"=>"abstractSoftware_dataTerlibat","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Keperluan Perkakasan","tajuk"=>"2","input_name"=>"abstractSoftware_keperluanPerkakas","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nama Data","tajuk"=>"2","input_name"=>"abstractVectorData_namaData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Lokasi","tajuk"=>"2","input_name"=>"abstractVectorData_lokasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Rumusan Tentang Data","tajuk"=>"2","input_name"=>"abstractVectorData_rumusanData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Tujuan Data","tajuk"=>"2","input_name"=>"abstractVectorData_tujuanData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Kaedah Penyediaan Data","tajuk"=>"2","input_name"=>"abstractVectorData_kaedahPenyediaanData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Format","tajuk"=>"2","input_name"=>"abstractVectorData_format","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Unit","tajuk"=>"2","input_name"=>"abstractVectorData_unit","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Skala","tajuk"=>"2","input_name"=>"abstractVectorData_skala","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Status Data","tajuk"=>"2","input_name"=>"abstractVectorData_statusData","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Abstract","tajuk"=>"2","input_name"=>"c2_abstract","status"=>"1","kategori"=>$r]);
            //        ElemenMetadata::create(["label"=>"URL","tajuk"=>"2","input_name"=>"c10_file_url","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date","tajuk"=>"2","input_name"=>"c2_metadataDate","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date Type","tajuk"=>"2","input_name"=>"c2_metadataDateType","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Status","tajuk"=>"2","input_name"=>"c2_metadataStatus","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Type of Services","tajuk"=>"2","input_name"=>"c2_typeOfServices","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Operation Name","tajuk"=>"2","input_name"=>"c2_operationName","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Service URL","tajuk"=>"2","input_name"=>"c2_serviceUrl","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Type of Coupling Dataset","tajuk"=>"2","input_name"=>"c2_typeOfCouplingDataset","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Name","tajuk"=>"2","input_name"=>"c2_contact_name","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Organisation Name","tajuk"=>"2","input_name"=>"c2_contact_agensiorganisasi","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Position Name","tajuk"=>"2","input_name"=>"c2_position_name","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Address","tajuk"=>"2","input_name"=>"c2_contact_address1","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Address","tajuk"=>"2","input_name"=>"c2_contact_address2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Address","tajuk"=>"2","input_name"=>"c2_contact_address3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Address","tajuk"=>"2","input_name"=>"c2_contact_address4","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Postal Code","tajuk"=>"2","input_name"=>"c2_postal_code","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"City","tajuk"=>"2","input_name"=>"c2_contact_city","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Country","tajuk"=>"2","input_name"=>"c2_contact_country","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"State","tajuk"=>"2","input_name"=>"c2_contact_state","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Email","tajuk"=>"2","input_name"=>"c2_contact_email","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Fax No","tajuk"=>"2","input_name"=>"c2_contact_fax","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Telephone (Office)","tajuk"=>"2","input_name"=>"c2_contact_phone_office","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Contact Website","tajuk"=>"2","input_name"=>"c2_contact_website","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Role","tajuk"=>"2","input_name"=>"c2_contact_role","status"=>"1","kategori"=>$r]);
            //Topic Category
            ElemenMetadata::create(["label"=>"Administrative and Political Boundaries","tajuk"=>"3","input_name"=>"Administrative and Political Boundaries","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Agriculture and Farming","tajuk"=>"3","input_name"=>"Agriculture and Farming","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Atmosphere and Climatic","tajuk"=>"3","input_name"=>"Atmosphere and Climatic","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Biology and Ecology","tajuk"=>"3","input_name"=>"Biology and Ecology","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Business and Economic","tajuk"=>"3","input_name"=>"Business and Economic","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Cadastral","tajuk"=>"3","input_name"=>"Cadastral","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Cultural, Society and Demography","tajuk"=>"3","input_name"=>"Cultural, Society and Demography","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Elevation and Derived Products","tajuk"=>"3","input_name"=>"Elevation and Derived Products","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Environment and Conservation","tajuk"=>"3","input_name"=>"Environment and Conservation","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Facilities and Structures","tajuk"=>"3","input_name"=>"Facilities and Structures","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Geological and Geophysical","tajuk"=>"3","input_name"=>"Geological and Geophysical","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Human Health and Disease","tajuk"=>"3","input_name"=>"Human Health and Disease","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Imagery and Base Maps","tajuk"=>"3","input_name"=>"Imagery and Base Maps","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Inland Water Resources","tajuk"=>"3","input_name"=>"Inland Water Resources","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Locations and Geodetic Networks","tajuk"=>"3","input_name"=>"Locations and Geodetic Networks","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Military","tajuk"=>"3","input_name"=>"Military","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Oceans and Estuaries","tajuk"=>"3","input_name"=>"Oceans and Estuaries","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Transportation Networks","tajuk"=>"3","input_name"=>"Transportation Networks","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Utilities and Communication","tajuk"=>"3","input_name"=>"Utilities and Communication","status"=>"1","kategori"=>$r]);
            //Nominal Resolution
            ElemenMetadata::create(["label"=>"Scanning Resolution","tajuk"=>"4","input_name"=>"c4_scan_res","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Ground Scanning","tajuk"=>"4","input_name"=>"c4_ground_scan","status"=>"1","kategori"=>$r]);
            //Process Step Information
            ElemenMetadata::create(["label"=>"Process Level","tajuk"=>"5","input_name"=>"c5_process_lvl","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Resolution","tajuk"=>"5","input_name"=>"c5_resolution","status"=>"1","kategori"=>$r]);
            //Spatial Representation Information
            ElemenMetadata::create(["label"=>"Collection Name","tajuk"=>"6","input_name"=>"c6_collection_name","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Collection Identification","tajuk"=>"6","input_name"=>"c6_collection_id","status"=>"1","kategori"=>$r]);
            //Content Information
            ElemenMetadata::create(["label"=>"Band Boundry","tajuk"=>"7","input_name"=>"c7_band_boundary","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Transfer Function Type","tajuk"=>"7","input_name"=>"c7_trans_fn_type","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Transmitted Polarization","tajuk"=>"7","input_name"=>"c7_trans_polar","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Nominal Spatial Resolution","tajuk"=>"7","input_name"=>"c7_nominal_spatial_res","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Detected Polarization","tajuk"=>"7","input_name"=>"c7_detected_polar","status"=>"1","kategori"=>$r]);
            //Aquisition Information
            ElemenMetadata::create(["label"=>"Average Air Temperature","tajuk"=>"8","input_name"=>"c8_avg_air_temp","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Altitude","tajuk"=>"8","input_name"=>"c8_altitude","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Relative Humidity","tajuk"=>"8","input_name"=>"c8_relative_humid","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Meteorological Conditions","tajuk"=>"8","input_name"=>"c8_meteor_cond","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Identifier (Event Identification)","tajuk"=>"8","input_name"=>"c8_identifier","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Trigger","tajuk"=>"8","input_name"=>"c8_trigger","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Context","tajuk"=>"8","input_name"=>"c8_context","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Sequence","tajuk"=>"8","input_name"=>"c8_sequence","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Time","tajuk"=>"8","input_name"=>"c8_time","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Type (Instrument Identification)","tajuk"=>"8","input_name"=>"c8_type","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Identifier (Operation)","tajuk"=>"8","input_name"=>"c8_op_identifier","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Status","tajuk"=>"8","input_name"=>"c8_op_status","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Type","tajuk"=>"8","input_name"=>"c8_op_type","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date","tajuk"=>"8","input_name"=>"c8_rdr_date","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Latest Acceptable Date","tajuk"=>"8","input_name"=>"c8_last_accept_date","status"=>"1","kategori"=>$r]);
            //Spatial Domain
            ElemenMetadata::create(["label"=>"West Bound Longitude","tajuk"=>"9","input_name"=>"c9_west_bound_longitude","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"East Bound Longitude","tajuk"=>"9","input_name"=>"c9_east_bound_longitude","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"South Bound Latitude","tajuk"=>"9","input_name"=>"c9_south_bound_latitude","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"North Bound Latitude","tajuk"=>"9","input_name"=>"c9_north_bound_latitude","status"=>"1","kategori"=>$r]);
            //Browsing Information
            ElemenMetadata::create(["label"=>"File Name","tajuk"=>"10","input_name"=>"c10_file_name","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"File Type","tajuk"=>"10","input_name"=>"c10_file_type","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"URL","tajuk"=>"10","input_name"=>"c10_file_url","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Keywords","tajuk"=>"10","input_name"=>"c10_keyword","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Additional Keywords (1)","tajuk"=>"10","input_name"=>"c10_additional_keyword[]","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Additional Keywords (1)","tajuk"=>"10","input_name"=>"c10_additional_keyword[]","status"=>"1","kategori"=>$r]);
            //Distribution Information
            ElemenMetadata::create(["label"=>"Format Name","tajuk"=>"11","input_name"=>"c11_dist_format","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Format Version","tajuk"=>"11","input_name"=>"c11_version","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Organisation Name","tajuk"=>"11","input_name"=>"c11_distributor","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Units of Distribution","tajuk"=>"11","input_name"=>"c11_units_of_dist","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Size (Megabytes)","tajuk"=>"11","input_name"=>"c11_size","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Link (Online)","tajuk"=>"11","input_name"=>"c11_link","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Fees","tajuk"=>"11","input_name"=>"c11_fees","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Ordering Instructions","tajuk"=>"11","input_name"=>"c11_order_instructions","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Medium Name","tajuk"=>"11","input_name"=>"c11_medium","status"=>"1","kategori"=>$r]);
            //Data Set Identification
            ElemenMetadata::create(["label"=>"Spatial Data Set Type","tajuk"=>"12","input_name"=>"c12_dataset_type","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scale in Hardcopy/ Softcopy","tajuk"=>"12","input_name"=>"c12_feature_scale","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Image Resolution (GSD)","tajuk"=>"12","input_name"=>"c12_image_res","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Data Set Language","tajuk"=>"12","input_name"=>"c12_language","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Maintenance and Update","tajuk"=>"12","input_name"=>"c12_maintenanceUpdate","status"=>"1","kategori"=>$r]);
            //Reference System Information
            ElemenMetadata::create(["label"=>"Reference System Identifier","tajuk"=>"13","input_name"=>"c13_ref_sys_identify","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Projection","tajuk"=>"13","input_name"=>"refsys_projection","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Axis Units","tajuk"=>"13","input_name"=>"refsys_axis_units","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Semi Major Axis","tajuk"=>"13","input_name"=>"refsys_semiMajorAxis","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Datum","tajuk"=>"13","input_name"=>"refsys_datum","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Ellipsoid","tajuk"=>"13","input_name"=>"refsys_ellipsoid","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Denominator of Flattening Ratio","tajuk"=>"13","input_name"=>"refsys_denomFlatRatio","status"=>"1","kategori"=>$r]);
            //Constraints
            ElemenMetadata::create(["label"=>"Limitation Contsraints","tajuk"=>"14","input_name"=>"c14_useLimitation","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Access Constraints","tajuk"=>"14","input_name"=>"c14_access_constraint","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Use Constraints","tajuk"=>"14","input_name"=>"c14_use_constraint","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Classification","tajuk"=>"14","input_name"=>"c14_classification_sys","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Classification System","tajuk"=>"14","input_name"=>"c14_reference","status"=>"1","kategori"=>$r]);
            //Data Quality
            ElemenMetadata::create(["label"=>"DQ Scope","tajuk"=>"15","input_name"=>"c15_data_quality_info","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Data History","tajuk"=>"15","input_name"=>"c15_data_history","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Data Time","tajuk"=>"15","input_name"=>"c15_date","status"=>"1","kategori"=>$r]);
            //Data Quality - Completeness
            ElemenMetadata::create(["label"=>"Scope (Completeness Commission)","tajuk"=>"15","input_name"=>"c15_t1_scope","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Completeness Commission)","tajuk"=>"15","input_name"=>"c15_t1_comply_level","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Completeness Commission)","tajuk"=>"15","input_name"=>"c15_t1_date","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Completeness Commission)","tajuk"=>"15","input_name"=>"c15_t1_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Completeness Commission)","tajuk"=>"15","input_name"=>"c15_t1_conform_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Completeness Omission)","tajuk"=>"15","input_name"=>"c15_t1_scope_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Completeness Omission)","tajuk"=>"15","input_name"=>"c15_t1_comply_level_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Completeness Omission)","tajuk"=>"15","input_name"=>"c15_t1_date_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Completeness Omission)","tajuk"=>"15","input_name"=>"c15_t1_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Completeness Omission)","tajuk"=>"15","input_name"=>"c15_t1_conform_result_2","status"=>"1","kategori"=>$r]);
            //Data Quality - Conceptual Consistency
            ElemenMetadata::create(["label"=>"Scope (Conceptual Consistency)","tajuk"=>"15","input_name"=>"c15_t2_scope","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Conceptual Consistency)","tajuk"=>"15","input_name"=>"c15_t2_comply_level","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Conceptual Consistency)","tajuk"=>"15","input_name"=>"c15_t2_date","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Conceptual Consistency)","tajuk"=>"15","input_name"=>"c15_t2_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Conceptual Consistency)","tajuk"=>"15","input_name"=>"c15_t2_conform_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Domain Consistency)","tajuk"=>"15","input_name"=>"c15_t2_scope_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Domain Consistency)","tajuk"=>"15","input_name"=>"c15_t2_comply_level_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Domain Consistency)","tajuk"=>"15","input_name"=>"c15_t2_date_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Domain Consistency)","tajuk"=>"15","input_name"=>"c15_t2_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Domain Consistency)","tajuk"=>"15","input_name"=>"c15_t2_conform_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Format Consistency)","tajuk"=>"15","input_name"=>"c15_t2_scope_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Format Consistency)","tajuk"=>"15","input_name"=>"c15_t2_comply_level_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Format Consistency)","tajuk"=>"15","input_name"=>"c15_t2_date_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Format Consistency)","tajuk"=>"15","input_name"=>"c15_t2_result_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Format Consistency)","tajuk"=>"15","input_name"=>"c15_t2_conform_result_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Topological Consistency)","tajuk"=>"15","input_name"=>"c15_t2_scope_4","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Topological Consistency)","tajuk"=>"15","input_name"=>"c15_t2_comply_level_4","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Topological Consistency)","tajuk"=>"15","input_name"=>"c15_t2_date_4","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Topological Consistency)","tajuk"=>"15","input_name"=>"c15_t2_result_4","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Topological Consistency)","tajuk"=>"15","input_name"=>"c15_t2_conform_result_4","status"=>"1","kategori"=>$r]);
            //Data Quality - Positional Accuracy 
            ElemenMetadata::create(["label"=>"Scope (Absolute or External Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_scope","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Absolute or External Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_comply_level","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Absolute or External Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_date","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Absolute or External Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Absolute or External Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_conform_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Relative or Internal Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_scope_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Relative or Internal Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_comply_level_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Relative or Internal Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_date_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Relative or Internal Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Relative or Internal Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_conform_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Gridded Data Positional Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_scope_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Gridded Data Positional Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_comply_level_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Gridded Data Positional Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_date_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Gridded Data Positional Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_result_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Gridded Data Positional Accuracy)","tajuk"=>"15","input_name"=>"c15_t3_conform_result_3","status"=>"1","kategori"=>$r]);
            //Data Quality - Temporal Accuracy 
            ElemenMetadata::create(["label"=>"Scope (Accuracy of A Time Measurement)","tajuk"=>"15","input_name"=>"c15_t4_scope","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Accuracy of A Time Measurement)","tajuk"=>"15","input_name"=>"c15_t4_comply_level","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Accuracy of A Time Measurement)","tajuk"=>"15","input_name"=>"c15_t4_date","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Accuracy of A Time Measurement)","tajuk"=>"15","input_name"=>"c15_t4_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Accuracy of A Time Measurement)","tajuk"=>"15","input_name"=>"c15_t4_conform_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Temporal Consistency)","tajuk"=>"15","input_name"=>"c15_t4_scope_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Temporal Consistency)","tajuk"=>"15","input_name"=>"c15_t4_comply_level_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Temporal Consistency)","tajuk"=>"15","input_name"=>"c15_t4_date_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Temporal Consistency)","tajuk"=>"15","input_name"=>"c15_t4_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Temporal Consistency)","tajuk"=>"15","input_name"=>"c15_t4_conform_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Temporal Validity)","tajuk"=>"15","input_name"=>"c15_t4_scope_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Temporal Validity)","tajuk"=>"15","input_name"=>"c15_t4_comply_level_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Temporal Validity)","tajuk"=>"15","input_name"=>"c15_t4_date_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Temporal Validity)","tajuk"=>"15","input_name"=>"c15_t4_result_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Temporal Validity)","tajuk"=>"15","input_name"=>"c15_t4_conform_result_3","status"=>"1","kategori"=>$r]);
            //Data Quality - Thematic Accuracy 
            ElemenMetadata::create(["label"=>"Scope (Classification Correctness)","tajuk"=>"15","input_name"=>"c15_t5_scope","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Classification Correctness)","tajuk"=>"15","input_name"=>"c15_t5_comply_level","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Classification Correctness)","tajuk"=>"15","input_name"=>"c15_t5_date","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Classification Correctness)","tajuk"=>"15","input_name"=>"c15_t5_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Classification Correctness)","tajuk"=>"15","input_name"=>"c15_t5_conform_result","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Non-Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_scope_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Non-Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_comply_level_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Non-Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_date_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Non-Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Non-Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_conform_result_2","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Scope (Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_scope_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Compliance Level (Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_comply_level_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Date (Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_date_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Result (Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_result_3","status"=>"1","kategori"=>$r]);
            ElemenMetadata::create(["label"=>"Conformance Result (Quantitative Attribute Correctness)","tajuk"=>"15","input_name"=>"c15_t5_conform_result_3","status"=>"1","kategori"=>$r]);
        }
    }
}
