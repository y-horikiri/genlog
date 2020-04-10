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

Route::get('/', 'HomeController@index');

Route::get('/newstring', 'StringController@index');
Route::post('/newstring', 'StringController@create');

Route::get('/newstring/complete', 'StringController@complete');

Route::get('/gear/new', 'GearController@index');
Route::post('/gear/new', 'GearController@create');

Route::get('/gear/new/complete', 'GearController@complete');

Route::get('/gear/{id}', 'GearController@show');
//Route::post('/gear/{id}', 'GearController@post');

Route::get('/gear/delete/{id}', 'GearController@destroy');
Route::get('/gear/edit/{id}', 'GearController@edit');
Route::put('/gear/{id}', 'GearController@update');
