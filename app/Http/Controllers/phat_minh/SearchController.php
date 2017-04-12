<?php

namespace App\Http\Controllers\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\bang_phat_minh_sang_che;
use App\linh_vuc_san_pham;
use App\loai_phat_minh_sang_che;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		$linh_vuc = linh_vuc_san_pham::all();
		$loai_phat_minh = loai_phat_minh_sang_che::all();
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$loai_phat_minh_sang_che = $request->loai;
		$text_search = mb_strtolower($text_search);
		$text_searchs = explode(' ', $text_search);
		/*Tìm theo: truyền vào 1 số nguyên
			1: tên phát minh, sáng chế, giải pháp
			2: điểm nổi bật
			3: tác giả
		*/
		if($tim_theo == 1) {
			$result = bang_phat_minh_sang_che::whereRaw('LOWER(ten) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten');
		} else if ($tim_theo == 2) {
			$result = bang_phat_minh_sang_che::whereRaw('LOWER(diem_noi_bat) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'diem_noi_bat');
		} else if ($tim_theo == 3) {
			$result = bang_phat_minh_sang_che::whereRaw('LOWER(tac_gia) LIKE BINARY "%'.$text_search.'%"');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tac_gia');
		} else {
			//tim tất cả
			$result = bang_phat_minh_sang_che::whereRaw('
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
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ten');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'diem_noi_bat');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'tac_gia');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'sobang_kyhieu');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'chu_so_huu_chinh');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'noidung_cothe_chuyengiao');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'thitruong_ungdung');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'mota_sangche_phatminh_giaiphap');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ngay_cap');
			$result = self::orWhereTextSearchs($result, $text_searchs, 'ngay_cong_bo');
		}

		/*
			Tìm theo lĩnh vực KHCN: truyền vào 1 số nguyên ứng với id lĩnh vực trong bảng linh_vuc_san_pham
		*/
		if ($linh_vuc_khcn != 0) {
			$result = $result->where('bang_phat_minh_sang_che.linh_vuc_khcn',$linh_vuc_khcn);
		}

		/*
			Tìm theo loại phát minh sáng chế: truyền vào 1 số nguyên ứng với loại phát minh trong bảng loai_phat_minh_sang_che
		*/
		if ($loai_phat_minh_sang_che != 0) {
			$result = $result->where('bang_phat_minh_sang_che.loai_phat_minh_sang_che',$loai_phat_minh_sang_che);
		}


		$result = $result->join('loai_phat_minh_sang_che','loai_phat_minh_sang_che.id','=','bang_phat_minh_sang_che.loai_phat_minh_sang_che')->join('linh_vuc_san_pham','bang_phat_minh_sang_che.linh_vuc_khcn','=','linh_vuc_san_pham.id')->select('ten','linh_vuc_san_pham.linh_vuc as linh_vuc','sobang_kyhieu','tac_gia','ngay_cong_bo','loai_phat_minh_sang_che.loai_phat_minh_sang_che as loai_phat_minh_sang_che','link')->paginate($per_page);
		$time_search += microtime(true);
		return view('search_result.phat_minh_sang_che')
		->with([
			'linh_vuc'=>$linh_vuc,
			'loai_phat_minh'=>$loai_phat_minh,
			'datas'=>$result,
			'tim_theo' => $tim_theo,
			'loai_phat_minh_current' => $loai_phat_minh_sang_che,
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