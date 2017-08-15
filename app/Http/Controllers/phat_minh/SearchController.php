<?php

namespace App\Http\Controllers\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\bang_phat_minh_sang_che;
use App\linh_vuc_san_pham;
use App\loai_phat_minh_sang_che;

use Elasticsearch\ClientBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
	public function getSearch(Request $request) {
		$time_search = -microtime(true);
		$per_page = 10;
		$linh_vuc = linh_vuc_san_pham::all();
		$loai_phat_minh = loai_phat_minh_sang_che::all();
		/*Truyền vào text và các option*/
		$text_search = $request->text_search;
		$tim_theo = $request->tim_theo;
		$linh_vuc_khcn = $request->linh_vuc_khcn;
		$loai_phat_minh_sang_che = $request->loai;
//		$text_search = mb_strtolower($text_search);
//		$text_searchs = explode(' ', $text_search);
		/*Tìm theo: truyền vào 1 số nguyên
			1: tên phát minh, sáng chế, giải pháp
			2: điểm nổi bật
			3: tác giả
		*/
        
        //api client
        $client = ClientBuilder::create()->build();
        if($text_search != null){
            if($tim_theo == 1){
                if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]],
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                               
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten' => [
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
                if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'diem_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]],
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['diem_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'diem_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['diem_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'diem_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['diem_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'diem_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['diem_noi_bat' => [
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
                if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'tac_gia' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]],
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['tac_gia' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'tac_gia' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                               
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['tac_gia' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'tac_gia' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['tac_gia' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'tac_gia' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['tac_gia' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }
            }else{
                if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten^5','diem_noi_bat','tac_gia^4']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]],
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten^5','diem_noi_bat','tac_gia^4']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                }else if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten^5','diem_noi_bat','tac_gia^4']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'linh_vuc_khcn' => $linh_vuc_khcn
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten^5','diem_noi_bat','tac_gia^4']
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
            if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'linh_vuc_khcn' => $linh_vuc_khcn
                                        ]],
                                        ['match' => [
                                            'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                        ]]
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                       
                                        ['match' => [
                                            'loai_phat_minh_sang_che' => $loai_phat_minh_sang_che
                                        ]]
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn != 0 && $loai_phat_minh_sang_che == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'bang_phat_minh_sang_che',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'linh_vuc_khcn' => $linh_vuc_khcn
                                        ]]                    
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($linh_vuc_khcn == 0 && $loai_phat_minh_sang_che == 0){
                    $time_search += microtime(true);
                
                    $result = bang_phat_minh_sang_che::select('ten','linh_vuc_san_pham.linh_vuc as linh_vuc','sobang_kyhieu','tac_gia','ngay_cong_bo','loai_phat_minh_sang_che.loai_phat_minh_sang_che as loai_phat_minh_sang_che','link')->join('loai_phat_minh_sang_che','loai_phat_minh_sang_che.id','=','bang_phat_minh_sang_che.loai_phat_minh_sang_che')->join('linh_vuc_san_pham','bang_phat_minh_sang_che.linh_vuc_khcn','=','linh_vuc_san_pham.id')->paginate(10);
                
                    return view('search_result.phat_minh_sang_che')
                            ->with([
                                 'data_mysql'=>true,
                                'linh_vuc'=>$linh_vuc,
                                'loai_phat_minh'=>$loai_phat_minh,
                                'datas'=>$result,
                                'tim_theo' => $tim_theo,
                                'loai_phat_minh_current' => $loai_phat_minh_sang_che,
                                'linh_vuc_current' => $linh_vuc_khcn,
                                'time_search' => $time_search,
                                'text_search' => $text_search,
                                ]);
                }
        }
        
        $time_search += microtime(true);
    
  
        
        $result = $results['hits']['hits'];
        //dd($results);
       
        
        
        ///////////////////////////////////////////////////////////
         $result = json_decode(json_encode($result), FALSE);
        
        $response_lv = linh_vuc_san_pham::complexSearch([
            'index' => 'ntbic_index',
            'type' => 'linh_vuc_san_pham',
            'body' => [
                'query' => [
                    'match_all' => (Object)[],
                ],
                'size' => 1000
            ]
        ]);
       // dd($result);
        foreach($result as $key => $value){
            foreach($response_lv as $key2 => $value2){
                if($value2->id == $value->_source->linh_vuc_khcn){
                    $value->_source->linh_vuc_khcn = $value2->linh_vuc;
                    
                }
                
            }
             
        }
        //convert object to arr
        //$result = json_decode(json_encode($result), true);
        ///////////////////////////////////////////////////////////////
         $result = $this->paginate_customer($result,10);
		return view('search_result.phat_minh_sang_che')
		->with([
            'data_mysql'=>false,
			'linh_vuc'=>$linh_vuc,
			'loai_phat_minh'=>$loai_phat_minh,
			'datas'=>$result,
			'tim_theo' => $tim_theo,
			'loai_phat_minh_current' => $loai_phat_minh_sang_che,
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