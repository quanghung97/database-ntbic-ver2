<?php

namespace App\Http\Controllers\manager\database_manager\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\bang_phat_minh_sang_che;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\FlashServiceProvider;
use File;

class DeleteController extends Controller
{
    public function index(Request $request){
     	$id = $request->id;
        $phat_minh=bang_phat_minh_sang_che::find($id);
        if($phat_minh->hinh_anh_minh_hoa != '/storage/app/public/media/pmsc/default.jpg'){
           $str = substr($phat_minh->hinh_anh_minh_hoa, 0);
          
             File::delete($str);
           $phat_minh->hinh_anh_minh_hoa = '/storage/app/public/media/spkhcn/default.jpg';
           
       }
        $phat_minh->save();
    	$rel=bang_phat_minh_sang_che::find($id);
    	$rel->delete();
    	return Redirect::back()->with('status', 'xóa thành công một phát minh!');
    }
}
