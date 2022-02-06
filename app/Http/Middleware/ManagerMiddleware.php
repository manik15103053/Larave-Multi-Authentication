<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Illuminate\Http\Request;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'manager') {
            return $next($request);
        }elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin'){
            return $next($request);
        }else{
            return redirect()->route('login.form');
        }
    }
}
