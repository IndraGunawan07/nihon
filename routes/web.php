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
})->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'checkadmin'], function(){
    Route::get('admin/users', 'AdminController@showuser')->name('showusers');
    Route::resource('/admin', 'AdminController');
});

// Route untuk update profile
Route::group(['middleware' => 'auth'], function (){
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');

    Route::patch('profile', 'ProfileController@update')->name('profile.update');

    Route::get('editpass', 'ProfileController@editpass')->name('profile.editpassword');

    Route::patch('editpass', 'ProfileController@updatepass')->name('profile.updatepassword');
});

// Route untuk check username dan secret answer
Route::get('/secret', 'Auth\ForgotPasswordController@index');
Route::post('secret', 'Auth\ForgotPasswordController@checkSecretAnswer')->name('check');

//Route untuk contribute
Route::get('/contribute', 'ContributeController@index')->name('contribute');
//Route untuk post recorded file
Route::post('/contribute', 'ContributeController@saveAudio')->name('saveAudio');


// Route untuk syllable 
Route::resource('/syllable','SyllableController');
// route untuk softdelete syllable 
Route::post('/deleteterms', 'SyllableController@softdeleteterms')->name('deleteterms');
// route untuk update syllable 
Route::post('/update', 'SyllableController@updatesyllable')->name('updateterms');

//Route buat reset password di forgot password
Route::get('/reset', 'Auth\ResetPasswordController@index')->name('reset');
Route::post('reset', 'Auth\ResetPasswordController@confirmPass')->name('confirmpass');

// route buat approve contributor dari admin
Route::post('/approve', 'AdminController@approveContributor')->name('approve');
// route buat approve validator dari admin
Route::post('/validator', 'AdminController@approveValidator')->name('validator');
// route buat add user dari admin
Route::post('/add', 'AdminController@addUser')->name('addUser');
// route buat delete user dari admin
Route::post('/delete', 'AdminController@deleteUser')->name('deleteUser');
// route buat edit user dari admin
Route::post('/edit', 'AdminController@editUser')->name('editUser');

// route untuk validator
Route::get('/validate', 'ValidateController@index')->name('validate');
Route::post('/validate', 'ValidateController@validation')->name('validation');

// Route untuk donation 
Route::resource('/donation','DonationController');

// Route untuk content
Route::resource('/content', 'ContentController')->only(['store', 'edit', 'destroy', 'index']);
Route::post('/editcontent', 'ContentController@contentupdate')->name('updatecontent');

//Route untuk download voice
Route::resource('/vdownload', 'VDownloadController')->only('index');
Route::post('/download', 'VDownloadController@downloadLink')->name('download');
