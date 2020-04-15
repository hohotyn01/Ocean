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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('enter');
Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/settings', 'SettingsController@setting')->name('settings');
    Route::post('/settings/ssh_create', 'SettingsController@createSsh');
    Route::post('/settings/ssh_all', 'SettingsController@findSsh');
    Route::post('/settings/ssh_delete', 'SettingsController@deleteSsh');

    Route::post('/settings/profile_get', 'SettingsController@findProfile');
    Route::post('/settings/profile_update', 'SettingsController@updateProfile');

    Route::post('/settings/token_get', 'SettingsController@findToken');
    Route::post('/settings/token_create', 'SettingsController@createToken');
});
