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

Route::get('/gears/new', 'GearController@index');
Route::post('/gears/new', 'GearController@create');

Route::get('/gears/new/complete', 'GearController@complete');

Route::get('/gears/{id}', 'GearController@show');
//Route::post('/gear/{id}', 'GearController@post');

Route::get('/gears/delete/{id}', 'GearController@destroy');
Route::get('/gears/edit/{id}', 'GearController@edit');
Route::put('/gears/{id}', 'GearController@update');
