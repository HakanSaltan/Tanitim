<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::prefix('admin')->group(function () {
	Route::get('/', 'AdminController@index');
	Route::get('/sayfalar', 'AdminController@index');
	Route::get('/sayfalarApi', 'AdminController@sayfalarApi');
	Route::get('/sayfalarFiltreApi/{status?}', 'AdminController@sayfalarFiltreApi');
	Route::post('/sayfalar/ekleApi', 'AdminController@ekleApi');
	Route::post('/sayfalar/guncelleApi', 'AdminController@guncelleApi');
	Route::post('/sayfalar/silApi', 'AdminController@silApi');


	Route::get('/ayarlar', 'AyarlarController@ayarlarIndex');
	Route::get('/ayarApi', 'AyarlarController@ayarApi');
	Route::get('/ayarFiltreApi/{status?}', 'AyarlarController@ayarFiltreApi');
	Route::post('/ayar/ekleApi', 'AyarlarController@ayarEkleApi');
	Route::post('/ayar/guncelleApi', 'AyarlarController@ayarGuncelleApi');
	Route::post('/ayar/silApi', 'AyarlarController@ayarSilApi');

});

