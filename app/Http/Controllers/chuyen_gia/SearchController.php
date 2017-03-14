<?php

namespace App\Http\Controllers\chuyen_gia;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;
use App\chuyen_gia_khcn;
use App\tinh_thanh_pho;
use App\hoc_vi;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$item_per_page = 10;
		$tt = tinh_thanh_pho::all();
		$hv = hoc_vi::all();
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$chuc_danh = $request->chuc_danh;
		$tinh_thanh = $request->tinh_thanh_pho;

		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên nhà KH
			2: Lĩnh vực nghiên cứu
			3: Hướng nghiên cứu
			4: Cơ quan công tác
		*/

		if ($tim_theo == 1) {
			$result = chuyen_gia_khcn::where('ho_va_ten','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = chuyen_gia_khcn::where('chuyen_nganh','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 3) {
			$result = chuyen_gia_khcn::where('huong_nghien_cuu','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 4) {
			$result = chuyen_gia_khcn::where('co_quan','LIKE','%'.$text_search.'%');
		} else {
			$result = chuyen_gia_khcn::where(function($query) use ($text_search) {
				$query->Where('ho_va_ten','LIKE','%'.$text_search.'%')->orWhere('chuyen_nganh','LIKE','%'.$text_search.'%')->orWhere('huong_nghien_cuu','LIKE','%'.$text_search.'%')->orWhere('co_quan','LIKE','%'.$text_search.'%')->orWhere('nam_sinh','LIKE','%'.$text_search.'%');
			});
		}

		$result = $result->where('tinh_thanh','LIKE','%'.$tinh_thanh.'%')->where('hoc_vi','LIKE','%'.$chuc_danh.'%')->select('link_anh','ho_va_ten','hoc_vi','co_quan','chuyen_nganh','tinh_thanh','linkid','link_anh')->paginate($item_per_page);
		$time_search += microtime(true);
		return view('search_result.chuyen_gia')
		->with([
			'hoc_vi'=>$hv,
			'tinh_thanh'=>$tt,
			'datas'=>$result,
			'tim_theo'=>$tim_theo,
			'tinh_thanh_current' => $tinh_thanh,
			'hoc_vi_current' => $chuc_danh,
			'time_search' => $time_search,
			'text_search' => $text_search,
			]);
	}
}