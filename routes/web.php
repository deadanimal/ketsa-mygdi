<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/senarai_metadata_nologin', 'MetadataController@index_nologin');
Route::post('/carian_metadata_nologin', 'MetadataController@search_nologin');
Route::post('/lihat_metadata_nologin', 'MetadataController@show_nologin');
Route::post('/lihat_xml_nologin', 'MetadataController@show_xml_nologin');
Route::post('/simpan_maklum_balas', 'PortalController@store_maklum_balas');
Route::get('/downloadMetadataPdf/{id}', 'MetadataController@downloadMetadataPdf');
Route::get('/downloadMetadataXml/{id}/{name}', 'MetadataController@downloadMetadataXml');
Route::get('/downloadMetadataExcel/{id}', 'MetadataController@downloadMetadataExcel');

Route::post('/loginf', 'AuthController@authenticate');
//Route::post('/registerf','RegisterController@create');

Route::get('/soalan_lazim','PortalController@index_faq');
Route::get('/mengenai_mygeo_explorer', function () {
    return view('mengenai_mygeo_explorer');
});

Route::get('/', 'HomeController@index');
//Route::get('/', function () {
//    return view('mygeo.profil');
//});
Route::get('/panduan_pengguna', 'PortalController@index_panduan_pengguna');
Route::get('/hubungi_kami', 'PortalController@index_hubungi_kami');
Route::get('/penafian', 'PortalController@index_penafian');
Route::get('/penyataan_privasi', 'PortalController@index_penyataan_privasi');

Route::get('/data_asas_landing', 'DataAsasController@data_asas_landing');
Route::get('/data_asas_senarai', 'DataAsasController@data_asas_senarai');
Route::get('/data_asas_senarai/{data1}', 'DataAsasController@data_asas_senarai_show');
Route::get('/data_asas_senarai/{data1}/{data2}', 'DataAsasController@data_asas_senarai_show_show');
Route::get('/data_asas_tatacara_mohon', 'PortalController@index_tatacara');
Route::get('/data_asas_dokumen_berkaitan', 'DokumenUtamaController@index');
Route::post('/simpan_maklum_balas', 'PortalController@store_maklum_balas');
Route::post('/reply_maklum_balas', 'PortalController@reply_maklum_balas');

