<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::table('san_pham')->where('id',$id)->delete();
        return redirect()->route('san-pham')->with('message3', Helper::format_message('Đã xóa thành công sản phẩm','warning'));
    }
}
