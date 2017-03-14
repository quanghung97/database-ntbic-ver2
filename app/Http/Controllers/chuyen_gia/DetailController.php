<?php

namespace App\Http\Controllers\chuyen_gia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\tinh_thanh_pho;
use App\hoc_vi;
use App\ket_qua_nghien_cuu;
use App\cong_trinh_nghien_cuu;
use App\chuyen_gia_khcn;

class DetailController extends Controller
{
    
    
    protected function index($link)
    {
        $tt = tinh_thanh_pho::all();
        $hv = hoc_vi::all();
        /*
            $data_chinh dữ liệu trong bảng chuyen_gia_khcn
            $data_phu1 dữ liệu cong_trinh_nghien_cuu của chuyên gia đó 
            $data_phu2 dữ liệu ket_qua_nghien_cuu của chuyên gia đó 
        */
        $datas = chuyen_gia_khcn::select('id','ho_va_ten','hoc_vi','nam_sinh','chuyen_nganh','co_quan','huong_nghien_cuu','link_anh','Sl_congTrinh_baiBao','tinh_thanh','dia_chi_co_quan')->where('linkid',$link)->first();
        
        $ket_qua_nghien_cuu = ket_qua_nghien_cuu::select('content')->where('id_profile',$datas->id)->get()->toArray();
        
        $cong_trinh_nghien_cuu = cong_trinh_nghien_cuu::select('content')->where('id_profile',$datas->id)->get()->toArray();
        
        return view('details.chuyen_gia')
        ->with([
            'tinh_thanh' => $tt,
            'hoc_vi' => $hv,
            'tinh_thanh_current' => '',
            'hoc_vi_current' => '',
            'tim_theo' => '',
            'datas'=>$datas,
            'ket_qua_nghien_cuu' => $ket_qua_nghien_cuu,
            'cong_trinh_nghien_cuu' => $cong_trinh_nghien_cuu,
            'stt_kqnc' => 0,
            'stt_ctnc' => 0
            ]);
        
    }
    
}
