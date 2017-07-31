<?php

namespace App\Http\Controllers\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\san_pham;
use App\linh_vuc_san_pham;


use Elasticsearch\ClientBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		/*Truyền vào text và các option*/
		$lv = linh_vuc_san_pham::all();
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;


         //api client
        $client = ClientBuilder::create()->build();
        
        if($text_search != null){
            if($tim_theo == 1){
                if($linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_san_pham' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'linh_vuc' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten_san_pham' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_san_pham' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten_san_pham' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }
            }else if($tim_theo == 2){
                if($linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'kha_nang_ung_dung' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'linh_vuc' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['kha_nang_ung_dung' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'kha_nang_ung_dung' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['kha_nang_ung_dung' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }
            }else if($tim_theo == 3){
                if($linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'mo_ta_chung' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'linh_vuc' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['mo_ta_chung' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'mo_ta_chung' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['mo_ta_chung' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }
            }else if($tim_theo == 4){
                if($linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'dac_diem_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'linh_vuc' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['dac_diem_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'dac_diem_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['co_quan_chu_tri' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }
            }else if($tim_theo == 0){
                if($linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_san_pham^5', 'dac_diem_noi_bat', 'mo_ta_chung','kha_nang_ung_dung^4']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [
                                                    'linh_vuc' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                }else if($linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_san_pham^5', 'dac_diem_noi_bat', 'mo_ta_chung','kha_nang_ung_dung^4']
                                        ]],
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params); 
                }
            }
        }else if($text_search == null){
            if($linh_vuc_khcn != 0){
                $params = [
                        'index' => 'ntbic_index',
                        'type' => 'san_pham',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'linh_vuc' => $linh_vuc_khcn
                                        ]],
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
            }else if($linh_vuc_khcn == 0){
                $time_search += microtime(true);
                $result = san_pham::select('ten_san_pham','linh_vuc_san_pham.linh_vuc as linh_vuc','dac_diem_noi_bat','link','anh_san_pham')->join('linh_vuc_san_pham','san_pham.linh_vuc','=','linh_vuc_san_pham.id')->paginate(10);
                
                return view('search_result.san_pham')
                    ->with([
                        'linh_vuc'=>$lv,
                        'datas'=>$result,
                        'tim_theo' => $tim_theo,
                        'linh_vuc_current' => $linh_vuc_khcn,
                        'time_search' => $time_search,
                        'text_search' => $text_search,
                        ]);
            }
        }
        
        
        
//		$result = $result->join('linh_vuc_san_pham','san_pham.linh_vuc','=','linh_vuc_san_pham.id')->select('ten_san_pham','linh_vuc_san_pham.linh_vuc as linh_vuc','dac_diem_noi_bat','link','anh_san_pham')->paginate($per_page);
		/*
			Tìm theo lĩnh vực KHCN: Truyền vào 1 số nguyên ứng với id lĩnh vực trong bảng linh_vuc_san_pham
		*/
		$time_search += microtime(true);

        
         $result = $results['hits']['hits'];
        //dd($results);
        $result = $this->paginate_customer($result,10);
        
		return view('search_result.san_pham')
		->with([
			'linh_vuc'=>$lv,
			'datas'=>$result,
			'tim_theo' => $tim_theo,
			'linh_vuc_current' => $linh_vuc_khcn,
			'time_search' => $time_search,
			'text_search' => $text_search,
			]);
	}
    
    private function paginate_customer($items,$perPage)
    {
        $pageStart = \Request::get('page', 1);
        // Start displaying items from this number;
        $offSet = ($pageStart * $perPage) - $perPage; 

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);

        return new LengthAwarePaginator($itemsForCurrentPage, count($items), $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }


}