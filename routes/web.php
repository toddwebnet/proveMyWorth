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


Route::group([
    'prefix' => 'test',
], function () {
    Route::get('/', 'TestController@index');
    Route::get('/testJob', 'TestController@testJob');
    Route::get('/results', 'TestController@results');
    Route::get('/mail', 'TestController@mail');
    Route::get('/mailDispatch', 'TestController@mailDispatch');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
