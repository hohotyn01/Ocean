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
});
