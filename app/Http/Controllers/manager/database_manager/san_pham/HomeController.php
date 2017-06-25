<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\DatabasePermission;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $per_page = 10;
       
        $can_insert = $can_update = $can_delete = false;
    	$user = Auth::guard()->user();
    	
    	$can_insert = DatabasePermission::where('user_id',$user->id)->where('table','san_pham')->where('action','insert')->count();
    	$can_update = DatabasePermission::where('user_id',$user->id)->where('table','san_pham')->where('action','update')->count();
    	$can_delete = DatabasePermission::where('user_id',$user->id)->where('table','san_pham')->where('action','delete')->count();

    	if($user->author == 'admin'){
    		$can_insert = $can_update = $can_delete = true;
    	}

        $data = DB::table('san_pham')->join('linh_vuc_san_pham','san_pham.linh_vuc','=','linh_vuc_san_pham.id')->select('ten_san_pham','linh_vuc_san_pham.linh_vuc as linh_vuc','dac_diem_noi_bat','mo_ta_chung','quy_trinh_chuyen_giao','kha_nang_ung_dung','san_pham.id as id','anh_san_pham','link')->orderBy('id')->paginate($per_page);

    	return view('database_manager.san_pham.index')
    		->with([
    			'datas'=>$data,
	    		'can_insert' => $can_insert,
	    		'can_update' => $can_update,
	    		'can_delete' => $can_delete,
	    	]);
    }
}
