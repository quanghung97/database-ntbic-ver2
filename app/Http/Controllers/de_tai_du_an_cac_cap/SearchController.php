<?php

namespace App\Http\Controllers\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\de_tai_du_an_cac_cap;
use App\chuyen_nganh_khcn;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		$cn_khcn = chuyen_nganh_khcn::all();
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$chuyen_nganh = $request->chuyen_nganh;
		$tinh_thanh_pho = $request->tinh_thanh_pho;
		$chuc_danh = $request->chuc_danh;

		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên đề tài, đề án
			2: CNĐT, Tác giả
			3: Mã số, ký hiệu
			4: Cơ quan chủ trì
			5: Tóm tắt nội dung 
		*/
		if($tim_theo == 1) {
			$result = de_tai_du_an_cac_cap::where('ten_de_tai','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = de_tai_du_an_cac_cap::where('chu_nhiem_detai','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 3) {
			$result = de_tai_du_an_cac_cap::where('maso_kyhieu','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 4) {
			$result = de_tai_du_an_cac_cap::where('co_quan','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 5) {
			$result = de_tai_du_an_cac_cap::where('mota_chung','LIKE','%'.$text_search.'%');
		} else {
			$result = de_tai_du_an_cac_cap::where(function($query) use ($text_search){
				$query->where('ten_de_tai','LIKE','%'.$text_search.'%')->orWhere('chu_nhiem_detai','LIKE','%'.$text_search.'%')->orWhere('maso_kyhieu','LIKE','%'.$text_search.'%')->orWhere('co_quan','LIKE','%'.$text_search.'%')->orWhere('mota_chung','LIKE','%'.$text_search.'%')->orWhere('diem_noi_bat','LIKE','%'.$text_search.'%')->orWhere('mota_quytrinh_chuyengiao','LIKE','%'.$text_search.'%');
			});
		}

		if($chuyen_nganh != ''){
			$result = $result->where('chuyen_nganh_khcn', $chuyen_nganh);
		}

		$result = $result->select('ten_de_tai','maso_kyhieu','linh_vuc','chu_nhiem_detai','nam_ket_thuc','link','nam_bat_dau','chuyen_nganh_khcn')->paginate($per_page);
		$time_search += microtime(true);

		return view('search_result.de_tai_du_an_cac_cap')
		->with([
			'datas' => $result,
			'chuyen_nganh_khcn'=>$cn_khcn,
			'tim_theo' => $tim_theo,
			'chuyen_nganh_current' => $chuyen_nganh,
			'time_search' => $time_search,
			'text_search' => $text_search,
			]);
	}
}