<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Check_Auth
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
        if(Auth::guard('admin')->check()){
            return redirect()->back();
        }
        else if(Auth::guard('lecturer')->check()){
            return redirect()->back();
        }
        else if(Auth::guard('web')->check()){
            return redirect()->back();
        }
        else{
            return $next($request);
        }
        
    }
}
