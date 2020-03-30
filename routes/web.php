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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/gemeentes/{city}/form','CityController@showForm');

Route::get('/gemeentes/{city}','CityController@show');

Route::get('/cms', function () {
    return view('pages.cms.home');
})->middleware('auth');

Route::get('/cms/layers', 'Cms\LayersController@index')->name('cms_layers_index');
Route::get('/cms/layers/create', 'Cms\LayersController@create')->name('cms_layers_create');
Route::post('/cms/layers', 'Cms\LayersController@store')->name('cms_layers_store');
Route::delete('/cms/layers/{layer}', 'Cms\LayersController@destroy')->name('cms_layers_destroy');



Auth::routes();