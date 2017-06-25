<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Carbon\Carbon;
use App\User;
use App\PasswordReset;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        $row = PasswordReset::where('token',$token);
        if($row->count()){
            return view('auth.ResetPassword');
        }
        else {
            return view('auth.error_token');
        }
    }

    public function reset_password(Request $request, $token)
    {
        $object = PasswordReset::where('token',$token);
        if($object->count()){
            $rules = [
                'captcha' => 'required|captcha',
            ];

            $messages = [
                'captcha.required' => 'Chưa nhập mã bảo mật !',
                'captcha.captcha' => 'Mã bảo mật không đúng !',
            ];

            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else {
                $rules = [
                    'password' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|min:6|max:255',
                    're_password' => 'required|same:password'
                ];

                $messages = [
                    'password.required' => 'Bạn chưa nhập mật khẩu mới !',

                    'password.regex' => 'mật khẩu chỉ được chứa kí tự a-z hoặc A-Z hoặc 0-9 !',
                    'password.min' => 'mật khẩu từ 6 kí tự !',
                    're_password.required' => 'Bạn chưa nhập lại mật khẩu !',
                    're_password.same' => 'Nhập lại mật khẩu không khớp !',
                ];

                $validator = Validator::make($request->all(),$rules,$messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                else {
                    $user_id = $object->first()->user_id;
                    $password = bcrypt($request->password);
                    User::find($user_id)->update(['password'=>$password]);
                    PasswordReset::where('token',$token)->delete();
                    return redirect()->route('login')->with(['success'=>'Đặt lại mật khẩu thành công !']);
                }
            }
        }
    }
   
}
