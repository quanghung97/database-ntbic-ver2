<?php

namespace App\Http\Middleware\doanh_nghiep;

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
        $this->table = 'doanh_nghiep_khcn';
        $this->action = 'read';
    }
}
