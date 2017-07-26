<?php

namespace App\Http\Controllers\manager\database_manager\de_tai_du_an_cac_cap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\de_tai_du_an_cac_cap;
use Illuminate\Support\Facades\Input;
use Elasticsearch\ClientBuilder;


class DeleteController extends Controller
{
     public function index(Request $request){
     	$id = $request->id;
    	$rel=de_tai_du_an_cac_cap::find($id);
    	$rel->delete();
          //delete index elastic
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'ntbic_index',
            'type' => 'de_tai_du_an_cac_cap',
            'id' => $id
        ];

        // Delete doc at /my_index/my_type/my_id
        $client->delete($params);
    	return Redirect::back()->with('status', 'Xóa thành công một đề tài dự án!');
    }
}
