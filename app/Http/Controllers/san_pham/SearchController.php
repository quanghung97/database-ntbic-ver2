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

		/*
			Tìm theo: truyền vào 1 số nguyên
			1: Tên sản phẩm, ứng dụng
			2: Khả năng ứng dụng
			3: Mô tả sản phẩm
		*/
		if($tim_theo == 0) {
			$result = san_pham::where('ten_san_pham', 'LIKE', '%'.$text_search.'%');
		} else if ($tim_theo == 1) {
			$result = san_pham::where('kha_nang_ung_dung', 'LIKE', '%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = san_pham::where('mo_ta_chung', 'LIKE', '%'.$text_search.'%');
		} else {
			$result = san_pham::where(function($query) use ($text_search){
				$query->where('ten_san_pham', 'LIKE', '%'.$text_search.'%')->orWhere('kha_nang_ung_dung', 'LIKE', '%'.$text_search.'%')->orWhere('mo_ta_chung', 'LIKE', '%'.$text_search.'%')->orWhere('dac_diem_noi_bat', 'LIKE', '%'.$text_search.'%');
			});
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
}