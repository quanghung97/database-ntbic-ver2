<?php

namespace App\Http\Controllers\manager\database_manager\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bang_phat_minh_sang_che;
use App\DatabasePermission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$pm=bang_phat_minh_sang_che::paginate(10);
    	$can_insert = $can_update = $can_delete = false;
    	$user = Auth::guard()->user();

    	$can_insert = DatabasePermission::where('user_id',$user->id)->where('table','bang_phat_minh_sang_che')->where('action','insert')->count();
    	$can_update = DatabasePermission::where('user_id',$user->id)->where('table','bang_phat_minh_sang_che')->where('action','update')->count();
    	$can_delete = DatabasePermission::where('user_id',$user->id)->where('table','bang_phat_minh_sang_che')->where('action','delete')->count();

    	if($user->author == 'admin'){
    		$can_insert = $can_update = $can_delete = true;
    	}
    	return view('database_manager.phat_minh.index')
    		->with([
    			'phat_minh'=>$pm,
	    		'can_insert' => $can_insert,
	    		'can_update' => $can_update,
	    		'can_delete' => $can_delete,
	    	]);
    }
}

