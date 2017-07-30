<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\doanh_nghiep_khcn;
use Illuminate\Support\Facades\Redirect;
use File;
use Elasticsearch\ClientBuilder;

class DeleteController extends Controller
{
    public function index($id) {
    	$doanh_nghiep = doanh_nghiep_khcn::find($id);
        if($doanh_nghiep->logo != '/storage/app/public/media/doanh-nghiep/default.jpg'){
           $str = substr($doanh_nghiep->logo, 1);
              File::delete($str);
           $doanh_nghiep->logo = '/storage/app/public/media/doanh-nghiep/default.jpg';
           
       }
         $doanh_nghiep->save();
        
    	$doanh_nghiep->delete();
    
        //delete index elastic
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'ntbic_index',
            'type' => 'doanh_nghiep_khcn',
            'id' => $id
        ];

        // Delete doc at /my_index/my_type/my_id
        $client->delete($params);
        
    	return Redirect::back()->with('status', 'Xóa thành công một doanh nghiệp!');
    }
}
