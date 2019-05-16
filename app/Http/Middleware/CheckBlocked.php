<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->status==0){
            return redirect('login')->with(Auth::logout());
        }
        return $next($request);
    }
}
