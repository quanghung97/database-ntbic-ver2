<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\DatabasePermission;
use App\ActiveAccount;
use App\PasswordReset;
class DeleteUserController extends Controller
{
   	public function index(Request $request)
   	{
   		$user = User::find($request->id);
   		$tmp = $user;
         $active_account = ActiveAccount::where('user_id',$request->id);
         $password_reset = PasswordReset::where('user_id',$request->id);
   		
         if($active_account->count()){
            $active_account->delete();
         }
         if($password_reset->count()){
            $password_reset->delete();
         }
         if($tmp->count()){
            $tmp->delete();
         }
         return redirect()->route('home_user_index')
                     ->withInput(['user_id'=>$user->id,'username'=>$user->username])
                     ->with(['success'=>'Xóa người dùng '.$user->username.' thành công !']);
   	}
}
