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
    return view('home');
});
include_once 'backend/search_result.php';
include_once 'backend/detail.php';
include_once 'backend/admin.php';
Route::post('app/get_captcha',function(){
	return json_encode(Captcha::src());
});

Route::get('abc',function(){
	 return Captcha::img();
});
