<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->level_id == 1) {
             return $next($request);
        }elseif(Auth::user() &&  Auth::user()->level_id == 2){
            return $next($request);
        }elseif(Auth::user() &&  Auth::user()->level_id == 3){
            return $next($request);
        }

        return back();
    }
}