Route::get('/senarai_pengumuman', 'PortalController@index_pengumuman');
Route::post('/tunjuk_pengumuman', 'PortalController@show_pengumuman');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/laporan_data_asas', 'LaporanDashboardController@index_laporan_data');
    Route::get('/laporan_metadata', 'LaporanDashboardController@index_laporan_metadata');
    Route::post('/filter_by_agensi', 'LaporanDashboardController@filter_by_agensi');


    Route::get('/kemaskini_pengumuman', 'PortalController@edit_pengumuman');
    Route::post('/simpan_pengumuman', 'PortalController@update_pengumuman');
    Route::post('/tambah_pengumuman', 'PortalController@store_pengumuman');
    Route::post('/buang_pengumuman', 'PortalController@delete_pengumuman');

    Route::get('/mygeo_senarai_pengumuman', 'PortalController@index_pengumuman');
    Route::post('/mygeo_tunjuk_pengumuman', 'PortalController@show_pengumuman2');
    Route::post('/mygeo_kemaskini_pengumuman', 'PortalController@edit_pengumuman');
    Route::post('/mygeo_simpan_pengumuman', 'PortalController@update_pengumuman');
    Route::post('/mygeo_buang_pengumuman', 'PortalController@delete_pengumuman');

    Route::get('/mygeo_dashboard', 'LaporanDashboardController@index_mygeo_dashboard');
    Route::get('/lihat_laporan_data/{id}', 'LaporanDashboardController@laporan_data_detail');
    Route::post('/api/laporan_perincian_data', 'LaporanDashboardController@generate_pdf_laporan_perincian_data');

    Route::get('/landing', function () {
        return view('landing');
    });

    Route::get('ftestdb', 'PeopleController@ftestdb');

    Route::get('/map', function () {
        return view('map');
    });

    // Route::get('/pengisian_metadata', function () {        $2y$10$7jGsw1HDMp8P9fpUk6JfD.hPpvegAAIEH2aKPD356iB0OGWP7WZBW
    //     return view('/mygeo/pengisian_metadata');          $2y$10$YMB0ozfTDEEGW2QTLU0C2uCmgioALr82cLPoZcAcHFVNm/8rMYjVu
    // });

    Route::get('/mygeo_pengesahan', 'UserController@index');
    Route::get('/mygeo_senarai_pengguna_berdaftar', 'UserController@index_berdaftar');
    Route::get('/mygeo_senarai_penerbit_pengesah', 'UserController@index_penerbit_pengesah');
    Route::post('/change_user_status', 'UserController@change_user_status');
    Route::post('/delete_user', 'UserController@delete_user');

    Route::post('/change_elemen_status', 'MetadataController@change_elemen_status');

    Route::get('/portal_settings', 'PortalController@index_portal_settings');
    Route::post('/simpan_portal_settings', 'PortalController@store_portal_settings');

    Route::get('/faq', 'PortalController@index_faq');
    Route::get('/kemaskini_faq', 'PortalController@edit_faq');

    Route::get('/maklum_balas','PortalController@index_maklum_balas');
    Route::get('/maklum_balas_edit', 'PortalController@edit_maklum_balas');

    Route::post('/delete_maklum_balas', 'PortalController@delete_maklum_balas');

    Route::get('/panduan_pengguna_edit', 'PortalController@edit_panduan_pengguna');
    Route::post('/simpan_panduan_pengguna', 'PortalController@update_panduan_pengguna');
    Route::post('/simpan_kategori_panduan', 'PortalController@store_kategori_panduan');

    Route::get('/tatacara_edit', 'PortalController@edit_tatacara');
    Route::post('/simpan_tatacara', 'PortalController@update_tatacara');
    Route::post('/simpan_tajuk_tatacara', 'PortalController@store_tajuk_tatacara');
    Route::post('/mygeo_buang_tatacara', 'PortalController@delete_tatacara');

    Route::post('/simpan_tajuk_dokumen', 'DokumenUtamaController@store_tajuk_dokumen');
    Route::post('/simpan_dokumen', 'DokumenUtamaController@update_dokumen');
    Route::post('/simpan_dokumen_desc', 'DokumenUtamaController@update_dokumen_desc');
    Route::get('/dokumen_utama_edit', 'DokumenUtamaController@edit_dokumen');
    Route::post('/mygeo_buang_dokumen', 'DokumenUtamaController@delete_dokumen');

    Route::get('/pengumuman_edit', 'PortalController@edit_pengumuman2');

    // Route::get('/hubungi_kami','PortalController@index_hubungi_kami');
    Route::post('/simpan_hubungi_kami', 'PortalController@store_hubungi_kami');

    Route::get('/mygeo_penafian', 'PortalController@index_penafian_mygeo');
    Route::post('/simpan_penafian', 'PortalController@store_penafian');

    Route::get('/mygeo_penyataan_privasi', 'PortalController@index_penyataan_privasi_mygeo');
    Route::post('/simpan_penyataan_privasi', 'PortalController@store_penyataan_privasi');

    Route::post('/simpan_soalan_lazim', 'PortalController@store_faq');
    Route::post('/update_faq', 'PortalController@update_faq');

    Route::get('/mygeo_pengisian_metadata', 'MetadataController@create');
    Route::post('/store_metadata', 'MetadataController@store');
    Route::post('/muat_naik_xml', 'MetadataController@store_xml');

    Route::any('/mygeo_senarai_metadata', 'MetadataController@index');
    Route::post('/carian_metadata', 'MetadataController@search');

    Route::get('/mygeo_kemaskini_elemen_metadata','MetadataController@kemaskini_elemen_metadata');

    Route::get('/mygeo_pengesahan_metadata','MetadataController@senarai_pengesahan_metadata');

    Route::post('/lihat_metadata','MetadataController@show');
    Route::post('/simpan_kemaskini_metadata','MetadataController@update');

    Route::post('/kemaskini_draf_metadata','MetadataController@edit');
    Route::get('/kemaskini_metadata/{id}','MetadataController@edit');


    Route::post('/lihat_draf_metadata','MetadataController@show_draf');
    Route::post('/simpan_kemaskini_draf_metadata','MetadataController@update_draf');

    Route::post('/delete_draf_metadata','MetadataController@delete_draf');
    Route::post('/delete_metadata','MetadataController@delete');

    Route::get('/landing_mygeo','UserController@show');
    Route::get('/mygeo_profil','UserController@show');

    Route::post('/simpan_metadata_template','MetadataController@simpan_metadata_template');

    Route::get('/lihat_permohonan/{id}', 'DataAsasController@tambah')->name('tambah.permohonan');
    Route::get('/mohon_data', 'DataAsasController@mohon_data');
    Route::post('/simpan_permohonan_baru', 'DataAsasController@store_permohonan_baru');
    Route::post('/simpan_senarai_kawasan', 'DataAsasController@store_senarai_kawasan');
    Route::post('/delete_senarai_kawasan', 'DataAsasController@delete_senarai_kawasan');
    Route::post('/kemaskini_senarai_kawasan', 'DataAsasController@update_senarai_kawasan');

    Route::post('/simpan_penilaian', 'DataAsasController@store_penilaian');

    Route::post('/muatnaik_dokumen', 'DataAsasController@store_dokumen_berkaitan')->name('muatnaikFail');
    Route::post('/kemaksini_dokumen', 'DataAsasController@update_dokumen_berkaitan')->name('updateDokumen');
    Route::post('/delete_dokumen', 'DataAsasController@delete_dokumen_berkaitan');

    Route::get('/mohon_data','DataAsasController@mohon_data');
    Route::get('/mohon_data_asas_baru','DataAsasController@mohon_data_asas_baru');
    Route::post('/delete_permohonan', 'DataAsasController@delete_permohonan');
    Route::post('/hantar_permohonan', 'DataAsasController@hantar_permohonan');
    Route::post('/kemaskini_permohonan', 'DataAsasController@kemaskini_permohonan');
    Route::get('/akuan_pelajar/{id}','DataAsasController@akuan_pelajar');
    Route::post('/simpan_akuan_pelajar', 'DataAsasController@update_akuan_pelajar');
    Route::post('/change_akuan_terima', 'DataAsasController@change_akuan_terima');
    Route::post('/checkThreeHourNotifySelesaiMuatTurun', 'DataAsasController@checkThreeHourNotifySelesaiMuatTurun');
    Route::post('/berjayaMuatTurun', 'DataAsasController@berjayaMuatTurun');
    Route::post('/api/dokumen/akuan_pelajar', 'DataAsasController@generate_pdf_akuan_pelajar');

    Route::get('/surat_balasan/{id}','DataAsasController@surat_balasan');
    Route::post('/simpan_surat_balasan', 'DataAsasController@update_surat_balasan');
    Route::post('/api/dokumen/surat_balasan', 'DataAsasController@generate_pdf_surat_balasan');

    Route::get('/semakan_status','DataAsasController@semakan_status');

    Route::get('/muat_turun_data','DataAsasController@muat_turun_data');
    Route::get('/senarai_data','DataAsasController@senarai_data');
    Route::post('/simpan_senarai_data', 'DataAsasController@store_senarai_data');
    Route::post('/kemaskini_senarai_data', 'DataAsasController@update_senarai_data');
    Route::post('/delete_senarai_data', 'DataAsasController@delete_senarai_data');

    Route::post('/simpan_kategori_senarai_data', 'DataAsasController@store_kategori_senarai_data');
    Route::post('/simpan_subkategori_senarai_data', 'DataAsasController@store_subkategori_senarai_data');

    Route::get('/kategori_kelas_kongsi_data','DataAsasController@kategori_kelas_kongsi_data');
    Route::post('/kemaskini_kelas_kongsi', 'DataAsasController@update_kelas_kongsi');

    Route::get('/permohonan_baru','DataAsasController@permohonan_baru');
    Route::get('/status_permohonan','DataAsasController@status_permohonan');
    Route::get('/penilaian','DataAsasController@penilaian');
    Route::get('/penilaian_pemohon/{id}','DataAsasController@penilaian_pemohon')->name('tambah.penilaian');
    Route::get('/akuan_penerimaan/{id}','DataAsasController@akuan_terima');
    Route::post('/api/dokumens','DataAsasController@api_store_generate_nric')->name('janaSalinanIC');
    Route::post('/api/kemaskini_dokumens','DataAsasController@api_update_generate_nric')->name('kemaskiniSalinanIC');
    Route::post('/api/dokumen/akuan_terima', 'DataAsasController@generate_pdf_akuan_terima');

    Route::get('/proses_data','DataAsasController@proses_data');
    Route::post('/simpan_proses_data','DataAsasController@update_proses_data');

    Route::get('/kemaskini_profil','UserController@edit');
    Route::get('/kemaskini_profil_admin/{id}','UserController@edit_admin');
    Route::post('/simpan_kemaskini_profil','UserController@update_profile');
    Route::post('/simpan_kemaskini_admin','UserController@update_profile_admin');
    Route::post('/simpan_kemaskini_gambarprofil','UserController@update_gambarprofile');
    Route::post('/simpan_kemaskini_gambarprofil_admin','UserController@update_gambarprofile_admin');
    Route::post('/simpan_kemaskini_password','UserController@update_password');
    Route::post('/tambahPenggunaBaru','UserController@tambahPenggunaBaru');

    Route::get('/senarai_agensi_organisasi','PortalController@senarai_agensi_organisasi');
    Route::get('/senarai_bahagian','PortalController@senarai_bahagian');

    Route::get('/portal_tetapan','PortalController@show_portal_tetapan');
    Route::post('/simpan_portal_tetapan','PortalController@update_portal_tetapan');

    Route::get('/pemindahan_akaun','UserController@pemindahan_akaun');

    Route::match(['get','post'],'/audit_trail','PortalController@audit_trail');

    Route::post('/tukar_peranan','UserController@tukar_peranan');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/download_laporan_perincian_metadata','LaporanDashboardController@laporan_perincian_metadata');
    Route::get('/download_laporan_bil_metadata_terbit_ikut_agensi','LaporanDashboardController@laporan_bil_metadata_terbit_ikut_agensi');
    Route::get('/download_laporan_bil_mohon_lulus','LaporanDashboardController@laporan_bil_mohon_lulus');
    Route::get('/download_laporan_bil_mohon_ikut_kategori','LaporanDashboardController@laporan_bil_mohon_ikut_kategori');
    Route::get('/download_laporan_stat_mohon_ikut_tahun','LaporanDashboardController@laporan_stat_mohon_ikut_tahun');
});

