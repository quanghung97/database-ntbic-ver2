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

		/*Tìm theo: truyền vào 1 số nguyên
			1: tên phát minh, sáng chế, giải pháp
			2: điểm nổi bật
			3: tác giả
		*/
		if($tim_theo == 1) {
			$result = bang_phat_minh_sang_che::where('ten', 'LIKE', '%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = bang_phat_minh_sang_che::where('diem_noi_bat','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 3) {
			$result = bang_phat_minh_sang_che::where('tac_gia', 'LIKE', '%'.$text_search.'%');
		} else {
			$result = bang_phat_minh_sang_che::where(function($query) use ($text_search){
				$query->where('ten', 'LIKE', '%'.$text_search.'%')->orWhere('diem_noi_bat','LIKE','%'.$text_search.'%')->orWhere('tac_gia', 'LIKE', '%'.$text_search.'%')->orWhere('sobang_kyhieu', 'LIKE', '%'.$text_search.'%')->orWhere('chu_so_huu_chinh', 'LIKE', '%'.$text_search.'%')->orWhere('noidung_cothe_chuyengiao', 'LIKE', '%'.$text_search.'%')->orWhere('thitruong_ungdung', 'LIKE', '%'.$text_search.'%')->orWhere('mota_sangche_phatminh_giaiphap', 'LIKE', '%'.$text_search.'%')->orWhere('ngay_cap', 'LIKE', '%'.$text_search.'%')->orWhere('ngay_cong_bo', 'LIKE', '%'.$text_search.'%');
			});
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
}