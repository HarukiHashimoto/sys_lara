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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/title', '')->name('title');
//
// Route::get('/build/model/{id}/{user_id}', '')->name('build');

Route::get('build/sample', 'BuildController@build_smp')->name('build_smp');

Route::post('build/save', 'BuildController@save_model')->name('save_model');

Route::post('build/load', 'BuildController@load_model')->name('load_model');

Route::get('build/loadOthers', 'BuildController@load_others_model')->name('load_others_model');
