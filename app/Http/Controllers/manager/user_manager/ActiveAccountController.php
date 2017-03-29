<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActiveAccount;
use App\User;
class ActiveAccountController extends Controller
{
    public function index(Request $request){
    	$user_id = $request->id;
		$query = ActiveAccount::where('user_id',$user_id);
		if($query->count()){
	        $username = User::find($user_id)->username;
	        $query->delete();
			return redirect()->back()->with(['success'=> 'Kích hoạt người dùng '.$username.' thành công !']);
		}
		else {
			return view('errors.404');
		}
	}
}
