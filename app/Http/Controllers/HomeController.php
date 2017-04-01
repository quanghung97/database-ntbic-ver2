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
		  //UK CHA BIET LAM KIEU GI :V the sua lai co lau ko code thay gui dau mo t xem
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
		      'de_tai_du_an_cac_cap','san_pham','doanh_nghiep_khcn','keyword','filter'));
		  }

	public function huong_dan_su_dung(){
		return view('huong_dan');
	}
}
