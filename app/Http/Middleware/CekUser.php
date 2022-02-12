<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekUser
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
        if (Auth::user() &&  Auth::user()->level_id == 4) {
             return $next($request);
        }elseif(Auth::user() &&  Auth::user()->level_id == 5){
            return $next($request);
        }elseif(Auth::user() &&  Auth::user()->level_id == 6){
            return $next($request);
        }

        return back();
    }
}
