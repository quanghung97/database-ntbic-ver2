<?php

namespace App\Http\Controllers\khoa_hoc_cong_nghe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\khoa_hoc_cong_nghe;

class SearchController extends Controller
{
    
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;

		/*
			Tìm theo: truyền vào 1 số nguyên
			1: Nhan đề khoa học công nghệ
			2: Tác giả
			3: Tóm tắt
		*/
		if($tim_theo == 1) {
			$result = khoa_hoc_cong_nghe::where('nhan_de', 'LIKE', '%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = khoa_hoc_cong_nghe::where('tac_gia', 'LIKE', '%'.$text_search.'%');
		} else if ($tim_theo == 3) {
			$result = khoa_hoc_cong_nghe::where('tom_tat', 'LIKE', '%'.$text_search.'%');
		} else {
			$result = khoa_hoc_cong_nghe::where(function($query) use ($text_search){
				$query->where('nhan_de', 'LIKE', '%'.$text_search.'%')->orWhere('tac_gia', 'LIKE', '%'.$text_search.'%')->orWhere('tom_tat', 'LIKE', '%'.$text_search.'%')->orWhere('tu_khoa', 'LIKE', '%'.$text_search.'%')->orWhere('chi_so_de_muc', 'LIKE', '%'.$text_search.'%')->orWhere('dang_tai_lieu', 'LIKE', '%'.$text_search.'%')->orWhere('nguon_trich', 'LIKE', '%'.$text_search.'%')->orWhere('nam_xuat_ban', 'LIKE', '%'.$text_search.'%')->orWhere('ki_hieu_kho', 'LIKE', '%'.$text_search.'%');
			});
		}

		$result = $result->paginate($per_page);
		$time_search += microtime(true);

		return view('search_result.khoa_hoc_cong_nghe')
		->with([
			'datas'=>$result,
			'tim_theo' => $tim_theo,
			'time_search' => $time_search,
			'text_search' => $text_search,
			]);
	}
}
