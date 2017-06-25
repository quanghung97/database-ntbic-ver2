<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$users = DB::table('users')
    	->leftjoin('active_accounts','active_accounts.user_id','=','users.id')
    	->select('users.id','user_id','fullname','email','username','author')
    	->where('users.id','!=',Auth::guard()->user()->id)->paginate(20);
    	return view('user_manager.home')->with(['users'=>$users]);
    }
}
