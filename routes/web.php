<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin', 'AdminController');

// Route untuk update profile
Route::group(['middleware' => 'auth'], function (){
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');

    Route::patch('profile', 'ProfileController@update')->name('profile.update');
});

// Route untuk check username dan secret answer
Route::get('/secret', 'Auth\ForgotPasswordController@index');
Route::post('secret', 'Auth\ForgotPasswordController@checkSecretAnswer')->name('check');

Route::get('/contribute', function(){
    return view('layouts.contribute');
});

//Route buat reset password di forgot password
Route::get('/reset', 'Auth\ResetPasswordController@index')->name('reset');
Route::post('reset', 'Auth\ResetPasswordController@confirmPass')->name('confirmpass');

// route approve user
Route::post('/approve', 'AdminController@approve')->name('approve');
