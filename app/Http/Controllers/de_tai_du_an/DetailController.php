<?php

namespace App\Http\Controllers\de_tai_du_an;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($link)
    {
        $data = DB::table('de_tai_du_an')->select('ma_so_de_tai','tinh','ten_bao_cao','co_quan_chu_tri','cap_quan_ly_de_tai','co_quan_quan_ly_de_tai','linh_vuc_nghien_cuu','thoi_gian_bat_dau','thoi_gian_ket_thuc','kinh_phi','tom_tat','tu_khoa','trang_thai')->where('link',$link)->get();
        
        return view('details.de_tai_du_an')->with(['de_tai_du_an' => $data]);
    }
}
