<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\User;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.ChangePassword');
    }

    public function change_password(Request $request)
    {
        $errors = [];
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min:6|regex:/(^[A-Za-z0-9 ]+$)+/',
            're_new_password' => 'required|same:new_password',
        ];
        $messages = [
            'old_password.required' => 'Chưa nhập mật khẩu cũ !',
            'new_password.required' => 'Chưa nhập mật khẩu mới !',
            'new_password.min' => 'Mật khẩu mới từ 6 kí tự !',
            'new_password.regex' => 'Mật khẩu chỉ được chứa kí tự a-z hoặc A-Z hoặc 0-9 !',
            're_new_password.required' => 'Chưa nhập lại mật khẩu mới !',
            're_new_password.same' => 'Nhập lại mật khẩu không khớp !',
        ];
        
        $validator = Validator::make($request->all(),$rules,$messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $password = Auth::guard()->user()->password;
        if(!Hash::check($request->old_password, $password)){
            return redirect()->back()->withErrors(['old_password'=>'Mật khẩu không đúng !']);
        }
        User::find(Auth::guard()->user()->id)->update(['password'=>bcrypt($request->new_password)]);
        Auth::guard()->logout();
        return redirect()->route('login')->with(['success'=>'Đổi mật khẩu thành công !']);
    }
}
