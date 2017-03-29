<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Carbon\Carbon;
use App\DatabasePermission;
use App\Http\Controllers\manager\user_manager\NewUserController;
class EditUserController extends NewUserController
{
    public function index(Request $request)
    {
    	$id = $request->id;
    	$input_name = [
            'chuyen_gia_insert',
            'chuyen_gia_update',
            'chuyen_gia_delete',
            'san_pham_insert',
            'san_pham_update',
            'san_pham_delete',
            'doanh_nghiep_insert',
            'doanh_nghiep_update',
            'doanh_nghiep_delete',
            'pmsc_insert',
            'pmsc_update',
            'pmsc_delete',
            'dtda_cac_cap_insert',
            'dtda_cac_cap_update',
            'dtda_cac_cap_delete',
        ];

        $table_name = [
            'chuyen_gia_khcn',
            'chuyen_gia_khcn',
            'chuyen_gia_khcn',
            'san_pham',
            'san_pham',
            'san_pham',
            'doanh_nghiep_khcn',
            'doanh_nghiep_khcn',
            'doanh_nghiep_khcn',
            'bang_phat_minh_sang_che',
            'bang_phat_minh_sang_che',
            'bang_phat_minh_sang_che',
            'de_tai_du_an_cac_cap',
            'de_tai_du_an_cac_cap',
            'de_tai_du_an_cac_cap',
        ];

        $action = [
            'insert',
            'update',
            'delete',
            'insert',
            'update',
            'delete',
            'insert',
            'update',
            'delete',
            'insert',
            'update',
            'delete',
            'insert',
            'update',
            'delete',
        ];

        $check = [];
    	$user = User::find($id);
    	$database_permissions = DatabasePermission::where('user_id',$id)->get();
    	for($i = 0; $i < 15; $i++) { 
    		foreach($database_permissions as $permisstion){
    			if($permisstion->table == $table_name[$i] && $permisstion->action == $action[$i]){
    				$check[$input_name[$i]] = true;
    			}
    		}
    	}
    	return view('user_manager.edit')
    			->with([
    				'user' => $user,
    				'check' => $check,
    				]);
    }

    public function edit_user(Request $request)
    {
    	$user_id = $request->id;
    	$rules = [
            'username' => 'required|max:255|unique:users,username,'.$user_id.'|regex:/(^[A-Za-z0-9 ]+$)+/',
            'email' => 'required|max:255|unique:users,email,'.$user_id,
            'author' => 'required|in:admin,moderator',
        ];

        $messages = [
            'username.required' => 'Chưa nhập tên tài khoản !',
            'username.regex' => 'Tên tài khoản chỉ được chứa kí tự a-z, A-Z, 0-9!',
            'username.max' => 'Tên tài khoản phải dưới 255 kí tự !',
            'username.unique' => 'Tên tài khoản đã tồn tại !',
            'email.required' => 'Chưa nhập Email !',
            'email.max' => 'Email phải dưới 255 kí tự !',
            'email.unique' => 'Email đã tồn tại !',
            'author.required' => 'Chưa chọn quyền !',
            'author.in' => 'Quyền phải là admin hoặc moderator !',
        ];

        $validate = Validator::make($request->all(), $rules, $messages);
    	if($validate->fails()){
    		return redirect()->route('update_user_index',['id'=>$user_id])->withErrors($validate)->withInput();
    	}
    	else {
    		User::find($user_id)->update([
    				'fullname' => $request->fullname,
                    'email' => $request->email,
                    'username' => $request->username,
                    'author' => $request->author,
                    'updated_at' => Carbon::now(),
    			]);
    		if($request->author == 'admin'){
                DatabasePermission::where('user_id',$user_id)->delete();
    		}
    		if($request->author == 'moderator'){
                self::change_permission_database($user_id, $request);
    		}
    		return redirect()->route('update_user_index',['id'=>$user_id])
                                ->withErrors($validate)
                                ->withInput()
                                ->with(['success' => true]);
    	}
    }
}
