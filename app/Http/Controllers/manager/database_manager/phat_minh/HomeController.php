<?php

namespace App\Http\Controllers\manager\database_manager\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bang_phat_minh_sang_che;

class HomeController extends Controller
{
    public function index()
    {
    	$pm=bang_phat_minh_sang_che::paginate(10);
    	return view('database_manager.phat_minh.index')->with(['phat_minh'=>$pm]);
    }
}

