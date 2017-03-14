
<?php

Route::group(['prefix'=>'de-tai-du-an-cac-cap'], function(){
    Route::get('{link}','de_tai_du_an_cac_cap\DetailController@index');
    
});

Route::group(['prefix'=>'phat-minh'], function(){
    Route::get('{link}','phat_minh\DetailController@index');
    
});

Route::group(['prefix'=>'san-pham'], function(){
    Route::get('{link}','san_pham\DetailController@index');
    
});

Route::group(['prefix'=>'doanh-nghiep'], function(){
    Route::get('{link}','doanh_nghiep\DetailController@index');
    
});

Route::group(['prefix'=>'de-tai-du-an'], function(){
    Route::get('{link}','de_tai_du_an\DetailController@index');
    
});

//khoa hoc cong nghe lấy id làm link 
Route::group(['prefix'=>'khoa-hoc-cong-nghe'], function(){
    Route::get('{link}','khoa_hoc_cong_nghe\DetailController@index');
    
});
//về phần chuyên gia khcn mô hình CSDL em thấy chưa rõ anh Hải xem giúp em nhé
Route::group(['prefix'=>'chuyen-gia'], function(){
    Route::get('{link}','chuyen_gia\DetailController@index');
    
});
?>