<?php

namespace App\Http\Controllers\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\doanh_nghiep_khcn;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		$lv = linh_vuc_san_pham::all();
		$tinh_thanh = tinh_thanh_pho::all();
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$tinh_thanh_pho = $request->tinh_thanh_pho;
		$xep_hang = $request->xep_hang;

		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên doanh nghiệp
			2: Sản phẩm KHCN
			3: Công nghệ nổi bật
			4: Hướng nghiên cứu
		*/
		if ($tim_theo == 1) {
			$result = doanh_nghiep_khcn::where('ten_doanh_nghiep','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 2) {
			$result = doanh_nghiep_khcn::where('san_pham_khcn','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 3) {
			$result = doanh_nghiep_khcn::where('cong_nghe_noi_bat','LIKE','%'.$text_search.'%');
		} else if ($tim_theo == 4) {
			$result = doanh_nghiep_khcn::where('huong_nghien_cuu_khcn','LIKE','%'.$text_search.'%');
		} else {
			$result = doanh_nghiep_khcn::where(function($query) use ($text_search){
				$query->where('ten_doanh_nghiep','LIKE','%'.$text_search.'%')->orWhere('san_pham_khcn','LIKE','%'.$text_search.'%')->orWhere('cong_nghe_noi_bat','LIKE','%'.$text_search.'%')->orWhere('huong_nghien_cuu_khcn','LIKE','%'.$text_search.'%')->orWhere('ma_so_doanh_nghiep','LIKE','%'.$text_search.'%')->orWhere('dia_chi','LIKE','%'.$text_search.'%')->orWhere('email','LIKE','%'.$text_search.'%')->orWhere('ten_dai_dien','LIKE','%'.$text_search.'%')->orWhere('nganh_nghe_kinh_doanh','LIKE','%'.$text_search.'%')->orWhere('phone','LIKE','%'.$text_search.'%')->orWhere('fax','LIKE','%'.$text_search.'%');
			});
		}

		/*
			Tìm theo tỉnh thành phố: Truyền vào 1 số nguyên ứng với id trong bảng tinh_thanh_pho
		*/
		if($tinh_thanh_pho != 0) {
			$result = $result->where('doanh_nghiep_khcn.tinh_thanh_pho',$tinh_thanh_pho);
		}

		/*
			Tìm theo lĩnh vực KHCN: Truyền vào 1 số nguyên ứng với id trong bảng linh_vuc_san_pham
		*/
		if($linh_vuc_khcn != 0) {
			$result = $result->where('doanh_nghiep_khcn.linh_vuc',$linh_vuc_khcn);
		}

		/*
			Tìm theo xếp hạng: truyền vào 1 kí tự ứng với giá trị cột xep_hang_trinh_do_khcn trong bảng doanh_nghiep_khcn
		*/
		if($xep_hang != 'Xếp hạng' and $xep_hang != '') {
			$result = $result->where('xep_hang_trinh_do_khcn',$xep_hang);
		}

		$result = $result->join('tinh_thanh_pho','tinh_thanh_pho.id','=','doanh_nghiep_khcn.tinh_thanh_pho')->join('linh_vuc_san_pham','linh_vuc_san_pham.id','=','doanh_nghiep_khcn.linh_vuc')->select('ten_doanh_nghiep','linh_vuc_san_pham.linh_vuc as linh_vuc','dia_chi','tinh_thanh_pho.tinh_thanh_pho as tinh_thanh_pho','xep_hang_trinh_do_khcn','link','logo')->paginate($per_page);

		$time_search += microtime(true);

		return view('search_result.doanh_nghiep')
		->with([
			'linh_vuc'=>$lv,
			'tinh_thanh'=>$tinh_thanh,
			'datas'=>$result,
			'tim_theo' => $tim_theo,
			'linh_vuc_current' => $linh_vuc_khcn,
			'tinh_thanh_current' => $tinh_thanh_pho,
			'xep_hang' => $xep_hang,
			'time_search' => $time_search,
			'text_search' => $text_search,
			]);
	}
}