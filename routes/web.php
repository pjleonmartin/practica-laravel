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

Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');
// Profile
Route::get('/profile', 'UserController@configuration')->name('user.configuration');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
Route::get('profile/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::post('/profile/update', 'UserController@update')->name('user.update');
// Message
Route::get('/message/received', 'MessageController@message_received')->name('message.received');
Route::get('/message/sent', 'MessageController@message_sent')->name('message.sent');
Route::get('/message/write', 'MessageController@message_write')->name('message.form');
Route::post('/message/send', 'MessageController@send')->name('message.send');
Route::get('/message/delete/{id}', 'MessageController@delete')->name('message.delete');
