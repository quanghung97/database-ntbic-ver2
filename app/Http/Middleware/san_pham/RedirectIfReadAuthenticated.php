<?php

namespace App\Http\Middleware\san_pham;

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
        $this->table = 'san_pham';
        $this->action = 'read';
    }
}
