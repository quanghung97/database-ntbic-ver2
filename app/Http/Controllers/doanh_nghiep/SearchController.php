<?php

namespace App\Http\Controllers\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\doanh_nghiep_khcn;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;

use Elasticsearch\ClientBuilder;

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
        
        
        
        if($tim_theo == 1){
          //search theo ten doanh nghiep co filter   
            $result = doanh_nghiep_khcn::complexSearch(array(
                'body' => array(
                    'query' => array(
                       'bool' => array(
                            'must' => array(
                                //search text
                                'multi_match' => array(
                                'query' => $text_search,
                                'fields' => array('ten_doanh_nghiep')
                                )
                            ),  
                           
                           //multiple filter 
                           'filter' => array(
                                'bool' => array(
                                    'must' => array(
                              
//                                        ['term' => array(
//                                            'tinh_thanh_pho.keyword' =>  $tinh_thanh_pho
//                                        )],
//                                        
//                                        ['term' => array(
//                                            'linh_vuc.keyword' => $linh_vuc_khcn
//                                        )],
                                        
//                                        ['term' => array(
//                                            'xep_hang_trinh_do_khcn.keyword' => $xep_hang
//                                        )],

                                    )
                                )
                           )
                           
                       )
                    ),
                     'highlight' => array(
                                'fields' => array(
                                    'ten_doanh_nghiep' => array(
                                        'force_source' => true
                                    )
                                )
                            ),
                    
                )
            ))->paginate(10);
        } else if($timtheo == 2){
            $result = doanh_nghiep_khcn::complexSearch(array(
                'body' => array(
                    'query' => array(
                       'bool' => array(
                            'must' => array(
                                //search text
                                'multi_match' => array(
                                'query' => $text_search,
                                'fields' => array('ten_doanh_nghiep')
                                )
                            ),  
                           
                           //multiple filter 
                           'filter' => array(
                                'bool' => array(
                                    'must' => array(
                              
                                        ['term' => array(
                                            'tinh_thanh_pho.keyword' =>  $tinh_thanh_pho
                                        )],
                                        
                                        ['term' => array(
                                            'linh_vuc.keyword' => $linh_vuc_khcn
                                        )],
                                        
//                                        ['term' => array(
//                                            'xep_hang_trinh_do_khcn.keyword' => $xep_hang
//                                        )],

                                    )
                                )
                           )
                           
                       )
                    ),
                     'highlight' => array(
                                'fields' => array(
                                    'ten_doanh_nghiep' => array(
                                        'force_source' => true
                                    ),
                                
                                )
                            ),
                    
                )
            ))->paginate(10);
        }
        
               $response = tinh_thanh_pho::complexSearch([
            'index' => 'ntbic_index',
            'type' => 'tinh_thanh_pho',
            'body' => [
                'query' => [
                    'match_all' => (Object)[],
                ],
                'size' => 1000
            ]
        ]);
                   
            //search all tinh_thanh_pho 
        foreach($result as $key => $value1){
            foreach($response as $key => $value2){
                if($value1->tinh_thanh_pho == $value2->id){
                    $value1->tinh_thanh_pho = $value2->tinh_thanh_pho;
                }
            }   
        }       
 
        
        
            $a = $result->hits['hits'];
        dd($result);
            foreach($a as $key => $value){
                $temp = $value['highlight'];
                foreach($temp as $key1 => $value2){
                    foreach($value2 as $value3){
                        
                        echo $value3;
                    }
                }
            }
		$time_search += microtime(true);

//		return view('search_result.doanh_nghiep')
//		->with([
//			'linh_vuc'=>$lv,
//			'tinh_thanh'=>$tinh_thanh,
//			'datas'=>$result,
//			'tim_theo' => $tim_theo,
//			'linh_vuc_current' => $linh_vuc_khcn,
//			'tinh_thanh_current' => $tinh_thanh_pho,
//			'xep_hang' => $xep_hang,
//			'time_search' => $time_search,
//			'text_search' => $text_search,
//			]);
	}


}