<?php
	 //code
Route::group(['prefix'=>'quan-tri-vien', 'middleware'=>'moderator'], function(){
 	Route::group(['prefix'=>'quan-ly-du-lieu'], function(){
 		Route::group(['prefix'=>'san-pham'], function(){
 			Route::post('ajax/them-san-pham','manager\database_manager\san_pham\NewController@add_by_excel');
 		});
	});
 });
?>