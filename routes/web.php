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
Route::get('/senarai_metadata_nologin','MetadataController@index_nologin');
Route::post('/carian_metadata_nologin','MetadataController@search_nologin');
Route::post('/lihat_metadata_nologin','MetadataController@show_nologin');
Route::post('/lihat_xml_nologin','MetadataController@show_xml_nologin');

Route::post('/loginf','AuthController@authenticate');
//Route::post('/registerf','RegisterController@create');

Route::get('/soalan_lazim','PortalController@index_faq');
Route::get('/mengenai_mygeo_explorer', function () {
    return view('mengenai_mygeo_explorer');
});

Route::get('/','HomeController@index');
//Route::get('/', function () {
//    return view('mygeo.profil');
//});

Route::get('/senarai_pengumuman','PortalController@index_pengumuman');
Route::post('/tunjuk_pengumuman','PortalController@show_pengumuman');
Route::post('/kemaskini_pengumuman','PortalController@edit_pengumuman');
Route::post('/simpan_pengumuman','PortalController@update_pengumuman');
Route::post('/buang_pengumuman','PortalController@delete_pengumuman');

Route::group(['middleware'=>['auth']], function(){
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

    Route::get('/portal_settings','PortalController@index_portal_settings');
    Route::post('/simpan_portal_settings','PortalController@store_portal_settings');

    Route::get('/maklum_balas','PortalController@index_maklum_balas');
    Route::post('/simpan_maklum_balas','PortalController@store_maklum_balas');

    Route::get('/hubungi_kami','PortalController@index_hubungi_kami');
    Route::post('/simpan_hubungi_kami','PortalController@store_hubungi_kami');

    Route::get('/panduan_pengguna','PortalController@index_panduan_pengguna');
    Route::post('/simpan_panduan_pengguna','PortalController@store_panduan_pengguna');

    Route::get('/penafian','PortalController@index_penafian');
    Route::post('/simpan_penafian','PortalController@store_penafian');

    Route::get('/penyataan_privasi','PortalController@index_penyataan_privasi');
    Route::post('/simpan_penyataan_privasi','PortalController@store_penyataan_privasi');

    Route::post('/simpan_soalan_lazim','PortalController@store_faq');

    Route::get('/mygeo_pengisian_metadata','MetadataController@create');
    Route::post('/store_metadata','MetadataController@store');
    Route::post('/muat_naik_xml','MetadataController@store_xml');

    Route::get('/mygeo_senarai_metadata','MetadataController@index');
    Route::post('/carian_metadata','MetadataController@search');

    Route::get('/mygeo_senarai_draf_metadata','MetadataController@index_draf');
    
    Route::get('/mygeo_pengesahan_metadata','MetadataController@senarai_pengesahan_metadata');
    
    Route::post('/lihat_metadata','MetadataController@show');
    Route::post('/simpan_kemaskini_metadata','MetadataController@update');
        
    Route::post('/kemaskini_draf_metadata','MetadataController@edit');
    Route::post('/kemaskini_metadata','MetadataController@edit');

    Route::post('/lihat_draf_metadata','MetadataController@show_draf');
    Route::post('/simpan_kemaskini_draf_metadata','MetadataController@update_draf');
    
    Route::post('/delete_draf_metadata','MetadataController@delete_draf');
    Route::post('/delete_metadata','MetadataController@delete');

    Route::get('/landing_mygeo','UserController@show');
    Route::get('/mygeo_profil','UserController@show');

    Route::get('/kemaskini_profil','UserController@edit'); 
    Route::post('/simpan_kemaskini_profil','UserController@update_profile');
    Route::post('/simpan_kemaskini_password','UserController@update_password');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

Route::get('/send-mail', function () {
    Mail::to('farhan.rimfiel@pipeline-network.com')->send(new MailtrapExample()); 
    return 'A message has been sent to Ftest!';
});

Route::post('get_roles','RoleController@get_roles');
Route::post('get_user_details','UserController@get_user_details');
Route::post('user_sahkan','UserController@user_sahkan');
Route::post('user_pengesahan_ditolak','UserController@user_pengesahan_ditolak');
Route::post('metadata_sahkan','MetadataController@metadata_sahkan');
Route::post('metadata_tidak_disahkan','MetadataController@metadata_tidak_disahkan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
