<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RedirectPermissionAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return $next($request);
            // return redirect()->route('login');
        }
        if(DB::table('database_permission')
            ->where('table',$this->table)
            ->where('action',$this->action)
            ->where('user_id',!Auth::guard($guard)->user()->id) == null && !Auth::guard($guard)->user()->author != "admin") {
            return redirect()->route('permission_denied');
        }
        return $next($request);
    }
}
