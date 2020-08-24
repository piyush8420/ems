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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::resource('event','EventController');
Route::resource('notify','NotifyController');
Route::get('/', 'HomeController@index')->name('home');
Route::post('setnotify', 'EventController@notify');
Route::post('delete', 'EventController@delete');
Route::post('log_delete', 'EventController@log_delete')->name('event.log_delete');
Route::post('store_notify_mode', 'EventController@store_notify_mode')->name('event.store_notify_mode');

//Route::any('setnotify', 'EventController@notify')->name('setnotify');
