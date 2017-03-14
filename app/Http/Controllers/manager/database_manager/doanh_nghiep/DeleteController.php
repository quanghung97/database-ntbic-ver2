<?php

namespace App\Http\Controllers\manager\database_manager\doanh_nghiep;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\doanh_nghiep_khcn;

class DeleteController extends Controller
{
    public function index($id) {
    	$doanh_nghiep = doanh_nghiep_khcn::find($id);
    	$doanh_nghiep->delete();
    
    	return redirect('quan-tri-vien/quan-ly-du-lieu/doanh-nghiep');
    }
}
