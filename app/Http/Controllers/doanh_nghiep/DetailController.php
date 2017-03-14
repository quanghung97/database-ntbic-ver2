<?php

namespace App\Http\Controllers\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;

class DetailController extends Controller
{
    protected function index($link)
    {    	
    	$lv = linh_vuc_san_pham::all();
		$tinh_thanh = tinh_thanh_pho::all();
        $data = DB::table('doanh_nghiep_khcn')->join('tinh_thanh_pho','tinh_thanh_pho.id','=','doanh_nghiep_khcn.tinh_thanh_pho')->join('linh_vuc_san_pham','linh_vuc_san_pham.id','=','doanh_nghiep_khcn.linh_vuc')->select('ten_doanh_nghiep','ma_so_doanh_nghiep','logo','ngay_cap_nhat','linh_vuc_san_pham.linh_vuc as linh_vuc','tinh_thanh_pho.tinh_thanh_pho as tinh_thanh_pho','dia_chi','email','phone','fax','website','ma_so_thue','loai_hinh','ngay_dang_ky','ten_dai_dien','dia_chi_dai_dien','email_dai_dien','phone_dai_dien','nganh_nghe_kinh_doanh','thong_tin_thue','van_phong_dai_dien','chi_nhanh','so_quyet_dinh_khcn','thoi_gian_dang_ky_khcn','noi_cap_chung_nhan_khcn','xep_hang_trinh_do_khcn','huong_nghien_cuu_khcn','so_luong_can_bo_khcn','cong_nghe_noi_bat','su_dung_cong_nghe','chuyen_giao_cong_nghe','so_huu_hop_phap','san_pham_khcn')->where('link',$link)->first();
       
        return view('details.doanh_nghiep')->with(['linh_vuc'=>$lv,'tinh_thanh'=>$tinh_thanh,'datas'=>$data]);
    }
}
