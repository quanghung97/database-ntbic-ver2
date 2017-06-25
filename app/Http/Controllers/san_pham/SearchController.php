<?php

namespace App\Http\Controllers\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\san_pham;
use App\linh_vuc_san_pham;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		/*Truyền vào text và các option*/
		$lv = linh_vuc_san_pham::all();
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$text_search = mb_strtolower($text_search);
		$text_searchs = explode(' ', $text_search);
		/*
			Tìm theo: truyền vào 1 số nguyên
			1: Tên sản phẩm, ứng dụng
			2: Khả năng ứng dụng
			3: Mô tả sản phẩm
		*/
		if($tim_theo == 1) {
			$result = san_pham::whereRaw('LOWER(ten_san_pham) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten_san_pham');

		} else if ($tim_theo == 2) {
			$result = san_pham::whereRaw('LOWER(kha_nang_ung_dung) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'kha_nang_ung_dung');

		} else if ($tim_theo == 3) {
			$result = san_pham::whereRaw('LOWER(mo_ta_chung) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'mo_ta_chung');

		} else {
			//tim theo tat ca
			$result = san_pham::whereRaw('
					LOWER(ten_san_pham) LIKE BINARY "%'.$text_search.'%" 
					or LOWER(kha_nang_ung_dung) LIKE BINARY "%'.$text_search.'%"
					or LOWER(mo_ta_chung) LIKE BINARY "%'.$text_search.'%"
					or LOWER(dac_diem_noi_bat) LIKE BINARY "%'.$text_search.'%"
					');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten_san_pham');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'kha_nang_ung_dung');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'mo_ta_chung');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'dac_diem_noi_bat');	
		}
		if ($linh_vuc_khcn != 0) {
			$result = $result->where('san_pham.linh_vuc',$linh_vuc_khcn);
		}

		$result = $result->join('linh_vuc_san_pham','san_pham.linh_vuc','=','linh_vuc_san_pham.id')->select('ten_san_pham','linh_vuc_san_pham.linh_vuc as linh_vuc','dac_diem_noi_bat','link','anh_san_pham')->paginate($per_page);
		/*
			Tìm theo lĩnh vực KHCN: Truyền vào 1 số nguyên ứng với id lĩnh vực trong bảng linh_vuc_san_pham
		*/
		$time_search += microtime(true);

		return view('search_result.san_pham')
		->with([
			'linh_vuc'=>$lv,
			'datas'=>$result,
			'tim_theo' => $tim_theo,
			'linh_vuc_current' => $linh_vuc_khcn,
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