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
    return view('createEmails');
});

Route::get('create-email-form', function () {
    return view('createEmails');
});

Route::get('type-message', function () {
    return view('sendEmail');
});

// ============= Controller Routes ============= //

Route::post('create-email','Api\EmailsController@create');
Route::post('send-mail','Api\EmailsController@sendMails');
Route::get('show-emails','Api\EmailsController@show');
Route::get('delete-email/{id}','Api\EmailsController@delete');



