<?php

namespace App\Http\Controllers\manager\database_manager\chuyen_gia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chuyen_gia_khcn;
class HomeController extends Controller
{
    public function index()
    {
    	$cg=chuyen_gia_khcn::paginate(10);
    	return view('database_manager.chuyen_gia.index')->with(['chuyen_gia'=>$cg]);
    }
}
