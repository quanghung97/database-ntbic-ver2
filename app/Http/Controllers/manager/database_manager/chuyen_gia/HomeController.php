<?php

namespace App\Http\Controllers\manager\database_manager\chuyen_gia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\chuyen_gia_khcn;
use App\DatabasePermission;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
    	$cg=chuyen_gia_khcn::paginate(10);
    	$can_insert = $can_update = $can_delete = false;
    	$user = Auth::guard()->user();
    	$can_insert = DatabasePermission::where('user_id',$user->id)->where('table','chuyen_gia_khcn')->where('action','insert')->count();
    	$can_update = DatabasePermission::where('user_id',$user->id)->where('table','chuyen_gia_khcn')->where('action','update')->count();
    	$can_delete = DatabasePermission::where('user_id',$user->id)->where('table','chuyen_gia_khcn')->where('action','delete')->count();

    	if($user->author == 'admin'){
    		$can_insert = $can_update = $can_delete = true;
    	}
    	return view('database_manager.chuyen_gia.index')->with([
	    		'chuyen_gia'=>$cg,
	    		'can_insert' => $can_insert,
	    		'can_update' => $can_update,
	    		'can_delete' => $can_delete,
    		]);
    }
}
