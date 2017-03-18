<?php

namespace App\Http\Controllers\manager\database_manager\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\de_tai_du_an_cac_cap;
use App\DatabasePermission;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
    	$per_page = 10;
    	$can_insert = $can_update = $can_delete = false;
    	$user = Auth::guard()->user();

    	$can_insert = DatabasePermission::where('user_id',$user->id)->where('table','de_tai_du_an_cac_cap')->where('action','insert')->count();
        $can_update = DatabasePermission::where('user_id',$user->id)->where('table','de_tai_du_an_cac_cap')->where('action','update')->count();
        $can_delete = DatabasePermission::where('user_id',$user->id)->where('table','de_tai_du_an_cac_cap')->where('action','delete')->count();

    	if($user->author == 'admin'){
    		$can_insert = $can_update = $can_delete = true;
    	}
    	$result = de_tai_du_an_cac_cap::select('id','ten_de_tai','maso_kyhieu','linh_vuc','co_quan','nam_bat_dau','nam_ket_thuc','chu_nhiem_detai','chuyen_nganh_khcn','link')->paginate($per_page);
    	return view('database_manager.de_tai_du_an_cac_cap.index')
    	->with([
    			'datas'=>$result,
	    		'can_insert' => $can_insert,
	    		'can_update' => $can_update,
	    		'can_delete' => $can_delete,
    		]);
    }
}
