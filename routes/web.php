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

Route::get('/contact', 'ContactController@index')->name('contact');
Route::Post('/contact/send', 'ContactController@send')->name('send');

// Route::get('/gemeentes/{city}/form','MunicipalityController@showForm');
Route::get('/gemeentes/{slug}', 'MunicipalityController@show');

Route::get('/map/{slug}', 'MapController@index')->name('map');

Route::get('/cms', function () {
    return view('pages.cms.home');
})->middleware('auth');



Route::delete('/cms/municipality/{municipality}/selection/{selection}', 'Cms\Selection\SelectionController@destroy')->name('cms_selection_destroy');

Route::get('/cms/municipality/{municipality}/selection/create/folder/{selection?}', 'Cms\Selection\FolderController@create')->name('cms_selection_folder_create');
Route::post('/cms/municipalities/selection/folder/{selection?}', 'Cms\Selection\FolderController@store')->name('cms_layers_folder_store');

Route::get('/cms/municipality/{municipality}/selection/create/layer/{selection?}', 'Cms\Selection\LayerController@create')->name('cms_selection_layer_create');
Route::post('/cms/municipalities/selection/layer/{selection?}', 'Cms\Selection\LayerController@store')->name('cms_selection_layer_store');

Route::get('/cms/municipality/{municipality}', 'Cms\MunicipalityCMSController@show')->name('cms_municipality_show')->middleware('auth');    
Route::get('/cms/municipalities', 'Cms\MunicipalityCMSController@index')->name('cms_municipality_index')->middleware('auth');

Route::get('/cms/municipalities/create', 'Cms\MunicipalityCMSController@create')->name('cms_municipality_create')->middleware('auth');
Route::post('/cms/municipality', 'Cms\MunicipalityCMSController@store')->name('cms_municipality_store')->middleware('auth');
Route::delete('/cms/municipality/{municipality}', 'Cms\MunicipalityCMSController@destroy')->name('cms_municipality_destroy')->middleware('auth');
Route::get('/cms/municipality/{municipality}/edit', 'Cms\MunicipalityCMSController@edit')->name('cms_municipality_edit')->middleware('auth');
Route::put('/cms/municipality/{municipality}', 'Cms\MunicipalityCMSController@update')->name('cms_municipality_update')->middleware('auth');

Route::get('/cms/municipality/{municipality}/layers/create', 'Cms\LayersController@create')->name('cms_layers_create');
Route::post('/cms/municipalities/layers', 'Cms\LayersController@store')->name('cms_layers_store');
Route::delete('/cms/municipality/{municipality}/layers/{layer}', 'Cms\LayersController@destroy')->name('cms_layers_destroy');

Route::get('/cms/municipality/{municipality}/measure/create', 'Cms\MeasuresController@create')->name('cms_measure_create');
Route::post('/cms/municipalities/measure', 'Cms\MeasuresController@store')->name('cms_measure_store');
Route::delete('/cms/municipality/{municipality}/measure/{measure}', 'Cms\MeasuresController@destroy')->name('cms_measure_destroy');
Route::get('/cms/municipality/{measure}/measure/edit', 'Cms\MeasuresController@edit')->name('cms_measure_edit')->middleware('auth');
Route::put('/cms/municipality/{measure}/measure', 'Cms\MeasuresController@update')->name('cms_measure_update')->middleware('auth');

Auth::routes();