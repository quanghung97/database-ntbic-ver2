<?php
	
	Route::group(['middleware'=>'guest'],function(){
		Route::get('ntbic-admin/dang-nhap','Auth\LoginController@index')->name('login');
		Route::post('ntbic-admin/dang-nhap','Auth\LoginController@login')->name('login');	
	});
	Route::get('kich-hoat-tai-khoan/{token}','Auth\ActiveAccountController@index');
	Route::get('quen-mat-khau','Auth\ForgotPasswordController@index');
	Route::post('quen-mat-khau','Auth\ForgotPasswordController@send_email');
	Route::get('dat-lai-mat-khau/{token}','Auth\ResetPasswordController@index');
	Route::post('dat-lai-mat-khau/{token}','Auth\ResetPasswordController@reset_password');
	// Route::group(['prefix'=>'bien-tap-vien', 'middleware'=>'moderator'], $route_database_manager);
	// Route::group(['prefix'=>'quan-tri-vien', 'middleware'=>'admin'], $route_database_manager);
	Route::group(['prefix'=>'quan-tri-vien', 'middleware'=>'moderator'], function(){
		Route::get('logout','Auth\LogoutController@index')->name('logout');
		Route::group(['prefix'=>'trang-ca-nhan'], function(){
			Route::get('doi-mat-khau','Auth\ChangePasswordController@index');
			Route::post('doi-mat-khau','Auth\ChangePasswordController@change_password');
		});
		Route::get('/','admin\HomeController@index')->name('admin_dashboard');
		Route::group(['prefix'=>'quan-ly-nguoi-dung', 'middleware'=>'admin'],function(){
			Route::get('kich-hoat-tai-khoan/{id}','manager\user_manager\ActiveAccountController@index');
			Route::get('/','manager\user_manager\HomeController@index')->name('home_user_index');
			Route::get('them-nguoi-dung','manager\user_manager\NewUserController@index')->name('new_user_index');
			Route::post('them-nguoi-dung','manager\user_manager\NewUserController@new_user');
			Route::get('xoa-nguoi-dung/{id}','manager\user_manager\DeleteUserController@index');
			Route::get('chinh-sua-nguoi-dung/{id}','manager\user_manager\EditUserController@index')->name('update_user_index');
			Route::post('chinh-sua-nguoi-dung/{id}','manager\user_manager\EditUserController@edit_user');
		});

		Route::group(['prefix'=>'quan-ly-du-lieu'], function(){
			Route::group(['prefix'=>'chuyen-gia'], function(){
				Route::get('/','manager\database_manager\chuyen_gia\HomeController@index')->name('chuyen_gia');
				Route::group(['middleware'=>'insert_chuyen_gia'],function(){
					Route::get('tao-moi','manager\database_manager\chuyen_gia\NewController@index');
					Route::post('tao-moi','manager\database_manager\chuyen_gia\NewController@new_action')->name('them_chuyen_gia');
					Route::post('tao-moi/ajax','manager\database_manager\chuyen_gia\NewController@ajax_new_record');
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
				Route::get('/','manager\database_manager\doanh_nghiep\HomeController@index')->name('doanh_nghiep');
				Route::group(['middleware'=>'insert_doanh_nghiep'],function(){
					Route::get('tao-moi','manager\database_manager\doanh_nghiep\NewController@index');
					Route::post('tao-moi','manager\database_manager\doanh_nghiep\NewController@new_action');
					Route::post('tao-moi/ajax','manager\database_manager\doanh_nghiep\NewController@ajax_new_record');
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
				Route::get('/','manager\database_manager\san_pham\HomeController@index')->name('san_pham');
				Route::group(['middleware'=>'insert_san_pham'],function(){
					Route::get('tao-moi','manager\database_manager\san_pham\NewController@index');
					Route::post('tao-moi','manager\database_manager\san_pham\NewController@new_action')->name('tao-san-pham');
					Route::post('tao-moi/ajax','manager\database_manager\san_pham\NewController@ajax_new_record');
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
				Route::get('/','manager\database_manager\de_tai_du_an_cac_cap\HomeController@index')->name('de_tai_du_an_cac_cap');
				Route::group(['middleware'=>'insert_de_tai_du_an_cac_cap'],function(){
					Route::get('tao-moi','manager\database_manager\de_tai_du_an_cac_cap\NewController@index');
					Route::post('tao-moi','manager\database_manager\de_tai_du_an_cac_cap\NewController@new_action');
					Route::post('tao-moi/ajax','manager\database_manager\de_tai_du_an_cac_cap\NewController@ajax_new_record');
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
				Route::get('/','manager\database_manager\phat_minh\HomeController@index')->name('phat_minh');
				Route::group(['middleware'=>'insert_phat_minh'],function(){
					Route::get('tao-moi','manager\database_manager\phat_minh\NewController@index');
					Route::post('tao-moi','manager\database_manager\phat_minh\NewController@new_action')->name('them_phat_minh');
					Route::post('tao-moi/ajax','manager\database_manager\phat_minh\NewController@ajax_new_record');
				});
				Route::group(['middleware'=>'update_phat_minh'],function(){
					Route::get('sua/{id}','manager\database_manager\phat_minh\EditController@index');
					Route::post('sua/{id}','manager\database_manager\phat_minh\EditController@edit_action')->name('sua_phat_minh');
				});
				Route::group(['middleware'=>'delete_phat_minh'],function(){
					Route::get('xoa/{id}','manager\database_manager\phat_minh\DeleteController@index');
				});
			});
		});
		
	});
?>