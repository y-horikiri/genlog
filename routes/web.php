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

Route::get('/', 'HomeController@index')
    ->name('index');

Route::get('/newstring', 'StringController@index')
    ->middleware('auth');
Route::post('/newstring', 'StringController@create')
    ->middleware('auth');

Route::get('/newstring/complete', 'StringController@complete')
    ->middleware('auth');

Route::get('/gears/new', 'GearController@index')
    ->middleware('auth');
Route::post('/gears/new', 'GearController@create')
    ->middleware('auth');

Route::get('/gears/new/complete', 'GearController@complete')
    ->middleware('auth');

Route::get('/gears/{id}', 'GearController@show')
    ->middleware('auth');
//Route::post('/gear/{id}', 'GearController@post');

Route::get('/gears/delete/{id}', 'GearController@destroy')
    ->middleware('auth');
Route::get('/gears/edit/{id}', 'GearController@edit')
    ->middleware('auth');
Route::put('/gears/{id}', 'GearController@update')
    ->middleware('auth');

// ログインURL
Route::get('auth/twitter', 'TwitterController@redirectToProvider');
// コールバックURL
Route::get('auth/twitter/callback', 'TwitterController@handleProviderCallback');
// ログアウトURL
Route::get('auth/twitter/logout', 'TwitterController@logout');

Route::get('/privacy-policy', function (){
    return view('pages/privacy_policy');
});
Route::get('/terms', function (){
    return view('pages/terms_of_service');
});
