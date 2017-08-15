<?php

namespace App\Http\Controllers\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\doanh_nghiep_khcn;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;

use Elasticsearch\ClientBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
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
        
        $client = ClientBuilder::create()->build();
        
        if($text_search != null){
            if($tim_theo == 1){
                if($tinh_thanh_pho != 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_doanh_nghiep' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]],
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
                                    ['ten_doanh_nghiep' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_doanh_nghiep' => $text_search
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
                                    ['ten_doanh_nghiep' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho != 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_doanh_nghiep' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten_doanh_nghiep' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ten_doanh_nghiep' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ten_doanh_nghiep' => [
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
                if($tinh_thanh_pho != 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'san_pham_khcn' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]],
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
                                    ['san_pham_khcn' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'san_pham_khcn' => $text_search
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
                                    ['san_pham_khcn' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho != 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'san_pham_khcn' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['san_pham_khcn' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'san_pham_khcn' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['san_pham_khcn' => [
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
                if($tinh_thanh_pho != 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'cong_nghe_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]],
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
                                    ['cong_nghe_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'cong_nghe_noi_bat' => $text_search
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
                                    ['cong_nghe_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho != 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'cong_nghe_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['cong_nghe_noi_bat' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'cong_nghe_noi_bat' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['cong_nghe_noi_bat' => [
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
                if($tinh_thanh_pho != 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu_khcn' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]],
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
                                    ['huong_nghien_cuu_khcn' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu_khcn' => $text_search
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
                                    ['huong_nghien_cuu_khcn' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho != 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu_khcn' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['huong_nghien_cuu_khcn' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu_khcn' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['huong_nghien_cuu_khcn' => [
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
                if($tinh_thanh_pho != 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_doanh_nghiep^5','dia_chi']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                               ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]],
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
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_doanh_nghiep^5','dia_chi']
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
                }else if($tinh_thanh_pho != 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_doanh_nghiep^5','dia_chi']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                               ['term' => [ 
                                                 'tinh_thanh_pho' => $tinh_thanh_pho
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ten_doanh_nghiep^5','dia_chi']
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
            if($tinh_thanh_pho != 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'tinh_thanh_pho' => $tinh_thanh_pho
                                        ]],
                                        ['match' => [
                                            'linh_vuc' => $linh_vuc_khcn
                                        ]]
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn != 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        
                                        ['match' => [
                                            'linh_vuc' => $linh_vuc_khcn
                                        ]]
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho != 0 && $linh_vuc_khcn == 0){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'doanh_nghiep_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'tinh_thanh_pho' => $tinh_thanh_pho
                                        ]]
                                                                  
                                    ]
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params); 
                }else if($tinh_thanh_pho == 0 && $linh_vuc_khcn ==0){
                        $time_search += microtime(true);

                        $result=doanh_nghiep_khcn::select('ten_doanh_nghiep','linh_vuc_san_pham.linh_vuc as linh_vuc','dia_chi','tinh_thanh_pho.tinh_thanh_pho as tinh_thanh_pho','xep_hang_trinh_do_khcn','link','logo')->join('tinh_thanh_pho','tinh_thanh_pho.id','=','doanh_nghiep_khcn.tinh_thanh_pho')->join('linh_vuc_san_pham','linh_vuc_san_pham.id','=','doanh_nghiep_khcn.linh_vuc')->paginate(10);

                        return view('search_result.doanh_nghiep')
                        ->with([
                            'data_mysql'=>true,
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
//            else{
//                $params = [
//                        'index' => 'ntbic_index',
//                        'type' => 'doanh_nghiep',
//                        'from' => 0,   // <--- Start at #1
//                        'size' => 10000, // <--- And retrieve 10 docs
//                        'body' => [
//                            'query' => [
//                                'bool' => [
//                                    'must' => [
//                                        ['match' => [
//                                            'tinh_thanh_pho' => $tinh_thanh_pho
//                                        ]],
//                                                                  
//                                    ],
//                                    'filter' => [
//                                        'bool' => [
//                                            'must' => [
//                                                ['term' => [
//                                                    'linh_vuc' => $linh_vuc_khcn
//                                                ]]
//                                            ]
//                                        ]
//                                    ]
//                                ]
//                            ]
//                        ]
//                    ];
//                    
//                    $results = $client->search($params); 
//            }
            
        }
		$time_search += microtime(true);
        $result = $results['hits']['hits'];
        
        /////////////////////////////////////////////////////////////////////////////////
//        convert arr to object
        $result = json_decode(json_encode($result), FALSE);
        $response_tp = tinh_thanh_pho::complexSearch([
            'index' => 'ntbic_index',
            'type' => 'tinh_thanh_pho',
            'body' => [
                'query' => [
                    'match_all' => (Object)[],
                ],
                'size' => 1000
            ]
        ]);
        
        
        foreach($response_tp as $key => $value){
            foreach($result as $key2 => $value2){
                if($value->id == $value2->_source->tinh_thanh_pho){
                    $value2->_source->tinh_thanh_pho = $value->tinh_thanh_pho;
                
                }
            }
        }
        
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
        
        foreach($result as $key => $value){
            foreach($response_lv as $key2 => $value2){
                if($value2->id == $value->_source->linh_vuc){
                    $value->_source->linh_vuc = $value2->linh_vuc;
                    
                }
                
            }
             
        }
        //convert object to arr
        //$result = json_decode(json_encode($result), true);
       
        
        //////////////////////////////////////////////////////////////////////////////////
        //dd($result);
        $result = $this->paginate_customer($result,10);
        //dd($result);
		return view('search_result.doanh_nghiep')
		->with([
            'data_mysql'=>false,
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