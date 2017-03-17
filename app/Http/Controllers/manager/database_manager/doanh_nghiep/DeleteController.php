<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\doanh_nghiep_khcn;
use Illuminate\Support\Facades\Redirect;
class DeleteController extends Controller
{
    public function index($id) {
    	$doanh_nghiep = doanh_nghiep_khcn::find($id);
    	$doanh_nghiep->delete();
    
    	return Redirect::back()->with('status', 'Xóa thành công một doanh nghiệp!');
    }
}
