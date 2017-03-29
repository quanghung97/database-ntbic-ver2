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

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.ForgotPassword');
    }
    public function send_email(Request $request)
    {
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
                'email' => 'required|exists:users,email',
            ];

            $messages = [
                'email.required' => 'Bạn chưa nhập email !',
                'email.exists' => 'Email không tồn tại trong hệ thống !',
            ];

            $validator = Validator::make($request->all(),$rules,$messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else {
                $email = $request->email;
                $user = User::where('email',$email)->first();
                $user_id = $user->id;
                $check_exists = PasswordReset::where('user_id',$user_id)->count();
                $token = str_random(255);
                //nếu chưa có token thì insert
                if($check_exists == 0){
                    PasswordReset::insert([
                        'token' => $token,
                        'user_id' => $user_id,
                        'expire' => 24,
                        'created_at' => Carbon::now(),
                    ]);
                }
                //nếu có thì update token mới
                else {
                    PasswordReset::where('user_id',$user_id)->update(['token'=>$token]);
                }
                Mail::to($email)->send(new PasswordResetMail(
                    $user->fullname,
                    $user->username,
                    $email,
                    url('dat-lai-mat-khau/'.$token)
                ));

                return view('auth.complete_send_email')->with([
                    'email'=>$email
                ]);
            }
        }
    }
}
