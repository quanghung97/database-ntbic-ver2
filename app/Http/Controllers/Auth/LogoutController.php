<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Ip;

class LogoutController extends Controller
{

    public function index()
    {
        if(Auth::guard()->check()){
            Auth::guard()->logout();
            return redirect()->route('login');
        }
        else {
            return redirect()->route('permission_denied');
        }
    }
}
