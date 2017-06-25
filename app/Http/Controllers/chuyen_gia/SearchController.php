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

use Elasticsearch\ClientBuilder;

class SearchController extends Controller
{
	public function getSearch(Request $request) 
	{
        //chuyen_gia_khcn::addAllToIndex();
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
		//$text_search = mb_strtolower($text_search);
		//$text_searchs = explode(' ', $text_search);
		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên nhà KH
			2: Lĩnh vực nghiên cứu
			3: Hướng nghiên cứu
			4: Cơ quan công tác
		*/
        
        //api client
        //$client = ClientBuilder::create()->build();
        
        if($text_search != ''){
            if ($tim_theo == 1) {
//			$result = chuyen_gia_khcn::whereRaw('LOWER(ho_va_ten) LIKE BINARY "%'.$text_search.'%"');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'ho_va_ten');
            $result = chuyen_gia_khcn::complexSearch(array(
                'body' => array(
                    'query' => array(
                        'multi_match' => array(
                            'query' => $text_search,
                            'fields' => array('ho_va_ten^5','chuc_danh','tinh_thanh')
                            //'hoc_vi' => $chuc_danh,
                            //'tinh_thanh' => $tinh_thanh
                        )
                    )
                )
            ))->paginate(10);
			
		} else if ($tim_theo == 2) {
//			$result = chuyen_gia_khcn::whereRaw('LOWER(chuyen_nganh) LIKE BINARY "%'.$text_search.'%"');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'chuyen_nganh');
            $result = chuyen_gia_khcn::complexSearch(array(
                'body' => array(
                    'query' => array(
                        'multi_match' => array(
                            'query' => $text_search,
                            'fields' => array('chuyen_nganh^5','chuc_danh','tinh_thanh')
                        )
                    )
                )
            ))->paginate(10);
		} else if ($tim_theo == 3) {
//			$result = chuyen_gia_khcn::whereRaw('LOWER(huong_nghien_cuu) LIKE BINARY "%'.$text_search.'%"');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'huong_nghien_cuu');
              $result = chuyen_gia_khcn::complexSearch(array(
                'body' => array(
                    'query' => array(
                        'multi_match' => array(
                           'query' => $text_search,
                            'fields' => array('huong_nghien_cuu^5','chuc_danh','tinh_thanh')
                        )
                    )
                )
            ))->paginate(10);
		} else if ($tim_theo == 4) {
//			$result = chuyen_gia_khcn::whereRaw('LOWER(co_quan) LIKE BINARY "%'.$text_search.'%"');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'co_quan');	
            $result = chuyen_gia_khcn::complexSearch(array(
                'body' => array(
                    'query' => array(
                        'multi_match' => array(
                            'query' => $text_search,
                            'fields' => array('co_quan^5','chuc_danh','tinh_thanh')
                        )
                    )
                )
            ))->paginate(10);
		} else {
			//tim theo tat ca
//			$result = chuyen_gia_khcn::whereRaw('
//					LOWER(ho_va_ten) LIKE BINARY "%'.$text_search.'%" 
//					or LOWER(chuyen_nganh) LIKE BINARY "%'.$text_search.'%"
//					or LOWER(huong_nghien_cuu) LIKE BINARY "%'.$text_search.'%"
//					or LOWER(co_quan) LIKE BINARY "%'.$text_search.'%"
//					');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'ho_va_ten');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'chuyen_nganh');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'huong_nghien_cuu');
//			$result = self::orWhereTextSearchs($result, $text_searchs, 'co_quan');	
            
            $result = chuyen_gia_khcn::search($text_search)->paginate(10);
		}

        } else $result = chuyen_gia_khcn::select('link_anh','ho_va_ten','hoc_vi','co_quan','chuyen_nganh','tinh_thanh','linkid','link_anh')->where('tinh_thanh','LIKE','%'.$tinh_thanh.'%')->where('hoc_vi','LIKE','%'.$chuc_danh.'%')->paginate($item_per_page);
		
		
        
//		$result = $result->where('tinh_thanh','LIKE','%'.$tinh_thanh.'%')->where('hoc_vi','LIKE','%'.$chuc_danh.'%')->select('link_anh','ho_va_ten','hoc_vi','co_quan','chuyen_nganh','tinh_thanh','linkid','link_anh')->paginate($item_per_page);

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

//	private function orWhereTextSearchs($result, $text_searchs, $column)
//	{
//		return $result->orwhere(function($query) use ($text_searchs, $column) {
//				foreach ($text_searchs as $value) {
//					$query->whereRaw('LOWER('.$column.') LIKE BINARY "%'.$value.'%"');
//				}
//			});	
//	}
}