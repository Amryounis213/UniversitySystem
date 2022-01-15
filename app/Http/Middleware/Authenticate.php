<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($this->auth->guard('admin')) {
            return route('ShowAdminLogin');
        }
        else if($this->auth->guard('lecturer')){
            return route('ShowLecturerLogin');
        }
        else if($this->auth->guard('web')){
            return route('ShowUserLogin');
        }
        else{
            return bb;
        }

    
    }
}
