<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\chuyen_gia_khcn;
use App\bang_phat_minh_sang_che;
use App\de_tai_du_an_cac_cap;
use App\san_pham;
use App\doanh_nghiep_khcn;

class HomeController extends Controller
{
    public function index()
    {
    	$counts = array();
		$counts['chuyen_gia_khcn']=session('profilescount',function(){
		    return DB::table('chuyen_gia_khcn')->count();});
		$counts['de_tai_du_an_cac_cap']=session('detaicount', function(){
		        return DB::table('de_tai_du_an_cac_cap')->count();});
		//Data For Chart
		      	//Data chuyên gia
		      	$datachuyengia = array();
		      	$datachuyengia['TS'] = DB::table('chuyen_gia_khcn')->where('hoc_vi','TS')->count();
		      	$datachuyengia['ThS'] = DB::table('chuyen_gia_khcn')->where('hoc_vi','ThS')->count();
		      	$datachuyengia['KS'] = DB::table('chuyen_gia_khcn')->where('hoc_vi','KS')->count();
		      	$datachuyengia['CN'] = DB::table('chuyen_gia_khcn')->where('hoc_vi','CN')->count();
		      	$datachuyengia['other'] = $counts['chuyen_gia_khcn'] - $datachuyengia['TS'] 
		      	                            - $datachuyengia['ThS'] 
		      								- $datachuyengia['KS'] 
		      								- $datachuyengia['CN'];
		      	//Data phát minh 
		      	$dataphatminh = array();
		      	$dataphatminh['cntt_va_truyen_thong'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',1)->count();
		      	$dataphatminh['cn_sinh_hoc'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',2)->count();
		      	$dataphatminh['cn_vat_lieu_moi'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',3)->count();
		      	$dataphatminh['cn_ctm_tdh'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',4)->count();
		      	$dataphatminh['cn_moi_truong'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',5)->count();
		      	$dataphatminh['cn_nang_luong_moi'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',6)->count();
		      	$dataphatminh['cn_vu_tru'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',7)->count();
		      	$dataphatminh['cn_khac'] = DB::table('bang_phat_minh_sang_che')
		      	                                        ->where('linh_vuc_khcn',8)->count();
		      	//Data doanh nghiệp
		      	$datadoanhnghiep = array();
		      	$datadoanhnghiep['cntt_va_truyen_thong'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',1)->count();
		      	$datadoanhnghiep['cn_sinh_hoc'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',2)->count();
		      	$datadoanhnghiep['cn_vat_lieu_moi'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',3)->count();
		      	$datadoanhnghiep['cn_ctm_tdh'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',4)->count();
		      	$datadoanhnghiep['cn_moi_truong'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',5)->count();
		      	$datadoanhnghiep['cn_nang_luong_moi'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',6)->count();
		      	$datadoanhnghiep['cn_vu_tru'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',7)->count();
		      	$datadoanhnghiep['cn_khac'] = DB::table('doanh_nghiep_khcn')
		      	                                        ->where('linh_vuc',8)->count();
		      	//Data sản phẩm
		      	$datasanpham = array();
		      	$datasanpham['cntt_va_truyen_thong'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',1)->count();
		      	$datasanpham['cn_sinh_hoc'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',2)->count();
		      	$datasanpham['cn_vat_lieu_moi'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',3)->count();
		      	$datasanpham['cn_ctm_tdh'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',4)->count();
		      	$datasanpham['cn_moi_truong'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',5)->count();
		      	$datasanpham['cn_nang_luong_moi'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',6)->count();
		      	$datasanpham['cn_vu_tru'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',7)->count();
		      	$datasanpham['cn_khac'] = DB::table('san_pham')
		      	                                        ->where('linh_vuc',8)->count();
		      	//Data đề tài dự án các cấp
		      	$datadetai = array();
		      	$datadetai['kh_kt_cn'] = DB::table('de_tai_du_an_cac_cap')->
		      							 where('linh_vuc','LIKE','%Khoa học kỹ thuật và công nghệ%')->count();
		      	$datadetai['kh_nhan_van'] = DB::table('de_tai_du_an_cac_cap')->
		      							 where('linh_vuc','LIKE','%Khoa học nhân văn%')->count();
		 		$datadetai['kh_nong_nghiep'] = DB::table('de_tai_du_an_cac_cap')->
		      							 where('linh_vuc','LIKE','%Khoa học nông nghiệp%')->count();
		 		$datadetai['kh_tu_nhien'] = DB::table('de_tai_du_an_cac_cap')->
		      							 where('linh_vuc','LIKE','%Khoa học tự nhiên%')->count();
		    	$datadetai['kh_xa_hoi'] = DB::table('de_tai_du_an_cac_cap')->
		      							 where('linh_vuc','LIKE','%Khoa học xã hội%')->count();
		      	$datadetai['kh_y_duoc'] = DB::table('de_tai_du_an_cac_cap')->
		      							 where('linh_vuc','LIKE','%Khoa học y, dược%')->count();
		      	$datadetai['other'] = $counts['de_tai_du_an_cac_cap'] - $datadetai['kh_kt_cn']
		      							- $datadetai['kh_nhan_van']
		      							- $datadetai['kh_nong_nghiep']
		      							- $datadetai['kh_tu_nhien']
		      							- $datadetai['kh_xa_hoi']
		      							- $datadetai['kh_y_duoc'];
    	return view('admin.index',compact('datachuyengia','dataphatminh','datadoanhnghiep','datasanpham','datadetai'))->with(['author'=> Auth::guard()->user()->author]);
    }
}
