<?php
	
	
	Route::get('dang-nhap','Auth\LoginController@index')->name('login');
	Route::post('dang-nhap','Auth\LoginController@login')->name('login');
	// Route::group(['prefix'=>'bien-tap-vien', 'middleware'=>'moderator'], $route_database_manager);
	// Route::group(['prefix'=>'quan-tri-vien', 'middleware'=>'admin'], $route_database_manager);
	Route::group(['prefix'=>'quan-tri-vien', 'middleware'=>'admin'], function(){
		Route::get('/','admin\HomeController@index');
		Route::group(['prefix'=>'quan-ly-nguoi-dung'],function(){
			Route::get('/','manager\user_manager\HomeController@index');
			Route::get('them-nguoi-dung','manager\user_manager\NewUserController@index');
			Route::post('them-nguoi-dung','manager\user_manager\NewUserController@new_user');
			Route::get('xoa-nguoi-dung/{id}','manager\user_manager\DeleteUserController@index');
			Route::get('chinh-sua-nguoi-dung/{id}','manager\user_manager\EditUserController@index');
			Route::post('chinh-sua-nguoi-dung/{id}','manager\user_manager\EditUserController@edit_user');
		});
	});

	Route::group(['prefix'=>'bien-tap-vien', 'middleware'=>'moderator'], function(){
		Route::get('/','moderator\HomeController@index');
	});

	$route_database_manager = function(){
		//Admin and moderator can do it
		Route::group(['prefix'=>'chuyen-gia'], function(){
			Route::get('/','manager\database_manager\chuyen_gia\HomeController@index')->name('chuyen_gia');
			Route::group(['middleware'=>'insert_chuyen_gia'],function(){
				Route::get('tao-moi','manager\database_manager\chuyen_gia\NewController@index');
				Route::post('tao-moi','manager\database_manager\chuyen_gia\NewController@new_action')->name('them_chuyen_gia');
			});
			Route::group(['middleware'=>'delete_chuyen_gia'],function(){
				Route::get('xoa/{id}','manager\database_manager\chuyen_gia\DeleteController@index');
			});
			Route::group(['middleware'=>'update_chuyen_gia'],function(){
				Route::get('sua/{id}','manager\database_manager\chuyen_gia\EditController@index');
				Route::post('sua/{id}','manager\database_manager\chuyen_gia\EditController@edit_action')->name('sua_chuyen_gia');
			});
		});

		Route::group(['prefix'=>'doanh-nghiep'], function(){
			Route::get('/','manager\database_manager\doanh_nghiep\HomeController@index');
			Route::group(['middleware'=>'insert_doanh_nghiep'],function(){
				Route::get('tao-moi','manager\database_manager\doanh_nghiep\NewController@index');
				Route::post('tao-moi','manager\database_manager\doanh_nghiep\NewController@new_action');
			});
			Route::group(['middleware'=>'update_doanh_nghiep'],function(){
				Route::get('sua/{id}','manager\database_manager\doanh_nghiep\EditController@index');
				Route::post('sua/{id}','manager\database_manager\doanh_nghiep\EditController@edit_action');
			});
			Route::group(['middleware'=>'delete_doanh_nghiep'],function(){
				Route::get('xoa/{id}','manager\database_manager\doanh_nghiep\DeleteController@index');
			});
		});

		Route::group(['prefix'=>'san-pham'], function(){
			Route::get('/','manager\database_manager\san_pham\HomeController@index')->name('san-pham');
			Route::group(['middleware'=>'insert_san_pham'],function(){
				Route::get('tao-moi','manager\database_manager\san_pham\NewController@index');
				Route::post('tao-moi','manager\database_manager\san_pham\NewController@new_action')->name('tao-san-pham');
			});
			Route::group(['middleware'=>'udpate_san_pham'],function(){
				Route::get('sua/{id}','manager\database_manager\san_pham\EditController@index');
				Route::post('sua','manager\database_manager\san_pham\EditController@edit_action')->name('sua-san-pham');
			});
			Route::group(['middleware'=>'delete_san_pham'],function(){
				Route::get('xoa/{id}','manager\database_manager\san_pham\DeleteController@index');
			});	
		});

		Route::group(['prefix'=>'de-tai-du-an-cac-cap'], function(){
			Route::get('/','manager\database_manager\de_tai_du_an_cac_cap\HomeController@index');
			Route::group(['middleware'=>'insert_de_tai_du_an_cac_cap'],function(){
				Route::get('tao-moi','manager\database_manager\de_tai_du_an_cac_cap\NewController@index');
				Route::post('tao-moi','manager\database_manager\de_tai_du_an_cac_cap\NewController@new_action');
			});
			Route::group(['middleware'=>'delete_de_tai_du_an_cac_cap'],function(){
				Route::get('xoa/{id}','manager\database_manager\de_tai_du_an_cac_cap\DeleteController@index');
			});
			Route::group(['middleware'=>'update_de_tai_du_an_cac_cap'],function(){
				Route::get('sua/{id}','manager\database_manager\de_tai_du_an_cac_cap\EditController@index');
				Route::post('sua/{id}','manager\database_manager\de_tai_du_an_cac_cap\EditController@edit_action');
			});
		});

		Route::group(['prefix'=>'phat-minh'], function(){
			Route::get('/','manager\database_manager\phat_minh\HomeController@index');
			Route::group(['middleware'=>'insert_phat_minh'],function(){
				Route::get('tao-moi','manager\database_manager\phat_minh\NewController@index');
				Route::post('tao-moi','manager\database_manager\phat_minh\NewController@new_action');
			});
			Route::group(['middleware'=>'update_phat_minh'],function(){
				Route::get('sua/{id}','manager\database_manager\phat_minh\EditController@index');
				Route::post('sua/{id}','manager\database_manager\phat_minh\EditController@edit_action');
			});
			Route::group(['middleware'=>'delete_phat_minh'],function(){
				Route::get('xoa/{id}','manager\database_manager\phat_minh\DeleteController@index');
			});
		});
	};

	Route::group(['prefix'=>'bien-tap-vien/quan-ly-du-lieu', 'middleware'=>'moderator'], $route_database_manager);
	Route::group(['prefix'=>'quan-tri-vien/quan-ly-du-lieu', 'middleware'=>'admin'], $route_database_manager);
?>