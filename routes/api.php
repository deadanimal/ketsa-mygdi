<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('ftestdbapi', 'PeopleController@ftestdb');

Route::get('ftestdbapi', 'PeopleController@ftestdb');
Route::get('ftestdbapi2', 'PeopleController@ftestdb2');
Route::get('ftestdbapi3', 'PeopleController@ftestdb3');


Route::get('senarai_metadata', 'MetadataController@index_api');
Route::get('cari_metadata', 'MetadataController@search');
Route::get('create_metadata', 'MetadataController@create');