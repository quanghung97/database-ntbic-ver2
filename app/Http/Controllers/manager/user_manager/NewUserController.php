<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\DatabasePermission;
use Carbon\Carbon;
use App\ActiveAccount;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
class NewUserController extends Controller
{
    public function index(Request $request)
    {
    	return view('user_manager.new');
    }

    public function new_user(Request $request)
    {
        $validate = self::validate_input($request);
    	if($validate->fails()){
    		return redirect()->route('new_user_index')->withErrors($validate)->withInput();
    	}
    	else {
            $token = str_random(255);
            $password = str_random(12);
            $user_id = User::insertGetId([
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'username' => $request->username,
                    'author' => $request->author,
                    'password' => bcrypt($password),
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]);
            ActiveAccount::insert([
                    'user_id' => $user_id,
                    'token' => $token,
                    'expire' => 24,
                    'created_at' => Carbon::now(),
                ]);
    		if($request->author == 'moderator'){
                self::change_permission_database($user_id, $request);
    		}
            Mail::to($request->email)->send(new RegisterMail(
                $request->fullname,
                $request->email,
                $request->username,
                $password,
                url('kich-hoat-tai-khoan/'.$token)
                ));
            return redirect()->route('new_user_index')
                                ->withErrors($validate)
                                ->withInput()
                                ->with(['success' => true]);
    	}
    }

    public function validate_input(Request $request)
    {
        $rules = [
            'username' => 'required|max:255|unique:users,username|regex:/(^[A-Za-z0-9 ]+$)+/',
            'email' => 'required|max:255|unique:users,email',
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

        return $validate;
    }

    public function change_permission_database($user_id, $request)
    {
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
        for($i = 0; $i < 15; $i++){
            if(isset($request->all()[$input_name[$i]])){
                $query = DatabasePermission::where('user_id',$user_id);
                if($query->where('table',$table_name[$i])->where('action',$action[$i])->count() == 0){
                     DatabasePermission::create(['user_id'=>$user_id, 'table'=> $table_name[$i], 'action'=>$action[$i]]);
                }
            }
            else {
                $query = DatabasePermission::where('user_id',$user_id);
                if($query->where('table',$table_name[$i])->where('action',$action[$i])->count()){
                     $query->delete();
                }
            }
        }
    }
}
