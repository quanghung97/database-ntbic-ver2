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
		$text_search = mb_strtolower($text_search);
		$text_searchs = explode(' ', $text_search);
		/*
			Tìm theo: truyền vào 1 số nguyên
			1: Nhan đề khoa học công nghệ
			2: Tác giả
			3: Tóm tắt
		*/
		if($tim_theo == 1) {
			$result = khoa_hoc_cong_nghe::whereRaw('LOWER(nhan_de) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'nhan_de');

		} else if ($tim_theo == 2) {
			$result = khoa_hoc_cong_nghe::whereRaw('LOWER(tac_gia) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tac_gia');

		} else if ($tim_theo == 3) {
			$result = khoa_hoc_cong_nghe::whereRaw('LOWER(tom_tat) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tom_tat');

		} else {
			//tim theo tat ca
			$result = khoa_hoc_cong_nghe::whereRaw('
					LOWER(nhan_de) LIKE BINARY "%'.$text_search.'%" 
					or LOWER(tac_gia) LIKE BINARY "%'.$text_search.'%"
					or LOWER(tom_tat) LIKE BINARY "%'.$text_search.'%"
					');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'nhan_de');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tac_gia');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tom_tat');
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

	private function orWhereTextSearchs($result, $text_searchs, $column)
	{
		return $result->orwhere(function($query) use ($text_searchs, $column) {
				foreach ($text_searchs as $value) {
					$query->whereRaw('LOWER('.$column.') LIKE BINARY "%'.$value.'%"');
				}
			});	
	}
}
