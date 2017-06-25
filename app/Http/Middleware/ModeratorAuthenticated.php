<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class ModeratorAuthenticated
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
            return redirect()->route('login');
        }
        if(Auth::guard($guard)->user()->author != "moderator" && Auth::guard($guard)->user()->author != "admin") {
            return redirect()->route('permission_denied');
        }
        return $next($request);
    }
}
