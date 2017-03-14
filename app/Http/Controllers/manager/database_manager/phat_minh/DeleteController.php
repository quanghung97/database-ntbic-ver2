<?php

namespace App\Http\Controllers\manager\database_manager\phat_minh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\bang_phat_minh_sang_che;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\FlashServiceProvider;


class DeleteController extends Controller
{
    public function index(Request $request){
     	$id = $request->id;
    	$rel=bang_phat_minh_sang_che::find($id);
    	$rel->delete();
    	return Redirect::to('quan-tri-vien/quan-ly-du-lieu/phat-minh');
    }
}
