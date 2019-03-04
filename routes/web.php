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
// Profile & User
Route::get('/profile', 'UserController@configuration')->name('user.configuration');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
Route::get('profile/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::post('/profile/update', 'UserController@update')->name('user.update');
Route::get('/profile/curriculumvitae', 'UserController@curriculumvitae')->name('user.curriculumvitae');
Route::post('/profile/curriculumvitae/update', 'UserController@curriculumvitae_update')->name('user.curriculumvitae_update');
// ADMIN
Route::get('/admin/editprofile/{id}', 'UserController@admin_editprofile')->name('user.admin_editprofile');
Route::post('/admin/editprofile/update', 'UserController@admin_updateprofile')->name('user.admin_updateprofile');
Route::get('/admin/panel', 'UserController@admin_panel')->name('user.admin_panel');
Route::get('/admin/userlist/active', 'UserController@active_list')->name('user.active_list');
Route::get('/admin/userlist/inactive', 'UserController@inactive_list')->name('user.inactive_list');
Route::get('/admin/userdelete/{id}', 'UserController@delete')->name('user.delete');
Route::get('/admin/useractivate/{id}', 'UserController@activate')->name('user.activate');
Route::get('/admin/user/new', 'UserController@create')->name('user.create');
Route::post('/admin/user/new/insert', 'UserController@insert')->name('user.insert');
Route::get('/admin/logs', 'UserController@logs')->name('user.logs');
// Message
Route::get('/message/received', 'MessageController@message_received')->name('message.received');
Route::get('/message/sent', 'MessageController@message_sent')->name('message.sent');
Route::get('/message/write', 'MessageController@message_write')->name('message.form');
Route::post('/message/send', 'MessageController@send')->name('message.send');
Route::get('/message/delete/{id}', 'MessageController@delete')->name('message.delete');
