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
    Route::get('/sentMessage', 'MessageController@sentMessage')->name('messages.sentMessage');
    Route::get('/messages/{message}', 'MessageController@show')->name('messages.show');
    Route::get('/create/messages', 'MessageController@create')->name('messages.create');
    Route::post('/messages', 'MessageController@store')->name('messages.store');
    Route::delete('/messages/{message}', 'MessageController@destroy')->name('messages.destroy');
    Route::post('/messages/{message}', 'MessageController@restore')->name('messages.restore');
    Route::get('/favoriteMessages', 'MessageController@favorite')->name('messages.favorite');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
