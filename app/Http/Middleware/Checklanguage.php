<?php

namespace App\Http\Middleware;

use Closure;

class Checklanguage
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
        app()->getLocale('ar');
        //$lang = ($request->hasHeader('lang')) ? $request->lang : 'ar';
        /*  if ($request->hasHeader('lang')) {
            $lang = $request->lang;
            app()->getLocale($lang);
        }*/
        return $next($request);
    }
}
