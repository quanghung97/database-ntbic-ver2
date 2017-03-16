<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class DeleteUserController extends Controller
{
   	public function index(Request $request)
   	{
   		$user = User::find($request->id);
   		$tmp = $user;
   		if($tmp->count() && $tmp->delete()){
   			return redirect()->route('home_user_index')
   						->withInput(['user_id'=>$user->id,'username'=>$user->username])
   						->with(['success'=>true]);
   		}
   	}
}
