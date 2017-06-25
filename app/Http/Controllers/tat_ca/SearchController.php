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
         $text_search = mb_strtolower($text_search);
         $text_searchs = explode(' ', $text_search);
   		$per_page = 5;
         // start search chuyen gia
   		$chuyen_gia_time_search = -microtime(true);
   		$chuyen_gia = chuyen_gia_khcn::whereRaw('
               LOWER(ho_va_ten) LIKE BINARY "%'.$text_search.'%" 
               or LOWER(chuyen_nganh) LIKE BINARY "%'.$text_search.'%"
               or LOWER(huong_nghien_cuu) LIKE BINARY "%'.$text_search.'%"
               or LOWER(co_quan) LIKE BINARY "%'.$text_search.'%"
               ');
         $chuyen_gia = self::orWhereTextSearchs($chuyen_gia, $text_searchs, 'ho_va_ten');
         $chuyen_gia = self::orWhereTextSearchs($chuyen_gia, $text_searchs, 'chuyen_nganh');
         $chuyen_gia = self::orWhereTextSearchs($chuyen_gia, $text_searchs, 'huong_nghien_cuu');
         $chuyen_gia = self::orWhereTextSearchs($chuyen_gia, $text_searchs, 'co_quan');  
   		$chuyen_gia = $chuyen_gia->select('link_anh','ho_va_ten','hoc_vi','co_quan','chuyen_nganh','tinh_thanh','linkid','link_anh')->paginate($per_page);
   		$chuyen_gia_time_search += microtime(true);
         //end search chuyen gia

         // start search de_tai_du_an_cac_cap
   		$de_tai_du_an_cac_cap_time_search = -microtime(true);
   		$de_tai_du_an_cac_cap = de_tai_du_an_cac_cap::whereRaw('
               LOWER(ten_de_tai) LIKE BINARY "%'.$text_search.'%" 
               or LOWER(chu_nhiem_detai) LIKE BINARY "%'.$text_search.'%"
               or LOWER(maso_kyhieu) LIKE BINARY "%'.$text_search.'%"
               or LOWER(co_quan) LIKE BINARY "%'.$text_search.'%"
               or LOWER(mota_chung) LIKE BINARY "%'.$text_search.'%"
               or LOWER(diem_noi_bat) LIKE BINARY "%'.$text_search.'%"
               or LOWER(mota_quytrinh_chuyengiao) LIKE BINARY "%'.$text_search.'%"
               ');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'ten_de_tai');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'chu_nhiem_detai');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'maso_kyhieu');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'co_quan');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'mota_chung');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'diem_noi_bat');
         $de_tai_du_an_cac_cap = self::orWhereTextSearchs($de_tai_du_an_cac_cap, $text_searchs, 'mota_quytrinh_chuyengiao');
   		$de_tai_du_an_cac_cap = $de_tai_du_an_cac_cap->select('ten_de_tai','maso_kyhieu','linh_vuc','chu_nhiem_detai','nam_ket_thuc','link','nam_bat_dau','chuyen_nganh_khcn')->paginate($per_page);
   		$de_tai_du_an_cac_cap_time_search += microtime(true);
         // end search de_tai_du_an_cac_cap

         // start search doanh_nghiep
   		$doanh_nghiep_time_search = -microtime(true);
   		$doanh_nghiep = doanh_nghiep_khcn::whereRaw('
               LOWER(ten_doanh_nghiep) LIKE BINARY "%'.$text_search.'%" 
               or LOWER(san_pham_khcn) LIKE BINARY "%'.$text_search.'%"
               or LOWER(cong_nghe_noi_bat) LIKE BINARY "%'.$text_search.'%"
               or LOWER(huong_nghien_cuu_khcn) LIKE BINARY "%'.$text_search.'%"
               or LOWER(ma_so_doanh_nghiep) LIKE BINARY "%'.$text_search.'%"
               or LOWER(dia_chi) LIKE BINARY "%'.$text_search.'%"
               or LOWER(email) LIKE BINARY "%'.$text_search.'%"
               or LOWER(ten_dai_dien) LIKE BINARY "%'.$text_search.'%"
               or LOWER(nganh_nghe_kinh_doanh) LIKE BINARY "%'.$text_search.'%"
               or LOWER(phone) LIKE BINARY "%'.$text_search.'%"
               or LOWER(fax) LIKE BINARY "%'.$text_search.'%"
               ');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'ten_doanh_nghiep');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'san_pham_khcn');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'cong_nghe_noi_bat');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'huong_nghien_cuu_khcn');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'ma_so_doanh_nghiep');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'dia_chi');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'email');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'ten_dai_dien');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'nganh_nghe_kinh_doanh');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'phone');
         $doanh_nghiep = self::orWhereTextSearchs($doanh_nghiep, $text_searchs, 'fax');
   		$doanh_nghiep = $doanh_nghiep->join('tinh_thanh_pho','tinh_thanh_pho.id','=','doanh_nghiep_khcn.tinh_thanh_pho')->join('linh_vuc_san_pham','linh_vuc_san_pham.id','=','doanh_nghiep_khcn.linh_vuc')->select('ten_doanh_nghiep','linh_vuc_san_pham.linh_vuc as linh_vuc','dia_chi','tinh_thanh_pho.tinh_thanh_pho as tinh_thanh_pho','xep_hang_trinh_do_khcn','link','logo')->paginate($per_page);
   		$doanh_nghiep_time_search += microtime(true);
         //end search doanh nghiep

         //start search phat minh sang che
   		$bang_phat_minh_sang_che_time_search = -microtime(true);
   		$bang_phat_minh_sang_che = bang_phat_minh_sang_che::whereRaw('
               LOWER(ten) LIKE BINARY "%'.$text_search.'%" 
               or LOWER(diem_noi_bat) LIKE BINARY "%'.$text_search.'%"
               or LOWER(tac_gia) LIKE BINARY "%'.$text_search.'%"
               or LOWER(sobang_kyhieu) LIKE BINARY "%'.$text_search.'%"
               or LOWER(chu_so_huu_chinh) LIKE BINARY "%'.$text_search.'%"
               or LOWER(noidung_cothe_chuyengiao) LIKE BINARY "%'.$text_search.'%"
               or LOWER(thitruong_ungdung) LIKE BINARY "%'.$text_search.'%"
               or LOWER(mota_sangche_phatminh_giaiphap) LIKE BINARY "%'.$text_search.'%"
               or LOWER(ngay_cap) LIKE BINARY "%'.$text_search.'%"
               or LOWER(ngay_cong_bo) LIKE BINARY "%'.$text_search.'%"
               ');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'ten');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'diem_noi_bat');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'tac_gia');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'sobang_kyhieu');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'chu_so_huu_chinh');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'noidung_cothe_chuyengiao');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'thitruong_ungdung');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'mota_sangche_phatminh_giaiphap');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'ngay_cap');
         $bang_phat_minh_sang_che = self::orWhereTextSearchs($bang_phat_minh_sang_che, $text_searchs, 'ngay_cong_bo');
   		$bang_phat_minh_sang_che = $bang_phat_minh_sang_che->join('loai_phat_minh_sang_che','loai_phat_minh_sang_che.id','=','bang_phat_minh_sang_che.loai_phat_minh_sang_che')->join('linh_vuc_san_pham','bang_phat_minh_sang_che.linh_vuc_khcn','=','linh_vuc_san_pham.id')->select('ten','linh_vuc_san_pham.linh_vuc as linh_vuc','sobang_kyhieu','tac_gia','ngay_cong_bo','loai_phat_minh_sang_che.loai_phat_minh_sang_che as loai_phat_minh_sang_che','link')->paginate($per_page);
   		$bang_phat_minh_sang_che_time_search += microtime(true);
         //end search bang phat minh sang che

         //start search san pham
   		$san_pham_time_search = -microtime(true);
   		$san_pham = san_pham::whereRaw('
               LOWER(ten_san_pham) LIKE BINARY "%'.$text_search.'%" 
               or LOWER(kha_nang_ung_dung) LIKE BINARY "%'.$text_search.'%"
               or LOWER(mo_ta_chung) LIKE BINARY "%'.$text_search.'%"
               or LOWER(dac_diem_noi_bat) LIKE BINARY "%'.$text_search.'%"
               ');
         $san_pham = self::orWhereTextSearchs($san_pham, $text_searchs, 'ten_san_pham');
         $san_pham = self::orWhereTextSearchs($san_pham, $text_searchs, 'kha_nang_ung_dung');
         $san_pham = self::orWhereTextSearchs($san_pham, $text_searchs, 'mo_ta_chung');
         $san_pham = self::orWhereTextSearchs($san_pham, $text_searchs, 'dac_diem_noi_bat');  
   		$san_pham = $san_pham->join('linh_vuc_san_pham','san_pham.linh_vuc','=','linh_vuc_san_pham.id')->select('ten_san_pham','linh_vuc_san_pham.linh_vuc as linh_vuc','dac_diem_noi_bat','link','anh_san_pham')->paginate($per_page);
   		$san_pham_time_search += microtime(true);
         //end search san pham

         //return view and datas
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

   private function orWhereTextSearchs($result, $text_searchs, $column)
   {
      return $result->orwhere(function($query) use ($text_searchs, $column) {
            foreach ($text_searchs as $value) {
               $query->whereRaw('LOWER('.$column.') LIKE BINARY "%'.$value.'%"');
            }
         });   
   }
}
