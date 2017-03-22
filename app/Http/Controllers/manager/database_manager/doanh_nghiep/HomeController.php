<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\doanh_nghiep_khcn;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;
use App\DatabasePermission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
    	$per_page = 10;
    	$can_insert = $can_update = $can_delete = false;
    	$user = Auth::guard()->user();

    	$can_insert = DatabasePermission::where('user_id',$user->id)->where('table','doanh_nghiep_khcn')->where('action','insert')->count();
    	$can_update = DatabasePermission::where('user_id',$user->id)->where('table','doanh_nghiep_khcn')->where('action','update')->count();
    	$can_delete = DatabasePermission::where('user_id',$user->id)->where('table','doanh_nghiep_khcn')->where('action','delete')->count();

    	if($user->author == 'admin'){
    		$can_insert = $can_update = $can_delete = true;
    	}
    	$datas = DB::table('doanh_nghiep_khcn')->join('tinh_thanh_pho','tinh_thanh_pho.id','=','doanh_nghiep_khcn.tinh_thanh_pho')->join('linh_vuc_san_pham','linh_vuc_san_pham.id','=','doanh_nghiep_khcn.linh_vuc')->select('doanh_nghiep_khcn.id as id','ten_doanh_nghiep','linh_vuc_san_pham.linh_vuc as linh_vuc','dia_chi','tinh_thanh_pho.tinh_thanh_pho as tinh_thanh_pho','link')->orderBy('id')->paginate($per_page);
    	return view('database_manager.doanh_nghiep.index')
    		->with([
    			'datas'=>$datas,
	    		'can_insert' => $can_insert,
	    		'can_update' => $can_update,
	    		'can_delete' => $can_delete,
	    	]);
    }
}
