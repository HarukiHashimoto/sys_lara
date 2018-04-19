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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return redirect('theme');
});

// Route::get('/title', '')->name('title');
//
// Route::get('/build/model/{id}/{user_id}', '')->name('build');

Route::get('theme', 'HomeController@selectTheme')->name('select_theme');

// モデル構築ページ
Route::get('build/ir', 'BuildController@build_smp')->name('build_smp');

Route::get('build/genpatsu', 'BuildController@build_smp')->name('build_smp');

// モデル構築ページ(支援なしver)
Route::get('build/ir_b', 'BuildController@build_b')->name('build_b');

Route::get('build/genpatsu_b', 'BuildController@build_b')->name('build_b');

Route::post('build/save', 'BuildController@save_model')->name('save_model');

Route::post('build/load', 'BuildController@load_model')->name('load_model');

Route::post('build/loadOthers', 'BuildController@load_others_model')->name('load_others_model');


Route::get('obtain/moreSuggestions', 'obtainModelController@more_suggestion')->name('more_suggestion');
