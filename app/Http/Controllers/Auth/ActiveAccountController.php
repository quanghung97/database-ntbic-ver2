<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActiveAccount;
use App\User;
class ActiveAccountController extends Controller
{
	public function index(Request $request){
		$query = ActiveAccount::where('token',$request->token);
		if($query->count()){
			$user_id  = $query->first()->user_id;
	        $username = User::find($user_id)->username;
	        $query->delete();
			return view('auth.ActiveAccount')->with(['username'=> $username]);
		}
		else {
			return view('auth.error_token');
		}
	}
    
}
