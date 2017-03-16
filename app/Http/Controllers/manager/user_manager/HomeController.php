<?php

namespace App\Http\Controllers\manager\user_manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class HomeController extends Controller
{
    public function index()
    {
    	$users = User::select('id','username','author')->paginate(20);
    	return view('user_manager.home')->with(['users'=>$users]);
    }
}
