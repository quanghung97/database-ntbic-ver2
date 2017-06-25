<?php
	//code
Route::get('de-tai-du-an','de_tai_du_an\SearchController@getSearch');
Route::get('khoa-hoc-cong-nghe','khoa_hoc_cong_nghe\SearchController@getSearch');
Route::group(['prefix'=>'quan-tri-vien', 'middleware'=>'moderator'], function(){
	Route::group(['prefix'=>'quan-ly-du-lieu'], function(){
		Route::group(['prefix'=>'doanh-nghiep'], function(){
			Route::post('ajax/them-doanh-nghiep','manager\database_manager\doanh_nghiep\NewController@add_by_excel');
		});
	});
});
?>