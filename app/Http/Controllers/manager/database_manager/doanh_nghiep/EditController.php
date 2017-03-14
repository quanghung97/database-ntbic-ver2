<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\doanh_nghiep_khcn;
use App\linh_vuc_san_pham;
use App\tinh_thanh_pho;

class EditController extends Controller
{
    public function index($id) {
    	$linh_vuc = linh_vuc_san_pham::all();
     	$tinh_thanh_pho = tinh_thanh_pho::all();
    	$doanh_nghiep = doanh_nghiep_khcn::find($id);
    	return view('database_manager.doanh_nghiep.edit')->with(['doanh_nghiep'=>$doanh_nghiep,'tinh_thanh'=>$tinh_thanh_pho,'linh_vuc'=>$linh_vuc]);
    }

    public function edit_action(Request $request, $id) {
    	
    }
}
