<?php

namespace App\Http\Controllers\manager\database_manager\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\de_tai_du_an_cac_cap;

class HomeController extends Controller
{
    public function index(){
    	$per_page = 10;
    	$result = de_tai_du_an_cac_cap::select('id','ten_de_tai','maso_kyhieu','linh_vuc','co_quan','nam_bat_dau','nam_ket_thuc','chu_nhiem_detai','chuyen_nganh_khcn')->paginate($per_page);
    	return view('database_manager.de_tai_du_an_cac_cap.index')->with(['datas'=>$result]);
    }
}
