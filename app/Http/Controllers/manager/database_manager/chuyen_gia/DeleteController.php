<?php

namespace App\Http\Controllers\manager\database_manager\chuyen_gia;
use App\chuyen_gia_khcn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\cong_trinh_nghien_cuu;
use App\ket_qua_nghien_cuu;
class DeleteController extends Controller
{
    public function index($id, Request $request){
    	$cg=chuyen_gia_khcn::find($id);
    	$ctr=cong_trinh_nghien_cuu::where('id_profile',$id);
    	$ctr->delete();
    	$kq=ket_qua_nghien_cuu::where('id_profile',$id);
    	$kq->delete();
    	$cg->delete();
    	return Redirect::back()->with('status', 'Xóa thành công một chuyên gia!');
    }
}
