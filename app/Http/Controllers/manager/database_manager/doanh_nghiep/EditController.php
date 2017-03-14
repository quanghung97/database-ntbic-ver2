<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\doanh_nghiep_khcn;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;
use Carbon\Carbon;

class EditController extends Controller
{
    public function index($id) {
    	$linh_vuc = linh_vuc_san_pham::all();
     	$tinh_thanh_pho = tinh_thanh_pho::all();
    	$doanh_nghiep = doanh_nghiep_khcn::find($id);
    	return view('database_manager.doanh_nghiep.edit')->with(['doanh_nghiep'=>$doanh_nghiep,'tinh_thanh'=>$tinh_thanh_pho,'linh_vuc'=>$linh_vuc]);
    }

    public function edit_action(Request $request, $id) {
    	$entry = doanh_nghiep_khcn::find($id);
     	$entry->ngay_cap_nhat = Carbon::now();
     	$entry->ten_doanh_nghiep = $request->name.'';
     	$entry->dia_chi = $request->dia_chi.'';
     	$entry->linh_vuc = $request->linh_vuc;
     	$entry->tinh_thanh_pho = $request->tinh_thanh_pho;
     	$entry->nganh_nghe_kinh_doanh = $request->nganh_nghe_kinh_doanh;
     	$entry->email = $request->email;
     	$entry->phone = $request->phone;
     	$entry->fax = $request->fax;
     	$entry->website = $request->website;
     	$entry->ma_so_thue = $request->ma_so_thue;
     	$entry->loai_hinh = $request->loai_hinh;
     	$entry->ngay_dang_ky = $request->ngay_dang_ki;
     	$entry->ten_dai_dien = $request->ten_dai_dien.'';
     	$entry->email_dai_dien = $request->email_dai_dien.'';
     	$entry->phone_dai_dien = $request->sdt_dai_dien.'';
     	$entry->dia_chi_dai_dien = $request->dia_chi_dai_dien.'';
     	$entry->van_phong_dai_dien = $request->van_phong_dai_dien;
     	$entry->so_quyet_dinh_khcn = $request->so_quyet_dinh;

     	$d = str_replace('/', '-', $request->thoi_gian_dang_ky_khcn);
        $entry->thoi_gian_dang_ky_khcn = date('Y-m-d', strtotime($d));

     	$entry->noi_cap_chung_nhan_khcn = $request->noi_cap;
     	$entry->xep_hang_trinh_do_khcn = $request->xep_hang_trinh_do;
     	$entry->huong_nghien_cuu_khcn = $request->huong_nghien_cuu_khcn;
     	$entry->so_luong_can_bo_khcn = $request->so_luong_can_bo;
     	$entry->cong_nghe_noi_bat = $request->cong_nghe_noi_bat;
     	$entry->su_dung_cong_nghe =$request->su_dung_cong_nghe;

        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_name = $entry->link.'.'.$logo->getClientOriginalExtension();
            $entry->logo = 'storage/app/public/media/doanh-nghiep/'.$logo_name;
            $logo->move('storage/app/public/media/doanh-nghiep', $logo_name);
        }
        $entry->save();

        return redirect('quan-tri-vien/quan-ly-du-lieu/doanh-nghiep');
    }
}
