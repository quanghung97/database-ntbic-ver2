<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use File;
class Helper{
     public static function format_message($message,$type)
    {
         return '<p class="alert alert-'.$type.'">'.$message.'</p>';
    }
}

class DeleteController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $entry = san_pham::find($id);
          if($entry->anh_san_pham != '/storage/app/public/media/spkhcn/default.jpg'){
           $str = substr($entry->anh_san_pham, 1);
              File::delete($str);
           $entry->anh_san_pham = '/storage/app/public/media/spkhcn/default.jpg';
           
       }
         $entry->save();
        DB::table('san_pham')->where('id',$id)->delete();
        return Redirect::back()->with('status', 'Xóa thành công một sản phẩm!');
    }
}
