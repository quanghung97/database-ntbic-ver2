<?php

namespace App\Http\Controllers\manager\database_manager\chuyen_gia;
use App\chuyen_gia_khcn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function index($id){
    	$cg=chuyen_gia_khcn::find($id);
    	$cg->delete();
    	return redirect()->route('chuyen_gia');
    }
}
