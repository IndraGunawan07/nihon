<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // dd($request);
        if(Auth::user()->role === "Admin"){
            // return route('admin.index');
            return $next($request);
        }
        else {
            return redirect('/');
        }
        
       
    }
}
