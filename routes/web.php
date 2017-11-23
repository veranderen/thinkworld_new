<?php

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

Route::get('/', 'HomeController@index');
Route::get('/china', 'HomeController@china');
Route::get('/hk', 'HomeController@hk');
Route::get('/data/save', 'DataController@save');
Route::get('/data/sse50Save', 'DataController@sse50Save');
Route::get('/data/hsi_save', 'DataController@hsiSave');
Route::get('/data/fileDownload', 'DataCollectionController@fileDownload');
Route::get('/test', 'HomeController@test');
