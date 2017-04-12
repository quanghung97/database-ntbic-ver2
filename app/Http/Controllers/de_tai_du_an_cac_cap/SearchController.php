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
		$text_search = mb_strtolower($text_search);
		$text_searchs = explode(' ', $text_search);
		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên đề tài, đề án
			2: CNĐT, Tác giả
			3: Mã số, ký hiệu
			4: Cơ quan chủ trì
			5: Tóm tắt nội dung 
		*/
		if($tim_theo == 1) {
			$result = de_tai_du_an_cac_cap::whereRaw('LOWER(ten_de_tai) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten_de_tai');
		} else if ($tim_theo == 2) {
			$result = de_tai_du_an_cac_cap::whereRaw('LOWER(chu_nhiem_detai) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'chu_nhiem_detai');

		} else if ($tim_theo == 3) {
			$result = de_tai_du_an_cac_cap::whereRaw('LOWER(maso_kyhieu) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'maso_kyhieu');
		} else if ($tim_theo == 4) {
			$result = de_tai_du_an_cac_cap::whereRaw('LOWER(co_quan) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'co_quan');
		} else if ($tim_theo == 5) {
			$result = de_tai_du_an_cac_cap::whereRaw('LOWER(mota_chung) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'mota_chung');
		} else {
			//tim tất cả
			$result = de_tai_du_an_cac_cap::whereRaw('
					LOWER(ten_de_tai) LIKE BINARY "%'.$text_search.'%" 
					or LOWER(chu_nhiem_detai) LIKE BINARY "%'.$text_search.'%"
					or LOWER(maso_kyhieu) LIKE BINARY "%'.$text_search.'%"
					or LOWER(co_quan) LIKE BINARY "%'.$text_search.'%"
					or LOWER(mota_chung) LIKE BINARY "%'.$text_search.'%"
					or LOWER(diem_noi_bat) LIKE BINARY "%'.$text_search.'%"
					or LOWER(mota_quytrinh_chuyengiao) LIKE BINARY "%'.$text_search.'%"
					');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten_de_tai');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'chu_nhiem_detai');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'maso_kyhieu');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'co_quan');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'mota_chung');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'diem_noi_bat');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'mota_quytrinh_chuyengiao');
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

	private function orWhereTextSearchs($result, $text_searchs, $column)
	{
		return $result->orwhere(function($query) use ($text_searchs, $column) {
				foreach ($text_searchs as $value) {
					$query->whereRaw('LOWER('.$column.') LIKE BINARY "%'.$value.'%"');
				}
			});	
	}
}