<?php

namespace App\Http\Controllers\de_tai_du_an;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\de_tai_du_an;

class SearchController extends Controller
{
    public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$cap_quan_ly = $request->cap_quan_ly;
		$tinh_thanh_pho = $request->tinh_thanh_pho;
		$text_search = mb_strtolower($text_search);
		$text_searchs = explode(' ', $text_search);
		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên đề tài, đề án
			2: Trạng thái
			3: Mã số, ký hiệu
			4: Cơ quan chủ trì
			5: Tóm tắt nội dung 
		*/
		if($tim_theo == 1) {
			$result = de_tai_du_an::whereRaw('LOWER(ten_bao_cao) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten_bao_cao');

		} else if ($tim_theo == 2) {
			$result = de_tai_du_an::whereRaw('LOWER(trang_thai) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'trang_thai');
		} else if ($tim_theo == 3) {
			$result = de_tai_du_an::whereRaw('LOWER(ma_so_de_tai) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ma_so_de_tai');
		} else if ($tim_theo == 4) {
			$result = de_tai_du_an::whereRaw('LOWER(co_quan_chu_tri) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'co_quan_chu_tri');
		} else if ($tim_theo == 5) {
			$result = de_tai_du_an::whereRaw('LOWER(tom_tat) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tom_tat');	
		} else {
			//tim theo tat ca
			$result = chuyen_gia_khcn::whereRaw('
					LOWER(ten_bao_cao) LIKE BINARY "%'.$text_search.'%" 
					or LOWER(trang_thai) LIKE BINARY "%'.$text_search.'%"
					or LOWER(ma_so_de_tai) LIKE BINARY "%'.$text_search.'%"
					or LOWER(co_quan_chu_tri) LIKE BINARY "%'.$text_search.'%"
					or LOWER(tom_tat) LIKE BINARY "%'.$text_search.'%"
					or LOWER(thoi_gian_bat_dau) LIKE BINARY "%'.$text_search.'%"
					or LOWER(thoi_gian_ket_thuc) LIKE BINARY "%'.$text_search.'%"
					or LOWER(linh_vuc_nghien_cuu) LIKE BINARY "%'.$text_search.'%"
					or LOWER(tu_khoa) LIKE BINARY "%'.$text_search.'%"
					');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten_bao_cao');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'trang_thai');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ma_so_de_tai');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'co_quan_chu_tri');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tom_tat');	
			$result = self::orWhereTextSearchs($result, $text_searchs, 'thoi_gian_bat_dau');	
			$result = self::orWhereTextSearchs($result, $text_searchs, 'thoi_gian_ket_thuc');	
			$result = self::orWhereTextSearchs($result, $text_searchs, 'linh_vuc_nghien_cuu');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tu_khoa');	
		}

		/*
			Tìm theo cấp quản lý đề tài: truyền vào 1 chuỗi ứng với giá trị cột cap_quan_ly_de_tai trong bảng de_tai_du_an
		*/
		if($cap_quan_ly != 'Cấp quản lý' and $cap_quan_ly != '') {
			$result = $result->where('cap_quan_ly_de_tai',$cap_quan_ly);
		}

		$result = $result->paginate($per_page);
		$time_search += microtime(true);

		return view('search_result.de_tai_du_an')
		->with([
			'datas' => $result,
			'tim_theo' => $tim_theo,
			'cap_quan_ly_current' => $cap_quan_ly,
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
