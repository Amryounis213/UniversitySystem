<?php

namespace App\Http\Middleware;

use Closure;
use App\Taker;
use Illuminate\Support\Facades\Auth;
use App\Registeration;
class CheckAttemptQuiz
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$id)
    {
        
        if($users){
            return redirect()->back();
        }
        return $next($request);
    }
}
