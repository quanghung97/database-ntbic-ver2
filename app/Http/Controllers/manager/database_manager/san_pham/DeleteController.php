<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
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
        return Redirect::back()->with('status', 'Xóa thành công một sản phẩm!');
    }
}
