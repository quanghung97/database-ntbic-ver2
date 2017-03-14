<?php

namespace App\Http\Controllers\tat_ca;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\chuyen_gia_khcn;
use App\de_tai_du_an_cac_cap;
use App\doanh_nghiep_khcn;
use App\bang_phat_minh_sang_che;
use App\san_pham;

class SearchController extends Controller
{
   	public function index(Request $request){
   		$text_search = $request->text_search;
   		$per_page = 5;
   		$chuyen_gia_time_search = -microtime(true);
   		$chuyen_gia = chuyen_gia_khcn::where(function($query) use ($text_search) {
				$query->Where('ho_va_ten','LIKE','%'.$text_search.'%')->orWhere('chuyen_nganh','LIKE','%'.$text_search.'%')->orWhere('huong_nghien_cuu','LIKE','%'.$text_search.'%')->orWhere('co_quan','LIKE','%'.$text_search.'%')->orWhere('nam_sinh','LIKE','%'.$text_search.'%');
			});
   		$chuyen_gia = $chuyen_gia->select('link_anh','ho_va_ten','hoc_vi','co_quan','chuyen_nganh','tinh_thanh','linkid','link_anh')->paginate($per_page);
   		$chuyen_gia_time_search += microtime(true);

   		$de_tai_du_an_cac_cap_time_search = -microtime(true);
   		$de_tai_du_an_cac_cap = de_tai_du_an_cac_cap::where(function($query) use ($text_search){
				$query->where('ten_de_tai','LIKE','%'.$text_search.'%')->orWhere('chu_nhiem_detai','LIKE','%'.$text_search.'%')->orWhere('maso_kyhieu','LIKE','%'.$text_search.'%')->orWhere('co_quan','LIKE','%'.$text_search.'%')->orWhere('mota_chung','LIKE','%'.$text_search.'%')->orWhere('diem_noi_bat','LIKE','%'.$text_search.'%')->orWhere('mota_quytrinh_chuyengiao','LIKE','%'.$text_search.'%');
			});
   		$de_tai_du_an_cac_cap = $de_tai_du_an_cac_cap->select('ten_de_tai','maso_kyhieu','linh_vuc','chu_nhiem_detai','nam_ket_thuc','link','nam_bat_dau','chuyen_nganh_khcn')->paginate($per_page);
   		$de_tai_du_an_cac_cap_time_search += microtime(true);

   		$doanh_nghiep_time_search = -microtime(true);
   		$doanh_nghiep = doanh_nghiep_khcn::where(function($query) use ($text_search){
				$query->where('ten_doanh_nghiep','LIKE','%'.$text_search.'%')->orWhere('san_pham_khcn','LIKE','%'.$text_search.'%')->orWhere('cong_nghe_noi_bat','LIKE','%'.$text_search.'%')->orWhere('huong_nghien_cuu_khcn','LIKE','%'.$text_search.'%')->orWhere('ma_so_doanh_nghiep','LIKE','%'.$text_search.'%')->orWhere('dia_chi','LIKE','%'.$text_search.'%')->orWhere('email','LIKE','%'.$text_search.'%')->orWhere('ten_dai_dien','LIKE','%'.$text_search.'%')->orWhere('nganh_nghe_kinh_doanh','LIKE','%'.$text_search.'%')->orWhere('phone','LIKE','%'.$text_search.'%')->orWhere('fax','LIKE','%'.$text_search.'%');
			});
   		$doanh_nghiep = $doanh_nghiep->join('tinh_thanh_pho','tinh_thanh_pho.id','=','doanh_nghiep_khcn.tinh_thanh_pho')->join('linh_vuc_san_pham','linh_vuc_san_pham.id','=','doanh_nghiep_khcn.linh_vuc')->select('ten_doanh_nghiep','linh_vuc_san_pham.linh_vuc as linh_vuc','dia_chi','tinh_thanh_pho.tinh_thanh_pho as tinh_thanh_pho','xep_hang_trinh_do_khcn','link','logo')->paginate($per_page);
   		$doanh_nghiep_time_search += microtime(true);

   		$bang_phat_minh_sang_che_time_search = -microtime(true);
   		$bang_phat_minh_sang_che = bang_phat_minh_sang_che::where(function($query) use ($text_search){
				$query->where('ten', 'LIKE', '%'.$text_search.'%')->orWhere('diem_noi_bat','LIKE','%'.$text_search.'%')->orWhere('tac_gia', 'LIKE', '%'.$text_search.'%')->orWhere('sobang_kyhieu', 'LIKE', '%'.$text_search.'%')->orWhere('chu_so_huu_chinh', 'LIKE', '%'.$text_search.'%')->orWhere('noidung_cothe_chuyengiao', 'LIKE', '%'.$text_search.'%')->orWhere('thitruong_ungdung', 'LIKE', '%'.$text_search.'%')->orWhere('mota_sangche_phatminh_giaiphap', 'LIKE', '%'.$text_search.'%')->orWhere('ngay_cap', 'LIKE', '%'.$text_search.'%')->orWhere('ngay_cong_bo', 'LIKE', '%'.$text_search.'%');
			});
   		$bang_phat_minh_sang_che = $bang_phat_minh_sang_che->join('loai_phat_minh_sang_che','loai_phat_minh_sang_che.id','=','bang_phat_minh_sang_che.loai_phat_minh_sang_che')->join('linh_vuc_san_pham','bang_phat_minh_sang_che.linh_vuc_khcn','=','linh_vuc_san_pham.id')->select('ten','linh_vuc_san_pham.linh_vuc as linh_vuc','sobang_kyhieu','tac_gia','ngay_cong_bo','loai_phat_minh_sang_che.loai_phat_minh_sang_che as loai_phat_minh_sang_che','link')->paginate($per_page);
   		$bang_phat_minh_sang_che_time_search += microtime(true);

   		$san_pham_time_search = -microtime(true);
   		$san_pham = san_pham::where(function($query) use ($text_search){
				$query->where('ten_san_pham', 'LIKE', '%'.$text_search.'%')->orWhere('kha_nang_ung_dung', 'LIKE', '%'.$text_search.'%')->orWhere('mo_ta_chung', 'LIKE', '%'.$text_search.'%')->orWhere('dac_diem_noi_bat', 'LIKE', '%'.$text_search.'%');
			});
   		$san_pham = $san_pham->join('linh_vuc_san_pham','san_pham.linh_vuc','=','linh_vuc_san_pham.id')->select('ten_san_pham','linh_vuc_san_pham.linh_vuc as linh_vuc','dac_diem_noi_bat','link','anh_san_pham')->paginate($per_page);
   		$san_pham_time_search += microtime(true);

   		return view('search_result.all')->with([
   				'chuyen_gias' => $chuyen_gia,
   				'de_tai_du_an_cac_caps' => $de_tai_du_an_cac_cap,
   				'doanh_nghieps' => $doanh_nghiep,
   				'bang_phat_minh_sang_ches' => $bang_phat_minh_sang_che,
   				'san_phams' => $san_pham,
   				'san_pham_time_search' => $san_pham_time_search,
   				'doanh_nghiep_time_search' => $doanh_nghiep_time_search,
   				'de_tai_du_an_cac_cap_time_search' => $de_tai_du_an_cac_cap_time_search,
   				'chuyen_gia_time_search' => $chuyen_gia_time_search,
   				'bang_phat_minh_sang_che_time_search' => $bang_phat_minh_sang_che_time_search,
   				'text_search' => $text_search,
   			]);
   	}
}
