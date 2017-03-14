<?php

namespace App\Http\Controllers\manager\database_manager\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index()
    {
    	return view('database_manager.phat_minh.edit');
    }
}
