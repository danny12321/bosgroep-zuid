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

Route::get('/gemeentes/{city}/form','CityController@showForm');

Route::get('/gemeentes/{city}','CityController@show');

Route::get('/cms', function () {
    return view('pages.cms.home');
})->middleware('auth');

Auth::routes();