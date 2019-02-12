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


Route::get('/event','EventController@index');
Route::get('/event/create','EventController@create');
Route::post('/event','EventController@store');
Route::get('/event/{event}/tickets','EventController@buy');



Route::get('/ticket/create','TicketController@create');
Route::post('/ticket','TicketController@store');

Route::get('/category/create','CategoryController@create');
Route::post('/category','CategoryController@store');