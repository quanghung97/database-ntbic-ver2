<?php

namespace App\Http\Controllers\khoa_hoc_cong_nghe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($link)
    {
        //khoa hoc cong nghe lấy id làm link 
        $data = DB::table('khoa_hoc_cong_nghe')->select('chi_so_de_muc','dang_tai_lieu','tac_gia','nhan_de','nguon_trich','nam_xuat_ban','so','trang','issn','tu_khoa','tu_khoa_dia_ly','tom_tat','tom_tat_tieng_anh','ki_hieu_kho')->where('id',$link)->get();
        
        echo "<pre>";
        print_r($data);
         //echo $data[0]->ki_hieu_kho;
        echo "</pre>";
    }
}
