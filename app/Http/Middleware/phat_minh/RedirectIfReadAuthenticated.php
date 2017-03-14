<?php

namespace App\Http\Middleware\phat_minh;

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
        $this->table = 'phat_minh_sang_che';
        $this->action = 'read';
    }
}
