<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::middleware('auth')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('todos', 'TodoController');
    Route::resource('projects', 'ProjectController');

    Route::get('/csvDownload', 'UserController@csvDownload')->name('csvDownload');

    Route::get('/time_records', 'timeRecordController@index')->name('time_records.index');

    Route::get('/messages', 'MessageController@index')->name('messages.index');
    Route::get('/messages/trashed', 'MessageController@trashed')->name('messages.trashed');
    Route::get('/messages/{message}', 'MessageController@show')->name('messages.show');
    Route::post('/messages', 'MessageController@store')->name('messages.store');
});


Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
