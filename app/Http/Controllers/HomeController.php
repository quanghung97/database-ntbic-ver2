<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\chuyen_gia_khcn;
use App\bang_phat_minh_sang_che;
use App\de_tai_du_an_cac_cap;
use App\san_pham;
use App\doanh_nghiep_khcn;
use Khill\Lavacharts\Lavacharts;
use App\Utils;

class HomeController extends Controller
{
    public $pagi_number=10;
	public $pagi=true;
	public static $FILTER_ALL = "tatca";
	public static $FILTER_PROFILE = "chuyen_gia_khcn";
	public static $FILTER_DETAI = "de_tai_du_an_cac_cap";
	public static $FILTER_SANPHAM = "san_pham";
	public static $FILTER_PHATMINH = "bang_phat_minh_sang_che";
	public static $FILTER_DOANHNGHIEP = "doanh_nghiep_khcn";


	 public function index()
		  {
		  //Quantity
		      $counts = array();
		      $counts['chuyen_gia_khcn']=session('profilescount',function(){
		        return DB::table('chuyen_gia_khcn')->count();});
		      $counts['bang_phat_minh_sang_che']=session('phatminhcount', function(){
		        return DB::table('bang_phat_minh_sang_che')->count();});
		      $counts['de_tai_du_an_cac_cap']=session('detaicount', function(){
		        return DB::table('de_tai_du_an_cac_cap')->count();});
		      $counts['san_pham']=session('sanphamcount',function(){
		        return DB::table('san_pham')->count();});
		      $counts['doanh_nghiep_khcn']=session('doanhnghiepcount', function(){
		        return DB::table('doanh_nghiep_khcn')->count();});
		      session([
		        'profilescount'=>$counts['chuyen_gia_khcn'],
		        'phatminhcount'=>$counts['bang_phat_minh_sang_che'],
		        'detaicount'=>$counts['de_tai_du_an_cac_cap'],
		        'sanphamcount'=>$counts['san_pham'],
		        'doanhnghiepcount'=>$counts['doanh_nghiep_khcn']
		        ]);
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

		        $filter = "tatca";
		        session(['filter'=>$filter]);
		        $keyword="";
		        session(['keyword'=>$keyword]);
		        $limitItem=12;
		        $chuyen_gia_khcn = chuyen_gia_khcn::limit($limitItem)->get();
		        $bang_phat_minh_sang_che = bang_phat_minh_sang_che::limit($limitItem)->get();
		        $de_tai_du_an_cac_cap=de_tai_du_an_cac_cap::limit($limitItem)->get();
		        $doanh_nghiep_khcn = doanh_nghiep_khcn::limit($limitItem)->get();
		        $san_pham = san_pham::limit($limitItem)->get();
		      return view('home',compact('counts','chuyen_gia_khcn','bang_phat_minh_sang_che',
		      'de_tai_du_an_cac_cap','san_pham','doanh_nghiep_khcn','keyword','filter','datachuyengia','dataphatminh','datadoanhnghiep','datasanpham','datadetai'));
		  }

	public function huong_dan_su_dung(){
		return view('huong_dan');
	}
}
