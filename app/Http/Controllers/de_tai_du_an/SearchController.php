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

		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên đề tài, đề án
			2: Trạng thái
			3: Mã số, ký hiệu
			4: Cơ quan chủ trì
			5: Tóm tắt nội dung 
		*/
		if($tim_theo == 1) {
			$result = de_tai_du_an::where('ten_bao_cao','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = de_tai_du_an::where('trang_thai','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 3) {
			$result = de_tai_du_an::where('ma_so_de_tai','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 4) {
			$result = de_tai_du_an::where('co_quan_chu_tri','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 5) {
			$result = de_tai_du_an::where('tom_tat','LIKE','%'.$text_search.'%');
		} else {
			$result = de_tai_du_an::where(function($query) use ($text_search){
				$query->where('ten_bao_cao','LIKE','%'.$text_search.'%')->orWhere('trang_thai','LIKE','%'.$text_search.'%')->orWhere('ma_so_de_tai','LIKE','%'.$text_search.'%')->orWhere('co_quan_chu_tri','LIKE','%'.$text_search.'%')->orWhere('tom_tat','LIKE','%'.$text_search.'%')->orWhere('thoi_gian_bat_dau','LIKE','%'.$text_search.'%')->orWhere('thoi_gian_ket_thuc','LIKE','%'.$text_search.'%')->orWhere('linh_vuc_nghien_cuu','LIKE','%'.$text_search.'%')->orWhere('tu_khoa','LIKE','%'.$text_search.'%');
			});
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
}
