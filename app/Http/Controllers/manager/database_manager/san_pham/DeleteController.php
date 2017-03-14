<?php

namespace App\Http\Controllers\manager\database_manager\san_pham;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\san_pham;
use App\linh_vuc_san_pham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        DB::table('san_pham')->where('id',$id)->delete();
        return redirect()->route('san-pham');
    }
}
