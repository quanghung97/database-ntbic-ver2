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


include_once 'backend/search_result.php';
include_once 'backend/detail.php';
include_once 'backend/admin.php';
Route::get('/','HomeController@index')->name('home');
Route::post('app/get_captcha',function(){
	return json_encode(Captcha::src());
});
Route::get('abc',function(){
	 return bcrypt('123456');
});
Route::get('404-error', function(){
	return view('errors.404');
})->name('404');
Route::get('permission_denied', function(){
	return view('errors.permission_denied');
})->name('permission_denied');
