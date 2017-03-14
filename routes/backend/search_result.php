<?php

Route::get('/de-tai-du-an-cac-cap','de_tai_du_an_cac_cap\SearchController@getSearch');
?>

<?php
Route::get('tat-ca','tat_ca\SearchController@index')->name('search_result_chuyen_gia');
Route::get('/chuyen-gia','chuyen_gia\SearchController@getSearch')->name('search_result_chuyen_gia');
Route::get('/san-pham','san_pham\SearchController@getSearch')->name('search_result_san_pham');

Route::get('/phat-minh','phat_minh\SearchController@getSearch')->name('search_result_phat_minh');

Route::get('/doanh-nghiep','doanh_nghiep\SearchController@getSearch')->name('search_result_doanh_nghiep');
?>