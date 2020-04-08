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

Route::get('/newgear', 'GearController@index');
Route::post('/newgear', 'GearController@create');
