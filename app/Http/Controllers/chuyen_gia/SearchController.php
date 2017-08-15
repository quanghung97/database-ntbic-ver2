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
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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
		//$chuc_danh = mb_strtolower($chuc_danh);
		//$chuc_danhs = explode(' ', $chuc_danh);
		/*
			Tìm theo: Truyền vào 1 số nguyên
			1: Tên nhà KH
			2: Lĩnh vực nghiên cứu
			3: Hướng nghiên cứu
			4: Cơ quan công tác
		*/
        
        //api client
        $client = ClientBuilder::create()->build();
        
//        if($tinh_thanh == null){
//            $tinh_thanh = "";
//        }
//         if($chuc_danh == null){
//            $chuc_danh = "";
//        }
        if($text_search != ''){
            if($tim_theo == 1){
                if($tinh_thanh != null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ho_va_ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ho_va_ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];
                    
                    $results = $client->search($params);  
                    //dd($results);
                    //dd($results['hits']['hits'][0]);
                } else if($tinh_thanh == null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ho_va_ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ho_va_ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh != null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ho_va_ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                               
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ho_va_ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                   
                   
                } else if($tinh_thanh == null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'ho_va_ten' => $text_search
                                        ]],
                                                                  
                                    ],
                                    
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['ho_va_ten' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                    
                }
            } else if($tim_theo == 2){
                    if($tinh_thanh != null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chuyen_nganh' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['chuyen_nganh' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                        
                } else if($tinh_thanh == null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chuyen_nganh' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['chuyen_nganh' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh != null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chuyen_nganh' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['chuyen_nganh' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                   
                   
                } else if($tinh_thanh == null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'chuyen_nganh' => $text_search
                                        ]],
                                                                  
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['chuyen_nganh' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                    
                }
            } else if($tim_theo == 3){
                    if($tinh_thanh != null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['huong_nghien_cuu' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh == null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                            
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['huong_nghien_cuu' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh != null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu' => $text_search
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['huong_nghien_cuu' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                   
                   
                } else if($tinh_thanh == null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['match' => [
                                            'huong_nghien_cuu' => $text_search
                                        ]],
                                                                  
                                    ],
                                    
                                ]
                            ],
                            'highlight' => [
                                'fields' => [
                                    ['huong_nghien_cuu' => [
                                        'force_source' => true
                                    ]]
                                  //  '*' => (Object)[],
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                    
                }
            } else if($tim_theo == 4){
                    if($tinh_thanh != null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
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
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
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
                } else if($tinh_thanh == null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
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
                                                    'hoc_vi.keyword' => $chuc_danh
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
                } else if($tinh_thanh != null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
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
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                
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
                   
                   
                } else if($tinh_thanh == null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
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
                    
                }
            } else if($tim_theo == 0){
                    if($tinh_thanh != null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ho_va_ten^5','chuyen_nganh','co_quan','huong_nghien_cuu']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                        //dd($results);
                } else if($tinh_thanh == null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ho_va_ten^5','chuyen_nganh','co_quan','huong_nghien_cuu']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                               
                                                ['term' => [
                                                    'hoc_vi.keyword' => $chuc_danh
                                                ]]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh != null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ho_va_ten^5','chuyen_nganh','co_quan','huong_nghien_cuu']
                                        ]],
                                                                  
                                    ],
                                    'filter' => [
                                        'bool' => [
                                            'must' => [
                                                ['term' => [ 
                                                 'tinh_thanh.keyword' => $tinh_thanh
                                                ]],
                                                
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                   
                   
                } else if($tinh_thanh == null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                           'query' => [
                                'bool' => [
                                    'must' => [
                                        ['multi_match' => [
                                            'query' => $text_search,
                                            'fields' => ['ho_va_ten^3','chuyen_nganh','co_quan','huong_nghien_cuu']
                                        ]]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                    
                }
            }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            // khong cho text nao truyen vao
        } else if($text_search == ''){
            if($tinh_thanh != null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                   
                                        ['match' => [
                                            'tinh_thanh' => $tinh_thanh
                                        ]],
                                        ['match' => [
                                            'hoc_vi' => $chuc_danh
                                        ]],                                       
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh == null && $chuc_danh != null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                    
                                        ['match' => [
                                            'hoc_vi' => $chuc_danh
                                        ]]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                } else if($tinh_thanh != null && $chuc_danh == null){
                    $params = [
                        'index' => 'ntbic_index',
                        'type' => 'chuyen_gia_khcn',
                        'from' => 0,   // <--- Start at #1
                        'size' => 10000, // <--- And retrieve 10 docs
                        'body' => [
                            'query' => [
                                'bool' => [
                                    'must' => [
                                 
                                        ['match' => [
                                            'tinh_thanh' => $tinh_thanh
                                        ]]
                                    ]
                                ]
                            ]
                        ]
                    ];

                    $results = $client->search($params);  
                   
                   
                } else if($tinh_thanh == null && $chuc_danh == null){
		                $time_search += microtime(true);
                
                        $result = chuyen_gia_khcn::paginate(10);
                        //dd($result);
                        return view('search_result.chuyen_gia')
                        ->with([
                            'data_mysql'=>true,
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
            
            
     
        } 


		$time_search += microtime(true);
    
  
        
        $result = $results['hits']['hits'];
//        dd($result);
        $result = json_decode(json_encode($result), FALSE);
        //dd($result);
        $result = $this->paginate_customer($result,10);
        //dd($result);
		return view('search_result.chuyen_gia')
		->with([
            'data_mysql'=>false,
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