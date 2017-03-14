<?php

namespace App\Http\Middleware\chuyen_gia;

use Closure;
use App\Http\Middleware\RedirectPermissionAuthenticated;

class RedirectIfReadAuthenticated extends RedirectPermissionAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct()
    {
        $this->table = 'chuyen_gia_khcn';
        $this->action = 'read';
    }
}
