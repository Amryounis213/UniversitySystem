<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch($guard){
            case 'admin': 
                if (Auth::guard($guard)->check()) {
                   
                    return redircet()->route('dashboard');
                   // if($admin->status =='Active'){
                   // }
                } 
            break; 
            
            case 'lecturer': 
                if(Auth::guard($guard)->check()){
                    
                    return redirect()->route('LecturerDashboard');
                }
            break;
            case 'web': 
                if(Auth::guard($guard)->check()){
                    
                    return redirect()->route('UserDashboard');
                }
            break;
        }
       
        return $next($request);

    /*    if (Auth::guard($guard)->check()) {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back();
        }

        return $next($request);*/
    }
}
