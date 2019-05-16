<?php

namespace App\Http\Middleware;

use Closure;

//use User;
use Auth;

//use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CheckUser
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->privilegies==0){
            
           return redirect()->route("home");
        }
        
        return $next($request);

    }

    
}
