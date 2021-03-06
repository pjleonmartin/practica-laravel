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
    $check = "";
    try {
        $check = \Schema::hasTable('users');
        return view('welcome');
    } catch (Exception $e) {
        return redirect()->route('install.form')
                        ->with(['message_error' => 'You must install the application before using it']);
    }
});

Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');
// Profile & User
Route::get('/profile', 'UserController@configuration')->name('user.configuration');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
Route::get('/profile/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::post('/profile/update', 'UserController@update')->name('user.update');
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
Route::get('/message/write/{id?}', 'MessageController@message_write')->name('message.form');
Route::post('/message/send', 'MessageController@send')->name('message.send');
Route::get('/message/delete/{id}', 'MessageController@delete')->name('message.delete');
// Curriculum
Route::get('/curriculum/edit', 'UserController@curriculum')->name('user.curriculum');
Route::post('/curriculum/edit/update', 'UserController@curriculum_update')->name('user.curriculum_update');
// PDF
Route::get('/pdf/lists', 'UserController@pdflists')->name('pdf.lists');
Route::get('/pdf/lists/activeusers', 'UserController@pdf_activeusers')->name('pdf.activeusers');
Route::get('/pdf/lists/inactiveusers', 'UserController@pdf_inactiveusers')->name('pdf.inactiveusers');
Route::get('/pdf/lists/serverlogs', 'UserController@pdf_logs')->name('pdf.logs');
Route::get('/pdf/curriculum/user/{id}', 'UserController@pdf_curriculum')->name('pdf.curriculum');
// Search
Route::get('/search', 'UserController@search')->name('user.search');
Route::post('/search/send', 'UserController@search_send')->name('user.search_send');
// Mail
Route::get('/mail/write', 'UserController@mail_write')->name('mail.form');
Route::post('/mail/send', 'UserController@mail_send')->name('mail.send');
// Install
Route::get('/install', 'InstallController@install_form')->name('install.form');
Route::post('/install/send', 'InstallController@install')->name('install.send');
