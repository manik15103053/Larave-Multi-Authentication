<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Illuminate\Http\Request;

class LogoutMiddleware
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
        if (!Sentinel::check()) {
            return $next($request);
        }
        if (Sentinel::check()->user_type == 'admin') {
            return redirect()->route('dashboard');
        }elseif (Sentinel::check()->user_type == 'manager') {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('dashboard');
        }

    }
}