Route::get('/send-mail', function () {
    Mail::to('farhan.rimfiel@pipeline-network.com')->send(new MailtrapExample());
    return 'A message has been sent to Ftest!';
});

Route::post('get_roles','RoleController@get_roles');
Route::post('get_user_details','UserController@get_user_details');
Route::post('get_user_details_kemaskini','UserController@get_user_details_kemaskini');
Route::post('get_custom_input_details','MetadataController@get_custom_input_details');
Route::post('user_sahkan','UserController@user_sahkan');
Route::post('user_pengesahan_ditolak','UserController@user_pengesahan_ditolak');
Route::post('metadata_sahkan','MetadataController@metadata_sahkan');
Route::post('metadata_tidak_disahkan','MetadataController@metadata_tidak_disahkan');
Route::post('getUsersByAgensi','UserController@getUsersByAgensi');
Route::post('getMetadataByUser','UserController@getMetadataByUser');
Route::post('simpan_pemindahan_akaun','UserController@simpan_pemindahan_akaun');
Route::post('validateMetadataName','MetadataController@validateMetadataName');
Route::post('simpan_kategori','MetadataController@simpan_kategori');
Route::post('simpan_tajuk','MetadataController@simpan_tajuk');
Route::post('simpan_sub_tajuk','MetadataController@simpan_sub_tajuk');
Route::post('simpan_elemen','MetadataController@simpan_elemen');
Route::post('simpan_custom_input','MetadataController@simpan_custom_input');
Route::post('simpan_kemaskini_custom_input','MetadataController@simpan_kemaskini_custom_input');
Route::post('simpan_agensi_organisasi','PortalController@simpan_agensi_organisasi');
Route::post('simpan_bahagian','PortalController@simpan_bahagian');
Route::post('get_agensi_organisasi_by_sektor','PortalController@get_agensi_organisasi_by_sektor');
Route::post('get_agensi_organisasi','PortalController@get_agensi_organisasi');
Route::post('get_bahagian','PortalController@get_bahagian');
Route::post('simpan_kemaskini_agensi_organisasi','PortalController@simpan_kemaskini_agensi_organisasi');
Route::post('delete_agensi_organisasi','PortalController@delete_agensi_organisasi');
Route::post('getTajukByCategory','MetadataController@getTajukByCategory');
Route::post('getSubTajuk','MetadataController@getSubTajuk');
Route::post('deleteElemenMetadata','MetadataController@deleteElemenMetadata');
Route::post('deleteCustomMetadataInput','MetadataController@deleteCustomMetadataInput');
Route::post('findMetadataByName','MetadataController@findMetadataByName');
Route::post('getKelasKongsis','DataAsasController@getKelasKongsis');
Route::post('/getSenaraiMetadata', 'MetadataController@getSenaraiMetadata');
Route::get('/download_file_contohjenismetadata/{id}', 'MetadataController@download_file_contohjenismetadata');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// =================== Redirect Tooltips =====================

Route::get('lampiran/content_information', function(){return view('tooltips/content_information');});
Route::get('lampiran/title', function(){return view('tooltips/title');});
Route::get('lampiran/abstract', function(){return view('tooltips/abstract');});
Route::get('lampiran/topic_category', function(){return view('tooltips/topic_category');});
Route::get('lampiran/keyword', function(){return view('tooltips/keyword');});
Route::get('lampiran/ordering_instruction', function(){return view('tooltips/ordering_instruction');});
