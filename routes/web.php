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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
|--------------------------------------------------------------------------
| Sanborns storeChargesReturns
|--------------------------------------------------------------------------
|
|
*/
Route::get('/', 'ChargesReturnsController@index')->name('index');
Route::post('/storechargesreturns', 'ChargesReturnsController@storeChargesReturns')->name('ChargesReturnsImport');
Route::post('/search', 'ChargesReturnsController@search')->name('Search');
Route::post('searchdetails/', 'ChargesReturnsController@searchDetails')->name('SearchDetails');

