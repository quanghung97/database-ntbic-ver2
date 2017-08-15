<?php

namespace App\Http\Controllers\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\de_tai_du_an_cac_cap;
use App\chuyen_nganh_khcn;

use Elasticsearch\ClientBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		$cn_khcn = chuyen_nganh_khcn::all();
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$chuyen_nganh = $request->chuyen_nganh;
		$tinh_thanh_pho = $request->tinh_thanh_pho;
		$chuc_danh = $request->chuc_danh;
//		$text_search = mb_strtolower($text_search);
//		$text_searchs = explode(' ', $text_search);
		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên đề tài, đề án
			2: CNĐT, Tác giả
			3: Mã số, ký hiệu
			4: Cơ quan chủ trì
			5: Tóm tắt nội dung 
		*/
        //api client 
        $client = ClientBuilder::create()->build();
        
        if($text_search != ''){
            if($tim_theo == 1){
                if($chuyen_nganh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_de_tai' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten_de_tai' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
//                    dd($results['hits']['hits']);
                }else if($chuyen_nganh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_de_tai' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'chuyen_nganh_khcn' => $chuyen_nganh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten_de_tai' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                    //dd($results['hits']['hits']);
                }
            } else if($tim_theo == 2){
                if($chuyen_nganh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chu_nhiem_detai' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['chu_nhiem_detai' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($chuyen_nganh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chu_nhiem_detai' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'chuyen_nganh_khcn' => $chuyen_nganh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['chu_nhiem_detai' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }
            } else if ($tim_theo == 3){
                if($chuyen_nganh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'maso_kyhieu' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['maso_kyhieu' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if ($chuyen_nganh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'maso_kyhieu' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'chuyen_nganh_khcn' => $chuyen_nganh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['maso_kyhieu' => [
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
                if($chuyen_nganh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'co_quan' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['co_quan' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($chuyen_nganh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'co_quan' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'chuyen_nganh_khcn' => $chuyen_nganh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['co_quan' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }
            }else if($tim_theo == 5){
                if($chuyen_nganh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'mota_chung' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['mota_chung' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($chuyen_nganh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'mota_chung' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'chuyen_nganh_khcn' => $chuyen_nganh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['mota_chung' => [
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
                if($chuyen_nganh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_de_tai^5','chu_nhiem_detai^4','maso_kyhieu','co_quan','mota_chung','diem_noi_bat','mota_quytrinh_chuyengiao']
                                        ]],
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($chuyen_nganh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_de_tai^5','chu_nhiem_detai^4','maso_kyhieu','co_quan','mota_chung','diem_noi_bat','mota_quytrinh_chuyengiao']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'chuyen_nganh_khcn' => $chuyen_nganh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }
            }
        }else if($text_search == ''){
            if($chuyen_nganh == null){
                
                $time_search += microtime(true);
                $result = de_tai_du_an_cac_cap::paginate(10);

                return view('search_result.de_tai_du_an_cac_cap')
                ->with([
                    'data_mysql'=>true,
                    'datas' => $result,
                    'chuyen_nganh_khcn'=>$cn_khcn,
                    'tim_theo' => $tim_theo,
                    'chuyen_nganh_current' => $chuyen_nganh,
                    'time_search' => $time_search,
                    'text_search' => $text_search,
                    ]);
            }else if($chuyen_nganh != null){
                $params = [
                        'index' => 'ntbic_index',
                        'type' => 'de_tai_du_an_cac_cap',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chuyen_nganh' => $chuyen_nganh
                                        ]],
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
            }
        }
        
       
        	$time_search += microtime(true);
    
  
        
        $result = $results['hits']['hits'];
        //dd($results);
        $result = json_decode(json_encode($result), FALSE);
        $result = $this->paginate_customer($result,10);

        return view('search_result.de_tai_du_an_cac_cap')
		->with([
            'data_mysql'=>false,
			'datas' => $result,
			'chuyen_nganh_khcn'=>$cn_khcn,
			'tim_theo' => $tim_theo,
			'chuyen_nganh_current' => $chuyen_nganh,
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