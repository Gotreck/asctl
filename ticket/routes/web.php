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

Route::get('/login','UserController@index');
Route::get('/register','UserController@create');
Route::post('/login',"UserController@processlogin");
Route::post('/user','UserController@store');
Route::get('/logout','UserController@logout');


