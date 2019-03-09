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


Route::get('/mail', 'MailController@sendEmail');
// Route qui permet de connaître la langue active
Route::get('locale', 'LocalizationController@getLang')->name('getlang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang')->name('setlang');



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

Route::get('/guest/create','GuestController@create');
Route::get('/guest/{guest}','GuestController@index');
Route::post('/guest','GuestController@store');

Route::get('/training/create','TrainingController@create');
Route::post('/trainig','TrainingController@store');

Route::get('/category/create','CategoryController@create');
Route::post('/category','CategoryController@store');


Route::get('/order','OrderController@index');
Route::get('/order/old','OrderController@old');
Route::put('/order/add','OrderController@addTicket');
Route::put('/order/delete','OrderController@deleteTicket');
Route::put('/order/validate','OrderController@validateOrder');

Route::get('/order/pdf/{order}', 'OrderController@orderPdf');



Route::get('/admin/{ticket}/validate','AdminController@edit');
Route::get('/admin/{ticket}/rollback','AdminController@back');
Route::get('/admin','AdminController@index');



Route::get('/','EventController@welcome');
Route::post('/','EventController@welcome_display');


