<?php

namespace App\Http\Middleware\de_tai_du_an_cac_cap;

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
        $this->table = 'de_tai_du_an_cac_cap';
        $this->action = 'read';
    }
}
