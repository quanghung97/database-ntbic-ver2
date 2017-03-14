<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewController extends Controller
{
     public function index()
    {
    	return view('database_manager.san_pham.new');
    }
    public function new_action(Request $request)
    {
       $ten_san_pham = $request->ten_san_pham;
        $linh_vuc = $request->linh_vuc;
        $dac_diem_noi_bat = $request->dac_diem_noi_bat;
        $mo_ta_chung = $request->mo_ta_chung;
        $quy_trinh_chuyen_giao = $request->quy_trinh_chuyen_giao;
        $kha_nang_ung_dung = $request->kha_nang_ung_dung;
        $link = $request->link;
        
    //file ảnh ko rõ 
        $anh_san_pham = $request->anh_san_pham;
        
        
        if($ten_san_pham != ""){
            san_pham::insert(
                ['link' => $link, 'ten_san_pham' => $ten_san_pham, 'linh_vuc' => $linh_vuc, 'dac_diem_noi_bat' => $dac_diem_noi_bat, 'mo_ta_chung' => $mo_ta_chung, 'quy_trinh_chuyen_giao' => $quy_trinh_chuyen_giao, 'kha_nang_ung_dung' => $kha_nang_ung_dung]
            );
            return redirect()->route('san-pham');//có thể truyền thêm biến báo thành công 
        }
        else 
            return redirect()->route('san-pham');//truyenf thêm biến báo lỗi tùy biến
       
         
        
        
    }
}
