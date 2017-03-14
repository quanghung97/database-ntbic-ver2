<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EditController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $data = DB::table('san_pham')->select('ten_san_pham','linh_vuc','dac_diem_noi_bat','mo_ta_chung','quy_trinh_chuyen_giao','kha_nang_ung_dung','anh_san_pham','link','id')->where('id',$id)->first();
        
    	return view('database_manager.san_pham.edit')->with(['datas'=>$data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->id;
        $ten_san_pham = $request->ten_san_pham;
        $linh_vuc = $request->linh_vuc;
        $dac_diem_noi_bat = $request->dac_diem_noi_bat;
        $mo_ta_chung = $request->mo_ta_chung;
        $quy_trinh_chuyen_giao = $request->quy_trinh_chuyen_giao;
        $kha_nang_ung_dung = $request->kha_nang_ung_dung;
        $link = $request->link;
        echo $link;
        
    //file ảnh ko rõ 
        $anh_san_pham = $request->anh_san_pham;
        DB::table('san_pham')->where('id',$id)->update(
                ['link' => $link, 'ten_san_pham' => $ten_san_pham, 'linh_vuc' => $linh_vuc, 'dac_diem_noi_bat' => $dac_diem_noi_bat, 'mo_ta_chung' => $mo_ta_chung, 'quy_trinh_chuyen_giao' => $quy_trinh_chuyen_giao, 'kha_nang_ung_dung' => $kha_nang_ung_dung]
            );
        return redirect()->route('san-pham');
    }
}
